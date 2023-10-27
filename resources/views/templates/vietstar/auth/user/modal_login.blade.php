<!-- Modal -->
<div class="modal fade" id="user_login_Modal" tabindex="-1" role="dialog" aria-labelledby="user_login_ModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            <div class="modal-body">
                <div id="candidate" class="formpanel tab-pane ">
                    <h3>Đăng nhập</h3>
                    <form id ="formLogin" class="form-horizontal needs-validation" novalidate >
                        {{ csrf_field() }}
                        <input type="hidden" name="candidate_or_employer" value="candidate" />
                        <div class="formpanel">
                            <div class="formrow{{ $errors->has('email') ? ' has-error' : '' }}">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="{{__('Email Address')}}">
                             
                                <div class="invalid-feedback email-error">
                                    {{__('Email is required')}}
                                </div>
                           
                            </div>
                            <div class="formrow{{ $errors->has('password') ? ' has-error' : '' }}">
                                <input id="password" type="password" class="form-control" name="password" value="" required placeholder="{{__('Password')}}">
                                <div class="invalid-feedback password-error">
                                {{__('Password is required')}}
                                </div>
                            </div>
                            <div class="forgot-password-btn">
                                <a href="{{ route('company.password.request') }}">{{__('Forgot Your Password')}}?</a>
                            </div>
                            <input type="submit" onclick ="submitform()"  class="btn" value="{{__('Login')}}">
                        </div>

                        <div class="text-center ml-1" style="margin: 15px 0;">
                            <span>
                                Hoặc đăng nhập bằng
                            </span>
                        </div>
                        <!-- login form  end-->
                    </form>
                    <div class="socialLogin">
                        <a href="{{ url('login/jobseeker/facebook')}}" class="fb">
                            <i class="fab fa-facebook-f"></i>
                            <span>Facebook</span>
                        </a>
                        <a href="{{ url('login/jobseeker/google')}}" class="gp"><i class="fab fa-google"></i>
                            <span>Google</span>
                        </a>
                        {{--<a href="{{ url('login/jobseeker/twitter')}}" class="tw"><i class="fab fa-twitter"></i> <span>Twitter</span></a>--}}
                    </div>
                    <!-- sign up form -->
                    <div class="newuser">{{__('New User')}}?
                        <a href="#" data-toggle="modal" data-target="#user_logup_Modal" data-dismiss="modal" aria-label="Close">{{__('Register Here')}}</a>
                    </div>
                    <!-- sign up form end-->
                </div>
            </div>

        </div>
    </div>
</div>


@push('styles')
<style>
    .help-block {
        display: none;
    }
    .help-block.has_error {
        display: block;
        margin: 10px;
        color: red;
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

// $('#formLogin').on('submit', function(e) {
//     e.preventDefault(); 



//     $.ajax({
//         type: "POST",
//         url: '{{ route('login') }}',
//         data: $(this).serialize(),
//         success: function (data) {
            
            
//             console.log(data);
            
//             setTimeout(function() { 
//                 alert(data.message)
//                 window.location.href = data.urlRedirect;
//             }, 2000);
//             return window.location.href;
//         },
//         error: function (data, errorThrown) {
//             console.log(data.responseJSON);
//             if(data.responseJSON.error[0].key ==  'email'){
//                 $(`.help-block.${data.responseJSON.error[0].key}`).html(`${data.responseJSON.error[0].textError}`)
//                 $(`.help-block.${data.responseJSON.error[0].key}`).addClass('has_error')
//             }
//         }
//     }); 
//     });

$(document).ready(function() {
    $('#formLogin').submit(function(event) {
        var isValid = true;
        event.preventDefault()
        
        // Check each input field for emptiness
        $('#formLogin input').each(function() {
            if (!$(this).val()) {
                isValid = false;
                $(this).addClass('is-invalid');
              
            }
        });

        $("#formLogin").find(":input").prop("disabled", false);


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


        isValid = this.checkValidity();


        if (!isValid) {
            event.preventDefault(); // Prevent the form from submitting
        }
        if (isValid) { 
            $.ajax({
            type: "POST",
            url:  '{{ route('login') }}',
            data: $(this).serialize(),
            statusCode: {
                202 :  function(responseObject, textStatus, jqXHR) {
                    console.log(responseObject.error);
        
                },
                401: function(responseObject, textStatus, jqXHR) {
                    // No content found (404)
                    console.log(responseObject.responseJSON);
                    responseObject.responseJSON.error.forEach(err => {
                        $(`#formLogin .invalid-feedback.${err.key}-error`).text(err.textError)
                        $(`#formLogin .invalid-feedback.${err.key}-error`).addClass('has-error')
                        $(`#formLogin input[name*='${err.key}']`).addClass('has-error')
                    })
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
                    console.log(data);
                    
                })
                .fail(function(jqXHR, textStatus){
                    
                })
                .always(function(jqXHR, textStatus) {
                
                });
                }
    });

    // Remove validation class on input change
    $('#formLogin input').on('input', function() {
        $(this).removeClass('is-invalid');
    });
});

</script>