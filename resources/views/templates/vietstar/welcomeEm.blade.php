@extends('templates.vietstar.layouts.app')
@section('content')
<!-- Header start -->
@include('templates.employers.includes.header')
<!-- Header end -->


<!-- Dashboard menu start -->
@include('templates.employers.includes.mobile_dashboard_menu')
<!-- Dashboard menu end -->
<!-- Search start -->
@include('templates.employers.includes.search')
<!-- Search End -->

<!-- Thống kê việc làm theo ngành nghề -->
{{-- @include('templates.employers.includes.section-employment-statistics') --}}
<!-- Thống kê việc làm theo ngành nghề -->


<!-- Product and service -->
{{--@include('templates.vietstar.includes.all_product_service')--}}
<!-- Animation -->
<!-- <div class="wrapper">
    
    <div class="block animatable bounceIn">bounceIn</div>
    <div class="block animatable bounceInLeft">bounceInLeft</div>
    <div class="block animatable bounceInRight">bounceInRight</div>
    
    <div class="block animatable fadeIn">fadeIn</div>
    <div class="block animatable fadeInDown">fadeInDown</div>
    <div class="block animatable fadeInUp">fadeInUp</div>
    
    <div class="block animatable moveUp">moveUp</div>
    
    <div class="block animatable fadeBgColor">fadeBgColor</div>
</div> -->






@include('templates.employers.includes.footer')
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
$(document).ready(function($) {
    @if(Session::has('success'))
    toastr.success(`{{ Session::get('success')}}`);
    @endif
    @if(count($errors) > 0)
    @foreach($errors -> all() as $error)
    toastr.error("{{$error}}");
    @endforeach
    @endif
    $("form").submit(function() {
        $(this).find(":input").filter(function() {
            return !this.value;
        }).attr("disabled", "disabled");
        return true;
    });
    $("form").find(":input").prop("disabled", false);

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

$(document).on('click', '#btn-register-now', function() {
    var email = $('input[name="email"]').val();
    var url = "{{ route('job-email-alert') . '?email=_email'}}";
    url = url.replace('_email', email);
    $.ajax({
        url: url,
        type: "GET",
        dataType: "json",
        beforeSend: function() {},
        success: function(data) {
            console.log(data);
            if (data.status == 'success') {
                toastr.success(data.message);
            } else {
                toastr.error(data.message);
            }
        }
    });
});
</script>
{{-- @include('templates.employers.includes.country_state_city_js') --}}
@endpush