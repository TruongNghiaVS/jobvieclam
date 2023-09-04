@extends('templates.vietstar.layouts.app')

@section('content') 

<!-- Header start --> 

@include('templates.vietstar.includes.header') 

<!-- Header end --> 

<!-- Inner Page Title start --> 

@include('templates.vietstar.includes.inner_page_title', ['page_title'=>__('Dashboard')]) 

<!-- Inner Page Title end -->

<div class="listpgWraper">

    <div class="container">@include('flash::message')

        <div class="row"> 
            
            @include('templates.vietstar.includes.company_dashboard_menu')

            <div class="col-lg-9">

                @include('templates.vietstar.includes.company_application_manager_filter')
                
                @include('templates.vietstar.includes.company_application_manager')
               
            </div>

        </div>

    </div>

</div>
@include('templates.vietstar.includes.company_application_manager_modal')
@include('templates.vietstar.includes.footer')

@endsection

@push('scripts')

@include('templates.vietstar.includes.immediate_available_btn')

@endpush

