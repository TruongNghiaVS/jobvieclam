@extends('templates.vietstar.layouts.app')
@section('content') 
<!-- Header start --> 
@include('templates.vietstar.includes.header') 
<!-- Header end --> 

<div class="user-wrapper listpgWraper">     
            @include('templates.vietstar.includes.company_dashboard_menu')
            <div class="content"> 
                <div class="row">
                    <div class="col-md-12">
                        <div class="userccount">
                            <div class="formpanel-recuiter"> @include('flash::message')
                                @include('templates.vietstar.job.inc.job')
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
