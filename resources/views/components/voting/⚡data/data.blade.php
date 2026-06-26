<div class="w-full mx-auto px-4 py-12">
    <!-- LOG AKTIVITAS / DATA PEMILIH TABLE CARD -->
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">

        <!-- Table Header Controls -->
        <div class="p-6 border-b border-slate-100 flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h2 class="font-bold text-slate-900 text-lg">Log Aktivitas & Data Pemilih</h2>
                <p class="text-xs text-slate-400 mt-1">Menampilkan data kehadiran serta status voting peserta</p>
            </div>

            <!-- Action Buttons & Search -->
            <div class="flex flex-wrap items-center gap-3">
                <div>
                    <form wire:submit.prevent="search">
                        <label class="input input-sm input-primary">
                            <i class="fa fa-search h-[1em] opacity-50 text-xs"></i>
                            <input wire:model.live.debounce.1000ms="query" type="search" class="grow"
                                placeholder="Search" />
                        </label>
                    </form>
                </div>
                <button
                    class="inline-flex items-center gap-2 px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-semibold rounded-xl transition-colors duration-150 shadow-sm shadow-emerald-100">
                    <i class="fa-regular fa-file-excel"></i>
                    Export Excel
                </button>
                @auth
                <button onclick="confirm_reset_selected_modal.showModal()" @disabled(count($selectedParticipantIds)===0)
                    class="inline-flex items-center gap-2 px-4 py-2 bg-amber-500 hover:bg-amber-600 text-white text-xs font-semibold rounded-xl transition-colors duration-150 shadow-sm"
                    type="button">
                    <i class="fa fa-rotate-left"></i>
                    Hapus Data Voting Terpilih
                </button>
                <button onclick="confirm_reset_all_modal.showModal()"
                    class="inline-flex items-center gap-2 px-4 py-2 bg-rose-600 hover:bg-rose-700 text-white text-xs font-semibold rounded-xl transition-colors duration-150 shadow-sm"
                    type="button">
                    <i class="fa fa-trash-can"></i>
                    Hapus Semua Data Voting
                </button>
                @endauth
            </div>
        </div>

        @if ($feedbackMessage)
        <div class="px-6 py-3 border-b border-slate-100 bg-slate-50 text-xs text-slate-600">
            {{ $feedbackMessage }}
        </div>
        @endif

        <!-- Table Container (Responsive) -->
        <div class="overflow-x-auto">
            <table class="table table-zebra">
                <!-- head -->
                <thead
                    class="bg-slate-50 text-xs font-semibold text-slate-600 uppercase tracking-wider border-b border-slate-100">
                    <tr>
                        <th>
                            <input type="checkbox" class="checkbox checkbox-sm"
                                wire:model.live="selectAllCurrentPage" />
                        </th>
                        <th>No</th>
                        <th>Voting Number</th>
                        <th>Participant Code</th>
                        <th>Full Name</th>
                        <th>Institution</th>
                        <th>Member ID</th>
                        <th>Voting Status</th>
                        <th>Voting Time</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="text-sm text-slate-500">
                    @foreach ($this->participants as $participant)
                    <tr>
                        <td>
                            <input type="checkbox" class="checkbox checkbox-sm" value="{{ $participant->id }}"
                                wire:model.live="selectedParticipantIds" />
                        </td>
                        <th>{{ $loop->iteration }}</th>
                        <td>

                            {{ $participant->voting?->voting_number ?? 'N/A' }}
                        </td>
                        <td>{{ $participant->participant_number }}</td>
                        <td>{{ $participant->full_name }}</td>
                        <td>{{ $participant->institution }}</td>
                        <td>{{ $participant->member_id }}</td>
                        <td>
                            {!! $participant->voting?->voting_time ?
                            '<div class="badge badge-soft badge-success text-xs"><i class="fa fa-circle text-[8px]"></i>
                                Sudah Voting</div>' :
                            '<div class="badge badge-error badge-soft text-xs"><i
                                    class="fas fa-hourglass-half text-[8px]"></i> Belum Voting</div>'
                            !!}
                        </td>
                        <td>{{ $participant->voting?->voting_time ?
                            \Carbon\Carbon::parse($participant->voting->voting_time)->format('d M Y H:i:s') : 'N/A' }}
                        </td>
                        @auth
                        <td>{{ $participant->voting?->candidate?->name ?? 'N/A' }}</td>
                        @endauth
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4 px-6 py-4 text-xs text-slate-500">
            <p class="mb-3">Dipilih: <strong>{{ count($selectedParticipantIds) }}</strong> peserta.</p>
            {{ $this->participants->links() }}
        </div>

    </div>

    <dialog id="confirm_reset_selected_modal" class="modal">
        <div class="modal-box">
            <h3 class="font-bold text-lg">Konfirmasi Reset Voting Terpilih</h3>
            <p class="py-4 text-sm text-slate-600">
                Anda akan mereset status voting dari <strong>{{ count($selectedParticipantIds) }}</strong> peserta
                terpilih menjadi
                <strong>Belum Voting</strong>. Lanjutkan?
            </p>
            <div class="modal-action">
                <form method="dialog">
                    <button class="btn btn-ghost">Batal</button>
                </form>
                <button class="btn btn-warning" type="button" @disabled(count($selectedParticipantIds)===0)
                    onclick="confirm_reset_selected_modal.close()" wire:click="resetSelectedVotingStatus">
                    Ya, Reset Terpilih
                </button>
            </div>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button>Tutup</button>
        </form>
    </dialog>

    <dialog id="confirm_reset_all_modal" class="modal">
        <div class="modal-box">
            <h3 class="font-bold text-lg">Konfirmasi Reset Semua Voting</h3>
            <p class="py-4 text-sm text-slate-600">
                Tindakan ini akan mereset <strong>semua status voting aktif</strong> menjadi <strong>Belum
                    Voting</strong>.
                Data peserta tidak dihapus. Lanjutkan?
            </p>
            <div class="modal-action">
                <form method="dialog">
                    <button class="btn btn-ghost">Batal</button>
                </form>
                <button class="btn btn-error" type="button" onclick="confirm_reset_all_modal.close()"
                    wire:click="resetAllVotingStatus">
                    Ya, Reset Semua
                </button>
            </div>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button>Tutup</button>
        </form>
    </dialog>
</div>