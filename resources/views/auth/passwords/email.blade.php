@extends('templates.vietstar.layouts.app')
@section('content')
<!-- Header start -->
@include('templates.vietstar.includes.header')

<!-- Header end -->
<div class="reset-password-section cb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="box-img">
                    <img src="https://images.careerbuilder.vn/content/images/Banner/pic-laptop.png" alt="">
                </div>
            </div>
            <div class="col-lg-6" bis_skin_checked="1">
                <div class="box-info-signup forgot-password" bis_skin_checked="1">
                    <div class="title" bis_skin_checked="1">
                        <h2 class="text-primary">Quên Mật Khẩu</h2>
                    </div>
                    <div class="step-title d-flex align-center" bis_skin_checked="1">
                        <div class="main-step-title" bis_skin_checked="1">
                            <h3>Chúng tôi sẽ gửi email hướng dẫn bạn tạo mật khẩu mới</h3>
                        </div>
                    </div>
                    <div class="main-form" bis_skin_checked="1">
                        <form class="form-horizontal" method="POST" action="">
                            <div class="form-group d-flex" bis_skin_checked="1">
                                <div class="form-info" bis_skin_checked="1">
                                    <span>Email</span>
                                </div>
                                <div class="form-input" bis_skin_checked="1">
                                    <input type="text" name="email" id="email" class="form-control" placeholder=" Vui lòng nhập thông tin" onkeyup="this.setAttribute('value', this.value);" value="" onfocus="javascript:if(this.value=='Email/Tên đăng nhập') this.value='';">
                                    <span class="form-error error_email">
                                    </span>
                                </div>
                            </div>
                            <div class="form-group d-flex" bis_skin_checked="1">
                                <div class="form-info" bis_skin_checked="1">
                                    <span>Mã xác nhận</span>
                                </div>
                                <div class="form-input short" bis_skin_checked="1">
                                    <input type="text" name="security_code" maxlength="4" placeholder=" Vui lòng nhập thông tin" id="security_code" onkeyup="this.setAttribute('value', this.value);" value="" autocomplete="off" class="form-control">


                                    <span class="form-error error_security_code">
                                    </span>


                                </div>
                                <div class="box-captcha d-flex" bis_skin_checked="1">
                                    <div class="capcha" id="captchaim" bis_skin_checked="1">
                                        <img width="150" height="50" alt="captcha" src="https://images.careerbuilder.vn/rws/captcha/1d1dda169fd806b6219ae9ff29e9f941.png" class="img_code"><input type="hidden" name="key_captcha" id="key_captcha" value="1d1dda169fd806b6219ae9ff29e9f941">
                                    </div>

                                    <div class="reCapcha" style="font-size: 24px;" bis_skin_checked="1">
                                        <a onclick="refeshImgCaptcha('captchaim');" href="javascript:void(0);">
                                            <em class="fa fa-repeat"></em></a>
                                    </div>
                                </div>
                            </div>
                            <div class="user-action" bis_skin_checked="1">
                                <div class="btn-area" bis_skin_checked="1">
                                    <button type="submit" class="btn btn-primary" value="Gửi">Gửi</button>
                                </div>
                                <p> <a class="register" href="#" data-toggle="modal" data-target="#user_logup_Modal">Quý khách chưa có tài khoản?</a> Đăng ký dễ dàng, hoàn toàn miễn phí</p>

                                <div class="text-help" bis_skin_checked="1">
                                    <p>Nếu bạn cần sự trợ giúp, vui lòng liên hệ:</p>
                                    <p>Email: <a href="#" target="_blank">support@jobvieclam.com</a></p>
                                </div>
                            </div>
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
    .reset-password-section.cb-section {
        padding: 60px 0;
    }
    .reset-password-section.cb-section .container {
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
        margin-left: 50px;
    }

    .box-info-signup .title h2 {
        margin-bottom: 35px;
    }

    .box-info-signup .main-step-title h3 {
        text-transform: uppercase;
        font-weight: normal;
        font-size: 22px;
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
        height: 45px;
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
    .user-action {
        text-align: right;
    }
  
    .user-action > * {
        margin-bottom: 20px;
    }

</style>
@endpush