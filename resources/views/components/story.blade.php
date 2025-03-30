@props(['stories'])
<section id="aboutUs" class="h-screen flex flex-col justify-center items-center px-10 text-center">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach ($stories as $story)
        <div class="cursor-pointer" onclick="openModal('{{ $story->id }}')">
            <img src="{{ Storage::url($story->imagePath) }}" alt="{{ $story->title }}" class="rounded-lg shadow-lg">
            <p class="mt-2 text-xl font-serif">{{ $story->title }}</p>
        </div>
        @endforeach
    </div>
</section>
