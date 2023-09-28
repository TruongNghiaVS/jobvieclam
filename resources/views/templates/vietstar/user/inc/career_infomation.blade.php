<div class="section-head">
    <div class="figure">
        <div class="figure__image"><img src="https://cdn-icons-png.flaticon.com/512/3862/3862929.png" alt=""></div>
        <div class="figure__caption">
            <h5 class="">{{__('Career Information')}}</h5>
            <div class="status complete" bis_skin_checked="1">
                <p>Hoàn thành</p>
            </div>
        </div>
    </div>
    <div class="right-action" bis_skin_checked="1">
        <div class="right-action__tips" bis_skin_checked="1">
            <i class="bi bi-lightbulb"></i>
            <p>Tips</p>
        </div>
        <div class="right-action__link-edit"><a href=""><i class="bi bi-pen"></i>Chỉnh sửa</a></div>
    </div>
</div>

<div class="section-body">
 
    <div class="table-responsive">
        <table class="table table-responsive table-user-information">
            <tbody>
                <tr>
                    <td class="text-primary table_title">
                        <strong>
                        {{__('Job Experience')}}
                        </strong>
                    </td>
                    <td class="table_value">
                        1 năm
                    </td>
                </tr>

                <tr>
                    <td class="text-primary table_title">
                        <strong>
                        {{__('Cấp bậc nghề')}}
                        </strong>
                    </td>
                    <td class="table_value">
                        Thực tập sinh
                    </td>
                </tr>


                <tr>
                    <td class="text-primary table_title">
                        <strong>
                        {{__('Lựa chọn Ngành nghề')}}
                        </strong>
                    </td>
                    <td class="table_value">
                        IT Consolution
                    </td>
                </tr>

                <tr>
                    <td class="text-primary table_title">
                        <strong>
                        {{__('Bộ phận chức năng')}}
                        </strong>
                    </td>
                    <td class="table_value">
                       IT
                    </td>
                </tr>

                <tr>
                    <td class="text-primary table_title">
                        <strong>
                        {{__('Mức lương kỳ vọng')}}
                        </strong>
                    </td>
                    <td class="table_value">
	                    20,000,000 - 100,000,000 VND
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