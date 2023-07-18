<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pretty Creepy</title>

    @vite(['resources/css/layout.css'])
    @if(Request::path() == '/')
        @vite(['resources/css/homepage.css'])
    @endif 

    @if(Request::path() == 'admin')
        @vite(['resources/css/admin.css'])
    @endif 

    @if(Request::path() == 'create-item')
        @vite(['resources/css/create-item.css'])
    @endif 
</head>

<body>
    <header id="headerContainer">
        <div id="navContainer">
            <div>
                <a href="{{route('home')}}"><img id="headerLogo" src="/images/LogoPlaceholder.png" alt="">
            </div></a>
                
            <div id="navIcons">
                <ul>
                    <li>Search</li>
                    <li>Basket</li>
                    <li>Menu</li>
                </ul>
            </div>
        </div>
    </header>
</body>

{{ $slot }}

<footer id="footerContainer">
    
</footer>

</html>
