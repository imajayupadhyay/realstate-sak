<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title inertia>{{ config('app.name', 'Sakha Consultancy') }}</title>
        <meta name="description" content="Sakha Consultancy — Real Estate, Investment & Finance. Building value. Creating wealth.">
        <link rel="icon" type="image/png" href="/images/logo.png">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

        @vite('resources/js/app.js')
        @inertiaHead
    </head>
    <body class="antialiased">
        @inertia
    </body>
</html>
