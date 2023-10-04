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

    #mobile-sidebar ul.components {
      
    }

    #mobile-sidebar ul p {
        color: #063146;
        padding: 10px;
    }

    #mobile-sidebar ul li a {
        padding: 20px 20px;
        font-size: 1.1em;
        display: block;
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
        border-bottom: 1px solid #47748b;
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
</style>

@endpush
<nav id="mobile-sidebar" class="active">
    <div class="sidebar-header">
        @if(Auth::user())
        <div class="profile" bis_skin_checked="1">
            <div class="avatar" bis_skin_checked="1"><a href="#">
                    <img class="lazy-bg" src="{{ auth()->user()->avatar() }}" alt="avatar" style=""></a>
            </div>
            <div class="username" bis_skin_checked="1">
                <p><a href="#">{{auth()->user()->name}}</a></p>
            </div>
            <div class="back-menu-normal" bis_skin_checked="1"><i class="bi bi-arrow-left"></i></div>
        </div>
        @else

        <div class="profile" bis_skin_checked="1">
            <div class="avatar" bis_skin_checked="1"><a href="#">
                    <img class="lazy-bg" src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="avatar" style=""></a>
            </div>
            <div class="username" bis_skin_checked="1">
                <p><a href="#">Welcome to Jobvieclam</a></p>
            </div>
            <div class="back-menu-normal" bis_skin_checked="1"><i class="bi bi-arrow-left"></i></div>
        </div>

        @endif
        <div class="menu">
            <ul class="list-unstyled components sidebar-main-nav" id="sidebar-main-nav">
                <li class="sidebar-item {{ Request::url() == route('index') ? 'active' : '' }}">
                    <a href="{{url('/')}}" class="list-group-item list-group-item-action {{ Request::url() == route('index') ? 'active' : '' }}">
                        <div class="d-flex w-100">
                            <i class="bi bi-house fs-24px me-2"></i>
                            <span class="side-bar-content"> {{__('Home')}}</span>
                        </div>
                    </a>
                </li>
                <li class="sidebar-item {{ Request::url() == route('job.list') || strpos(Request::url(),'/job/') > 0 ? 'active' : '' }}">
                    <a href="{{ route('job.list') }}" class="list-group-item list-group-item-action {{ Request::url() == route('job.list') || strpos(Request::url(),'/job/') > 0 ? 'active' : '' }}">

                        <div class="d-flex w-100">
                            <i class="bi bi-card-list fs-24px me-2"></i>
                            <span class="side-bar-content"> {{__('Jobs')}}</span>
                        </div>
                    </a>
                </li>

                <li>
                    <a href="#cv_sub_list" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <div class="d-flex w-100">
                            <i class="bi bi-file-person fs-24px me-2"></i>
                            <span class="side-bar-content"> {{__('Profiles and CVs')}}</span>
                        </div>
                    </a>
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



                <li>
                    <a href="#company_sub_list" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <div class="d-flex w-100">
                            <i class="bi bi-building fs-24px me-2"></i>
                            <span class="side-bar-content">{{__('Company')}}</span>
                        </div>
                    </a>

                    <ul class="collapse list-unstyled sub_list" data-ref="findJob1" data-target="false" id="company_sub_list">
                        <li>
                            <a class="sub-item" href="{{route('about_us')}}">
                                <div class="d-flex w-100">

                                    <span class="side-bar-content"> {{__('About us')}}
                                    </span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="sub-item" href="{{route('top-companies')}}">
                                <div class="d-flex w-100">

                                    <span class="side-bar-content"> {{__('Top companies')}}
                                    </span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="sub-item" href="{{route('company.listing')}}">
                                <div class="d-flex w-100">

                                    <span class="side-bar-content"> {{__('Companies')}}
                                    </span>
                                </div>
                            </a>
                        </li>

                    </ul>
                </li>


                <li class="has-child">
                    <a href="#blog_sub_list" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <div class="d-flex w-100">
                            <i class="bi bi-newspaper fs-24px me-2"></i>
                            <span class="side-bar-content">{{__('Blog')}}</span>
                        </div>
                    </a>
                    @php($categories = \App\Blog_category::get())

                    <ul class="collapse list-unstyled sub_list" data-ref="findJob_blog" data-target="false" id="blog_sub_list">
                        @foreach($categories as $category)
                        <li>
                            <a class="sub-item" href="{{ url('/blog/category/') . "/" . $category->slug }}">

                                <div class="d-flex w-100">

                                    <span class="side-bar-content">{{$category->heading}}</span>
                                </div>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </li>


            </ul>
            <!-- user nav -->

            @if(Auth::user())
            <ul class="list-unstyled components sidebar-user-nav" id="sidebar-user-nav">
                <li class="sidebar-item {{ Request::url() == route('home') ? 'active' : '' }}">
                    <a href="{{ route('home') }}" class="list-group-item list-group-item-action {{ Request::url() == route('home') ? 'active' : '' }}">
                        <div class="d-flex w-100">
                            <span class="icon-dashboard-icon fs-24px me-2"></span>
                            <span class="side-bar-content">{{__('Dashboard')}}</span>
                        </div>
                    </a>
                </li>

                <li class="sidebar-item {{ Request::url() == route('my.profile') ? 'active' : '' }}">
                    <a href="{{ route('my.profile') }}" class="list-group-item list-group-item-action {{ Request::url() == route('my.profile') ? 'active' : '' }}">
                        <div class="d-flex w-100">
                            <span class="icon-edit-icon fs-24px me-2"></span>
                            <span class="side-bar-content"> {{__('Edit Profile')}}</span>

                        </div>
                    </a>
                </li>

                <li class="sidebar-item {{ Request::url() == route('change.template') ? 'active' : '' }}">
                    <a href="{{ route('change.template') }}" class="list-group-item list-group-item-action {{ Request::url() == route('change.template') ? 'active' : '' }}">
                        <div class="d-flex w-100">
                            <span class="icon-edit-icon fs-24px me-2"></span>
                            <span class="side-bar-content"> {{__('Change Template')}}</span>
                        </div>
                    </a>
                </li>

                <li class="">
                    <a href="{{ route('view.public.profile', Auth::user()->id) }}" class="list-group-item list-group-item-action {{ route('view.public.profile', Auth::user()->id) }}">
                        <div class="d-flex w-100">
                            <span class="icon-eye-icon fs-24px me-2"></span>
                            <span class="side-bar-content">{{__('View Public Profile')}}</span>
                        </div>
                    </a>
                </li>
                <li class="sidebar-item {{ Request::url() == route('my.job.applications') || Request::url() == route('my.favourite.jobs')  ? 'active' : '' }}">
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <div class="d-flex w-100">
                            <span class="icon-edit-icon fs-24px me-2"></span>
                            <span class="side-bar-content"> Việc làm của tôi</span>
                        </div>
                    </a>
                    <ul class="collapse list-unstyled sub_list" id="pageSubmenu">
                        <li class="{{ Request::url() == route('my.job.applications') ? 'active' : '' }}">
                            <a href="{{ route('my.job.applications') }}" class="list-group-item list-group-item-action {{ Request::url() == route('my.job.applications') ? 'active' : '' }}">
                                <div class="d-flex w-100">
                                    <span class="icon-doc-check-icon fs-24px me-2"></span>
                                    <span class="side-bar-content"> {{__('My Job Applications')}}</span>
                                </div>
                            </a>
                        </li>
                        <li class="{{ Request::url() == route('my.favourite.jobs') ? 'active' : '' }}">
                            <a href="{{ route('my.favourite.jobs') }}" class="list-group-item list-group-item-action {{ Request::url() == route('my.favourite.jobs') ? 'active' : '' }}">
                                <div class="d-flex w-100">
                                    <span class="icon-heart-icon fs-24px me-2"></span>
                                    <span class="side-bar-content">{{__('My Favourite Jobs')}}</spant>
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item {{ Request::url() == route('my-alerts') ? 'active' : '' }}">
                    <a href="{{ route('my-alerts') }}" class="list-group-item list-group-item-action {{ Request::url() == route('my-alerts') ? 'active' : '' }}">
                        <div class="d-flex w-100">
                            <span class="icon-bell-icon fs-24px me-2"></span>
                            <span class="side-bar-content"> {{__('My Job Alerts')}}</span>
                        </div>
                    </a>
                </li>

                <li class="sidebar-item {{ Request::url() == route('my.messages') ? 'active' : '' }}">
                    <a href="{{route('my.messages')}}" class="list-group-item list-group-item-action {{ Request::url() == route('my.messages') ? 'active' : '' }}">
                        <div class="d-flex w-100">
                            <span class="icon-message-icon fs-24px me-2 box-message-icon">
                                <span class="badge">{{\App\CompanyMessage::where('seeker_id', Auth::user()->id)->where('status','unviewed')->where('type','reply')->count()}}</span>
                            </span>
                            <span class="side-bar-content"> {{__('My Messages')}}</span>

                        </div>
                    </a>
                </li>
                <li class="{{ Request::url() == route('my.followings') ? 'active' : '' }}">
                    <a href="{{route('my.followings')}}" class="list-group-item list-group-item-action {{ Request::url() == route('my.followings') ? 'active' : '' }}">
                        <div class="d-flex w-100">
                            <span class="icon-office-building-icon fs-24px me-2"></span>
                            <span class="side-bar-content"> {{__('My Followings')}}</span>
                        </div>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('site_user.logout') }}" class="list-group-item list-group-item-action">
                        <div class="d-flex w-100">
                            <span class="icon-logout-icon fs-24px me-2"></span>
                            <span class="side-bar-content"> {{__('Logout')}}</span>
                        </div>
                    </a>
                </li>

            </ul>
            
            @elseif(Auth::guard('company')->check())
            <ul class="list-unstyled components sidebar-user-nav" id="sidebar-user-nav">
            <li class="sidebar-item {{ Request::url() == route('company.home') ? 'active' : '' }}">
                    <a href="{{ route('company.home') }}" class="list-group-item list-group-item-action ">
                        <div class="d-flex w-100">
                            <span class="iconmoon icon-dashboard-icon fs-24px me-2"></span>
                            <span class="side-bar-content">{{__('Dashboard')}}</span>
                        </div>
                    </a>
                </li>

                <li class="sidebar-item {{ Request::url() == route('company.profile') ? 'active' : '' }}">
                    <a href="{{route('company.profile') }}" class="list-group-item list-group-item-action ">
                        <div class="d-flex w-100">
                            <span class="iconmoon icon-edit-icon fs-24px me-2"></span>
                            <span class="side-bar-content">{{__('Edit profile')}}</span>
                        </div>
                    </a>
                </li>

                <li class="sidebar-item {{ Request::url() == route('company.detail', Auth::guard('company')->user()->slug) ? 'active' : '' }}">
                    <a href="{{ route('company.detail', Auth::guard('company')->user()->slug) }}" class="list-group-item list-group-item-action ">
                        <div class="d-flex w-100">
                            <span class="iconmoon icon-eye-icon fs-24px me-2"></span>
                            <span class="side-bar-content">{{__('View Public Profile')}}</span>
                        </div>
                    </a>
                </li>

                <li class="sidebar-item {{ Request::url() == route('post.job') ? 'active' : '' }}">
                    <a href="{{route('post.job')}}" class="list-group-item list-group-item-action {{ Request::url() == route('post.job') ? 'active' : '' }}">
                        <div class="d-flex w-100">
                            <span class="icon-eye-icon fs-24px me-2"></span>
                            <span class="side-bar-content">{{__('Post Jobs')}}</span>
                        </div>
                    </a>
                </li>


                <li class="sidebar-item {{ Request::url() == route('posted.jobs') ? 'active' : '' }}">
                    <a href="{{route('posted.jobs')}}" class="list-group-item list-group-item-action ">
                        <div class="d-flex w-100">
                            <span class="iconmoon icon-suitcase-icon fs-24px me-2"></span>
                            <span class="side-bar-content">{{__('Company\'s Posted Jobs')}}</span>
                        </div>
                    </a>
                </li>



                <li class="sidebar-item {{ Request::url() == route('company.packages') ? 'active' : '' }}">
                    <a href="{{ route('company.packages') }}" class="list-group-item list-group-item-action ">
                        <div class="d-flex w-100">
                            <span class="iconmoon icon-recruiter-profile fs-24px me-2"></span>
                            <span class="side-bar-content">{{__('CV Search Packages')}}</span>
                        </div>
                    </a>
                </li>

                <li class="sidebar-item  {{ Request::url() == route('application.manager') ? 'active' : '' }}">
                    <a href="{{ route('application.manager') }}" class="list-group-item list-group-item-action">

                        <div class="d-flex w-100">
                        <span class="iconmoon icon-recruiter-profile fs-24px me-2"></span>
                            <span class="side-bar-content">{{__('CV Management')}}</span>
                        </div>
                    </a>
                </li>


                <li class="sidebar-item  {{ Request::url() == route('interview.schedule.calendar', ['company_id'=> Auth::guard('company')->user()->id]) ? 'active' : '' }}">
                    <a href="{{route('interview.schedule.calendar',['company_id'=> Auth::guard('company')->user()->id])}}" class="list-group-item list-group-item-action">
                        <div class="d-flex w-100">
                            <span class="iconmoon icon-calendar-icon1 fs-24px me-2"></span>
                            <span class="side-bar-content">{{__('Interview Schedule')}}</span>
                        </div>
                    </a>
                </li>

                <li class="sidebar-item {{ Request::url() == route('company.messages') ? 'active' : '' }}">
                <a href="{{ route('company.messages')}}" class="list-group-item list-group-item-action ">
                        <div class="d-flex w-100">
                            <span class="iconmoon icon-message-icon fs-24px me-2 box-message-icon">
                                <span class="badge">{{\App\CompanyMessage::where('company_id', Auth::guard('company')->user()->id)->where('status','unviewed')->where('type','message')->count()}}</span>
                            </span>
                            <span class="side-bar-content">{{__('Company Messages')}}</span>
                        </div>
                    </a>
                </li>


                <li class="sidebar-item {{ Request::url() == route('company.followers') ? 'active' : '' }}">
                <a href="{{ route('company.followers') }}" class="list-group-item list-group-item-action ">
                        <div class="d-flex w-100">
                        <span class="iconmoon icon-team-icon fs-24px me-2"></span>
                            <span class="side-bar-content">{{__('Company Followers')}}</span>
                        </div>
                    </a>
                </li>

                <li class="sidebar-item {{ Request::url() == route('company.logout') ? 'active' : '' }}">
                    <a href="{{ route('company.logout') }}" class="list-group-item list-group-item-action ">
                        <div class="d-flex w-100">
                            <span class="iconmoon icon-logout-icon fs-24px me-2"></span>
                            <span class="side-bar-content">{{__('Logout')}}</span>
                        </div>
                    </a>
                </li>
            </ul>
            @endif
        </div>

    </div>

    <div class="sidebar-bottom">
        <ul class="list-unstyled components sidebar-bottom__item">
            @if(Auth::user() )
            <li class="openmyacount">
                <div class="d-flex w-100">
                    <span class="side-bar-content">Thông tin tài khoản</span>
                </div>

            </li>
            @elseif(Auth::guard('company')->check())

            <li class="openmyacount">
                <div class="d-flex w-100">
                    <span class="side-bar-content">Thông tin tài khoản</span>
                </div>

            </li>

            @elseif(!Auth::user() && !Auth::guard('company')->user())
            <li>
                <div class="d-flex gap-10 my-2 group-button">
                    <a class="btn btn-primary login-btn" href="{{route('login')}}" class="nav-link">{{__('Log in')}}</a>
                    {{--<a class="btn btn-primary" href="{{route('register')}}" class="nav-link
                    register">{{__('Đăng ký')}}</a> --}}
                    <a class="btn btn-primary" href="{{route('job.seeker.list')}}" class="nav-link">{{__('Find candidates')}}</a>
                </div>
            </li>
            @endif

            <li>
                <ul class="navbar-nav navbar-lang ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link navbar-lang__link" href="#" >

                            <img src="{{ asset('/vietstar/imgs/flags/') }}/{{config('app.available_locales')[App::getLocale()]['flag-icon']}}.png" alt="vietstar">
                        </a>
                        <div class="dropdown__lang_menu">
                            @foreach (config('app.available_locales') as $lang => $language)
                            @if ($lang != App::getLocale())
                            <a class="dropdown-item" href="{{ route('lang.switch', $lang) }}"><span class="flag-icon flag-icon-{{$language['flag-icon']}}"><img src="{{ asset('/vietstar/imgs/flags/') }}/{{$language['flag-icon']}}.png" alt="vietstar"></span> {{$language['display']}}</a>
                            @endif
                            @endforeach

                        </div>
                    </li>
                </ul>
            </li>


            <li>
                <div class="d-flex w-100">
                    <span class="side-bar-content">Dành cho nhà tuyển dụng</span>
                </div>
            </li>
        </ul>
    </div>
</nav>

@push('scripts')
<script type="text/javascript">
    if ($(window).width() > 992) {
        $('#mobile-sidebar').removeClass("active");
    }
    else {
        $('#mobile-sidebar').addClass("active");
    }


    

    $(document).ready(function() {
        $('#mobile-sidebarCollapse').on('click', function() {
            $('#mobile-sidebar').toggleClass('active');
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

        });

        $('.back-menu-normal').click(function() {
            // Remove 'active' class from all li elements
            $('.sidebar-main-nav').removeClass('active');
            $('.menu').removeClass('active');
            $('.sidebar-user-nav').removeClass('active');
            $('.back-menu-normal').removeClass('active');
        });
    });
</script>
@endpush