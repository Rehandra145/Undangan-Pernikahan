<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

<style>
    .swiper-container {
        width: 60%;
        max-width: 60%;
        overflow: hidden;
    }

    .swiper-slide {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .swiper-button-next,
    .swiper-button-prev {
        color: white;
    }
</style>

<section id="gallery" class="h-screen flex flex-col justify-center items-center px-10 text-center w-full">
    <div class="swiper-container max-w-6xl w-full relative">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="{{ asset('storage/IMG_5069.JPG') }}" alt="Gallery 1" class="w-full h-auto rounded-lg shadow-lg">
            </div>
            <div class="swiper-slide">
                <img src="{{ asset('storage/IMG_5106.JPG') }}" alt="Gallery 2" class="w-full h-auto rounded-lg shadow-lg">
            </div>
            <div class="swiper-slide">
                <img src="{{ asset('storage/IMG_5148.JPG') }}" alt="Gallery 3" class="w-full h-auto rounded-lg shadow-lg">
            </div>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        var swiper = new Swiper(".swiper-container", {
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            slidesPerView: 1,
            spaceBetween: 10,
        });
    });
</script>
