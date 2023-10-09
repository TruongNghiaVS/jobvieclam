<nav id="company-default-nav" class="navbar navbar-expand-lg navbar-light">
    <div class="collapse navbar-collapse  justify-content-center" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item {{ Request::url() == route('company.home') ? 'active' : '' }}">
                    <a href="{{ route('company.home') }}" class="nav-link list-group-item-action ">
                           {{__('Dashboard')}}
                    </a>
                </li>
                <li class="nav-item {{ Request::url() == route('company.profile') ? 'active' : '' }}">
                    <a href="{{route('company.profile') }}" class="nav-link list-group-item-action ">
                        <div class="d-flex w-100">
                            {{__('Edit profile')}}
                        </div>
                    </a>
                </li>

                <li class="nav-item {{ Request::url() == route('company.detail', Auth::guard('company')->user()->slug) ? 'active' : '' }}">
                    <a data-toggle="modal" data-target="#company_profile_modal" class="nav-link list-group-item-action ">
                        <div class="d-flex w-100">
                            
                            {{__('View Public Profile')}}
                        </div>
                    </a>
                </li>
               
                <li class="nav-item {{ Request::url() == route('post.job') ? 'active' : '' }}">
                    <a href="{{route('post.job')}}" class="nav-link list-group-item-action {{ Request::url() == route('post.job') ? 'active' : '' }}">
                        <div class="d-flex w-100">
                         
                            {{__('Post Jobs')}}
                        </div>
                    </a>
                </li>


                <li class="nav-item {{ Request::url() == route('posted.jobs') ? 'active' : '' }}">
                    <a href="{{route('posted.jobs')}}" class="nav-link list-group-item-action ">
                        <div class="d-flex w-100">
                          
                            {{__('Company\'s Posted Jobs')}}
                        </div>
                    </a>
                </li>



                <li class="nav-item {{ Request::url() == route('company.packages') ? 'active' : '' }}">
                    <a href="{{ route('company.packages') }}" class="nav-link list-group-item-action ">
                        <div class="d-flex w-100">
                           
                            {{__('CV Search Packages')}}
                        </div>
                    </a>
                </li>

                <li class="nav-item  {{ Request::url() == route('application.manager') ? 'active' : '' }}">
                    <a href="{{ route('application.manager') }}" class="nav-link list-group-item-action">

                        <div class="d-flex w-100">
                       
                            {{__('CV Management')}}
                        </div>
                    </a>
                </li>


                <li class="nav-item  {{ Request::url() == route('interview.schedule.calendar', ['company_id'=> Auth::guard('company')->user()->id]) ? 'active' : '' }}">
                    <a href="{{route('interview.schedule.calendar',['company_id'=> Auth::guard('company')->user()->id])}}" class="nav-link list-group-item-action">
                        <div class="d-flex w-100">
                         
                            {{__('Interview Schedule')}}
                        </div>
                    </a>
                </li>

                <li class="nav-item {{ Request::url() == route('company.messages') ? 'active' : '' }}">
                <a href="{{ route('company.messages')}}" class="nav-link list-group-item-action ">
                        <div class="d-flex w-100">
                            {{__('Company Messages')}}
                        </div>
                    </a>
                </li>


                <li class="nav-item {{ Request::url() == route('company.followers') ? 'active' : '' }}">
                <a href="{{ route('company.followers') }}" class="nav-link list-group-item-action ">
                        <div class="d-flex w-100">
                        
                            {{__('Company Followers')}}
                        </div>
                    </a>
                </li>
        </ul>
    </div>  
 
</nav>