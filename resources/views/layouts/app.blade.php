<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="dist/styles.css"/>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet">
    <style>
        .datatable-input {
            width: 100%;
            padding: 8px;
            font-size: 14px;
            border: 2px solid rgb(163,163,163);
            border-radius: 4px;
            outline: none;
        }

        .datatable-input:focus {
            width: 100%;
            padding: 8px;
            font-size: 14px;
            border: 2px solid rgb(30, 30, 30);
            border-radius: 4px;
            outline: none;
        }
    </style>
</head>
<body>
    <div class="w-full flex items-center">
        @include('layouts.sidebar')
        @yield('content')

    </div>
</body>
</html>
