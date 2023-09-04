@extends('templates.vietstar.layouts.app')
@section('content')
<!-- Header start -->
@include('templates.vietstar.includes.header')
<!-- Header end -->
<!-- Inner Page Title start -->
@include('templates.vietstar.includes.inner_page_title', ['page_title'=>__('Applied Jobs')])
<!-- Inner Page Title end -->
<div class="listpgWraper">
    <div class="container">
        <div class="row">
            @include('templates.vietstar.includes.user_dashboard_menu')

            <div class="col-md-9">
                <div class="my-job-applications mb-3 w-100">

                    <h3>{{__('Applied Jobs')}}</h3>
                    <div class="searchList jobs-apply-list">
                        <!-- job start -->
                        @if(isset($jobs) && count($jobs))
                        @foreach($jobs as $job)
                        @php $company = $job->getCompany(); @endphp
                        @if(null !== $company)
                        <div class="item-job">
                            <div class="card-news card-news-applied-jobs gap-16 mb-2">
                                <div class="card-news__icon">
                                    {{$company->printCompanyImage()}}
                                </div>
                                <div class="card-news__content">
                                    
                                    <div class="card-news__content-footer card-news__content-footer-applied-jobs">
                                        <div class="applied-jobs-information">
                                            <h6 class="card-news__content-title"><a href="{{route('job.detail', [$job->slug])}}"
                                                title="{{$job->title}}">{{$job->title}}</a></h6>
                                                <p class="card-news__content-detail mb-2">{{$company->name}}</p>
                                                <div class="card-news__content-footer__location">
                                                    <span class="badge rounded-pill pill pill-location">{{$job->getCity('city')}}</span>
                                                    <span class="badge rounded-pill pill pill-worktime">{{$job->getJobType('job_type')}}</span>
                                                <!--  <div class="box-meta box-meta-interview mt-2">
                                                        <i class="iconmoon icon-calendar-icon1"></i>Interview at: 16:30 20/07/2022
                                                    </div> -->
                                                </div>
                                        </div>
                                        
                                        <div class="card-news__content-footer__salary">
                                            <p class="card-news__content-detail mb-2">{{ ($job->appliedUsers) ? __(\App\JobApply::getListStatus()[$job->status_job_apply]) : '' }}</p>
                                            <div class="rank-salary">
                                                {{$job->salary_from.' '.$job->salary_currency}} - {{$job->salary_to.' '.$job->salary_currency}}
                                            </div>
                                           <div>
                                                <a class="btn btn-primary btn-view-details" href="{{route('job.detail', [$job->slug])}}"><span class="iconmoon icon-eye-icon"></span> {{__('View Details')}}</a>
                                           </div>
                                           
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            
                            
                        </div>
                        <!-- job end -->
                        @endif
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('templates.vietstar.includes.footer')
@endsection
@push('scripts')
@include('templates.vietstar.includes.immediate_available_btn')
@endpush