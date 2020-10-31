<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ env('APP_NAME', 'Lumen') }}</title>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@400&display=swap" rel="stylesheet">
    <link href="{{ url('/css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100">

<div class="container lg:px-20 mx-auto my-12">
    @yield('content')
</div>

</body>
</html>
