@extends('templates.vietstar.layouts.app')
@section('content')
<!-- Header start -->
@include('templates.vietstar.includes.header')

<!-- Header end --> 
<!-- Search start -->
@include('templates.vietstar.includes.search')
<!-- Search End --> 

<!-- Top Employers start -->
@include('templates.vietstar.includes.home_top_partners')
<!-- Top Employers end -->

<!-- Home job list start -->
@include('templates.vietstar.includes.home_job_list')
<!-- Home job list end --> 


<!-- Việc làm theo lĩnh vực -->
@include('templates.vietstar.includes.home_jobs_by_industry')
<!-- Việc làm theo lĩnh vực End --> 

<!-- Thống kê việc làm theo ngành nghề -->
<section class="section-employment-statistics">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="statistic">
                    <div class="icon">
                        <span class="iconmoon icon-recruiter-suitcase"></span>
                    </div>
                    <div class="content">
                        <h3 class="num">30.000+</h3>
                        <div class="desc">
                            Ứng viên đang bật tìm việc trung bình/ thời điểm.
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="statistic">
                    <div class="icon">
                        <span class="iconmoon icon-office-building-icon"></span>
                    </div>
                    <div class="content">
                        <h3 class="num">150.000+</h3>
                        <div class="desc">
                            Doanh nghiệp tuyển dụng sử dụng dịch vụ tuyển dụng hiệu quả của Jobvieclam.
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="statistic">
                    <div class="icon">
                        <span class="iconmoon icon-level-icon"></span>
                    </div>
                    <div class="content">
                        <h3 class="num">350.000+</h3>
                        <div class="desc">
                            Nhà tuyển dụng sử dụng thường xuyên để đăng tin tuyển dụng, tìm kiếm ứng viên tiềm năng chỉ với những thao tác đơn giản, nhanh gọn.
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="statistic">
                    <div class="icon">
                        <span class="iconmoon icon-recruiter-profile"></span>
                    </div>
                    <div class="content">
                        <h3 class="num">200.000+</h3>
                        <div class="desc">
                            Ứng viên tạo mới tài khoản trên Jobvieclam mỗi tháng.
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="statistic">
                    <div class="icon">
                        <span class="iconmoon icon-recruiter-search"></span>
                    </div>
                    <div class="content">
                        <h3 class="num">3.000.000+</h3>
                        <div class="desc">
                            Lượt ứng viên truy cập hàng tháng là một trong những trang tuyển dụng có lượt truy cập lớn nhất tại Việt Nam và tại thời điểm này.
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="statistic">
                    <div class="icon">
                        <span class="iconmoon icon-recruiter-total-employee"></span>
                    </div>
                    <div class="content">
                        <h3 class="num">5.000.000+</h3>
                        <div class="desc">
                            Ứng viên tiềm năng, trong đó có 60% là ứng viên có kinh nghiệm từ 2 năm trở lên.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
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
    $(document).ready(function ($) {
        @if(Session::has('success'))
            toastr.success('{{ Session::get('success') }}');
        @endif
        @if(count($errors) > 0)
            @foreach($errors->all() as $error)
                toastr.error("{{ $error }}");
            @endforeach
        @endif
        $("form").submit(function () {
            $(this).find(":input").filter(function () {
                return !this.value;
            }).attr("disabled", "disabled");
            return true;
        });
        $("form").find(":input").prop("disabled", false);

       $('body').on('keyup', '#search',function(){
            var search = $(this).val();
            if(search != ''){
                $.ajax({
                    url: "{{ route('job.search') }}",
                    type: "POST",
                    data: {search: search, '_token': '{{ csrf_token() }}'},
                    success: function (data) {
                        $("#suggesstion-box").show();
                        $("#suggesstion-box").html(data);
                        $("#search-box").css("background", "#FFF");
                    }
                });
            }
        }).on('mouseout', '#search', function(){
           if ($('#suggesstion-box:hover').length != 0) {
               $("#suggesstion-box").show();
           }
        });
        $(window).click(function() {
            $("#suggesstion-box").hide();
        });
        $('#city_id').chosen({
            allow_single_deselect: true,
            width: '100%'
        });
        $('#job_type_id').chosen({
            allow_single_deselect: true,
            width: '100%'
        });
        $('#career_level_id').chosen({
            allow_single_deselect: true,
            width: '100%'
        });
        $('#degree_level_id').chosen({
            allow_single_deselect: true,
            width: '100%'
        });
        $('#industry_id').chosen({
            allow_single_deselect: true,
            width: '100%'
        });
    });

    $(document).on('click', '#btn-register-now', function(){
        var email = $('input[name="email"]').val();
        var url = "{{ route('job-email-alert') . '?email=_email'}}";
        url = url.replace('_email', email);
        $.ajax({
            url: url,
            type: "GET",
            dataType: "json",
            beforeSend: function(){
            },
            success: function (data) {
                console.log(data);
                if(data.status == 'success'){
                    toastr.success(data.message);
                } else {
                    toastr.error(data.message);
                }
            }
        });
    });

</script>
{{-- @include('templates.vietstar.includes.country_state_city_js') --}}
@endpush
