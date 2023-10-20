@extends('templates.vietstar.layouts.app')
@section('content')
<!-- Header start -->
    @if(Auth::guard('company')->check())
    <!-- Header start -->
    @include('templates.employers.includes.header')
    <!-- Header end -->
    @else
    @include('templates.vietstar.includes.header')
    @endif
<!-- Header end -->

<!-- Dashboard menu start -->
@include('templates.vietstar.includes.mobile_dashboard_menu')
<!-- Dashboard menu end -->



<!-- Inner Page Title start -->

{{--
<!-- Inner Page Title end -->
<form id="job_filter" method="GET" action="{{route('company.listing')}}">
<div class="page-heading-tool company">
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
                                <option value="">Chọn ngành nghề</option>
                                <option value="IT">IT</option>
                                <option value="Tài Chính">Tài Chính</option>
                                <option value="Maketing">Maketing</option>
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

        </div>
    </div>
</div>

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


</form>--}}
{{--
<div class="company-wrapper">
    <div class="container">
        <div class="row compnaieslist">
            <div class="col-lg-9 col-sm-12">
                @if($companies)
                <div class="searchList jobs-side-list">
                    @foreach($companies as $company)

                    <div class="item-job mb-3">
                        <div class="logo-company">
                            <a href="{{route('company.detail',$company->slug)}}" title="{{$company->name}}" class="pic">
{{$company->printCompanyImage()}}
</a>
</div>
<div class="jobinfo">
    <div class="info">
        <h3 class="job-title"><a href="{{route('company.detail',$company->slug)}}" title="{{$company->name}}">{{$company->name}}</a></h3>
        <div class="box-meta">
            <i class="far fa-map-marker-alt"></i> {{__('Street Address')}}:
            {{$company->location}}
        </div>
        <div class="box-meta">
            <i class="fas fa-globe"></i> Website: {{$company->website}}
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="box-meta">
                    <i class="far fa-envelope"></i> Email: {{$company->email}}
                </div>
            </div>
            <div class="col-md-6">
                <div class="box-meta">
                    <i class="far icon-recruiter-phone-call"></i> {{__('Mobile Number')}}:
                    {{$company->phone}}
                </div>
            </div>
        </div>
    </div>
    @if(Auth::check() && Auth::user()->isFavouriteCompany($company->slug))
    <a class="save-company-favorite" href="{{ route('remove.from.favourite.company', ['company_slug' => $company->slug]) }}"><i class="fas fa-heart iconoutline"></i></a>
    @else
    <a class="save-company-favorite" href="{{ route('add.to.favourite.company', ['company_slug' => $company->slug]) }}"><i class="far fa-heart"></i></a>
    @endif

</div>

</div>
@endforeach
</div>
@endif
<div class="pagiWrap">
    <div class="row">
        <div class="col-md-5">
            <div class="showreslt">
                {{__('Hiển thị các trang')}} : {{ $companies->firstItem() }} -
                {{ $companies->lastItem() }}
                {{__('Total')}} {{ $companies->total() }}
            </div>
        </div>
        <div class="col-md-7 text-right">
            @if(isset($companies) && count($companies))
            {{ $companies->appends(request()->query())->links() }}
            @endif
        </div>
    </div>
</div>
</div>
<div class="col-lg-3 col-sm-6 pull-right">
    <!-- Sponsord By -->
    <div class="sidebar">
        <h4 class="widget-title">{{__('Sponsord By')}}</h4>
        <div class="gad">{!! $siteSetting->listing_page_vertical_ad !!}</div>
    </div>
</div>
</div>


</div>
</div> --}}


<div class="company-wrapper company-list-wrapper">
    <div class="container company-list-container">
        <div id="topcompanyhead" class="topcompanyhead">
            <h1>Khám Phá Văn Hoá Công Ty</h1>
            <p>Tìm hiểu văn hoá công ty và chọn cho bạn nơi làm việc phù hợp nhất.</p>
            <div class="topcompanyhead__search row">
                <div class="search-company col-6">

                    <div class="d-flex flex-row search__box">
                        <input type="search" class="" id="search" name="search" placeholder="{{__('Skills or Job Titles')}}" autocomplete="off">
                    </div>

                </div>
                <div class="col-6">
                        <button class="btn btn-primary" type="submit">
                            Tìm kiếm
                        </button>
                </div>
            </div>
        </div>

        <div id="bottomcompanycontent" class="bottomcompanycontent">
            <div class="bottomcompanyconten__head">
                <h2>Công ty nổi bật<!-- --> <span>(<!-- -->525<!-- -->)</span></h2>

                <div class="filter-company">
                    <div class="form-group form-select-chosen" id="functional_area_dd">
                        <select class="form-control form-select" name="functional_area_id" id="functional_area">
                            <option value="">Chọn phòng ban</option>
                            <option value="Nhân sự">Nhân sự</option>
                            <option value="Hành chính">Hành chính</option>
                            <option value="Kế toán">Kế toán</option>
                        </select>
                    </div>
                </div>
            </div>

            @if($companies)
            <div class="list-company hideContent">

                @foreach($companies as $company)
                <div class="company-item-wrapper">
                    <div class="company-item-header">
                        <div class="company-items__background">
                            <img class="background-img" src="https://www.vietnamworks.com/_next/image?url=https%3A%2F%2Fimages02.vietnamworks.com%2Fcompanyprofile%2Fnull%2Fen%2FB%C3%ACa_%C4%91%E1%BA%A7u_trang_-_Coverc.jpg&w=1920&q=75" alt="">
                        </div>
                        <a class="company-items__logo" href="#">
                            {{$company->printCompanyImage()}}
                        </a>
                        <div class="company-items__follower">
                            <span><i class="bi bi-people-fill"></i> 176 lượt theo dõi</span>
                        </div>
                    </div>

                    <div class="company-items__desc">
                        <div class="company-items__name">
                            <a href="{{route('company.detail',$company->slug)}}" title="{{$company->name}}">
                                <h3>
                                    {{$company->name}}
                                </h3>
                            </a>
                        </div>
                        <div class="company-items__category">
                            <i class="bi bi-folder2"></i>
                            <span>
                                Hàng tiêu dùng
                            </span>

                        </div>
                        <div class="company-items__category">

                            <i class="bi bi-archive"></i>
                            <span>
                                5 Việc làm
                            </span>

                        </div>

                    </div>

                    <div class="company-items__bottom">
                        @if(Auth::check() && Auth::user()->isFavouriteCompany($company->slug))
                        <a class="btn btn-outline-primary" href="{{ route('remove.from.favourite.company', ['company_slug' => $company->slug]) }}"><i class="fas fa-heart iconoutline"></i> Đã theo dõi</a>
                        @else
                        <a class="btn btn-outline-primary" href="{{ route('add.to.favourite.company', ['company_slug' => $company->slug]) }}"><i class="far fa-heart"></i> Theo dõi</a>
                        @endif
                    </div>

                </div>
                @endforeach
            </div>
            @endif
            <div class="show-more">
                <button class="btn btn-secondary show-more-btn ">Xem thêm</button>
            </div>
        </div>

    </div>
</div>

@include('templates.vietstar.includes.footer')
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
<script type="text/javascript">


    $(document).ready(function() {
        $(".show-more-btn").on("click", function() {
            var $this = $(this); 
            var $content = $this.parent().prev("div.list-company"); 
            $content.removeClass("hideContent");
            $content.addClass("showContent");
            $this.addClass("hide")
        });
    });



    $(document).ready(function() {
        // js chosen dropdown select
        $(".chosen").chosen();
        $(document).on('click', '#send_company_message', function() {
            var postData = $('#send-company-message-form').serialize();
            $.ajax({
                type: 'POST',
                url: "{{ route('contact.company.message.send') }}",
                data: postData,
                //dataType: 'json',
                success: function(data) {
                    response = JSON.parse(data);
                    var res = response.success;
                    if (res == 'success') {
                        var errorString = '<div role="alert" class="alert alert-success">' +
                            response.message + '</div>';
                        $('#alert_messages').html(errorString);
                        $('#send-company-message-form').hide('slow');
                        $(document).scrollTo('.alert', 2000);
                    } else {
                        var errorString = '<div class="alert alert-danger" role="alert"><ul>';
                        response = JSON.parse(data);
                        $.each(response, function(index, value) {
                            errorString += '<li>' + value + '</li>';
                        });
                        errorString += '</ul></div>';
                        $('#alert_messages').html(errorString);
                        $(document).scrollTo('.alert', 2000);
                    }
                },
            });
        });
    });
</script>
@endpush