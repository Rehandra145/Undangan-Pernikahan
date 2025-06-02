<section class="min-h-screen flex flex-col justify-center items-center px-10 text-center">
    <div class="max-w-3xl">
        <div class="text-5xl font-serif mb-8 gap-0.5" style="font-family: 'DM Serif Display', serif;">
            <span class="inline-block">{{ substr($event->groom_daily_name ?? '', 0, 1)}}</span>
            <span class="inline-block">&</span>
            <span class="inline-block">{{ substr($event->bride_daily_name ?? '', 0, 1)}}</span>
        </div>

            <p class="text-xl max-w-3xl text-left mt-4" style="font-family: 'DM Serif Text', serif;">
                "{{ $event->verse_translation ?? ''}}"
                <br><span class="block mt-2">(QS: {{ $event->surahName ?? ''}} Ayat {{ $event->ayat ?? ''}})</span>
            </p>
    </div>
</section>
