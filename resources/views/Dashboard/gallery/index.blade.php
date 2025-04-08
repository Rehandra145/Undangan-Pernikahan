<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Story</title>
    @vite(['resources/css/app.css'])
</head>

<body class="bg-gray-50 flex h-screen overflow-hidden">
    <!-- Sidebar -->
    <x-sidebar />

    <div class="flex-1 px-4 py-8 overflow-y-auto mt-6 lg:mt-0">
        <x-session />

        <div class="flex justify-between items-center mb-4">
            <h1 class="text-3xl font-bold text-gray-800">Upload Gambar</h1>
        </div>

        <!-- Form Tambah Story -->
        <div class="max-w-4xl bg-white rounded-xl shadow-lg p-8">
            <form action="{{ route('galleries.store') }}" method="POST" id="form-upload" enctype="multipart/form-data">
                @csrf
                <div class="flex items-center space-x-4">
                    <div class="flex-1">
                        <label for="path" class="block text-gray-700 font-medium mb-2">Upload Image</label>
                        <input type="file" id="path" name="path" accept="image/*" required
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200">
                        </div>
                        <button type="submit"
                        class="bg-blue-600 text-white py-3 px-6 rounded-lg hover:bg-blue-700 mt-7 transition">
                        Kirim
                    </button>
                </div>
                <div id="selected-file-name" class="mt-2 text-gray-600"></div>
                <div id="image-preview" class="mt-2"></div>
            </form>

            <div class="mt-8">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Gallery Images</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    @foreach ($gallery as $item)
                    <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow p-4">
                        <img src="{{ Storage::url($item->path) }}" alt="Gallery Image"
                            class="w-full h-40 object-cover rounded-lg mb-3">
                        <div class="flex justify-center">
                            <form action="{{route("galleries.delete", $item->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-600 hover:bg-red-500 px-5 py-2 text-white text-sm rounded-md transition">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('path').addEventListener('change', function(e) {
            const file = e.target.files[0];
            const fileNameDisplay = document.getElementById('selected-file-name');
            const imagePreview = document.getElementById('image-preview');

            if (file) {
                fileNameDisplay.textContent = `Selected file: ${file.name}`;
                const reader = new FileReader();
                reader.onload = function(event) {
                    imagePreview.innerHTML = `<img src="${event.target.result}" alt="Preview" class="h-40 object-cover rounded-lg">`;
                };
                reader.readAsDataURL(file);
            } else {
                fileNameDisplay.textContent = "";
                imagePreview.innerHTML = "";
            }
        });
    </script>
</body>

</html>
