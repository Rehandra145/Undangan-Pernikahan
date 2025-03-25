<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aqul & Nesa</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Text:ital@0;1&family=Pinyon+Script&display=swap" rel="stylesheet">

    <!-- Swiper Carousel -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">
</head>

<style>
    body {
        background-image: url("{{ asset('storage/IMG_5090.JPG') }}");
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
    }
</style>

<body class="h-screen overflow-y-auto bg-gray-900 text-white">
    <div class="bg-black bg-opacity-50 min-h-screen w-full flex flex-col items-center text-center px-10">

        <!-- Navbar -->
        <x-navbar />

        <!-- Home Section -->
        <x-home />

        <!-- Tujuan Section -->
        <x-tujuan />

        <!-- Date Section -->
        <x-date />

        <!-- Location Section -->
        <x-location />

        <!-- Gallery Section (Carousel) -->
        <x-gallery />

        <!-- Story Section -->
        <x-story />

        <!-- Comment Section -->
        <x-comment />

        <!-- Gift Section -->
        <x-gift />

        <!-- Modal -->
        <x-modal />
    </div>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

    <!-- Vite -->
    @vite(['resources/js/app.js'])

</body>
</html>
