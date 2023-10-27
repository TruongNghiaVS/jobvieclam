<!-- Modal -->
<div class="modal fade" id="user_logup_Modal" tabindex="-1" role="dialog" aria-labelledby="user_logup_ModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body">
                <div id="candidate" class="formpanel">

                    <form id="candidate_formlogup" class="form-horizontal needs-validation"  novalidate>
                        <h3>Đăng Ký</h3>
                        {{ csrf_field() }}

                        <input type="hidden" name="candidate_or_employer" value="candidate" />
                        <div class="row">
                            <div class="formrow col {{ $errors->has('last_name') ? ' has-error' : '' }}">

                                <input type="text" name="last_name" class="form-control" required="required" placeholder="{{__('Last Name')}}" value="{{old('last_name')}}">
                                
                         
                              
                                <div class="invalid-feedback first_name-error">
                                    {{__('Last Name is required')}}
                                </div>
                            </div>


                            <div class="formrow col {{ $errors->has('middle_name') ? ' has-error' : '' }}">

                                <input type="text" name="middle_name" class="form-control" required="required" placeholder="{{__('Middle Name')}}" value="{{old('middle_name')}}">
                                
                                
                             
                               
                                <div class="invalid-feedback first_name-error">
                                    {{__('Middle Name is required')}}
                                </div>
                             
                            </div>
                            <div class="formrow col {{ $errors->has('first_name') ? ' has-error' : '' }}">

                                <input type="text" name="first_name" class="form-control" required="required" placeholder="{{__('First Name')}}" value="{{old('first_name')}}">
                       

                                <div class="invalid-feedback first_name-error">
                                    {{__('First Name is required')}}
                                </div>
                              
                            </div>
                        </div>


                        <div class="formrow{{ $errors->has('email') ? ' has-error' : '' }}">

                            <input type="email" name="email" class="form-control" required="required" placeholder="{{__('Email')}}" value="{{old('email')}}">
                            <div class="invalid-feedback email-error">
                                {{__('Email is required')}}
                            </div>
                        </div>

                        <div class="formrow{{ $errors->has('password') ? ' has-error' : '' }}">

                            <input type="password" name="password" class="form-control" required="required" placeholder="{{__('Password')}}" >

                    
                            <div class="invalid-feedback password-error">
                                {{__('Password is required')}}
                            </div>

                        </div>

                        <div class="formrow{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">

                            <input type="password" name="password_confirmation" class="form-control" required="required" placeholder="{{__('Password Confirmation')}}" >

                            <span class="help-block password_confirmation">
                            </span> 
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

                        <input type="submit" class="btn" value="{{__('Đăng ký')}}">

                    </form>
                    <div class="newuser">{{__('Have Account')}}?
                        <a href="#" data-toggle="modal" data-target="#user_login_Modal" data-dismiss="modal" aria-label="Close">{{__('Login')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@push('styles')
<style>
    .invalid-feedback {
        display: none;
    }
    .invalid-feedback.has-error {
        display: block;
    }
    .form-control.has-error{
        border: 1px solid #dc3545 !important;
    }

</style>
@endpush


<script>
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
    $('#candidate_formlogup').submit(function(event) {
        var isValid = true;
        event.preventDefault()
        // Check each input field for emptiness
        $('#candidate_formlogup input').each(function() {
            if (!$(this).val()) {
                isValid = false;
                $(this).addClass('is-invalid');
              
            }
        });
        $("#candidate_formlogup").find(":input").prop("disabled", false);
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

        if (isValid) { 
            $.ajax({
            type: "POST",
            url:  '{{ route('register') }}',
            data: $(this).serialize(),
            statusCode: {
                202 :  function(responseObject, textStatus, jqXHR) {
                    console.log(responseObject.error);
                if(responseObject.error) {
                    responseObject.error.forEach(err => {
                        $(`#candidate_formlogup .invalid-feedback.${err.key}-error`).text(err.textError)
                        $(`#candidate_formlogup .invalid-feedback.${err.key}-error`).addClass('has-error')
                        $(`#candidate_formlogup input[name*='${err.key}']`).addClass('has-error')
                        
                        // $(`#candidate_formlogup .invalid-feedback.${err.key}-error`).append(err.textError)
                     
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
                    // console.log(data);
                    // setTimeout(function() { 
                    //     alert("Đang")
                    //     window.location.href = ;
                    // }, 2000);
                    
                })
                .fail(function(jqXHR, textStatus){
                    
                })
                .always(function(jqXHR, textStatus) {
                
                });
                }
    });

    // Remove validation class on input change
    $('#candidate_formlogup input').on('input', function() {
        $(this).removeClass('is-invalid');
    });
    
    
});
    


</script>