@extends('templates.vietstar.layouts.app')
@section('content')
<!-- Header start -->
@include('templates.vietstar.includes.header')
@include('templates.vietstar.includes.mobile_dashboard_menu')

<!-- Header end -->
<!-- Inner Page Title start -->
<section class="hero-banner-company-profile" style="background-image: url(/vietstar/imgs/company-cover.jpg);"></section>
    <!-- Bootstrap CSS -->
<!-- jQuery first, then Bootstrap JS. -->
<!-- Nav tabs -->
<div class="container">

<ul class="nav nav-tabs justify-content-center" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" href="#about-us" role="tab" data-toggle="tab">
        <h4 class="text-center text-uppercase text-primary mb-0">
            Về Chúng Tôi
        </h4>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#culture" role="tab" data-toggle="tab"> 
        <h4 class="text-center text-uppercase text-primary  mb-0">
            Về Văn Hóa
        </h4>
    </a>
  </li>

</ul>
</div>


<!-- Tab panes -->
<div class="tab-content">
  <div role="tabpanel" class="tab-pane fade in active" id="about-us">
        
        <section class="about-us-section ">
             
            <div class="container">
                <div class="row about_us_content justify-content-md-center " bis_skin_checked="1">
                    <div class="col-lg-5 col-md-12 col-sm-12  about_us_img animation fade-left ">
                        <img src="https://vietstargroup.vn/assets/img/hoatdong.jpeg" class="img_left_about">
                    </div>
                    <div class="col-lg-7  col-md-12  col-sm-12  d-flex align-items-center animation fade-right">
                        <div class="content_title" bis_skin_checked="1">
                            <div class="title" bis_skin_checked="1">
                                <h2>
                                Về Jobvieclam.com</h2>
                            </div>
                            <div class="text" bis_skin_checked="1">
                                <p>
                                Jobvieclam.com là một nền tảng hàng đầu cung cấp giải pháp nhân sự toàn diện cho doanh nghiệp, giúp  tối ưu hóa quá trình tuyển dụng và quản lý nhân sự. Với mục tiêu tạo ra sự kết nối hiệu quả giữa doanh nghiệp và ứng viên, Jobvieclam.com không chỉ là một cầu nối thông tin tuyển dụng mà còn là đối tác đáng tin cậy đồng hành cùng sự phát triển của doanh nghiệp.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="feature_section ">
             
             <div class="container">
                <h4 class="text-center mb-4 text-uppercase text-primary">
                    Các ưu điểm nổi bật của Jobvieclam.com
                </h4>
                 <div class="row  g-0 about_us_feature justify-content-md-center "  id="about_us_feature" bis_skin_checked="1">
                     <div class="col-lg-4 col-md-12 col-sm-12 p-2 animation fade-top active">
                            <div class="number">
                                    <strong>
                                       01
                                    </strong>
                            </div>

                            <div class="title">
                                   <h3>Đa dạng về Ngành Nghề</h3>
                            </div>
                            <div class="text">
                                   <p>
                                        Jobvieclam.com cung cấp hàng ngàn cơ hội việc làm trong nhiều lĩnh vực khác nhau, từ sản xuất đến dịch vụ, từ công nghệ thông tin đến tài chính, giúp doanh nghiệp dễ dàng tìm kiếm ứng viên phù hợp với nhu cầu tuyển dụng của doanh nghiệp.
                                    </p>
                            </div>
                     </div>
                     <div class="col-lg-4 col-md-12 col-sm-12 p-2 animation fade-top active">
                            <div class="number">
                                    <strong>
                                       02
                                    </strong>
                            </div>

                            <div class="title">
                                   <h3>Tích hợp Công Nghệ</h3>
                            </div>
                            <div class="text">
                                   <p>
                                    Với việc sử dụng công nghệ tiên tiến, Jobvieclam.com tạo ra trải nghiệm tuyển dụng mượt mà và hiệu quả. Giao diện dễ sử dụng và tính năng tìm kiếm thông minh giúp doanh nghiệp tiết kiệm thời gian và năng lực trong quá trình tìm kiếm ứng viên.

                                    </p>
                            </div>
                     </div>
                     <div class="col-lg-4 col-md-12 col-sm-12 p-2 animation fade-top active">
                            <div class="number">
                                    <strong>
                                       03
                                    </strong>
                            </div>

                            <div class="title">
                                   <h3>Hệ Thống Đánh Giá và Phản Hồi</h3>
                            </div>
                            <div class="text">
                                   <p>
                                   Jobvieclam.com không chỉ giúp doanh nghiệp tìm kiếm ứng viên, mà còn hỗ trợ trong quá trình đánh giá chất lượng của họ. Hệ thống đánh giá và phản hồi từ người sử dụng giúp tạo ra một cộng đồng chia sẻ thông tin chân thực về các công ty và vị trí làm việc.
                                    </p>
                            </div>
                     </div>
                     <div class="col-lg-4 col-md-12 col-sm-12 p-2 animation fade-top active">
                            <div class="number">
                                    <strong>
                                       04
                                    </strong>
                            </div>

                            <div class="title">
                                   <h3>Tư Vấn và Hỗ Trợ</h3>
                            </div>
                            <div class="text">
                                   <p>
                                   Đội ngũ tư vấn chuyên nghiệp của Jobvieclam.com sẵn sàng hỗ trợ doanh nghiệp trong quá trình tìm kiếm, lựa chọn và giữ chân nhân sự. Họ cung cấp các giải pháp tùy chỉnh để đáp ứng nhu cầu cụ thể của từng doanh nghiệp.

                                    </p>
                            </div>
                     </div>
                     <div class="col-lg-4 col-md-12 col-sm-12 p-2 animation fade-top active">
                            <div class="number">
                                    <strong>
                                       05
                                    </strong>
                            </div>

                            <div class="title">
                                   <h3>Bảo Mật Thông Tin</h3>
                            </div>
                            <div class="text">
                                   <p>
                                   Jobvieclam.com cam kết bảo vệ thông tin của doanh nghiệp và ứng viên một cách nghiêm túc. Hệ thống bảo mật thông tin cá nhân được xây dựng đồng bộ để đảm bảo an toàn và tin cậy.
                                    </p>
                            </div>
                     </div>
                     
                 </div>

                
             </div>
        </section>
        <section class="feature_section_end ">
            <div class="container" bis_skin_checked="1">
            <div class="row  g-0 about_us_feature justify-content-md-center "  id="about_us_feature" bis_skin_checked="1">
                     <div class="col-lg-8 col-md-12 col-sm-12 p-2  text-center">
                        Jobvieclam.com không chỉ là một cầu nối tuyển dụng mà còn là đối tác chiến lược, hỗ trợ doanh nghiệp xây dựng đội ngũ nhân sự mạnh mẽ và linh hoạt để đối mặt với thách thức của thị trường lao động đang thay đổi liên tục.
                     </div>
              
            </div>
                
        </section>

        <section class="our_customer cb-section">
            <div class="container" bis_skin_checked="1">
                <h4 class="text-center mb-4 text-uppercase text-primary">
                    Khách hàng của chúng tôi
                </h4>
                <div class="container-company" bis_skin_checked="1">
                    <div class="group-company aos-init aos-animate" bis_skin_checked="1">
                        <div class="trust-by animation fade-left active" bis_skin_checked="1"><img src="https://employer.vietnamworks.com/v2/img/partner/1.svg" alt="">
                        </div>
                        <div class="trust-by animation fade-left active" bis_skin_checked="1"><img src="https://employer.vietnamworks.com/v2/img/partner/2.svg" alt="">
                        </div>
                        <div class="trust-by animation fade-left active" bis_skin_checked="1"><img src="https://employer.vietnamworks.com/v2/img/partner/9.svg" alt="">
                        </div>
                        <div class="trust-by animation fade-left active" bis_skin_checked="1"><img src="https://employer.vietnamworks.com/v2/img/partner/3.svg" alt="">
                        </div>
                        <div class="trust-by animation fade-left active" bis_skin_checked="1"><img src="https://employer.vietnamworks.com/v2/img/partner/4.svg" alt="">
                        </div>
                        <div class="trust-by animation fade-right active" bis_skin_checked="1"><img src="https://employer.vietnamworks.com/v2/img/partner/10.svg" alt=""></div>
                        <div class="trust-by animation fade-right active" bis_skin_checked="1"><img src="https://employer.vietnamworks.com/v2/img/partner/7.svg" alt=""></div>
                        <div class="trust-by animation fade-right active" bis_skin_checked="1"><img src="https://employer.vietnamworks.com/v2/img/partner/6.svg" alt=""></div>
                        <div class="trust-by animation fade-right active" bis_skin_checked="1"><img src="https://employer.vietnamworks.com/v2/img/partner/bosch_global.jpg" alt=""></div>
                        <div class="trust-by animation fade-right active" bis_skin_checked="1"><img src="https://employer.vietnamworks.com/v2/img/partner/8.svg" alt="">
                        </div>
                    </div>
                
                </div>
            </div>
        </section>


    
  </div>
  <div role="tabpanel" class="tab-pane fade" id="culture">
sá
  </div>

</div>




@push('styles')
<style>
    .cb-section.about-us-section {
        padding: 20px 0;
    }
    .feature_section{
        padding-top: 20px;
    } 
    .feature_section_end{
        padding-top: 20px;

    }
    .our_customer.cb-section{
        padding-top: 20px;
    }
  
    .about-us-section .about_us_img  {
        display: flex;
        justify-content: start;
    }
    .about-us-section .about_us_img img {
        width: 100%;
        border-radius: 20px;
    }

    .about_us_content .content_title{
        padding-left: 30px;
    }

    .about_us_content .content_title .title{
        margin-bottom: 25px;
      
    }
    .about_us_content .content_title .title h2 {
        font-size: 25px;
        color: var(--bs-primary);
        font-size: 29px;
    }

    .content_title .text {
        
        padding-right: 10px;

        color: #5d677a;
        font-size: 16px;
        font-weight: 500;
        line-height: 1.4;
        text-align: justify;
    }

    .content_title .text p{
        
        padding-right: 10px;
        color: #5d677a;
        font-size: 16px;
        font-weight: 500;
        line-height: 2rem;
        text-align: justify;
    }

    .about_us_feature .number {
        margin-bottom: 25px;
    }
    .about_us_feature .number strong{
        font-size: 34px;
        color: var(--bs-primary);
       
    }


    .about_us_feature .title{
        font-size: 24px;
        color: #141414;
        margin-bottom: 10px;

    }


    .about_us_feature .text p{
        font-size: 16px;
        line-height: 27px;
        -webkit-line-clamp: 5;
        -webkit-box-orient: vertical;
        display: -webkit-box;
        overflow: hidden;
    }



</style>
@endpush


@include('templates.vietstar.includes.footer')
@endsection