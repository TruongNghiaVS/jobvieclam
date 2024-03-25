<section class="partner cb-section">
    <div class="container">
        <div class="box-title-bg">
            <h2 class="section-title text-uppercase">{{ __('Nhà tuyển dụng hàng đầu') }}</h2>
        </div>
        <!-- <div>
        <h5>Người tìm việc có cơ hội làm việc tại các doanh nghiệp hàng đầu</h5>
      </div> -->
        <div class="swiper partnerSlider">
            <div class="swiper-wrapper">
                @php 
                $companyData = App\Company::where('is_active', 1)->get();
                @endphp

                @if(isset($companyData) && count($companyData))
                @foreach($companyData as $company)
                <div class="swiper-slide">
                        <div class="partner-item__box">
                            @if($company->logo)
                            <a alt="1 slide" href="{{route('company.detail', $company->slug)}}" title="{{$company->name}}">
                                <img src="{{ asset('company_logos/'.$company->logo)}}" class="partner-item__img" alt="1 slide">
                            </a>
                            @else

                            <a alt="1 slide" href="{{route('company.detail', $company->slug)}}" title="{{$company->name}}">
                                <img src="{{ asset('/') }}admin_assets/no-company.png" class="partner-item__img" alt="1 slide">
                            </a>
                            @endif
                            <h3 class="partner-item__name">{{$company->name}}</h3>
                        </div>
                    </div>
                @endforeach
                @endif
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>