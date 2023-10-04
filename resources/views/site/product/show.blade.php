@extends('site.layout.layout')

@section('body')
        <!-- breadcrumb start -->
        <div class="breadcrumb-section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="page-title">
                            <h2>product</h2>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <nav aria-label="breadcrumb" class="theme-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">product</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb End -->


        <!-- section start -->
        <section>
            <div class="collection-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="product-slick">
    <div><img src="{{ asset($product->image) }}" alt="" class="img-fluid blur-up lazyload image_zoom_cls-0"></div>
    @foreach ($product['images'] as $image)
    <div><img src="{{ asset($image['image']) }}" alt="" class="img-fluid blur-up lazyload image_zoom_cls-0"></div>
    @endforeach
</div>

{{-- <ol class="carousel-indicators">
    <li class="active"></li> <!-- Indicator for the first image (active by default) -->
    @for ($i = 1; $i < count($product['images']); $i++)
    <li></li> <!-- Indicators for the additional images -->
    @endfor
</ol> --}}

                            <div class="row" style="display: none">
                                <div class="col-12 p-0">
                                    <div class="slider-nav">
                                        <div><img src="{{asset($product->image)}}" alt=""
                                            class="img-fluid blur-up lazyload"></div>
                                        @foreach ($product['images'] as $image)
                                        <div><img src="{{asset($image['image'])}}" alt=""
                                                class="img-fluid blur-up lazyload"></div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 rtl-text">
                            <div class="product-right">

                                <h2>{{$product->name}}</h2>

                                                    @if($product->quantity == 0)
                                                    <h3 style="color: red">OUT OF STOCK</h3>
                                                    @elseif($product->discount_price)

                                                          <h3 class="price-detail">{{$product->discount_price}} L.E <del style="color: red">{{$product->price}} L.E</del></h3>

                                                        @else

                                                          <h3 class="price-detail">{{$product->price}} L.E</h3>

                                                        @endif
                                <div class="border-product">
                                    <h6 class="product-title">Available Colors</h6>
                                    <h3>{{$product->color}}</h3>
                                </div>
                                <div class="border-product">
                                    <h6 class="product-title">Available sizes</h6>
                                    <h3>{{$product->size}}</h3>
                                </div>
                                @if ($product->size_chart)
                                <div class="border-product">
                                    <h6 class="product-title">Size Chart</h6>
                                    <div class="modal-body"><img src="{{asset($product->size_chart)}}" alt=""
                                        class="img-fluid blur-up lazyload"></div>
                                </div>
                                @endif

                                {{-- <div id="selectSize" class="addeffect-section product-description border-product">
                                    <h6 class="product-title size-text">Available sizes <span>@if ($product->size_chart)<a href="" data-bs-toggle="modal"
                                        data-bs-target="#sizemodal">size
                                        chart</a> @endif</span></h6>
                                    <div class="modal fade" id="sizemodal" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Size Chart</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <div class="modal-body"><img src="{{asset($product->size_chart)}}" alt=""
                                                        class="img-fluid blur-up lazyload"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="size-box">

                                            <h3>{{$product->size}}</h3>
                                            <div class="modal-body"><img src="{{asset($product->size_chart)}}" alt=""
                                                class="img-fluid blur-up lazyload"></div>


                                    </div>


                                </div> --}}
                                <div class="product-buttons">
                                    <a href="https://ig.me/m/sheshine_o" id="cartEffect"
                                    class="btn btn-solid hover-solid btn-animation"><i class="fa fa-instagram"></i> Buy now via instagram</a>
                                    {{-- <a href="https://ig.me/m/sheshine_o" id="cartEffect"
                                        class="btn btn-solid hover-solid btn-animation"><i class="fa fa-shopping-cart me-1"
                                            aria-hidden="true"></i> Buy now via instagram</a> --}}
                                <br><br><a href="https://ig.me/m/sheshine_o" id="cartEffect"
                                        class="btn btn-solid hover-solid btn-animation"><i class="fa fa-facebook"></i> Buy now via Facebook</a>

                                <div class="border-product">
                                    <h6 class="product-title">shipping info</h6>
                                    <ul class="shipping-info">
                                        <li>100% Original Products</li>
                                        <li>Free Delivery on order above Rs. 799</li>
                                        <li>Pay on delivery is available</li>
                                        <li>Easy 30 days returns and exchanges</li>
                                    </ul>
                                </div>

                                <div class="border-product">
                                    <h6 class="product-title">100% secure payment</h6>
                                    <img src="../assets/images/payment.png" class="img-fluid mt-1" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Section ends -->


        <!-- product-tab starts -->
        <section class="tab-product m-0">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-lg-12">
                        <ul class="nav nav-tabs nav-material" id="top-tab" role="tablist">
                            <li class="nav-item"><a class="nav-link active" id="top-home-tab" data-bs-toggle="tab"
                                    href="#top-home" role="tab" aria-selected="true"><i
                                        class="icofont icofont-ui-home"></i>Details</a>
                                <div class="material-border"></div>
                            </li>



                        </ul>
                        <div class="tab-content nav-material" id="top-tabContent">
                            <div class="tab-pane fade show active" id="top-home" role="tabpanel"
                                aria-labelledby="top-home-tab">
                                <div class="product-tab-discription">
                                    <div class="part">
                                        <p>The Model is wearing a white blouse from our stylist's collection, see the image
                                            for a mock-up of what the actual blouse would look like.it has text written on
                                            it in a black cursive language which looks great on a white color.</p>
                                    </div>
                                    <div class="part">
                                        <h5 class="inner-title">fabric:</h5>
                                        <p>Art silk is manufactured by synthetic fibres like rayon. It's light in weight and
                                            is soft on the skin for comfort in summers.Art silk is manufactured by synthetic
                                            fibres like rayon. It's light in weight and is soft on the skin for comfort in
                                            summers.</p>
                                    </div>
                                    <div class="part">
                                        <h5 class="inner-title">size & fit:</h5>
                                        <p>The model (height 5'8") is wearing a size S</p>
                                    </div>
                                    <div class="part">
                                        <h5 class="inner-title">Material & Care:</h5>
                                        <p>Top fabric: pure cotton</p>
                                        <p>Bottom fabric: pure cotton</p>
                                        <p>Hand-wash</p>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- product-tab ends -->




@endsection
