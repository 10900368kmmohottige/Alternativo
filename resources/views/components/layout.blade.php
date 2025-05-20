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
    <x-header></x-header>
    <div class="flex items-center flex-col mt-10 mb-10">
        <div class="w-full max-w-screen-lg h-max px-[20px]">
            {{$slot}}
        </div>
    </div>
    <x-footer></x-footer>
</body>
</html>
