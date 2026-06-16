<div class="w-full max-w-6xl mx-auto px-4 py-12">
    <!-- Voter Profile Widget -->
    <div class="bg-white rounded-2xl border border-slate-200 p-5 mb-8 shadow-sm flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div class="flex items-center gap-4">
            <div class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center text-blue-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
            </div>
            <div>
                <span class="text-xs text-slate-400 font-medium uppercase tracking-wider">Nama Pemilih</span>
                <h3 class="font-bold text-slate-800 text-base" id="voterName">Fairuz Balfas</h3>
            </div>
        </div>
        <button onclick="resetSelection()" class="text-xs font-semibold text-rose-600 hover:text-rose-700 bg-rose-50 hover:bg-rose-100 px-3 py-2 rounded-lg transition-all duration-200">
            Reset Pilihan
        </button>
    </div>

    <!-- Section Title -->
    <div class="text-center mb-10">
        <span class="px-3 py-1 bg-blue-50 text-blue-700 rounded-full text-xs font-semibold tracking-wide uppercase">Pemilihan Terbuka</span>
        <h2 class="text-2xl md:text-3xl font-bold text-slate-900 mt-3">Calon Ketua Umum PERHATI-KL Pusat</h2>
        <p class="text-slate-500 text-sm mt-2">Masa Bakti Periode 2025–2028</p>
    </div>

    <!-- Candidates Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">

        <!-- Candidate 01 -->
        <div id="candidate-1" onclick="selectCandidate(1)" class="candidate-card group relative bg-white border-2 border-slate-200 rounded-3xl p-6 flex flex-col items-center text-center cursor-pointer transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
            <!-- Select Checkmark (Hidden by default) -->
            <div class="absolute top-4 right-4 w-6 h-6 rounded-full bg-blue-600 text-white flex items-center justify-center text-xs opacity-0 scale-75 transition-all duration-300 checkmark">
                ✓
            </div>

            <!-- Candidate Number -->
            <div class="w-12 h-12 rounded-2xl bg-slate-100 text-slate-700 font-extrabold text-xl flex items-center justify-center mb-6 group-hover:bg-blue-50 group-hover:text-blue-600 transition-colors duration-300 num-badge">
                01
            </div>

            <!-- Avatar Container -->
            <div class="w-40 h-40 rounded-2xl bg-slate-100 overflow-hidden mb-6 border border-slate-200 relative">
                <!-- Placeholder visual representation of Candidate 1 -->
                <div class="absolute inset-0 bg-gradient-to-t from-slate-900/40 to-transparent z-10"></div>
                <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&q=80&w=300&h=300" alt="Prof. Dr. dr. Achmad Chusnu Romdhoni" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
            </div>

            <!-- Name & Credentials -->
            <h4 class="font-bold text-slate-900 text-base leading-snug group-hover:text-blue-600 transition-colors duration-300">
                Prof. Dr. dr. Achmad Chusnu Romdhoni
            </h4>
            <p class="text-xs text-slate-500 font-medium mt-2 leading-relaxed">
                Sp.THT-BKL, Subsp.Onk. (K). FICS
            </p>
        </div>

        <!-- Candidate 02 -->
        <div id="candidate-2" onclick="selectCandidate(2)" class="candidate-card group relative bg-white border-2 border-slate-200 rounded-3xl p-6 flex flex-col items-center text-center cursor-pointer transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
            <!-- Select Checkmark -->
            <div class="absolute top-4 right-4 w-6 h-6 rounded-full bg-blue-600 text-white flex items-center justify-center text-xs opacity-0 scale-75 transition-all duration-300 checkmark">
                ✓
            </div>

            <!-- Candidate Number -->
            <div class="w-12 h-12 rounded-2xl bg-slate-100 text-slate-700 font-extrabold text-xl flex items-center justify-center mb-6 group-hover:bg-blue-50 group-hover:text-blue-600 transition-colors duration-300 num-badge">
                02
            </div>

            <!-- Avatar Container -->
            <div class="w-40 h-40 rounded-2xl bg-slate-100 overflow-hidden mb-6 border border-slate-200 relative">
                <!-- Placeholder visual representation of Candidate 2 -->
                <div class="absolute inset-0 bg-gradient-to-t from-slate-900/40 to-transparent z-10"></div>
                <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&q=80&w=300&h=300" alt="Dr. Marlinda Adham" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
            </div>

            <!-- Name & Credentials -->
            <h4 class="font-bold text-slate-900 text-base leading-snug group-hover:text-blue-600 transition-colors duration-300">
                Dr. Marlinda Adham
            </h4>
            <p class="text-xs text-slate-500 font-medium mt-2 leading-relaxed">
                Sp.T.H.T.B.K.I, Subsp.Onk. (K)., PhD., FACS
            </p>
        </div>

        <!-- Abstain Option -->
        <div id="candidate-3" onclick="selectCandidate(3)" class="candidate-card group relative bg-white border-2 border-slate-200 rounded-3xl p-6 flex flex-col items-center text-center cursor-pointer transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
            <!-- Select Checkmark -->
            <div class="absolute top-4 right-4 w-6 h-6 rounded-full bg-blue-600 text-white flex items-center justify-center text-xs opacity-0 scale-75 transition-all duration-300 checkmark">
                ✓
            </div>

            <!-- Option Title -->
            <div class="w-12 h-12 rounded-2xl bg-slate-100 text-slate-700 font-extrabold text-xs flex items-center justify-center mb-6 uppercase tracking-wider group-hover:bg-blue-50 group-hover:text-blue-600 transition-colors duration-300 num-badge">
                N/A
            </div>

            <!-- Abstain Icon Container -->
            <div class="w-40 h-40 rounded-2xl bg-rose-50 flex items-center justify-center mb-6 border border-rose-100 group-hover:bg-rose-100/50 transition-colors duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-rose-500 stroke-[1.5]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                </svg>
            </div>

            <!-- Name & Info -->
            <h4 class="font-bold text-slate-900 text-base leading-snug group-hover:text-rose-600 transition-colors duration-300">
                ABSTAIN
            </h4>
            <p class="text-xs text-slate-400 mt-2 leading-relaxed">
                Memilih untuk tidak memberikan suara kepada salah satu calon.
            </p>
        </div>

    </div>

    <!-- Sticky Bottom Action Bar -->
    <div class="bg-white border border-slate-200 rounded-2xl p-4 shadow-lg flex flex-col sm:flex-row items-center justify-between gap-4">
        <div class="flex items-center gap-2 text-sm text-slate-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-amber-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>Silakan pilih salah satu kartu calon di atas, lalu klik <strong>Lanjutkan</strong>.</span>
        </div>

        <button id="nextBtn" disabled onclick="submitVote()" class="w-full sm:w-auto px-8 py-3 bg-slate-200 text-slate-400 font-semibold rounded-xl cursor-not-allowed transition-all duration-300 shadow-md">
            Lanjutkan
        </button>
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
            datasets: [{
                data: [341, 293, 3],
                backgroundColor: [
                    "#F43F5E", // Rose-500 (Calon 01)
                    "#10B981", // Emerald-500 (Calon 02)
                    "#3B82F6", // Blue-500 (Abstain)
                ],
                borderColor: "#ffffff",
                borderWidth: 4,
                hoverOffset: 6,
            }, ],
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
                        label: function(context) {
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