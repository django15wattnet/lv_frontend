<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'LV Frontend')</title>
    @vite('resources/css/app.css')
    @vite('resources/css/articleList.css')
</head>
<body class="antialiased">
<header class="2xl:p-6 xl:p-4 lg:p-2 md:p-1 sm:p-1">
    <nav class="grid md:grid-cols-4 gap-4 2xl:text-2xl xl:text-xl lg:text:lg md:text-md sm:text-sm">
        <a
            href="/"
            class="logo">
            <img
                class="2xl:w-40 xl:w-32 lg:w-24 md:w-20 sm:w-24 w-24"
                src="https://lv.de/img/logo.svg"
                title="Logo"
                alt="Logo">
        </a>
        <div class="col-span-3">
            Seitentitel
        </div>
    </nav>
</header>

<div class="content 2xl:p-6 xl:p-4 lg:p-2 md:p-1 sm:p-1 grid grid-cols-4 2xl:text-xl xl:text-xl lg:text:lg md:text-md sm:text-sm">
    <main class="md:col-span-3 max-md:col-span-4 pb-6">
        @yield('content')
    </main>
    <aside class="max-md:hidden pl-2">
        @yield('sidebar', 'Default sidebar')
    </aside>
</div>

@vite('resources/js/app.js')
<div id="size" class="text-center text-sm">Breakpoint
    <div class="2xl:inline xl:hidden lg:hidden md:hidden sm:hidden">2xl</div>
    <div class="2xl:hidden xl:inline lg:hidden md:hidden sm:hidden">xl</div>
    <div class="2xl:hidden xl:hidden lg:inline md:hidden sm:hidden">lg</div>
    <div class="2xl:hidden xl:hidden lg:hidden md:inline sm:hidden">md</div>
    <div class="2xl:hidden xl:hidden lg:hidden md:hidden max-sm:inline">sm</div>
</div>
</body>
</html><?php
