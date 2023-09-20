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
            <div class="col-md-9 col-sm-12">
                <div class="myads">
                    <h3>{{__('Favourite Jobs')}}</h3>
                    <div class="searchList jobs-side-list">
                        <!-- job start -->
                        @if(isset($jobs) && count($jobs))
                        @foreach($jobs as $job)
                        @php $company = $job->getCompany(); @endphp
                        @if(null !== $company)
                        <div class="item-job mb-3">

                            <div class="logo-company">
                                <div class="pic">
                                    {{$company->printCompanyImage()}}
                                </div>
                            </div>
                            <div class="jobinfo">
                                <div class="info" bis_skin_checked="1">
                                    <!-- Title  Start-->
                                    <div class="info-item job-title-box" bis_skin_checked="1">
                                        <div class="job-title" bis_skin_checked="1">
                                            <span>Mới</span>
                                            <h3 class="job-title-name"><a href="http://localhost:8000/job/nhan-vien-bat-dong-san-40" title="Nhân viên bất động sản">Nhân viên bất động sản</a></h3>
                                        </div>
                                        <a class="save-job" href="http://localhost:8000/add-to-favourite-job/nhan-vien-bat-dong-san-40"><i class="far fa-heart"></i>
                                        </a>
                                    </div>
                                    <!-- Title  End-->

                                    <!-- companyName Start-->
                                    <div class="info-item companyName" bis_skin_checked="1"><a href="http://localhost:8000/company/cong-ty-co-phan-incom-sai-gon-9" title="Công Ty Cổ Phần Incom Sài Gòn">Công Ty Cổ Phần Incom Sài Gòn</a>
                                    </div>
                                    <!-- companyName End-->
                                    <!--rank-salary and place Start-->
                                    <div class="info-item box-meta" bis_skin_checked="1">
                                        <div class="rank-salary" bis_skin_checked="1">
                                            <span class="fas fa-money-bill"></span> Thương lượng
                                        </div>
                                        <div class="navbar__link-separator" bis_skin_checked="1"></div>
                                        <!--meta-city-->
                                        <div class="meta-city" bis_skin_checked="1">
                                            <!-- <i class="far fa-map-marker-alt"></i> -->
                                            Sơn La
                                        </div>


                                        <!-- Bán thời gian -->
                                    </div>
                                    <!--Rank-salary and place End-->

                                    <!--Day update and place Start-->
                                    <div class="info-item day-update" bis_skin_checked="1">
                                        Hôm nay
                                    </div>
                                    <!--Day update and place End-->

                                    <!-- <div class="short-description">M&amp;ocirc; tả c&amp;ocirc;ng việc</div> -->
                                </div>
                                <div class="caption" bis_skin_checked="1">
                                    <div class="welfare" bis_skin_checked="1">
                                        <div class="box-meta" bis_skin_checked="1">
                                            <!-- <i class="fas fa-dollar-sign"></i>  -->
                                            <span>
                                                <!-- Chế độ thưởng -->
                                                Automative
                                            </span>

                                        </div>
                                        <div class="box-meta" bis_skin_checked="1">
                                            <!-- <i class="fas fa-graduation-cap"></i> -->
                                            <span>
                                                <!-- Đào tạo -->
                                                Automative Infomation
                                            </span>
                                        </div>

                                    </div>

                                    <div class="user-action" bis_skin_checked="1">
                                        <a class="btn btn-primary btn-view-details" href="{{route('job.detail', [$job->slug])}}"><span class="iconmoon icon-eye-icon"></span> {{__('View Details')}}</a>
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