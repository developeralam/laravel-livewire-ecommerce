<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use App\Models\SiteSetting;

class Seo extends Component
{
    public function render()
    {
        return view('livewire.backend.seo')->layout('layouts.admin', ['config' => SiteSetting::first()]);
    }
}
