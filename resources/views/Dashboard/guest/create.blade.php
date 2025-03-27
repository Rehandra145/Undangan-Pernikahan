<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Tamu</title>
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
        <h1 class="text-3xl font-bold mb-6">TAMBAH TAMU</h1>
        <form action="{{route('guest.store')}}" method="POST" class="bg-white p-6 rounded-lg shadow-md w-96">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-semibold mb-2">Nama</label>
                <input type="text" name="name" id="name" placeholder="Guest Name" required class="w-full px-4 py-2 border border-gray-300 rounded-md">
            </div>
            <div class="mb-4">
                <label for="alamat" class="block text-sm font-semibold mb-2">Alamat</label>
                <input type="text" name="alamat" id="alamat" placeholder="Address" required class="w-full px-4 py-2 border border-gray-300 rounded-md">
            </div>
            <button type="submit" class="w-full bg-black text-white py-2 rounded-md hover:bg-gray-800">Tambah</button>
        </form>
    </div>

    <div class="table-column-group"></div>
</body>
</html>
