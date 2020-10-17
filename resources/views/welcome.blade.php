<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="alert alert-primary" role="alert">
            A simple primary alert—check it out!
        </div>
        <div class="alert alert-secondary" role="alert">
          A simple secondary alert—check it out!
        </div>
        <div class="alert alert-success" role="alert">
          A simple success alert—check it out!
        </div>
        <div class="alert alert-danger" role="alert">
          A simple danger alert—check it out!
        </div>
        <div class="alert alert-warning" role="alert">
          A simple warning alert—check it out!
        </div>
        <div class="alert alert-info" role="alert">
          A simple info alert—check it out!
        </div>
        <div class="alert alert-light" role="alert">
          A simple light alert—check it out!
        </div>
        <div class="alert alert-dark" role="alert">
          A simple dark alert—check it out!
        </div>
    </body>
</html>
