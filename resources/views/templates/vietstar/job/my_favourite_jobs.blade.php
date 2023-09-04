@extends('templates.vietstar.layouts.app')
@section('content')
<!-- Header start -->
@include('templates.vietstar.includes.header')
<!-- Header end --> 
<!-- Inner Page Title start -->
@include('templates.vietstar.includes.inner_page_title', ['page_title'=>__('Favourite Jobs')])
<!-- Inner Page Title end -->
<div class="listpgWraper">
    <div class="container">
        <div class="row">
            @include('templates.vietstar.includes.user_dashboard_menu')
            <div class="col-md-9"> 
                <div class="myads">
                    <h3>{{__('Favourite Jobs')}}</h3>
                    <div class="searchList jobs-side-list">
                        <!-- job start --> 
                        @if(isset($jobs) && count($jobs))
                        @foreach($jobs as $job)
                        @php $company = $job->getCompany(); @endphp
                        @if(null !== $company)
                        <div class="item-job">
                           
                            <div class="logo-company">
                                <div class="pic">
                                    {{$company->printCompanyImage()}}
                                </div>
                            </div>
                            <div class="jobinfo">
                                <div class="info">
                                    <h3 class="job-title"><a href="{{route('job.detail', [$job->slug])}}" title="{{$job->title}}">{{$job->title}}</a></h3>
                                    <div class="companyName"><a href="{{route('company.detail', $company->slug)}}" title="{{$company->name}}">{{$company->name}}</a></div>
                                    <div class="box-meta">
                                        <i class="fas fa-user-astronaut"></i>{{$job->getJobShift('job_shift')}}
                                    </div>
                                    <div class="box-meta">
                                        <i class="far fa-map-marker-alt"></i>{{$job->getCity('city')}}
                                    </div>
                                    <div class="caption caption-my-favourite">
                                        <div class="welfare">
                                            <div class="box-meta">
                                                <i class="fas fa-dollar-sign"></i> Chế độ thưởng
                                            </div>
                                            <div class="box-meta">
                                                <i class="fas fa-graduation-cap"></i> Đào tạo
                                            </div>
                                        </div>

                                        <div class="user-actio">
                                            <a class="save-job box-meta" href="{{route('job.detail', [$job->slug])}}">
                                                    <i class="iconmoon icon-recruiter-portfolio"></i>
                                                <span> {{__('View Details')}}</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                              
                            </div>
                       
                            <!-- <p>{{\Illuminate\Support\Str::limit(strip_tags($job->description), 150, '...')}}</p> -->
                        </div>
                        <!-- job end --> 
                        @endif
                        @endforeach
                        @endif
                    </div>
                </div>
                <!-- Pagination -->
                <div class="pagiWrap">
                    <nav aria-label="Page navigation example">
                        @if(isset($jobs) && count($jobs))
                        {{ $jobs->appends(request()->query())->links() }} @endif
                    </nav>
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