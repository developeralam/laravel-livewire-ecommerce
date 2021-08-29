<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Product;
use Livewire\Component;

class ProductDetails extends Component
{
    public $slug;
    public function mount($slug)
    {
        $this->slug = $slug;
    }
    public function render()
    {
        $cat_id = Product::where('slug', $this->slug)->pluck('cat_id')->first();
        return view('livewire.frontend.product-details', [
            'product' => Product::where('slug', $this->slug)->first(),
            'relateds' => Product::where('cat_id', $cat_id)->limit(6)->get(),
        ])->layout('layouts.guest');
    }
}
