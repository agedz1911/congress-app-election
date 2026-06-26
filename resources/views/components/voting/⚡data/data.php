<?php

use App\Models\Participant;
use App\Models\Voting;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

new class extends Component 
{
    use WithPagination;

    public $perPage = 5;
    public $query = '';

    public function search()
    {
        $this->resetPage();
    }

    #[Computed()]
    public function participants()
    {
        $participants = Participant::with(['voting']);
        if (strlen($this->query) >= 3) {
            $participants->where(function ($query) {
                $query->where('full_name', 'like', '%' . $this->query . '%')
                    ->orWhere('participant_number', 'like', '%' . $this->query . '%')
                    ->orWhere('institution', 'like', '%' . $this->query . '%');
            });
        }
        return $participants->paginate($this->perPage);
    }

};
