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
                            <button class="btn btn-large btn-success" onclick="acceptjob()" type="button">Duyệt </button> 
                            </div>

                            <div class="item" bis_skin_checked="1">
                            <button class="btn btn-large btn-danger" onclick="rejectJob()" type="button">Từ chối </button>
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

    <div class="modal fade" id="accept-job" tabindex="-1" role="dialog" aria-labelledby="accept-jobLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="accept-jobLabel">Duyệt JOB</h5>
       
      </div>
      <div class="modal-body">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        <button type="button" id="accept"  class="btn btn-primary">Duyệt</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="reject-job-modal" tabindex="-1" role="dialog" aria-labelledby="reject-job-jobLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="reject-job-jobLabel">Từ chối JOB</h5>
       
      </div>
      <div class="modal-body">
            <form id="reject-job-form" action="">
                    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'reject') !!}">
                        {!! Form::label('reject', 'Lý do', ['class' => 'bold']) !!}
                        {!! Form::textarea('reject', null, array('class'=>'form-control', 'id'=>'reject', 'placeholder'=>'Lý do từ chối')) !!}
                        {!! APFrmErrHelp::showErrors($errors, 'description') !!}
                    </div>

            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        <button type="button" id="reject-btn"  class="btn btn-primary">Từ chối</button>
      </div>
    </div>
  </div>
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


@push('scripts')
    <script>
   function acceptjob(id,status){
        console.log(id,status);
        $('#accept-job').modal('show');
        $('#accept-job #accept').on('click',()=>{
            $.post("/job/changeStatus", {id: id, status: "4", _method: 'POST', _token: '{{ csrf_token() }}'})
                    .done(function (response) {
                        if (response == 'ok')
                        {
                           alert("ok");
                        } else
                        {
                            alert('Request Failed!');
                        }
                    });
        })
    }


    function rejectJob(){
        $('#reject-job-modal').modal('show');
       
       
    }

    
</script>
@endpush