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
    <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval="false" data-turbo-eval="false"></script>
</head>
<body>
<h2 class="text-center text-blue-400">Livewire Comments!</h2>
    <div class="flex justify-center">
        <div class="w-11/12 my-10 flex">
            <div class="w-5/12 rounded border p-2">
                <livewire:tickets />
            </div>
            <div class="w-7/12 mx-2 rounded border p-2">
                <livewire:comment />
            </div>
        </div>
    </div>
</body>
</html>
