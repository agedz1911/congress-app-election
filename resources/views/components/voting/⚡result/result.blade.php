<div class="w-full max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Total Data DPT -->
        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm flex items-center justify-between">
            <div>
                <span class="text-xs text-slate-400 font-semibold uppercase tracking-wider">Total DPT</span>
                <h3 class="text-3xl font-bold text-slate-900 mt-1">960</h3>
            </div>
            <div class="p-3 bg-blue-50 text-blue-600 rounded-xl">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
            </div>
        </div>
        <!-- Suara Masuk -->
        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm flex items-center justify-between">
            <div>
                <span class="text-xs text-slate-400 font-semibold uppercase tracking-wider">Suara Masuk</span>
                <h3 class="text-3xl font-bold text-emerald-600 mt-1">637</h3>
            </div>
            <div class="p-3 bg-emerald-50 text-emerald-600 rounded-xl">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
        </div>
        <!-- Belum Memilih -->
        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm flex items-center justify-between">
            <div>
                <span class="text-xs text-slate-400 font-semibold uppercase tracking-wider">Belum Memilih</span>
                <h3 class="text-3xl font-bold text-rose-500 mt-1">323</h3>
            </div>
            <div class="p-3 bg-rose-50 text-rose-600 rounded-xl">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
            </div>
        </div>
        <!-- Tingkat Partisipasi -->
        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm flex items-center justify-between">
            <div>
                <span class="text-xs text-slate-400 font-semibold uppercase tracking-wider">Partisipasi</span>
                <h3 class="text-3xl font-bold text-slate-900 mt-1">66,3%</h3>
            </div>
            <div class="p-3 bg-indigo-50 text-indigo-600 rounded-xl">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 3.055A9.003 9.003 0 1020.945 13H11V3.055z" />
                </svg>
            </div>
        </div>
    </div>

    <!-- DIAGRAM DAN DETAIL PEROLEHAN SUARA -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">

        <!-- Donut Chart Box -->
        <div
            class="lg:col-span-1 bg-white p-6 rounded-2xl border border-slate-200 shadow-sm flex flex-col justify-between relative overflow-hidden">
            <div class="flex items-center justify-between mb-4 border-b border-slate-100 pb-3">
                <h2 class="font-bold text-slate-900">Diagram Perolehan</h2>
                <span
                    class="flex items-center gap-1.5 text-xs text-rose-600 font-semibold bg-rose-50 px-2.5 py-1 rounded-full animate-pulse">
                    <span class="w-1.5 h-1.5 rounded-full bg-rose-600"></span> LIVE
                </span>
            </div>

            <!-- Chart Wrapper -->
            <div class="relative w-64 h-64 mx-auto my-4 flex items-center justify-center">
                <canvas id="liveChart"></canvas>
                <!-- Center Total Number -->
                <div class="absolute flex flex-col items-center justify-center pointer-events-none">
                    <span class="text-xs text-slate-400 font-medium tracking-wider uppercase">Total</span>
                    <span class="text-4xl font-extrabold text-slate-800 tracking-tight">637</span>
                    <span class="text-[10px] text-slate-400">Suara</span>
                </div>
            </div>

            <p class="text-center text-xs text-slate-400 mt-2">Diagram otomatis diperbarui setiap kali ada suara masuk.
            </p>
        </div>

        <!-- Detail Perolehan (Legend Cards) -->
        <div class="lg:col-span-2 bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
            <div class="flex items-center justify-between mb-6 border-b border-slate-100 pb-3">
                <h2 class="font-bold text-slate-900">Rincian Perolehan Suara</h2>
                <span class="text-xs text-slate-500 font-medium">Diurutkan berdasarkan nomor urut</span>
            </div>

            <div class="space-y-4">
                <!-- Calon 01 -->
                <div
                    class="p-4 rounded-xl border border-rose-100 bg-rose-50/10 hover:bg-rose-50/20 transition-all duration-200">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-2 mb-3">
                        <div class="flex items-center gap-3">
                            <span
                                class="w-8 h-8 rounded-lg bg-rose-500 text-white font-extrabold text-sm flex items-center justify-center">01</span>
                            <div>
                                <h4 class="font-bold text-slate-900 text-sm sm:text-base">Prof. Dr. dr. Achmad Chusnu
                                    Romdhoni, Sp.THT-BKL, Subsp.Onk. (K). FICS</h4>
                            </div>
                        </div>
                        <div class="text-right sm:text-right min-w-[100px]">
                            <span class="text-rose-600 font-extrabold text-xl">341 <span
                                    class="text-xs text-slate-500 font-normal">Suara</span></span>
                        </div>
                    </div>
                    <div class="w-full bg-slate-100 h-2.5 rounded-full overflow-hidden">
                        <div class="bg-rose-500 h-full rounded-full transition-all duration-1000" style="width: 53.5%">
                        </div>
                    </div>
                    <div class="flex justify-between text-[11px] text-slate-400 mt-2 font-medium">
                        <span>Persentase Suara Masuk</span>
                        <span>53,53%</span>
                    </div>
                </div>

                <!-- Calon 02 -->
                <div
                    class="p-4 rounded-xl border border-emerald-100 bg-emerald-50/10 hover:bg-emerald-50/20 transition-all duration-200">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-2 mb-3">
                        <div class="flex items-center gap-3">
                            <span
                                class="w-8 h-8 rounded-lg bg-emerald-500 text-white font-extrabold text-sm flex items-center justify-center">02</span>
                            <div>
                                <h4 class="font-bold text-slate-900 text-sm sm:text-base">Dr. Marlinda Adham,
                                    Sp.T.H.T.B.K.I, Subsp.Onk. (K)., PhD., FACS</h4>
                            </div>
                        </div>
                        <div class="text-right sm:text-right min-w-[100px]">
                            <span class="text-emerald-600 font-extrabold text-xl">293 <span
                                    class="text-xs text-slate-500 font-normal">Suara</span></span>
                        </div>
                    </div>
                    <div class="w-full bg-slate-100 h-2.5 rounded-full overflow-hidden">
                        <div class="bg-emerald-500 h-full rounded-full transition-all duration-1000"
                            style="width: 45.9%"></div>
                    </div>
                    <div class="flex justify-between text-[11px] text-slate-400 mt-2 font-medium">
                        <span>Persentase Suara Masuk</span>
                        <span>45,99%</span>
                    </div>
                </div>

                <!-- Abstain -->
                <div
                    class="p-4 rounded-xl border border-blue-100 bg-blue-50/10 hover:bg-blue-50/20 transition-all duration-200">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-2 mb-3">
                        <div class="flex items-center gap-3">
                            <span
                                class="w-8 h-8 rounded-lg bg-blue-500 text-white font-extrabold text-sm flex items-center justify-center">-</span>
                            <div>
                                <h4 class="font-bold text-slate-900 text-sm">Abstain (Suara Tidak Sah / Kosong)</h4>
                            </div>
                        </div>
                        <div class="text-right sm:text-right min-w-[100px]">
                            <span class="text-blue-600 font-extrabold text-xl">3 <span
                                    class="text-xs text-slate-500 font-normal">Suara</span></span>
                        </div>
                    </div>
                    <div class="w-full bg-slate-100 h-2 rounded-full overflow-hidden">
                        <div class="bg-blue-500 h-full rounded-full transition-all duration-1000" style="width: 0.5%">
                        </div>
                    </div>
                    <div class="flex justify-between text-[11px] text-slate-400 mt-2 font-medium">
                        <span>Persentase Suara Masuk</span>
                        <span>0,47%</span>
                    </div>
                </div>
            </div>
        </div>

    </div>

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

// 2. Chart.js Implementation for Real-Time Donut Chart
const ctx = document.getElementById("liveChart").getContext("2d");
const liveChart = new Chart(ctx, {
    type: "doughnut",
    data: {
        labels: [
            "Calon 01 (Prof. Dr. dr. Achmad Chusnu Romdhoni)",
            "Calon 02 (Dr. Marlinda Adham)",
            "Abstain",
        ],
        datasets: [
            {
                data: [341, 293, 3],
                backgroundColor: [
                    "#F43F5E", // Rose-500 (Calon 01)
                    "#10B981", // Emerald-500 (Calon 02)
                    "#3B82F6", // Blue-500 (Abstain)
                ],
                borderColor: "#ffffff",
                borderWidth: 4,
                hoverOffset: 6,
            },
        ],
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        cutout: "75%", // Ketebalan donut chart
        plugins: {
            legend: {
                display: false, // Sembunyikan legenda bawaan Chart.js agar bisa memakai UI kostum di sampingnya
            },
            tooltip: {
                callbacks: {
                    label: function (context) {
                        let label = context.label || "";
                        if (label) {
                            label += ": ";
                        }
                        if (context.parsed !== null) {
                            const percentage = (
                                (context.parsed / 637) *
                                100
                            ).toFixed(2);
                            label += `${context.parsed} Suara (${percentage}%)`;
                        }
                        return label;
                    },
                },
            },
        },
    },
});
</script>
