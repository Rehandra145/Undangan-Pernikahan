<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    @vite(['resources/css/app.css'])
</head>

<body class="bg-gray-50 flex h-screen overflow-hidden">
    <x-sidebar />

    <div class="flex-1 px-4 py-8 overflow-y-auto mt-6 lg:mt-0">
        <!-- Header Section -->
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-3xl font-bold text-gray-800">Tamu</h1>
            <a href="{{ route('guest.create') }}"
                class="bg-blue-600 text-white py-2 px-6 rounded-lg hover:bg-blue-700 transition flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                        clip-rule="evenodd" />
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
                                        @if ($guest->status == 'hadir')
                                            <span
                                                class="inline-block px-3 py-1 text-sm font-semibold text-green-700 bg-green-100 rounded-full">Hadir</span>
                                        @elseif ($guest->status == 'tidak hadir')
                                            <span
                                                class="inline-block px-3 py-1 text-sm font-semibold text-red-700 bg-red-100 rounded-full">Tidak
                                                Hadir</span>
                                        @else
                                            <span
                                                class="inline-block px-3 py-1 text-sm font-semibold text-yellow-700 bg-yellow-100 rounded-full">Menunggu</span>
                                        @endif
                                    </td>
                                    <td class="px-3 sm:px-6 py-4 border border-gray-200 text-center">
                                        <div class="flex flex-col sm:flex-row gap-2 justify-center">
                                            <a href="{{ route('guest.edit', $guest->id) }}"
                                                class="py-2 px-4 bg-blue-500 rounded-lg text-white transition hover:bg-blue-600 text-sm sm:text-base w-full sm:w-auto">Edit</a>
                                            <form action="{{ route('guest.delete', $guest->id) }}" method="POST"
                                                class="w-full sm:w-auto">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="py-2 px-4 bg-red-500 rounded-lg text-white transition hover:bg-red-600 text-sm sm:text-base w-full">Delete</button>
                                            </form>
                                            <a href="{{ url(auth()->id() . '/undangan/' . $guest->slug) }}"
                                                class="py-2 px-4 bg-green-500 rounded-lg text-white transition hover:bg-green-600 text-sm sm:text-base w-full sm:w-auto">Share</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Statistik -->
            <div class="mt-8 grid grid-cols-1 md:grid-cols-4 gap-6">
                <!-- Total Tamu -->
                <div class="bg-white p-6 rounded-xl shadow-lg">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-blue-100 mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-gray-500 text-sm">Total Tamu</p>
                            <p class="text-2xl font-bold text-gray-800">{{ $total }}</p>
                        </div>
                    </div>
                </div>

                <!-- Konfirmasi Hadir -->
                <div class="bg-white p-6 rounded-xl shadow-lg">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-green-100 mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-gray-500 text-sm">Konfirmasi Hadir</p>
                            <p class="text-2xl font-bold text-gray-800">{{ $hadir }}</p>
                        </div>
                    </div>
                </div>

                <!-- Belum Konfirmasi -->
                <div class="bg-white p-6 rounded-xl shadow-lg">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-yellow-100 mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-gray-500 text-sm">Belum Konfirmasi</p>
                            <p class="text-2xl font-bold text-gray-800">{{ $belum }}</p>
                        </div>
                    </div>
                </div>

                <!-- Tidak Hadir -->
                <div class="bg-white p-6 rounded-xl shadow-lg">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-red-100 mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-gray-500 text-sm">Tidak Hadir</p>
                            <p class="text-2xl font-bold text-gray-800">{{ $nggak }}</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>

</html>
