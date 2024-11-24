<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>YF</title>

    @include('dashboard.components.styles')
    <style>
        .edit-profile {
            margin-top: 0px !important;
            margin-bottom: 0px !important;
        }
    </style>
</head>

<body>

    @yield('content')

    @include('dashboard.components.scripts')

</body>

</html>
