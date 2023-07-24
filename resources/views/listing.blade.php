<x-layout>
    <section class="content">
        <div id="listingContainer">
            <div id="carouselExampleCaptions" class="carousel">
                <div class="carousel-inner">
                    @foreach ($listing->images()->get() as $image)
                        <div class="carousel-item  {{$loop->iteration == 1 ? 'active' : ''}}">
                            <div class="text-center">
                                <img id="listingImg" src="{{ route('image', $image->imagePath) }}" alt="">
                            </div>

                        </div>
                    @endforeach
                </div>
                <div id="previewContainer">
                    @foreach ($listing->images()->get() as $key => $image)
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{$key}}">
                            <img class="imgPreview {{$key !== 0 ? 'activePreviewImage' : ''}}" src="{{ route('image', $image->imagePath) }}" alt="">
                        </button>
                    @endforeach
                </div>
                <div>
                    <button data-item='{"title" : "{{$listing->title}}","basePrice": {{$listing->price}},"id" : {{$listing->id}}, "img" : "{{ route('image', $image->imagePath) }}"}' id="addToCart">Add To Cart</button>
                    <input type="number" name="quantity" id="quantity">
                </div>
            </div>
        </div>

        
    </section>

    <script>
        (function() {
            document.getElementById('carouselExampleCaptions').addEventListener('slid.bs.carousel', function() {
                console.log("test");
                const activeImg = document.querySelector('.active');
                const carouselChildrenCount = activeImg.parentElement.children.length;
                //index in array so starts with 0
                const index = Array.prototype.indexOf.call(activeImg.parentNode.children, activeImg)
                const imgToSelect = index + 1 === carouselChildrenCount ? 0 : index + 1;
                
                const previewContainer = document.getElementById("previewContainer")
                const previewImageToHighlight = previewContainer.children[imgToSelect]
                Array.from(previewContainer.children).forEach((c, innerIndex) => {
                    if(innerIndex != index){
                        c.children[0].classList.add("activePreviewImage")
                    }else{
                        c.children[0].classList.remove("activePreviewImage")
                    }
                })
            })


            document.getElementById('addToCart').addEventListener('click', function(){
                const quantity = parseInt(document.getElementById('quantity').value);
                if(quantity >= 1){
                    const itemInfo = JSON.parse(this.dataset.item.trim())
                    console.log(itemInfo)
                    let cart = localStorage.getItem('cart')
                    console.log(cart)
                    const cartObject = cart == null ? [] : JSON.parse(cart);
                    console.log(cartObject)
                    let found = false;
                    cartObject.forEach(c => {
                        //if we find the item in the cart increase the quantity of the item
                        if(c.id == itemInfo.id && !found){
                            found = true;
                            c.quantity += quantity
                            console.log('i exist')
                        }
                    })
                    if(found == false){
                        //if we didn't find the item add it to the cart
                        console.log('i am the void')
                        cartObject.push({
                            id: itemInfo.id,
                            title: itemInfo.title,
                            quantity: quantity,
                            basePrice: itemInfo.basePrice,
                            img: itemInfo.img
                        })
                    }
                    localStorage.setItem('cart', JSON.stringify(cartObject))
                    console.log(cartObject)
                }else{
                    alert('Choose a better quantity.')
                }
            })
        })();
    </script>
</x-layout>
