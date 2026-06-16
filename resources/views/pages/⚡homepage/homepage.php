<?php

use App\Models\Setting;
use Livewire\Component;

new class extends Component
{
    public ?string $title = null;
    public ?string $description = null;
    public ?string $logo = null;
    public ?string $logo2 = null;

    public function mount() {
        $setting = Setting::first();
        $this->title = $setting->title;
        $this->description = $setting->description;
        $this->logo = $setting->logo;
        $this->logo2 = $setting->logo2;
    }
};
