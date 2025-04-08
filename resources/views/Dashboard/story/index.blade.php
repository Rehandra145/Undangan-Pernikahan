<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Tamu</title>
</head>

@vite(['resources/css/app.css'])

<body class="bg-gray-50 flex h-screen overflow-hidden">
    <x-sidebar />
    <div class="flex-1 px-4 py-8 overflow-y-auto mt-5 lg:mt-0">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-3xl font-bold text-gray-800">Story</h1>
            <a href="{{ route('stories.create') }}"
                class="bg-blue-600 text-white py-2 px-6 rounded-lg hover:bg-blue-700 transition flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                        clip-rule="evenodd" />
                </svg>
                Tambah
            </a>
        </div>

        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="bg-gradient-to-r from-pink-200 to-purple-200 p-8 text-center">
                <h2 class="text-3xl font-serif font-bold text-gray-800">Daftar Cerita</h2>
                <p class="text-gray-700 mt-2 italic">Cerita yang ditampilkan</p>
            </div>
            <div class="flex flex-wrap gap-4 p-6 justify-center">
                @foreach ($stories as $story)
                    <div
                        class="w-[300px] h-[400px] transition-shadow shadow-md hover:shadow-indigo-200 rounded-lg p-4 bg-white">
                        <img src="{{ Storage::url($story->imagePath) }}" alt="Story Image"
                            class="w-full h-1/2 mb-4 border border-gray-300 rounded-lg">
                        <p class="text-2xl font-bold">{{ $story->title }}</p>
                        <p class="line-clamp-2 text-gray-500">{{ $story->caption }}</p>
                        <div class="flex justify-end gap-2 mt-4">
                            <a href="{{route('stories.edit', $story->id)}}"
                                class="mb-2 bg-blue-600 hover:bg-blue-500 pl-5 pr-5 pt-2 pb-2 mt-2 text-white text-sm rounded-sm">Edit</a>
                            <form action="{{ route('stories.delete', $story->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-600 hover:bg-red-500 pl-5 pr-5 pt-2 pb-2 mt-2 text-white text-sm rounded-sm">Delete</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</body>

</html>
