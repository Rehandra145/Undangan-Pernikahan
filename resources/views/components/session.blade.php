@if ($errors->any())
<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-md mb-6 max-w-lg ml-8">
    <strong class="font-bold">Terjadi Kesalahan!</strong>
    <ul class="mt-2 list-disc list-inside">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif


@if (session('success'))
<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-md mb-6 max-w-lg ml-8">
    <strong class="font-bold">Berhasil!</strong>
    <p>{{ session('success') }}</p>
</div>
@endif
