<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use App\Models\SiteSetting;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use App\Models\Category as Categori;
use Illuminate\Support\Facades\Validator;

class Category extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $state = [];
    public $editModalShow = false;
    public $catIdBeingRemoved = null;
    public function addCat()
    {
        $this->state = [];
        $this->editModalShow = false;
        $id = 'category';
        $this->emit('show-form', $id);
    }
    //Store Category Data
    public function storeCat()
    {
        $data = Validator::make($this->state, [
            'name' => 'required',
        ])->validate();
        $data['slug'] = Str::slug($data['name']);
        Categori::create($data);
        $id = "category";
        $this->emit('close-form', $id);
        $message = "Category Created Successfully";
        $this->emit('msg', $message);
    }
    //Edit Category
    public function editCat(Categori $cat)
    {
        $this->editModalShow = true;
        $this->state = $cat->toArray();
        $this->emit('show-form');
    }
    // Update Category
    public function updateCat()
    {
        $cat = Categori::find($this->state['id']);
        $data = Validator::make($this->state, [
            'name' => 'required',
        ])->validate();
        $data['slug'] = Str::slug($data['name']);
        $cat->update($data);
        $message = "Category Updated Successfully";
        $this->emit('closeAddCat', $message);
    }
    //Delete Modal Show
    public function confirmCatRemoval($id)
    {
        $this->catIdBeingRemoved = $id;
        $this->emit('showDeleteModal');
    }
    //Delete Category 
    public function deleteCat()
    {
        $cat = Categori::findOrFail($this->catIdBeingRemoved);
        $cat->delete();
        $message = "Category Deleted Successfully";
        $this->emit('closeDelModal', $message);
    }
    public function render()
    {
        return view('livewire.backend.category', ['categories' => Categori::paginate(3)])->layout('layouts.admin', ['config' => SiteSetting::first()]);
    }
}
