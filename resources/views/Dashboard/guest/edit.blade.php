<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Acara Pernikahan</title>
</head>
@vite(['resources/css/app.css'])
<body class="bg-gray-50 flex h-screen overflow-hidden">
    <!-- Improved Sidebar -->
    <x-sidebar />
    <!-- Main Content Area -->
    <div class="ml-64 flex-1 p-8 overflow-y-auto">
        <!-- Header Section -->
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Tambah Tamu</h1>
        </div>

        <!-- Main Content -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden p-8">
            <!-- Form Input -->
            <form action="{{route('guest.update', $guest->id)}}" method="POST" class="space-y-6">
                @csrf
                @method('put')
                <div>
                    <label for="nama" class="block text-gray-700 font-medium">Nama Tamu</label>
                    <input type="text" id="nama" name="name" value="{{$guest->name}}" class="w-full mt-2 p-3 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200" required>
                </div>

                <div>
                    <label for="alamat" class="block text-gray-700 font-medium">Alamat</label>
                    <textarea id="alamat" name="alamat" rows="3" class="w-full mt-2 p-3 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200" required>{{$guest->alamat}}</textarea>
                </div>
                <button type="submit" class="bg-blue-600 text-white py-2 px-6 rounded-lg hover:bg-blue-700 transition">Edit</button>
            </form>
        </div>
    </div>
</body>
</html>
