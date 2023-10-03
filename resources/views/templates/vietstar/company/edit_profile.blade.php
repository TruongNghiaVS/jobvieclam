@extends('templates.vietstar.layouts.app')
@section('content') 
<!-- Header start --> 
@include('templates.vietstar.includes.header') 
<!-- Header end --> 
<!-- Inner Page Title start --> 

<!-- Inner Page Title end -->
<div class="user-wrapper listpgWraper">
            @include('templates.vietstar.includes.company_dashboard_menu')
        @include('templates.vietstar.includes.mobile_dashboard_menu')
            <div class="content"> 
                <div class="row">
                    <div class="col-md-12">
                        <div class="userccount">
                            <div class="formpanel-recuiter mt0"> @include('flash::message') 
                                <!-- Personal Information -->
                                @include(config('app.THEME_PATH').'.company.inc.profile')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
 
</div>
@include('templates.vietstar.includes.footer')
@endsection
@push('styles')
<style type="text/css">
    .userccount p{ text-align:left !important;}
</style>
@endpush