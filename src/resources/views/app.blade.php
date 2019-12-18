<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="{{ Str::limit(setting('site.description'), 140) }}">

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600&display=swap&subset=cyrillic" rel="stylesheet">

        <title>
            {{ setting('site.title', config('app.name')) }}
        </title>
    </head>
    <body>
        <div id="app">
            <radoraw-app></radoraw-app>
        </div>

        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
