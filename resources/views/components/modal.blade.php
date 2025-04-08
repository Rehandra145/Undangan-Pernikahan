@props(['stories'])

<div id="modal" class="fixed inset-0 flex justify-center items-center hidden overflow-hidden z-50">
    <!-- Overlay -->
    <div class="absolute inset-0 bg-black bg-opacity-75"></div>
    
    <!-- Modal container - adjusted for mobile -->
    <div class="relative z-10 w-11/12 md:w-3/4 lg:w-1/2 p-2 sm:p-4 md:p-6 rounded-lg shadow-lg overflow-hidden max-h-[90vh] m-2">
        <!-- Background image -->
        <div id="modalBackground" class="absolute inset-0 bg-cover bg-center bg-no-repeat"></div>
        
        <!-- Dark overlay for readable text -->
        <div class="absolute inset-0 bg-black bg-opacity-60"></div>
        
        <!-- Content container -->
        <div class="relative z-20 p-3 sm:p-4 md:p-6 text-white">
            <!-- Title - responsive font size -->
            <h2 id="modalTitle" class="text-xl sm:text-2xl md:text-3xl font-serif mb-2 md:mb-4 text-center"></h2>
            
            <!-- Story content - better scrolling on mobile -->
            <div id="modalStory" 
                class="text-base sm:text-lg max-h-40 sm:max-h-48 md:max-h-60 overflow-y-auto overflow-x-hidden p-2 text-left break-words whitespace-normal">
                <!-- Story content will be placed here -->
            </div>
            
            <!-- Close button - larger touch target for mobile -->
            <div class="flex justify-center mt-2 sm:mt-4">
                <button
                    class="px-3 py-2 text-white border border-white rounded-lg transition hover:bg-amber-50 hover:text-black text-sm sm:text-base"
                    onclick="closeModal()">Close</button>
            </div>
        </div>
    </div>

    <script>
        // Convert PHP stories collection to JavaScript object
        const storiesData = {
            @foreach ($stories as $story)
                @if (is_object($story))
                    '{{ $story->id }}': {
                        title: '{{ $story->title }}',
                        image: '{{ Storage::url($story->imagePath) }}',
                        story: `{{ $story->caption }}` // Using template literals for multiline support
                    },
                @else
                    '{{ $story }}': {
                        title: 'Story',
                        image: '{{ asset('placeholder-image.jpg') }}',
                        story: `No content available`
                    },
                @endif
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

        // Add touch support for mobile
        document.getElementById('modal').addEventListener('click', function(event) {
            if (event.target === this) {
                closeModal();
            }
        });

        // Prevent scrolling issues on iOS
        document.getElementById('modalStory').addEventListener('touchmove', function(e) {
            e.stopPropagation();
        });
    </script>
</div>