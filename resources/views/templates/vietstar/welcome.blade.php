@extends('templates.vietstar.layouts.app')
@section('content')
<!-- Header start -->
@include('templates.vietstar.includes.header')
@include('templates.vietstar.includes.user_dashboard_menu')
<!-- Header end -->


<!-- Dashboard menu start -->
@include('templates.vietstar.includes.user_dashboard_menu')
<!-- Dashboard menu end -->
<!-- Search start -->
@include('templates.vietstar.includes.search')
<!-- Search End -->

<!-- Top Employers start -->
@include('templates.vietstar.includes.home_top_partners')
<!-- Top Employers end -->

<!-- advertising_banner -->
@include('templates.vietstar.includes.banner')
<!-- advertising_banner -->

<!-- Home job list start -->
@include('templates.vietstar.includes.home_job_list')
<!-- Home job list end -->


<!-- Việc làm theo lĩnh vực -->
@include('templates.vietstar.includes.home_jobs_by_industry')
<!-- Việc làm theo lĩnh vực End -->



<!-- advertising_banner -->
@include('templates.vietstar.includes.advertising_banner')
<!-- advertising_banner -->


<!-- Thống kê việc làm theo ngành nghề -->
@include('templates.vietstar.includes.section-employment-statistics')
<!-- Thống kê việc làm theo ngành nghề -->


<!-- Đăng ký nhận việc làm mới và phù hợp -->
<section class="section-register-new-jobs" style="background-image: url({{ asset('/vietstar/imgs') }}/banner-register-new-jobs.jpg);">
    <div class="container">@include('flash::message')
        {{--<form action="{{ route('contact-job') }}" method="post">--}}
        @csrf
        <h3 class="title white">
            Đăng ký theo dõi để cập nhật về cơ hội việc làm mới và phù hợp nhất

        </h3>
        <div class="form-group-mail">
            <input type="email" name="email" class="form-control" placeholder="Nhập địa chỉ email của bạn">
            <button type="submit" class="btn btn-register-now" id="btn-register-now">Đăng ký ngay</button>
        </div>
        {{--</form>--}}
    </div>
</section>
<!-- ./Đăng ký nhận việc làm mới và phù hợp -->

<!-- About us -->
<section class="about-us section-static d-none">
    <div class="about-us-bg" style="background-image: url({{ asset('/vietstar/imgs') }}/officers.jpeg);"></div>
    <div class="content">
        <h2 class=section-title>Về chúng tôi</h2>

        <ul class="list-about-us">
            <li class="item">
                Jobvieclam là website dành cho nhà tuyển dụng và người tìm việc.
            </li>
            <li class="item">
                Chúng tôi còn là đơn vị cung ứng nhân sự (headhunt) cho các doanh nghiệp.
            </li>
            <li class="item">
                Chúng tôi sở hữu đội ngũ chuyên viên tuyển dụng có nhiều kinh nghiệm, năng động và nhiệt huyết.
            </li>
            <li class="item">
                Hàng ngàn nhà tuyển dụng đã tin dùng dịch vụ của chúng tôi.
            </li>
            <li class="item">
                Hàng triệu người tìm việc đã tìm được công việc phù hợp.
            </li>
        </ul>
    </div>
</section>

<!-- Product and service -->
@include('templates.vietstar.includes.all_product_service')
<!-- <section class="for-recruiter main-bg section-for-recruiter section-static">
    <div class="container">
        <div class="inner-content d-flex justify-content-between">
            <div class="my-content">
                <h2 class="section-title">{{ __('Đối tác của chúng tôi') }}</h2>
                <p>Chúng tôi có những giải pháp tối ưu phù hợp với nhiều loại hình công ty và tiêu chuẩn riêng</p>
            </div>
            <div class="my-auto">
                <a href="{{ route('post.job') }}" class="btn btn-outline-reverse"><i class="fa fa-desktop mr-2" aria-hidden="true"></i>{{__('Post Job')}}
                    </a>
                
            </div>
        </div>
    </div>
</section> -->



<!-- Testimonials start -->
@include('templates.vietstar.includes.home_blogs')
<!-- Testimonials End -->


@include('templates.vietstar.includes.footer')
@endsection
@push('styles')
<link rel="stylesheet" href="{{ asset('/vietstar/css/chosen/chosen.min.css')}}">
{{-- toastr css --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
@endpush
@push('scripts')
<script src="{{ asset('/vietstar/js/chosen/chosen.jquery.min.js')}}"></script>
{{-- toastr js --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
<script>

</script>
{{-- @include('templates.vietstar.includes.country_state_city_js') --}}
@endpush