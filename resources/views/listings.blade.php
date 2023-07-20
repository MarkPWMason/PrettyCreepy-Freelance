<x-layout>
    <section class="content">
        <ul id="listingsContainer">
            @foreach ($listings as $listing)
                <li id="listingContainer">
                    @php
                        $image = $listing->images()->get();
                    @endphp

                    <img id="productImage" src="{{ route('image', $image[0]->imagePath) }}" alt="">
                    {{-- @foreach ($listing->images()->get() as $image)
                        <img src="{{ route('image', $image->imagePath) }}" alt="">
                    @endforeach --}}
                    <div id="listingDetails">
                        <h2 style="color: white">{{ $listing->title }}</h2>
                        <h2 style="color: white">{{ $listing->price }}</h2>
                    </div>

                </li>
            @endforeach
        </ul>
    </section>

</x-layout>
