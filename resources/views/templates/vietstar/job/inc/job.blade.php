<h5  class="fs-3  text-primary">{{__('Job Details')}}</h5>
@if(isset($job))
{!! Form::model($job, array('method' => 'put', 'route' => array('update.front.job', $job->id), 'class' => 'form')) !!}
{!! Form::hidden('id', $job->id) !!}
@else
{!! Form::open(['route' => 'store.front.job', 'method' => 'POST', 'id' => 'new-job-form', 'class' => 'form', 'novalidate'] ) !!}
@endif

<div class="col-lg-12">
    <!-- Main -->
    <div class="row">
        <div class="col-md-12">
            <div class="card card-edit-profile mb-3 w-100 shadow-sm">
                <div class="card-body">
                    <form action="" methods="POST">
                        @csrf
                        <div class="section-infomation account-infomation">
                            <div class="row">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="Job_title">{{__('Job title')}} <span class="required">*</span></label>
                                            <input type="text" class="form-control" id="title" name="title" placeholder="{{__('Job title')}}" value="{{ $edit && isset($job) ? __($job->title) : old('title') }}">
                                            {!! APFrmErrHelp::showErrors($errors, 'title') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="expiry_date">{{__('Deadline')}} <span class="required">*</span></label>
                                            <input type="text" class="form-control" id="expiry_date" name="expiry_date" placeholder="Deadline" value="{{ $edit && isset($job) ? \Carbon\Carbon::parse($job->expiry_date)->format('d-m-Y') : \Carbon\Carbon::parse(old('expiry_date'))->format('d-m-Y') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="WFH">{{__('WFH')}} <span class="required">*</span></label>
                                            <div class="d-flex">
                                                <div class="form-check m-2">
                                                    <input class="form-check-input" type="radio" name="WFH" id="WFH1" >
                                                    <label class="form-check-label" for="WFH1" >
                                                        Làm từ xa
                                                    </label>
                                                </div>
                                                <div class="form-check m-2">
                                                    <input class="form-check-input" type="radio" name="WFH" id="WFH2" checked >
                                                    <label class="form-check-label" for="WFH2">
                                                        Mặc dịnh
                                                    </label>
                                                </div>    
                                            </div>
    
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6" id="salary_dd">
                                        <div class="row">
                                        <div class="col-md-12" id="salary_type_dd">
                                            <div class="form-group">
                                                <label for="salary_type">{{__('Salary Type')}} <span class="required">*</span></label>
                                                @php($salaryTypes = [''=>__("Select one")] + \App\Job::getSalaryTypes())
                                                {{ Form::select('salary_type', $salaryTypes , $edit && isset($job) ? $job->salary_type : old('salary_type'), array('class'=>'form-control form-select', 'id'=>'salary_type')) }}
                                                {!! APFrmErrHelp::showErrors($errors, 'salary_type') !!}
                                            </div>
                                        </div>
                                        <div class="col-md-12" id="salary_from_dd" style="display:none;">
                                            <div class="form-group">
                                                <label for="salary_from">{{__('Salary From')}} <span class="required">*</span></label>
                                                <input type="text" class="form-control currency-mask" id="salary_from" placeholder="{{__('Salary From')}}" value="{{ $edit ? __($job->salary_from) : old('salary_from') }}">
                                                {!! APFrmErrHelp::showErrors($errors, 'salary_from') !!}
                                            </div>
                                        </div>
                                        <div class="col-md-12" id="salary_to_dd" style="display:none;">
                                            <div class="form-group">
                                                <label for="salary_range">{{__('Salary To')}} <span class="required">*</span></label>
                                                <input type="text" class="form-control currency-mask" id="salary_to" placeholder="{{__('Salary To')}}" value="{{ $edit ? __($job->salary_to) : old('salary_to') }}">
                                                {!! APFrmErrHelp::showErrors($errors, 'salary_to') !!}
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="Ownership">{{__('Functional Area')}} <span class="required">*</span></label>
                                            <select required class="form-control form-select chosen" id="functional_area_id" name="functional_area_id">
                                                <option value="">{{ __('Select one') }}</option>
    
                                                @if(count($functionalAreas) > 0)
                                                @foreach($functionalAreas as $key => $value)
                                                <option {{ isset($job) && $job->functional_area_id == $key ? 'selected' : '' }} value="{{ $key }}">{{ $value }}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                            {!! APFrmErrHelp::showErrors($errors, 'functional_area_id') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-group-custom-chosen">
                                            <label for="Job Type">{{__('Job Type')}} <span class="required">*</span></label>
                                            {!! Form::select('job_type_id', ['' => __('Select Job Type')]+$jobTypes, null, array('class'=>'form-control form-select chosen', 'id'=>'job_type_id')) !!}
                                            {!! APFrmErrHelp::showErrors($errors, 'job_type_id') !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-group-custom-chosen">
                                            <label for="Level">{{__('Career Level')}} <span class="required">*</span></label>
                                            {!! Form::select('career_level_id', ['' => __('Select Career Level')] + $careerLevels, null, array('class'=>'form-control form-select chosen', 'id'=>'career_level_id')) !!}
                                            {!! APFrmErrHelp::showErrors($errors, 'career_level_id') !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="industry_id">{{__('Industry')}} <span class="required">*</span></label>
                                            {!! Form::select('industry_id', ['' => __('Select Industry')] + $industries, null, array('class'=>'form-control form-select chosen', 'id'=>'industry_id')) !!}
                                            {!! APFrmErrHelp::showErrors($errors, 'industry_id') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="Gender">{{__('Gender')}} <span class="required">*</span></label>
                                            <div class="d-flex"> 
                                                <div class="form-check m-2">
                                                    <input class="form-check-input" type="radio" name="gender" id="gender1" checked>
                                                    <label class="form-check-label" for="gender1">
                                                        Nam/ Nữ
                                                    </label>
                                                </div>

                                                <div class="form-check m-2">
                                                    <input class="form-check-input" type="radio" name="gender" id="gender2" >
                                                    <label class="form-check-label" for="gender2">
                                                        Nam
                                                    </label>
                                                </div>
                                                <div class="form-check m-2">
                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="gender3" >
                                                    <label class="form-check-label" for="flexRadioDefault2">
                                                        Nữ
                                                    </label>
                                                </div>
                                            </div>    
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="Level">{{__('Experience')}} <span class="required">*</span></label>
                                            {!! Form::select('job_experience_id', ['' => __('Select Required job experience')]+$jobExperiences, null, array('class'=>'form-control form-select chosen', 'id'=>'job_experience_id')) !!}
                                            {!! APFrmErrHelp::showErrors($errors, 'job_experience_id') !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group" id="city_dd">
                                            <label for="City">{{__('City')}} <span class="required">*</span></label>
                                            {!! Form::select('city_id', ['' => __('Select City')] + $cities, Request::get('city_id', null), array('class'=>'form-control form-select shadow-sm chosen', 'id'=>'city_id')) !!}
                                            {!! APFrmErrHelp::showErrors($errors, 'city_id') !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="num_of_positions">{{__('Number of positions')}} <span class="required">*</span></label>&nbsp;&nbsp;&nbsp;<span class="text-danger" id="num_of_positions_error" class="error danger"></span>
                                            <input type="text" class="form-control" id="num_of_positions" name="num_of_positions" placeholder="{{__('Number of positions')}}" value="{{ $edit && isset($job) ? $job->num_of_positions : old('num_of_positions') }}">
    
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-group-custom-multiselect" id="skill_id_dd">
                                            <label for="skill_id">{{__('Desired Skills')}} <span class="required">*</span></label>
                                            {!! Form::select('skills[]', $jobSkills, null, ['class'=>'form-control form-select shadow-sm multiselect', 'id'=>'skill_id','multiple'=>true], $edit && isset($desiredSkills) ? $desiredSkills : []) !!}
                                            {!! APFrmErrHelp::showErrors($errors, 'skill_id') !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group" id="status_dd">
                                            <label for="status">{{__('Job Status')}} <span class="required">*</span></label>
                                            <select required class="form-control form-select" id="status" name="status">
                                                <option value="">{{ __('Select status') }} <span class="required">*</span></option>
                                                @foreach(\App\Job::getListStatusJob() as $key => $value)
                                                <option {{ isset($job) && $job->status == $key ? 'selected' : '' }} value="{{ $key }}">{{ $value }}</option>
                                                @endforeach
                                            </select>
                                            {!! APFrmErrHelp::showErrors($errors, 'status') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
    
    
                                        <div class="form-group">
                                            <label class="d-block">{{__('Placement of work')}} <span class="required">*</span></label>
                                            <input class="form-check-input" type="radio" id="same_add_yes" name="pow" value={{APP\Job::SAME_COMPANY_ADD_YES}} {{$edit && $job->is_same_company_add == APP\Job::SAME_COMPANY_ADD_YES ? "checked" : ""}}>
                                            <label class="form-check-label" for="same_add_yes">
                                                {{__('Same as company address')}}
                                            </label>
                                            &nbsp;&nbsp;&nbsp;
                                            <input class="form-check-input" type="radio" id="same_add_no" name="pow" value={{APP\Job::SAME_COMPANY_ADD_NO}} {{$edit && $job->is_same_company_add == APP\Job::SAME_COMPANY_ADD_NO ? "checked" : "" }}>
                                            <label class="form-check-label" for="same_add_no">
                                                {{__('Different address')}}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group" id="pow_address" style="display:none;">
                                            <label for="location">{{__('Address')}} <span class="required">*</span></label>
                                            <input type="text" class="form-control" id="location" name="location" placeholder="{{__('Location')}}" value="{{ $edit && isset($job) ? $job->location : old('location') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="description">{{ __('Job description') }} <span class="required">*</span></label>
                                            {!! Form::textarea('description', null, array('class'=>'form-control', 'id'=>'description', 'placeholder'=>__('Job description'))) !!}
                                            {!! APFrmErrHelp::showErrors($errors, 'description') !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="requirements">{{ __('Job requirements') }} <span class="required">*</span></label>
                                            {!! Form::textarea('requirement', null, array('class'=>'form-control', 'id'=>'requirement', 'placeholder'=>__('Job requirements'))) !!}
                                            {!! APFrmErrHelp::showErrors($errors, 'description') !!}
                                        </div>
                                    </div>
                                </div>


                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="Benefits">{{ __('Job Benefits') }} <span class="required">*</span></label>
                                            {!! Form::textarea('benefits', null, array('class'=>'form-control', 'id'=>'benefits', 'placeholder'=>__('Job Benefits'))) !!}
                                            {!! APFrmErrHelp::showErrors($errors, 'benefits') !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 d-flex justify-content-end">
                                        <button class="btn btn-primary" type="submit">{{__('Post Job')}} </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

<input type="file" name="image" id="image" style="display:none;" accept="image/*" />
{!! Form::close() !!}
<hr>
@push('styles')
<style type="text/css">
    .datepicker>div {
        display: block;
    }
</style>
@endpush
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
@include('templates.vietstar.includes.tinyMCEFront')
<script type="text/javascript">
    // js chosen dropdown select
    $(".chosen").chosen();

    $(document).ready(function () {
        $('#expiry_date').datepicker({
            todayHighlight: true,
            format: 'dd-mm-yyyy'
        });
        $('#same_add_yes').click(function () {
            this.checked = true;
            $('#same_add_no').prop('checked', false);
        });
        $('#same_add_no').click(function () {
            this.checked = true;
            $('#same_add_yes').prop('checked', false);
        });

        $('input[name="pow"]').click(function () {
            if ($(this).attr('id') == 'same_add_yes') {
                $('#pow_address').hide();
                $('#location').val('').removeAttr('name');
            } else {
                $('#pow_address').show();
            }
        });
        $('#num_of_positions').on('input keydown keyup mousedown mouseup select contextmenu drop focusout', function () {
            var number_of_posts = $(this).val();
            return /^[0-9]+$/.test(number_of_posts) ? $('#num_of_positions_error').html('').removeAttr('name') : $('#num_of_positions_error').html('Số lượng tuyển phải là số');
        });
    });

    $('#skill_id').each(function() {
        $(this).multiselect({
            texts: {
                placeholder: "{{__('Select desired skills')}}", // or $(this).prop('title'),
            },
        });
    });
    $(window).on('load', function () {
        if ($('#same_add_no').is(':checked')) {
            $('#pow_address').show();
        }
        if ($('#salary_type').val() == {{APP\Job::SALARY_TYPE_RANGE}}) {
            $('#salary_dd').removeClass('col-md-6').addClass('col-md-12');
            $('#salary_range_dd').show();
            $('#salary_from_dd').show();
            $('#salary_from').attr('name', 'salary_from');
            $('#salary_to_dd').show();
            $('#salary_to').attr('name', 'salary_to');
            $('#salary_type_dd').removeClass('col-md-12').addClass('col-md-4').css({'display':'inline-block', 'margin':'0px','padding':'10px'});
            $('#salary_from_dd').removeClass('col-md-12').addClass('col-md-4').css({'display':'inline-block', 'margin':'0px','padding':'10px'});
            $('#salary_to_dd').removeClass('col-md-12').addClass('col-md-4').css({'display':'inline-block', 'margin':'0px','padding':'10px'});

        } else if($('#salary_type').val() == {{APP\Job::SALARY_TYPE_FROM}}) {
            $('#salary_dd').removeClass('col-md-6').addClass('col-md-12');
            $('#salary_range').show();
            $('#salary_from_dd').show();
            $('#salary_from').attr('name', 'salary_from');
            $('#salary_type_dd').removeClass('col-md-12').addClass('col-md-6').css({'display':'inline-block', 'margin':'0px','padding':'10px'});
            $('#salary_from_dd').removeClass('col-md-12').addClass('col-md-6').css({'display':'inline-block', 'margin':'0px','padding':'10px'});
        } else if($('#salary_type').val() == {{APP\Job::SALARY_TYPE_TO}}) {
            $('#salary_dd').removeClass('col-md-6').addClass('col-md-12');
            $('#salary_range').show();
            $('#salary_to_dd').show();
            $('#salary_to').attr('name', 'salary_to');
            $('#salary_type_dd').removeClass('col-md-12').addClass('col-md-6').css({'display':'inline-block', 'margin':'0px','padding':'10px'});
            $('#salary_to_dd').removeClass('col-md-12').addClass('col-md-6').css({'display':'inline-block', 'margin':'0px','padding':'10px'});
        } else {
            $('#salary_range').show();
            //$('#salary_type_dd').removeClass('col-md-12').addClass('col-md-12').css({'display':'inline-block', 'margin':'0px','padding':'10px'});
        }

    });

    $('#salary_type').change(function () {
        var salary_type = $(this).val();
        if (salary_type == {{APP\Job::SALARY_TYPE_RANGE}}) {
            $('#salary_dd').removeClass('col-md-6').addClass('col-md-12');
            $('#salary_type_dd').removeClass('col-md-12').removeClass('col-md-6').addClass('col-md-4').css({'display':'inline-block', 'margin':'0px','padding':'10px'});
            $('#salary_from').val('').attr('name', 'salary_from').attr('disabled', false);
            $('#salary_from_dd').removeClass('col-md-12').removeClass('col-md-6').addClass('col-md-4').css({'display':'inline-block', 'margin':'0px','padding':'10px'});
            $('#salary_to').val('').attr('name', 'salary_to').attr('disabled', false);
            $('#salary_to_dd').removeClass('col-md-12').removeClass('col-md-6').addClass('col-md-4').css({'display':'inline-block', 'margin':'0px','padding':'10px'});
            $('#salary_from_dd').show();
            $('#salary_to_dd').show();
        } else if(salary_type == {{APP\Job::SALARY_TYPE_FROM}}) {
            $('#salary_dd').removeClass('col-md-6').addClass('col-md-12');
            $('#salary_from').val('').attr('name', 'salary_from');
            $('#salary_to').val('').removeAttr('name');
            $('#salary_type_dd').removeClass('col-md-12').addClass('col-md-6').css({'display':'inline-block', 'margin':'0px','padding':'10px'});
            $('#salary_from_dd').removeClass('col-md-12').addClass('col-md-6').css({'display':'inline-block', 'margin':'0px','padding':'10px'});
            $('#salary_from_dd').show();
            $('#salary_to_dd').hide();
        } else if(salary_type == {{APP\Job::SALARY_TYPE_TO}}) {
            $('#salary_dd').removeClass('col-md-6').addClass('col-md-12');
            $('#salary_from').val('').removeAttr('name');
            $('#salary_to').val('').attr('name', 'salary_to');
            $('#salary_type_dd').removeClass('col-md-12').addClass('col-md-6').css({'display':'inline-block', 'margin':'0px','padding':'10px'});
            $('#salary_to_dd').removeClass('col-md-12').addClass('col-md-6').css({'display':'inline-block', 'margin':'0px','padding':'10px'});
            $('#salary_from_dd').hide();
            $('#salary_to_dd').show();
        } else {
            $('#salary_dd').removeClass('col-md-6').removeClass('col-md-4').addClass('col-md-12').css({'display':'inline-block', 'margin':'0px','padding':'10px'});;
            $('#salary_from').val('').removeAttr('name').attr('disabled', true);
            $('#salary_to').val('').removeAttr('name').attr('disabled', true);
            $('#salary_from_dd').hide();
            $('#salary_to_dd').hide();
        }

    });

</script>
@endpush