@extends('templates.vietstar.layouts.app')
@section('content')
<!-- Header start -->
@include('templates.vietstar.includes.header')
<form class="form-horizontal" method="POST" action="{{ route('company.password.email') }}"></form>
<!-- Header end --> 
<div class="cb-section">
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
							<h2>Quên Mật Khẩu</h2>
						</div>
            <div class="step-title d-flex align-center" bis_skin_checked="1">
                <div class="main-step-title" bis_skin_checked="1">
                    <h3>Chúng tôi sẽ gửi email hướng dẫn bạn tạo mật khẩu mới</h3>
                </div>
            </div>
				      <div class="main-form" bis_skin_checked="1">
					       <form action="" method="post" id="forgetpass" name="forgetpass">
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
                    <button type="submit" class="btn-action" value="Gửi">Gửi </button>
                  </div>
                  <p> <a class="register" href="javascript:void()" onclick="location.href='https://careerbuilder.vn/vi/employers/register'">Quý khách chưa có tài khoản?</a> Đăng ký dễ dàng, hoàn toàn miễn phí</p>
                
                 	<div class="text-help" bis_skin_checked="1">
											<p>Nếu bạn cần sự trợ giúp, vui lòng liên hệ:</p>
											<p>Email:  <a href="mailto:support@careerbuilder.vn" target="_blank">support@careerbuilder.vn</a></p>
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
    .box-img {
        margin-right: -50px;
        width: 100%;
    }
   .box-img img {
        width: 100%;
    }
    .box-info-signup{
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
        flex: 0 0 200px;
        max-width: 200px;
    }

</style>
@endpush

