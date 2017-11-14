<!DOCTYPE html>
<html lang="km">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"name="viewport">
    <script type="text/javascript" src="{{ asset('back-end/js/dashboard/jquery.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('back-end/js/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('back-end/css/style-login.css') }}">
</head>
<body>
@yield('content')
</body>
</html>
