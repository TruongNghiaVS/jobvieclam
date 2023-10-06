<nav id="default-sidebar" class="active">
    <div class="sidebar-header">
        <div class="default-sidebar__btn">
            <button type="button" id="default-sidebarCollapse" class="btn">
                <span class=""><i class="fas fa-bars fa-1x"></i></span>
            </button>
        </div>
        @if(Auth::guard('company')->user())
        <div class="profile" bis_skin_checked="1">
            <div class="avatar" bis_skin_checked="1"><a href="#">
            <img class="lazy-bg" src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="avatar" style=""></a>
            </div>
            <div class="username" bis_skin_checked="1">
                <p><a href="#">Welcome to Jobvieclam</a></p>
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
              
            <ul class="list-unstyled components sidebar-default-nav" id="sidebar-default-nav">
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





