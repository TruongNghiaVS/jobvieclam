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
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="candidate_or_employer" value="candidate" />
                        <div class="formpanel">
                            <div class="formrow{{ $errors->has('email') ? ' has-error' : '' }}">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="{{__('Email Address')}}">
                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="formrow{{ $errors->has('password') ? ' has-error' : '' }}">
                                <input id="password" type="password" class="form-control" name="password" value="" required placeholder="{{__('Password')}}">
                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="forgot-password-btn">
                                <a href="{{ route('company.password.request') }}">{{__('Forgot Your Password')}}?</a>
                            </div>
                            <input type="submit" class="btn" value="{{__('Login')}}">
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
                        <a href="{{route('register')}}">{{__('Register Here')}}</a>
                    </div>
                    <!-- sign up form end-->
                </div>
            </div>
        </div>
    </div>
</div>