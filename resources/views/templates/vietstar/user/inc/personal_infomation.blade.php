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



<div class="section-body">
    <!-- <div class="row">
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
    </div> -->
    <div class="table-responsive">
        <table class="table table-responsive table-user-information borderless ">
            <tbody>

                <tr>
                    <td class="text-primary table_title">
                        <strong>
                            {{__('Last Name')}}
                        </strong>
                    </td>
                    <td class="table_value">
                      {{$user->first_name}}
                    </td>
                </tr>
                <tr>
                    <td class="text-primary table_title">
                        <strong>
                            {{__('Midlle Name')}}
                        </strong>
                    </td>
                    <td class="table_value">
                    {{$user->middle_name}}
                    </td>
                </tr>

                <tr>
                    <td class="text-primary table_title">
                        <strong>
                            {{__('First Name')}}
                        </strong>
                    </td>
                    <td class="table_value">
                    {{$user->last_name}}
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
                            <div class="form-group {!! APFrmErrHelp::hasError($errors, 'marital_status_id') !!}">
                                <label class="required" for="">{{__('Martial Status')}}</label>
                                {!! Form::select('marital_status_id', [''=>__('Select Marital Status')]+$maritalStatuses, null,
                                array('class'=>'form-control form-select', 'id'=>'marital_status_id')) !!}
                                {!! APFrmErrHelp::showErrors($errors, 'marital_status_id') !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group {!! APFrmErrHelp::hasError($errors, 'city_id') !!}">
                                <label class="required" for="">{{__('City')}}</label>
                                <select class="form-control form-select shadow-sm" id="city_id" name="city_id"><option value="" selected="selected">Chọn địa điểm</option><option value="3">Port Blair</option><option value="48666">Lào Cai</option><option value="48667">Yên Bái</option><option value="48668">Lai Châu</option><option value="48669">Điện Biên</option><option value="48670">Sơn La</option><option value="48671">Hòa Bình</option><option value="48672">Hà Giang</option><option value="48673">Tuyên Quang</option><option value="48674">Phú Thọ</option><option value="48675">Thái Nguyên</option><option value="48676">Bắc Kạn</option><option value="48677">Cao Bằng</option><option value="48678">Lạng Sơn</option><option value="48679">Bắc Giang</option><option value="48680">Quảng Ninh</option><option value="48681">Tp. Hà Nội</option><option value="48682">Tp. Hải Phòng</option><option value="48683">Vĩnh Phúc</option><option value="48684">Bắc Ninh</option><option value="48685">Hưng Yên</option><option value="48686">Hải Dương</option><option value="48687">Thái Bình</option><option value="48688">Nam Định</option><option value="48689">Ninh Bình</option><option value="48690">Hà Nam</option><option value="48691">Thanh Hóa</option><option value="48692">Nghệ An</option><option value="48693">Hà Tĩnh</option><option value="48694">Quảng Bình</option><option value="48695">Quảng Trị</option><option value="48696">Thừa Thiên Huế</option><option value="48697">Tp. Đà Nẵng</option><option value="48698">Quảng Nam</option><option value="48699">Quảng Ngãi</option><option value="48700">Bình Định</option><option value="48701">Phú Yên</option><option value="48702">Khánh Hòa</option><option value="48703">Ninh Thuận</option><option value="48704">Bình Thuận</option><option value="48705">Kon Tum</option><option value="48706">Gia Lai</option><option value="48707">Đắk Lắk</option><option value="48708">Đắk Nông</option><option value="48709">Lâm Đồng</option><option value="48710">TP. Hồ Chí Minh</option><option value="48711">Đồng Nai</option><option value="48712">Bà Rịa-Vũng Tàu</option><option value="48713">Bình Dương</option><option value="48714">Bình Phước</option><option value="48715">Tây Ninh</option><option value="48716">Tp. Cần Thơ</option><option value="48717">Long An</option><option value="48718">Tiền Giang</option><option value="48719">Bến Tre</option><option value="48720">Vĩnh Long</option><option value="48721">Trà Vinh</option><option value="48722">Đồng Tháp</option><option value="48723">An Giang</option><option value="48724">Kiên Giang</option><option value="48725">Hậu Giang</option><option value="48726">Sóc Trăng</option><option value="48727">Bạc Liêu</option><option value="48728">Cà Mau</option></select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group {!! APFrmErrHelp::hasError($errors, 'nationality_id') !!}">
                                <label class="required" for="">{{__('Nationality')}}</label>
                                {!! Form::select('nationality_id', [''=>__('Select Nationality')]+$nationalities, null,
                                array('class'=>'form-control form-select ', 'id'=>'nationality_id')) !!}
                                {!! APFrmErrHelp::showErrors($errors, 'nationality_id') !!}
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
                    // // setTimeout(function() { 
                    // //     alert(data.message)
                    // //     window.location.href = data.urlRedirect;
                    // // }, 2000);
                    //  window.location.href =  "/home";
                    //  location.reload();
                    // $("#persionalinfo").modal('hide');
                    // location.reload();
                   
                       
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




