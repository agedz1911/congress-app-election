<?php

use Livewire\Attributes\Title;
use Livewire\Component;

new #[Title('Voting')] class extends Component
{
    public ?string $title = null;
    public ?string $description = null;
    public ?string $logo = null;
    public ?string $logo2 = null;
    public ?string $icon = null;
    public ?string $venue = null;
    public ?string $date = null;

    public function mount() {
        $setting = \App\Models\Setting::first();
        $this->title = $setting->title;
        $this->description = $setting->description;
        $this->logo = $setting->logo;
        $this->logo2 = $setting->logo2;
        $this->icon = $setting->icon;
        $this->venue = $setting->venue;
        $this->date = $setting->date;
    }
};