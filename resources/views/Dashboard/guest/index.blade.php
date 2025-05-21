<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    @vite(['resources/css/app.css'])
</head>

<body class="bg-gray-50 flex h-screen overflow-hidden">
    <x-sidebar/>
    <div class="flex-1 px-4 py-8 overflow-y-auto mt-6 lg:mt-0">
        <!-- Header Section -->
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-3xl font-bold text-gray-800">Tamu</h1>
            <a href="{{ route('guest.create') }}" class="bg-blue-600 text-white py-2 px-6 rounded-lg hover:bg-blue-700 transition flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                </svg>
                Tambah Tamu
            </a>
        </div>

        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <!-- Banner / Header -->
            <div class="bg-gradient-to-r from-pink-200 to-purple-200 p-8 text-center">
                <h2 class="text-3xl font-serif font-bold text-gray-800">Daftar Nama Tamu</h2>
                <p class="text-gray-700 mt-2 italic">Undangan Pernikahan</p>
            </div>

            <!-- Detail tamu -->
            <div class="p-8">
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse border border-gray-200 shadow-sm">
                        <thead>
                            <tr class="bg-gray-100 text-gray-700">
                                <th class="px-6 py-3 text-left border border-gray-200">Nama Tamu</th>
                                <th class="px-6 py-3 text-left border border-gray-200">Alamat</th>
                                <th class="px-6 py-3 text-center border border-gray-200">Status</th>
                                <th class="px-6 py-3 text-center border border-gray-200">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($guests as $guest)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="px-6 py-4 border border-gray-200">{{ $guest->name }}</td>
                                    <td class="px-6 py-4 border border-gray-200">{{ $guest->alamat }}</td>
                                    <td class="px-6 py-4 border border-gray-200 text-center">
                                        <span class="inline-block px-3 py-1 text-sm font-semibold text-green-700 bg-green-100 rounded-full">Hadir</span>
                                    </td>
                                    <td class="px-3 sm:px-6 py-4 border border-gray-200 text-center">
                                        <div class="flex flex-col sm:flex-row gap-2 justify-center">
                                            <a href="{{route('guest.edit', $guest->id)}}" class="py-2 px-4 bg-blue-500 rounded-lg text-white transition hover:bg-blue-600 text-sm sm:text-base w-full sm:w-auto">Edit</a>

                                            <form action="{{route('guest.delete', $guest->id)}}" method="POST" class="w-full sm:w-auto">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="py-2 px-4 bg-red-500 rounded-lg text-white transition hover:bg-red-600 text-sm sm:text-base w-full">Delete</button>
                                            </form>

                                            <a href="{{ url(auth()->id() . '/mengundang/' . $guest->slug) }}" class="py-2 px-4 bg-green-500 rounded-lg text-white transition hover:bg-green-600 text-sm sm:text-base w-full sm:w-auto">Share</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
