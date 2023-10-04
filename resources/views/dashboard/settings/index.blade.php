@extends('dashboard.layout.layout')

@section('body')


<div class="page-body">
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>اعدادات الموقع
                            {{-- <small>Multikart Admin panel</small> --}}
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item">
                            <a href="index.html">
                                <i data-feather="home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item">اعدادات الموقع </li>
                        {{-- <li class="breadcrumb-item active">Create User </li> --}}
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

    <!-- Container-fluid starts-->

        <div class="container-fluid" style="width: 50%">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
                                <li class="nav-item"><a class="nav-link active show" id="account-tab"
                                        data-bs-toggle="tab" href="#account" role="tab" aria-controls="account"
                                        aria-selected="true" data-original-title="" title="">الاعدادات</a></li>

                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade active show" id="account" role="tabpanel"
                                    aria-labelledby="account-tab">
                                    <form action="{{route('dashboard.settings.update', $setting->id)}}" method="post" enctype="multipart/form-data" class="needs-validation user-add" novalidate="">
                                        @csrf
                                        @method('put')

                                        @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                        <h4>الاعدادات</h4>
                                        <div class="form-group row">
                                            <label for="validationCustom0"
                                                class="col-xl-3 col-md-4"><span>*</span> لوجو الموقع </label>
                                            <div class="col-xl-8 col-md-7">
                                                <input class="form-control dropify" name="logo" data-default-file="{{asset($setting->logo)}}" id="validationCustom0" type="file">

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="validationCustom1"
                                                class="col-xl-3 col-md-4"><span>*</span> الصورة المصغرة</label>
                                            <div class="col-xl-8 col-md-7">
                                                <input class="form-control dropify" name="favicon" data-default-file="{{asset($setting->favicon)}}" id="validationCustom1" type="file"
                                                    >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="validationCustom2"
                                                class="col-xl-3 col-md-4"><span>*</span> اسم الموقع</label>
                                            <div class="col-xl-8 col-md-7">
                                                <input class="form-control" name="name" id="validationCustom2" value="{{$setting->name}}" type="text"
                                                    >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="validationCustom3"
                                                class="col-xl-3 col-md-4"><span>*</span> وصف الموقع</label>
                                            <div class="col-xl-8 col-md-7">
                                                <textarea name="description" id="" cols="24"  rows="5">{{$setting->description}}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="validationCustom4"
                                                class="col-xl-3 col-md-4"><span>*</span> البريد الالكتروني</label>
                                            <div class="col-xl-8 col-md-7">
                                                <input class="form-control" name="email" value="{{$setting->email}}" id="validationCustom4"
                                                    type="text" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="validationCustom4"
                                                class="col-xl-3 col-md-4"><span>*</span> رقم الهاتف </label>
                                            <div class="col-xl-8 col-md-7">
                                                <input class="form-control" name="phone" value="{{$setting->phone}}" id="validationCustom4"
                                                    type="text" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="validationCustom4"
                                                class="col-xl-3 col-md-4"><span>*</span> العنوان </label>
                                            <div class="col-xl-8 col-md-7">
                                                <input class="form-control" name="address" value="{{$setting->address}}" id="validationCustom4"
                                                    type="text">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="validationCustom4"
                                                class="col-xl-3 col-md-4"><span>*</span> رابط الفيسبوك </label>
                                            <div class="col-xl-8 col-md-7">
                                                <input class="form-control" name="facebook" value="{{$setting->facebook}}" id="validationCustom4"
                                                    type="text" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="validationCustom4"
                                                class="col-xl-3 col-md-4"><span>*</span> رابط تويتر </label>
                                            <div class="col-xl-8 col-md-7">
                                                <input class="form-control" name="twitter" value="{{$setting->twitter}}" id="validationCustom4"
                                                    type="text" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="validationCustom4"
                                                class="col-xl-3 col-md-4"><span>*</span> رابط يوتيوب </label>
                                            <div class="col-xl-8 col-md-7">
                                                <input class="form-control" name="youtube" value="{{$setting->youtube}}" id="validationCustom4"
                                                    type="text" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="validationCustom4"
                                                class="col-xl-3 col-md-4"><span>*</span> رابط تيك توك </label>
                                            <div class="col-xl-8 col-md-7">
                                                <input class="form-control" name="tiktok" value="{{$setting->tiktok}}" id="validationCustom4"
                                                    type="text" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="validationCustom4"
                                                class="col-xl-3 col-md-4"><span>*</span> رابط انستجرام </label>
                                            <div class="col-xl-8 col-md-7">
                                                <input class="form-control" name="instagram" value="{{$setting->instagram}}" id="validationCustom4"
                                                    type="text" >
                                            </div>
                                        </div>

                                        <div class="pull-right">
                                            <button type="submit" class="btn btn-primary">حفظ</button>
                                        </div>
                                    </form>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    <!-- Container-fluid Ends-->
</div>



    </div>
</div>
@endsection
