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
{{--    {{ dd(\Mcamara\LaravelLocalization\Facades\LaravelLocalization::getSupportedLocales()) }}--}}
    {{ $slot }}

    <footer class="border-t border-gray-800">
        <div class="container mx-auto px-4 py-6">
            {{ __('Made with 💖 by') }} <a href="https://github.com/doougui" target="_blank" class="link" rel="noopener">Doougui</a>
            &middot;
            {{ __('Powered By') }}: <a href="https://www.igdb.com/api" target="_blank" rel="noopener" class="link">IGDB API</a>
            &middot;
            {!! __('Icons made by <a href=":creator_link" class="link" title=":creator_name">:creator_name</a> from <a class="link" href=":from_link" title=":from_name">:from_short_link</a>', [
                'creator_link' => 'https://www.freepik.com',
                'creator_name' => 'Freepik',
                'from_link' => 'https://www.flaticon.com/',
                'from_name' => 'Flaticon',
                'from_short_link' => 'www.flaticon.com'
            ]) !!}
        </div>
    </footer>

    @livewireScripts
    <script src="{{ asset('/js/app.js') }}"></script>
</body>
</html>
