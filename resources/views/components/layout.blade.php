<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pretty Creepy</title>

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
                    <li><img class="navImg" src="/images/basket.webp" alt=""></li>
                    <li><img class="navImg" src="/images/burgerbar.webp" alt=""></li>
                </ul>
            </div>
        </div>
    </header>
</body>

{{ $slot }}

<footer id="footerContainer">

</footer>

</html>
