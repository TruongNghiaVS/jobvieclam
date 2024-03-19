@if(isset($featuredJobs) && count($featuredJobs))
<?php
$numberOfColumns = 9;
?>
<div class="r-news">
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            @foreach($featuredJobs->chunk($numberOfColumns) as $chunk)
            <div class="swiper-slide">
                <div class="row g-2">
                    @foreach($chunk as $featuredJob)
                    <?php $company = $featuredJob->getCompany(); ?>
                    @if(null !== $company)
                    <div class="col-md-6 col-lg-4">
                        <div class="card-box">
                            <div class="content-title-box">
                                <div class="w-100 h-100 d-flex  align-items-center">
                                    <span class="label label-danger">Hot</span>
                                    <div class="card-news__content-title"><a href="{{route('job.detail', [$featuredJob->slug])}}" title="{{$featuredJob->title}}">{{$featuredJob->title}}</a></div>
                                </div>
                                @if(Auth::check() && Auth::user()->isFavouriteJob($featuredJob->slug))
                                    <a class="save-job box-meta" href="{{route('remove.from.favourite', $featuredJob->slug)}}">
                                        <button class="btn-pin-job active" type="button"><span class="iconmoon fa fa-flag"></span></button>
                                    </a>
                                @else
                                    <a class="save-job box-meta" href="{{route('add.to.favourite', $featuredJob->slug)}}">
                                        <button class="btn-pin-job" type="button"><i class="fa-regular fa-flag"></i></button>
                                    </a>
                                @endif
                                </div>
    
                            <div class="card-news w-100 h-100">
                                <div class="card-news__icon">
                                    <a href="{{route('company.detail', $company->slug)}}" title="{{$company->name}}">
                                        {{$company->printCompanyImage(100,100)}}
                                        
                                    </a>
                                </div>
                                <div class="card-news__content">
                                    <div class="card-news__content-head">
                                        <p class="card-news__content-detail"><a href="{{route('company.detail', $company->slug)}}" title="{{$company->name}}">{{$company->name}}</a></p>
                                        <div class="rank-salary text-primary" bis_skin_checked="1">
                                            @php
                                                $from = round($featuredJob->salary_from/1000000,0);
                                                $to = round($featuredJob->salary_to/1000000,0)
                                            @endphp
                                            @if($featuredJob->salary_type == \App\Job::SALARY_TYPE_FROM)
                                             {{__('From: ')}} {{$from}}
                                            {{__('million')}} ({{$featuredJob->salary_currency}})
                                            @elseif($featuredJob->salary_type == \App\Job::SALARY_TYPE_TO)
                                             {{__('Up To: ')}} {{$to}}
                                            {{__('million')}} ({{$featuredJob->salary_currency}})
                                            @elseif($featuredJob->salary_type == \App\Job::SALARY_TYPE_RANGE)
                                             {{$from}} - {{$to}}
                                            {{__('million')}} ({{$featuredJob->salary_currency}})
                                            @elseif($featuredJob->salary_type == \App\Job::SALARY_TYPE_NEGOTIABLE)
                                            <span class="fas fa-money-bill"></span> {{__('Negotiable')}}
                                            @else
                                             {{__('Salary Not provided')}}
                                            @endif
                                        </div>
                                    </div>
                                    <div class="card-news__content-footer">
                                        <div class="card-news__content-footer__location">
                                            <span class="badge rounded-pill pill pill-location">{{$featuredJob->getCity('city')}}</span>
                                            <span class="badge rounded-pill pill pill-worktime">{{$featuredJob->getJobType('job_type')}}</span>
                                        </div>
                                        <div class="card-news__content-footer__salary">
    
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>

            </div>
            @endforeach

        </div>
        <div class="swiper-pagination"></div>
    </div>
    <div class="custom-swiper-button-next"><i class="fas fa-chevron-right"></i></div>
    <div class="custom-swiper-button-prev"><i class="fas fa-chevron-left"></i></div>

</div>

@endif



@push('styles')
<style>
    .r-news {
        position: relative;
    }


    .custom-swiper-button-next{
        position: absolute;
        top: 50%;
        font-size: 30px;
        z-index: 10;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        right: -20px;
        color: var(--bs-blue);

    }

    .custom-swiper-button-prev {
        position: absolute;
        top: 50%;
        font-size: 30px;
        font-weight: 500;
        z-index: 10;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        left: -20px;
        color: var(--bs-blue);
    }
    .custom-swiper-button-next i ,.custom-swiper-button-prev i{
        color: var(--bs-blue);
    }
</style>
@endpush