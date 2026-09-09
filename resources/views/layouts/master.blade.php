<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APIIT - @yield('title')</title>
    
</head>
<body>
    <x-navbar />
    
    <main>
        @yield('content')
    </main>
    <x-footer />
    
</body>
</html>