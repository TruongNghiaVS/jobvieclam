@extends('templates.vietstar.layouts.app')

@section('content')


@include('templates.vietstar.includes.header')

<!-- Company cover -->

@include('templates.vietstar.includes.mobile_dashboard_menu')





<!-- Main content -->
<section class="company-wrapper main-content" id="main-content">
    <!-- Hero banner -->
    @php
        $jobs = $company->jobs;
        $minSal = count($jobs->pluck('salary_from')->toArray()) > 0 ? min($jobs->pluck('salary_from')->toArray()) : 0;
        $maxSal = count($jobs->pluck('salary_to')->toArray()) > 0 ? max($jobs->pluck('salary_to')->toArray()) : 0;
        $avaragedSal = $maxSal/2 + $minSal/2;
       
    @endphp
    @if(isset($company->cover_logo))
        <section class="hero-banner-company-profile container" style="background-image: url({{url('/')}}/company_logos/{{$company->cover_logo}});"></section>
    @else 
        <section class="hero-banner-company-profile container" style="background-image: url({{url('/')}}/admin_assets/no-cover.png);"></section>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 ">
                <section class="section-company-profile">
                    <div class="container-hm">
                        <div class="row">
                            <div class="col-lg-9  col-md-12 col-sm-12">

                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-12 d-flex justify-content-center align-items-center">
                                        <div class="logo">
                                            {{ $company->locale_get_display_region }}
                                        @if(isset($company->logo) )
                                            <img src="{{url('/')}}/company_logos/{{$company->logo}}" alt="{{ $company->name }}">

                                        @else 
                                            <img src="{{url('/')}}/admin_assets/no-company.png" alt="{{ $company->name }}">
                                        @endif
                                        </div>

                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-12">
                                        <div class="box-content">
                                            <h2 class="company-name">{{ $company->name }}</h2>
                                            @if($company->industry)
                                            <p class="company-position">
                                                {{ !empty($company->industry)?$company->industry->industry : '' }}
                                            </p>
                                            
                                            @endif
                                            <div class="company-info public">
                                                <div class="d-flex flex-column">
                                                    <strong class="p-0"> {{__('Location')}} </strong>
                                                    <p>

                                                        {{ $company->location }}
                                                    </p>
                                                </div>
                                                <hr class="m-1">

                                                <strong class="p-0"> {{__('Company Information')}} </strong>

                                                @if($company->no_of_employees)
                                                <div class="company-info__item">
                                                    <i class="bi bi-people-fill"></i>
                                                    {{__('Company size')}}: {{ $company->no_of_employees }}
                                                </div>
                                                @endif
                                                @if($company->no_of_employees)
                                                <div class="company-info__item">
                                                    <i class="bi bi-list"></i>
                                                    {{__('Field of operations')}}: {{ $company->no_of_employees }}
                                                </div>
                                                @endif
                                                @if($company->website)
                                                <div class="company-info__item">
                                                    <i class="bi bi-link"></i>
                                                    {{__('Website')}}: <a class="text-pray" href="{{ $company->website }}">{{ $company->website }}</a>
                                                </div>
                                                @endif
                                                <div class="socials">
                                                    <a href="{{ isset($company->facebook) ? $company->facebook:""   }}" class="social" target="_blank"><i class="fab fa-facebook-f  me-3"></i></a>
                                                    <a href="{{ isset($company->linkedin) ? $company->linkedin:""   }}" class="social" target="_blank"><i class="fab fa-linkedin-in  me-3"></i></span></a>
                                                    <a href="{{ isset($company->twitter) ? $company->twitter:""   }}" class="social" target="_blank"><i class="fab fa-twitter  me-3"></i></a>
                                                    <a href="{{ isset($company->google_plus) ? $company->google_plus:""   }}" class="social" target="_blank"><i class="fa-brands fa-google-plus  me-3"></i></a>
                                                </div>


                                            </div>

                                        </div>
                                    </div>




                                </div>
                            </div>
                            <div class="col-lg-3 col-md-12 col-sm-12 d-flex flex-column justify-content-start align-items-center">

                                <div class="group-button job-detail-banner__actions job-detail-banner_info_actions d-flex flex-row gap-16">
                                    {{--<form action="{{ route('seeker.submit-message', ['message' => 'Xin chào!', 'company_id' => $company->id, 'new' => true]) }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-primary"><span class="icon icon-recruiter-email"></span>{{__('Send message')}}</button>
                                    </form>--}}
                                    @if(Auth::check() && Auth::user()->isFavouriteCompany($company->slug))
                                    <a href="{{ route('remove.from.favourite.company', ['company_slug' => $company->slug])}}" class="btn btn-outline-primary"><i class="fas fa-heart iconoutline"></i>
                                        {{__('Favourite company')}} </a>
                                    @else
                                    <a href="{{ route('add.to.favourite.company', ['company_slug' => $company->slug]) }}" class="btn btn-outline-primary"><i class="fa-regular fa-heart"></i>
                                        {{__('Follow company')}}</a>
                                    @endif
                                </div>


                            </div>
                        </div>
                    </div>
                </section>
               
                <section class="section-company-profile-detail">
                    <div class="row">
                        <div class="col-lg-8 col-md-12 col-sm-12 ">
                            <div class="widget-public-profile widget-about">
                                    <h4 class="title">{{__('About Company')}}</h4>

                                    <div class="about-company">
                                        @if(isset($company->description))
                                            {!! $company->description !!}
                                        @else
                                            <p class="non-item text-primary">Chưa có mô tả cho công ty</p>
                                        @endif

                                    </div>
                            </div>
                            @if(isset($company->map))
                                <div class="widget-public-profile widget-about">
                                        <h4 class="title">Map</h4>

                                        <div class="company-map">
                                            {!!$company->map!!}
                                        </div>
                                </div>
                            @endif
                            
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12 ">  
                            <div class="widget-public-profile widget-about"> 
                        
                                <h4 class="title">VIỆC LÀM ĐANG TUYỂN</h4>
                                @if ($openingJob !== null && count($openingJob) > 0)
                                    <div class="company-jobs-wapper jobs-side-list">
                                            @foreach ($openingJob as $cjob)
                                                <?php
                                                    $functionarea = $cjob->functionalArea;
                                                    
                                                    $city = $cjob->city ? $cjob->city->city :" ";
                                                    $from = round($cjob->salary_from/1000000,0);
                                                    $to = round($cjob->salary_to/1000000,0);
                                                ?>
                                                    <div class="company-jobs-item item-job mb-3">
                                                        <div class="logo-company">
                                                            @if($cjob->logo)
                                                            <a href="#"
                                                                title="{{$cjob->getCompany('name')}}" class="pic">
                                                                <img src="{{ asset('company_logos/'.$cjob->logo) }}"
                                                                    style="max-width:140px; max-height:140px;" alt="{{$cjob->getCompany('name')}}"
                                                                    title="{{$cjob->getCompany('name')}}">
                                                            </a>
                                                            @else

                                                            <a href="#"
                                                                title="{{$cjob->getCompany('name')}}" class="pic">
                                                                {{$company->printCompanyImage()}}
                                                            </a>
                                                            @endif
                                                        </div>

                                                        <div class="jobinfo">
                                                            <div class="info" bis_skin_checked="1">
                                                                <!-- Title  Start-->
                                                                <div class="info-item job-title-box" bis_skin_checked="1">
                                                                    <div class="job-title" bis_skin_checked="1">
                                                                        <span>Mới</span>
                                                                        <h3 class="job-title-name"><a
                                                                                href="{{url('/')}}/viec-lam/{{ $cjob->slug }}"
                                                                                title="{{ $cjob->title }}">{{ $cjob->title }}</a></h3>
                                                                    </div>
                                                                    @if(Auth::check() && Auth::user()->isFavouriteJob($cjob->slug))
                                                                    <a class="save-job active"
                                                                        href="{{url('/')}}/add-to-favourite-job/{{ $cjob->slug }}"><i
                                                                            class="far fa-heart"></i>
                                                                    </a>
                                                                    @else
                                                                    <a class="save-job"
                                                                        href="{{url('/')}}/add-to-favourite-job/{{ $cjob->slug }}"><i
                                                                            class="far fa-heart"></i>
                                                                    </a>
                                                                    @endif
                                                                </div>
                                                                <!-- Title  End-->

                                                                <!-- companyName Start-->
                                                                <div class="info-item companyName" bis_skin_checked="1"><a
                                                                        href="{{url('/')}}/cong-ty/{{ $cjob->getCompany('slug') }}"
                                                                        title="{{ $cjob->getCompany('name') }}n">{{$cjob->getCompany('name') }}</a>
                                                                </div>
                                                                <!-- companyName End-->
                                                                <!--rank-salary and place Start-->
                                                                <div class="info-item box-meta" bis_skin_checked="1">
                                                                    <div class="rank-salary" bis_skin_checked="1">
                                                                    
                                                                            
                                                                                @if($cjob->salary_type == \App\Job::SALARY_TYPE_FROM)
                                                                                {{__('From: ')}} {{$from}}
                                                                                {{__('million')}} ({{$cjob->salary_currency}})
                                                                                @elseif($cjob->salary_type == \App\Job::SALARY_TYPE_TO)
                                                                                {{__('Up To: ')}} {{$to}}
                                                                                {{__('million')}} ({{$cjob->salary_currency}})
                                                                                @elseif($cjob->salary_type == \App\Job::SALARY_TYPE_RANGE)
                                                                                {{$from}} - {{$to}}
                                                                                {{__('million')}} ({{$cjob->salary_currency}})
                                                                                @elseif($cjob->salary_type == \App\Job::SALARY_TYPE_NEGOTIABLE)
                                                                                <span class="fas fa-money-bill"></span> {{__('Negotiable')}}
                                                                                @else
                                                                                {{__('Salary Not provided')}}
                                                                                @endif

                                                                    </div>
                                                                
                                                                    <!--meta-city-->
                                                                    <div class="navbar__link-separator" bis_skin_checked="1"></div>
                                                                    
                                                                    <div class="meta-city" bis_skin_checked="1">
                                                                        {{$city}}
                                                                
                                                                    </div>


                                                                    <!-- Bán thời gian -->
                                                                </div>
                                                                <!--Rank-salary and place End-->

                                                                <!--Day update and place Start-->
                                                                <div class="info-item day-update" bis_skin_checked="1">
                                                                    Hạn Nộp: {{$cjob->expiry_date->format('d/m/Y')}}  
                                                                </div>
                                                                <!--Day update and place End-->

                                                                <!-- <div class="short-description">M&amp;ocirc; tả c&amp;ocirc;ng việc</div> -->
                                                            </div>
                                                            <div class="caption" bis_skin_checked="1">
                                                                <div class="welfare" bis_skin_checked="1">
                                                                @if($functionarea)

                                                                    <div class="box-meta" bis_skin_checked="1">
                                                                        <!-- <i class="fas fa-dollar-sign"></i>  -->
                                                                        <span>
                                                                            <!-- Chế độ thưởng -->
                                                                            {{$functionarea->functional_area }}
                                                                        </span>

                                                                    </div>
                                                                @endif
                                                                    

                                                                </div>

                                                                <div class="user-actio" bis_skin_checked="1">

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                
                                            @endforeach
                                        </div>
                                @else
                                    <p class="non-item text-primary">Chưa có việc làm</p>
                                @endif                                
                            </div>
                        </div>
                        <!-- Công ty liên quan -->
                        <div class="col-12">
                            <div class="widget-public-profile widget-about"> 
                                <h4 class="title">CÁC CÔNG TY NỔI BẬT</h4>
                                <div class="swiper partnerSlider swiper-initialized swiper-horizontal swiper-pointer-events">
            <div class="swiper-wrapper" id="swiper-wrapper-64a841582f2e843b" aria-live="off" style="transform: translate3d(-1936px, 0px, 0px); transition-duration: 0ms;"><div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-prev" data-swiper-slide-index="2" role="group" aria-label="3 / 7" style="width: 232px; margin-right: 10px;">
                        <div class="partner-item__box">
                                                        <a alt="1 slide" href="https://jobvieclam.com/cong-ty/cong-ty-tnhh-concentrix-service-vietnam-182" title="Công ty TNHH Concentrix Service Vietnam">
                                <img src="https://jobvieclam.com/company_logos/cong-ty-tnhh-concentrix-service-vietnam-1710919659-829.png" class="partner-item__img" alt="1 slide">
                            </a>
                                                        <h3 class="partner-item__name">Công ty TNHH Concentrix Service Vietnam</h3>
                        </div>
                    </div><div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-active" data-swiper-slide-index="3" role="group" aria-label="4 / 7" style="width: 232px; margin-right: 10px;">
                        <div class="partner-item__box">
                                                        <a alt="1 slide" href="https://jobvieclam.com/cong-ty/cong-ty-tnhh-tu-van-va-dich-vu-hung-cuong-183" title="Công Ty TNHH Tư Vấn Và Dịch Vụ Hùng Cường">
                                <img src="https://jobvieclam.com/company_logos/cong-ty-tnhh-tu-van-va-dich-vu-hung-cuong-1710920301-208.jpg" class="partner-item__img" alt="1 slide">
                            </a>
                                                        <h3 class="partner-item__name">Công Ty TNHH Tư Vấn Và Dịch Vụ Hùng Cường</h3>
                        </div>
                    </div><div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-next" data-swiper-slide-index="4" role="group" aria-label="5 / 7" style="width: 232px; margin-right: 10px;">
                        <div class="partner-item__box">
                                                        <a alt="1 slide" href="https://jobvieclam.com/cong-ty/cong-ty-co-phan-bpo-mat-bao-184" title="Công Ty Cổ Phần BPO Mắt Bảo">
                                <img src="https://jobvieclam.com/company_logos/cong-ty-co-phan-bpo-mat-bao-1710920753-929.jpg" class="partner-item__img" alt="1 slide">
                            </a>
                                                        <h3 class="partner-item__name">Công Ty Cổ Phần BPO Mắt Bảo</h3>
                        </div>
                    </div><div class="swiper-slide swiper-slide-duplicate" data-swiper-slide-index="5" role="group" aria-label="6 / 7" style="width: 232px; margin-right: 10px;">
                        <div class="partner-item__box">
                                                        <a alt="1 slide" href="https://jobvieclam.com/cong-ty/trung-tam-anh-ngu-apollo-english-185" title="Trung tâm Anh ngữ Apollo English">
                                <img src="https://jobvieclam.com/company_logos/trung-tam-anh-ngu-apollo-english-1710921682-857.png" class="partner-item__img" alt="1 slide">
                            </a>
                                                        <h3 class="partner-item__name">Trung tâm Anh ngữ Apollo English</h3>
                        </div>
                    </div><div class="swiper-slide swiper-slide-duplicate" data-swiper-slide-index="6" role="group" aria-label="7 / 7" style="width: 232px; margin-right: 10px;">
                        <div class="partner-item__box">
                            
                            <a alt="1 slide" href="https://jobvieclam.com/cong-ty/cong-ty-b-188" title="Công ty B">
                                <img src="https://jobvieclam.com/admin_assets/no-company.png" class="partner-item__img" alt="1 slide">
                            </a>
                                                        <h3 class="partner-item__name">Công ty B</h3>
                        </div>
                    </div>
                
                                                <div class="swiper-slide" data-swiper-slide-index="0" role="group" aria-label="1 / 7" style="width: 232px; margin-right: 10px;">
                        <div class="partner-item__box">
                                                        <a alt="1 slide" href="https://jobvieclam.com/cong-ty/cong-ty-co-phan-tap-doan-vietstar-178" title="Công Ty Cổ Phần Tập Đoàn Vietstar">
                                <img src="https://jobvieclam.com/company_logos/-1710745917-344.png" class="partner-item__img" alt="1 slide">
                            </a>
                                                        <h3 class="partner-item__name">Công Ty Cổ Phần Tập Đoàn Vietstar</h3>
                        </div>
                    </div>
                                <div class="swiper-slide" data-swiper-slide-index="1" role="group" aria-label="2 / 7" style="width: 232px; margin-right: 10px;">
                        <div class="partner-item__box">
                                                        <a alt="1 slide" href="https://jobvieclam.com/cong-ty/cong-ty-tnhh-transcosmos-viet-nam-181" title="CÔNG TY TNHH TRANSCOSMOS VIỆT NAM">
                                <img src="https://jobvieclam.com/company_logos/cong-ty-tnhh-transcosmos-viet-nam-1710921997-733.png" class="partner-item__img" alt="1 slide">
                            </a>
                                                        <h3 class="partner-item__name">CÔNG TY TNHH TRANSCOSMOS VIỆT NAM</h3>
                        </div>
                    </div>
                                <div class="swiper-slide swiper-slide-prev" data-swiper-slide-index="2" role="group" aria-label="3 / 7" style="width: 232px; margin-right: 10px;">
                        <div class="partner-item__box">
                                                        <a alt="1 slide" href="https://jobvieclam.com/cong-ty/cong-ty-tnhh-concentrix-service-vietnam-182" title="Công ty TNHH Concentrix Service Vietnam">
                                <img src="https://jobvieclam.com/company_logos/cong-ty-tnhh-concentrix-service-vietnam-1710919659-829.png" class="partner-item__img" alt="1 slide">
                            </a>
                                                        <h3 class="partner-item__name">Công ty TNHH Concentrix Service Vietnam</h3>
                        </div>
                    </div>
                                <div class="swiper-slide swiper-slide-active" data-swiper-slide-index="3" role="group" aria-label="4 / 7" style="width: 232px; margin-right: 10px;">
                        <div class="partner-item__box">
                                                        <a alt="1 slide" href="https://jobvieclam.com/cong-ty/cong-ty-tnhh-tu-van-va-dich-vu-hung-cuong-183" title="Công Ty TNHH Tư Vấn Và Dịch Vụ Hùng Cường">
                                <img src="https://jobvieclam.com/company_logos/cong-ty-tnhh-tu-van-va-dich-vu-hung-cuong-1710920301-208.jpg" class="partner-item__img" alt="1 slide">
                            </a>
                                                        <h3 class="partner-item__name">Công Ty TNHH Tư Vấn Và Dịch Vụ Hùng Cường</h3>
                        </div>
                    </div>
                                <div class="swiper-slide swiper-slide-next" data-swiper-slide-index="4" role="group" aria-label="5 / 7" style="width: 232px; margin-right: 10px;">
                        <div class="partner-item__box">
                                                        <a alt="1 slide" href="https://jobvieclam.com/cong-ty/cong-ty-co-phan-bpo-mat-bao-184" title="Công Ty Cổ Phần BPO Mắt Bảo">
                                <img src="https://jobvieclam.com/company_logos/cong-ty-co-phan-bpo-mat-bao-1710920753-929.jpg" class="partner-item__img" alt="1 slide">
                            </a>
                                                        <h3 class="partner-item__name">Công Ty Cổ Phần BPO Mắt Bảo</h3>
                        </div>
                    </div>
                                <div class="swiper-slide" data-swiper-slide-index="5" role="group" aria-label="6 / 7" style="width: 232px; margin-right: 10px;">
                        <div class="partner-item__box">
                                                        <a alt="1 slide" href="https://jobvieclam.com/cong-ty/trung-tam-anh-ngu-apollo-english-185" title="Trung tâm Anh ngữ Apollo English">
                                <img src="https://jobvieclam.com/company_logos/trung-tam-anh-ngu-apollo-english-1710921682-857.png" class="partner-item__img" alt="1 slide">
                            </a>
                                                        <h3 class="partner-item__name">Trung tâm Anh ngữ Apollo English</h3>
                        </div>
                    </div>
                                
                                            <div class="swiper-slide swiper-slide-duplicate" data-swiper-slide-index="0" role="group" aria-label="1 / 7" style="width: 232px; margin-right: 10px;">
                        <div class="partner-item__box">
                                                        <a alt="1 slide" href="https://jobvieclam.com/cong-ty/cong-ty-co-phan-tap-doan-vietstar-178" title="Công Ty Cổ Phần Tập Đoàn Vietstar">
                                <img src="https://jobvieclam.com/company_logos/-1710745917-344.png" class="partner-item__img" alt="1 slide">
                            </a>
                                                        <h3 class="partner-item__name">Công Ty Cổ Phần Tập Đoàn Vietstar</h3>
                        </div>
                    </div><div class="swiper-slide swiper-slide-duplicate" data-swiper-slide-index="1" role="group" aria-label="2 / 7" style="width: 232px; margin-right: 10px;">
                        <div class="partner-item__box">
                                                        <a alt="1 slide" href="https://jobvieclam.com/cong-ty/cong-ty-tnhh-transcosmos-viet-nam-181" title="CÔNG TY TNHH TRANSCOSMOS VIỆT NAM">
                                <img src="https://jobvieclam.com/company_logos/cong-ty-tnhh-transcosmos-viet-nam-1710921997-733.png" class="partner-item__img" alt="1 slide">
                            </a>
                                                        <h3 class="partner-item__name">CÔNG TY TNHH TRANSCOSMOS VIỆT NAM</h3>
                        </div>
                    </div><div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-prev" data-swiper-slide-index="2" role="group" aria-label="3 / 7" style="width: 232px; margin-right: 10px;">
                        <div class="partner-item__box">
                                                        <a alt="1 slide" href="https://jobvieclam.com/cong-ty/cong-ty-tnhh-concentrix-service-vietnam-182" title="Công ty TNHH Concentrix Service Vietnam">
                                <img src="https://jobvieclam.com/company_logos/cong-ty-tnhh-concentrix-service-vietnam-1710919659-829.png" class="partner-item__img" alt="1 slide">
                            </a>
                                                        <h3 class="partner-item__name">Công ty TNHH Concentrix Service Vietnam</h3>
                        </div>
                    </div><div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-active" data-swiper-slide-index="3" role="group" aria-label="4 / 7" style="width: 232px; margin-right: 10px;">
                        <div class="partner-item__box">
                                                        <a alt="1 slide" href="https://jobvieclam.com/cong-ty/cong-ty-tnhh-tu-van-va-dich-vu-hung-cuong-183" title="Công Ty TNHH Tư Vấn Và Dịch Vụ Hùng Cường">
                                <img src="https://jobvieclam.com/company_logos/cong-ty-tnhh-tu-van-va-dich-vu-hung-cuong-1710920301-208.jpg" class="partner-item__img" alt="1 slide">
                            </a>
                                                        <h3 class="partner-item__name">Công Ty TNHH Tư Vấn Và Dịch Vụ Hùng Cường</h3>
                        </div>
                    </div><div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-next" data-swiper-slide-index="4" role="group" aria-label="5 / 7" style="width: 232px; margin-right: 10px;">
                        <div class="partner-item__box">
                                                        <a alt="1 slide" href="https://jobvieclam.com/cong-ty/cong-ty-co-phan-bpo-mat-bao-184" title="Công Ty Cổ Phần BPO Mắt Bảo">
                                <img src="https://jobvieclam.com/company_logos/cong-ty-co-phan-bpo-mat-bao-1710920753-929.jpg" class="partner-item__img" alt="1 slide">
                            </a>
                                                        <h3 class="partner-item__name">Công Ty Cổ Phần BPO Mắt Bảo</h3>
                        </div>
                    </div></div>
            <div class="swiper-pagination"></div>
        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
                            </div>
                        </div>
                        <!-- End Công ty liên quan -->
                    </div>
                </section>
            </div>
            
        </div>
    </div>
    
</section>



@include('templates.vietstar.includes.footer')

@endsection

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style type="text/css">
    .formrow iframe {

        height: 78px;

    }

    ul.company-info.public {
        padding-bottom: 20px;
    }

    .section-company-profile .box-content {}

    .company-map iframe{
        width: 100%;
    }
    .company-jobs-wapper .item-job .logo-company {
        width: 100%;
        -webkit-box-flex: 0;
        -ms-flex: 0 0 100px;
        flex: 0 0 100px;
        max-width: 100px;
        display: flex;
        align-items: center;
    }

    


    .company-jobs-wapper .item-job .logo-company .pic {
        width: 100%;
        border-radius: 5px;
        -webkit-box-shadow: 0px 2px 10px #ddd;
        box-shadow: 0px 2px 5px #ddd;
        min-height: 100px;
        border: 1px solid #e9eaec;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        background-color: white;
    }


    .company-jobs-wapper .item-job .jobinfo {
        padding-left: 20px;
        -webkit-box-flex: 0;
        -ms-flex: 0 0 calc(100% - 100px);
        flex: 0 0 calc(100% - 100px);
        max-width: calc(100% - 100px);
        width: 100%;
    }

    .company-jobs-item.item-job.mb-3 .jobinfo .info .job-title-name a {
        font-style: normal;
        font-weight: 700;
        font-size: 14px;
        line-height: 1.3;
        color: var(--text-main);
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        display: -webkit-box;
        overflow: hidden;
    }
    .company-jobs-item.item-job.mb-3 .jobinfo .box-meta {
        position: relative;
        font-size: 13px;
        line-height: 13px;
        color: var(--sub-text);
        text-decoration: none;
        display: flex;
    
    }


    .company-jobs-item.item-job.mb-3 .jobinfo .info .companyName a {
        font-size: 13px;
    }


    .company-jobs-item.item-job.mb-3 .jobinfo .info .box-meta .rank-salary {

        font-size: 13px;
    }

    .company-jobs-item.item-job.mb-3 .jobinfo .info .box-meta .meta-city {
        font-size: 13px;
    }


    .company-jobs-item.item-job.mb-3 .navbar__link-separator {
        height: 14px;
    }

    .company-jobs-item.item-job.mb-3 .jobinfo .info .day-update {
        font-size: 13px;
    }
    .company-jobs-item.item-job.mb-3 .jobinfo .box-meta div {
        margin-bottom: 5px;
    }
    .jobs-side-list .company-jobs-item.item-job.mb-3 .jobinfo .info .job-title-box .save-job {
        width: 30px;
        height: 30px;
    }




</style>

@endpush

@push('scripts')

<script type="text/javascript">
    $(document).ready(function() {

        $(document).on('click', '#send_company_message', function() {

            var postData = $('#send-company-message-form').serialize();

            $.ajax({

                type: 'POST',

                url: "{{ route('contact.company.message.send') }}",

                data: postData,

                //dataType: 'json',

                success: function(data) {

                    response = JSON.parse(data);

                    var res = response.success;

                    if (res == 'success') {

                        var errorString = '<div role="alert" class="alert alert-success">' +

                            response.message + '</div>';

                        $('#alert_messages').html(errorString);

                        $('#send-company-message-form').hide('slow');

                        $(document).scrollTo('.alert', 2000);

                    } else {

                        var errorString = '<div class="alert alert-danger" role="alert"><ul>';

                        response = JSON.parse(data);

                        $.each(response, function(index, value) {

                            errorString += '<li>' + value + '</li>';

                        });

                        errorString += '</ul></div>';

                        $('#alert_messages').html(errorString);

                        $(document).scrollTo('.alert', 2000);

                    }

                },

            });

        });

    });



    function send_message() {

        const el = document.createElement('div')

        el.innerHTML =

            "Please <a class='btn' href='{{route('login')}}' onclick='set_session()'>log in</a> as a Canidate and try again."

        @if(Auth::check())

        $('#sendmessage').modal('show');

        @else

        swal({

            title: "You are not Loged in",

            content: el,

            icon: "error",

            button: "OK",

        });

        @endif

    }

    if ($("#send-form").length > 0) {

        $("#send-form").validate({

            validateHiddenInputs: true,

            ignore: "",



            rules: {

                message: {

                    required: true,

                    maxlength: 5000

                },

            },

            messages: {



                message: {

                    required: "{{ __('Message is required') }}",

                }



            },

            submitHandler: function(form) {

                $.ajaxSetup({

                    headers: {

                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                    }

                });

                @if(null !== (Auth::user()))

                $.ajax({

                    url: "{{route('submit-message')}}",

                    type: "POST",

                    data: $('#send-form').serialize(),

                    success: function(response) {

                        $("#send-form").trigger("reset");

                        $('#sendmessage').modal('hide');

                        swal({

                            title: "Success",

                            text: response["msg"],

                            icon: "success",

                            button: "OK",

                        });

                    }

                });

                @endif

            }

        })

    }
</script>

@endpush