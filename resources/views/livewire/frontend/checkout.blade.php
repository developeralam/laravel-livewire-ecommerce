<div>
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-box text-center">
                        <ul class="list-unstyled list-inline">
                            <li class="list-inline-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="list-inline-item"><span>||</span> Checkout
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Breadcrumb Area -->

    <!-- Checkout -->
    <section class="checkout">
        <div class="container">
            <form wire:submit.prevent="placeOrder">
                <div class="row">
                    <div class="col-md-7">
                        <h5>Shipping Information</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Name*</label>
                                <input type="text" wire:model="state.name" class="@error('name') is-invalid @enderror"
                                    name="name" value="" placeholder="Your first name">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label>Email Address*</label>
                                <input type="text" wire:model="state.email"
                                    class="form-control @error('email') is-invalid @enderror" name="name" value=""
                                    placeholder="Your email address">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label>Phone*</label>
                                <input type="text" wire:model="state.mobile"
                                    class="@error('mobile') is-invalid @enderror" value=""
                                    placeholder="Your phone number">
                                @error('mobile')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label>Address*</label>
                                <textarea class="form-control" row="5" wire:model="state.address"
                                    class="@error('address') is-invalid @enderror"></textarea>
                                @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 contry">
                                <label>Country*</label>
                                <input type="text" wire:model="state.country"
                                    class="@error('address') is-invalid @enderror">
                                @error('country')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label>Town/City*</label>
                                <input type="text" wire:model="state.city" placeholder="Your town or city name"
                                    class="@error('city') is-invalid @enderror">
                                @error('city')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label>Village*</label>
                                <input type="text" wire:model="state.village"
                                    class="@error('village') is-invalid @enderror">
                                @error('village')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label>Postal/Zip Code*</label>
                                <input type="text" wire:model="state.zipcode"
                                    class="@error('zipcode') is-invalid @enderror">
                                @error('zipcode')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label>Order Note</label>
                                <textarea name="note" wire:model="state.note"
                                    class="@error('zipcode') is-invalid @enderror"
                                    placeholder="Note for your order (optional). Example- special notes for delivery"></textarea>
                                @error('note')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="order-review">
                                    <h5>Order Review</h5>
                                    <div class="review-box">
                                        <ul class="list-unstyled">
                                            <li>Product <span>Total</span></li>
                                            @foreach (Cart::content() as $cart)
                                                <li class="d-flex justify-content-between">
                                                    <div class="pro">
                                                        <img src="images/sbar-1.png" alt="">
                                                        <p>{{ $cart->model->name }}</p>
                                                        <span>{{ $cart->qty }}</span> X
                                                        ${{ $cart->model->sale_price }}</span>
                                                    </div>
                                                    <div class="prc">
                                                        <p>${{ $cart->subtotal }}</p>
                                                    </div>
                                                </li>
                                            @endforeach
                                            <li>Sub Total <span>${{ Cart::subtotal() }}</span></li>
                                            <li>Shipping & Tax <span>${{ Cart::tax() }}</span></li>
                                            <li>Grand Total <span>${{ Cart::total() }}</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="pay-meth">
                                    <h5>Payment Method</h5>
                                    <div class="pay-box">
                                        <ul class="list-unstyled">
                                            <li>
                                                <input type="radio" id="pay1" name="payment" value="cod"
                                                    wire:model="state.method" checked>
                                                <label for="pay1"><span><i class="fa fa-circle"></i></span>Cash On
                                                    Delivery</label>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque sint
                                                    placeat illo animi quis minus accusantium ad doloribus, odit
                                                    explicabo
                                                    asperiores quidem.</p>
                                            </li>
                                            <li>
                                                <input type="radio" wire:model="state.method" value="card" id="pay2"
                                                    name="payment" value="pay2">
                                                <label for="pay2"><span><i class="fa fa-circle"></i></span>Debit/Credit
                                                    Card</label>
                                            </li>
                                            <li>
                                                <input type="radio" id="pay4" name="payment" value="pay4">
                                                <label for="pay4"><span><i
                                                            class="fa fa-circle"></i></span>Paypal</label>
                                            </li>
                                        </ul>
                                        @if ($state['method'] == 'card')
                                            <div class="card-form">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <label for="card_no">Card No</label>
                                                        <input type="text" wire:model="state.card_no">
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="card_no">Expiry Month</label>
                                                        <input type="text" wire:model="state.expiry_month">
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="card_no">Expiry Year</label>
                                                        <input type="text" wire:model="state.expiry_year">
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="card_no">Csv</label>
                                                        <input type="text" wire:model="state.csv">
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <button type="submit" name="button" class="ord-btn">Place Order</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>
