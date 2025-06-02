<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Event</title>
    @vite(['resources/css/app.css'])
</head>

<body class="bg-gray-50 flex h-screen overflow-hidden">
    <x-sidebar />

    <div class="flex-1 py-8 overflow-y-auto mt-6 lg:mt-0">
        <div class="flex justify-between items-center mb-8 ml-5">
            <h1 class="text-3xl font-bold text-gray-800">Edit Event</h1>
        </div>

        <x-session />

        <div class="mx-4 md:ml-4 bg-white rounded-xl shadow-lg overflow-hidden p-4 md:p-8">
            <form action="{{ route('web.store') }}" method="POST" id="form-edit-event" enctype="multipart/form-data"> @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-gray-700 font-medium">Pengantin Pria</label>
                        <input type="text" name="groom_name" placeholder="Nama Lengkap Pria"
                            class="w-full mt-2 p-3 border border-gray-300 rounded-lg"
                            value="{{ old('groom_name', $event->groom_name ?? '') }}">
                        <input type="text" name="groom_daily_name" placeholder="Nama Panggilan Pria"
                            class="w-full mt-2 p-3 border border-gray-300 rounded-lg"
                            value="{{ old('groom_daily_name', $event->groom_daily_name ?? '') }}">
                        <input type="text" name="groom_fathers_name" placeholder="Nama Ayah Pria"
                            class="w-full mt-2 p-3 border border-gray-300 rounded-lg"
                            value="{{ old('groom_fathers_name', $event->groom_fathers_name ?? '') }}">
                        <input type="text" name="groom_mothers_name" placeholder="Nama Ibu Pria"
                            class="w-full mt-2 p-3 border border-gray-300 rounded-lg"
                            value="{{ old('groom_mothers_name', $event->groom_mothers_name ?? '') }}">
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium">Pengantin Wanita</label>
                        <input type="text" name="bride_name" placeholder="Nama Lengkap Wanita"
                            class="w-full mt-2 p-3 border border-gray-300 rounded-lg"
                            value="{{ old('bride_name', $event->bride_name ?? '') }}">
                        <input type="text" name="bride_daily_name" placeholder="Nama Panggilan Wanita"
                            class="w-full mt-2 p-3 border border-gray-300 rounded-lg"
                            value="{{ old('bride_daily_name', $event->bride_daily_name ?? '') }}">
                        <input type="text" name="bride_fathers_name" placeholder="Nama Ayah Wanita"
                            class="w-full mt-2 p-3 border border-gray-300 rounded-lg"
                            value="{{ old('bride_fathers_name', $event->bride_fathers_name ?? '') }}">
                        <input type="text" name="bride_mothers_name" placeholder="Nama Ibu Wanita"
                            class="w-full mt-2 p-3 border border-gray-300 rounded-lg"
                            value="{{ old('bride_mothers_name', $event->bride_mothers_name ?? '') }}">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6">
                    <div>
                        <label class="block text-gray-700 font-medium">Akad</label>
                        <input type="date" name="akad_date" class="w-full mt-2 p-3 border border-gray-300 rounded-lg"
                            value="{{ old('akad_date', $event->akad_date ?? '') }}">
                        <input type="time" name="akad_time" class="w-full mt-2 p-3 border border-gray-300 rounded-lg"
                            value="{{ old('akad_time', $event->akad_time ?? '') }}">
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium">Resepsi</label>
                        <input type="date" name="resepsi_date"
                            class="w-full mt-2 p-3 border border-gray-300 rounded-lg"
                            value="{{ old('resepsi_date', $event->resepsi_date ?? '') }}">
                        <input type="time" name="resepsi_time"
                            class="w-full mt-2 p-3 border border-gray-300 rounded-lg"
                            value="{{ old('resepsi_time', $event->resepsi_time ?? '') }}">
                    </div>
                </div>

                <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="surah" class="block text-gray-700 font-medium">Pilih Surah</label>
                        <select name="surah" id="surah" required
                            class="w-full mt-2 p-3 border border-gray-300 rounded-lg">
                            <option value="">-- Pilih Surah --</option>
                            @foreach ($surahs as $surah)
                                <option value="{{ $surah['number'] }}"
                                    @if (old('surah', $event->surah ?? '') == $surah['number']) selected @endif>
                                    {{ $surah['englishName'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="ayat" class="block text-gray-700 font-medium">Pilih Ayat</label>
                        <select name="ayat" id="ayat" required
                            class="w-full mt-2 p-3 border border-gray-300 rounded-lg">
                            <option value="">-- Pilih Ayat --</option>
                        </select>
                    </div>
                </div>

                <div class="mt-6">
                    <label for="tujuan" class="block text-gray-700 font-medium">Tujuan</label>
                    <textarea name="tujuan" id="tujuan" placeholder="Tujuan Acara"
                        class="w-full mt-2 p-3 border border-gray-300 rounded-lg" rows="4">{{ old('tujuan', $event->tujuan ?? '') }}</textarea>
                </div>

                <div class="mt-6">
                    <label for="alamat" class="block text-gray-700 font-medium">Alamat</label>
                    <input type="text" name="place" id="alamat" placeholder="Alamat Acara"
                        class="w-full mt-2 p-3 border border-gray-300 rounded-lg" value="{{ old('place', $event->place ?? '') }}">
                    <input type="text" name="maps" placeholder="Link GMaps Lokasi"
                        class="w-full mt-2 p-3 border border-gray-300 rounded-lg" value="{{ old('maps', $event->maps ?? '') }}">
                    <textarea name="embed_maps" placeholder="Link Embed Maps (iframe)"
                        class="w-full mt-2 p-3 border border-gray-300 rounded-lg" rows="4">{{ old('embed_maps', $event->embed_maps ?? '') }}</textarea>
                </div>

                <div class="mt-8 border-t pt-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Upload Media</h2>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <label class="block text-gray-700 font-medium mb-2">Desktop Background</label>
                            <p class="text-sm text-gray-500 mb-3">Gambar untuk tampilan desktop (Rekomendasi: 1920x1080px)</p>
                            <input type="file" name="imgBg" accept="image/*" id="imgBg"
                                class="w-full p-2 border border-gray-300 rounded-lg file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
                            <div class="relative mt-4 {{ ($event->imgBg ?? null) ? '' : 'hidden' }}" id="container-imgBg">
                                <button type="button"
                                    class="absolute top-1 right-1 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center hover:bg-red-600"
                                    onclick="clearImage('imgBg', 'preview-imgBg', 'container-imgBg')">×</button>
                                <img id="preview-imgBg" src="{{ ($event->imgBg ?? null) ? asset('storage/events/' . $event->imgBg) : '#' }}" alt="Preview Desktop Background" class="w-full rounded-lg shadow-sm">
                            </div>
                        </div>

                        <div class="bg-gray-50 p-4 rounded-lg">
                            <label class="block text-gray-700 font-medium mb-2">Mobile Background</label>
                            <p class="text-sm text-gray-500 mb-3">Gambar untuk tampilan mobile (Rekomendasi: 768x1024px)</p>
                            <input type="file" name="MbImgBg" accept="image/*" id="MbImgBg"
                                class="w-full p-2 border border-gray-300 rounded-lg file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
                            <div class="relative mt-4 {{ ($event->MbImgBg ?? null) ? '' : 'hidden' }}" id="container-MbImgBg">
                                <button type="button"
                                    class="absolute top-1 right-1 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center hover:bg-red-600"
                                    onclick="clearImage('MbImgBg', 'preview-MbImgBg', 'container-MbImgBg')">×</button>
                                <img id="preview-MbImgBg" src="{{ ($event->MbImgBg ?? null) ? asset('storage/events/' . $event->MbImgBg) : '#' }}" alt="Preview Mobile Background" class="w-full rounded-lg shadow-sm">
                            </div>
                        </div>

                        <div class="bg-gray-50 p-4 rounded-lg">
                            <label class="block text-gray-700 font-medium mb-2">Cover Image</label>
                            <p class="text-sm text-gray-500 mb-3">Gambar untuk halaman pembuka (Rekomendasi: 800x600px)</p>
                            <input type="file" name="CvImgBg" accept="image/*" id="CvImgBg" value="{{old('CvImgBg', $event->CvImgBg ?? '') }}"
                                class="w-full p-2 border border-gray-300 rounded-lg file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
                            <div class="relative mt-4 {{ ($event->CvImgBg ?? null) ? '' : 'hidden' }}" id="container-CvImgBg">
                                <button type="button"
                                    class="absolute top-1 right-1 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center hover:bg-red-600"
                                    onclick="clearImage('CvImgBg', 'preview-CvImgBg', 'container-CvImgBg')">×</button>
                                <img id="preview-CvImgBg" src="{{ ($event->CvImgBg ?? null) ? asset('storage/events/' . $event->CvImgBg) : '#' }}" alt="Preview Cover Image" class="w-full rounded-lg shadow-sm">
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 bg-gray-50 p-4 rounded-lg">
                        <label class="block text-gray-700 font-medium mb-2">Background Music</label>
                        <p class="text-sm text-gray-500 mb-3">Musik latar untuk undangan (Format: MP3, maksimal 5MB)</p>
                        <div class="flex items-center gap-4">
                            <input type="file"
                                name="bgm"
                                accept="audio/*"
                                id="background_music"
                                value="{{old('bgm', $event->bgm ?? '')}}"
                                class="flex-1 p-2 border border-gray-300 rounded-lg file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
                        </div>
                        <div class="mt-4" id="audio-preview-container">
                            <audio id="audio-preview" controls class="w-full {{ ($event->bgm ?? null) ? '' : 'hidden' }}">
                                <source src="{{ ($event->bgm ?? null) ? asset('storage/events/' . $event->bgm) : '' }}" type="audio/mpeg">
                                Your browser does not support the audio element.
                            </audio>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="mt-6 flex justify-center md:justify-start md:ml-4 mb-8">
            <button type="submit" form="form-edit-event"
                class="bg-blue-600 text-white py-2 px-6 rounded-lg hover:bg-blue-700 transition">
                Update Event
            </button>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const surahSelect = document.getElementById('surah');
        const ayatSelect = document.getElementById('ayat');
        const surahs = @json($surahs ?? []);

        const currentSurah = "{{ old('surah', $event->surah ?? '') }}";
        const currentAyat = "{{ old('ayat', $event->ayat ?? '') }}";

        function loadAyat(surahNumber, selectedAyat = null) {
            ayatSelect.innerHTML = '<option value="">-- Pilih Ayat --</option>';
            if (!surahNumber) return;

            if (!Array.isArray(surahs)) {
                console.error("Surah data is not available or not in expected format.");
                return;
            }

            const surahData = surahs.find(s => s.number == surahNumber);
            if (!surahData) return;

            const totalAyat = surahData.numberOfAyahs;
            for (let i = 1; i <= totalAyat; i++) {
                const option = document.createElement('option');
                option.value = i;
                option.textContent = i;
                if (selectedAyat && selectedAyat == i) {
                    option.selected = true;
                }
                ayatSelect.appendChild(option);
            }
        }

        if(surahSelect) { // Ensure surahSelect exists
            surahSelect.addEventListener('change', function() {
                loadAyat(this.value);
            });
        }


        if (currentSurah) {
            loadAyat(currentSurah, currentAyat);
        }

        function previewImage(inputId, previewId, containerId) {
            const input = document.getElementById(inputId);
            const preview = document.getElementById(previewId);
            const container = document.getElementById(containerId);

            if (!input || !preview || !container) {
                // console.error('One or more elements not found for previewImage:', inputId, previewId, containerId);
                return;
            }

            input.addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        preview.src = e.target.result;
                        container.classList.remove('hidden');
                    };
                    reader.readAsDataURL(file);
                } else {
                    // If user cancels file dialog, don't hide if it was showing an old image from server
                    // Only hide if it was the '#' placeholder initially
                    const currentSrc = preview.getAttribute('src'); // Get actual current src
                    if(currentSrc === '#' || currentSrc === (window.location.href + '#')) {
                       container.classList.add('hidden');
                    }
                }
            });
        }

        window.clearImage = function(inputId, previewId, containerId) {
            const input = document.getElementById(inputId);
            const preview = document.getElementById(previewId);
            const container = document.getElementById(containerId);

            if (!input || !preview || !container) {
                // console.error('One or more elements not found for clearImage:', inputId, previewId, containerId);
                return;
            }

            input.value = '';
            preview.src = '#';
            container.classList.add('hidden');
        }

        previewImage('imgBg', 'preview-imgBg', 'container-imgBg');
        previewImage('MbImgBg', 'preview-MbImgBg', 'container-MbImgBg');
        previewImage('CvImgBg', 'preview-CvImgBg', 'container-CvImgBg');

        const audioInput = document.getElementById('background_music');
        const audioPreview = document.getElementById('audio-preview');
        const audioSource = audioPreview ? audioPreview.querySelector('source') : null;

        if (audioInput && audioPreview && audioSource) {
             audioInput.addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    const audioUrl = URL.createObjectURL(file);
                    audioSource.src = audioUrl;
                    audioPreview.load();
                    audioPreview.classList.remove('hidden');
                } else {
                    const currentSrc = audioSource.getAttribute('src');
                    if (!currentSrc || currentSrc === '') { // Only hide if no server audio was loaded
                        audioPreview.classList.add('hidden');
                    }
                }
            });
        } else {
            // console.error("Audio elements not found for preview.");
        }
    });
    </script>
</body>
</html>
