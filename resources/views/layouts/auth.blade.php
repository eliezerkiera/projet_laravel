<!DOCTYPE html>
<html lang="{{ $pageParams['session_language_code'] }}">

    <head>
        <meta charset="{{ $pageParams['session_language_data']->charset }}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="shortcut icon" href="{{ asset('/shortcut-icon.png') }}" type="image/x-icon">
        @livewireStyles()
        @vite(['resources/styles/style.scss'])
        @vite(['resources/scripts/script.ts'])
        <title>@yield('title')</title>
    </head>

    <body>

        <main class="container mt-3">
            @yield('content')

        </main>

        @livewireScriptConfig()
    </body>

</html>
