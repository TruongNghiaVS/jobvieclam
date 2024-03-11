@push('styles')
<style type="text/css">
    /* Option 2: Import via CSS */
    @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css");

    .wrapper {
        display: flex;
        width: 100%;
        align-items: stretch;
        position: relative;
        top: 76px;
        left: 0;
    }

    #mobile-sidebar {
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        -webkit-box-pack: justify;
        -ms-flex-pack: justify;
        display: -webkit-box;
        display: -ms-flexbox;
        min-width: 0px;
        max-width: 0px;
        background: white;
        color: #bcc0c8;
        transition: all 0.3s;
        overflow: hidden;
        max-height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
        position: fixed;
        top: 76px;
        left: 0;
        bottom: 0;
        z-index: 1;
        overflow-x: hidden;
        overflow-y: auto;
        z-index: 30;
        border: 1px solid #cccc;
    }

    /* PROFILE CSS */
    .profile {
        position: relative;
        padding: 20px 10px;
        border-bottom: 1px solid #ccc;
    }

    .profile .avatar {
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 80px;
        height: 80px;
        margin: 0 auto;
        overflow: hidden;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.3);
    }

    .profile .avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .profile .username {
        margin-top: 15px;
        font-size: 16px;
        text-align: center;
        text-transform: uppercase;
    }

    .profile .username p a {
        color: var(--text-main);
        font-size: 16px;
        text-align: center;
        text-transform: uppercase;
        font-weight: 600;
    }


    .sidebar-btn {
        position: absolute;
        top: 50%;
        left: 20px;
    }

    #mobile-sidebar.active {
        min-width: 300px;
        max-width: 300px;
        overflow-x: hidden;
        overflow-y: auto;
        display: flex;
        flex-direction: column;
        z-index: 30;
        max-height: calc(100% - 76px);
    }

    #mobile-sidebar.active .sidebar-btn {
        justify-content: end;
    }

    #mobile-sidebar .side-bar-content {
        display: none;
    }

    #mobile-sidebar.active .side-bar-content {
        display: block;
        color: var(--text-main);
    }

    #mobile-sidebar.active ul.components {
        width: 100%;
    }

    #mobile-sidebar.active .sidebar-header {
        display: flex;
        flex-direction: column;
    }

    #mobile-sidebar .sidebar-header {
        padding: 20px;
        background: white;
        width: 100%;
        display: none;
    }



    #mobile-sidebar ul p {
        color: #063146;
        padding: 10px;
    }

    #mobile-sidebar ul li a {
        padding: 20px 20px;
        font-size: 1.1em;
        display: block;
    }
    #mobile-sidebar ul .sidebar-item >a {
        background-color: white;
    }


    #mobile-sidebar ul li a:hover {
        color: #7386D5;
        background: #981b1e;
    }

    #mobile-sidebar ul li a:hover i,#mobile-sidebar ul li a:hover .side-bar-content  {
        color: white;
    }



    #mobile-sidebar ul li a i {
        font-size: 20px;
        color: var(--text-main);
        width: 24px;
        display: flex;
        justify-content: center;
        align-items: center;
    }



    #mobile-sidebar ul li .dropdown-toggle::after {
        color: #b2bcc6;
        display: none;
    }

    #mobile-sidebar.active ul li .dropdown-toggle::after {
        color: #b2bcc6;
        display: block;
        right: 20px;
    }

    #mobile-sidebar .sidebar-item.active>a {
        background-color: #981b1e;
        color: white;
    }
    
    #mobile-sidebar .sidebar-item.active>a i,
    #mobile-sidebar .sidebar-item.active>a span{
        background-color: #981b1e;
        color: white ;
    }

    #mobile-sidebar ul li.active a span {
        color: white ;
    }

    
    a[data-toggle="collapse"] {
        position: relative;
    }

    .dropdown-toggle::after {
        display: block;
        position: absolute;
        top: 50%;
        right: -10px;
        transform: translateY(-50%);
    }

    #mobile-sidebar.active .dropdown-toggle::after {
        display: none;
    }



    #mobile-sidebar ul ul a {
        font-size: 0.9em !important;
 

    }

    .sidebar-bottom ul ul a {
        background-color: unset !important;
    }

    ul.CTAs {
        padding: 20px;
    }

    ul.CTAs a {
        text-align: center;
        font-size: 0.9em !important;
        display: block;
        border-radius: 5px;
        margin-bottom: 5px;
    }

    .list-group-item.active {
        border: unset;
    }

    .list-group-item {
        border: unset;
    }

  
    .sidebar-main-nav li,.sidebar-user-nav li {
        border-bottom: .5px solid #cdc9c9;
    }
    
    a.download {
        background: #bcc0c8;
        color: #7386D5;
    }

    a.article,
    a.article:hover {
        background: #6d7fcc !important;
        color: #bcc0c8 !important;
    }

    #mobile-sidebar.active ul li a span {
        color: var(--text-main);
    }


    #mobile-sidebarCollapse span i {
        color: #bcc0c8;
    }

    #mobile-sidebar ul li a span {
        color: #bcc0c8;
        font-size: 18px;
        font-weight: 600;
    }
    #mobile-sidebar ul li a h1{
        color: #bcc0c8;
        font-size: 18px;
        font-weight: 600;
    }

    #mobile-sidebar ul ul a {
     
    }

    #mobile-sidebar ul li.active a span {
        color: white;
    }

    ul#pageSubmenu li {
       
    }

    ul#pageSubmenu li a span {
        font-size: 16px !important;
    }

    #mobile-sidebar .menu {
        position: relative;
        width: 100%;
        height: 100%;
        overflow-x: hidden;
        overflow-y: auto;
    }

    .sidebar-main-nav {

        transform: translateX(0);
        opacity: 1;
        pointer-events: auto;
        transition: 0.4s ease-in-out all;
    }

    .sidebar-user-nav {
        -webkit-transform: translateX(-300px);
        -ms-transform: translateX(-300px);
        transform: translateX(-300px);
        transition: 0.4s ease-out all;
    }

    .sidebar-main-nav,
    .sidebar-user-nav {
        position: absolute;
        top: 0px;
        left: 0px;
        height: 100%;
        overflow-y: auto;
    }

    .sidebar-main-nav.active {

        -webkit-transform: translateX(-300px);
        -ms-transform: translateX(-300px);
        transform: translateX(-300px);
    }

    .sidebar-user-nav.active {
        transform: translateX(0);
        opacity: 1;
        pointer-events: auto;
    }

    .sidebar-bottom {
        display: none;
    }

    #mobile-sidebar.active .sidebar-bottom {
        display: flex;
        width: 100%;
        position: absolute;
        bottom: 20px;
        justify-content: end;
        align-items: center;
        left: 0;
        right: 0;
    }

    .profile .back-menu-normal {
        position: absolute;
        top: 0;
        left: 0px;
        transition: 0.4s ease-in-out all;
        display: none;
    }

    .profile .back-menu-normal.active {
        display: block;
    }

    .profile .back-menu-normal i {
        font-size: 25px;
        color: var(--text-main);
        font-weight: 800;
    }

    .sidebar-bottom {
        padding: 20px
    }

    .sidebar-bottom ul li span {
        color: white;
        font-size: 18px;
        font-weight: 600;

    }

    a#navbarDropdownMenuLink {
        padding: 0 !important;
    }
    .sub_list li{
        margin-left: 40px;
    }

    #blog_sub_list li.active  ,ul#pageSubmenu li.active , ul#pageSubmenu li.active>a{
        background:var(--bs-primary);
        color:white;
    
    }
    #blog_sub_list li.active .side-bar-content ,ul#pageSubmenu li.active .side-bar-content ,ul#pageSubmenu li.active i {
        color:white;
    }
</style>

@endpush
<nav id="mobile-sidebar">
    <div class="sidebar-header">
        @if(auth::check()==true)
        <div class="profile" bis_skin_checked="1">
            <div class="avatar" bis_skin_checked="1"><a href="#">
                    {{auth()->user()->printUserImage()}}
                </a>
            </div>
            <div class="username" bis_skin_checked="1">
                <p><a href="#">{{auth()->user()->name}}</a></p>
            </div>
            <div class="back-menu-normal" bis_skin_checked="1"><i class="bi bi-arrow-left"></i></div>
        </div>
        @else 
        <div class="profile" bis_skin_checked="1">
            <div class="avatar" bis_skin_checked="1"><a href="#">
            
                <img src="/admin_assets/no-user.jpg" alt="Chưa đăng nhập">
                </a>
            </div>
            <div class="username" bis_skin_checked="1">
                <p><a href="javascript:void(0)">Welcome to Jobvieclam</a></p>
            </div>
            <div class="back-menu-normal" bis_skin_checked="1"><i class="bi bi-arrow-left"></i></div>
        </div>

        @endif
        <div class="menu">
            <ul class="list-unstyled components sidebar-main-nav" id="sidebar-main-nav">
                <li class="sidebar-item {{ Request::url() == route('index') ? 'active' : '' }}">
                    <a href="{{url('/')}}" class="list-group-item list-group-item-action {{ Request::url() == route('index') ? 'active' : '' }}">
                        <div class="d-flex w-100">
                            <i class="fa-solid fa-house fs-24px me-2"></i> 
                            <span class="side-bar-content"> {{__('Home')}}</span>
                        </div>
                    </a>
                </li>
                <li class="sidebar-item {{ Request::url() == route('job.list') || strpos(Request::url(),'/viec-lam/') > 0 ? 'active' : '' }}">
                    <a href="{{ route('job.list') }}" class="list-group-item list-group-item-action {{ Request::url() == route('job.list') || strpos(Request::url(),'/job/') > 0 ? 'active' : '' }}">

                        <div class="d-flex w-100">
                            <i class="fa-solid fa-table-list fs-24px me-2"></i>
                            <span class="side-bar-content"> {{__('Jobs')}}</span>
                        </div>
                    </a>
                </li>

                @if(Auth::user())

                <li>
                    <!-- <a href="#cv_sub_list" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <div class="d-flex w-100">
                            <i class="bi bi-file-person fs-24px me-2"></i>
                            <span class="side-bar-content"> {{__('Profiles and CVs')}}</span>
                        </div>
                    </a> -->
                    <ul class="collapse list-unstyled sub_list" data-ref="findJob" data-target="false" id="cv_sub_list">
                        @php
                        $pointer = Auth::check()==true ? '' : 'style=pointer-events:none;';
                        @endphp
                        <li>
                            <a class="{{ Request::url() == route('my.job.applications') ? 'active' : '' }}" href="{{route('change.template')}}" {{$pointer}}>
                                <div class="d-flex w-100">

                                    <span class="side-bar-content"> {{__('CV Templates')}}</span>
                                </div>
                            </a>
                        </li>
                        @php
                        $pointer = Auth::check()==true ? '' : 'style=pointer-events:none;';
                        @endphp
                        <li>
                            <a class="sub-item" href="{{route('application.manager')}}" {{$pointer}}>
                                <div class="d-flex w-100">

                                    <span class="side-bar-content"> {{__('CV Management')}}</span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="sub-item" href="{{route('cover-letter')}}" {{$pointer}}>
                                <div class="d-flex w-100">

                                    <span class="side-bar-content"> {{__('Cover Letter')}}</span>
                                </div>
                            </a>
                        </li>

                    </ul>
                </li>

                @endif

                <li class="sidebar-item {{ Request::url() == route('company.listing') || strpos(Request::url(),'/cong-ty/') > 0 ? 'active' : '' }}">
                    <a href="{{route('company.listing')}}">
                        <div class="d-flex w-100">                         
                            <i class="fas fa-hotel fs-24px me-2"></i>
                            <span class="side-bar-content">{{__('Company')}}</span>
                        </div>
                    </a>

                </li>


                <li class="has-child">
                    <a href="#blog_sub_list" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <div class="d-flex w-100">
                            <i class="fa-regular fa-newspaper fs-24px me-2"></i>
                            <span class="side-bar-content">{{__('Blog')}}</span>
                        </div>
                    </a>
                    @php($categories = \App\Blog_category::get())

                    <ul class="collapse list-unstyled sub_list {{ strpos(Request::url(),'/tin-tuc/') > 0 ? 'show' : '' }}" data-ref="findJob_blog" data-target="false" id="blog_sub_list">
                        @foreach($categories as $category)
                         
                        <li class="{{ basename(Request::url()) == $category->slug ? 'active' : '' }}">
                            <a class="sub-item" href="{{ url('/blog/category/') . "/" . $category->slug }}">

                                <div class="d-flex w-100">

                                    <h1 class="side-bar-content">{{$category->heading}}</h1>
                                </div>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </li>

                <li class="sidebar-item {{ Request::url() == route('contact.us') ? 'active' : '' }}">
                    <a href="{{ route('contact.us') }} " class="list-group-item list-group-item-action {{ Request::url() == route('contact.us') ? 'active' : '' }}">
                        <div class="d-flex w-100">
                            <i class="fas fa-phone-alt fs-24px me-2"></i>
                            <span class="side-bar-content"> {{__('Contact')}}</span>
                        </div>
                    </a>
                </li>


            </ul>
            <!-- user nav -->

            @if(Auth::user())
            <ul class="list-unstyled components sidebar-user-nav" id="sidebar-user-nav">
                <li class="sidebar-item {{ Request::url() == route('home') ? 'active' : '' }}">
                    <a href="{{ route('home') }}" class="list-group-item list-group-item-action {{ Request::url() == route('home') ? 'active' : '' }}">
                        <div class="d-flex w-100">
                            <i class="fa-solid fa-gauge fs-24px me-2"></i>
                            <span class="side-bar-content"><!-- {{__('Dashboard')}} -->
                                    Dashboard
                            </span>
                        </div>
                    </a>
                </li>

                <li class="sidebar-item {{ Request::url() == route('my.profile') ? 'active' : '' }}">
                    <a href="{{ route('my.profile') }}" class="list-group-item list-group-item-action {{ Request::url() == route('my.profile') ? 'active' : '' }}">
                        <div class="d-flex w-100">
                            <i class="fa-regular fa-pen-to-square fs-24px me-2"></i>
                            <span class="side-bar-content"> {{__('Edit Profile')}}</span>

                        </div>
                    </a>
                </li>

                <!-- <li class="sidebar-item {{ Request::url() == route('change.template') ? 'active' : '' }}">
                    <a href="{{ route('change.template') }}" class="list-group-item list-group-item-action {{ Request::url() == route('change.template') ? 'active' : '' }}">
                        <div class="d-flex w-100">
                        <i class="fa-regular fa-file fs fa-regular fs-24px me-2"></i>
                            <span class="side-bar-content"> {{__('Change Template')}}</span>
                        </div>
                    </a>
                </li> -->

                <li class="">
                    <a href="#" class="list-group-item list-group-item-action {{ route('view.public.profile', Auth::user()->id) }}"  data-toggle="modal" data-target="#modal_user_info">
                        <div class="d-flex w-100">
                            <i class="fa-solid fa-eye fs-24px me-2"></i>
                            <span class="side-bar-content">{{__('View Public Profile')}}</span>
                        </div>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <div class="d-flex w-100">
                        <i class="fa-regular fa-bookmark fs-24px me-2"></i>
                            <span class="side-bar-content">  Việc Làm Của Tôi</span>
                        </div>
                    </a>
                    <ul class="collapse list-unstyled sub_list {{ Request::url() == route('my.job.applications') || Request::url() == route('my.favourite.jobs')  ? 'show' : '' }}" id="pageSubmenu">
                        <li class="{{ Request::url() == route('my.job.applications') ? 'active' : '' }}">
                            <a href="{{ route('my.job.applications') }}" class="list-group-item list-group-item-action">
                                <div class="d-flex w-100">
                                    <i class="fa-solid fa-user-check fs-24px me-2"></i>
                                    <span class="side-bar-content"> {{__('My Job Applications')}}</span>
                                </div>
                            </a>
                        </li>
                        <li class="{{ Request::url() == route('my.favourite.jobs') ? 'active' : '' }}">
                            <a href="{{ route('my.favourite.jobs') }}" class="list-group-item list-group-item-action">
                                <div class="d-flex w-100">
                                    <i class="fa-regular fa-heart fs-24px me-2"></i>
                                    <span class="side-bar-content">{{__('My Favourite Jobs')}}</spant>
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item {{ Request::url() == route('my-alerts') ? 'active' : '' }}">
                    <a href="{{ route('my-alerts') }}" class="list-group-item list-group-item-action {{ Request::url() == route('my-alerts') ? 'active' : '' }}">
                        <div class="d-flex w-100">
                            <i class="fa-regular fa-bell fs-24px me-2"></i>
                            <span class="side-bar-content"> {{__('My Job Alerts')}}</span>
                        </div>
                    </a>
                </li>

                <li class="sidebar-item {{ Request::url() == route('my.messages') ? 'active' : '' }}">
                    <a href="{{route('my.messages')}}" class="list-group-item list-group-item-action {{ Request::url() == route('my.messages') ? 'active' : '' }}">
                        <div class="d-flex w-100">
                            <span <i class="fa-regular fa-message fs-24px me-2 box-message-icon"</i>
                                <span class="badge">{{\App\CompanyMessage::where('seeker_id', Auth::user()->id)->where('status','unviewed')->where('type','reply')->count()}}</span>
                            </span>
                            <span class="side-bar-content"> {{__('My Messages')}}</span>

                        </div>
                    </a>
                </li>
                <li class="sidebar-item {{ Request::url() == route('my.followings') ? 'active' : '' }}">
                    <a href="{{route('my.followings')}}" class="list-group-item list-group-item-action {{ Request::url() == route('my.followings') ? 'active' : '' }}">
                        <div class="d-flex w-100">
                            <i class="fa-solid fa-user-plus  fs-24px me-2"></i>
                            <span class="side-bar-content"> {{__('My Followings')}}</span>
                        </div>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('site_user.logout') }}" class="list-group-item list-group-item-action">
                        <div class="d-flex w-100">
                            <i class="fa-solid fa-arrow-right-from-bracket fs-24px me-2"></i>
                            <span class="side-bar-content"> {{__('Logout')}}</span>
                        </div>
                    </a>
                </li>

            </ul>
            @endif
        </div>

    </div>

    <div class="sidebar-bottom">
        <ul class="list-unstyled components sidebar-bottom__item">
            @if(Auth::user())
            <li class="openmyacount">
                <div class="btn  btn-primary btn-sm  w-100">
                    <span class="side-bar-content text-white"><i class="fas fa-arrow-circle-right text-white"></i> Thông Tin Tài Khoản</span>
                </div>

            </li>
            
            <li>
                <div class="my-2 group-button">
                   
                  
                    <!-- <a href="{{url('/employers')}}" class="btn btn-primary">Dành Cho Nhà Tuyển Dụng</a> -->
                    <a href="https://tuyendung.jobvieclam.com" class="btn btn-primary btn-sm">Dành Cho Nhà Tuyển Dụng</a>

                 
                </div>
            </li>
           
            @elseif(!Auth::user())
       

            <li>
                <div class="my-2 group-button">
                    <a class="nav-link login_link btn btn-primary login-btn btn-sm" data-toggle="modal" data-target="#user_login_Modal" >{{__('Log in')}} / {{__('Đăng Ký')}} </a>
                  
                    <!-- <a href="{{url('/employers')}}" class="btn btn-primary">Dành Cho Nhà Tuyển Dụng</a> -->
                    <a href="https://tuyendung.jobvieclam.com" class="btn btn-primary btn-sm">Dành Cho Nhà Tuyển Dụng</a>

                    {{--<a class="btn btn-primary my-2" href="{{route('register')}}" class="nav-link
                    register">{{__('Đăng Ký')}}</a> --}}
                </div>
            </li>

        
            @endif
    </div>
</nav>
@include('templates.vietstar.user.templates.modal_user_info')
@push('scripts')
<script type="text/javascript">
     if ($(window).width() < 1240) {
        $('#mobile-sidebar').removeClass("active");
    }
    $(document).ready(function() {
        $('#mobile-sidebarCollapse , .screen-overlay').on('click', function() {
            $('#mobile-sidebar').toggleClass('active');
            $("body").toggleClass("offcanvas-active");
            $(".screen-overlay").toggleClass("show");
        });


        $('.sidebar-item').click(function() {
            // Remove 'active' class from all li elements
            $('.sidebar-item').removeClass('active');
            // Add 'active' class to the clicked li element
            $(this).toggleClass('active');
        });

        $('.openmyacount').click(function() {
            // Remove 'active' class from all li elements
            $('.sidebar-main-nav').addClass('active');
            $('.menu').addClass('active');
            $('.sidebar-user-nav').addClass('active');
            $('.back-menu-normal').addClass('active');
            $('.openmyacount').addClass('disabled')
        });

        $('.back-menu-normal').click(function() {
            // Remove 'active' class from all li elements
            $('.sidebar-main-nav').removeClass('active');
            $('.menu').removeClass('active');
            $('.sidebar-user-nav').removeClass('active');
            $('.back-menu-normal').removeClass('active');
            $('.openmyacount').removeClass('disabled')

        });
    });
</script>
@endpush