@extends('templates.vietstar.layouts.app')
@section('content')

@include('templates.vietstar.includes.header')



@include('templates.vietstar.includes.mobile_dashboard_menu')
<div class="user-wrapper">
    @include('flash::message')
    @include('templates.vietstar.includes.default_sidebar_menu')
    @include('templates.vietstar.includes.user_dashboard_content')
</div>
@include('templates.vietstar.includes.footer')
@endsection
@push('scripts')
@include('templates.vietstar.includes.immediate_available_btn')
@endpush