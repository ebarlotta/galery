<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery System</title>
    @livewireStyles
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
{{-- <body class="bg-gray-900"> --}}
    {{-- {{ $slot }} --}}
    {{-- @section('content')

    @endsection --}}
    Pruebas
    @section('content')
            <main>
                <p>Welcome to this beautiful admin panel.</p>
                </main>

                {{ $slot ?? 'ddd' }}
        {{-- @stop --}}
        @endsection
     <main>
        {{ $slot ?? ''}}
    </main>
    @livewireScripts
</body>
</html>
