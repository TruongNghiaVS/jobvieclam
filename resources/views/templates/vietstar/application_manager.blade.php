@extends('templates.vietstar.layouts.app')

@section('content') 


<!-- Header start -->
@if(Auth::check())
@include('templates.vietstar.includes.header')
<!-- Header end -->
@else
@include('templates.employers.includes.header')
@endif

<!-- Inner Page Title start --> 

@include('templates.employers.includes.company_dashboard_menu') 


<!-- Inner Page Title end -->
<div class="company-wrapper">

            @include('flash::message')
             
            @include('templates.employers.includes.mobile_dashboard_menu')

            <div class="container company-content">

                @include('templates.employers.includes.company_application_manager_filter')
                
                @include('templates.employers.includes.company_application_manager')
               
            </div>
</div>
@include('templates.employers.includes.company_application_manager_modal')
@include('templates.employers.includes.footer')

@endsection

@push('scripts')

@include('templates.employers.includes.immediate_available_btn')

@endpush

