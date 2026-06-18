<?php

use App\Models\Setting;
use Livewire\Component;

new class extends Component
{
    public ?string $title = null;
    public ?string $icon = null;
    public ?string $venue = null;
    public ?string $date = null;

    public function mount() {
        $setting = Setting::first();
        $this->title = $setting->title;
        $this->icon = $setting->icon;
        $this->venue = $setting->venue;
        $this->date = $setting->date;
    }
};