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

        <div class="row"> @include('templates.vietstar.includes.company_dashboard_menu')

            <div class="col-md-9"> @include('templates.vietstar.includes.company_dashboard_stats')

        <?php

        if((bool)config('company.is_company_package_active')){        

        $packages = App\Package::where('package_for', 'like', 'employer')->get();

        $package = Auth::guard('company')->user()->getPackage();

        

        ?>


        <?php if(null !== $package){ ?>

        @include('templates.vietstar.includes.company_package_msg')

        @include('templates.vietstar.includes.company_packages_upgrade')

        <?php }elseif(null !== $packages){ ?>

        @include('templates.vietstar.includes.company_packages_new')

        <?php }} ?>

        </div>

        </div>

    </div>

</div>

@include('templates.vietstar.includes.footer')

@endsection

@push('scripts')

@include('templates.vietstar.includes.immediate_available_btn')

@endpush

