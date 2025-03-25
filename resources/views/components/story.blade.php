<section id="aboutUs" class="h-screen flex flex-col justify-center items-center px-10 text-center">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Awal Hubungan -->
        <div class="cursor-pointer" onclick="openModal('awal')">
            <img src="{{ asset('storage/IMG_5069.JPG') }}" alt="Awal Hubungan" class="rounded-lg shadow-lg">
            <p class="mt-2 text-xl font-serif">Awal Hubungan</p>
        </div>

        <!-- Lamaran -->
        <div class="cursor-pointer" onclick="openModal('lamaran')">
            <img src="{{ asset('storage/IMG_5106.JPG') }}" alt="Lamaran" class="rounded-lg shadow-lg">
            <p class="mt-2 text-xl font-serif">Lamaran</p>
        </div>

        <!-- Akad -->
        <div class="cursor-pointer" onclick="openModal('akad')">
            <img src="{{ asset('storage/IMG_5148.JPG') }}" alt="Akad" class="rounded-lg shadow-lg">
            <p class="mt-2 text-xl font-serif">Akad</p>
        </div>
    </div>
</section>
