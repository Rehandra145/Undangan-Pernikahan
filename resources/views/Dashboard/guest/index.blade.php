<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex bg-gray-100 h-screen">
    <div class="w-64 bg-black text-white p-6 flex flex-col">
        <h2 class="text-2xl font-bold mb-6 text-center">DASHBOARD</h2>
        <ul class="space-y-4">
            <li><a href="#" class="text-white hover:text-gray-400">Tamu</a></li>
            <li><a href="{{route('web.index')}}" class="text-gray-400 hover:text-white">Edit Web</a></li>
            <li><a href="#" class="text-gray-400 hover:text-white">Gallery</a></li>
            <li><a href="#" class="text-gray-400 hover:text-white">Story</a></li>
        </ul>
    </div>
    <div class="flex-1 p-10">
        <h1 class="text-3xl font-bold mb-6">DAFTAR TAMU</h1>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <a href="{{ route('guest.create') }}" class="text-black py-2 px-4 border border-black rounded-md hover:bg-gray-800 hover:text-white transition">Tambah Tamu</a>
            <div class="mt-4"></div>
            <table class="w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border border-gray-300 p-2">Nama</th>
                        <th class="border border-gray-300 p-2">Alamat</th>
                        <th class="border border-gray-300 p-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($guests as $guest)
                        <tr class="text-center">
                            <td class="border border-gray-300 p-2">{{ $guest->name }}</td>
                            <td class="border border-gray-300 p-2">{{ $guest->alamat }}</td>
                            <td class="border border-gray-300 p-2 flex justify-center space-x-2">
                                <a href="{{ url('/invitation/' . $guest->slug) }}" class="text-blue-500 hover:underline">
                                    <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" id="eye" width="28" height="28" x="0" y="0" version="1.1" viewBox="0 0 512 512">
                                        <path d="M447.1 256.2C401.8 204 339.2 144 256 144c-33.6 0-64.4 9.5-96.9 29.8C131.7 191 103.6 215.2 65 255l-1 1 6.7 6.9C125.8 319.3 173.4 368 256 368c36.5 0 71.9-11.9 108.2-36.4 30.9-20.9 57.2-47.4 78.3-68.8l5.5-5.5-.9-1.1zM256 336c-44.1 0-80-35.9-80-80s35.9-80 80-80 80 35.9 80 80-35.9 80-80 80z"></path>
                                        <path d="M250.4 226.8c0-6.9 2-13.4 5.5-18.8-26.5 0-47.9 21.6-47.9 48.2s21.5 48.1 47.9 48.1 48-21.5 48-48.1c-5.4 3.5-11.9 5.5-18.8 5.5-19.1-.1-34.7-15.7-34.7-34.9z"></path>
                                      </svg>
                                </a>
                                <a href="#" class="text-green-500 hover:underline">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="22" id="share">
                                        <g fill="none" fill-rule="evenodd" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" transform="translate(1 1)">
                                          <circle cx="15" cy="3" r="3"></circle>
                                          <circle cx="3" cy="10" r="3"></circle>
                                          <circle cx="15" cy="17" r="3"></circle>
                                          <path d="m5.59 11.51 6.83 3.98M12.41 4.51 5.59 8.49"></path>
                                        </g>
                                      </svg>
                                </a>
                                <a href="#" class="text-red-500 hover:underline">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M6 8a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H7a1 1 0 0 1-1-1z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
