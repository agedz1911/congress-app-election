<div class="min-h-screen flex flex-col justify-between">
    <livewire:header />
    <livewire:voting.data />

    <!-- FOOTER -->
    <footer class="bg-white border-t border-slate-200 py-6 text-center text-xs text-slate-500">
        <p>&copy; {{ date('Y') }} MIS-IT Pharma-Pro Int</p>
    </footer>
</div>

<script>
    // 1. Live Clock
    function updateClock() {
        const now = new Date();
        const options = {
            weekday: "long",
            year: "numeric",
            month: "long",
            day: "numeric",
            hour: "2-digit",
            minute: "2-digit",
            second: "2-digit",
        };
        document.getElementById("liveClock").textContent =
            now.toLocaleDateString("id-ID", options) + " WIB";
    }
    setInterval(updateClock, 1000);
    updateClock();
</script>