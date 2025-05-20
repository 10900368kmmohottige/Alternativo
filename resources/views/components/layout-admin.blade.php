<!doctype html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alternativo</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @auth
        <x-header-admin></x-header-admin>
    @endauth
    <div class="flex items-center flex-col">
        <div class="w-full max-w-screen-lg h-max px-[20px] pb-10">
            {{$slot}}
        </div>
    </div>

</body>
</html>
