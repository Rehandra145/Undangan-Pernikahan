@props(['stories'])
<section id="aboutUs" class="h-screen flex flex-col justify-center items-center px-10 text-center">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach ($stories as $story)
        <div class="cursor-pointer" onclick="openModal('{{ is_object($story) ? $story->id : $story }}')">
            <img src="{{ is_object($story) ? Storage::url($story->imagePath) : asset('placeholder-image.jpg') }}"
                 alt="{{ is_object($story) ? $story->title : 'Story' }}"
                 class="rounded-lg shadow-lg">
            <p class="mt-2 text-xl font-serif">{{ is_object($story) ? $story->title : $story }}</p>
        </div>
        @endforeach
    </div>
</section>
