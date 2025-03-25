<section class="h-screen flex flex-col justify-center px-10 text-left">
    <div class="w-full max
    -w-3xl">
        <p class="text-8xl font-serif" style="font-family: 'DM Serif Text', serif;">
            AHAD | 17 AUG 2045
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
    const targetDate = new Date("2045-08-17T00:00:00").getTime();
    const now = new Date().getTime();
    const difference = targetDate - now;

    if (difference > 0) {
        const days = Math.floor(difference / (1000 * 60 * 60 * 24));
        const hours = Math.floor((difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((difference % (1000 * 60)) / 1000);

        document.getElementById("countdown").innerText =
            `${days} HARI | ${hours} : ${minutes} : ${seconds}`;
    } else {
        document.getElementById("countdown").innerText = "Sudah tiba!";
    }
}
updateCountdown();
setInterval(updateCountdown, 1000);
</script>
