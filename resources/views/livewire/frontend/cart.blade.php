<div>
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-box text-center">
                        <ul class="list-unstyled list-inline">
                            <li class="list-inline-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="list-inline-item"><span>||</span> Shopping Cart</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Breadcrumb Area -->

    <!-- Shopping Cart -->
    <section class="shopping-cart">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="cart-table table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="t-pro">Product</th>
                                    <th class="t-price">Price</th>
                                    <th class="t-qty">Quantity</th>
                                    <th class="t-total">Total</th>
                                    <th class="t-rem"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (Cart::content() as $cart)
                                    <tr>
                                        <td class="t-pro d-flex">
                                            <div class="t-img">
                                                <a href="{{ route('product.details', $cart->model->slug) }}"><img
                                                        src="{{ asset('images/product/' . $cart->model->image) }}"
                                                        alt="{{ $cart->model->name }}" width="100px"
                                                        height="100px"></a>
                                            </div>
                                            <div class="t-content">
                                                <p class="t-heading"><a href="#">{{ $cart->model->name }}</a></p>
                                                <ul class="list-unstyled list-inline rate">
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                                <ul class="list-unstyled col-sz">
                                                    <li>
                                                        <p>Color : <span>Red</span></p>
                                                    </li>
                                                    <li>
                                                        <p>Size : <span>M</span></p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td class="t-price">${{ $cart->model->sale_price }}</td>
                                        <td class="t-qty">
                                            <div class="qty-box">
                                                <div class="quantity buttons_added">
                                                    <input type="button" value="-" class="minus"
                                                        wire:click.prevent="minus('{{ $cart->rowId }}')">
                                                    <input type="number" step="1" min="1" max="10"
                                                        value="{{ $cart->qty }}" class="qty text" size="4" readonly>
                                                    <input type="button" value="+" class="plus"
                                                        wire:click.prevent="plus('{{ $cart->rowId }}')">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="t-total">${{ $cart->subtotal() }}</td>
                                        <td class="t-rem"><a href="#"
                                                wire:click.prevent="remove('{{ $cart->rowId }}')"><i
                                                    class="fa fa-trash-o"></i></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="shipping">
                        <h6>Calculate Shipping and Tax</h6>
                        <p>Enter your destination to get shipping estimate</p>
                        <form action="#">
                            <div class="country-box">
                                <select class="country">
                                    <option>Select Country</option>
                                    <option>United State</option>
                                    <option>United Kingdom</option>
                                    <option>Germany</option>
                                    <option>Australia</option>
                                </select>
                            </div>
                            <div class="state-box">
                                <select class="state">
                                    <option>State/Province</option>
                                    <option>State 1</option>
                                    <option>State 2</option>
                                    <option>State 3</option>
                                    <option>State 4</option>
                                </select>
                            </div>
                            <div class="post-box">
                                <input type="text" name="zip" value="" placeholder="Zip/Postal Code">
                                <button type="button">Get Estimate</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="coupon">
                        <h6>Discount Coupon</h6>
                        <p>Enter your coupon code if you have one</p>
                        <form action="#" wire:submit.prevent="applyCouponCode">
                            <input type="text" wire:model="couponcode" value="" placeholder="Your Coupon">
                            <button type="submit">Apply Code</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="crt-sumry">
                        <h5>Cart Summery</h5>
                        <ul class="list-unstyled">
                            <li>Subtotal <span>${{ Cart::subtotal() }}</span></li>
                            @if (Session::has('coupon'))
                                <li>Discount ({{ Session::get('coupon')['code'] }})
                                    <span>${{ $discount }}</span>
                                </li>
                                <li>Subtotal with Discount<span>${{ $subtotalAfterDiscount }}</span></li>
                            @else
                                <li>Shipping & Tax <span>$</span></li>
                                <li>Grand Total <span>${{ Cart::total() }}</span></li>
                            @endif
                        </ul>
                        <div class="cart-btns text-right">
                            <button type="button" class="up-cart">Update Cart</button>
                            <button type="button" class="chq-out" wire:click="checkout">Checkout</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Shopping Cart -->
</div>
