@props(['title' => config('app.name')])

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-manrope bg-[#f4f3f2]">

    @isset($header)
        <header>
            {{ $header }}
        </header>
    @endisset

    <main>
        {{ $slot }}
    </main>

    @isset($footer)
        <footer>
            {{ $footer }}
        </footer>
    @endisset
</body>

</html>
