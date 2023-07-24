<x-layout>
    <section class="content">
        <ul id="listingsContainer">
            @foreach ($listings as $listing)
                <li id="listingContainer" onclick="window.location = '{{ route('showListing', $listing->id) }}'">
                    @php
                        $image = $listing->images()->get();
                    @endphp
                    <img id="productImage" src="{{ route('image', $image[0]->imagePath) }}" alt="">
                    <div id="listingDetails">
                        <h2 style="color: white">{{ $listing->title }}</h2>
                        <h2 style="color: white">{{ $listing->price }}</h2>
                    </div>

                </li>
            @endforeach
        </ul>
    </section>

</x-layout>
