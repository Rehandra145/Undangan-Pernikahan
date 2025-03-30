@props(['stories'])

<div id="modal" class="fixed inset-0 flex justify-center items-center hidden overflow-hidden">
    <div class="absolute inset-0 bg-black bg-opacity-75"></div>
    <div class="relative z-10 w-11/12 md:w-2/3 lg:w-1/2 p-6 rounded-lg shadow-lg overflow-hidden">
        <div id="modalBackground" class="absolute inset-0 bg-cover bg-center bg-no-repeat"></div>
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        <div class="relative z-20 p-6 text-white">
            <h2 id="modalTitle" class="text-3xl font-serif mb-4 text-center"></h2>
            <div id="modalStory" class="text-lg max-h-60 overflow-y-auto overflow-x-hidden p-2 text-left break-words whitespace-normal">
                <!-- Story content will be placed here -->
            </div>
            <div class="flex justify-center mt-4">
                <button class="px-2 py-1 text-white border border-white rounded transition hover:bg-amber-50 hover:text-black" onclick="closeModal()">Close</button>
            </div>
        </div>
    </div>

    <script>
        // Convert PHP stories collection to JavaScript object
        const storiesData = {
            @foreach($stories as $story)
                '{{ $story->id }}': {
                    title: '{{ $story->title }}',
                    image: '{{ Storage::url($story->imagePath) }}',
                    story: `{{ $story->caption }}`  // Using template literals for multiline support
                },
            @endforeach
        };

        function openModal(id) {
            const modal = document.getElementById('modal');
            const modalTitle = document.getElementById('modalTitle');
            const modalBackground = document.getElementById('modalBackground');
            const modalStory = document.getElementById('modalStory');

            // Set modal content
            modalTitle.textContent = storiesData[id].title;
            modalBackground.style.backgroundImage = `url(${storiesData[id].image})`;
            modalBackground.style.backgroundSize = 'cover';

            // Set the content with proper text wrapping
            modalStory.textContent = storiesData[id].story;

            // Show modal
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
