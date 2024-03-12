@extends('templates.vietstar.layouts.app')
@section('content')
<!-- Header start -->
@include('templates.vietstar.includes.header')
<!-- Header end -->
<!-- Dashboard menu start -->
@include('templates.vietstar.includes.mobile_dashboard_menu')
<!-- Dashboard menu end -->
<div class="second-login-section cb-section">
    <div class="container">
        <div class="row justify-content-md-center">

            <div class="col-lg-5 col-md-6 col-sm-12">
                <div class="box-img">
                    <img src="{{ asset('/vietstar/imgs/login.jpg') }}" alt="">
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12" bis_skin_checked="1">
                <div class="formpanel mt-0" id="login" bis_skin_checked="1">
                    <div class="title" bis_skin_checked="1">
                        <h2 class="text-primary text-center py-3"> {{__('Register')}}</h2>
                    </div>
                   
                    <div class="main-form" bis_skin_checked="1">
                    <form id="formLogup2" class="form-horizontal needs-validation"  novalidate>
                        {{ csrf_field() }}

                        <input type="hidden" name="candidate_or_employer" value="candidate" />
                        <div class="row">
                            <div class="formrow col {{ $errors->has('last_name') ? ' has-error' : '' }}">

                                <input type="text" name="last_name" class="form-control  " required="required" placeholder="{{__('Last Name')}}" value="{{old('last_name')}}">
                                
                         
                              
                                <div class="invalid-feedback first_name-error">
                                    {{__('Last Name is required')}}
                                </div>
                            </div>


                            <div class="formrow col {{ $errors->has('middle_name') ? ' has-error' : '' }}">

                                <input type="text" name="middle_name" class="form-control  " required="required" placeholder="{{__('Middle Name')}}" value="{{old('middle_name')}}">
                                
                                
                             
                               
                                <div class="invalid-feedback first_name-error">
                                    {{__('Middle Name is required')}}
                                </div>
                             
                            </div>
                            <div class="formrow col {{ $errors->has('first_name') ? ' has-error' : '' }}">

                                <input type="text" name="first_name" class="form-control  " required="required" placeholder="{{__('First Name')}}" value="{{old('first_name')}}">
                       

                                <div class="invalid-feedback first_name-error">
                                    {{__('First Name is required')}}
                                </div>
                              
                            </div>
                        </div>


                        <div class="formrow{{ $errors->has('email') ? ' has-error' : '' }}">

                            <input type="email" name="email" class="form-control  " required="required" placeholder="{{__('Email')}}" value="{{old('email')}}">
                            <div class="invalid-feedback email-error">
                                {{__('Email is required')}}
                            </div>
                        </div>

                        <div class="formrow{{ $errors->has('password') ? ' has-error' : '' }}">

                            <input id="company_passId2" type="password" name="password" class="form-control  " required="required" placeholder="{{__('Password')}}" >

                    
                            <div class="invalid-feedback password-error">
                                {{__('Password is required')}}
                            </div>

                        </div>

                        <div class="formrow{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">

                            <input id="company_comfirmId2" type="password" name="password_confirmation" class="form-control " required="required" placeholder="{{__('Password Confirmation')}}" >

                            <div class="invalid-feedback password-error">
                                {{__('Password Incorrect')}}
                            </div>
                        </div>



                        <div class="formrow{{ $errors->has('is_subscribed') ? ' has-error' : '' }}">

                            <?php

                            $is_checked = '';

                            if (old('is_subscribed', 1)) {

                                $is_checked = 'checked="checked"';
                            }

                            ?>



                            <input type="checkbox" value="1" name="is_subscribed" {{$is_checked}} />
                            {{__('Subscribe to Newsletter')}}

                            <span class="help-block is_subscribed">
                            </span> 
                        </div>





                        <div class="formrow{{ $errors->has('terms_of_use') ? ' has-error' : '' }}">

                            <input type="checkbox" value="1" name="terms_of_use" />

                            <a href="{{url('cms/terms-of-use')}}">{{__('I accept Terms of Use')}}</a>

                            <span class="help-block terms_of_use">
                            </span> 

                           
                        </div>

                        <div class="form-group col-12 col-sm-12 col-md-12 text-center mx-auto mobile-padding-no {{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                            {!! app('captcha')->display() !!}



                            @if ($errors->has('g-recaptcha-response')) <span class="help-block">
                                <strong>{{ $errors->first('g-recaptcha-response') }}</strong> </span> @endif
                        </div>

                        <input type="submit" class="btn" value="{{__('Đăng Ký')}}">

                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('templates.vietstar.includes.footer')
@endsection
@push('styles')
<style>

    .second-login-section.cb-section {
        padding: 60px 0;
    }

    .second-login-section.cb-section .container {
        max-width: 1440px;
    }

    .box-img {
        margin-right: -50px;
        width: 100%;
    }

    .box-img img {
        width: 100%;
    }

    .box-info-signup {
        
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .box-info-signup .title h2 {
        margin-bottom: 20px;
    }

    .box-info-signup .main-step-title h3 {

        font-weight: normal;
        font-size: 17px;
        color: #333;
    }

    .main-form .form-group .form-info {
        -webkit-box-flex: 0;
        flex: 0 0 150px;
        max-width: 150px;
    }

    .main-form .form-group .form-info span {
        width: 100%;
        background: var(--bs-primary);
        color: #fff;
        text-transform: uppercase;
        padding-left: 15px;
        height: 46px;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        align-items: center;
        border-radius: 6px 0 0 6px;
    }

    .main-form .form-group .form-input {
        -ms-flex: 0 0 calc(100% - 150px);
        -webkit-box-flex: 0;
        flex: 0 0 calc(100% - 150px);
        max-width: calc(100% - 150px);
    }

    .main-form .form-group .form-input.short {
        -ms-flex: 0 0 200px;
        -webkit-box-flex: 0;
        flex: 0 0 200px;
        max-width: 200px;
    }

    .user-action {}

    .user-action>* {
        margin-bottom: 20px;
    }

    .btn-area {
        text-align: right;
    }
</style>
@endpush

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

$(document).ready(function() {
    
    $('#formLogup2').submit(function(event) {
        var passwordValue = $('#company_passId2').val();
        var confirmPasswordValue = $('#company_comfirmId2').val();

        var isValid = true;
        event.preventDefault()
        // Check each input field for emptiness
        $('#formLogup2 input').each(function() {
            if (!$(this).val()) {
                isValid = false;
                $(this).addClass('is-invalid');
              
            }
        });
        $("#formLogup2").find(":input").prop("disabled", false);
        if (!isValid) {
            event.preventDefault(); // Prevent the form from submitting
        }


        var email = $('#email').val();

        // Simple email validation using a regular expression
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (emailRegex.test(email)) {
            // Email is valid
            $('#email').removeClass('is-invalid');
            $('#email').addClass('is-valid');

        
        } else {
            // Email is invalid
        
            $('#email').removeClass('is-valid');
            $('#email').addClass('is-invalid');
            $('.email-error').text('{{__('The email must be a valid email address')}}')
        }

        console.log(passwordValue,confirmPasswordValue);
        if (passwordValue !== confirmPasswordValue) {
            event.preventDefault(); // Prevent form submission

            isValid=false
            // Display error message
            $('#company_comfirmId2').addClass('is-invalid has-error');
            $('#company_comfirmId2').next('.invalid-feedback').show();
        }

        $('#password_confirmation').on('input', function() {
        var passwordValue = $('#company_passId2').val();
        var confirmPasswordValue = $(this).val();
        if (passwordValue == confirmPasswordValue) {
            isValid=true
            $(this).removeClass('is-invalid has-error');
            $(this).next('.invalid-feedback').hide();
        }
        });

        if (isValid) { 
            $.ajax({
            type: "POST",
            url:  `{{ route('register') }}`,
            data: $(this).serialize(),
            beforeSend:   showSpinner(),
            statusCode: {
                202 :  function(responseObject, textStatus, jqXHR) {
                    console.log(responseObject.error);
                if(responseObject.error) {
                    responseObject.error.forEach(err => {
                        $(`#formLogup2 .invalid-feedback.${err.key}-error`).text(err.textError)
                        $(`#formLogup2 .invalid-feedback.${err.key}-error`).addClass('has-error')
                        $(`#formLogup2 input[name*='${err.key}']`).addClass('has-error')
                        
                        // $(`#formLogup2 .invalid-feedback.${err.key}-error`).append(err.textError)
                     
                    }) 
                }
                },
                404: function(responseObject, textStatus, jqXHR) {
                    // No content found (404)
                    // This code will be executed if the server returns a 404 response
                },
                503: function(responseObject, textStatus, errorThrown) {
                    // Service Unavailable (503)
                    // This code will be executed if the server returns a 503 response
                }           
                }
                })
                .done(function(data){
                    if (data.sucess == true ) {
                        $('#logup_em_success').modal('show');
                        
                    
                        $("#employer_logup_Modal").modal("hide")
                        window.location.href = '/company-home';  // Replace with the actual URL
                    }
                   
                                
                    // $("#logup_em_success").addClass("show")
                    // $("#thank-you-pop button").on("click",function(){
                    //     $("#logup_em_success").removeClass("show")
                        
                    //     window.location.href =  "/company-home";
                    // });
                    // $("#logup_em_success .modal-dialog").on("click",function(){
                    //     console.log(1231412);
                    //     // $("#logup_em_success").removeClass("show")
                        
                    //     // window.location.href =  "/company-home";
                    // });

               
                     
                })
                .fail(function(jqXHR, textStatus){
                    hideSpinner();
                    
                })
                 .always(function(jqXHR, textStatus) {
                
                });
                }
    });

    // Remove validation class on input change
    $('#formLogup2 input').on('input', function() {
        $(this).removeClass('is-invalid');
        $(this).removeClass('has-error');
    });

});
    
</script>
@endpush