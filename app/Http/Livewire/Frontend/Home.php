<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Slider;
use App\Models\Product;
use App\Models\Service;
use Livewire\Component;
use App\Models\Category;
use App\Models\SiteSetting;
use Livewire\WithPagination;
use Gloudemans\Shoppingcart\Facades\Cart;

class Home extends Component
{
    use WithPagination;
    public $amount = 3;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['load-more' => 'load'];
    public function render()
    {
        return view('livewire.frontend.home', [
            'products' => Product::take($this->amount)->get(),
            'categories' => Category::get()->take(12),
            'sliders' => Slider::all(),
            'services' => Service::get()->take(3),
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
