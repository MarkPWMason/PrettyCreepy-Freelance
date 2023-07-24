<x-layout>
    <div class="welcome_image">
        <div class="welcome_overlay">

        </div>
        <div class="welcome_text">
            <img id="logoImage" src="/images/PCText.webp" alt="">
        </div>
    </div>
    <section class="content page-home theme has_welcome">
        <ul class="categories two_categories">
            <li><a title="Clothing" style="height: 620px; overflow: hidden; position: relative;" href="{{route('showListings',['type' => 'Clothing'])}}"><img
                        class="image" src="/images/test.png" alt=""></a></li>
            <li><a title="Jewellery" style="height: 620px; overflow: hidden; position: relative;"href="{{route('showListings',['type' => 'Jewellery'])}}"><img
                        class="image" src="/images/test.png" alt=""></a></li>
        </ul>
    </section>
</x-layout>
