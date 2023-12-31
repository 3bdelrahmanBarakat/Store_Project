@extends('dashboard.layout.layout')

@section('body')
    <div class="page-body">
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="page-header-left">
                            <h3> المنتجات
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
                            <li class="breadcrumb-item">Digital</li>
                            <li class="breadcrumb-item active">Sub Category</li>
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
                            <form class="form-inline search-form search-box">

                            </form>

                            <a class="btn btn-primary mt-md-0 mt-2" href="{{route('dashboard.products.create')}}">إضافة منتج جديد</a>




                        </div>

                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="table-responsive table-desi">
                                <table class="table all-package table-category " id="editableTable">
                                    <thead>
                                        <tr>
                                            <th>الإسم</th>
                                            <th>الصورة</th>
                                            <th>القسم </th>
                                            <th>السعر الأساسي</th>
                                            <th>التخفيض الأساسي</th>
                                            <th>الالوان</th>
                                            <th>الكمية</th>
                                            <th>تاريخ الاضافه</th>
                                            <th></th>

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
    </div>

     {{-- delete --}}
 <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
 aria-hidden="true">
 <div class="modal-dialog">
     <form action="{{ route('dashboard.products.delete') }}" method="POST">
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
                ajax: "{{ Route('dashboard.products.getall') }}",
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
                        data: 'category',
                        name: 'category'
                    },
                    {
                        data: 'price',
                        name: 'price'
                    },

                    {
                        data: 'discount_price',
                        name: 'discount_price'
                    },
                    {
                        data: 'color',
                        name: 'color'
                    },
                    {
                        data: 'quantity',
                        name: 'quantity'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at',
                        render: function(data) {
                            // Convert the timestamp to a human-readable format
                            return new Date(data).toLocaleDateString();
                        }
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }

                ]
            });

        });

        $('#editableTable tbody').on('click', '#deleteBtn', function(argument) {
            var id = $(this).attr("data-id");
            console.log(id);
            $('#deletemodal #id').val(id);
        })
    </script>
@endpush
