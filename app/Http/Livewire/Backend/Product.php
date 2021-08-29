<?php

namespace App\Http\Livewire\Backend;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Category;
use App\Models\SiteSetting;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Product as Pro;
use Illuminate\Support\Facades\Validator;

class Product extends Component
{
    use WithFileUploads;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $state = [];
    public $newImage;
    public $newImages;
    public $delProId;
    public $product;
    public $editModalShow = false;
    //Summernote
    public $summernote_id = "#short_description, #description";
    //Show Add Product Modal
    public function addProduct()
    {
        // $this->emit('summernote', $this->summernote_id);
        $this->state = [];
        $this->state['image'] = '';
        $this->state['images'] = '';
        $this->editModalShow = false;
        $id = 'addProduct';
        $this->emit('show-form', $id);
    }
    //Store Product 
    public function storeProduct()
    {
        $data = Validator::make($this->state, [
            'name'              => 'required|unique:products',
            'cat_id'            => 'integer',
            'short_description' => 'string',
            'description'       => 'required',
            'regular_price'     => 'required|integer',
            'sale_price'        => 'integer',
            'stock_status'      => 'string',
            'featured'          => 'integer',
            'image'             => 'required',
            'images'            => 'array',
        ])->validate();
        $data['slug'] = Str::slug($data['name']);
        //image
        $imageName = Carbon::now()->timestamp . '.' . $data['image']->extension();
        $data['image']->storeAs('product', $imageName);
        $data['image'] = $imageName;

        //Image Gallery
        if ($data['images']) {
            $img = '';
            foreach ($data['images'] as $key => $image) {
                $imgName = Carbon::now()->timestamp . $key . '.' . $image->extension();
                $image->storeAs('product', $imgName);
                $img = $img . ',' . $imgName;
            }
            $data['images'] = $img;
        }
        Pro::create($data);
        $message = "Product Inserted Successfully";
        $this->emit('closeAddPro', $message);
    }
    //Edit Product 
    public function editPro(Pro $product)
    {
        $this->state = [];
        $this->editModalShow = true;
        $this->product = $product;
        $this->state = $product->toArray();
        $id = 'addProduct';
        $this->emit('show-form', $id);
    }
    //Update Product 
    public function updateProduct()
    {
        $deta = Validator::make($this->state, [
            'name'              => 'required|unique:products,name,' . $this->state['id'],
            'cat_id'            => 'integer',
            'short_description' => 'string',
            'description'       => 'required',
            'regular_price'     => 'required|integer',
            'sale_price'        => 'integer',
            'stock_status'      => 'string',
            'featured'          => 'integer',
        ])->validate();
        //Image Section
        if ($this->newImage) {
            //Delete Old Image
            unlink('images/product/' . $this->product->image);
            $imageName = Carbon::now()->timestamp . '.' . $this->newImage->extension();
            $this->newImage->storeAs('product', $imageName);
            $deta['image'] = $imageName;
        } else {
            $deta['image'] = $this->product->image;
        }
        //image Gallery
        if ($this->newImages) {
            //Delete Old Images
            $images = explode(',', $this->product->images);
            $images = array_slice($images, 1);
            foreach ($images as $imag) {

                unlink('images/product/' . $imag);
            }
            $img = '';
            foreach ($this->newImages as $key => $image) {
                $imgName = Carbon::now()->timestamp . $key . '.' . $image->extension();
                $image->storeAs('product', $imgName);
                $img = $img . ',' . $imgName;
            }
            $deta['images'] = $img;
        } else {
            $deta['images'] = $this->product->images;
        }
        $this->product->update($deta);
        $id = 'addProduct';
        $msg = "Product Updated Successfully";
        $this->emit('close-form', $id);
        $this->emit('msg', $msg);
    }
    //Show Delete Modal
    public function confirmProRemoval($id)
    {
        $this->delProId = $id;
        $modalId = 'deleteModal';
        $this->emit('show-form', $modalId);
    }
    //Delete Product
    public function deletePro()
    {
        $pro = Pro::find($this->delProId);
        if ($pro->image) {
            unlink('images/product/' . $pro->image);
        }
        if ($pro->images) {
            $images = explode(',', $pro->images);
            $images = array_slice($images, 1);
            foreach ($images as $imag) {

                unlink('images/product/' . $imag);
            }
        }
        $pro->delete();
        $message = "Product Deleted Successfully";
        $this->emit('closeDelModal', $message);
    }
    public function mount()
    {
        $this->state['image'] = '';
        $this->state['images'] = '';
    }
    public function render()
    {

        return view('livewire.backend.product', ['categories' => Category::all(), 'products' => Pro::paginate(5)])->layout('layouts.admin', ['config' => SiteSetting::first()]);
    }
}
