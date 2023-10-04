@extends('dashboard.layout.layout')

@section('body')
<div class="page-body">
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
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
                        <h3>أقسام المنتاجات
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
                        <li class="breadcrumb-item">الأقسام</li>
                        {{-- <li class="breadcrumb-item active">Category</li> --}}
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">


                        <button type="button" class="btn btn-primary mt-md-0 mt-2" data-bs-toggle="modal"
                        data-original-title="test" data-bs-target="#exampleModal">اضافة قسم جديد
                            </button>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive table-desi">
                            <table class="table all-package table-category " id="editableTable">
                                <thead>
                                    <tr>
                                        <th>الاسم</th>
                                        <th>الصورة</th>
                                        <th> القسم الرئيسي</th>
                                        <th>العمليات</th>

                                    </tr>
                                </thead>

                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
</div>


 <!-- Modal -->
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
 aria-hidden="true">
 <div class="modal-dialog" role="document">
    <form action="{{route('dashboard.categories.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
     <div class="modal-content">
         <div class="modal-header">

             <h5 class="modal-title f-w-600" id="exampleModalLabel">اضافة قسم جديد</h5>
             <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"><span
                     aria-hidden="true">×</span></button>
         </div>
         <div class="modal-body">

                 <div class="form">
                     <div class="form-group">
                         <label for="validationCustom01" class="mb-1">الاسم</label>
                         <input class="form-control" name="name" id="validationCustom01" type="text">
                     </div>
                     <div class="form-group">
                         <label for="validationCustom01" class="mb-1">القسم الرئيسي</label>
                         <select name="parent_id" id="" class="form-control">
                            <option value="">قسم رئيسي</option>
                            @foreach ($mainCategories as $category )
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                         </select>
                     </div>
                     <div class="form-group mb-0">
                         <label for="validationCustom02" class="mb-1">الصوره :</label>
                         <input class="form-control dropify" name="image" id="validationCustom02" type="file">
                     </div>
                 </div>

         </div>
         <div class="modal-footer">
             <button class="btn btn-primary" type="submit">Save</button>
             <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
         </div>
     </div>
    </form>
 </div>
</div>

 {{-- delete --}}
 <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
 aria-hidden="true">
 <div class="modal-dialog">
     <form action="{{ Route('dashboard.categories.delete') }}" method="POST">
         <div class="modal-content">

             <div class="modal-body">
                 @csrf
                @method('DELETE')
                 <div class="form-group">
                     <p>{{ __('هل انت متأكد من الحذف؟') }}</p>
                     @csrf
                     <input type="hidden" name="id" id="id">
                 </div>



             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">{{ __('اغلاق') }}</button>
                 <button type="submit" class="btn btn-primary">{{ __('حذف') }} </button>
             </div>
         </div>
     </form>
     <!-- /.modal-content -->
 </div>
 <!-- /.modal-dialog -->
 </div>
 {{-- delete --}}
@endsection
@push('javascripts')
<script type="text/javascript">
    $(function() {
        var table = $('#editableTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ Route('dashboard.categories.getall') }}",
            columns: [

                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'image',
                    name: 'image'
                },
                {
                    data: 'parent',
                    name: 'parent'
                },
                {
                    data: 'action',
                    name: 'action',
                }
            ]
        });

    });

    $('#editableTable tbody').on('click', '#deleteBtn', function(argument) {
        var id = $(this).attr("data-id");
        $('#deletemodal #id').val(id);
    })
</script>
@endpush

