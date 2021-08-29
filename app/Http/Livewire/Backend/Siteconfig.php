<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use App\Models\SiteSetting;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Validator;

class Siteconfig extends Component
{
    use WithFileUploads;
    public $state = [];
    public function mount()
    {
        $this->state['id'] = '';
        $this->state['favicon'] = '';
        $this->state['logo'] = '';
        $first = SiteSetting::first();
        if ($first) {
            $this->state = $first->toArray();
        }
    }
    public function storeSiteconfig()
    {
        $first = SiteSetting::first();
        $data = Validator::make($this->state, [
            'title' => 'required',
            'description' => 'required',
            'keywords' => 'required',
            'favicon' => 'nullable',
            'logo' => 'nullable',
            'phone' => 'required|string',
            'email' => 'required',
            'address' => 'required',
            'facebook' => 'string',
            'twitter' => 'string',
            'linkedin' => 'string',
            'instagram' => 'string',
        ])->validate();
        if ($data['logo'] && $data['logo'] != 'logo.png') {
            $imgName = 'logo.png';
            $data['logo']->storeAs('siteconfig', $imgName);
            $data['logo'] = $imgName;
        }
        if ($data['favicon'] && $data['favicon'] != 'favicon.png') {
            $imgName = 'favicon.png';
            $data['favicon']->storeAs('siteconfig', $imgName);
            $data['favicon'] = $imgName;
        }
        if ($this->state['id']) {
            $first->update($data);
            $msg = "Site Information Data Updated Successfully";
            $this->emit('toastr', $msg);
        } else {
            SiteSetting::create($data);
            $msg = "Site Information Data Inserted Successfully";
            $this->emit('toastr', $msg);
        }
    }
    public function render()
    {
        return view('livewire.backend.siteconfig')->layout('layouts.admin', ['config' => SiteSetting::first()]);
    }
}
