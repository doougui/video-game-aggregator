<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Video Game Aggregator</title>
    @livewireStyles
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</head>
<body class="bg-gray-900 text-white">
    {{ $slot }}

    <footer class="border-t border-gray-800">
        <div class="container mx-auto px-4 py-6">
            Made with 💖 by <a href="https://github.com/doougui" target="_blank" class="link" rel="noopener">Doougui</a>
            &middot;
            Powered By: <a href="https://www.igdb.com/api" target="_blank" rel="noopener" class="link">IGDB API</a>
        </div>
    </footer>

    @livewireScripts
    <script src="{{ asset('/js/app.js') }}"></script>
</body>
</html>
