<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit story</title>
    @vite(['resources/css/app.css'])
</head>

<body class="bg-gray-50 flex h-screen overflow-hidden">
    <!-- Sidebar -->
    <x-sidebar />
    <div class="ml-64 flex-1 p-8 overflow-y-auto">
        <x-session />
        <div class="flex justify-between items-center mb-8 ml-5">
            <h1 class="text-3xl font-bold text-gray-800">Edit {{$story->title}}</h1>
        </div>
        <!-- Form Tambah Story -->
        <div class="w-[58rem] ml-4 bg-white rounded-xl shadow-lg overflow-hidden p-8">
            <form action="{{ route('stories.update', $story->id) }}" method="POST" id="form-edit-event" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div>
                    <label for="title" class="block text-gray-700 font-medium">Title</label>
                    <input type="text" name="title" id="title" placeholder="Masukkan judul" value="{{ $story->title }}"
                        class="w-full mt-2 p-3 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200">
                </div>
                <div class="mt-2">
                    <label for="caption" class="block text-gray-700 font-medium">Caption</label>
                    <textarea id="caption" name="caption" rows="3"
                        class="w-full mt-2 p-3 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200">{{ $story->caption }}</textarea>
                </div>
                <div class="mt-2">
                    <label for="image" class="block text-gray-700 font-medium">Upload Image</label>
                    <input type="file" id="image" name="imagePath" accept="image/*"
                        class="w-full mt-2 p-3 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200">
                    <div id="selected-file-name" class="mt-2 text-gray-600"></div>
                    <div id="image-preview" class="mt-2">
                        @if ($story->imagePath)
                            <img src="{{ asset('storage/' . $story->imagePath) }}" alt="Current Image" class="w-90 h-55 mt-2 rounded-lg">
                        @endif
                    </div>
                </div>
                <!-- Tombol Submit -->
                <div class="mt-6 flex">
                    <button type="submit" form="form-edit-event"
                        class="bg-blue-600 text-white py-2 px-6 rounded-lg hover:bg-blue-700 transition">
                        Kirim
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('image').addEventListener('change', function (e) {
            const file = e.target.files[0];
            const fileNameDisplay = document.getElementById('selected-file-name');
            const imagePreview = document.getElementById('image-preview');

            if (file) {
                fileNameDisplay.textContent = `Selected file: ${file.name}`;
                const reader = new FileReader();
                reader.onload = function (event) {
                    imagePreview.innerHTML = `<img src="${event.target.result}" alt="Preview" class="w-90 h-55 mt-2 rounded-lg">`;
                }
                reader.readAsDataURL(file);
            } else {
                fileNameDisplay.textContent = "";
                imagePreview.innerHTML = "";
            }
        });
    </script>
</body>

</html>
