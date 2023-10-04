@extends('dashboard.layout.layout')

@section('body')
<div class="page-body">
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>تعديل القسم
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
                        <li class="breadcrumb-item">تعديل القسم</li>
                        {{-- <li class="breadcrumb-item active">Create Page</li> --}}
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <form class="needs-validation" action="{{route('dashboard.categories.update',$category->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
        <div class="card tab2-card">
            <div class="card-body">

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            <br>
                        @endforeach
                    </ul>
                </div>
            @endif

                @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session()->get('success') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active show" id="general" role="tabpanel"
                        aria-labelledby="general-tab">


                            <div class="form-group">
                                <label for="validationCustom01" class="mb-1">الاسم</label>
                                <input class="form-control" name="name" value="{{$category->name}}" id="validationCustom01" type="text">
                            </div>
                            @if ($category->child_count < 1)


                            <div class="form-group">
                                <label for="validationCustom01" class="mb-1">القسم الرئيسي</label>
                                <select name="parent_id" id="" class="form-control">
                                   <option value="" @if($category->parent_id == null) selected @endif>قسم رئيسي</option>
                                   @foreach ($mainCategories as $item )
                                   @if ($item->id != $category->id)

                                   <option value="{{$item->id}}" @if($item->id == $category->parent_id) selected @endif>{{$item->name}}</option>
                                   @endif
                            @endforeach
                                </select>
                            </div>
                            @endif
                            <div class="form-group mb-0">
                                <label for="validationCustom02" class="mb-1">الصوره :</label>
                                <input class="form-control dropify" data-default-file="{{asset($category->image)}}" name="image"  type="file">
                            </div>

                    </div>

                </div>
                <br>
                <div class="pull-right">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
        </div>
    </div>
    <!-- Container-fluid Ends-->
</div>
@endsection
