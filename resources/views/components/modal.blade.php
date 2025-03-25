<div id="modal" class="fixed inset-0 flex justify-center items-center hidden overflow-hidden">
    <div class="absolute inset-0 bg-black bg-opacity-75"></div>
    <div class="relative z-10 w-11/12 md:w-2/3 lg:w-1/2 p-6 rounded-lg shadow-lg overflow-hidden">
        <div id="modalBackground" class="absolute inset-0 bg-cover bg-center"></div>
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        <div class="relative z-20 p-6 text-white">
            <h2 id="modalTitle" class="text-3xl font-serif mb-4 text-center"></h2>
            <div id="modalStory" class="text-lg max-h-60 overflow-auto p-2 no-scrollbar text-left"></div>
            <div class="flex justify-center mt-4">
                <button class="px-2 py-1 text-white border border-white rounded transition hover:bg-amber-50 hover:text-black" onclick="closeModal()">Close</button>
            </div>
        </div>
    </div>

    <script>
        const stories = {
            'awal': {
                title: 'Awal Hubungan',
                image: "{{ asset('storage/IMG_5069.JPG') }}",
                story: 'Awal pertemuan kami dimulai dari sebuah pertemanan yang perlahan berkembang menjadi sesuatu yang lebih istimewa...Awal pertemuan kami dimulai dari sebuah pertemanan yang perlahan berkembang menjadi sesuatu yang lebih istimewa...Awal pertemuan kami dimulai dari sebuah pertemanan yang perlahan berkembang menjadi sesuatu yang lebih istimewa...Awal pertemuan kami dimulai dari sebuah pertemanan yang perlahan berkembang menjadi sesuatu yang lebih istimewa...Awal pertemuan kami dimulai dari sebuah pertemanan yang perlahan berkembang menjadi sesuatu yang lebih istimewa...Awal pertemuan kami dimulai dari sebuah pertemanan yang perlahan berkembang menjadi sesuatu yang lebih istimewa...Awal pertemuan kami dimulai dari sebuah pertemanan yang perlahan berkembang menjadi sesuatu yang lebih istimewa...Awal pertemuan kami dimulai dari sebuah pertemanan yang perlahan berkembang menjadi sesuatu yang lebih istimewa...Awal pertemuan kami dimulai dari sebuah pertemanan yang perlahan berkembang menjadi sesuatu yang lebih istimewa...Awal pertemuan kami dimulai dari sebuah pertemanan yang perlahan berkembang menjadi sesuatu yang lebih istimewa...Awal pertemuan kami dimulai dari sebuah pertemanan yang perlahan berkembang menjadi sesuatu yang lebih istimewa...Awal pertemuan kami dimulai dari sebuah pertemanan yang perlahan berkembang menjadi sesuatu yang lebih istimewa...Awal pertemuan kami dimulai dari sebuah pertemanan yang perlahan berkembang menjadi sesuatu yang lebih istimewa...Awal pertemuan kami dimulai dari sebuah pertemanan yang perlahan berkembang menjadi sesuatu yang lebih istimewa...Awal pertemuan kami dimulai dari sebuah pertemanan yang perlahan berkembang menjadi sesuatu yang lebih istimewa...'
            },
            'lamaran': {
                title: 'Lamaran',
                image: "{{ asset('storage/IMG_5106.JPG') }}",
                story: 'Hari di mana kami mengikat janji untuk melangkah lebih jauh dalam perjalanan ini...'
            },
            'akad': {
                title: 'Akad',
                image: "{{ asset('storage/IMG_5148.JPG') }}",
                story: 'Hari yang kami nantikan akhirnya tiba. Momen suci yang mengikat kami dalam ikatan pernikahan...'
            }
        };

        function openModal(key) {
            const modal = document.getElementById('modal');
            const modalTitle = document.getElementById('modalTitle');
            const modalBackground = document.getElementById('modalBackground');
            const modalStory = document.getElementById('modalStory');

            // Set konten modal
            modalTitle.textContent = stories[key].title;
            modalBackground.style.backgroundImage = `url(${stories[key].image})`;
            modalStory.textContent = stories[key].story;

            // Tampilkan modal
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            const modal = document.getElementById('modal');
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        document.getElementById('modal').addEventListener('click', function(event) {
            if (event.target === this) {
                closeModal();
            }
        });
    </script>
</div>
