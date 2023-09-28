<h5 class="title-form">{{__('Personal Information')}}</h5>
<div class="row">
    <div class="col-md-6">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'first_name') !!}">
            <label for="">{{__('First Name')}}</label>
            {!! Form::text('first_name', null, array('class'=>'form-control', 'id'=>'first_name',
            'placeholder'=>__('First Name'))) !!}
            {!! APFrmErrHelp::showErrors($errors, 'first_name') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'middle_name') !!}">
            <label for="">{{__('Midlle Name')}}</label>
            {!! Form::text('middle_name', null, array('class'=>'form-control', 'id'=>'middle_name',
            'placeholder'=>__('Middle Name'))) !!}
            {!! APFrmErrHelp::showErrors($errors, 'middle_name') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'last_name') !!}">
            <label for="">{{__('Last Name')}}</label>
            {!! Form::text('last_name', null, array('class'=>'form-control', 'id'=>'last_name', 'placeholder'=>__('Last
            Name'))) !!}
            {!! APFrmErrHelp::showErrors($errors, 'last_name') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'father_name') !!}">
            <label for="">{{__('Father Name')}}</label>
            {!! Form::text('father_name', null, array('class'=>'form-control', 'id'=>'father_name',
            'placeholder'=>__('Father Name'))) !!}
            {!! APFrmErrHelp::showErrors($errors, 'father_name') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'gender_id') !!}">
            <label for="">{{__('Gender')}}</label>
            {!! Form::select('gender_id', [''=>__('Select Gender')]+$genders, null, array('class'=>'form-control
            form-select', 'id'=>'gender_id')) !!}
            {!! APFrmErrHelp::showErrors($errors, 'gender_id') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'marital_status_id') !!}">
            <label for="">{{__('Martial Status')}}</label>
            {!! Form::select('marital_status_id', [''=>__('Select Marital Status')]+$maritalStatuses, null,
            array('class'=>'form-control form-select', 'id'=>'marital_status_id')) !!}
            {!! APFrmErrHelp::showErrors($errors, 'marital_status_id') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'country_id') !!}">
            <label for="">{{__('Country')}}</label>
            <?php $country_id = old('country_id', (isset($user) && (int) $user->country_id > 0) ? $user->country_id : $siteSetting->default_country_id); ?>
            {!! Form::select('country_id', [''=>__('Select Country')]+$countries, $country_id,
            array('class'=>'form-control form-select chosen', 'id'=>'country_id')) !!}
            {!! APFrmErrHelp::showErrors($errors, 'country_id') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'state_id') !!}">
            <label for="">{{__('State')}}</label>
            <span id="state_dd"> {!! Form::select('state_id', [''=>__('Select State')], null,
                array('class'=>'form-control form-select chosen', 'id'=>'state_id')) !!} </span> {!!
            APFrmErrHelp::showErrors($errors, 'state_id') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'city_id') !!}">
            <label for="">{{__('City')}}</label>
            <span id="city_dd"> {!! Form::select('city_id', [''=>__('Select City')], null, array('class'=>'form-control
                form-select chosen', 'id'=>'city_id')) !!} </span> {!! APFrmErrHelp::showErrors($errors, 'city_id') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'nationality_id') !!}">
            <label for="">{{__('Nationality')}}</label>
            {!! Form::select('nationality_id', [''=>__('Select Nationality')]+$nationalities, null,
            array('class'=>'form-control form-select chosen', 'id'=>'nationality_id')) !!}
            {!! APFrmErrHelp::showErrors($errors, 'nationality_id') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'date_of_birth') !!}">
            <?php 
            if(!empty($user->date_of_birth)){
                $d = $user->date_of_birth;
            }else{
                $d = date('Y-m-d', strtotime('-16 years'));
            }
            $dob = old('date_of_birth')?date('Y-m-d',strtotime(old('date_of_birth'))):date('Y-m-d',strtotime($d));
            ?>
            <label for="">{{__('Date of Birth')}}</label>
            {!! Form::date('date_of_birth', $dob, array('class'=>'form-control', 'id'=>'date_of_birth',
            'placeholder'=>__('Date of Birth'), 'autocomplete'=>'off')) !!}
            {!! APFrmErrHelp::showErrors($errors, 'date_of_birth') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'national_id_card_number') !!}">
            <label for="">{{__('National ID')}}</label>
            {!! Form::text('national_id_card_number', null, array('class'=>'form-control',
            'id'=>'national_id_card_number', 'placeholder'=>__('National ID Card#'))) !!}
            {!! APFrmErrHelp::showErrors($errors, 'national_id_card_number') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'phone') !!}">
            <label for="">{{__('Phone')}}</label>
            {!! Form::text('phone', null, array('class'=>'form-control', 'id'=>'phone', 'placeholder'=>__('Phone'))) !!}
            {!! APFrmErrHelp::showErrors($errors, 'phone') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'mobile_num') !!}">
            <label for="">{{__('Mobile')}}</label>
            {!! Form::text('mobile_num', null, array('class'=>'form-control', 'id'=>'mobile_num',
            'placeholder'=>__('Mobile Number'))) !!}
            {!! APFrmErrHelp::showErrors($errors, 'mobile_num') !!}
        </div>
    </div>
    <div class="col-md-12">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'street_address') !!}">
            <label for="">{{__('Street Address')}}</label>
            {!! Form::textarea('street_address', null, array('class'=>'form-control', 'id'=>'street_address',
            'placeholder'=>__('Street Address'))) !!}
            {!! APFrmErrHelp::showErrors($errors, 'street_address') !!}
        </div>
    </div>
</div>