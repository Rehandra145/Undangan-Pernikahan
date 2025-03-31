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
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Text:ital@0;1&family=Pinyon+Script&display=swap"
        rel="stylesheet">

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
</style>

@vite(['resources/css/app.css'])
<body class="h-screen overflow-y-auto bg-gray-900 text-white">

    <!-- Cover modal -->
    <x-cover :guest="$guest ?? (object)['name' => 'Tamu']" />

    <div id="mainContent"
        class="hidden bg-black bg-opacity-50 min-h-screen w-full flex flex-col items-center text-center px-10">
        <!-- Navbar -->
        <x-navbar />

        <!-- Home Section -->
        <x-home :event="$event ?? (object)[['groom_name'=>'Aqul'], ['bride_name'=>'nesa']]"/>

        <!-- Tujuan Section -->
        <x-tujuan />

        <!-- Date Section -->
        <x-date :event="$event ?? (object)['date'=>'']"/>

        <!-- Location Section -->
        <x-location :event="$event ?? (object)['maps'=>'https://maps.app.goo.gl/DWwA6b31ZixSvJm29']"/>

        <!-- Gallery Section (Carousel) -->
        <x-gallery :gallery="$gallery ?? (object)['path'=>asset('gallery/1743331796.jpg')]"/>

        <!-- Story Section -->

        <x-story :stories="$stories ?? [
            (object)['id' => 1, 'title'=> 'Akad', 'caption'=>'ini caption', 'imagePath' => asset('gallery/1743331796.jpg')],
            (object)['id' => 2, 'title'=> 'Akad', 'caption'=>'ini caption', 'imagePath' => asset('gallery/1743331796.jpg')],
            (object)['id' => 3, 'title'=> 'Akad', 'caption'=>'ini caption', 'imagePath' => asset('gallery/1743331796.jpg')]
        ]"/>

        <!-- Comment Section -->
        <x-comment />

        <!-- Gift Section -->
        <x-gift />

        <!-- Modal -->
        <x-modal :stories="$stories ?? [
            (object)['id' => 1, 'title'=> 'Akad', 'caption'=>'ini caption', 'imagePath' => asset('gallery/1743331796.jpg')],
            (object)['id' => 2, 'title'=> 'Akad', 'caption'=>'ini caption', 'imagePath' => asset('gallery/1743331796.jpg')],
            (object)['id' => 3, 'title'=> 'Akad', 'caption'=>'ini caption', 'imagePath' => asset('gallery/1743331796.jpg')]
        ]"/>

        <!-- Audio Player -->
        <x-audio />

    </div>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

    <!-- Vite -->
    @vite(['resources/js/app.js'])

</body>

</html>
