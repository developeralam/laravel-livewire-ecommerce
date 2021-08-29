<?php

namespace App\Http\Livewire\Backend;

use App\Models\SiteSetting;
use Livewire\Component;

class Admin extends Component
{
    public function render()
    {
        return view('livewire.backend.admin')->layout('layouts.admin', ['config' => SiteSetting::first(),]);
    }
}
