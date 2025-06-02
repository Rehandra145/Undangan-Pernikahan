@props(['guest', 'comments'])
<section id='comment' class="min-h-screen flex flex-col justify-center items-center px-4 sm:px-10 text-center">
    <h2 class="text-3xl md:text-4xl lg:text-5xl mb-4 font-serif text-white" style="font-family: 'DM Serif Text', serif;">
        Wedding Wish</h2>
    <p class="text-base md:text-lg opacity-80 mx-auto mb-12 max-w-2xl font-serif text-white"
        style="font-family: 'DM Serif Text', serif;">
        Share your wishes and blessings for our special day
    </p>

    <div class="w-full max-w-4xl flex flex-col md:flex-row gap-6">
        <div class="w-full md:w-2/3 flex flex-col">
            <form method="POST" action="{{ route('guest.comment', $guest->id ?? '1') }}">
                @csrf
                <textarea name="comment"
                    class="w-full md:w-[700px] h-[350px] p-4 bg-transparent border border-white rounded-lg text-white placeholder-white focus:outline-none resize-none"
                    placeholder="Write something..."></textarea>
                <div class="mt-4 flex justify-start gap-4 flex-wrap">
                    <button
                        class="px-6 py-2 text-white font-semibold rounded-lg border border-white hover:bg-gray-200 hover:text-black">
                        Kirim
                    </button>
            </form>
            <form action="{{ route('guest.rsvp', $guest->id ?? '1') }}" method="post">
                @csrf
                <button name="status" value="hadir"
                    class="px-6 py-2 text-white font-semibold rounded-lg border border-white hover:bg-green-300 hover:text-black">
                    Hadir
                </button>
            </form>
            <form action="{{ route('guest.rsvp', $guest->id ?? '') }}" method="post">
                @csrf
                <button name="status" value="tidak hadir"
                    class="px-6 py-2 text-white font-semibold rounded-lg border border-white hover:bg-red-300 hover:text-black">
                    Tidak Hadir
                </button>
            </form>
        </div>
    </div>

    <div class="w-full md:w-1/3 max-h-[350px] md:ml-20 overflow-y-auto scrollbar-hide space-y-4 p-4 rounded-lg">
        <h2 class="text-white font-bold text-left">Komentar</h2>
        @foreach ($comments as $comment)
            <div class="flex flex-col">
                <p class="text-white font-bold text-left">{{ $comment->name ?? ''}}</p>
                <p class="text-white text-sm text-left">{{ $comment->comment ?? ''}}</p>
            </div>
        @endforeach
    </div>
    </div>
</section>

<style>
    /* Hide scrollbar for Chrome, Safari and Opera */
    .scrollbar-hide::-webkit-scrollbar {
        display: none;
    }

    /* Hide scrollbar for IE, Edge and Firefox */
    .scrollbar-hide {
        -ms-overflow-style: none;
        /* IE and Edge */
        scrollbar-width: none;
        /* Firefox */
    }

    @import url('https://fonts.googleapis.com/css2?family=DM+Serif+Text&display=swap');
</style>
