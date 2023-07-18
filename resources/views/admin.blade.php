<x-layout>
    <form method="POST" id="adminContainer" action="{{route('adminLogin')}}">
        @csrf
        <input name="loginusername" class="formInput" type="text" placeholder="username">
        <input name="loginpassword" class="formInput" type="password" placeholder="password">
        <input class="btn" type="submit">
    </form>
</x-layout>