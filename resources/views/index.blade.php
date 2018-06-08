<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="well">
                        <div class="react-redirect-form" data-list="{{ json_encode($urls) }}"></div>
                    </div>
                </div>
            </div>
        </div>

        <script src="{{asset('js/app.js')}}" ></script>
    </body>
</html>