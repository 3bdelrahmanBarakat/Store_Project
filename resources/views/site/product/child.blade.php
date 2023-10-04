@foreach ( $products as $product )


                                        <div class="col-lg-4 col-6 col-grid-box">
                                            <div class="product-box">
                                                <div class="img-wrapper">

                                                        <a href="{{route('product.show',$product->id)}}"><img src="{{asset($product->image)}}"
                                                                class="img-fluid blur-up lazyload bg-img" alt=""></a>



                                                </div>
                                                <div class="product-detail">
                                                    <div>

                                                        <a href="{{route('product.show',$product->id)}}">
                                                            <h6>{{$product->name}}</h6>
                                                        </a>
                                                        <p style="display: block">{{$product->description}}</p>
                                                        <h4>${{$product->price}}</h4>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
