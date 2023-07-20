<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Listing;

class Images extends Model
{
    use HasFactory;

    protected $fillable = [
        'imagePath',
        'listing_id'
    ];

    public function images()
    {
        return $this->belongsTo(Listing::class);
    }
}
