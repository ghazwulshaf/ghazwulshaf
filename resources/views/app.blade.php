<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($pageTitle) ? $pageTitle : 'Ghazwul Shaf' }}</title>
    @vite('resources/css/app.css')
    @stack('styles')
    <script src="https://kit.fontawesome.com/53790a54cf.js" crossorigin="anonymous"></script>
</head>
<body class="relative min-h-screen">
    @yield('children')

    @stack('scripts')
</body>
</html>