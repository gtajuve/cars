<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Cars</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
              rel = "stylesheet">
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <!-- Styles -->
    <style>

    </style>

</head>

    <body>
        @yield('content')
        <script
                src="https://code.jquery.com/jquery-3.5.1.min.js"
                integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
                crossorigin="anonymous"></script>
        <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>


        <script src="{!! url('js/cars.js') !!}"></script>
    </body>
</html>
