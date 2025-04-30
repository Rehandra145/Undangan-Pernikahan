@props(['event'])

<section class="min-h-screen flex flex-col justify-center px-4 md:px-10 text-left">
    <div class="w-full max-w-3xl">
        <p id="event-date" class="text-5xl md:text-7xl font-serif mb-4" style="font-family: 'DM Serif Text', serif;">
            {{$event->date}}
        </p>
        <p id="countdown" class="text-2xl md:text-3xl font-serif mb-8" style="font-family: 'DM Serif Text', serif;">
            Loading countdown...
        </p>
        <a id="google-calendar-link" href="#" target="_blank" class="inline-block px-4 py-2 bg-black text-white rounded hover:bg-gray-900 transition mb-8 font-serif" style="font-family: 'DM Serif Text', serif;">
            SAVE THE DATE
        </a>
        
        <!-- Ceremony Details -->
        <div class="mt-4 mb-8">
            <div class="mb-8">
                <h3 class="text-2xl md:text-3xl font-serif mb-3" style="font-family: 'DM Serif Text', serif;">Akad Nikah</h3>
                <div class="flex items-center mb-2">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <p id="akad-date" class="text-base md:text-lg">{{$event->date ?? '2025-06-28'}}</p>
                </div>
                <div class="flex items-center mb-2">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <p class="text-base md:text-lg">{{$event->akad_time ?? '08:00 - 10:00 WIB'}}</p>
                </div>
            </div>
            
            <div>
                <h3 class="text-2xl md:text-3xl font-serif mb-3" style="font-family: 'DM Serif Text', serif;">Resepsi</h3>
                <div class="flex items-center mb-2">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <p id="reception-date" class="text-base md:text-lg">{{$event->date ?? '2025-06-28'}}</p>
                </div>
                <div class="flex items-center mb-2">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <p class="text-base md:text-lg">{{$event->reception_time ?? '11:00 - 14:00 WIB'}}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function updateCountdown() {
        const targetDate = new Date("{{ $event->date }}");
        const now = new Date().getTime();
        const difference = targetDate.getTime() - now;
        const countdownElement = document.getElementById("countdown");
        const eventDateElement = document.getElementById("event-date");
        const akadDateElement = document.getElementById("akad-date");
        const receptionDateElement = document.getElementById("reception-date");
        const googleCalendarLink = document.getElementById("google-calendar-link");

        // Format date for display - in Indonesian format
        const optionsLong = { weekday: 'long', day: 'numeric', month: 'long', year: 'numeric' };
        const optionsShort = { weekday: 'long', day: 'numeric', month: 'long', year: 'numeric' };
        
        const formattedDateLong = targetDate.toLocaleDateString('id-ID', optionsLong);
        const formattedDateShort = targetDate.toLocaleDateString('id-ID', optionsShort);

        // Update all date elements
        if (eventDateElement) {
            eventDateElement.innerText = formattedDateLong;
        }
        
        if (akadDateElement) {
            akadDateElement.innerText = formattedDateShort;
        }
        
        if (receptionDateElement) {
            receptionDateElement.innerText = formattedDateShort;
        }

        // Setup Google Calendar link
        if (googleCalendarLink) {
            const eventTitle = "Aqul & Nesa Wedding Day";
            const eventDescription = "Wedding Ceremony";
            const startDate = targetDate.toISOString().replace(/-|:|\.\d+/g, '');
            
            // Set end date to be 5 hours after start
            const endDate = new Date(targetDate.getTime() + (5 * 60 * 60 * 1000)).toISOString().replace(/-|:|\.\d+/g, '');
            
            const calendarUrl = `https://calendar.google.com/calendar/render?action=TEMPLATE&text=${encodeURIComponent(eventTitle)}&details=${encodeURIComponent(eventDescription)}&dates=${startDate}/${endDate}`;
            
            googleCalendarLink.href = calendarUrl;
        }

        // Update countdown
        if (countdownElement) {
            if (difference > 0) {
                const days = Math.floor(difference / (1000 * 60 * 60 * 24));
                const hours = Math.floor((difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((difference % (1000 * 60)) / 1000);

                // Add leading zeros for better display
                const formattedHours = hours.toString().padStart(2, '0');
                const formattedMinutes = minutes.toString().padStart(2, '0');
                const formattedSeconds = seconds.toString().padStart(2, '0');

                countdownElement.innerText = `${days} HARI | ${formattedHours} : ${formattedMinutes} : ${formattedSeconds}`;
            } else {
                countdownElement.innerText = "Sudah tiba!";
            }
        }
    }

    updateCountdown();
    setInterval(updateCountdown, 1000);
</script>