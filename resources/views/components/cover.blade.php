@props(['guest'])

<style>
        .fade-in {
        opacity: 0;
        transform: translateY(-50px);
        animation: slideDown 1s ease-out forwards;
    }

    .fade-out {
        animation: slideUp 1s ease-in forwards;
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-50px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes slideUp {
        from {
            opacity: 1;
            transform: translateY(0);
        }
        to {
            opacity: 0;
            transform: translateY(-50px);
        }
    }
</style>
<div id="welcomeModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-70 fade-in"
style="background: url('{{asset('storage/IMG_5148.JPG')}}') center/cover no-repeat;">
<div class="bg-opacity-100 p-10 rounded-lg shadow-lg max-w-lg text-center">
    <h2 class="text-3xl font-bold mb-4" style="font-family: 'DM Serif Text', serif;">kepada</h2>
    <h2 class="text-9xl mb-6" style="font-family: 'Pinyon Script', serif;">{{$guest->name ?? 'Hello'}}</h2>
    <p class="text-white text-sm mt-2 mb-2" style="font-family: 'DM Serif Text', serif;">KAMI MENGUNDANG ANDA UNTUK HADIR DALAM ACARA YANG BAHAGIA INI</p>
    <button id="closeModal" class="mt-2 px-6 py-3 text-white hover:text-black border border-white rounded-lg hover:bg-white transition">Open</button>
</div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
         const modal = document.getElementById("welcomeModal");
         const closeModal = document.getElementById("closeModal");
         const mainContent = document.getElementById("mainContent");

         // Saat tombol OK ditekan, modal menghilang dan konten utama muncul
         closeModal.addEventListener("click", function () {
             modal.classList.add("fade-out");
             setTimeout(() => {
                 modal.style.display = "none";
                 mainContent.classList.remove("hidden"); // Menampilkan konten utama
                 document.body.classList.remove("overflow-hidden"); // Mengembalikan scroll
             }, 0);
         });
     });
 </script>
