
<section class="header-bar">
    <div class="header-bar-bg">
        <div class="swiper slider-hero-banner">
            @php
            $sliders = \App\Slider::select([
            'sliders.id', 'sliders.slider_id',
            'sliders.is_active','sliders.used_for','sliders.slider_image','sliders.slider_image_mobile'
            ])->sorted()->get();
            @endphp
            <div class="swiper-wrapper">
                @foreach($sliders as $slider)
                    @if($slider->is_active)

                        <div class="swiper-slide p-0">
                            <div class="is-pc bg-slider" style="background-image: url({{'slider_images/'.$slider->slider_image}});"></div>
                            <div class="is-sp bg-slider" style="background-image: url({{'slider_images/'.$slider->slider_image_mobile}});"></div>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
    <div class="container content position-relative header-bar-content-search">

        <form class="search-form row g-3 " action="{{route('job.list')}}" method="get" id="search-form">

            {{--<div>
              <a class="text-reset fs-14px no-underline main-color" id="advanced-search" data-toggle="collapse" role="button" aria-expanded="true" data-target="#collapseAdvanceSearch">
                <i class="far fa-search-plus me-0"></i> {{  __('Advanced search') }}
            </a>
    </div> --}}
    <div class="mt-3" id="collapseAdvanceSearch">

        <div class="row">
            <div class="col-lg-5  shadow p-4 search-form-box">

                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="header-bar__title mb-3" style="max-width: 100%; width: 100%">Tìm kiếm cơ hội việc làm
                        </h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <i class="fa-solid fa-magnifying-glass"></i>
                            <input type="text" class="form-control search-input shadow-sm" style="width: 100%" id="search" name="search" placeholder="{{__('Job search')}}">
                            <div id="suggesstion-box"></div>
                        </div>
                    </div>
                </div>
                <div class="row form-group-search-box">
                    <div class="col-sm-6">
                        <div class="form-group form-group-search" id="city_dd">
                            {!! Form::select('city_id[]', ['' => __('Select City')]+$citiesArray, Request::get('city_id',
                            null), array('class'=>'form-control form-select shadow-sm', 'id'=>'city_id')) !!}
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group form-group-search" id="job_type_dd">
                            {!! Form::select('job_type_id[]', ['' => __('Select Job Type')] + $jobtypesArray,
                            Request::get('job_type_id', null), array('class'=>'form-control form-select shadow-sm',
                            'id'=>'job_type_id')) !!}
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group form-group-search" id="career_level_dd">
                         
                            {!! Form::select('degree_level_id[]',['' => __('Academic level')] + $degreeLevelArray,
                            Request::get('degree_level_id', null), array('class'=>'form-control form-select shadow-sm',
                            'id'=>'degree_level_id')) !!}
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group form-group-search" id="degree_leve_dd">
                            {!! Form::select('industry_id[]', ['' => __('Select Industry')] + $industryArray,
                            Request::get('industry_id', null), array('class'=>'form-control form-select shadow-sm',
                            'id'=>'industry_id')) !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="advance-search row">
                            <div class="advance-search__reset col-lg-6">Đặt lại</div>
                            <div class="col-lg-6 advance-search__box">
                                <div class="advance-search__open" onClick="opensearchbox()"><i class="fa-solid fa-magnifying-glass"></i><span>Tìm kiếm nâng cao</span></div>
                                <div class="advance-search__close" onClick="closesearchbox()"><i class="fa-solid fa-angle-up"></i> Thu nhỏ</div>
                            </div>
                        </div>
                        <div class="action-search-form">
                            <button type="submit" class="btn btn-primary mb-3 btn-submit-search">{{__('Search')}}</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </form>
    </div>
</section>