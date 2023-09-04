<div class="col-lg-3">
    <div class="list-group menu-sidebar">
    <a href="{{ route('company.home') }}" class="list-group-item list-group-item-action {{ Request::url() == route('company.home') ? 'active' : '' }}">
        <div class="d-flex w-100">
            <span class="iconmoon icon-dashboard-icon fs-24px me-2"></span>
            <strong>{{__('Dashboard')}}</strong>
        </div>
    </a>
    <a href="{{route('company.profile') }}" class="list-group-item list-group-item-action {{ Request::url() == route('company.profile') ? 'active' : '' }}">
        <div class="d-flex w-100">
            <span class="iconmoon icon-edit-icon fs-24px me-2"></span>
            <strong>{{__('Edit profile')}}</strong>
        </div>
    </a>
    <a href="{{ route('company.detail', Auth::guard('company')->user()->slug) }}" class="list-group-item list-group-item-action {{ Request::url() == route('company.detail', Auth::guard('company')->user()->slug) ? 'active' : '' }}">
        <div class="d-flex w-100">
            <span class="iconmoon icon-eye-icon fs-24px me-2"></span>
            <strong>{{__('View Public Profile')}}</strong>
        </div>
    </a>
    <a href="{{route('post.job')}}" class="list-group-item list-group-item-action {{ Request::url() == route('post.job') ? 'active' : '' }}">
        <div class="d-flex w-100">
            <span class="iconmoon icon-suitcase-icon fs-24px me-2"></span>
            <strong>{{__('Post Jobs')}}</strong>
        </div>
    </a>

    <a href="{{route('posted.jobs')}}" class="list-group-item list-group-item-action {{ Request::url() == route('posted.jobs') ? 'active' : '' }}">
        <div class="d-flex w-100">
            <span class="iconmoon icon-suitcase-icon fs-24px me-2"></span>
            <strong>{{__('Company\'s Posted Jobs')}}</strong>
        </div>
    </a>
    <a href="{{ route('company.packages') }}" class="list-group-item list-group-item-action {{ Request::url() == route('company.packages') ? 'active' : '' }}">
        <div class="d-flex w-100">
            <span class="iconmoon icon-recruiter-profile fs-24px me-2"></span>
            <strong>{{__('CV Search Packages')}}</strong>
        </div>
    </a>
    <a href="{{ route('application.manager') }}" class="list-group-item list-group-item-action {{ Request::url() == route('application.manager') ? 'active' : '' }}">
        <div class="d-flex w-100">
            <span class="iconmoon icon-recruiter-profile fs-24px me-2"></span>
            <strong>{{__('CV Management')}}</strong>
        </div>
    </a>
    <a href="{{route('interview.schedule.calendar',['company_id'=> Auth::guard('company')->user()->id])}}" class="list-group-item list-group-item-action {{ Request::url() == route('interview.schedule.calendar', ['company_id'=> Auth::guard('company')->user()->id]) ? 'active' : '' }}">
        <div class="d-flex w-100">
            <span class="iconmoon icon-calendar-icon1 fs-24px me-2"></span>
            <strong>{{__('Interview Schedule')}}</strong>
        </div>
    </a>
    <!-- <a href="{{route('shared.cvs')}}" class="list-group-item list-group-item-action {{ Request::url() == route('shared.cvs') ? 'active' : '' }}">
        <div class="d-flex w-100">
            <span class="iconmoon icon-recruiter-portfolio fs-24px me-2"></span>
            <strong>{{__('View Shared CV')}}</strong>
        </div>
    </a>
    <a href="#" class="list-group-item list-group-item-action">
        <div class="d-flex w-100">
            <span class="iconmoon icon-recruiter-withdrawal fs-24px me-2"></span>
            <strong>{{__('Withdraw')}}</strong>
        </div>
    </a>
    <a href="{{ route('company.unloced-users') }}" class="list-group-item list-group-item-action {{ Request::url() == route('company.unloced-users') ? 'active' : '' }}">
        <div class="d-flex w-100">
            <span class="iconmoon icon-recruiter-user fs-24px me-2"></span>
            <strong>{{__('Unlocked Users')}}</strong>
        </div>
    </a> --> 
    <a href="{{ route('company.messages')}}" class="list-group-item list-group-item-action {{ Request::url() == route('company.messages') ? 'active' : '' }}">
        <div class="d-flex w-100">
            <span class="iconmoon icon-message-icon fs-24px me-2 box-message-icon">
                <span class="badge">{{\App\CompanyMessage::where('company_id', Auth::guard('company')->user()->id)->where('status','unviewed')->where('type','message')->count()}}</span>
            </span>
            
            <strong>{{__('Company Messages')}}</strong>
        </div>
    </a>
    <a href="{{ route('company.followers') }}" class="list-group-item list-group-item-action {{ Request::url() == route('company.followers') ? 'active' : '' }}">
        <div class="d-flex w-100">
            <span class="iconmoon icon-team-icon fs-24px me-2"></span>
            <strong>{{__('Company Followers')}}</strong>
        </div>
    </a>
    <a href="{{ route('company.logout') }}" class="list-group-item list-group-item-action {{ Request::url() == route('company.logout') ? 'active' : '' }}">
        <div class="d-flex w-100">
            <span class="iconmoon icon-logout-icon fs-24px me-2"></span>
            <strong>{{__('Logout')}}</strong>
        </div>
    </a>
</div>
</div>







