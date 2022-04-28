<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" style="height: 100%">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">

        <title>Laravel</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <link href="https://unpkg.com/vuesax@4.0.1-alpha.16/dist/vuesax.min.css" rel="stylesheet">
        <style>
            a {
                text-decoration: none;
                color: rgb(255, 255, 255)
            }
        </style>
    </head>
    <body vs-theme="dark" style="background: -webkit-linear-gradient(45deg, rgb(91, 60, 196), rgb(36, 33, 69)); background: -moz-linear-gradient(45deg, rgb(91, 60, 196), rgb(36, 33, 69)); background: linear-gradient(45deg, rgb(91, 60, 196), rgb(36, 33, 69));">
        <div id="app"></div>
        @routes
        <script src="{{ mix('/js/app.js') }}"></script>
    </body>
</html>
