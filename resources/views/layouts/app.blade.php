<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
</head>
<body>

@include('partials._splash')

<main>
    @yield('content')
</main>

@include('partials._ticker')

</body>
</html>