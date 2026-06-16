<div class="min-h-screen flex flex-col justify-between">
    <header class="bg-white border-b border-slate-200 sticky top-0 z-50 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 py-4 flex flex-col md:flex-row items-center justify-between gap-4">
            <!-- Brand / Event Info -->
            <a href="{{route('homepage')}}" wire:navigate>
                <div class="flex items-center gap-4">
                    <div class="w-20 h-20 rounded-xl flex items-center justify-center ">
                        <img src="{{ asset('storage/' . $icon) }}" alt="IUA Logo" class="w-full object-contain">
                    </div>
                    <div>
                        <h1 class="font-bold text-lg text-primary tracking-tight leading-tight">{{ $title }}</h1>
                        <p class="text-xs text-slate-500 font-medium mt-0.5">{{$venue}} | {{$date}}</p>
                    </div>
                </div>
            </a>

            <ul class="steps">
                <li data-content="✓" class="step step-success">Scan Barcode</li>
                <li data-content="2" class="step step-success">Vote</li>
                <li data-content="3" class="step step-info">Selesai</li>
            </ul>
        </div>
    </header>

    <livewire:voting.create />


    <!-- FOOTER -->
    <footer class="bg-white border-t border-slate-200 py-6 text-center text-xs text-slate-500">
        <p>&copy; {{ date('Y') }} MIS-IT Pharma-Pro Int</p>
    </footer>

</div>