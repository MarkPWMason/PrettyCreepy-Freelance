<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pretty Creepy</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    @vite(['resources/css/layout.css'])
    @if (Request::path() == '/')
        @vite(['resources/css/homepage.css'])
    @endif

    @if (Request::path() == 'admin')
        @vite(['resources/css/admin.css'])
    @endif

    @if (Request::path() == 'create-item')
        @vite(['resources/css/create-item.css'])
    @endif

    @if (Request::path() == 'products')
        @vite(['resources/css/listings.css'])
    @endif

    @if (str_starts_with(Request::path(), 'product/'))
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
        @vite(['resources/css/listing.css'])
    @endif
</head>

<body>
    <header id="headerContainer">
        <div id="navContainer">
            <div>
                <a href="{{ route('home') }}"><img id="headerLogo" src="/images/LogoPlaceholder.png" alt="">
            </div></a>
            <p>ID: {{ is_null(auth()->user()) ? 'NULL' : auth()->user()->id }}</p>

            @if (auth()->user())
                <form action="{{ route('adminLogout') }}" method="POST">
                    @csrf
                    <button>logout</button>
                </form>
            @endif

            <div id="navIcons">
                <ul>
                    <li><img class="navImg" src="/images/search.webp" alt=""></li>
                    <li><img class="navImg" src="/images/basket.webp" alt="" onclick="toggleVisibility()"></li>
                    <li><img class="navImg" src="/images/burgerbar.webp" alt=""></li>
                </ul>
            </div>
        </div>

        <div class="modal" id="cartModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">

                
                <div id="cartContainer">
                    
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Checkout</button>
                </div>
            </div>
        </div>
    </header>

    @if (str_starts_with(Request::path(), 'product/'))
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
        </script>
    @endif

    <script>
        function toggleVisibility() {
            const cart = document.getElementById('cartModal');
            if (cart.style.display === "none") {
                cart.style.display = "block";
            } else {
                cart.style.display = "none";
            }
        }

        let cart = localStorage.getItem('cart');
        const cartContainer = document.getElementById('cartContainer');
        const cartObj = cart == null ? [] : JSON.parse(cart);

        cartObj.forEach(cartItem => {
            console.log(cartItem)
            cartInfoContainer = document.createElement('div');

            cartItemInfo = document.createElement('div');
            cartItemImg = document.createElement('img');

            cartItemTitle = document.createElement('p');
            cartItemPrice = document.createElement('p');

            cartItemImg.src = cartItem.img

            cartItemTitle.innerHTML = cartItem.title
            cartItemPrice.innerHTML = cartItem.basePrice
            
            cartItemInfo.appendChild(cartItemTitle);
            cartItemInfo.appendChild(cartItemPrice);

            cartInfoContainer.appendChild(cartItemImg)
            cartInfoContainer.appendChild(cartItemInfo)

            cartContainer.appendChild(cartInfoContainer)

            cartItemInfo.classList.add('cartItemInfo')
            cartItemImg.classList.add('cartImg')
            cartInfoContainer.classList.add('cartInfoContainer')
        });

    </script>
</body>

{{ $slot }}

<footer id="footerContainer">

</footer>

</html>
