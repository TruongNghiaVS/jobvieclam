@push('styles')
<style type="text/css">
    /* Option 2: Import via CSS */
    @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css");

    .user-wrapper{
        display: flex;
        width: 100%;
        align-items: stretch;
        position: relative;
        top: 0;
        left: 0;
    }

    #default-sidebar {
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        -webkit-box-pack: justify;
        -ms-flex-pack: justify;
        display: -webkit-box;
        display: -ms-flexbox;
        background: white;
        color: #bcc0c8;
        transition: all 0.3s;
        max-height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
        z-index: 9;
        min-width: 60px;
        max-width: 60px;
        overflow-x: hidden;
    }


    .user-wrapper.default-sidebar {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 280px;
        flex: 0 0 280px;
        max-width: 280px;
        min-height: calc(100vh - 80px);
    }
    .user-wrapper.content{
        -webkit-box-flex: 0;
        -ms-flex: 0 0 calc(100% - 300px);
        flex: 0 0 calc(100% - 300px);
        width: calc(100% - 300px);
        max-width: calc(100% - 300px);
    }

    .user-wrapper.content.active {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 calc(100% - 60px);
        flex: 0 0 calc(100% - 60px);
        width: calc(100% - 60px);
        max-width: calc(100% - 60px);
    }

    
    #default-sidebar.active {
        min-width: 330px;
        max-width: 330px;
        overflow-x: hidden;
        
        display: flex;
        flex-direction: column;
        z-index: 9;
        max-height: 100%;
    }

    #default-sidebar.active .default-sidebar__btn {
        width: 100%;
        height: 60px;
        display: flex;
        justify-content: end;
    }

    #default-sidebar .default-sidebar__btn {
        display: flex;
        justify-content: center;
        align-items: center;
    }


    /* PROFILE CSS */


    #default-sidebar  .profile {
        width: 60px;
        height: 60px;
        overflow: hidden;
        position: relative;
        padding: 0;
        border-bottom: 1px solid #ccc;
    }
    #default-sidebar.active  .profile {
       width: 100%;
       height: 20%;
       padding: 5px 10px;
    }


    #default-sidebar.active .profile .avatar {
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        display: -webkit-box;
        display: -ms-flexbox;
        width: 80px;
        height: 80px;
        margin: 0 auto;
        overflow: hidden;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.3);
        display: flex;
        align-items: center;
        justify-content: center;
    }
    #default-sidebar .profile .avatar {
        display: none;
    }

    .profile .avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    #default-sidebar.active .profile .username {
        margin-top: 15px;
        font-size: 16px;
        text-align: center;
        text-transform: uppercase;
        display: block;
    }
    #default-sidebar .profile .username {
        display: none;
    }

    .profile .username p a {
        color: var(--text-main);
        font-size: 16px;
        text-align: center;
        text-transform: uppercase;
        font-weight: 600;
    }

    
    

   

    #default-sidebar .side-bar-content {
        display: none;
    }

    #default-sidebar.active .side-bar-content {
        display: block;
        color: var(--text-main);
    }

    #default-sidebar.active ul.components {
        width: 100%;
    
    }

    #default-sidebar.active .sidebar-header {
        display: flex;
        flex-direction: column;
        overflow-y: auto;
        scrollbar-width:none;
    }

    #default-sidebar .sidebar-header {
        background: white;
        width: 100%;
        overflow-x: hidden;
    }

    #default-sidebar ul.components {
        border-bottom: 1px solid #47748b;
    }

    #default-sidebar ul p {
        color: #063146;
        padding: 10px;
    }

    #default-sidebar ul li a {
        padding: 20px 20px;
        font-size: 1.1em;
        display: block;
        background-color: white;
        color: var(--text-main);
    }
    #default-sidebar ul li.active a {
        background-color: var(--bs-primary);
    }
    #default-sidebar ul li.active a span {
        color: white !important;
    }



    #default-sidebar ul li a:hover {
        color: white;
        background: #981b1e;
    }

    #default-sidebar ul li a:hover span {
        color: white;
    }

    #default-sidebar ul li a:hover span {
        color: white;
    }
    #default-sidebar ul li a:hover  .side-bar-content {
        color: white;
    }


    #default-sidebar ul li a i {
        font-size: 20px;
        color: white;
    }



    #default-sidebar ul li .dropdown-toggle::after {
        color: #b2bcc6;
        display: none;
    }

    #default-sidebar.active ul li .dropdown-toggle::after {
        color: #b2bcc6;
        display: block;
        right: 20px;
    }

    #default-sidebar .sidebar-item.active>a {
        background-color: #981b1e;
        color: white;
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

    #default-sidebar.active .dropdown-toggle::after {
        display: none;
    }



    #default-sidebar ul ul a {
        font-size: 0.9em !important;
        padding-left: 70px;

    }
   

    #default-sidebar ul ul a span {
        color: var(--text-main);
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

    ul.list-unstyled.components li {
        margin: 10px 0;
        border-bottom: #e8ebee 1px solid;
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

    #default-sidebar.active ul li a span {
        color: var(--text-main);
    }

    #default-sidebar.active ul li a:hover span {
        color: white;
    }


    

    #default-sidebarCollapse span i {
        color: #bcc0c8;
    }

    #default-sidebar ul li a span {
        color: #bcc0c8;
        font-size: 17px;
        font-weight: 500;
        color: var(--text-main);
    }

    #default-sidebar ul ul a {
        padding-left: 60px;
    }
  
    #default-sidebar ul li.active a .side-bar-content  {
        color: white;
    }

    #default-sidebar ul ul.sublist a span,
    #default-sidebar ul ul.sublist a span.side-bar-content {
        color: var(--text-main);
    }
    #default-sidebar ul ul.sublist a:hover span,
    #default-sidebar ul ul.sublist a:hover span.side-bar-content
    {
        color: white;
    }


    ul#pageSubmenu li {
        margin-left: 10px;
    }

    ul#pageSubmenu li a span {
        font-size: 16px !important;
    }

    #default-sidebar .menu {
        position: relative;
        width: 100%;
        height: 100%;
        overflow-x: hidden;
        overflow-y: auto;
    }


    .sidebar-user-nav {
        position: absolute;
        top: 0px;
        left: 0px;
    }


  

    .sidebar-bottom {
        display: none;
    }

    #default-sidebar.active .sidebar-bottom {
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
        color: white;
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
  
</style>

@endpush
<nav id="default-sidebar" class="active">
    <div class="sidebar-header">
        @if(Auth::user())
        <div class="default-sidebar__btn">
            <button type="button" id="default-sidebarCollapse" class="btn">
                <span class="text-white f"><i class="fas fa-bars fa-1x text-white"></i></span>
            </button>
        </div>

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
      
            @if(Auth::user())
            <ul class="list-unstyled components sidebar-default-nav" id="sidebar-default-nav">
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
                    <ul class="collapse list-unstyled sublist" id="pageSubmenu">
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
            @endif
       

    </div>

    <div class="sidebar-bottom">
       
    </div>
</nav>

@push('scripts')
<script type="text/javascript">
    if ($(window).width() > 992) {
        $('#default-sidebar').addClass("active");
    }
    else {
        $('#default-sidebar').remove("active");
    }


    

    $(document).ready(function() {
        $('#default-sidebarCollapse').on('click', function() {
            $('#default-sidebar').toggleClass('active');
            $('#content').toggleClass('active');
        });


        $('.sidebar-item').click(function() {
            // Remove 'active' class from all li elements
            $('.sidebar-item').removeClass('active');
            // Add 'active' class to the clicked li element
            $(this).toggleClass('active');
        });

        // $('.openmyacount').click(function() {
        //     // Remove 'active' class from all li elements
         
        //     $('.menu').addClass('active');
        //     $('.sidebar-user-nav').addClass('active');
        //     $('.back-menu-normal').addClass('active');

        // });

        // $('.back-menu-normal').click(function() {
        //     // Remove 'active' class from all li elements
            
        //     $('.menu').removeClass('active');
        //     $('.sidebar-user-nav').removeClass('active');
        //     $('.back-menu-normal').removeClass('active');
        // });
    });
</script>
@endpush