<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="/css/app.css">
    <!-- Styles -->

</head>
<body>
<div class="flex-center position-ref full-height" id="app">

    <div class="content">
        <h2 class="text-center">{{$project->name}} 的代办事项</h2>
        <tasks project="{{$project->id}}"></tasks>
    </div>
</div>
<script src="/js/app.js"></script>
</body>
</html>
