<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Tamu</title>
</head>

@vite(['resources/css/app.css'])

<body class="bg-gray-50 flex h-screen overflow-hidden">
    <!-- Sidebar -->
    <x-sidebar />
    <div class="flex-1 py-8 overflow-y-auto mt-6 lg:mt-0">
        <div class="flex justify-between items-center mb-8 ml-5">
            <h1 class="text-3xl font-bold text-gray-800">Edit Event</h1>
        </div>

        <!-- Menampilkan Error -->
        <x-session/>

        <!-- Form Tambah Tamu -->
        <div class="mx-4 md:ml-4 bg-white rounded-xl shadow-lg overflow-hidden p-4 md:p-8">
            <form action="{{ route('web.store') }}" method="POST" id="form-edit-event">
                @csrf
                <!-- Grid untuk Nama Pengantin dan Tanggal & Waktu -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Nama Pengantin -->
                    <div>
                        <label for="pria" class="block text-gray-700 font-medium">Nama Pengantin</label>
                        <input type="text" name="groom_name" id="pria" placeholder="Nama Pengantin Pria"
                            required
                            class="w-full mt-2 p-3 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200">
                        <input type="text" name="bride_name" id="wanita" placeholder="Nama Pengantin Wanita"
                            required
                            class="w-full mt-2 p-3 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200">
                    </div>
        
                    <!-- Tanggal dan Waktu -->
                    <div>
                        <label for="tanggal" class="block text-gray-700 font-medium mt-4 md:mt-0">Tanggal dan Waktu</label>
                        <input type="date" name="date" id="tanggal" required
                            class="w-full mt-2 p-3 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200">
                        <input type="time" name="time" id="waktu" required
                            class="w-full mt-2 p-3 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200">
                    </div>
                </div>
        
                <!-- Alamat -->
                <div class="mt-4">
                    <label for="alamat" class="block text-gray-700 font-medium">Alamat</label>
                    <input type="text" name="place" id="alamat" placeholder="Alamat Acara" required
                        class="w-full mt-2 p-3 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200">
                    <input type="text" name="maps" id="linkAddres" placeholder="Link GMaps Lokasi" required
                        class="w-full mt-2 p-3 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200">
                    <input type="text" name="embed_maps" id="linkAddres" placeholder="Link Embed Maps" required
                        class="w-full mt-2 p-3 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200">
                </div>
            </form>
        </div>
        
        <!-- Tombol Submit di Luar Card -->
        <div class="mt-6 flex justify-center md:justify-start md:ml-4">
            <button type="submit" form="form-edit-event"
                class="bg-blue-600 text-white py-2 px-6 rounded-lg hover:bg-blue-700 transition">
                Kirim
            </button>
        </div>
    </div>
</body>

</html>
