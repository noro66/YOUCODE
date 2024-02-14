<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet" />
    <title>{{config('app.name')}} | @yield('title')</title>
</head>

<body class="h-auto >

<div class=" container mx-auto ">
    @yield('content')
</div>

<script>
    const mobileButton = document.getElementById('mobile-button');
    const mobileMenu = document.getElementById('mobile-menu');

    mobileButton.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden')
    });
</script>
</body>

</html>
