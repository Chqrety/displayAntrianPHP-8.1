<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta content="ie=edge" http-equiv="X-UA-Compatible" />
    <title>Laravel</title>
    {{-- @vite('resources/css/app.css') --}}
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <main class="bg-[#40a2da]">
        {{-- <main class="bg-gradient-to-r from-[#40a2da] to-[#86c548]"> --}}
        @yield('content')
    </main>
    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>
