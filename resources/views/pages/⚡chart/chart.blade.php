<div class="min-h-screen flex flex-col justify-between">
    <header class="bg-white border-b border-slate-200 sticky top-0 z-50 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 py-4 flex flex-col md:flex-row items-center justify-between gap-4">
            <!-- Brand / Event Info -->
            <div class="flex items-center gap-4">
                <a href="{{route('homepage')}}" wire:navigate>
                    <div class="w-20 h-20 rounded-xl flex items-center justify-center ">
                        <img src="{{ asset('assets/images/icon.png') }}" alt="IUA Logo" class="w-full object-contain">
                    </div>
                </a>
                <div>
                    <h1 class="font-bold text-lg text-primary tracking-tight leading-tight">Annual Scientific Meeting of Indonesian Urological Association</h1>
                    <p class="text-xs text-slate-500 font-medium mt-0.5">Holiday Inn Bandung Pasteur, Bandung | Sep 30 - Oct 3, 2026</p>
                </div>
            </div>

            <div class="text-right sm:text-right">
                <div class="flex items-center gap-3">
                    <span class="w-2.5 h-2.5 rounded-full bg-rose-500 animate-pulse"></span>
                    <p class="text-lg tracking-tight leading-tight font-semibold text-slate-500">REAL-TIME E-VOTING</p>
                </div>
                <p class="text-xs text-slate-500 font-mono mt-0.5" id="liveClock">Memuat waktu...</p>
            </div>
        </div>
    </header>

    <livewire:voting.result />
    
    <div class="flex justify-end">
        <a wire:navigate href="{{route('datavote')}}" class="btn btn-link">Lihat Lengkap</a>
    </div>

    <!-- FOOTER -->
    <footer class="bg-white border-t border-slate-200 py-6 text-center text-xs text-slate-500">
        <p>&copy; 2026 MIS-IT Pharma-Pro Int</p>
    </footer>

</div>