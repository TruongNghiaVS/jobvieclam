@extends('templates.vietstar.layouts.app')

@section('content') 

<!-- Header start --> 

@include('templates.vietstar.includes.header') 

<!-- Header end --> 

<!-- Inner Page Title start --> 



<!-- Inner Page Title end -->

<div class="user-wrapper listpgWraper">

            @include('flash::message')
            @include('templates.vietstar.includes.company_dashboard_menu')
        @include('templates.vietstar.includes.mobile_dashboard_menu')

            <div class="content">

                @include('templates.vietstar.includes.company_application_manager_filter')
                
                @include('templates.vietstar.includes.company_application_manager')
               
            </div>
</div>
@include('templates.vietstar.includes.company_application_manager_modal')
@include('templates.vietstar.includes.footer')

@endsection

@push('scripts')

@include('templates.vietstar.includes.immediate_available_btn')

@endpush

