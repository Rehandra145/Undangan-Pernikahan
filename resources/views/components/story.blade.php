@props(['stories'])

<section id="aboutUs" class="w-full min-h-screen py-20 flex flex-col justify-center items-center text-center overflow-hidden">
    <!-- Stories Title -->
    <h2 class="text-3xl md:text-4xl lg:text-5xl mb-4 font-serif" style="font-family: 'DM Serif Text', serif;">Our Story</h2>
    <p class="text-base md:text-lg opacity-80 mx-auto mb-12 max-w-2xl font-serif" style="font-family: 'DM Serif Text', serif;">
        The journey that brought us together and the moments that made our love grow
    </p>
    
    <div class="w-full px-4 max-w-screen-xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-6">
            @foreach ($stories as $story)
            <div class="cursor-pointer mb-6 hover:transform hover:scale-105 transition duration-300" onclick="openModal('{{ is_object($story) ? $story->id : $story }}')">
                <img src="{{ is_object($story) ? Storage::url($story->imagePath) : asset('placeholder-image.jpg') }}"
                     alt="{{ is_object($story) ? $story->title : 'Story' }}"
                     class="rounded-lg shadow-lg w-full h-auto object-cover">
                <p class="mt-3 text-lg md:text-xl font-serif" style="font-family: 'DM Serif Text', serif;">{{ is_object($story) ? $story->title : $story }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>