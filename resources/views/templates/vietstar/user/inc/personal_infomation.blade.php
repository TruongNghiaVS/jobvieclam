
<div class="section-head">
    <div class="section-head__figure">
        <div class="figure__image"><img src="https://icons.veryicon.com/png/o/system/alongthink/ico-user-info.png" alt=""></div>
        <div class="figure__caption">
            <h5 class="">{{__('Personal Information')}}</h5>
            @if($user->isCompletePersonal)
                <div class="status complete" bis_skin_checked="1">
                    <p>Hoàn thành</p>
                </div>
            @else
                <div class="status complete" bis_skin_checked="1">
                    <p>Chưa hoàn thành</p>
                </div>
            @endif
            
        </div>
    </div>
    <div class="section-head__right-action" bis_skin_checked="1">
        <div class="right-action__tips" bis_skin_checked="1">
            <i class="bi bi-lightbulb"></i>
            <p>Tips</p>
        </div>
        <div class="right-action__link-edit"><a data-toggle="modal" data-target="#persionalinfo"><i class="bi bi-pen"></i>Chỉnh sửa</a></div>
        <div class="right-action__link-edit-mobile"><a data-toggle="modal" data-target="#persionalinfo"><i class="bi bi-pen"></i></a></div>

    </div>
</div>



    <div class="table-responsive">
        <table class="table table-responsive table-user-information borderless ">
            <tbody>

                <tr>
                    <td class="text-primary table_title">
                        <strong>
                           Họ và tên lót
                        </strong>
                    </td>
                    <td class="table_value">
                      {{$user->first_name }}   {{$user->middle_name}}
                    </td>
                </tr>
                <tr>
                    <td class="text-primary table_title">
                        <strong>
                            {{__('First Name')}}
                        </strong>
                    </td>
                    <td class="table_value">
                    {{ $user->last_name ? $user->last_name :"Chưa cập nhật" }}
                    </td>
                </tr>

                <tr>
                    <td class=" text-primary table_title">
                        <strong>
                            {{__('Date of Birth')}}
                        </strong>
                    </td>
                    <td class="table_value">
                       {{$user->date_of_birth}}
                    </td>
                </tr>

                <tr>
                    <td class="text-primary table_title">
                        <strong>
                            {{__('Gender')}}
                        </strong>
                    </td>
                    <td class="table_value">
                       
                        @if($user->gender_id)
                            @foreach ($genders as $key => $gender)
                                @if( $key == $user->gender_id )
                                {{ $gender }}
                                @endif
                            @endforeach
                        @endif
                         <!-- {{$user->gender_id == 15 ? "Nam": "Nữ" }} -->
                    </td>
                </tr>



                <tr>
                    <td class="text-primary table_title">
                        <strong>
                            {{__('Mobile Number')}}
                        </strong>
                    </td>
                    <td class="table_value">
                       
                    {{ $user->phone ? $user->phone :"Chưa cập nhật" }}
                         <!-- {{$user->gender_id == 15 ? "Nam": "Nữ" }} -->
                    </td>
                </tr>

                <tr>
                    <td class="text-primary table_title">
                        <strong>
                           Địa chỉ
                        </strong>
                    </td>
                    <td class="table_value">
                       
                    {{ $user->street_address ? $user->street_address :"Chưa cập nhật" }}
                         <!-- {{$user->gender_id == 15 ? "Nam": "Nữ" }} -->
                    </td>
                </tr>


                <tr>
                    <td class=" text-primary table_title">
                        <strong>
                            {{__('Martial Status')}} 
                        </strong>
                    </td>
                    <td class="table_value">

                        @if($user->marital_status_id)
                            @foreach ($maritalStatuses as $key => $maritalStatuse)
                                @if( $key == $user->marital_status_id )
                                {{$maritalStatuse }}
                                @endif
                            @endforeach
                        @endif
                         <!-- {{$user->marital_status_id == 21 ? "Độc thân": "Gia đình" }} -->
                    </td>
                </tr>



                <tr>
                    <td class=" text-primary table_title">
                        <strong>
                            {{__('Country')}}
                        </strong>
                    </td>
                    <td class="table_value">
                        @if($user->nationality_id)
                            @foreach ($nationalities as $key => $nationalitie)
                                @if( $key == $user->nationality_id )
                                {{$nationalitie }}
                                @endif
                            @endforeach
                        @endif
                        
                    </td>
                </tr>


               
            </tbody>
        </table>
    </div>
</div>



<!-- <h5 class="title-form"></h5> -->
<!-- <div class="row">
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
            if (!empty($user->date_of_birth)) {
                $d = $user->date_of_birth;
            } else {
                $d = date('Y-m-d', strtotime('-16 years'));
            }
            $dob = old('date_of_birth') ? date('Y-m-d', strtotime(old('date_of_birth'))) : date('Y-m-d', strtotime($d));
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
</div> -->


<div class="modal fade" id="persionalinfo" tabindex="-1" role="dialog" aria-labelledby="persionalinfoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="persionalinfoLabel">{{__('Personal Information')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="persionalinfo_form" class="needs-validation" novalidate>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group {!! APFrmErrHelp::hasError($errors, 'first_name') !!}">
                                <label class="required" for="">{{__('Last Name')}}</label>
                                {!! Form::text('first_name', null, array('class'=>'form-control cursor-pointer', 'id'=>'first_name',
                                'placeholder'=>__('First Name'))) !!}
                                {!! APFrmErrHelp::showErrors($errors, 'first_name') !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group {!! APFrmErrHelp::hasError($errors, 'middle_name') !!}">
                                <label class="required" for="">{{__('Midlle Name')}}</label>
                                {!! Form::text('middle_name', null, array('class'=>'form-control', 'id'=>'middle_name',
                                'placeholder'=>__('Middle Name'))) !!}
                                {!! APFrmErrHelp::showErrors($errors, 'middle_name') !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group {!! APFrmErrHelp::hasError($errors, 'last_name') !!}">
                                <label class="required" for="">{{__('First Name')}}</label>
                                {!! Form::text('last_name', null, array('class'=>'form-control', 'id'=>'last_name', 'placeholder'=>__('Last
                                Name'))) !!}
                                {!! APFrmErrHelp::showErrors($errors, 'last_name') !!}
                            </div>
                        </div>
                        <div class="col-md-6">

                            <div class="form-group {!! APFrmErrHelp::hasError($errors, 'gender_id') !!}">
                                <label class="required" for="">{{__('Gender')}}</label>
                                {!! Form::select('gender_id', [''=>__('Select Gender')]+$genders, null, array('class'=>'form-control
                                form-select', 'id'=>'gender_id')) !!}
                                {!! APFrmErrHelp::showErrors($errors, 'gender_id') !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group {!! APFrmErrHelp::hasError($errors, 'date_of_birth') !!}">
                                <?php
                                if (!empty($user->date_of_birth)) {
                                    $d = $user->date_of_birth;
                                } else {
                                    $d = date('Y-m-d', strtotime('-16 years'));
                                }
                                $dob = old('date_of_birth') ? date('Y-m-d', strtotime(old('date_of_birth'))) : date('Y-m-d', strtotime($d));
                                ?>
                                <label class="required" for="">{{__('Date of Birth')}}</label>
                                {!! Form::date('date_of_birth', $dob, array('class'=>'form-control', 'id'=>'date_of_birth',
                                'placeholder'=>__('Date of Birth'), 'autocomplete'=>'off')) !!}
                                {!! APFrmErrHelp::showErrors($errors, 'date_of_birth') !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group {!! APFrmErrHelp::hasError($errors, 'marital_status_id') !!}">
                                <label class="required" for="">{{__('Mobile Number')}}</label>
                                <input type="text" class="form-control" required id="phone" name="phone" value="{{ isset(auth()->user()->phone ) ? auth()->user()->phone : old('phone')}}" placeholder="{{__('Mobile Number')}}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group {!! APFrmErrHelp::hasError($errors, 'marital_status_id') !!}">
                                <label class="required" for="">{{__('Martial Status')}}</label>
                                {!! Form::select('marital_status_id', [''=>__('Select Marital Status')]+$maritalStatuses, null,
                                array('class'=>'form-control form-select', 'id'=>'marital_status_id')) !!}
                                {!! APFrmErrHelp::showErrors($errors, 'marital_status_id') !!}
                            </div>
                        </div>
                    
                        <div class="col-md-6">
                            <div class="form-group {!! APFrmErrHelp::hasError($errors, 'city_id') !!}">
                                <label class="required" for="city_id">Tỉnh/thành</label>
                                 <select id ="city_id" name ="city_id" class ="form-control form-select" >
                                             <option  value ="" selected disabled hidden> 
                                                 Chọn tỉnh thành
                                            </option>
                                    @foreach($cities as $itemcity)

                                            @if($itemcity->id == $user->city_id)
                                            <option selected value ={{$itemcity->id}}> 
                                                {{$itemcity->city}}
                                            </option>
                                            @else 
                                            <option value ={{$itemcity->id}}> 
                                                {{$itemcity->city}}
                                            </option>
                                            @endif
                                          
                                         @endforeach

                                 </select>
                            </div>
                        </div>

                      
                        <div class="col-md-6">
                            <div class="form-group {!! APFrmErrHelp::hasError($errors, 'nationality_id') !!}">
                                <label class="required" for="">{{__('Nationality')}}</label>
                                {!! Form::select('nationality_id', [''=>__('Select Nationality')]+$nationalities, 
                                    $user->nationality_id,
                                array('class'=>'form-control form-select ', 
                                'id'=>'nationality_id')) !!}
                                {!! APFrmErrHelp::showErrors($errors, 'nationality_id') !!}
                            </div>
                        </div>



                        <div class="col-md-12">
                              
                                     <div class="form-group ">
                                <label class="required" for="">Địa chỉ</label>
                               
                                <input type="text" class="form-control" required id="addressInfo" name="street_address" placeholder="Địa chỉ" value="{{Auth::user()->street_address ? Auth::user()->street_address : __('Not update') }}"
                                
                            </div>
                       
                        </div>
                       
                        <div class="form-group">
          
                            <button id="personal_submitBtn" type="submit" class="btn btn-primary submit-button" >{{__(('Update'))}}</button>
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
    $('#personal_submitBtn').prop('disabled', true);

    // Check form fields on input change
    $('#persionalinfo_form').on('input', 'select, input', function() {
        var isFormValid = true;

        // Check each input and select for emptiness
        $('#persionalinfo_form select, #persionalinfo_form input').each(function() {
            if (!$(this).val()) {
                isFormValid = false;
                return false; // Break the loop if an empty field is found
            }
        });

        // Enable or disable the submit button based on form validity
        $('#personal_submitBtn').prop('disabled', !isFormValid);
    });


    $(document).ready(function(){
        $('#persionalinfo_form').submit(function(event) {
        var isValid = true;
        $('#personal_submitBtn').prop('disabled', true);
        event.preventDefault()
        
        // Check each input field for emptiness
        $('#persionalinfo_form input,#persionalinfo_form select').each(function() {
            if (!$(this).val()) {
                $(this).addClass('is-invalid');
            }
        });
       



        var formArray = $('#persionalinfo_form').serializeArray();

        // Convert the array to an object
        var formObject = {};
        $.each(formArray, function (i, field) {
            formObject[field.name] = field.value;
        });

        // Log the resulting object to the console
      

       
        
        if (isValid) { 
          
            $.ajax({
            type: "PUT",
            url:  `{{ route('put.my.profilev2') }}`,
            beforeSend:   showSpinner(),
            data: {
                "_token": "{{ csrf_token() }}",
                ...formObject
            },
            statusCode: {
                202 :  function(responseObject, textStatus, jqXHR) {
                    console.log(responseObject.error);
                    hideSpinner();

        
                },
                401: function(responseObject, textStatus, jqXHR) {
                    // No content found (404)
                    hideSpinner();

                    console.log(responseObject.responseJSON);
                    
                    // This code will be executed if the server returns a 404 response
                },
                503: function(responseObject, textStatus, errorThrown) {
                    // Service Unavailable (503)
                    hideSpinner();

                    console.log(responseObject.error);

                    // This code will be executed if the server returns a 503 response
                }           
                }
                })
                .done(function(data){
                    hideSpinner();
                    if (data.sucess) {
                    $('#persionalinfo').modal("hide");
                    showModal_Success('Thông báo', `Cập nhật thông tin cá nhân thành công`, ``);
                    setTimeout(function(){
                          window.location.reload();
                    }, 3000);
                }
                   
                       
                })
                .fail(function(jqXHR, textStatus){
                    hideSpinner();
                })
                .always(function(jqXHR, textStatus) {
                
                });
                }
    });
      
    });
</script>
@endpush




