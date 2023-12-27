@if(isset($latestJobs) && count($latestJobs))

<?php
$numberOfColumns = 9;
?>
<div class="r-news">
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            @foreach($latestJobs->chunk($numberOfColumns) as $chunk)
            <div class="swiper-slide">
                <div class="row g-2">
                    @foreach($chunk as $latestJobs)
                    <?php $company =$latestJobs->getCompany(); ?>
                    @if(null !== $company)
                    <div class="col-md-6 col-lg-4 mb-3">
                        <div class="card-news w-100">
                            <div class="card-news__icon">
                                <a href="{{route('job.detail', [$latestJobs->slug])}}" title="{{$latestJobs->title}}">
                                    {{$company->printCompanyImage(45,45)}}
                                    
                                </a>
                            </div>
                            <div class="card-news__content">
                                @if(Auth::check() && Auth::user()->isFavouriteJob($latestJobs->slug))
                                <a class="save-job box-meta" href="{{route('remove.from.favourite', $latestJobs->slug)}}">
                                    <button class="btn-pin-job active" type="button"><span class="iconmoon fa fa-flag"></span></button>
                                </a>
                                @else
                                <a class="save-job box-meta" href="{{route('add.to.favourite', $latestJobs->slug)}}">
                                    <button class="btn-pin-job" type="button"><i class="fa-regular fa-flag"></i></button>
                                </a>
                                @endif
                                <div class="content-title-box">
                                    <span class="label label-danger">Hot</span>
                                    <h6 class="card-news__content-title"><a href="{{route('job.detail', [$latestJobs->slug])}}" title="{{$latestJobs->title}}">{{$latestJobs->title}}</a></h6>
                                </div>

                                <p class="card-news__content-detail"><a href="{{route('company.detail', $company->slug)}}" title="{{$company->name}}">{{$company->name}}</a></p>
                                <div class="rank-salary text-primary" bis_skin_checked="1">
                                    @php
                                        $from = round($latestJobs->salary_from/1000000,0);
                                        $to = round($latestJobs->salary_to/1000000,0)
                                    @endphp
                                    @if($latestJobs->salary_type == \App\Job::SALARY_TYPE_FROM)
                                    <i class="fa-solid fa-dollar-sign"></i> {{__('From: ')}} {{$from}}
                                    {{__('million')}} ({{$latestJobs->salary_currency}})
                                    @elseif($latestJobs->salary_type == \App\Job::SALARY_TYPE_TO)
                                    <i class="fa-solid fa-dollar-sign"></i> {{__('Up To: ')}} {{$to}}
                                    {{__('million')}} ({{$latestJobs->salary_currency}})
                                    @elseif($latestJobs->salary_type == \App\Job::SALARY_TYPE_RANGE)
                                    <i class="fa-solid fa-dollar-sign"></i> {{$from}} - {{$to}}
                                    {{__('million')}} ({{$latestJobs->salary_currency}})
                                    @elseif($latestJobs->salary_type == \App\Job::SALARY_TYPE_NEGOTIABLE)
                                    <span class="fas fa-money-bill"></span> {{__('Negotiable')}}
                                    @else
                                    <i class="fa-solid fa-dollar-sign"></i> {{__('Salary Not provided')}}
                                    @endif
                                </div>
                                <div class="card-news__content-footer">
                                    <div class="card-news__content-footer__location">
                                        <span class="badge rounded-pill pill pill-location">{{$latestJobs->getCity('city')}}</span>
                                        <span class="badge rounded-pill pill pill-worktime">{{$latestJobs->getJobType('job_type')}}</span>
                                    </div>
                                    <div class="card-news__content-footer__salary">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>

            </div>



            <!-- <div class="swiper-slide">
                <div class="row g-2">
                    @foreach($chunk as $latestJobs)
                    <?php $company = $latestJobs->getCompany(); ?>
                    @if(null !== $company)
                    <div class="col-md-6 col-lg-4 mb-3">
                        <div class="card-news w-100">
                            <div class="card-news__icon">
                                <a href="{{route('job.detail', [$latestJobs->slug])}}" title="{{$latestJobs->title}}">
                                    <img width="45" height="45" src="{{asset('company_logos/'.$company->logo)}}" alt="vietstar">
                                </a>
                            </div>
                            <div class="card-news__content">
                                @if(Auth::check() && Auth::user()->isFavouriteJob($latestJobs->slug))
                                <a class="save-job box-meta" href="{{route('remove.from.favourite', $latestJobs->slug)}}">
                                    <button class="btn-pin-job active" type="button"><span class="iconmoon fa fa-flag"></span></button>
                                </a>
                                @else
                                <a class="save-job box-meta" href="{{route('add.to.favourite', $latestJobs->slug)}}">
                                    <button class="btn-pin-job" type="button"><i class="fa-regular fa-flag"></i></button>
                                </a>
                                @endif
                                <div class="content-title-box">
                                    <span class="label label-warning">Gấp</span>
                                    <h6 class="card-news__content-title"><a href="{{route('job.detail', [$latestJobs->slug])}}" title="{{$latestJobs->title}}">{{$latestJobs->title}}</a></h6>
                                </div>
                                <p class="card-news__content-detail"><a href="{{route('company.detail', $company->slug)}}" title="{{$company->name}}">{{$company->name}}</a></p>
                                <div class="card-news__content-salary">
                                    {{ $latestJobs->salary_from }} - {{ $latestJobs->salary_to }}
                                    ({{ $latestJobs->salary_currency }})
                                </div>
                                <div class="card-news__content-footer">
                                    <div class="card-news__content-footer__location">
                                        <span class="badge rounded-pill pill pill-location">{{$latestJobs->getCity('city')}}</span>
                                        <span class="badge rounded-pill pill pill-worktime">{{$latestJobs->getJobType('job_type')}}</span>
                                    </div>
                                    <div class="card-news__content-footer__salary">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>

            </div>

            @endforeach -->
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

    