@extends('templates.vietstar.layouts.app')
@section('content') 
<!-- Header start --> 
@include('templates.vietstar.includes.header') 
<!-- Header end --> 

<div class="user-wrapper">
    
             
            @include('templates.vietstar.includes.mobile_dashboard_menu')
    
</div>
@include('templates.vietstar.includes.footer')
@endsection
@push('styles')
<style type="text/css">
    .userccount p{ text-align:left !important;}
</style>
@endpush
