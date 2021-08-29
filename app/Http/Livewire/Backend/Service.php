<?php

namespace App\Http\Livewire\Backend;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\SiteSetting;
use Livewire\WithFileUploads;
use App\Models\Service as Servic;
use Illuminate\Support\Facades\Validator;

class Service extends Component
{
    use WithFileUploads;
    public $state = [];
    public $service;
    public $newImage;
    public $editModalShow = false;
    public function mount()
    {
        $this->state['image'] = '';
    }
    //Add Service
    public function addService()
    {
        $this->editModalShow = false;
        $this->state = [];
        $this->state['image'] = '';
        $id = 'service';
        $this->emit('show-form', $id);
    }
    //Store Service
    public function storeService()
    {
        $data = Validator::make($this->state, [
            'image' => 'required|image',
            'alt' => 'required|string',
        ])->validate();
        $imgName = Carbon::now()->timestamp . '.' . $data['image']->extension();
        $data['image']->storeAs('service', $imgName);
        $data['image'] = $imgName;
        Servic::create($data);
        $id = 'service';
        $msg = "Service Inserted Successfully";
        $this->emit('close-form', $id);
        $this->emit('msg', $msg);
    }
    //Edit Modal Show
    public function editService(Servic $service)
    {
        $this->state = [];
        $this->service = $service;
        $this->editModalShow = true;
        $this->state = $service->toArray();
        $id = 'service';
        $this->emit('show-form', $id);
    }
    //Update Service
    public function updateService()
    {
        $data = Validator::make($this->state, [
            'alt' => 'required|string',
        ])->validate();
        if ($this->newImage) {
            unlink('images/service/' . $this->service->image);
            $imgName = Carbon::now()->timestamp . '.' . $this->newImage->extension();
            $this->newImage->storeAs('service', $imgName);
            $data['image'] = $imgName;
        }
        $this->service->update($data);
        $id = 'service';
        $msg = 'Service Updated Successfully';
        $this->emit('close-form', $id);
        $this->emit('msg', $msg);
    }
    public function confirmServiceRemoval(Servic $service)
    {
        $this->service = $service;
        $this->emit('showDeleteModal');
    }
    public function deleteService()
    {
        unlink('images/service/' . $this->service->image);
        $this->service->delete();
        $msg = 'Service Deleted Successfully';
        $this->emit('closeDelModal', $msg);
    }
    public function render()
    {
        return view('livewire.backend.service', ['services' => Servic::all()])->layout('layouts.admin', ['config' => SiteSetting::first()]);
    }
}
