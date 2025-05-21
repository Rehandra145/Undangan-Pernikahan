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
    <script>
        // Simpan semua url background dari elemen dengan Tailwind `bg-[url(...)]`
        const extractBgUrls = () => {
          const bgElements = document.querySelectorAll('[class*="bg-[url"]');
          const urls = [];
          bgElements.forEach(el => {
            const style = getComputedStyle(el);
            const match = style.backgroundImage.match(/url\("?(.*?)"?\)/);
            if (match && match[1]) {
              urls.push(match[1]);
            }
          });
          return urls;
        };

        const preloadImages = (urls) => {
          const imagePromises = urls.map(url => new Promise(resolve => {
            const img = new Image();
            img.src = url;
            img.onload = resolve;
            img.onerror = resolve;
          }));
          return Promise.all(imagePromises);
        };

        // Tunggu hingga DOM + gambar + bg selesai dimuat
        window.addEventListener("load", async () => {
          const bgUrls = extractBgUrls();

          const imgTags = Array.from(document.images).map(img => img.src);
          const allImages = [...new Set([...imgTags, ...bgUrls])];

          await preloadImages(allImages);

          // Sembunyikan preloader
          document.getElementById("preloader").style.display = "none";
          document.getElementById("content").style.display = "block";
        });
      </script>
</head>

@vite(['resources/css/app.css'])
<body class="h-screen overflow-y-auto bg-gray-900 text-white bg-im">

    <div id="preloader" class="fixed inset-0 bg-white z-50 flex flex-col items-center justify-center transition-opacity duration-500">
        <div class="w-16 h-16 rounded-full border-4 border-t-transparent border-gray-600 animate-spin mb-4"></div>
        <p class="text-gray-600 text-lg animate-pulse">Loading...</p>
    </div>

    <div id="content" class="hidden">
        <!-- Cover modal -->
        <x-cover :guest="$guest ?? (object)['name' => 'Tamu']" />

        <div id="mainContent"
            class="hidden bg-black bg-opacity-50 min-h-screen w-full flex flex-col items-center text-center px-10 bg-cover bg-center bg-fixed sm:bg-[url('{{ asset('storage/IMG_5090.JPG') }}')] bg-[url('{{ asset('storage/IMG_5125.JPG') }}')]">
            <!-- Navbar -->
            <x-navbar />

            <!-- Home Section -->
            <x-home :event="$event ?? (object)[['groom_name'=>'Aqul'], ['bride_name'=>'nesa']]"/>

            <!-- Tujuan Section -->
            <x-tujuan />

            <!-- Informasi Section -->
            <x-information />

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
    </div>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

    <!-- Vite -->
    @vite(['resources/js/app.js'])

</body>

</html>
