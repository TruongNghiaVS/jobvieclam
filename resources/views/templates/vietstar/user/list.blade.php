@extends('templates.vietstar.layouts.app')
@section('content')
<!-- Header start -->
@include('templates.vietstar.includes.header')
<!-- Header end -->
<!-- Inner Page Title start -->
@include('templates.vietstar.includes.inner_page_title', ['page_title'=>__('Job Seekers')])
<!-- Inner Page Title end -->
<!-- <a class="btn btn-primary applyCV-btn" href="http://jobvieclam.com/login#cvs">Nộp CV</a> -->
@include('flash::message')

<!-- <form action="{{route('job.seeker.list')}}" method="get"> -->
<!-- Page Title start -->
<!-- <div class="pageSearch">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-2">
                    @if(Auth::guard('company')->check())
                    <a href="{{ route('post.job') }}" class="btn"><i class="fa fa-file-text" aria-hidden="true"></i>
                        {{__('Post Job')}}</a>
                    @else
                    <a href="{{url('my-profile#cvs')}}" class="btn"><i class="fa fa-file-text" aria-hidden="true"></i>
                        {{__('Upload Your Resume')}}</a>
                    @endif

                </div>
                <div class="col-lg-10">
                    <div class="searchform">
                        <div class="row">
                            <div class="col-md-{{((bool)$siteSetting->country_specific_site)? 5:3}}">
                                <input type="text" name="search" value="{{Request::get('search', '')}}"
                                    class="form-control" placeholder="{{__('Enter Skills or job seeker details')}}" />
                            </div>
                            <div class="col-md-2"> {!! Form::select('functional_area_id[]', ['' => __('Lựa chọn Bộ phận
                                chức năng')]+$functionalAreas, Request::get('functional_area_id', null),
                                array('class'=>'form-control', 'id'=>'functional_area_id')) !!} </div>


                            @if((bool)$siteSetting->country_specific_site)
                            {!! Form::hidden('country_id[]', Request::get('country_id[]',
                            $siteSetting->default_country_id), array('id'=>'country_id')) !!}
                            @else
                            <div class="col-md-2">
                                {!! Form::select('country_id[]', ['' => __('Select Country')]+$countries,
                                Request::get('country_id', $siteSetting->default_country_id),
                                array('class'=>'form-control', 'id'=>'country_id')) !!}
                            </div>
                            @endif

                            <div class="col-md-2">
                                <span id="state_dd">
                                    {!! Form::select('state_id[]', ['' => __('Select State')], Request::get('state_id',
                                    null), array('class'=>'form-control', 'id'=>'state_id')) !!}
                                </span>
                            </div>
                            <div class="col-md-2">
                                <span id="city_dd">
                                    {!! Form::select('city_id[]', ['' => __('Select City')], Request::get('city_id',
                                    null), array('class'=>'form-control', 'id'=>'city_id')) !!}
                                </span>
                            </div>
                            <div class="col-md-1">
                                <button type="submit" class="btn"><i class="fa fa-search"
                                        aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
<!-- Page Title end -->
<!-- </form> -->


<!-- SEARCH STICKY -->
<div class="page-heading-tool job-detail ">
    <div class="container">
        <div class="tool-wrapper">
            <div class="search-job">
                <div class="form-horizontal">
                    <div class="form-wrap">
                        <div class="form-group form-keyword">
                            <input type="search" class="keyword form-control" id="search" name="search" placeholder="{{__('Skills or Job Titles')}}" autocomplete="off">
                        </div>
                        <div class="form-group form-select-chosen" id="functional_area_dd">
                            <select class="form-control form-select" name="functional_area_id" id="functional_area">
                                <option value="">Chọn phòng ban</option>
                                <option value="Nhân sự">Nhân sự</option>
                                <option value="Hành chính">Hành chính</option>
                                <option value="Kế toán">Kế toán</option>
                            </select>
                        </div>
                        <div class="form-group form-select-chosen" id="city_dd2">
                            <select class="form-control form-select" name="city_id" id="city">
                                <option value="">Chọn địa điểm</option>
                                <option value="3">HCM</option>
                                <option value="5">Hà Nội</option>
                                <option value="5">Đà Nẵng</option>
                            </select>
                        </div>
                        <div class="form-group form-submit">
                            <button class="btn-gradient" type="submit">
                                Tìm kiếm
                            </button>
                        </div>

                    </div>
                </div>
            </div>
            <div class="mobile-filter toollips">
                <button type="button" class="btn btn-filter" id="atcFilters" title="Lọc">
                    <i class="far fa-filter"></i> Lọc
                </button>
            </div>
        </div>
    </div>
</div>

<!-- SEARCH STICKY Mobile-->

<div class="page-heading-tool job-detail mobile">
    <div class="container">
        <div class="tool-wrapper">
            <div class="search-job">
                <div class="form-horizontal">
                    <div class="form-wrap">
                        <div class="form-group form-keyword">
                            <input type="search" class="keyword form-control" id="search" name="search" placeholder="{{__('Skills or Job Titles')}}" autocomplete="off">
                        </div>
                        <div class="form-group form-submit">
                            <button class="btn-gradient" type="submit">
                                Tìm kiếm
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mobile-filter toollips">
                <button type="button" class="btn btn-filter" id="#atcFilters-mobile" title="Lọc" onclick="openFilterJob_mobile()">
                    <i class="far fa-filter"></i> Lọc
                </button>
            </div>
        </div>
    </div>
</div>

<!-- SEARCH ADVANDCE STICKY -->
<div class="filters-job-wrapper job-detail">
    <div class="container">
        <div class="filters-wrapper">
            <form action="{{route('job.list')}}" method="get">
                <div class="row">
                    <div class="col-sm-6 col-lg-2">
                        <div class="form-group form-select">
                            <label>Theo thành phố</label>
                            <select class="form-control form-select" name="salary" id="salary">
                                <option value="">Tất cả</option>
                                <option value="3"> TP. Hồ Chí Minh</option>
                                <option value="5">Đồng Nai</option>
                                <option value="5">Hà Giang</option>

                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="form-group" id="degree_level_dd">
                            <label>Theo kinh nghiệm</label>
                            <select class="form-control form-select" id="level" name="level">
                                <option value="">Tất Cả</option>
                                <option value="5" data-id="1">
                                    5 năm
                                </option>
                                <option value="1" data-id="2">
                                    1 năm
                                </option>

                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="form-group" id="job_type_dd">
                            <label>Theo ngành</label>
                            <select class="form-control form-select" name="job_type" id="job_type">
                                <option value="">Tất cả</option>
                                <option data-id="Hành Chính / Nhân Sự" value="nhan-vien-chinh-thuc_1000">
                                    Hành Chính / Nhân Sự
                                </option>
                                <option data-id="IT" value="tam-thoi-du-an_0100">
                                    Công Nghệ Thông Tin (IT)
                                </option>
                                <option data-id="Xuất Nhập Khẩu" value="tam-thoi-du-an_0100">
                                    Xuất Nhập Khẩu
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="form-group form-group-custom-multiselect" id="benefit_id_dd">
                            <label>Theo kỹ năng</label>
                            <select class="form-control form-select shadow-sm multiselect" name="benefit_id" id="benefit" multiple>
                                <option value="">Tất Cả</option>
                                <option value="Nhân sự"> Word</option>
                                <option value="Hành chính"> Photoshop</option>
                                <option value="Kế toán"> Access</option>
                                <option value="Kế toán"> Excel</option>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="close-filter-box">
                    <div class="close-input-filter">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-lg-2">
                        <div class="form-group form-select">
                            <label>Theo cấp bậc</label>
                            <select class="form-control form-select" name="salary" id="salary">
                                <option value="">Tất cả</option>
                                <option value="3">Nhân viên</option>
                                <option value="5">Trưởng nhóm/Giám sát</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="form-group" id="degree_level_dd">
                            <label>Theo giới tính</label>
                            <select class="form-control form-select" id="level" name="level">
                                <option value="">Tất Cả</option>
                                <option value="Nam" data-id="1">
                                    Nam
                                </option>
                                <option value="Nữ" data-id="2">
                                    Nữ
                                </option>

                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="form-group" id="job_type_dd">
                            <label>Lương</label>
                            <select class="form-control form-select" name="salary" id="salary">
                                <option value="">Tất cả</option>
                                <option value="3">Từ 3.000.000 đ</option>
                                <option value="5">Từ 5.000.000 đ</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="form-group form-group-custom-multiselect" id="benefit_id_dd">
                            <label>Chọn phúc lợi mong muốn</label>
                            <select class="form-control form-select shadow-sm multiselect" name="benefit_id" id="benefit" multiple>
                                <option value="">Chọn phòng ban</option>
                                <option value="Nhân sự">Nhân sự</option>
                                <option value="Hành chính">Hành chính</option>
                                <option value="Kế toán">Kế toán</option>
                            </select>
                        </div>
                    </div>


                </div>
            </form>
        </div>
    </div>
</div>


<div class="filters-job-wrapper-mobile job-detail">
    <div class="container">
        <div class="close-filter-box-mobile" onclick="closeFilterJob_mobile()">
            <div class="close-input-filter-mobile">
                <i class="fa fa-times" aria-hidden="true"></i>
            </div>
        </div>
        <div class="filters-wrapper">
            <form action="{{route('job.list')}}" method="get">
                <div class="row">
                    <div class="col-sm-6 col-lg-2">
                        <div class="form-group form-keyword">
                            <input type="search" class="keyword form-control" id="search" name="search" placeholder="{{__('Skills or Job Titles')}}" autocomplete="off">
                        </div>
                    </div>


                    <div class="col-sm-6 col-lg-2">
                        <div class="form-group form-select-chosen" id="functional_area_dd">
                            <select class="form-control form-select" name="functional_area_id" id="functional_area">
                                <option value="">Chọn phòng ban</option>
                                <option value="Nhân sự">Nhân sự</option>
                                <option value="Hành chính">Hành chính</option>
                                <option value="Kế toán">Kế toán</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-2">
                        <div class="form-group form-select-chosen" id="city_dd2">
                            <select class="form-control form-select" name="city_id" id="city">
                                <option value="">Chọn địa điểm</option>
                                <option value="3">HCM</option>
                                <option value="5">Hà Nội</option>
                                <option value="5">Đà Nẵng</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-2">
                        <div class="form-group form-select-chosen">
                            <label>Lương</label>
                            <select class="form-control form-select" name="salary" id="salary">
                                <option value="">Tất cả</option>
                                <option value="3">Từ 3.000.000 đ</option>
                                <option value="5">Từ 5.000.000 đ</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="form-group" id="degree_level_dd">
                            <label>Cấp bậc</label>
                            <select class="form-control form-select" id="level" name="level">
                                <option value="">Tất cả</option>
                                <option value="sinh-vien-thuc-tap-sinh_1" data-id="1">
                                    Sinh viên/ Thực tập sinh
                                </option>
                                <option value="moi-tot-nghiep_2" data-id="2">
                                    Mới tốt nghiệp
                                </option>
                                <option value="nhan-vien_3" data-id="3">
                                    Nhân viên
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="form-group" id="job_type_dd">
                            <label>Hình thức việc làm</label>
                            <select class="form-control form-select" name="job_type" id="job_type">
                                <option value="">Tất cả</option>
                                <option data-id="1000" value="nhan-vien-chinh-thuc_1000">
                                    Nhân viên chính thức
                                </option>
                                <option data-id="0100" value="tam-thoi-du-an_0100">
                                    Tạm thời/Dự án
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="form-group form-group-custom-multiselect" id="benefit_id_dd">
                            <label>Chọn phúc lợi mong muốn</label>
                            <select class="form-control form-select shadow-sm multiselect" name="benefit_id" id="benefit" multiple>
                                <option value="">Chọn phòng ban</option>
                                <option value="Nhân sự">Nhân sự</option>
                                <option value="Hành chính">Hành chính</option>
                                <option value="Kế toán">Kế toán</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-lg-2">
                        <div class="form-group">
                            <label>Theo cấp bậc</label>
                            <select class="form-control form-select" name="salary" id="salary">
                                <option value="">Tất cả</option>
                                <option value="3">Nhân viên</option>
                                <option value="5">Trưởng nhóm/Giám sát</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="form-group" id="degree_level_dd">
                            <label>Theo giới tính</label>
                            <select class="form-control form-select" id="level" name="level">
                                <option value="">Tất Cả</option>
                                <option value="Nam" data-id="1">
                                    Nam
                                </option>
                                <option value="Nữ" data-id="2">
                                    Nữ
                                </option>

                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="form-group" id="job_type_dd">
                            <label>Lương</label>
                            <select class="form-control form-select" name="salary" id="salary">
                                <option value="">Tất cả</option>
                                <option value="3">Từ 3.000.000 đ</option>
                                <option value="5">Từ 5.000.000 đ</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="form-group form-group-custom-multiselect" id="benefit_id_dd">
                            <label>Chọn phúc lợi mong muốn</label>
                            <select class="form-control form-select shadow-sm multiselect" name="benefit_id" id="benefit" multiple>
                                <option value="">Chọn phòng ban</option>
                                <option value="Nhân sự">Nhân sự</option>
                                <option value="Hành chính">Hành chính</option>
                                <option value="Kế toán">Kế toán</option>
                            </select>
                        </div>
                    </div>


                </div>

                <div class="row">
                    <div class="form-group form-submit">
                        <button class="btn btn-primary" type="submit">
                            Tìm kiếm
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>



<div class="listpgWraper Jobpage">
    <div class="container">

        <form action="{{route('job.seeker.list')}}" method="get">
            <!-- Search Result and sidebar start -->
            <div class="row">

                <div class="col-lg-9">
                    <!-- Search List -->
                    <ul class="searchList">
                        <!-- job start -->
                        @if(isset($jobSeekers) && count($jobSeekers))
                        @foreach($jobSeekers as $jobSeeker)
                        <li>
                            <div class="row">
                                <div class="col-lg-8 col-md-8">
                                    <div class="jobimg">{{$jobSeeker->printUserImage(100, 100)}}</div>
                                    <div class="jobinfo">
                                        <h3><a href="{{route('user.profile', $jobSeeker->id)}}">{{$jobSeeker->getName()}}</a>
                                        </h3>
                                        <div class="location"> {{$jobSeeker->getLocation()}}</div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="listbtn"><a href="{{route('user.profile', $jobSeeker->id)}}">{{__('View Profile')}}</a>
                                    </div>
                                </div>
                            </div>
                            <p>{{\Illuminate\Support\Str::limit(strip_tags($jobSeeker->getProfileSummary('summary')),150,'...')}}
                            </p>
                        </li>
                        <!-- job end -->
                        @endforeach
                        @endif
                    </ul>

                    <!-- Pagination Start -->
                    <div class="pagiWrap">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="showreslt">
                                    {{__('Showing Pages')}} : {{ $jobSeekers->firstItem() }} -
                                    {{ $jobSeekers->lastItem() }} {{__('Total')}} {{ $jobSeekers->total() }}
                                </div>
                            </div>
                            <div class="col-md-7 text-right">
                                @if(isset($jobSeekers) && count($jobSeekers))
                                {{ $jobSeekers->appends(request()->query())->links() }}
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- Pagination end -->
                    <!-- <div class=""><br />{!! $siteSetting->listing_page_horizontal_ad !!}</div> -->

                </div>
                <div class="col-lg-3">
                    <!-- Sponsord By -->
                    <div class="sidebar" bis_skin_checked="1">
                        <div id="adbanner" class="carousel slide" data-ride="carousel" bis_skin_checked="1">

                            <!-- Indicators -->

                            <!-- The slideshow -->
                            <div class="carousel-inner" bis_skin_checked="1">

                                <div class="col" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="item" bis_skin_checked="1">
                                            <div class="image loadAds" bis_skin_checked="1">
                                                <a href="#">
                                                    <img src="https://media.istockphoto.com/id/1312091473/vector/we-are-hiring-banner-with-megaphone-flat-illustration.jpg?s=612x612&amp;w=0&amp;k=20&amp;c=03ytHwFjPHCCIIAxR-hplKCQQNFWgZSMUg2HDJ_xTZQ=" alt="#">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" bis_skin_checked="1">
                                        <div class="item" bis_skin_checked="1">
                                            <div class="image loadAds" bis_skin_checked="1">
                                                <a href="#">
                                                    <img src="https://img.freepik.com/free-vector/man-search-hiring-job-online-from-laptop_1150-52728.jpg" alt="#">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" bis_skin_checked="1">
                                        <div class="item" bis_skin_checked="1">
                                            <div class="image loadAds" bis_skin_checked="1">
                                                <a href="#">
                                                    <img src="https://media.istockphoto.com/id/1173054931/photo/jobs-text-on-wooden-blocks-over-keyboard.jpg?s=612x612&amp;w=0&amp;k=20&amp;c=1d3E26tHR7Yf7AUuGomDISXZTQ_u8PxizqTvo3bvSTY=" alt="#">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" bis_skin_checked="1">
                                        <div class="item" bis_skin_checked="1">
                                            <div class="image loadAds" bis_skin_checked="1">
                                                <a href="#">
                                                    <img src="https://elca.vietnamworks.com/assets/images/page/banner/cover.png?r=1689852315" alt="#">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Left and right controls -->
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@include('templates.vietstar.includes.footer')
@endsection
@push('styles')
<style type="text/css">
    .searchList li .jobimg {
        min-height: 80px;
    }

    .hide_vm_ul {
        height: 100px;
        overflow: hidden;
    }

    .hide_vm {
        display: none !important;
    }

    .view_more {
        cursor: pointer;
    }
</style>
@endpush
@push('scripts')
<script>
    $(document).ready(function($) {
        $("form").submit(function() {
            $(this).find(":input").filter(function() {
                return !this.value;
            }).attr("disabled", "disabled");
            return true;
        });
        $("form").find(":input").prop("disabled", false);

        $(".view_more_ul").each(function() {
            if ($(this).height() > 100) {
                $(this).addClass('hide_vm_ul');
                $(this).next().removeClass('hide_vm');
            }
        });
        $('.view_more').on('click', function(e) {
            e.preventDefault();
            $(this).prev().removeClass('hide_vm_ul');
            $(this).addClass('hide_vm');
        });

    });
</script>
@include('templates.vietstar.includes.country_state_city_js')
@endpush