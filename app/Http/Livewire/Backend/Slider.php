<?php

namespace App\Http\Livewire\Backend;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\SiteSetting;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Slider as Slidr;
use Illuminate\Support\Facades\Validator;

class Slider extends Component
{
    use WithFileUploads;
    public $state = [];
    public $slider;
    public $newImage;
    public $editModalShow = false;
    public function mount()
    {
        $this->state['image'] = '';
    }
    //Show add slider form
    public function addSlider()
    {
        $this->editModalShow = false;
        $this->state[] = '';
        $id = 'slider';
        $this->emit('show-form', $id);
    }
    public function storeSlider()
    {
        $data = Validator::make($this->state, [
            'category' => 'required|string',
            'name'     => 'required|string',
            'offers'   => 'required|string',
            'image'    => 'required|image',
        ])->validate();
        $imgName = Carbon::now()->timestamp . '.' . $data['image']->extension();
        $data['image']->storeAs('slider', $imgName);
        $data['image'] = $imgName;
        Slidr::create($data);
        $id = 'slider';
        $this->emit('close-form', $id);
        $this->emit('msg', 'Slider Inserted Successfully');
    }
    //Edit Slider
    public function editSlider(Slidr $slider)
    {
        $this->slider = $slider;
        $this->editModalShow = true;
        $this->state = $slider->toArray();
        $id = 'slider';
        $this->emit('show-form', $id);
    }
    //Update Slider 
    public function updateSlider()
    {
        $data = Validator::make($this->state, [
            'category' => 'required|string',
            'name'     => 'required|string',
            'offers'   => 'required|string',
            'image'    => 'nullable',
        ])->validate();
        if ($this->newImage) {
            unlink('images/slider/' . $this->slider->image);
            $imgname = Carbon::now()->timestamp . '.' . $this->newImage->extension();
            $this->newImage->storeAs('slider', $imgname);
            $data['image'] = $imgname;
        }
        $this->slider->update($data);
        $id = 'slider';
        $msg = 'Slider Updated Successfully';
        $this->emit('close-form', $id, $msg);
        $this->emit('msg', $msg);
    }
    //Show Delete Slider Modal f
    public function confirmSliderRemoval(Slidr $slider)
    {
        $this->slider = $slider;
        $id = 'deleteModal';
        $this->emit('show-form', $id);
    }
    //Delete Slider
    public function deleteSlider()
    {
        if ($this->slider->image) {
            unlink('images/slider/' . $this->slider->image);
        }
        $this->slider->delete();
        $id = 'deleteModal';
        $msg = "Slider Deleted Successfully";
        $this->emit('close-form', $id);
        $this->emit('msg', $msg);
    }
    public function render()
    {
        return view('livewire.backend.slider', ['sliders' => Slidr::all(),])->layout('layouts.admin', ['config' => SiteSetting::first()]);
    }
}
