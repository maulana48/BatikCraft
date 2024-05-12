<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link rel="shortcut icon" href="{{ asset('icon/' . $icon) }}" type="image/x-icon">
    @vite('resources/css/app.css')
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <link rel="stylesheet" href="{{ asset('ecommerce-template-tailwind-1-main/public') }}/assets/css/main.css">
    
    @if (isset($admin))
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Tailwind Starter Template - Night Admin Template: Tailwind Toolbox</title>
        <meta name="description" content="description here">
        <meta name="keywords" content="keywords,here">
        
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
            integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" />
        
        <style>
            .bg-black-alt {
                background: #191919;
            }
        
            .text-black-alt {
                color: #191919;
            }
        
            .border-black-alt {
                border-color: #191919;
            }
        </style>
    @else
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Roboto:wght@400;500;700&display=swap"
                rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('/') }}@fortawesome/fontawesome-free/css/all.min.css">
    @endif

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


    @livewireStyles
</head>

<body @if (isset($admin)) class="bg-black-alt font-sans leading-normal tracking-normal" @endif>
    @if (isset($admin))
            {{ $slot }}
        @livewire('dashboard.layouts.footer')
    @else
        @livewire('component.navbar')
            {{ $slot }}
        @livewire('component.footer')
    @endif

    @livewireScripts
</body>

</html>