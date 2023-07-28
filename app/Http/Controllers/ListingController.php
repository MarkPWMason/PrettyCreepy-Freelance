<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Listing;
use App\Models\Images;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ListingController extends Controller
{

    function gen_uuid()
    {
        return sprintf(
            '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            // 32 bits for "time_low"
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),

            // 16 bits for "time_mid"
            mt_rand(0, 0xffff),

            // 16 bits for "time_hi_and_version",
            // four most significant bits holds version number 4
            mt_rand(0, 0x0fff) | 0x4000,

            // 16 bits, 8 bits for "clk_seq_hi_res",
            // 8 bits for "clk_seq_low",
            // two most significant bits holds zero and one for variant DCE1.1
            mt_rand(0, 0x3fff) | 0x8000,

            // 48 bits for "node"
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff)
        );
    }


    public function createListing()
    {
        return view('create-item');
    }

    public function postListing(Request $request)
    {
        $incomingFields = $request->validate([
            'image' => 'required',
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'category' => 'required',
            'sizes' => 'required'
        ]);

        $incomingFields['category'] = strip_tags($incomingFields['category']);
        
        //if there are no categories this wont work
        $category = Categories::where('category', $incomingFields['category'])->firstOrFail();

        $listing = new Listing();
        $listing->category_id = $category->id;
        $listing->title = strip_tags($incomingFields['title']);
        $listing->description = $incomingFields['description'];
        $listing->price = strip_tags($incomingFields['price']);
        $listing->sizes = $incomingFields['sizes'];
        $listing->save();

        //from request upload files to S3 bucket and get URL back
        $images = $request->file('image');
        foreach ($images as $image) {
            $imageModel = new Images();
            $imageModel->listing_id = $listing->id;
            $filename = $this->gen_uuid() . time() . $image->getClientOriginalName();
            $imageModel->imagePath = $filename;
            //make sure image names never collide
            $image->storeAs('listingImages/', $filename, 's3');
            $imageModel->save();
        }


        //$listing->images()->get()
        //gonna use this to get the images


        return redirect('create-item');
    }

    public function showListings(Request $request)
    {
        $type = $request->query->get('type');
        if (is_null($type)) {
            $listings = Listing::all();
        } else {
            $listings = Listing::select('listings.*')->join('categories', 'categories.id', '=', 'listings.category_id')->where('categories.category', $type)->get();
        }

        return view('listings', ['listings' => $listings]);
    }

    public function searchListings(Request $request)
    {
        $listings = Listing::select('listings.*')->where('title', 'like', '%' . $request->search . '%')->get();
        if (count($listings) == 0) {
            $listings = Listing::all();
        }
        return view('listings', ['listings' => $listings]);
    }

    public function showListing($id)
    {
        $listing = Listing::where('listings.id', $id)->firstOrFail();
        return view('listing', ['listing' => $listing]);
    }
}
