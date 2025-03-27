<div class="fixed bottom-5 left-5 bg-opacity-70 p-3 rounded-xl flex items-center space-x-3">
    <button onclick="toggleMusic()" class="text-white p-2 rounded-lg">
        <img id="musicIcon" src="{{url('storage/sound.png')}}" alt="Music Icon" class="w-6 h-6">
    </button>
</div>

<audio id="bgMusic" loop autoplay>
    <source src="{{ asset('storage/yung kai - blue.mp3') }}" type="audio/mpeg">
    Browser tidak mendukung audio.
</audio>

<script>
    let audio = document.getElementById("bgMusic");
    let musicIcon = document.getElementById("musicIcon");

    function toggleMusic() {
        if (audio.paused) {
            audio.play();
            musicIcon.src = "{{ url('storage/sound.png') }}";
        } else {
            audio.pause();
            musicIcon.src = "{{ url('storage/no-sound.png') }}";
        }
    }

    // Coba autoplay saat halaman dimuat
    window.onload = function () {
        let playPromise = audio.play();
        if (playPromise !== undefined) {
            playPromise.then(() => {
                // Musik berhasil diputar
            }).catch(() => {
                // Autoplay dicegah, bisa menampilkan tombol play manual
                console.log("Autoplay diblokir oleh browser.");
            });
        }
    };
    </script>
