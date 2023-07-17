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
</head>

<body>
    <header id="headerContainer">
        <div class="">
            <div class="">
                <a href="" class="" title="Search" data-toggle="tooltip"
                    data-placement="bottom"><i class=""></i></a>
                <span class="" title="Chat" data-toggle="tooltip"
                    data-placement="bottom"><i class=""></i></span>
                <a href="" class="mr-2"></a>
                <a class="" href=""></a>
            </div>
        </div>
    </header>
</body>

{{ $slot }}

<footer id="footerContainer">
    
</footer>

</html>
