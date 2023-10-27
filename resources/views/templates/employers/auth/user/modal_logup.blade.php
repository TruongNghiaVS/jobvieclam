<!-- Modal -->
<div class="modal fade" id="employer_logup_Modal" tabindex="-1" role="dialog" aria-labelledby="employer_logup_ModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body">
                <div id="employer" class="formpanel">

                    <form id ="fromEmployerRegister" class="form-horizontal" method="POST" action="{{ route('company.register') }}">
                        <h3>{{__('Employers')}} / {{__('Register')}}</h3>
                        {{ csrf_field() }}

                        <input type="hidden" name="candidate_or_employer" value="employer" />

                        <div class="formrow{{ $errors->has('name') ? ' has-error' : '' }}">

                            <input type="text" name="name" class="form-control" required="required" placeholder="{{__('Name')}}" value="{{old('name')}}">

                            @if ($errors->has('name')) <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong> </span> @endif
                        </div>

                        <div class="formrow{{ $errors->has('email') ? ' has-error' : '' }}">

                            <input type="email" name="email" class="form-control" required="required" placeholder="{{__('Email')}}" value="{{old('email')}}">

                            @if ($errors->has('email')) <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong> </span> @endif
                        </div>

                        <div class="formrow{{ $errors->has('password') ? ' has-error' : '' }}">

                            <input type="password" name="password" class="form-control" required="required" placeholder="{{__('Password')}}" value="">

                            @if ($errors->has('password')) <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong> </span> @endif
                        </div>

                        <div class="formrow{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">

                            <input type="password" name="password_confirmation" class="form-control" required="required" placeholder="{{__('Password Confirmation')}}" value="">

                            @if ($errors->has('password_confirmation')) <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong> </span>
                            @endif
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

                            @if ($errors->has('is_subscribed')) <span class="help-block">
                                <strong>{{ $errors->first('is_subscribed') }}</strong> </span> @endif
                        </div>




                        <div class="formrow{{ $errors->has('terms_of_use') ? ' has-error' : '' }}">

                            <input type="checkbox" value="1" name="terms_of_use" />

                            <a href="{{url('terms-of-use')}}">{{__('I accept Terms of Use')}}</a>
                            @if ($errors->has('terms_of_use')) <span class="help-block">
                                <strong>{{ $errors->first('terms_of_use') }}</strong> </span> @endif
                        </div>

                        <div class="form-group col-12 col-sm-12 col-md-10 text-center mx-auto mobile-padding-no {{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                            {!! app('captcha')->display() !!}
                            @if ($errors->has('g-recaptcha-response')) <span class="help-block">
                                <strong>{{ $errors->first('g-recaptcha-response') }}</strong> </span> @endif
                        </div>

                        <input type="submit" class="btn" value="{{__('Đăng ký')}}">

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
  $('#fromEmployerRegister').on('submit', function(e) {
    e.preventDefault(); 
    $.ajax({
        type: "POST",
        url: '{{ route('company.register') }}',
        data: $(this).serialize(),
        success: function (data) {
            
            var response =data.responseJSON;
        
            window.location.href = response.urlRedirect;
            return;
             
      
        },
        error: function (data, errorThrown) {
            console.log(data.responseJSON);
            
            
        }
    });
});
</script>