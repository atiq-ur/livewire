<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Livewire Comment Example</title>
    @livewireStyles
    @livewireScripts
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body class="flex flex-wrap justify-center">
<div class="flex w-full justify-between px-4 bg-purple-900 text-white">
    <a class="mx-3 py-4" href="/">Home</a>
    @auth
        @livewire('logout')
    @endauth
    @guest
        <div class="py-4">
            <a class="mx-3" href="/login">Login</a>
            <a class="mx-3" href="/register">Register</a>
        </div>
    @endguest
</div>
<div class="my-10 w-full flex justify-center">
    {{ $slot }}
</div>
</body>
</html>

