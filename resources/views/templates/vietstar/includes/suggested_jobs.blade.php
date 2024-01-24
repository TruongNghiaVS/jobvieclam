@if(isset($suggestJobs) && count($suggestJobs))

<?php
$numberOfColumns = 9;
?>
<div class="r-news">
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            @foreach($suggestedJobs->chunk($numberOfColumns) as $chunk)
            <div class="swiper-slide">
                <div class="row g-2">
                    @foreach($chunk as $suggestJobs)
                    <?php $company =$suggestJobs->getCompany(); 
                    ?>
                    @if(null !== $company)
                    <div class="col-md-6 col-lg-4 mb-3">
                        <div class="card-box">
                            <div class="content-title-box">
                                <div class="w-100 h-100 d-flex  align-items-center">
                                    <span class="label label-danger">Hot</span>
                                    <div class="card-news__content-title"><a href="{{route('job.detail', [$suggestJobs->slug])}}" title="{{$suggestJobs->title}}">{{$suggestJobs->title}}</a></div>
                                </div>
                                @if(Auth::check() && Auth::user()->isFavouriteJob($suggestJobs->slug))
                                    <a class="save-job box-meta" href="{{route('remove.from.favourite', $suggestJobs->slug)}}">
                                        <button class="btn-pin-job active" type="button"><span class="iconmoon fa fa-flag"></span></button>
                                    </a>
                                @else
                                    <a class="save-job box-meta" href="{{route('add.to.favourite', $suggestJobs->slug)}}">
                                        <button class="btn-pin-job" type="button"><i class="fa-regular fa-flag"></i></button>
                                    </a>
                                @endif
                                </div>
    
                            <div class="card-news w-100">
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
                                                $from = round($suggestJobs->salary_from/1000000,0);
                                                $to = round($suggestJobs->salary_to/1000000,0)
                                            @endphp
                                            @if($suggestJobs->salary_type == \App\Job::SALARY_TYPE_FROM)
                                            <i class="fa-solid fa-dollar-sign"></i> {{__('From: ')}} {{$from}}
                                            {{__('million')}} ({{$suggestJobs->salary_currency}})
                                            @elseif($suggestJobs->salary_type == \App\Job::SALARY_TYPE_TO)
                                            <i class="fa-solid fa-dollar-sign"></i> {{__('Up To: ')}} {{$to}}
                                            {{__('million')}} ({{$suggestJobs->salary_currency}})
                                            @elseif($suggestJobs->salary_type == \App\Job::SALARY_TYPE_RANGE)
                                            <i class="fa-solid fa-dollar-sign"></i> {{$from}} - {{$to}}
                                            {{__('million')}} ({{$suggestJobs->salary_currency}})
                                            @elseif($suggestJobs->salary_type == \App\Job::SALARY_TYPE_NEGOTIABLE)
                                            <span class="fas fa-money-bill"></span> {{__('Negotiable')}}
                                            @else
                                            <i class="fa-solid fa-dollar-sign"></i> {{__('Salary Not provided')}}
                                            @endif
                                        </div>
                                        <div class="card-news__content-footer__location">
                                            <span class="badge rounded-pill pill pill-location">{{$suggestJobs->getCity('city')}}</span>
                                            <span class="badge rounded-pill pill pill-worktime">{{$suggestJobs->getJobType('job_type')}}</span>
                                        </div>
                                    </div>
                                    <div class="card-news__content-footer">
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
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
    </div>

</div>



    @endif

@push('scripts')
<script type="text/javascript">
  if ($('.latest_jobs_slide').length) {
        var allJobsSwiper = new Swiper(".latest_jobs_slide", {
            autoplay: {
                delay: 5000,
            },
        
            
            loop: true,
            speed: 1000,
            pagination: {
                el: ".swiper-pagination",
                clickable: true
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    }
</script>
@endpush

    