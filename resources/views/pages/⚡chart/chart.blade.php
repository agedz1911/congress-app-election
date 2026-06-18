<div class="min-h-screen flex flex-col justify-between">
    <livewire:header />

    <livewire:voting.result />
    
    <div class="flex justify-end">
        <a wire:navigate href="{{route('datavote')}}" class="btn btn-link">Lihat Lengkap</a>
    </div>

    <!-- FOOTER -->
    <footer class="bg-white border-t border-slate-200 py-6 text-center text-xs text-slate-500">
        <p>&copy; 2026 MIS-IT Pharma-Pro Int</p>
    </footer>

</div>