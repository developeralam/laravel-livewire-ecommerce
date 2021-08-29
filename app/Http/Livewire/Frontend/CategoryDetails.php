<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Slider;
use App\Models\Product;
use App\Models\Service;
use Livewire\Component;
use App\Models\Category;
use App\Models\SiteSetting;

class CategoryDetails extends Component
{
    public $slug;
    public $amount = 3;
    protected $listeners = ['load-more' => 'load'];
    public function mount($slug)
    {
        $this->slug = $slug;
    }
    public function render()
    {
        $id = Category::where('slug', $this->slug)->first();
        return view('livewire.frontend.category-details', [
            'products' => Product::where('cat_id', $id->id)->take($this->amount)->get(),
            'categories' => Category::get()->take(12),
            'sliders' => Slider::all(),
            'services' => Service::get()->take(3),
            'cat' => $id,
        ])->layout('layouts.guest', ['config' => SiteSetting::first()]);
    }
    public function load()
    {
        $this->amount += 3;
    }
    //Add Product to Cart 
    public function store($id, $name, $price)
    {
        Cart::add($id, $name, 1, $price)->associate('App\Models\Product');
        return redirect()->route('cart');
    }
}
