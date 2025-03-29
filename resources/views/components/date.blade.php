@props(['event'])

<section class="h-screen flex flex-col justify-center px-10 text-left">
    <div class="w-full max-w-3xl">
        <p id="event-date" class="text-7xl font-serif" style="font-family: 'DM Serif Text', serif;">
            {{$event->date}}
        </p>
        <p id="countdown" class="text-3xl font-serif mt-10 mb-10" style="font-family: 'DM Serif Text', serif;">
            Loading countdown...
        </p>
        <p class="text-m font-serif" style="font-family: 'DM Serif Text', serif;">
            SAVE THE DATE!!!
        </p>
    </div>
</section>

<script>
    function updateCountdown() {
        const targetDate = new Date("{{ $event->date }}");
        const now = new Date().getTime();
        const difference = targetDate.getTime() - now;
        const countdownElement = document.getElementById("countdown");
        const eventDateElement = document.getElementById("event-date");

        // Mendapatkan nama hari dalam bahasa Indonesia
        const options = { weekday: 'long', day: 'numeric', month: 'long', year: 'numeric' };
        const formattedDate = targetDate.toLocaleDateString('id-ID', options);

        // Tampilkan nama hari di elemen event-date
        if (eventDateElement) {
            eventDateElement.innerText = formattedDate;
        }

        // Update countdown
        if (countdownElement) {
            if (difference > 0) {
                const days = Math.floor(difference / (1000 * 60 * 60 * 24));
                const hours = Math.floor((difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((difference % (1000 * 60)) / 1000);

                countdownElement.innerText = `${days} HARI | ${hours} : ${minutes} : ${seconds}`;
            } else {
                countdownElement.innerText = "Sudah tiba!";
            }
        }
    }

    updateCountdown();
    setInterval(updateCountdown, 1000);
</script>
