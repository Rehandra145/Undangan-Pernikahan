@props(['gallery' => []])
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

<style>
    .gallery-container {
        width: 100%;
        max-width: 100%;
        position: relative;
        overflow: hidden;
    }

    .swiper-button-next,
    .swiper-button-prev {
        color: white;
    }
    
    .swiper-pagination-bullet {
        background: rgba(255, 255, 255, 0.7);
    }
    
    .swiper-pagination-bullet-active {
        background: white;
    }
    
    .gallery-image {
        width: 100%;
        height: auto;
        object-fit: contain;
        max-height: 70vh;
        border-radius: 0.5rem;
    }
    
    .swiper-slide {
        opacity: 0.4;
        transition: opacity 0.3s;
    }
    
    .swiper-slide-active {
        opacity: 1;
    }
</style>

<section id="gallery" class="min-h-screen py-16 flex flex-col justify-center items-center px-4 md:px-8 lg:px-10 text-center w-full">    
    <div class="w-full sm:w-11/12 md:w-4/5 lg:w-3/4 xl:w-2/3">
        <div class="gallery-container">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    @foreach ($gallery as $item)
                    <div class="swiper-slide flex justify-center items-center">
                        <img src="{{ is_object($item) ? Storage::url($item->path) : asset('gallery/1743331796.jpg') }}"
                            alt="Gallery Image"
                            class="gallery-image shadow-lg">
                    </div>
                    @endforeach
                </div>
                <div class="swiper-pagination mt-4"></div>
            </div>
            <div class="swiper-button-next hidden sm:flex"></div>
            <div class="swiper-button-prev hidden sm:flex"></div>
        </div>
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
            slidesPerView: 1
        });
    });
</script>