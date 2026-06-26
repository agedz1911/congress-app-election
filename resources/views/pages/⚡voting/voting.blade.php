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

            <ul class="steps" x-data="{ currentStep: 1 }" @voting-step-changed.window="currentStep = Number($event.detail.step ?? 1)">
                <li class="step transition-all duration-300" :data-content="currentStep > 1 ? '✓' : '1'" :class="[currentStep >= 1 ? 'step-success' : 'step-info', currentStep === 1 ? 'animate-pulse' : '']">Scan Barcode</li>
                <li class="step transition-all duration-300" :data-content="currentStep > 2 ? '✓' : '2'" :class="[currentStep >= 2 ? 'step-success' : 'step-info', currentStep === 2 ? 'animate-pulse' : '']">Vote</li>
                <li class="step transition-all duration-300" :data-content="currentStep >= 3 ? '✓' : '3'" :class="[currentStep >= 3 ? 'step-success' : 'step-info', currentStep === 3 ? 'animate-pulse' : '']">Selesai</li>
            </ul>
        </div>
    </header>

    <livewire:voting.create />


    <!-- FOOTER -->
    <footer class="bg-white border-t border-slate-200 py-6 text-center text-xs text-slate-500">
        <p>&copy; {{ date('Y') }} MIS-IT Pharma-Pro Int</p>
    </footer>

</div>