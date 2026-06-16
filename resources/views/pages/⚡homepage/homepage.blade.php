<div>
    <div class="max-w-7xl mx-auto px-4 py-4 flex flex-col  items-center justify-center gap-4 h-screen">
        <!-- Brand / Event Info -->
        <div class="flex flex-col items-center gap-4">
            <img src="{{ asset('assets/images/logo-all.png') }}" alt="IUA Logo" class="w-full max-w-sm">
            <img src="{{ asset('assets/images/logo.png') }}" alt="IUA Logo" class="w-full max-w-sm">
            {{-- <div>
                <h1 class="font-bold text-2xl text-primary tracking-tight leading-tight">49<sup>th</sup> Annual Scientific Meeting of Indonesian Urological Association </h1>
                <p class="text-xs text-slate-500 font-medium mt-0.5">Holiday Inn Bandung Pasteur, Bandung, West Java | Sep 30 - Oct 3, 2025</p>
            </div> --}}
        </div>

        <div>
            <h2 class="text-3xl font-bold text-center text-primary">Welcome to the ASMIUA 2026 Presidential Election</h2>
            <p class="text-sm mb-5 text-center">Cast your vote for the next president of the Indonesian Urological Association (IUA) and shape the future of urology in Indonesia.</p>
            <div class="flex flex-col md:flex-row justify-center items-center gap-4 mt-4">
                <a wire:navigate href="{{route('voting')}}" class="btn btn-primary">Vote Now</a>
                <a wire:navigate href="{{route('chart')}}" class="btn btn-primary btn-outline">Live Result</a>
            </div>
        </div>
    </div>
</div>