<div class="">
    <section class="slider-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-0">
                    <div class="menu-widget">
                        <p><i class="fa fa-bars"></i>All Categories</p>
                        <ul class="list-unstyled">
                            @foreach ($categories as $category)
                                <li><a href="{{ route('category.details', $category->slug) }}"><img
                                            src="{{ asset('frontend/images/m-cloth.png') }}"
                                            alt="">{{ $category->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9 col-md-12 padding-fix-l20">
                    <div class="owl-carousel owl-slider" wire:ignore>
                        @foreach ($sliders as $slider)
                            <div class="slider-item slider-item1">
                                <img src="{{ asset('images/slider/' . $slider->image) }}" alt=""
                                    class="img1 wow fadeInRight effect" data-wow-duration="1s" data-wow-delay="0s">
                                <div class="slider-box">
                                    <div class="slider-table">
                                        <div class="slider-tablecell">
                                            <div class="wow fadeInUp effect" data-wow-duration="1.2s"
                                                data-wow-delay="0.5s">
                                                <h5>{{ $slider->category }}</h5>
                                            </div>
                                            <div class="wow fadeInUp effect" data-wow-duration="1.2s"
                                                data-wow-delay="0.6s">
                                                <h2>{{ $slider->name }}</h2>
                                            </div>
                                            <div class="wow fadeInUp effect" data-wow-duration="1.2s"
                                                data-wow-delay="0.7s">
                                                <p>{{ $slider->offers }}</p>
                                            </div>
                                            <div class="wow fadeInUp effect" data-wow-duration="1.2s"
                                                data-wow-delay="0.8s">
                                                <a href="#">Shop Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="slider-btm-box d-flex justify-content-around">
                        @foreach ($services as $service)
                            <div class="single-box mr-20">
                                <a href="#"><img src="{{ asset('images/service/' . $service->image) }}"
                                        alt="{{ $service->alt }}" class="img-fluid"></a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="product-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="bt-deal">
                                <div class="sec-title">
                                    <h6>Best Deals</h6>
                                </div>
                                <div class="bt-body owl-carousel">
                                    <div class="bt-items">
                                        <div class="bt-box d-flex">
                                            <div class="bt-img">
                                                <a href="#"><img src="{{ asset('frontend/images/sbar-1.png') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="bt-content">
                                                <p><a href="#">Items Title Here</a></p>
                                                <ul class="list-unstyled list-inline fav">
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                                <ul class="list-unstyled list-inline price">
                                                    <li class="list-inline-item">$120.00</li>
                                                    <li class="list-inline-item">$150.00</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="bt-box d-flex">
                                            <div class="bt-img">
                                                <a href="#"><img src="{{ asset('frontend/images/sbar-2.png') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="bt-content">
                                                <p><a href="#">Items Title Here</a></p>
                                                <ul class="list-unstyled list-inline fav">
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                                <ul class="list-unstyled list-inline price">
                                                    <li class="list-inline-item">$120.00</li>
                                                    <li class="list-inline-item">$150.00</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="bt-box d-flex">
                                            <div class="bt-img">
                                                <a href="#"><img src="{{ asset('frontend/images/sbar-3.png') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="bt-content">
                                                <p><a href="#">Items Title Here</a></p>
                                                <ul class="list-unstyled list-inline fav">
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                                <ul class="list-unstyled list-inline price">
                                                    <li class="list-inline-item">$120.00</li>
                                                    <li class="list-inline-item">$150.00</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="bt-box d-flex">
                                            <div class="bt-img">
                                                <a href="#"><img src="{{ asset('frontend/images/sbar-4.png') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="bt-content">
                                                <p><a href="#">Items Title Here</a></p>
                                                <ul class="list-unstyled list-inline fav">
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                                <ul class="list-unstyled list-inline price">
                                                    <li class="list-inline-item">$120.00</li>
                                                    <li class="list-inline-item">$150.00</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bt-items">
                                        <div class="bt-box d-flex">
                                            <div class="bt-img">
                                                <a href="#"><img src="{{ asset('frontend/images/sbar-2.png') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="bt-content">
                                                <p><a href="#">Items Title Here</a></p>
                                                <ul class="list-unstyled list-inline fav">
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                                <ul class="list-unstyled list-inline price">
                                                    <li class="list-inline-item">$120.00</li>
                                                    <li class="list-inline-item">$150.00</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="bt-box d-flex">
                                            <div class="bt-img">
                                                <a href="#"><img src="{{ asset('frontend/images/sbar-4.png') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="bt-content">
                                                <p><a href="#">Items Title Here</a></p>
                                                <ul class="list-unstyled list-inline fav">
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                                <ul class="list-unstyled list-inline price">
                                                    <li class="list-inline-item">$120.00</li>
                                                    <li class="list-inline-item">$150.00</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="bt-box d-flex">
                                            <div class="bt-img">
                                                <a href="#"><img src="{{ asset('frontend/images/sbar-5.png') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="bt-content">
                                                <p><a href="#">Items Title Here</a></p>
                                                <ul class="list-unstyled list-inline fav">
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                                <ul class="list-unstyled list-inline price">
                                                    <li class="list-inline-item">$120.00</li>
                                                    <li class="list-inline-item">$150.00</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="bt-box d-flex">
                                            <div class="bt-img">
                                                <a href="#"><img src="{{ asset('frontend/images/sbar-1.png') }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="bt-content">
                                                <p><a href="#">Items Title Here</a></p>
                                                <ul class="list-unstyled list-inline fav">
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                    <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                                <ul class="list-unstyled list-inline price">
                                                    <li class="list-inline-item">$120.00</li>
                                                    <li class="list-inline-item">$150.00</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8">
                    <div class="row">
                        <div class="col-md-12 padding-fix-l20">
                            <div class="new-product">
                                <div class="sec-title">
                                    <h5>{{ $cat->name }}</h5>
                                </div>
                                <div class="product">
                                    <div class="row">
                                        @foreach ($products as $product)
                                            <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4 mb-4">
                                                <div class="card">
                                                    <a href="{{ route('product.details', $product->slug) }}">
                                                        <img src="{{ asset('images/product/' . $product->image) }}"
                                                            class="card-img-top" alt="{{ $product->name }}">
                                                        <div class="card-body">
                                                            <h5 class="card-text">{{ $product->name }}</h5>
                                                        </div>
                                                    </a>
                                                    <div class="card-footer">
                                                        <span class="text-danger">${{ $product->sale_price }} <del
                                                                class="text-muted">
                                                                ${{ $product->regular_price }}</del>
                                                        </span>
                                                        <button class="btn btn-sm btn-primary float-right"
                                                            wire:click="store({{ $product->id }}, '{{ $product->name }}', {{ $product->sale_price }})">Add
                                                            To Cart</button>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="ml-3">
                                            <button wire:click="$emit('load-more')">Load More</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
