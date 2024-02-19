@php
  $overviewUser = Auth::user()->getStatusOverview();
  function checksalary( $from, $to)
                   {
                        $salaryTextFrom = 0;
                        $salaryTextTo =  0;
                        $textSalary ='';
                        if($from > 0 &&  $to > 0) 
                        {
                            $salaryTextFrom = number_format($from, 0, '', '.');
                            $salaryTextTo = number_format($to, 0, '', '.');
                            return  $salaryTextFrom."-".$salaryTextTo. "  VNĐ";

                        }
                        if($from < 1 && $to < 1)
                        {
                          return  'Thương lượng';

                        }
                         if($from >0)
                         {
                            $salaryTextFrom = number_format($from, 0, '', '.');
                            return "Từ ".$salaryTextFrom." VNĐ";
                         }
                         if($to >0)
                         {
                            $salaryTextTo = number_format($to, 0, '', '.');
                            return "Đến ".$salaryTextTo." VNĐ";
                         }
                       
                   }
@endphp


<div id="content" class="content">
    <!-- Main -->
    <!-- Bio -->
<div class="content-wrapper">

    <div class="card card-bio mb-4 w-100 shadow-sm">
        <div class="row g-0">
            <div class="col-md-3">
                    <div class="img-avatar__wrapper">
                            @if(Auth::user())
                            {{Auth::user()->printUserImage()}}
                            @else
                            <img id="avatar" class="" src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="Avatar">
                            @endif
                    </div>
            </div>
            <div class="col-md-9">
                <div class="card-body-profile-seeker">
                    <h5 class="card-title text-sub-color">{{auth()->user()->name}}</h5>
                   
                    {{--<a href="{{ route('view.public.profile', Auth::user()->id) }}" class="btn btn-primary
                    btn-edit-profile">
                    <span class="icon-edit-icon fs-18px me-2 text-white-color"></span>
                    {{ __('Edit Profile') }}
                    </a> --}}
                </div>

                <div class="row">
                    <span class="col-lg-12 col-md-12 col-sm-12 card-text p-0"><i
                            class="iconmoon icon-recruiter-location m-2"></i>{{Auth::user()->getLocation() ? Auth::user()->getLocation() : __('Not update') }}</span>
                    <span class="col-lg-12 col-md-12 col-sm-12 card-text p-0"><i
                            class="iconmoon icon-recruiter-phone-call m-2"></i>{{auth()->user()->phone ? auth()->user()->phone : __('Not update') }} </span>
                    <span class="col-lg-12 col-md-12 col-sm-12 card-text p-0">
                        <i class="bi bi-envelope text-primary m-2"></i>{{ auth()->user()->email ? auth()->user()->email : __('Not update') }}</span>
                </div>

                <div class="row my-1">

                    <div class="user__complete_section" bis_skin_checked="1">
                        <span class="font-weight-bold"> {{__('Level of completion')}}:</span>
                          <p class="font-weight-bold fs-18px  px-1"> 
                               {{$overviewUser->degreeComplete}}
                          </p>
                    </div>

                    
                    <div class="">
                        @if($overviewUser)
                        <div class="pt-3">
                            <div class="progress">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: {{$overviewUser->percent}}%;" aria-valuenow="{{$overviewUser->percent}}" aria-valuemin="0" aria-valuemax="100">{{$overviewUser->percent}}</div>
                            </div>
                            
                        </div>
                        @endif
                    </div>

                </div>

            </div>
        </div>
    </div>
    <!-- Statistics -->
    @include('templates.vietstar.includes.user_dashboard_stats')
    @if((bool)config('jobseeker.is_jobseeker_package_active'))
    @php
    $packages = App\Package::where('package_for', 'like', 'job_seeker')->get();
    $package = Auth::user()->getPackage();
    if(null !== $package){
    $packages = App\Package::where('package_for', 'like', 'job_seeker')->where('id', '<>',
        $package->id)->where('package_price', '>=', $package->package_price)->get();
        }
        @endphp

        @if(null !== $package)
        @include('templates.vietstar.includes.user_package_msg')
        @include('templates.vietstar.includes.user_packages_upgrade')
        @else

        @if(null !== $packages)
        @include('templates.vietstar.includes.user_packages_new')
        @endif
        @endif
        @endif
        <div class="row">
            <div class="col-md-6 col-sm-12 col-lg-6">
            @if(null!==($matchingJobs) && count($matchingJobs) > 0)
                <!-- realated jobs -->
                <section class="card card-bio mb-3 w-100 shadow-sm ">
                    <div class="card-body">
                        <div class="related-jobs__title d-flex justify-content-between align-items-center">
                            <h6>Việc làm phù hợp</h6>
                            <button class="btn btn-round btn-link btn-sm main-color"
                                onclick="window.location='{{ route('job.list') }}'">{{__('View all')}}</button>
                        </div>
                        <div class="row related-jobs__jobs  mb-2">
                            {{--@foreach($matchingJobs as $match)
                            <div class="col-12 card-news gap-16">
                                <div class="card-news__icon">

                                    <img src="{{ asset('company_logos/'.( !empty($match->getCompany()) ? $match->getCompany()->logo : 'no-logo.png')) }}"
                                        alt="{{!empty($match->getCompany()) ? $match->getCompany()->name : ''}}">
                                </div>
                                <div class="card-news__content">
                                    <h6 class="card-news__content-title">{{ $match->name }}</h6>
                                    <p class="card-news__content-detail">
                                        {{!empty($match->getCompany()) ? $match->getCompany()->name : ''}}
                                    </p>
                                    <div class="card-news__content-footer">
                                        <div class="card-news__content-footer__location">
                                            <span
                                                class="badge rounded-pill pill pill-location">{{!empty($match->getCompany()) ? $match->getCompany()->name : ''}}</span>
                                            <span
                                                class="badge rounded-pill pill pill-worktime">{{$match->getJobType('job_type')}}</span>
                                        </div>
                                        <div class="card-news__content-footer__salary">
                                            {{$match->salary_from}} -
                                            {{$match->salary_to.' '.$match->salary_currency}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            --}}
                            @foreach($matchingJobs as $match)
                            @php
                                $salaryText  = checksalary($match->salary_from, $match->salary_to);
                              
                            @endphp
                            <div class="col-12 card-news ">
                                <a href="/viec-lam/{{ $match->slug ? $match->slug :"" }}">
                                <div class="company-logo">
                                    <img src="{{ asset('company_logos/'.( !empty($match->getCompany()) ? $match->getCompany()->logo : 'no-logo.png')) }}"
                                            alt="{{!empty($match->getCompany()) ? $match->getCompany()->name : ''}}">
                                </div>
                                </a>
                                
                                <div class="card-news__content">
                                    <a href="/viec-lam/{{ $match->slug ? $match->slug :"" }}">
                                        <h6 class="jobtilte"> {{ $match->title }}</h6>
                                    </a>
                                    <p class="companyname">
                                    {{!empty($match->getCompany()) ? $match->getCompany()->name : ''}}
                                    </p>
                                    <div class="card-news__content-info">
                                      
                                        <div class="rank-salary">
                                         
                                            {{$salaryText }} -
                                            {{$match->salary_currency}}
                                        </div>

                                    </div>
                                    <div class="card-news__content-info__salary">
                                        <span class="badge rounded-pill pill pill-worktime">{{$match->getJobType('job_type')}}</span>
                                      
                                            
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            {!! $matchingJobs->appends(Request::except(['page','_token']))->render() !!}
                        </div>
                    </div>
                </section>
            @endif
            </div>
            <div class="col-md-6 col-sm-12 col-lg-6">
                <!--My following -->

                <section class="card card-bio mb-3 w-100 shadow-sm">
                    <div class="card-body">
                        <div class="related-jobs__title d-flex justify-content-between align-items-center mb-2">
                            <h6>Danh Sách Theo Dõi</h6>
                            <a href="{{route('my.followings')}}"><button
                                    class="btn btn-round btn-linsk btn-sm main-color">Xem Tất Cả</button></a>
                        </div>
                        @if(isset($followers) && null!==($followers))
                        @foreach($followers as $follow)
                        @php
                        $company =
                        DB::table('companies')->where('slug',$follow->company_slug)->where('is_active',1)->first();
                        @endphp
                        @if (!empty($company))
                        <li class="list-group-item p-0 mt-3">
                            <div class="no-shadow col-12 card-news gap-16 p-0">
                                <div class="card-news__icon">
                                    <img src="{{ asset('company_logos/'.$company->logo) }}" alt="{{$company->name}}">
                                </div>
                                <div class="card-news__content">
                                    <h6 class="card-news__content-title">{{$company->name}}</h6>
                                    <p class="card-news__content-detail">{{$company->location}}</p>
                                </div>
                            </div>
                        </li>
                        @endif
                        @endforeach
                        @endif

                    </div>
                </section>
            </div>
        </div>
</div>
</div>

@push('styles')
<style>
    .related-jobs__jobs .card-news {
        padding: 10px; 
        border-radius: 4px;
        margin-bottom: 5px;
    }
    .related-jobs__jobs .card-news:hover {
        background: #f9dfdf;
        outline: 1px solid var(--bs-primary);
    }

    .company-logo {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 80px;
        flex: 0 0 80px;
        max-width: 80px;
        display: flex;
        align-items:center;
    }

    .company-logo img{
        width: 100%;
        overflow: hidden;
        border-radius: 5px;
    }

    .related-jobs .related-jobs__title {
        margin-bottom: unset; 
    }
    .jobtilte {
        font-size: 13px;
        width: 95%;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        display: -webkit-box;
        overflow: hidden;
    }
    .companyname {
        font-size: 12px;
    }
    .rank-salary {
        color: #981b1e;
        font-size: 13px;
        font-weight: 700;
    }
</style>
@endpush


