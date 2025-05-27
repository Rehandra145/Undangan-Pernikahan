<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    @vite(['resources/css/app.css'])
    <style>
        /* Custom styles untuk modal */
        .modal-overlay {
            background-color: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(4px);
        }

        .modal-content {
            animation: modalSlideIn 0.3s ease-out;
        }

        @keyframes modalSlideIn {
            from {
                transform: scale(0.7) translateY(-20px);
                opacity: 0;
            }
            to {
                transform: scale(1) translateY(0);
                opacity: 1;
            }
        }

        .modal-exit {
            animation: modalSlideOut 0.2s ease-in;
        }

        @keyframes modalSlideOut {
            from {
                transform: scale(1) translateY(0);
                opacity: 1;
            }
            to {
                transform: scale(0.7) translateY(-20px);
                opacity: 0;
            }
        }

        /* File upload area styles */
        .file-upload-area {
            border: 2px dashed #e5e7eb;
            transition: all 0.3s ease;
        }

        .file-upload-area:hover {
            border-color: #3b82f6;
            background-color: #f8fafc;
        }

        .file-upload-area.dragover {
            border-color: #3b82f6;
            background-color: #eff6ff;
        }

        .hidden {
            display: none;
        }
    </style>
</head>

<body class="bg-gray-50 flex h-screen overflow-hidden">
    <x-sidebar />

    <div class="flex-1 px-4 py-8 overflow-y-auto mt-6 lg:mt-0">
        <!-- Header Section -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-4 gap-4">
            <h1 class="text-3xl font-bold text-gray-800">Tamu</h1>
            <div class="flex flex-col sm:flex-row gap-2 w-full sm:w-auto">
                <button onclick="openImportModal()"
                    class="bg-green-600 text-white py-2 px-6 rounded-lg hover:bg-green-700 transition flex items-center justify-center gap-2 w-full sm:w-auto order-2 sm:order-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10" />
                    </svg>
                    Import Tamu
                </button>
                <a href="{{ route('guest.create') }}"
                    class="bg-blue-600 text-white py-2 px-6 rounded-lg hover:bg-blue-700 transition flex items-center justify-center gap-2 w-full sm:w-auto order-1 sm:order-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                            clip-rule="evenodd" />
                    </svg>
                    Tambah Tamu
                </a>
            </div>
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
                @forelse ($pagin as $guest)
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
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-8 text-center text-gray-500 border border-gray-200">
                            Tidak ada data tamu yang ditemukan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination Links -->
    @if($pagin->hasPages())
        <div class="mt-6 flex justify-center">
            <div class="flex items-center space-x-1">
                {{-- Previous Page Link --}}
                @if ($pagin->onFirstPage())
                    <span class="px-3 py-2 text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                    </span>
                @else
                    <a href="{{ $pagin->previousPageUrl() }}" class="px-3 py-2 text-gray-600 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                    </a>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($pagin->getUrlRange(1, $pagin->lastPage()) as $page => $url)
                    @if ($page == $pagin->currentPage())
                        <span class="px-4 py-2 text-white bg-blue-500 rounded-lg font-medium">
                            {{ $page }}
                        </span>
                    @else
                        <a href="{{ $url }}" class="px-4 py-2 text-gray-600 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition">
                            {{ $page }}
                        </a>
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($pagin->hasMorePages())
                    <a href="{{ $pagin->nextPageUrl() }}" class="px-3 py-2 text-gray-600 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </a>
                @else
                    <span class="px-3 py-2 text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </span>
                @endif
            </div>
        </div>

        <!-- Pagination Info -->
        <div class="mt-4 text-center text-sm text-gray-600">
            Menampilkan {{ $pagin->firstItem() }} sampai {{ $pagin->lastItem() }} dari {{ $pagin->total() }} hasil
        </div>
    @endif
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

    <!-- Modal Import Tamu -->
    <div id="importModal" class="hidden fixed inset-0 z-50 flex items-center justify-center modal-overlay">
        <div class="modal-content bg-white rounded-lg shadow-2xl max-w-md w-full mx-4 p-6">
            <!-- Modal Header -->
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center mr-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800">Import Data Tamu</h3>
                </div>
                <button onclick="closeImportModal()" class="text-gray-400 hover:text-gray-600 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Modal Body -->
            <form id="importForm" action="{{ route('guest.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <p class="text-sm text-gray-600 mb-4">
                        Upload file Excel (.xlsx, .xls) atau CSV yang berisi data tamu untuk diimport ke sistem.
                    </p>

                    <!-- File Upload Area -->
                    <div class="file-upload-area rounded-lg p-6 text-center cursor-pointer" onclick="document.getElementById('fileInput').click()">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400 mx-auto mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <p class="text-gray-600 font-medium">Klik untuk memilih file</p>
                        <p class="text-gray-400 text-sm mt-1">atau drag & drop file di sini</p>
                        <p class="text-gray-400 text-xs mt-2">Format: .xlsx, .xls, .csv (Max: 10MB)</p>
                    </div>

                    <input type="file" id="fileInput" name="file" accept=".xlsx,.xls,.csv" class="hidden" onchange="updateFileName(this)">

                    <!-- Selected File Display -->
                    <div id="selectedFile" class="hidden mt-3 p-3 bg-blue-50 rounded-lg">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                <span id="fileName" class="text-sm text-blue-800 font-medium"></span>
                            </div>
                            <button type="button" onclick="removeFile()" class="text-red-500 hover:text-red-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Download Template -->
                <div class="mb-6">
                    <p class="text-sm text-gray-600 mb-2">Belum punya template?</p>
                    <a href="{{ route('guest.export') }}" class="inline-flex items-center text-blue-600 hover:text-blue-800 text-sm font-medium">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        Download Template Excel
                    </a>
                </div>

                <!-- Modal Footer -->
                <div class="flex flex-col sm:flex-row gap-3">
                    <button type="button" onclick="closeImportModal()"
                        class="w-full sm:w-1/2 py-2 px-4 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 transition font-medium">
                        Batal
                    </button>
                    <button type="submit" id="importBtn"
                        class="w-full sm:w-1/2 py-2 px-4 bg-green-600 text-white rounded-lg hover:bg-green-700 transition font-medium disabled:opacity-50 disabled:cursor-not-allowed"
                        disabled>
                        <span class="flex items-center justify-center">
                            <svg id="loadingIcon" xmlns="http://www.w3.org/2000/svg" class="animate-spin -ml-1 mr-2 h-4 w-4 text-white hidden" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            <span id="importBtnText">Import Data</span>
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openImportModal() {
            document.getElementById('importModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeImportModal() {
            const modal = document.getElementById('importModal');
            const modalContent = modal.querySelector('.modal-content');
            modalContent.classList.add('modal-exit');

            setTimeout(() => {
                modal.classList.add('hidden');
                modalContent.classList.remove('modal-exit');
                document.body.style.overflow = 'auto';
                resetForm();
            }, 200);
        }

        function updateFileName(input) {
            const file = input.files[0];
            if (file) {
                document.getElementById('fileName').textContent = file.name;
                document.getElementById('selectedFile').classList.remove('hidden');
                document.getElementById('importBtn').disabled = false;
            }
        }

        function removeFile() {
            document.getElementById('fileInput').value = '';
            document.getElementById('selectedFile').classList.add('hidden');
            document.getElementById('importBtn').disabled = true;
        }

        function resetForm() {
            document.getElementById('importForm').reset();
            document.getElementById('selectedFile').classList.add('hidden');
            document.getElementById('importBtn').disabled = true;
            document.getElementById('loadingIcon').classList.add('hidden');
            document.getElementById('importBtnText').textContent = 'Import Data';
        }

        // Handle form submission
        document.getElementById('importForm').addEventListener('submit', function(e) {
            const importBtn = document.getElementById('importBtn');
            const loadingIcon = document.getElementById('loadingIcon');
            const importBtnText = document.getElementById('importBtnText');

            importBtn.disabled = true;
            loadingIcon.classList.remove('hidden');
            importBtnText.textContent = 'Mengimpor...';
        });

        // Handle drag and drop
        const uploadArea = document.querySelector('.file-upload-area');

        uploadArea.addEventListener('dragover', function(e) {
            e.preventDefault();
            this.classList.add('dragover');
        });

        uploadArea.addEventListener('dragleave', function(e) {
            e.preventDefault();
            this.classList.remove('dragover');
        });

        uploadArea.addEventListener('drop', function(e) {
            e.preventDefault();
            this.classList.remove('dragover');

            const files = e.dataTransfer.files;
            if (files.length > 0) {
                document.getElementById('fileInput').files = files;
                updateFileName(document.getElementById('fileInput'));
            }
        });

        // Close modal with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeImportModal();
            }
        });

        // Close modal when clicking outside
        document.getElementById('importModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeImportModal();
            }
        });
    </script>
</body>

</html>
