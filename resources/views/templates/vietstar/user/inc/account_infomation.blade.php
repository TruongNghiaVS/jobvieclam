<div class="section-head">
    <h5 class="title-form">{{__('Account Information')}}</h5>
</div>
<div class="section-body">
    <div class="row">
        <div class="col-md-6">
            <div class="formrow {!! APFrmErrHelp::hasError($errors, 'email') !!}">
                <label for="">{{__('Email')}}</label>
                {!! Form::text('email', null, array('class'=>'form-control', 'id'=>'email', 'placeholder'=>__('Email'))) !!}
                {!! APFrmErrHelp::showErrors($errors, 'email') !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="formrow {!! APFrmErrHelp::hasError($errors, 'password') !!}">
                <label for="">{{__('Password')}}</label>
                {!! Form::password('password', array('class'=>'form-control', 'id'=>'password',
                'placeholder'=>__('Password'))) !!}
                {!! APFrmErrHelp::showErrors($errors, 'password') !!}
            </div>
        </div>
    </div>
</div>