<?php
    $job_experience = $user->job_experience_id ? $user->job_experience_id : "";
    $careerlevel = $user->career_level_id ? $user->career_level_id : "";
    $industry = $user->industry_id ? $user->industry_id : "";
    $functional_area = $user->functional_area_id ? $user->functional_area_id : "";
    $current_salary =  $user->current_salary ? $user->current_salary :"";
    $expected_salary =  $user->expected_salary ? $user->expected_salary :"";
    $salary_currency =  $user->salary_currency ? $user->salary_currency :"";

?>
<div class="section-head">
    <div class="section-head__figure">
        <div class="figure__image"><img src="https://cdn-icons-png.flaticon.com/512/3862/3862929.png" alt=""></div>
        <div class="figure__caption">
            <h5 class="">{{__('Career Information')}}</h5>
            <div class="status complete" bis_skin_checked="1">
                <p>Hoàn thành</p>
            </div>
        </div>
    </div>
    <div class="section-head__right-action" bis_skin_checked="1">
        <div class="right-action__tips" bis_skin_checked="1">
            <i class="bi bi-lightbulb"></i>
            <p>Tips</p>
        </div>
        <div class="right-action__link-edit"><a data-toggle="modal" data-target="#careerinformation"><i class="bi bi-pen"></i>Chỉnh sửa</a></div>
        <div class="right-action__link-edit-mobile"><a data-toggle="modal" data-target="#careerinformation"><i class="bi bi-pen"></i></a></div>
   
    </div>
</div>

<div class="section-body">
 
    <div class="table-responsive">
        <table class="table table-responsive table-user-information borderless ">
            <tbody>
                <tr>
                    <td class="text-primary table_title">
                        <strong>
                        {{__('Job Experience')}}
                        </strong>
                    </td>
                    <td class="table_value">
                         
                        @if($job_experience)
                            @foreach ($jobExperiences as $key =>$jobExperience)
                                @if( $key == $job_experience )
                                {{ $jobExperience }}
                                @endif
                            @endforeach
                        @endif
                    </td>
                </tr>

                <tr>
                    <td class="text-primary table_title">
                        <strong>
                        {{__('Career Level')}}
                        </strong>
                    </td>
                    <td class="table_value">
                        @if($careerlevel)
                            @foreach ($careerLevels as $key =>$careerLevel)
                                @if( $key == $careerlevel )
                                {{ $careerLevel }}
                                @endif
                            @endforeach
                        @endif
                    </td>
                </tr>


                <tr>
                    <td class="text-primary table_title">
                        <strong>
                        {{__('Select Industry')}}
                        </strong>
                    </td>
                    <td class="table_value">
                        @if($industry)
                            @foreach ($industries as $key =>$industrie)
                                @if( $key == $industry )
                                {{ $industrie }}
                                @endif
                            @endforeach
                        @endif
                    
                    </td>
                </tr>

                <tr>
                    <td class="text-primary table_title">
                        <strong>

                        {{__('Functional department')}}
                        </strong>
                    </td>
                    <td class="table_value">
                        @if($functional_area)
                            @foreach ($functionalAreas as $key =>$functionalArea)
                                @if( $key == $functional_area )
                                {{ $functionalArea }}
                                @endif
                            @endforeach
                        @endif
                   
                    </td>
                </tr>

                <tr>
                    <td class="text-primary table_title">
                        <strong>
                        {{__('Expected salary')}}
                        </strong>
                    </td>
                    <td class="table_value">
                        @if($current_salary || $expected_salary )
                            {{ $current_salary }} - {{ $expected_salary }} {{__('million')}}  {{$salary_currency}}
                        @endif    
                </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- <h5 class="title-form">{{__('Career Information')}}</h5> -->
<!-- <div class="row">
    <div class="col-md-6">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'job_experience_id') !!}">
            <label for="">{{__('Job Experience')}}</label>
            {!! Form::select('job_experience_id', [''=>__('Lựa chọn số năm kinh nghiệm')]+$jobExperiences, null,
            array('class'=>'form-control form-select chosen', 'id'=>'job_experience_id')) !!}
            {!! APFrmErrHelp::showErrors($errors, 'job_experience_id') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'career_level_id') !!}">
            <label for="">{{__('Cấp bậc nghề')}}</label>
            {!! Form::select('career_level_id', [''=>__('Lựa chọn Cấp bậc Nghề')]+$careerLevels, null,
            array('class'=>'form-control form-select', 'id'=>'career_level_id')) !!}
            {!! APFrmErrHelp::showErrors($errors, 'career_level_id') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'industry_id') !!}">
            <label for="">{{__('Lựa chọn Ngành nghề')}}</label>
            {!! Form::select('industry_id', [''=>__('Lựa chọn Ngành nghề')]+$industries, null,
            array('class'=>'form-control form-select chosen', 'id'=>'industry_id')) !!}
            {!! APFrmErrHelp::showErrors($errors, 'industry_id') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'functional_area_id') !!}">
            <label for="">{{__('Bộ phận chức năng')}}</label>
            {!! Form::select('functional_area_id', [''=>__('Lựa chọn Bộ phận chức năng')]+$functionalAreas, null,
            array('class'=>'form-control form-select chosen', 'id'=>'functional_area_id')) !!}
            {!! APFrmErrHelp::showErrors($errors, 'functional_area_id') !!}
        </div>
    </div>
    <div class="col-md-4">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'current_salary') !!}">
            <label for="">{{__('Mức lương hiện tại')}}</label>
            {!! Form::text('current_salary', null, array('class'=>'form-control', 'id'=>'current_salary',
            'placeholder'=>__('Mức lương hiện tại'))) !!}
            {!! APFrmErrHelp::showErrors($errors, 'current_salary') !!}
        </div>
    </div>
    <div class="col-md-4">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'expected_salary') !!}">
            <label for="">{{__('Mức lương kỳ vọng')}}</label>
            {!! Form::text('expected_salary', null, array('class'=>'form-control', 'id'=>'expected_salary',
            'placeholder'=>__('Mức lương kỳ vọng'))) !!}
            {!! APFrmErrHelp::showErrors($errors, 'expected_salary') !!}
        </div>
    </div>
    <div class="col-md-4">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'salary_currency') !!}">
            <label for="">{{__('Đồng tiền trả lương')}}</label>
            @php
            $salary_currency = Request::get('salary_currency', (isset($user) && !empty($user->salary_currency))?
            $user->salary_currency:$siteSetting->default_currency_code);
            @endphp
            {!! Form::text('salary_currency', $salary_currency, array('class'=>'form-control', 'id'=>'salary_currency',
            'placeholder'=>__('Đồng tiền trả lương'), 'autocomplete'=>'off')) !!}
            {!! APFrmErrHelp::showErrors($errors, 'salary_currency') !!}
        </div>
    </div>
</div> -->

<div class="modal fade" id="careerinformation" tabindex="-1" role="dialog" aria-labelledby="careerinformationLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="careerinformationLabel">{{__('Career Information')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="careerinformation_form" class="needs-validation" novalidate>
                    <div class="row">
                    <div class="col-md-12">
                        <div class="form-group {!! APFrmErrHelp::hasError($errors, 'job_experience_id') !!}">
                            <label for="">{{__('Job Experience')}}</label>
                            {!! Form::select('job_experience_id', [''=>__('Lựa chọn số năm kinh nghiệm')]+$jobExperiences, null,
                            array('class'=>'form-control form-select', 'id'=>'job_experience_id','name'=>'job_experience_id')) !!}
                            {!! APFrmErrHelp::showErrors($errors, 'job_experience_id') !!}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group {!! APFrmErrHelp::hasError($errors, 'career_level_id') !!}">
                            <label for="">{{__('Cấp bậc nghề')}}</label>
                            {!! Form::select('career_level_id', [''=>__('Lựa chọn Cấp bậc Nghề')]+$careerLevels, null,
                            array('class'=>'form-control form-select', 'id'=>'career_level_id','name'=>'career_level_id')) !!}
                            {!! APFrmErrHelp::showErrors($errors, 'career_level_id') !!}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group {!! APFrmErrHelp::hasError($errors, 'industry_id') !!}">
                            <label for="">{{__('Lựa chọn Ngành nghề')}}</label>
                            {!! Form::select('industry_id', [''=>__('Lựa chọn Ngành nghề')]+$industries, null,
                            array('class'=>'form-control form-select', 'id'=>'industry_id' ,'name'=>'industry_id')) !!}
                            {!! APFrmErrHelp::showErrors($errors, 'industry_id') !!}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group {!! APFrmErrHelp::hasError($errors, 'functional_area_id') !!}">
                            <label for="">{{__('Functional department')}}</label>
                            {!! Form::select('functional_area_id', [''=>__('Select Functional Department')]+$functionalAreas, null,
                            array('class'=>'form-control form-select', 'id'=>'functional_area_id'  ,'name'=>'functional_area_id')) !!}
                            {!! APFrmErrHelp::showErrors($errors, 'functional_area_id') !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group {!! APFrmErrHelp::hasError($errors, 'current_salary') !!}">
                            <label for="">{{__('Mức lương hiện tại')}}</label>
                            {!! Form::text('current_salary', null, array('class'=>'form-control', 'id'=>'current_salary',
                            'placeholder'=>__('Mức lương hiện tại')  ,'name'=>'current_salary')) !!}
                            {!! APFrmErrHelp::showErrors($errors, 'current_salary') !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group {!! APFrmErrHelp::hasError($errors, 'expected_salary') !!}">
                            <label for="">{{__('Mức lương kỳ vọng')}}</label>
                            {!! Form::text('expected_salary', null, array('class'=>'form-control', 'id'=>'expected_salary',
                            'placeholder'=>__('Mức lương kỳ vọng'))) !!}
                            {!! APFrmErrHelp::showErrors($errors, 'expected_salary') !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group {!! APFrmErrHelp::hasError($errors, 'salary_currency') !!}">
                            <label for="">{{__('Đồng tiền trả lương')}}</label>
                            @php
                            $salary_currency = Request::get('salary_currency', (isset($user) && !empty($user->salary_currency))?
                            $user->salary_currency:$siteSetting->default_currency_code);
                            @endphp
                            {!! Form::text('salary_currency', $salary_currency, array('class'=>'form-control', 'id'=>'salary_currency',
                            'placeholder'=>__('Đồng tiền trả lương'), 'autocomplete'=>'off')) !!}
                            {!! APFrmErrHelp::showErrors($errors, 'salary_currency') !!}
                        </div>
                    </div>
                        <div class="form-group">
                           
                            <button id="carrer_submitBtn" type="submit" class="btn btn-primary submit-button">{{__(('Update'))}}</button>
                        </div>
                    </div>
                </form>


            </div>
        </div>
    </div>
</div>


@push('scripts')
<script type="text/javascript">
    (function () {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
        .forEach(function (form) {
        form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
            }
            form.classList.add('was-validated')
        }, false)
        })
    })()


    $(document).ready(function(){
        $('#careerinformation_form').submit(function(event) {
        var isValid = true;
        event.preventDefault()
        
        // Check each input field for emptiness
        $('#careerinformation_form input').each(function() {
            if (!$(this).val()) {
                isValid = false;
                $(this).addClass('is-invalid');
              
            }
        });
        var formArray2 = $('#careerinformation_form').serializeArray();
       



        // Convert the array to an object
        var formObject = {};
        $.each(formArray2, function (i, field) {
            formObject[field.name] = field.value;
        });

        // Log the resulting object to the console
        console.log(formObject);

        if (!isValid) {
            event.preventDefault(); // Prevent the form from submitting
        }


        if (isValid) { 
            $.ajax({
            type: "PUT",
            url:  `{{ route('put.my.profilev3') }}`,
            data: {
                "_token": "{{ csrf_token() }}",

                ...formObject
            },
            statusCode: {
                202 :  function(responseObject, textStatus, jqXHR) {
                    console.log(responseObject.error);
        
                },
                401: function(responseObject, textStatus, jqXHR) {
                    // No content found (404)
                    console.log(responseObject.responseJSON);
                    
                    // This code will be executed if the server returns a 404 response
                },
                503: function(responseObject, textStatus, errorThrown) {
                    // Service Unavailable (503)
                    console.log(responseObject.error);

                    // This code will be executed if the server returns a 503 response
                }           
                }
                })
                .done(function(data){
                    // setTimeout(function() { 
                    //     alert(data.message)
                    //     window.location.href = data.urlRedirect;
                    // }, 2000);
                    // window.location.href =  "/home";
                    $("#careerinformation").modal('hide');
                    location.reload();
                    
                })
                .fail(function(jqXHR, textStatus){
                    
                })
                .always(function(jqXHR, textStatus) {
                
                });
                }
    });
      
    });
</script>
@endpush




