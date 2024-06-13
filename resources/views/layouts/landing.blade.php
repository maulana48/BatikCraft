<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ? $title : '' }}</title>
    <link rel="shortcut icon" href="{{ asset('icon/' . $icon) }}" type="image/x-icon">
    @vite('resources/css/app.css')

    <link rel="stylesheet" href="{{ asset('ecommerce-template-tailwind-1-main/public') }}/assets/css/main.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Roboto:wght@400;500;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/') }}@fortawesome/fontawesome-free/css/all.min.css">

    @livewireStyles
</head>

<body>
    {{ $slot }}
</body>


</html>
