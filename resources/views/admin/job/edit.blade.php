@extends('admin.layouts.admin_layout')
@section('content')
<div class="page-content-wrapper"> 
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content"> 
        <!-- BEGIN PAGE HEADER--> 
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li> <li> <a href="{{ route('admin.home') }}">{{__('Home')}}</a> <i class="fa fa-circle"></i> </li>
                <li> <a href="{{ route('list.jobs') }}">{{__('Jobs')}}</a> <i class="fa fa-circle"></i> </li>
                <li> <span>{{__('Edit Job')}}</span> </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->        
        <!-- END PAGE HEADER-->
        <br />
        @include('flash::message')
        <div class="row">
            <div class="col-md-12">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-red-sunglo"> <i class="icon-settings font-red-sunglo"></i> <span class="caption-subject bold uppercase">{{__('Job Form')}}</span> </div>
                    </div>
                    <div class="portlet-body form">          
                        {!! Form::model($job, array('method' => 'put', 'route' => array('update.job', $job->id), 'class' => 'form', 'files'=>true)) !!}
                        {!! Form::hidden('id', $job->id) !!}   
                        <div class="button-group">
                        <div class="button-group" bis_skin_checked="1">
                            <div class="item" bis_skin_checked="1">
                            <button class="btn btn-large btn-primary" type="submit">Cập nhật </button>
                            </div>
                            <div class="item" bis_skin_checked="1">
                            <button class="btn btn-large btn-success" type="button">Duyệt </button> 
                            </div>

                            <div class="item" bis_skin_checked="1">
                            <button class="btn btn-large btn-danger" type="button">Từ chối </button>
                            </div>
                        </div>
                        </div>     
                        <ul class="nav nav-tabs">              
                            <li class="active"> <a href="#Details" data-toggle="tab" aria-expanded="false">{{__('Details')}}</a> </li>
                        </ul>
                        <div class="tab-content">              
                            <div class="tab-pane fade active in" id="Details"> @include('admin.job.forms.form') </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        <!-- END CONTENT BODY --> 
    </div>
    @endsection
    @push('css')
<style type="text/css">
   .button-group {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        margin: 10px 0;
    }
    .button-group .item {
        margin: 0 10px;
    }





</style>
@endpush