<div class="w-full max-w-6xl mx-auto px-4 py-12">
    @if ($step === 1)
    {{-- section 1 --}}
    <div class="w-full max-w-6xl mx-auto px-4 py-12">
        <fieldset
            class="fieldset bg-white dark:bg-slate-800 border-slate-300 dark:border-slate-600 rounded-box w-full border py-10 px-6 flex flex-col items-center justify-center gap-4">
            <form wire:submit="submitParticipant" class="join w-full max-w-3xl">
                <input type="text" wire:model="participantNumber"
                    class="input join-item w-full input-xl input-info"
                    placeholder="Participant Code" />
                <button type="submit" class="btn btn-info uppercase text-sm btn-xl join-item">submit</button>
            </form>

            @error('participantNumber')
            <p class="text-sm text-error mt-2">{{ $message }}</p>
            @enderror
        </fieldset>
    </div>
    @endif

    @if ($step === 2)
    {{-- section 2 --}}
    {{-- Voter Profile Widget --}}
    <div class="card bg-white dark:bg-slate-800 rounded-2xl mb-8 shadow-sm">
        <div class="card-body">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <div class="flex items-center gap-4">
                    <div
                        class="badge badge-info badge-soft rounded-full w-10 h-10 flex items-center justify-center text-info">
                        <i class="fa-regular fa-user text-lg"></i>
                    </div>
                    <div>
                        <span
                            class="text-xs text-slate-400 dark:text-slate-500 font-medium uppercase tracking-wider">Nama
                            Pemilih</span>
                        <h3 class="font-bold text-slate-800 dark:text-slate-200 text-base">
                            {{ data_get($selectedParticipant, 'full_name', '-') }}
                        </h3>
                    </div>
                </div>
                <button wire:click="resetSelection"
                    class="btn btn-error btn-sm btn-soft rounded-lg shadow-none hover:shadow-none transition-all duration-200">
                    Reset Pilihan
                </button>
            </div>
        </div>
    </div>

    {{-- Section Title --}}
    <div class="text-center mb-10">
        <div class="badge badge-info uppercase badge-outline px-4 py-2"><span
                class="text-xs font-semibold tracking-wide">Pemilihan Terbuka</span></div>
        <h2 class="text-2xl md:text-3xl font-bold text-slate-900 mt-3">Calon Ketua Umum PERHATI-KL Pusat</h2>
        <p class="text-slate-500 text-sm mt-2">Masa Bakti Periode 2025-2028</p>
    </div>

    {{-- Candidates Grid --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
        @foreach ($candidates as $candidate)
        @php($isSelected = $selectedCandidateId === $candidate->id)
        <button wire:click="selectCandidate('{{ $candidate->id }}')" type="button"
            class="card relative bg-white dark:bg-slate-800 rounded-3xl items-center text-center cursor-pointer transition-all duration-300 hover:shadow-xl hover:-translate-y-1 {{ $isSelected ? 'ring-2 ring-info shadow-xl -translate-y-1' : '' }}">
            <div class="card-body flex flex-col items-center justify-center text-center">
                {{-- Select Checkmark (Hidden by default) --}}
                <div
                    class="badge badge-info rounded-full w-6 h-6 absolute top-4 right-4 transition-all duration-300 {{ $isSelected ? 'opacity-100 scale-100' : 'opacity-0 scale-75' }}">
                    <i class="fa fa-check"></i>
                </div>
                {{-- Candidate Number --}}
                <div
                    class="badge w-12 h-12 rounded-2xl text-slate-700 font-extrabold text-xl flex items-center justify-center mb-6 transition-colors duration-300 {{ $isSelected ? 'bg-info text-white' : '' }}">
                    {{ $candidate->no_urut }}
                </div>
                {{-- Avatar Container --}}
                @if ($candidate->photo !== null)
                <div
                    class="w-40 h-40 rounded-2xl bg-slate-100 dark:bg-slate-700 overflow-hidden mb-6 border border-slate-200 dark:border-slate-600 relative">
                    {{-- Photo Overlay --}}
                    <div class="absolute inset-0 bg-linear-to-t from-slate-900/40 to-transparent z-10"></div>
                    <img src="{{ asset('storage/' . $candidate->photo) }}" alt="{{ $candidate->name }}"
                        class="w-full h-full object-cover transition-transform duration-500 {{ $isSelected ? 'scale-105' : '' }}">
                </div>
                @else
                <div
                    class="w-40 h-40 rounded-2xl bg-rose-50 flex items-center justify-center mb-6 border border-rose-100 transition-colors duration-300 {{ $isSelected ? 'bg-rose-100/50' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-rose-500 stroke-[1.5]" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                    </svg>
                </div>
                @endif
                {{-- Name & Credentials --}}
                <h4 class="font-bold text-slate-900 text-base leading-snug transition-colors duration-300 {{ $isSelected ? 'text-info' : '' }}">
                    {{ $candidate->name }}
                </h4>
                <p class="text-xs text-slate-500 font-medium leading-relaxed mb-5">
                    {{ $candidate->title }}
                </p>
            </div>
        </button>
        @endforeach
    </div>

    @error('selectedCandidateId')
    <p class="text-sm text-error mt-2 mb-4">{{ $message }}</p>
    @enderror

    {{-- Sticky Bottom Action Bar --}}
    <div
        class="bg-white border border-slate-200 rounded-2xl p-4 shadow-lg flex flex-col sm:flex-row items-center justify-between gap-4">
        <div class="flex items-center gap-2 text-sm text-slate-500">
            <i class="fa fa-info-circle text-xl text-warning"></i>
            <span>Silakan pilih salah satu kartu calon di atas, lalu klik <strong>Lanjutkan</strong>.</span>
        </div>

        <button wire:click="saveVoting" @disabled(!$selectedCandidateId)
            class="w-full sm:w-auto px-8 py-3 font-semibold rounded-xl transition-all duration-300 shadow-md {{ $selectedCandidateId ? 'bg-info text-white hover:bg-info/90 cursor-pointer' : 'bg-slate-200 text-slate-400 cursor-not-allowed' }}">
            Lanjutkan
        </button>
    </div>
    @endif

    @if ($step === 3)
    {{-- section 3 --}}
    <div wire:poll.4s="resetToStart" class="w-full max-w-6xl mx-auto px-4 py-12 flex flex-col items-center justify-center gap-2">
        <div
            class="w-40 h-40 rounded-2xl bg-success flex flex-col items-center justify-center mb-6 border border-success transition-colors duration-300">
            <i class="fa fa-check-circle text-white text-4xl"></i>
            <p class="text-white text-sm font-medium mt-5">Vote berhasil!</p>
        </div>
        <h1 class="text-2xl font-bold text-slate-900 text-center">Terima kasih telah memberikan suara Anda!</h1>
        <p class="text-slate-500 text-sm">Data voting sudah tersimpan ke database.</p>
        <p class="text-slate-400 text-xs">Halaman akan kembali ke langkah awal otomatis dalam 4 detik.</p>
    </div>
    @endif
</div>