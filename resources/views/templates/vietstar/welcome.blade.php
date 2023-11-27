@extends('templates.vietstar.layouts.app')
@section('content')

@include('templates.vietstar.includes.header')

<!-- Dashboard menu start -->
@include('templates.vietstar.includes.mobile_dashboard_menu')
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
<section class="section-register-new-jobs"
    style="background-image: url({{ asset('/vietstar/imgs') }}/banner-register-new-jobs.jpg);">
    <div class="container">@include('flash::message')
        <form id="form-group-mail"  class="form-horizontal needs-validation" novalidate>
     
        <h3 class="title white">
            Đăng ký theo dõi để cập nhật về cơ hội việc làm mới và phù hợp nhất
        </h3>
        <div class="d-flex justify-content-center  align-items-start">

            <div class="formrow{{ $errors->has('email') ? ' has-error' : '' }} w-50">
                    <input id="email" type="email" class="form-control w-100" name="email" value="{{ old('email') }}" required placeholder="{{__('Email Address')}}">
                    <div class="invalid-feedback email-error">
                            {{__('Email is required')}}
                    </div>  
                             
                
            </div>
            <div class="formrow{{ $errors->has('email') ? ' has-error' : '' }}">
                    <button type="submit" class="btn btn-primary" id="btn-register-now">Đăng ký ngay</button>
                    <div class="invalid-feedback email-error">
                        
                    </div>            
            </div>
           
        </div>
        </form>
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
{{-- @include('templates.vietstar.includes.all_product_service') --}}
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


<div class="modal fade" id="contact_email_success" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary d-flex justify-content-center">
                        <h5 class="m-0 text-white">{{__('Alert')}}</h5>
                     </div>
					
                    <div class="modal-body">
                     
                        <div class="thank-you-pop">
							<img src="http://goactionstations.co.uk/wp-content/uploads/2017/03/Green-Round-Tick.png" alt="">
                            <p class="text-center">
                                Cảm ơn bạn đã liên hệ với chúng tôi.
                            </p>
                            <p class="text-center">
                               Hệ thống đã nghi nhận mail của bạn.
                            </p>
 						</div>
                         <div class="d-flex justify-content-center">
                                <button type="button" class="btn btn-primary btn-lg btn-block" data-dismiss="modal">{{__('Close')}}</button>
                        </div>
                    </div>
        </div>
    </div>
</div>


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

(function () {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
        .forEach(function (form) {
        form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
            }
            form.classList.add('was-validated')
        }, false)
        })
    })()
$(document).ready(function() {
    $('#form-group-mail').submit(function(event) {
        var isValid = true;
        event.preventDefault()
        
        // Check each input field for emptiness
        $('#form-group-mail input').each(function() {
            if (!$(this).val()) {
                isValid = false;
                $(this).addClass('is-invalid');
              
            }
        });

        $("#form-group-mail").find(":input").prop("disabled", false);


        var email = $('#email').val();

        // Simple email validation using a regular expression
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (emailRegex.test(email)) {
            // Email is valid
            $('#email').removeClass('is-invalid');
            $('#email').addClass('is-valid');

           
        } else {
            // Email is invalid
           
            $('#email').removeClass('is-valid');
            $('#email').addClass('is-invalid');
            $('.email-error').text('{{__('The email must be a valid email address')}}')
        }


        isValid = this.checkValidity();


        if (!isValid) {
            event.preventDefault(); // Prevent the form from submitting
        }

        if (isValid) { 

            var email = $('#form-group-mail #email').val();
     
            
            $.ajax({
            type: "POST",
            url:  `{{ route('contact-email') }}`,
            datatype:"JSON",
            data: {
                email:email,
            },
            statusCode: {
                202 :  function(responseObject, textStatus, jqXHR) {
                    console.log(responseObject.error);
        
                },
                401: function(responseObject, textStatus, jqXHR) {
                    // No content found (404)
                    console.log(responseObject.responseJSON);
                    
                    // This code will be executed if the server returns a 404 response
                },
                503: function(responseObject, textStatus, errorThrown) {
                    // Service Unavailable (503)
                    console.log(responseObject.error);

                    // This code will be executed if the server returns a 503 response
                }           
                }
                })
                .done(function(data){
                    $("#contact_email_success").modal("show")
                    
                    $('#form-group-mail')[0].reset();
                    $('#form-group-mail').removeClass("was-validated")
                   
                    


                    setTimeout(()=>{
                        $("#contact_email_success").modal("hide")

                    },3000)
                    
                })
                .fail(function(jqXHR, textStatus){
                    
                })
                .always(function(jqXHR, textStatus) {
                
                });
           
    }
    
     

        // Remove validation class on input change
        $('#form-group-mail input').on('input', function() {
            $(this).removeClass('is-invalid');
        });
});
});




$(document).ready(function($) {
    @if(Session::has('success'))
    toastr.success(`{{ Session::get('success')}}`);
    @endif
    @if(count($errors) > 0)
    @foreach($errors -> all() as $error)
    toastr.error("{{$error}}");
    @endforeach
    @endif
    /*$("form").submit(function() {
        $(this).find(":input").filter(function() {
            return !this.value;
        }).attr("disabled", "disabled");
        return true;
    });
    $("form").find(":input").prop("disabled", false);*/

    $('body').on('keyup', '#search', function() {
        var search = $(this).val();
        if (search != '') {
            $.ajax({
                url: "{{ route('job.search') }}",
                type: "POST",
                data: {
                    search: search,
                    '_token': '{{ csrf_token() }}'
                },
                success: function(data) {
                    $("#suggesstion-box").show();
                    $("#suggesstion-box").html(data);
                    $("#search-box").css("background", "#FFF");
                }
            });
        }
    }).on('mouseout', '#search', function() {
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


</script>
{{-- @include('templates.vietstar.includes.country_state_city_js') --}}
@endpush