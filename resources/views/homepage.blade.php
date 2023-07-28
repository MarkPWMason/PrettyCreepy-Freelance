<x-layout>
    <div id="initialSection" class="welcome_image">
        <div class="welcome_overlay">

        </div>
        <div class="welcome_text">
            <img id="logoImage" src="/images/PCText.webp" alt="">
        </div>
    </div>
    <section class="content page-home theme has_welcome">
        <ul class="categories two_categories">
            <li class="productIcons"><a title="Clothing" style="height: 620px; overflow: hidden; position: relative;"
                    href="{{ route('showListings', ['type' => 'Clothing']) }}">

                    <img class="image" src="/images/test.png" alt="">

                </a>
                <h1 class="productTitle">Clothing</h1>
            </li>
            <li class="productIcons"><a title="Jewellery"
                    style="height: 620px; overflow: hidden; position: relative;"href="{{ route('showListings', ['type' => 'Jewellery']) }}">

                    <img class="image" src="/images/test.png" alt="">
                </a>
                <h1 class="productTitle">Jewellery</h1>
            </li>
        </ul>
    </section>
</x-layout>
