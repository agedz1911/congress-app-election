<div>
    <header class="bg-white border-b border-slate-200 sticky top-0 z-50 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 py-4 flex flex-col md:flex-row items-center justify-between gap-4">
            <!-- Brand / Event Info -->
            <div class="flex items-center gap-4">
                <a href="{{route('homepage')}}" wire:navigate>
                    <div class="w-20 h-20 rounded-xl flex items-center justify-center ">
                        <img src="{{ asset($icon) }}" alt="IUA Logo" class="w-full object-contain">
                    </div>
                </a>
                <div>
                    <h1 class="font-bold text-lg text-primary tracking-tight leading-tight">{{ $title }}</h1>
                    <p class="text-xs text-slate-500 font-medium mt-0.5">{{$venue}} | {{$date}}</p>
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
</div>