<div class="w-64 h-full bg-gray-900 text-white flex flex-col shadow-lg fixed">
    <div class="p-6 border-b border-gray-800">
        <h1 class="text-2xl font-bold tracking-wider">DASHBOARD</h1>
    </div>
    <nav class="flex-1 overflow-y-auto py-4">
        <ul class="space-y-1">
            <li class="px-4 py-2 hover:bg-gray-800 transition-colors" data-route="beranda">
                <a href="{{route('web.index')}}" class="flex items-center space-x-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                    </svg>
                    <span>Beranda</span>
                </a>
            </li>
            <li class="px-4 py-2 hover:bg-gray-800 transition-colors rounded-l-lg" data-route="tamu">
                <a href="{{ route('guest.index') }}" class="flex items-center space-x-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                    </svg>
                    <span>Tamu</span>
                </a>
            </li>
            <li class="px-4 py-2 hover:bg-gray-800 transition-colors" data-route="edit_web">
                <a href="{{route('web.create')}}" class="flex items-center space-x-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M3 5a2 2 0 012-2h10a2 2 0 012 2v8a2 2 0 01-2 2h-2.22l.123.489.804.804A1 1 0 0113 18H7a1 1 0 01-.707-1.707l.804-.804L7.22 15H5a2 2 0 01-2-2V5zm5.771 7H5V5h10v7H8.771z" clip-rule="evenodd" />
                    </svg>
                    <span>Edit Web</span>
                </a>
            </li>
            <li class="px-4 py-2 hover:bg-gray-800 transition-colors" data-route="gallery">
                <a href="{{route('galleries.index')}}" class="flex items-center space-x-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd" />
                    </svg>
                    <span>Gallery</span>
                </a>
            </li>
            <li class="px-4 py-2 hover:bg-gray-800 transition-colors" data-route="story">
                <a href="{{route('stories.index')}}" class="flex items-center space-x-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 01-2 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z" clip-rule="evenodd" />
                    </svg>
                    <span>Story</span>
                </a>
            </li>
        </ul>
    </nav>
    <div class="p-4 border-t border-gray-800">
        <a href="" class="flex items-center space-x-3 text-red-400 hover:text-red-300 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 001 1h12a1 1 0 001-1V4a1 1 0 00-1-1H3zm9 4a1 1 0 11-2 0 1 1 0 012 0zm-3 5a1 1 0 110 2H9a1 1 0 110-2zm6 0a1 1 0 110 2h-3a1 1 0 110-2z" clip-rule="evenodd" />
            </svg>
            <span>Logout</span>
        </a>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const menuItems = document.querySelectorAll("ul.space-y-1 li");
        const activeClass = "bg-blue-500";
        const storedActive = localStorage.getItem("activeMenu");

        if (storedActive) {
            const lastActive = document.querySelector(`[data-route="${storedActive}"]`);
            if (lastActive) {
                lastActive.classList.add(activeClass);
            }
        }

        menuItems.forEach((item) => {
            item.addEventListener("click", function () {
                menuItems.forEach((el) => el.classList.remove(activeClass));

                this.classList.add(activeClass);
                localStorage.setItem("activeMenu", this.getAttribute("data-route"));
            });
        });
    });
</script>

