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
<div class="flex w-full justify-start px-4 bg-purple-900 text-white">
    <a class="mx-3 py-4" href="/">Home</a>
    <a class="mx-3 py-4" href="/login">Login</a>
</div>
<div class="my-10">
    {{ $slot }}
</div>
</body>
</html>

