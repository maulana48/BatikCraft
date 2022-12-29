<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link rel="shortcut icon" href="{{ asset('icon/' . $icon) }}" type="image/x-icon">
    @vite('resources/css/app.css')
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        tailwind.config = {
            theme: {
                container: {
                    center: true,
                    screens: {
                        xl: '1170px',
                    },
                },
            }
        }
    </script>



    <link rel="stylesheet" href="{{ asset('ecommerce-template-tailwind-1-main/public') }}/assets/css/main.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Roboto:wght@400;500;700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet"
        href="{{ asset('ecommerce-template-tailwind-1-main/public') }}/../node_modules/@fortawesome/fontawesome-free/css/all.min.css">
    @livewireStyles
</head>

<body>
    @livewire('layouts.navbar')
        @yield('content')
    @livewire('layouts.footer')

    @livewireScripts
</body>

</html>