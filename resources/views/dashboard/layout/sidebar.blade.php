<!-- Page Sidebar Start-->
<div class="page-sidebar">
    <div class="main-header-left d-none d-lg-block">
        <div class="logo-wrapper">
            <a href="{{route('admin')}}">
                <img class="d-none d-lg-block blur-up lazyloaded"
                    src="{{asset('Untitled.jpg')}}" alt="">
            </a>
        </div>
    </div>
    <div class="sidebar custom-scrollbar">
        <a href="javascript:void(0)" class="sidebar-back d-lg-none d-block"><i class="fa fa-times"
                aria-hidden="true"></i></a>

        <ul class="sidebar-menu">
            <li>
                <a class="sidebar-header" href="{{route('admin')}}">
                    <i data-feather="home"></i>
                    <span>لوحة التحكم</span>
                </a>
            </li>

            <li>
                <a class="sidebar-header" href="javascript:void(0)">
                    <i data-feather="box"></i>
                    <span>المنتاجات</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>

                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{route('dashboard.products.index')}}">
                            <i class="fa fa-circle"></i>
                            <span>المنتاجات</span>
                            <i class="fa fa-angle-right pull-right"></i>
                        </a>


                    </li>
                    <li>
                        <a href="{{route('dashboard.products.create')}}">
                            <i class="fa fa-circle"></i>
                            <span>انشاء منتج</span>
                            <i class="fa fa-angle-right pull-right"></i>
                        </a>


                    </li>




                </ul>
            </li>










            <li>
                <a class="sidebar-header" href="javascript:void(0)">
                    <i data-feather="align-left"></i>
                    <span>الأقسام</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{route('dashboard.categories.index')}}">
                            <i class="fa fa-circle"></i>الأقسام
                        </a>
                    </li>

                </ul>
            </li>

            <li>
                <a class="sidebar-header" href="javascript:void(0)">
                    <i data-feather="settings"></i>
                    <span>إعدادات الموقع</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{route('dashboard.settings.index')}}">
                            <i class="fa fa-circle"></i>إعدادات الموقع
                        </a>
                    </li>

                </ul>
            </li>


            <li>
                <a class="sidebar-header" href="{{route('dashboard.logout')}}">
                    <i data-feather="log-in"></i>
                    <span>تسجيل خروج</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- Page Sidebar Ends-->


