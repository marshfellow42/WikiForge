<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>First Screen</title>
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
        <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    </head>

    <body>
        <button type="button" class="btn btn-primary position-absolute top-50 start-50 translate-middle">Hello There My Friend</button>
    </body>

</html>
