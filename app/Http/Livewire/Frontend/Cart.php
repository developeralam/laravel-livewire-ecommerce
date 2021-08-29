<?php

namespace App\Http\Livewire\Frontend;

use Carbon\Carbon;
use App\Models\Coupon;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart as Ca;

class Cart extends Component
{
    public $couponcode;
    public $discount;
    public $subtotalAfterDiscount;
    public $totalAfterDiscount;
    public function plus($id)
    {
        $product = Ca::get($id);
        $qty = $product->qty + 1;
        Ca::update($id, $qty);
    }
    public function minus($id)
    {
        $product = Ca::get($id);
        $qty = $product->qty - 1;
        Ca::update($id, $qty);
    }
    public function remove($id)
    {
        Ca::remove($id);
        $msg = "Product Deleted Successfully";
        $this->emit('msg', $msg);
    }
    public function applyCouponCode()
    {
        $coupon = Coupon::where('code', $this->couponcode)->where('expiry_date', Carbon::today())->where('cart_value', '<', Ca::subtotal())->first();
        if (!$coupon) {
            $msg = 'Coupon code is invalid';
            $this->emit('err-msg', $msg);
        } else {
            session()->put('coupon', [
                'code' => $coupon->code,
                'type' => $coupon->type,
                'value' => $coupon->value,
                'cart_value' => $coupon->cart_value
            ]);
        }
    }
    public function calculateDiscount()
    {
        if (session()->has('coupon')) {
            if (session()->get('coupon')['type'] == 'fixed') {
                $this->discount = session()->get('coupon')['value'];
            } else {
                $this->discount = (Ca::subtotal() * session()->get('coupon')['value']) / 100;
            }
            $this->subtotalAfterDiscount = Ca::subtotal() - $this->discount;
            $this->totalAfterDiscount = $this->subtotalAfterDiscount;;
        }
    }
    //Checkout
    public function checkout()
    {
        if (Auth::check()) {
            return redirect()->route('checkout');
        } else {
            return redirect()->route('login');
        }
    }
    //set Checkout Amount
    public function setCheckoutAmount()
    {
        if (session()->has('coupon')) {
            session()->put('checkout', [
                'discount' => $this->discount,
                'subtotal' => $this->subtotalAfterDiscount,
                'total' => $this->totalAfterDiscount,
            ]);
        } else {
            session()->put('checkout', [
                'discount' => 0,
                'subtotal' => Ca::subtotal(),
                'total' => Ca::total(),
            ]);
        }
    }
    public function render()
    {
        if (session()->has('coupon')) {
            if (Ca::subtotal() < session()->get('coupon')['cart_value']) {
                session()->forgot('coupon');
            } else {
                $this->calculateDiscount();
            }
        }
        $this->setCheckoutAmount();
        return view('livewire.frontend.cart')->layout('layouts.guest');
    }
}
