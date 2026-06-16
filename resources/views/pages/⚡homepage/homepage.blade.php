<div>
    <div class="max-w-7xl mx-auto px-4 py-4 flex flex-col  items-center justify-center gap-4 h-screen">
        <!-- Brand / Event Info -->      
        <div class="flex flex-col items-center gap-4">
            <img src="{{ asset('storage/' . $logo2) }}" alt="Logo 2" class="w-full max-w-sm">
            <img src="{{ asset('storage/' . $logo) }}" alt="Logo" class="w-full max-w-sm">
        </div>

        <div>
            {!! str($description)->markdown()->sanitizeHtml() !!}
            <div class="flex flex-col md:flex-row justify-center items-center gap-4 mt-4">
                <a wire:navigate href="{{route('voting')}}" class="btn btn-primary">Vote Now</a>
                <a wire:navigate href="{{route('chart')}}" class="btn btn-primary btn-outline">Live Result</a>
            </div>
        </div>
        
    </div>
</div>