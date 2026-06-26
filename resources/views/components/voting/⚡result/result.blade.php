<div wire:poll.5s class="w-full max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        {{-- Total Data participants --}}
        <div class="card bg-white rounded-2xl shadow-sm dark:bg-slate-800">
            <div class="card-body">
                <div class="flex items-center justify-between">
                    <div>
                        <span class="text-xs text-slate-400 font-semibold uppercase tracking-wider">Total Participants</span>
                        <h3 class="text-3xl font-bold text-slate-900 mt-1">{{ number_format($this->totalParticipants) }}</h3>
                    </div>
                    <div class="p-3 bg-blue-50 text-blue-600 rounded-xl">
                        <i class="fa fa-users text-lg"></i>
                    </div>
                </div>
            </div>
        </div>
        {{-- Suara Masuk --}}
        <div class="card bg-white rounded-2xl shadow-sm dark:bg-slate-800">
            <div class="card-body">
                <div class="flex items-center justify-between">
                    <div>
                        <span class="text-xs text-slate-400 font-semibold uppercase tracking-wider">Suara Masuk</span>
                        <h3 class="text-3xl font-bold text-emerald-600 mt-1">{{ number_format($this->totalVotes) }}</h3>
                    </div>
                    <div class="p-3 bg-emerald-50 text-emerald-600 rounded-xl">
                        <i class="fa fa-check-circle text-lg"></i>
                    </div>
                </div>
            </div>
        </div>

        {{-- Belum Memilih --}}
        <div class="card bg-white rounded-2xl shadow-sm dark:bg-slate-800">
            <div class="card-body">
                <div class="flex items-center justify-between">
                    <div>
                        <span class="text-xs text-slate-400 font-semibold uppercase tracking-wider">Belum Memilih</span>
                        <h3 class="text-3xl font-bold text-rose-500 mt-1">{{ number_format($this->notVotedYet) }}</h3>
                    </div>
                    <div class="p-3 bg-rose-50 text-rose-600 rounded-xl">
                        <i class="fa fa-triangle-exclamation text-lg"></i>
                    </div>
                </div>
            </div>
        </div>

        {{-- Tingkat Partisipasi --}}
        <div class="card bg-white rounded-2xl shadow-sm dark:bg-slate-800">
            <div class="card-body">
                <div class="flex items-center justify-between">
                    <div>
                        <span class="text-xs text-slate-400 font-semibold uppercase tracking-wider">Partisipasi</span>
                        <h3 class="text-3xl font-bold text-slate-900 mt-1">{{ number_format($this->participationRate, 2, ',', '.') }}%</h3>
                    </div>
                    <div class="p-3 bg-indigo-50 text-indigo-600 rounded-xl">
                        <i class="fa fa-chart-pie text-lg"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- DIAGRAM DAN DETAIL PEROLEHAN SUARA --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">

        {{-- Donut Chart Box --}}
        <div
            class="lg:col-span-1 bg-white p-6 rounded-2xl border border-slate-200 shadow-sm flex flex-col justify-between relative overflow-hidden">
            <div class="flex items-center justify-between mb-4 border-b border-slate-100 pb-3">
                <h2 class="font-bold text-slate-900">Diagram Perolehan</h2>
                <span
                    class="flex items-center gap-1.5 text-xs text-rose-600 font-semibold bg-rose-50 px-2.5 py-1 rounded-full animate-pulse">
                    <span class="w-1.5 h-1.5 rounded-full bg-rose-600"></span> LIVE
                </span>
            </div>

            {{-- Chart Wrapper --}}
            <div class="relative w-64 h-64 mx-auto my-4 flex items-center justify-center">
                <div wire:ignore class="absolute inset-0">
                    <canvas id="liveChart" class="w-full h-full"></canvas>
                </div>
                {{-- Center Total Number --}}
                <div class="absolute flex flex-col items-center justify-center pointer-events-none">
                    <span class="text-xs text-slate-400 font-medium tracking-wider uppercase">Total</span>
                    <span class="text-4xl font-extrabold text-slate-800 tracking-tight">{{ number_format($this->totalVotes) }}</span>
                    <span class="text-[10px] text-slate-400">Suara</span>
                </div>
            </div>

            <p class="text-center text-xs text-slate-400 mt-2">Diagram otomatis diperbarui setiap kali ada suara masuk.
            </p>
        </div>

        {{-- Detail Perolehan (Legend Cards) --}}
        <div class="lg:col-span-2 bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
            <div class="flex items-center justify-between mb-6 border-b border-slate-100 pb-3">
                <h2 class="font-bold text-slate-900">Rincian Perolehan Suara</h2>
                <span class="text-xs text-slate-500 font-medium">Diurutkan berdasarkan nomor urut</span>
            </div>

            <div class="space-y-4">
                @forelse ($this->candidateResults as $candidate)
                <div class="p-4 rounded-xl border transition-all duration-200 {{ $candidate['card'] }}">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-2 mb-3">
                        <div class="flex items-center gap-3">
                            <span class="w-8 h-8 rounded-lg font-extrabold text-sm flex items-center justify-center {{ $candidate['badge'] }}">
                                {{ $candidate['no_urut'] }}
                            </span>
                            <div>
                                <h4 class="font-bold text-slate-900 text-sm sm:text-base">{{ $candidate['name'] }}</h4>
                            </div>
                        </div>
                        <div class="text-right sm:text-right min-w-25">
                            <span class="font-extrabold text-xl {{ $candidate['text'] }}">{{ number_format($candidate['votes']) }} <span
                                    class="text-xs text-slate-500 font-normal">Suara</span></span>
                        </div>
                    </div>
                    <div class="w-full bg-slate-100 h-2.5 rounded-full overflow-hidden">
                        <div class="h-full rounded-full transition-all duration-1000 {{ $candidate['bar'] }}"
                            style="width: {{ $candidate['percentage'] }}%"></div>
                    </div>
                    <div class="flex justify-between text-[11px] text-slate-400 mt-2 font-medium">
                        <span>Persentase Suara Masuk</span>
                        <span>{{ number_format($candidate['percentage'], 2, ',', '.') }}%</span>
                    </div>
                </div>
                @empty
                <div class="p-4 rounded-xl border border-dashed border-slate-200 bg-slate-50 text-sm text-slate-500">
                    Belum ada data kandidat untuk ditampilkan.
                </div>
                @endforelse
            </div>
        </div>

    </div>

</div>

<script>
    document.addEventListener('livewire:initialized', () => {
        if (window.votingResultChartBooted) {
            return;
        }

        window.votingResultChartBooted = true;

        const renderChart = (chartData) => {
            const canvas = document.getElementById('liveChart');

            if (!canvas || typeof Chart === 'undefined') {
                return;
            }

            const totalVotes = Number(chartData.totalVotes || 0);

            if (window.votingResultChart instanceof Chart) {
                window.votingResultChart.data.labels = chartData.labels;
                window.votingResultChart.data.datasets[0].data = chartData.datasets[0].data;
                window.votingResultChart.data.datasets[0].backgroundColor = chartData.datasets[0].backgroundColor;
                window.votingResultChart.update();
                return;
            }

            window.votingResultChart = new Chart(canvas.getContext('2d'), {
                type: 'doughnut',
                data: {
                    labels: chartData.labels,
                    datasets: chartData.datasets,
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutout: '75%',
                    plugins: {
                        legend: {
                            display: false,
                        },
                        tooltip: {
                            callbacks: {
                                label(context) {
                                    let label = context.label || '';

                                    if (label) {
                                        label += ': ';
                                    }

                                    if (context.parsed !== null) {
                                        const currentTotalVotes = Number(window.votingResultChart?.data?.datasets?.[0]?.data?.reduce((sum, value) => sum + Number(value), 0) || totalVotes);
                                        const percentage = currentTotalVotes > 0
                                            ? ((context.parsed / currentTotalVotes) * 100).toFixed(2)
                                            : '0.00';
                                        label += `${context.parsed} Suara (${percentage}%)`;
                                    }

                                    return label;
                                },
                            },
                        },
                    },
                },
            });
        };

        renderChart(@js($this->chartData));

        Livewire.on('votes-chart-updated', (event) => {
            renderChart(event.chartData);
        });

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
    });
</script>