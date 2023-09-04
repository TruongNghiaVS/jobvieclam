<div class="col-md-3">
    <!-- Side bar -->
    <div id="sidebar" class="list-group">
      <a href="{{route('home')}}" class="list-group-item list-group-item-action" aria-current="true">
        <div class="d-flex w-100 justify-content-between align-items-center">
          <label class="form-check-label" for="flexSwitchCheckChecked">
            <strong>{{__('Immediate Available')}}</strong>
          </label>
          <div class="form-check form-switch">
            @php
                $checked = ((bool)Auth::user()->is_immediate_available)? 'checked="checked"':'';
            @endphp
            <input type="checkbox" name="is_immediate_available" id="is_immediate_available" class="form-check-input" {{$checked}} onchange="changeImmediateAvailableStatus({{Auth::user()->id}}, {{Auth::user()->is_immediate_available}});">
          </div>
        </div>
      </a>
      <hr>
      <a href="{{ route('home') }}" class="list-group-item list-group-item-action {{ Request::url() == route('home') ? 'active' : '' }}">
        <div class="d-flex w-100">
          <span class="icon-dashboard-icon fs-24px me-2"></span>
          {{__('Dashboard')}}
        </div>
      </a>
      <a href="{{ route('my.profile') }}" class="list-group-item list-group-item-action {{ Request::url() == route('my.profile') ? 'active' : '' }}">
        <div class="d-flex w-100">
          <span class="icon-edit-icon fs-24px me-2"></span>
          {{__('Edit Profile')}}
        </div>
      </a>
      <a href="{{ route('change.template') }}" class="list-group-item list-group-item-action {{ Request::url() == route('change.template') ? 'active' : '' }}">
        <div class="d-flex w-100">
          <span class="icon-edit-icon fs-24px me-2"></span>
          {{__('Change Template')}}
        </div>
      </a>
      <a href="{{ route('view.public.profile', Auth::user()->id) }}" class="list-group-item list-group-item-action {{ route('view.public.profile', Auth::user()->id) }}">
        <div class="d-flex w-100">
          <span class="icon-eye-icon fs-24px me-2"></span>
          {{__('View Public Profile')}}
        </div>
      </a>
      <a href="{{ route('my.job.applications') }}" class="list-group-item list-group-item-action {{ Request::url() == route('my.job.applications') ? 'active' : '' }}">
        <div class="d-flex w-100">
          <span class="icon-doc-check-icon fs-24px me-2"></span>
          {{__('My Job Applications')}}
        </div>
      </a>
      <a href="{{ route('my.favourite.jobs') }}" class="list-group-item list-group-item-action {{ Request::url() == route('my.favourite.jobs') ? 'active' : '' }}">
        <div class="d-flex w-100">
          <span class="icon-heart-icon fs-24px me-2"></span>
          {{__('My Favourite Jobs')}}
        </div>
      </a>
      <a href="{{ route('my-alerts') }}" class="list-group-item list-group-item-action {{ Request::url() == route('my-alerts') ? 'active' : '' }}">
        <div class="d-flex w-100">
          <span class="icon-bell-icon fs-24px me-2"></span>
          {{__('My Job Alerts')}}
        </div>
      </a>
      <a href="{{route('my.messages')}}" class="list-group-item list-group-item-action {{ Request::url() == route('my.messages') ? 'active' : '' }}">
        <div class="d-flex w-100">
          <span class="icon-message-icon fs-24px me-2 box-message-icon">
            <span class="badge">{{\App\CompanyMessage::where('seeker_id', Auth::user()->id)->where('status','unviewed')->where('type','reply')->count()}}</span>
          </span>
          
          {{__('My Messages')}}
        </div>
      </a>
      <a href="{{route('my.followings')}}" class="list-group-item list-group-item-action {{ Request::url() == route('my.followings') ? 'active' : '' }}">
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
    </div>
    <div class="row">
        <div class="col-md-12">{!! $siteSetting->dashboard_page_ad !!}</div>
    </div>
  </div>
