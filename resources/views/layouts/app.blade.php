<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livewire Examples</title>
    <link rel="stylesheet" href="/css/app.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <livewire:styles />
</head>
<body>
    <main class="container mx-auto">
        @yield('content')
    </main>
    
    <livewire:scripts />
</body>
</html>