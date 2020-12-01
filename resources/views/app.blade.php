@php
$links = [
    [
        'Wiki',
        route('wiki.index'),
        false,
    ],
    [
        'Actualités',
        route('posts.index'),
        request()->routeIs('posts.index'),
    ],
    [
        'Agenda',
        '#',
        false,
    ],
];
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Windjammers France</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</head>

<body class="antialiased">
    @include('parts.navbar',[
        'isHome' => request()->routeIs('home'), 
        'links' => $links,
    ])
    <main class="min-h-screen font-body">
        @yield('content')
    </main>
    @include('parts.footer')
    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
</body>
</html>