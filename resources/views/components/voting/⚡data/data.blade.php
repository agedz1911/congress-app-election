<div class="w-full mx-auto px-4 py-12">
    <!-- LOG AKTIVITAS / DATA PEMILIH TABLE CARD -->
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">

        <!-- Table Header Controls -->
        <div class="p-6 border-b border-slate-100 flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h2 class="font-bold text-slate-900 text-lg">Log Aktivitas & Data Pemilih</h2>
                <p class="text-xs text-slate-400 mt-1">Menampilkan data kehadiran serta status voting peserta</p>
            </div>

            <!-- Action Buttons & Search -->
            <div class="flex flex-wrap items-center gap-3">
                <button class="inline-flex items-center gap-2 px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-semibold rounded-xl transition-colors duration-150 shadow-sm shadow-emerald-100">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Export Excel
                </button>
                <select class="border border-slate-200 bg-white text-xs font-medium text-slate-600 rounded-xl px-3 py-2 focus:ring-2 focus:ring-blue-100 outline-none">
                    <option>-- PILIH AKSI --</option>
                    <option>Kirim Pengingat (Belum Voting)</option>
                    <option>Hapus Data Terpilih</option>
                </select>
            </div>
        </div>

        <!-- Table Container (Responsive) -->
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-slate-600">
                <thead class="bg-slate-50 text-[11px] font-bold text-slate-400 uppercase tracking-wider border-b border-slate-100">
                    <tr>
                        <th class="p-4 w-12 text-center"><input type="checkbox" class="rounded border-slate-300 text-blue-600 focus:ring-blue-500"></th>
                        <th class="p-4 w-16">No.</th>
                        <th class="p-4">Kode ID 1</th>
                        <th class="p-4">Kode ID 2</th>
                        <th class="p-4">Nama Peserta</th>
                        <th class="p-4">Instansi / Rumah Sakit</th>
                        <th class="p-4">ID Anggota</th>
                        <th class="p-4">Status Voting</th>
                        <th class="p-4">Waktu Voting</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <!-- Row 1 -->
                    <tr class="hover:bg-slate-50/50 transition-colors duration-100">
                        <td class="p-4 text-center"><input type="checkbox" class="rounded border-slate-300 text-blue-600 focus:ring-blue-500"></td>
                        <td class="p-4 font-semibold text-slate-700">25.</td>
                        <td class="p-4 font-mono text-xs">V-0936</td>
                        <td class="p-4 font-mono text-xs text-slate-400">R-0404</td>
                        <td class="p-4 font-semibold text-slate-900">Mohamad Bima Mandraguna</td>
                        <td class="p-4 text-slate-500">RSUD Karawang</td>
                        <td class="p-4 font-mono text-xs text-slate-400">1101212014</td>
                        <td class="p-4">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-100">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Sudah Voting
                            </span>
                        </td>
                        <td class="p-4 font-mono text-xs text-slate-500">31-10-25 21:39:32</td>
                    </tr>
                    <!-- Row 2 -->
                    <tr class="hover:bg-slate-50/50 transition-colors duration-100">
                        <td class="p-4 text-center"><input type="checkbox" class="rounded border-slate-300 text-blue-600 focus:ring-blue-500"></td>
                        <td class="p-4 font-semibold text-slate-700">26.</td>
                        <td class="p-4 font-mono text-xs">V-0935</td>
                        <td class="p-4 font-mono text-xs text-slate-400">R-1054</td>
                        <td class="p-4 font-semibold text-slate-900">Inda Rizkia Oktaviani</td>
                        <td class="p-4 text-slate-500">Santosa Hospital Bandung Kopo</td>
                        <td class="p-4 font-mono text-xs text-slate-400">97195</td>
                        <td class="p-4">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-100">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Sudah Voting
                            </span>
                        </td>
                        <td class="p-4 font-mono text-xs text-slate-500">31-10-25 21:34:00</td>
                    </tr>
                    <!-- Row 3 -->
                    <tr class="hover:bg-slate-50/50 transition-colors duration-100">
                        <td class="p-4 text-center"><input type="checkbox" class="rounded border-slate-300 text-blue-600 focus:ring-blue-500"></td>
                        <td class="p-4 font-semibold text-slate-700">27.</td>
                        <td class="p-4 font-mono text-xs">V-0934</td>
                        <td class="p-4 font-mono text-xs text-slate-400">R-1413</td>
                        <td class="p-4 font-semibold text-slate-900">Budhy Parmono</td>
                        <td class="p-4 text-slate-500">RS Krakatau Medika</td>
                        <td class="p-4 font-mono text-xs text-slate-400">1000212006</td>
                        <td class="p-4">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-100">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Sudah Voting
                            </span>
                        </td>
                        <td class="p-4 font-mono text-xs text-slate-500">31-10-25 21:27:52</td>
                    </tr>
                    <!-- Row 4 -->
                    <tr class="hover:bg-slate-50/50 transition-colors duration-100 bg-rose-50/5">
                        <td class="p-4 text-center"><input type="checkbox" class="rounded border-slate-300 text-blue-600 focus:ring-blue-500"></td>
                        <td class="p-4 font-semibold text-slate-700">28.</td>
                        <td class="p-4 font-mono text-xs">V-0933</td>
                        <td class="p-4 font-mono text-xs text-slate-400">R-1130</td>
                        <td class="p-4 font-semibold text-slate-900">Heru Kurniawan Anwar</td>
                        <td class="p-4 text-slate-500">RSUD Kota Bengkulu</td>
                        <td class="p-4 font-mono text-xs text-slate-400">85082</td>
                        <td class="p-4">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold bg-rose-50 text-rose-700 border border-rose-100">
                                <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span> Belum Voting
                            </span>
                        </td>
                        <td class="p-4 font-mono text-xs text-slate-400">-</td>
                    </tr>
                    <!-- Row 5 -->
                    <tr class="hover:bg-slate-50/50 transition-colors duration-100">
                        <td class="p-4 text-center"><input type="checkbox" class="rounded border-slate-300 text-blue-600 focus:ring-blue-500"></td>
                        <td class="p-4 font-semibold text-slate-700">29.</td>
                        <td class="p-4 font-mono text-xs">V-0932</td>
                        <td class="p-4 font-mono text-xs text-slate-400">R-0600</td>
                        <td class="p-4 font-semibold text-slate-900">Nieza Femini Rissa</td>
                        <td class="p-4 text-slate-500">RS M.M.C</td>
                        <td class="p-4 font-mono text-xs text-slate-400">900090590</td>
                        <td class="p-4">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-100">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Sudah Voting
                            </span>
                        </td>
                        <td class="p-4 font-mono text-xs text-slate-500">31-10-25 21:32:48</td>
                    </tr>
                    <tr class="hover:bg-slate-50/50 transition-colors duration-100">
                        <td class="p-4 text-center"><input type="checkbox" class="rounded border-slate-300 text-blue-600 focus:ring-blue-500"></td>
                        <td class="p-4 font-semibold text-slate-700">29.</td>
                        <td class="p-4 font-mono text-xs">V-0932</td>
                        <td class="p-4 font-mono text-xs text-slate-400">R-0600</td>
                        <td class="p-4 font-semibold text-slate-900">Nieza Femini Rissa</td>
                        <td class="p-4 text-slate-500">RS M.M.C</td>
                        <td class="p-4 font-mono text-xs text-slate-400">900090590</td>
                        <td class="p-4">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-100">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Sudah Voting
                            </span>
                        </td>
                        <td class="p-4 font-mono text-xs text-slate-500">31-10-25 21:32:48</td>
                    </tr>
                    <tr class="hover:bg-slate-50/50 transition-colors duration-100">
                        <td class="p-4 text-center"><input type="checkbox" class="rounded border-slate-300 text-blue-600 focus:ring-blue-500"></td>
                        <td class="p-4 font-semibold text-slate-700">29.</td>
                        <td class="p-4 font-mono text-xs">V-0932</td>
                        <td class="p-4 font-mono text-xs text-slate-400">R-0600</td>
                        <td class="p-4 font-semibold text-slate-900">Nieza Femini Rissa</td>
                        <td class="p-4 text-slate-500">RS M.M.C</td>
                        <td class="p-4 font-mono text-xs text-slate-400">900090590</td>
                        <td class="p-4">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-100">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Sudah Voting
                            </span>
                        </td>
                        <td class="p-4 font-mono text-xs text-slate-500">31-10-25 21:32:48</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Table Footer & Pagination -->
        <div class="px-6 py-4 bg-slate-50 border-t border-slate-100 flex flex-col sm:flex-row items-center justify-between gap-4">
            <span class="text-xs text-slate-500">Menampilkan 5 data teratas dari total <strong class="text-slate-800">960</strong> data</span>

            <!-- Modern Pagination -->
            <div class="flex items-center gap-1 text-xs">
                <button class="px-3 py-1.5 border border-slate-200 bg-white hover:bg-slate-100 rounded-lg text-slate-600 transition-colors font-medium">Pertama</button>
                <button class="px-3 py-1.5 border border-slate-200 bg-white hover:bg-slate-100 rounded-lg text-slate-600 transition-colors font-medium">Sebelumnya</button>
                <button class="px-3.5 py-1.5 bg-blue-600 text-white rounded-lg font-bold">1</button>
                <button class="px-3.5 py-1.5 border border-slate-200 bg-white hover:bg-slate-100 rounded-lg text-slate-600 transition-colors">2</button>
                <button class="px-3.5 py-1.5 border border-slate-200 bg-white hover:bg-slate-100 rounded-lg text-slate-600 transition-colors">3</button>
                <span class="px-1 text-slate-400">...</span>
                <button class="px-3.5 py-1.5 border border-slate-200 bg-white hover:bg-slate-100 rounded-lg text-slate-600 transition-colors">20</button>
                <button class="px-3 py-1.5 border border-slate-200 bg-white hover:bg-slate-100 rounded-lg text-slate-600 transition-colors font-medium">Berikutnya</button>
                <button class="px-3 py-1.5 border border-slate-200 bg-white hover:bg-slate-100 rounded-lg text-slate-600 transition-colors font-medium">Terakhir</button>
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