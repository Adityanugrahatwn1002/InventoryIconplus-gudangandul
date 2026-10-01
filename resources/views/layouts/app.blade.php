<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') - ICON PLUS INVENTORY</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="d-flex">

        @include('layouts.sidebar')

        <div class="flex-grow-1">

            @include('layouts.headbar')

            <div class="p-4 bg-light" style="min-height: calc(100vh - 60px);">
                @yield('content')
            </div>

        </div>

    </div>
</body>
</html>
