<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title }}</title>

    <link rel="stylesheet" href="http://localhost:8000/assets/css/main/app.css" />
    <link rel="stylesheet" href="http://localhost:8000/assets/css/main/app-dark.css" />
    <link rel="shortcut icon" href="http://localhost:8000/assets/images/logo/favicon.svg" type="image/x-icon" />
    <link rel="shortcut icon" href="http://localhost:8000/assets/images/logo/favicon.png" type="image/png" />

    <link rel="stylesheet" href="http://localhost:8000/assets/css/shared/iconly.css" />

    {{-- CKEditor --}}
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

</head>

<body>
    <script src="http://localhost:8000/assets/js/initTheme.js"></script>

    @include('layouts.sidebar')
    @yield('content')
    @include('layouts.footer')

    <script src="http://localhost:8000/assets/js/bootstrap.js"></script>
    <script src="http://localhost:8000/assets/js/app.js"></script>

    <!-- Need: Apexcharts -->
    <script src="http://localhost:8000/assets/extensions/apexcharts/apexcharts.min.js"></script>
    <script src="http://localhost:8000/assets/js/pages/dashboard.js"></script>
</body>

</html>
