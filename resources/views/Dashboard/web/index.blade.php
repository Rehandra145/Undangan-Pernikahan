<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Tamu</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex bg-[#EDEDED] min-h-screen">
    <!-- Sidebar -->
    <div class="w-64 bg-[#1c1c1c] text-white p-6 flex flex-col">
        <h2 class="text-2xl font-bold mb-6 text-center">DASHBOARD</h2>
        <ul class="space-y-4">
            <li><a href="#" class="text-white hover:text-gray-400">Tamu</a></li>
            <li><a href="#" class="text-gray-400 hover:text-white">Edit Web</a></li>
            <li><a href="#" class="text-gray-400 hover:text-white">Gallery</a></li>
            <li><a href="#" class="text-gray-400 hover:text-white">Story</a></li>
        </ul>
    </div>

    <!-- Container Utama -->
    <div class="flex-1 p-8">
        <!-- Judul TAMBAH TAMU -->
        <h1 class="text-3xl font-bold mb-6 ml-8 text-[#1c1c1c]">EDIT WEB</h1>

        <!-- Form Tambah Tamu -->
        <div class="w-[58rem] ml-8">
            <form action="{{ route('guest.store') }}" method="POST" id="form-tambah-tamu">
                @csrf
                <!-- Grid untuk Nama Pengantin dan Tanggal & Waktu -->
                <div class="grid grid-cols-2 gap-4">
                    <!-- Nama Pengantin -->
                    <div>
                        <label for="pria" class="block text-sm font-semibold mb-2">Nama Pengantin</label>
                        <input type="text" name="pria" id="pria" placeholder="Nama Pengantin Pria" required
                            class="w-full px-4 py-2 mb-2 bg-[#EDEDED] border border-black rounded-md focus:bg-white">
                        <input type="text" name="wanita" id="wanita" placeholder="Nama Pengantin Wanita" required
                            class="w-full px-4 py-2 bg-[#EDEDED] border border-black rounded-md focus:bg-white">
                    </div>

                    <!-- Tanggal dan Waktu -->
                    <div>
                        <label for="tanggal" class="block text-sm font-semibold mb-2">Tanggal dan Waktu</label>
                        <input type="date" name="tanggal" id="tanggal" required
                            class="w-full px-4 py-2 mb-2 bg-[#EDEDED] border border-black rounded-md focus:bg-white">
                        <input type="time" name="waktu" id="waktu" required
                            class="w-full px-4 py-2 bg-[#EDEDED] border border-black rounded-md focus:bg-white">
                    </div>
                </div>

                <!-- Alamat -->
                <div class="mt-4">
                    <label for="alamat" class="block text-sm font-semibold mb-2">Alamat</label>
                    <input type="text" name="alamat" id="alamat" placeholder="Alamat Acara" required
                        class="w-full px-4 py-2 mb-2 bg-[#EDEDED] border border-black rounded-md focus:bg-white">
                    <input type="text" name="linkAddres" id="linkAddres" placeholder="Link GMaps Lokasi" required
                        class="w-full px-4 py-2 bg-[#EDEDED] border border border-black rounded-md focus:bg-white">
                </div>
            </form>
        </div>

        <!-- Tombol Submit di Luar Card -->
        <div class="mt-6 flex">
            <button type="submit" form="form-tambah-tamu"
                class="w-[70px] text-black py-2 border border-black rounded-md hover:bg-gray-800 ml-8">
                Kirim
            </button>
        </div>

    </div>
</body>

</html>
