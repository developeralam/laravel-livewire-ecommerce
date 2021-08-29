<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Order;
use Livewire\Component;
use App\Models\Shipping;
use App\Models\OrderItem;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Validator;

class Checkout extends Component
{
    public $state = [];
    public function placeOrder()
    {
        $data = Validator::make($this->state, [
            'name'    => 'required',
            'email'   => 'required',
            'mobile'   => 'required',
            'address' => 'required',
            'country' => 'required',
            'city'    => 'required',
            'village' => 'required',
            'note'    => 'max:500',
            'zipcode' => 'required',
            'method'  => 'required',

        ])->validate();

        $order = Order::create([
            'user_id'  => Auth::user()->id,
            'discount' => Session()->get('checkout')['discount'],
            'subtotal' => Session()->get('checkout')['subtotal'],
            'tax'      => 0,
            'total'    => Session()->get('checkout')['total'],
            'name'     => $data['name'],
            'email'    => $data['email'],
            'mobile'   => $data['mobile'],
            'address'  => $data['address'],
            'country'  => $data['country'],
            'city'     => $data['city'],
            'village'  => $data['village'],
            'note'     => $data['note'],
            'zipcode'  => $data['zipcode'],
            'status'   => 'ordered',
        ]);
        foreach (Cart::content() as $item) {
            OrderItem::create([
                'product_id' => $item->id,
                'order_id'   => $order->id,
                'price'      => $item->price,
                'quantity'   => $item->qty,
            ]);
        }
        Shipping::create([
            'order_id' => $order->id,
            'name'     => $data['name'],
            'email'    => $data['email'],
            'mobile'   => $data['mobile'],
            'address'  => $data['address'],
            'country'  => $data['country'],
            'district' => $data['city'],
            'village'  => $data['village'],
            'zipcode'  => $data['zipcode'],
        ]);
        if ($data['method'] == 'cod') {
            Transaction::create([
                'user_id'  => Auth::user()->id,
                'order_id' => $order->id,
                'mode'     => 'cod',
                'status'   => 'pending',
            ]);
        };
        if ($this->state['method'] == 'card') {
            $data = Validator::make($this->state, [
                'card_no' => 'required',
                'expiry_month' => 'required',
                'expiry_year' => 'required',
                'csv' => 'required',
            ])->validate();
            
        }
        $msg = "Checkout Compleate";
        $this->emit('msg', $msg);
    }
    public function render()
    {
        return view('livewire.frontend.checkout')->layout('layouts.guest');
    }
}
