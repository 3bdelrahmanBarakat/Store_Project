@extends('site.layout.layout')

@section('body')

<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>Products</h2>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Products</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>


    <!-- section start -->
    <section class="section-b-space ratio_asos">
        <div class="collection-wrapper">
            <div class="container">
                <div class="row">

                    <form action="{{ route('products.filter') }}" method="GET">
                        <select name="category_id" id="category-filter">
                            <option value="">All Categories</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id == $selectedCategoryId ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        <button class="btn-primary" style="background-color: #d2aca9; border: none;" type="submit">Filter</button>
                    </form>

                    <div class="collection-content col">
                        <div class="page-main-content">

                            <div class="collection-product-wrapper">
                                <div class="product-top-filter">
                                    <div class="row">
                                        <div class="col-12">

                                        </div>
                                    </div>
                                </div>
                                <div class="product-wrapper-grid">
                                    <div class="row margin-res" id="product-container">
                                        @include('site.product.child')
                                    </div>
                                </div>


                                {{-- <div id="data-wrapper">
                                    @include('data')
                                </div> --}}
                                {{-- <div class="auto-load text-center" style="display: none;">
                                    <svg version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        x="0px" y="0px" height="60" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
                                        <path fill="#000"
                                            d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">
                                            <animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s"
                                                from="0 50 50" to="360 50 50" repeatCount="indefinite" />
                                        </path>
                                    </svg>
                                </div>
                                <div id="load-more-products" style="display: none;"></div> --}}
                                {{-- {{ $products->links() }} --}}
                                {{-- <h1>{{$products->nextPageUrl()}}</h1> --}}
                                @if ($products->nextPageUrl())
                                <div class="title1 section-t-space">
                                    <button style="background-color: #d2aca9;" class="btn btn-solid hover-solid btn-animation"  id="load-more" data-next-page="{{ $products->nextPageUrl() }}" data-category-id="{{ $selectedCategoryId }}">Show More</button>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section End -->


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
    var nextPageUrl = "{{ $products->nextPageUrl() }}";
    var loading = false;

    $("#load-more").click(function() {
        if (nextPageUrl && !loading) {
            loading = true;
            $("#load-more").text("Loading...");

            var categoryId = $("#load-more").data("category-id"); // Get the category ID from the button

            $.ajax({
                url: nextPageUrl,
                type: "GET",
                data: { category_id: categoryId }, // Send the category ID in the request
                dataType: "json",
                success: function(response) {
                    if (response.view) {
                        $("#product-container").append(response.view);
                    }

                    nextPageUrl = response.nextPageUrl;
                    loading = false;

                    if (!nextPageUrl) {
                        $("#load-more").remove();
                    } else {
                        $("#load-more").text("Show More");
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Error loading more products:", error);
                    loading = false;
                }
            });
        }
    });
});

    </script>
@endsection

