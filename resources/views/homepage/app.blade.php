<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ghazwul Shaf</title>
    @vite('resources/css/app.css')
    <script src="https://kit.fontawesome.com/53790a54cf.js" crossorigin="anonymous"></script>
</head>
<body class="relative">
    @include('homepage._layouts.header')
    @yield('content')
    @include('homepage._layouts.footer')

    <button onclick="toTop()" class="fixed right-4 bottom-4 p-4 rounded bg-primary text-white">
        <i class="fa-solid fa-arrow-up-long"></i>
    </button>

    <script>
        let screenHeight = screen.height
        let bodyHeight = document.body.offsetHeight

        if (bodyHeight < screenHeight) {
            document.body.classList.add("h-screen")
        } else {
            document.body.classList.remove("h-screen")
        }

        function toTop() {
            document.body.scrollTop = 0
            document.documentElement.scrollTop = 0
        }
    </script>
    @stack('scripts')
</body>
</html>