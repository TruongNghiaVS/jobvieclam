<!-- Side bar -->
<!-- <div id="sidebar" class="list-group">
        <a href="{{route('home')}}" class="list-group-item list-group-item-action" aria-current="true">
            <div class="d-flex w-100 justify-side-bar-content-between align-items-center">
                <label class="form-check-label" for="flexSwitchCheckChecked">
                    <strong>{{__('Immediate Available')}}</strong>
                </label>
                <div class="form-check form-switch">
                    @php
                    $checked = ((bool)Auth::user()->is_immediate_available)? 'checked="checked"':'';
                    @endphp
                    <input type="checkbox" name="is_immediate_available" id="is_immediate_available"
                        class="form-check-input" {{$checked}}
                        onchange="changeImmediateAvailableStatus({{Auth::user()->id}}, {{Auth::user()->is_immediate_available}});">
                </div>
            </div>
        </a>
        <hr>
        <a href="{{ route('home') }}"
            class="list-group-item list-group-item-action {{ Request::url() == route('home') ? 'active' : '' }}">
            <div class="d-flex w-100">
                <span class="icon-dashboard-icon fs-24px me-2"></span>
                {{__('Dashboard')}}
            </div>
        </a>
        <a href="{{ route('my.profile') }}"
            class="list-group-item list-group-item-action {{ Request::url() == route('my.profile') ? 'active' : '' }}">
            <div class="d-flex w-100">
                <span class="icon-edit-icon fs-24px me-2"></span>
                {{__('Edit Profile')}}
            </div>
        </a>
        <a href="{{ route('change.template') }}"
            class="list-group-item list-group-item-action {{ Request::url() == route('change.template') ? 'active' : '' }}">
            <div class="d-flex w-100">
                <span class="icon-edit-icon fs-24px me-2"></span>
                {{__('Change Template')}}
            </div>
        </a>
        <a href="{{ route('view.public.profile', Auth::user()->id) }}"
            class="list-group-item list-group-item-action {{ route('view.public.profile', Auth::user()->id) }}">
            <div class="d-flex w-100">
                <span class="icon-eye-icon fs-24px me-2"></span>
                {{__('View Public Profile')}}
            </div>
        </a>
        <a href="{{ route('my.job.applications') }}"
            class="list-group-item list-group-item-action {{ Request::url() == route('my.job.applications') ? 'active' : '' }}">
            <div class="d-flex w-100">
                <span class="icon-doc-check-icon fs-24px me-2"></span>
                {{__('My Job Applications')}}
            </div>
        </a>
        <a href="{{ route('my.favourite.jobs') }}"
            class="list-group-item list-group-item-action {{ Request::url() == route('my.favourite.jobs') ? 'active' : '' }}">
            <div class="d-flex w-100">
                <span class="icon-heart-icon fs-24px me-2"></span>
                {{__('My Favourite Jobs')}}
            </div>
        </a>
        <a href="{{ route('my-alerts') }}"
            class="list-group-item list-group-item-action {{ Request::url() == route('my-alerts') ? 'active' : '' }}">
            <div class="d-flex w-100">
                <span class="icon-bell-icon fs-24px me-2"></span>
                {{__('My Job Alerts')}}
            </div>
        </a>
        <a href="{{route('my.messages')}}"
            class="list-group-item list-group-item-action {{ Request::url() == route('my.messages') ? 'active' : '' }}">
            <div class="d-flex w-100">
                <span class="icon-message-icon fs-24px me-2 box-message-icon">
                    <span
                        class="badge">{{\App\CompanyMessage::where('seeker_id', Auth::user()->id)->where('status','unviewed')->where('type','reply')->count()}}</span>
                </span>

                {{__('My Messages')}}
            </div>
        </a>
        <a href="{{route('my.followings')}}"
            class="list-group-item list-group-item-action {{ Request::url() == route('my.followings') ? 'active' : '' }}">
            <div class="d-flex w-100">
                <span class="icon-office-building-icon fs-24px me-2"></span>
                {{__('My Followings')}}
            </div>
        </a>
        <a href="{{ route('site_user.logout') }}" class="list-group-item list-group-item-action">
            <div class="d-flex w-100">
                <span class="icon-logout-icon fs-24px me-2"></span>
                {{__('Logout')}}
            </div>
        </a>
    </div> -->
<!-- <div class="row">
        <div class="col-md-12">{!! $siteSetting->dashboard_page_ad !!}</div>
    </div> -->
@push('styles')
<style type="text/css">
    .wrapper {
        display: flex;
        width: 100%;
        align-items: stretch;
    }

    #sidebar {
        min-width: 300px;
        max-width: 300px;
        background: #063146;
        color: #bcc0c8;
        transition: all 0.3s;

    }

    .sidebar-btn {
        display: flex;
        align-items: center;
        justify-content: end;
    }

    #sidebar.active {
        min-width: 60px;
        max-width: 60px;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    #sidebar.active .side-bar-content {
        display: none;
    }

    #sidebar.active ul.components {}

    #sidebar.active .sidebar-header h3 {
        display: none;
    }

    #sidebar .sidebar-header {
        padding: 20px;
        background: #063146;
    }

    #sidebar ul.components {
        border-bottom: 1px solid #47748b;
    }

    #sidebar ul p {
        color: #063146;
        padding: 10px;
    }

    #sidebar ul li a {
        padding: 20px 20px;
        font-size: 1.1em;
        display: block;
        background-color: #063146;
    }

    #sidebar .sidebar-header h3 {
        color: white;
    }

    #sidebar ul li a:hover {
        color: #7386D5;
        background: #981b1e;
    }

    #sidebar ul li a:hover span {
        color: white;
    }

    #sidebar ul li a::after {
        color: #b2bcc6;
    }

    #sidebar ul li.active>a,
    a[aria-expanded="true"] {
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
        right: 20px;
        transform: translateY(-50%);
    }

    #sidebar.active .dropdown-toggle::after {
        display: none;
    }


    ul ul a {
        font-size: 0.9em !important;
        padding-left: 30px !important;
        background: #6d7fcc;
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

    #sidebar.active ul li a span {
        color: white;
    }


    #sidebarCollapse span i {
        color: #bcc0c8;
    }

    #sidebar ul li a span {
        color: #bcc0c8;
        font-size: 19px;
        font-weight: 700;
    }

    #sidebar ul li.active a span {
        color: white;
    }

    ul#pageSubmenu li {
        margin-left: 10px;
    }

    ul#pageSubmenu li a span {
        font-size: 16px !important;
    }
</style>

@endpush
<nav id="sidebar">
    <div class="sidebar-btn">
        <button type="button" id="sidebarCollapse" class="btn">
            <span class="dark-blue-text"><i class="fas fa-bars fa-1x"></i></span>
        </button>
    </div>
    <div class="sidebar-header">
        <h3>Thông Tin Hồ Sơ</h3>
    </div>

    <ul class="list-unstyled components" id="sidebar-list">
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
            <ul class="collapse list-unstyled" id="pageSubmenu">
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
</nav>

@push('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').toggleClass('active');
        });

        $('.sidebar-item').click(function() {
            // Remove 'active' class from all li elements
            $('.sidebar-item').removeClass('active');
            // Add 'active' class to the clicked li element
            $(this).toggleClass('active');
        });

    });
</script>
@endpush