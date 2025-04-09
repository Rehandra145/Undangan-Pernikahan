@props(['event'])
<section class="h-screen flex flex-col justify-center items-center">
    <p class="text-2xl md:text-3xl font-serif mb-4" style="font-family: 'DM Serif Text', serif;">
        The wedding of
    </p>
    <h1 class="text-8xl md:text-9xl font-serif italic font-light" style="font-family: 'Pinyon Script', serif;">
        {{$event->groom_name ?? 'Aqul'}} & {{$event->bride_name ?? 'Nesa'}}
    </h1>
    <p class="text-xl font-serif mt-2" style="font-family: 'DM Serif Text', serif;">
        Get along with us in this beautiful moment
    </p>
    <div class="absolute bottom-7 w-full flex justify-center">
        <p class="text-xl font-serif text-white inline-flex animate-bounce items-center gap-2">
            scroll for more
        </p>
    </div>
    <div class="absolute bottom-0.5 w w-full flex justify-center">
        <img src="{{ asset('storage/Group 90.svg') }}" alt="arrow" class="w-6 h-6 animate-bounce">
    </div>
</section>
