@extends('dashboard.layout.layout')

@section('body')
 <!-- Container-fluid starts-->
 <div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <div class="page-header-left">
                    <h3>Dashboard
                        <small>She Shine Admin panel</small>
                    </h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item">
                        <a href="{{route('admin')}}">
                            <i data-feather="home"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->

<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="row">
        <div class="col-xxl-3 col-md-6 xl-50">
            <div class="card o-hidden widget-cards">
                <div class="warning-box card-body">
                    <div class="media static-top-widget align-items-center">
                        <div class="icons-widgets">
                            <div class="align-self-center text-center">
                                <i data-feather="" class="font-warning"></i>
                            </div>
                        </div>
                        <a href="{{route('dashboard.settings.index')}}">
                            <div class="media-body media-doller">
                                <h3>Settings</h3>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-md-100 xl-50">
            <div class="card o-hidden widget-cards">
                <div class="secondary-box card-body">
                    <div class="media static-top-widget align-items-center">
                        <div class="icons-widgets">
                            <div class="align-self-center text-center">
                                <i data-feather="" class="font-secondary"></i>
                            </div>
                        </div>
                        <a href="{{route('dashboard.products.index')}}">
                            <div class="media-body media-doller">
                                <h3>Products</h3>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-md-6 xl-50">
            <div class="card o-hidden widget-cards">
                <div class="primary-box card-body">
                    <a href="{{route('dashboard.categories.index')}}">
                        <div class="media static-top-widget align-items-center">
                            <div class="icons-widgets">
                                <div class="align-self-center text-center"></div>
                            </div>
                            &nbsp; &nbsp; &nbsp; <h3 style="color: #ff4c3b">Categories</h3>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-md-6 xl-50">
            <div class="card o-hidden widget-cards">
                <div class="danger-box card-body">
                    <div class="media static-top-widget align-items-center">
                        <div class="icons-widgets">
                            <div class="align-self-center text-center"><i data-feather=""
                                    class="font-danger"></i></div>
                        </div>
                        &nbsp; &nbsp; &nbsp;   <h4 style="color: #a5a5a5">Coming soon</h4>
                    </div>
                </div>
            </div>
        </div>










    </div>
</div>
<!-- Container-fluid Ends-->
@endsection
