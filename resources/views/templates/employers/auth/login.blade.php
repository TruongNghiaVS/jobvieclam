@extends('templates.vietstar.layouts.app')
@section('content')
<!-- Header start -->
@include('templates.employers.includes.header')
<!-- Header end -->
@include('templates.employers.includes.mobile_dashboard_menu')
<div class="login-form shadow">
    <div class="container">
        @include('flash::message')
        <div class="row g-0 login-swapper shadow">
            <div class="col-6">
                <div class="login-img-swapper">
                    <div class="login-img-swapper__img">
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="useraccountwrap">
                    <div class="userccount">
                        <div class="userbtns">
                            <ul class="nav nav-tabs login-nav-tabs">
                                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#login-tab" aria-expanded="true">{{__('Login')}}</a>
                                </li>
                                <li class="nav-item"><a class="nav-link " data-toggle="tab" href="#logup-tab" aria-expanded="false">{{__('Register')}}</a>
                                </li>
                            </ul>
                        </div>

                        <div class="tab-content">
                            <div id="login-tab" class="formpanel tab-pane active">

                                <h3>{{__('Employers')}} / {{__('Login')}}</h3>
                                <form class="form-horizontal" method="POST" action="{{ route('company.login') }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="candidate_or_employer" value="employer" />
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
                            <div id="logup-tab" class="formpanel tab-pane fade">
                                <div id="employer" class="formpanel">

                                    <form class="form-horizontal" method="POST" action="{{ route('company.register') }}">
                                        <h3>{{__('Employers')}} / {{__('Logup')}}</h3>
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


                            {{--
                            <div id="candidate" class="formpanel tab-pane">
                                <h3>{{__('Employers')}} {{__('Employers')}}</h3>
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
                                <!-- <a href="{{ url('login/jobseeker/twitter')}}" class="tw"><i class="fab fa-twitter"></i> <span>Twitter</span></a> -->
                            </div>
                            <!-- sign up form -->
                            <div class="newuser">{{__('New User')}}?
                                <a href="{{route('register')}}">{{__('Register Here')}}</a>
                            </div>
                            <!-- sign up form end-->
                        </div>
                        --}}



                        <!-- login form -->
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>
@include('templates.employers.includes.footer')
@endsection