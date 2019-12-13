
    <div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div class="sidebar-header">
                <a href="index.html"><img class="main-logo" src="/public/img/logo/logo.png" alt="" /></a>
            </div>
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
                        <li class="{{ request()->is('admin/trangchu') ? 'active' : '' }}">
                            <a class="has-arrow" href="{{route('trangchu')}}">
                                   <i class="fa big-icon fa-home icon-wrap"></i>
                                   <span class="mini-click-non">Trang chủ</span>
                            </a>
                        </li>
                        @if(Auth::guard('admin')->user()->position!=2)
                        <li class="{{ request()->is('admin/danh-muc-san-pham*') ? 'active' : '' }}">
                            <a class="has-arrow " href="{{route('product_type_index')}}" aria-expanded="false"><i class="fa big-icon fa-th-large icon-wrap"></i> <span class="mini-click-non">Danh mục sản phẩm</span></a>
                        </li>
                        <li class="{{ request()->is('admin/san-pham*') ? 'active' : '' }}">
                            <a class="has-arrow " href="{{route('product_index')}}" aria-expanded="false"><i class="fa big-icon fa-flask icon-wrap"></i> <span class="mini-click-non">Sản phẩm</span></a>
                        </li>
                        <li class="{{ request()->is('admin/hoa-don*') ? 'active' : '' }}">
                            <a class="has-arrow" href="{{route('bill_index')}}" aria-expanded="false"><i class="fa big-icon fa-table icon-wrap"></i> <span class="mini-click-non">Hóa Đơn</span></a>
                        </li>
                        <li class="{{ request()->is('admin/tin-tuc*') ? 'active' : '' }}">
                            <a class="has-arrow" href="{{route('new_index')}}" aria-expanded="false"><i class="fa big-icon fa-desktop icon-wrap"></i> <span class="mini-click-non">Tin tức</span></a>
                        </li>
                        <li class="{{ request()->is('admin/khach-hang*') ? 'active' : '' }}">
                            <a class="has-arrow" href="{{route('customer_index')}}" aria-expanded="false"><i class="fa big-icon fa-heart icon-wrap"></i> <span class="mini-click-non">Khách hàng</span></a>
                        </li>
                        @endif
                        @if(Auth::guard('admin')->user()->position==2)
                        <li class="{{ request()->is('admin/thanhvien*') ? 'active' : '' }}">
                            <a class="has-arrow" href="{{route('member_index')}}" aria-expanded="false"><i class="fa big-icon fa-user icon-wrap"></i> <span class="mini-click-non">Quản lý</span></a>
                        </li>
                        <li class="{{ request()->is('admin/thongke') ? 'active' : '' }}{{ request()->is('admin/thongke2') ? 'active' : '' }}{{ request()->is('admin/thongke3') ? 'active' : '' }}"><a data-toggle="collapse" data-target="#Chartsmob" href="#"><i class="fa big-icon fa-bar-chart-o icon-wrap"></i>Thống kê<span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                            <ul id="Chartsmob" class="collapse dropdown-header-top">
                                <li class="haha"><a style="background-color: #f5f5f5 ; color: black;" href="{{route('thongke1')}}">Thống kê doanh thu</a>
                                </li>
                                <li class="haha" ><a style="background-color: #f5f5f5;color: black ;" href="{{route('thongke2')}}">Thống kê sản phẩm</a>
                                </li>
                                <li class="haha"><a style="background-color: #f5f5f5 ;color: black;" href="{{route('thongke3')}}">Thống kế kho</a>
                                </li>
                            </ul>
                        </li>
                        @endif
                            @if(Auth::guard('admin')->user()->position!=2)
                        <li class="{{ request()->is('admin/quan-li-lien-he*') ? 'active' : '' }}">
                            <a class="has-arrow" href="{{route('admin.contact.index')}}" aria-expanded="false"><i class="big-icon glyphicon glyphicon-user icon-wrap"></i> <span class="mini-click-non">Quản lí liên hệ</span></a>
                        </li>
                            @endif
                    </ul>
                </nav>
            </div>
        </nav>
    </div>