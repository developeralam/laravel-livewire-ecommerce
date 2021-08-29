<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use App\Models\SiteSetting;
use App\Models\Coupon as Cupon;
use Illuminate\Support\Facades\Validator;

class Coupon extends Component
{
    public $state;
    public $editModalShow = false;
    public $coupon;
    //Store Modal Show 
    public function addCoupon()
    {
        $this->state = [];
        $this->editModalShow = false;
        $id = 'coupon';
        $this->emit('show-form', $id);
    }
    //Store Coupon 
    public function storeCoupon()
    {
        $data = Validator::make($this->state, [
            'code'       => 'required|string',
            'type'       => 'string',
            'value'      => 'required',
            'cart_value' => 'required',
            'expiry_date' => 'required'
        ])->validate();
        Cupon::create($data);
        $id = 'coupon';
        $msg = 'Coupon Inserted Successfully';
        $this->emit('close-form', $id);
        $this->emit('msg', $msg);
    }
    //Edit Modal Show 
    public function editCoupon(Cupon $coupon)
    {
        $this->coupon = $coupon;
        $this->editModalShow = true;
        $this->state = $coupon->toArray();
        $id = 'coupon';
        $this->emit('show-form', $id);
    }
    //Update Coupon
    public function updateCoupon()
    {
        $data = Validator::make($this->state, [
            'code'       => 'required|string',
            'type'       => 'string',
            'value'      => 'required',
            'cart_value' => 'required',
            'expiry_date' => 'required'
        ])->validate();
        $this->coupon->update($data);
        $id = 'coupon';
        $msg = 'Coupon Updated Successfully';
        $this->emit('close-form', $id);
        $this->emit('msg', $msg);
    }
    //Delete Modal Show
    public function confirmCouponRemoval(Cupon $coupon)
    {
        $this->coupon = $coupon;
        $id = 'deleteModal';
        $this->emit('show-form', $id);
    }
    //Delete Coupon
    public function deleteCoupon()
    {
        $this->coupon->delete();
        $id = 'deleteModal';
        $msg = "Coupon Deleted Successfully";
        $this->emit('close-form', $id);
        $this->emit('msg', $msg);
    }
    public function render()
    {
        return view('livewire.backend.coupon', ['coupons' => Cupon::paginate(10),])->layout('layouts.admin', ['config' => SiteSetting::first()]);
    }
}
