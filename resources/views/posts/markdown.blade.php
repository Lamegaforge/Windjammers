<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Windjammers France</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="prose max-w-none">
    @markdown($content)
    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
</body>

</html>