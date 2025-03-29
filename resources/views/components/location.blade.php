@props(['event'])
        <section id="location" class="h-screen flex flex-col justify-center px-10 text-left">
            <div class="w-full max-w-3xl h-96 mb-6">
                <iframe src="{{ $event->embed_maps_url  ?? "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.663572737762!2d101.452919!3d0.5046316000000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d5aebce81ef37f%3A0x9b837fcba8f106e9!2sHotel%20Pangeran%20Pekanbaru!5e0!3m2!1sid!2sid!4v1743227815071!5m2!1sid!2sid"}}" width="600" height="400"
                    style="border:1px solid; border-radius:8px;"
                    allowfullscreen="" loading="lazy"></iframe>
            </div>
            <a href="{{ $event->maps }}" target="_blank" class="text-white hover:text-gray-400"
                style="font-family: 'DM Serif Text', serif;">
                📍 Klik di sini untuk membuka di Google Maps
            </a>
        </section>
