@extends('templates.vietstar.layouts.app')
@section('content')
<!-- Header start -->
@include('templates.vietstar.includes.header')

<!-- Company cover -->
<!-- <section class="public-profile-cover" style="background-image: url({{ asset('/vietstar/imgs/company-cover.jpg') }})">
  
</section> -->


@php
$company = $job->getCompany();
@endphp

<section class="container job-detail">
    <section class="job-detail-title">
        <div class="job-detail-banner d-flex gap-24">
            <div class="job-detail-banner__icon">
                <img src="{{ asset('company_logos/'.$company->logo) }}" alt="{{ $company->name }}">
            </div>
            <div class="job-detail-banner__group d-flex flex-fill">
                <div class="job-detail-banner__detail">
                    <h3 class="banner__title">{{$job->title}}</h3>
                    <div class="banner__company">{{$company->name}}</div>
                    <div class="banner__due-day mb-3">
                        Địa điểm: {{ !empty($job->location) ? $job->location :  $job->getCity('city')}}
                    </div>
                    <div class="banner__due-day mb-3">
                        $
                        @php
                        $salaryType = $job->salary_type;

                        switch ($salaryType) {
                        case \App\Job::SALARY_TYPE_RANGE:
                        $html = MiscHelper::formatCurrency($job->salary_from) . ' - ' .
                        MiscHelper::formatCurrency($job->salary_to) . '(' .
                        $job->salary_currency . ')';
                        break;
                        case \App\Job::SALARY_TYPE_NEGOTIABLE:
                        $html = __('Negotiable');
                        break;
                        case \App\Job::SALARY_TYPE_FROM:
                        $html = __('From') . ' ' . MiscHelper::formatCurrency($job->salary_from)
                        . '(' . $job->salary_currency . ')';
                        break;
                        case \App\Job::SALARY_TYPE_TO:
                        $html = __('To') . ' ' . MiscHelper::formatCurrency($job->salary_to) .
                        '(' . $job->salary_currency . ')';
                        break;
                        }
                        @endphp
                        @if(!(bool)$job->hide_salary)
                        <strong>{{$html}}</strong>
                        @endif
                    </div>
                    <div class="banner__due-day">
                        <i class="far fa-calendar-day"></i>
                        {{__('Apply Before')}}: <span>{{$job->expiry_date->format('d/m/Y')}}</span>
                    </div>
                </div>
                <div class="">
                    @if(Auth::guard('company')->check())
                    @if(Auth::guard('company')->user()->id == $job->company_id )
                    <a href="{{route('edit.front.job', $job->id)}}" class="btn btn-outline-primary">
                        {{__('Edit Job')}} </a>
                    @endif
                    @else
                    @if($job->isJobExpired())
                    <span class="btn btn-primary btn-apply">
                        <!-- <i class="fa fa-paper-plane iconawesome" aria-hidden="true"></i> -->
                        Nộp đơn
                        <!-- {{__('Job is expired')}} -->
                    </span>
                    @elseif(Auth::check() && Auth::user()->isAppliedOnJob($job->id))
                    <button class="btn btn-primary apply applied" disabled><i class="fa fa-paper-plane iconawesome" aria-hidden="true"></i>
                        {{__('Already Applied')}}</button>
                    @else
                    <a href="{{route('apply.job', $job->slug)}}" class="btn btn-primary apply"><i class="fa fa-paper-plane iconawesome" aria-hidden="true"></i>
                        Nộp đơn
                    </a>
                    @endif
                    @if(Auth::check() && Auth::user()->isFavouriteJob($job->slug))
                    <a href="{{route('remove.from.favourite', $job->slug)}}" class="btn btn-outline-primary"><i class="fas fa-heart iconoutline"></i> {{__('Favourite Job')}} </a> @else <a href="{{route('add.to.favourite', $job->slug)}}" class="btn btn-outline-primary"><i class="fas fa-heart iconoutline"></i></a>
                    @endif
                    @endif
                </div>
            </div>
        </div>
    </section>

    <ul class="nav nav-tabs nav-tabs-default">
        <li class="nav-item">
            <button class="nav-link active" id="detail-tab" data-toggle="tab" data-target="#detail" aria-controls="detail">
                {{ __('Job Details') }}
            </button>
        </li>
        <li class="nav-item">
            <button class="nav-link" id="profile-tab" data-toggle="tab" data-target="#profile" aria-controls="profile">
                {{ __('Company Information') }}
            </button>
        </li>
        <li class="nav-item">
            <button class="nav-link" id="related-jobs-tab" data-toggle="tab" data-target="#related-jobs-pane" aria-controls="related-jobs">
                Việc làm khác từ công ty
            </button>
        </li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane show active" id="detail" aria-labelledby="detail-tab">
            @include('flash::message')
            <!-- Job detail title -->
            <div class="row">
                <div class="col-xxl-8 col-xl-12 pe-xxl-4">
                    <div class="tab-content">
                        <!-- Job detail -->
                        <section class="job-detail-content">
                            <div class="require-card">
                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <div class="item-require">
                                            <div class="require-card__item-icon">
                                                <div class="icon-salary icon-size-30"></div>
                                            </div>
                                            <div class="require-card__item-content">
                                                <p>{{ __('Salary Level') }}</p>
                                                @php
                                                $salaryType = $job->salary_type;

                                                switch ($salaryType) {
                                                case \App\Job::SALARY_TYPE_RANGE:
                                                $html = MiscHelper::formatCurrency($job->salary_from) . ' - ' .
                                                MiscHelper::formatCurrency($job->salary_to) . '(' .
                                                $job->salary_currency . ')';
                                                break;
                                                case \App\Job::SALARY_TYPE_NEGOTIABLE:
                                                $html = __('Negotiable');
                                                break;
                                                case \App\Job::SALARY_TYPE_FROM:
                                                $html = __('From') . ' ' . MiscHelper::formatCurrency($job->salary_from)
                                                . '(' . $job->salary_currency . ')';
                                                break;
                                                case \App\Job::SALARY_TYPE_TO:
                                                $html = __('To') . ' ' . MiscHelper::formatCurrency($job->salary_to) .
                                                '(' . $job->salary_currency . ')';
                                                break;
                                                }
                                                @endphp
                                                @if(!(bool)$job->hide_salary)
                                                <strong>{{$html}}</strong>
                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="item-require">
                                            <div class="require-card__item-icon">
                                                <div class="icon-team icon-size-30"></div>
                                            </div>
                                            <div class="require-card__item-content">
                                                <p>{{ __('Number of positions') }}</p>
                                                <strong>{{ $job->num_of_positions }}</strong>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="item-require">
                                            <div class="require-card__item-icon">
                                                <div class="icon-calendar icon-size-30"></div>
                                            </div>
                                            <div class="require-card__item-content">
                                                <p>{{ __('Job Types') }}</p>
                                                <strong>{{ __($job->getJobType('job_type')) }}</strong>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <div class="item-require item-require-last">
                                            <div class="require-card__item-icon">
                                                <div class="icon-level icon-size-30"></div>
                                            </div>
                                            <div class="require-card__item-content">
                                                <p>{{ __('Career Level') }}</p>
                                                <strong>{{$job->getCareerLevel('career_level')}}</strong>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="item-require item-require-last">
                                            <div class="require-card__item-icon">
                                                <div class="icon-gender icon-size-30"></div>
                                            </div>
                                            <div class="require-card__item-content">
                                                <p>{{ __('Gender') }}</p>
                                                <strong>{{$job->getGender('gender')}}</strong>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="item-require item-require-last item-require-end">
                                            <div class="require-card__item-icon">
                                                <div class="icon-suicase icon-size-30"></div>
                                            </div>
                                            <div class="require-card__item-content">
                                                <p>{{ __('Experiences') }}</p>
                                                <strong>{{$job->getJobExperience('job_experience')}}</strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="job-information">
                                <h3 class="job-information__title">{{__('Job Description')}}</h3>
                                <div class="inner-content">{!! $job->description !!}</div>
                            </div>
                            <div class="job-information">
                                <h3 class="job-information__title">{{__('Job Requirements')}}</h3>
                                <div class="inner-content">{!! $job->requirement !!}</div>
                            </div>

                            <div class="job-information">
                                <h3 class="job-information__title">{{__('Benefits')}}</h3>
                                <div class="inner-content">{!! $job->benefits !!}</div>
                            </div>

                            <h6 class="mb-2">{{ __('Skills') }}</h6>
                            <div class="mb-5">
                                @if (!empty($job_skill_ids) && count($job_skill_ids) > 0)
                                @foreach ($job_skill_ids as $jobSkillId)
                                <span class="badge badge-light">{{ $jobSkills[$jobSkillId] ?? 'N/A' }}</span>
                                @endforeach
                                @endif
                            </div>

                            <div class="share-detail">
                                <div class="share-detail__social">
                                    <h4>{{__('Share this job')}}:</h4>
                                    <div class="socials">
                                        <a class="social" href=""><i class="fab fa-linkedin-in fa-lg"></i></a>
                                        <a class="social" href=""><i class="fab fa-facebook-f fa-lg"></i></a>
                                        <a class="social" href=""><i class="fab fa-twitter fa-lg"></i></a>
                                    </div>
                                </div>
                                <div class="__actions">
                                    @if(Auth::check() && Auth::user()->isFavouriteJob($job->slug))
                                    <a href="{{route('remove.from.favourite', $job->slug)}}" class="btn btn-outline-primary"><i class="fas fa-heart iconoutline"></i>
                                        {{__("Don't Save")}} </a>
                                    @else
                                    <a href="{{route('add.to.favourite', $job->slug)}}" class="btn btn-outline-primary"><i class="fas fa-heart iconoutline"></i>
                                        {{__('Save')}}</a>
                                    @endif
                                    @if($job->isJobExpired())
                                    <span class="btn btn-primary jbexpire mb-2"><i class="fa fa-paper-plane iconawesome" aria-hidden="true"></i> {{__('Job is expired')}}</span>
                                    @elseif(Auth::check() && Auth::user()->isAppliedOnJob($job->id))
                                    <button class="btn btn-primary apply applied" disabled><i class="fa fa-paper-plane iconawesome" aria-hidden="true"></i>
                                        {{__('Already Applied')}}</button>
                                    @else
                                    <a href="{{route('apply.job', $job->slug)}}" class="btn btn-primary apply"><i class="fa fa-paper-plane iconawesome" aria-hidden="true"></i>
                                        {{__('Apply Now')}}</a>
                                    @endif
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-12">
                    <!-- realated jobs -->
                    <section class="related-jobs">
                        <div class="related-jobs__title d-flex justify-content-between align-items-center">
                            <h6>{{__('Related Jobs')}}</h6>
                            <a class="btn btn-round btn-link btn-sm main-color" href="{{ route('job.list', ['job_titles[]'=>$job->title ?? '', 'country_ids[]'=>$job->country_id?? '', 'state_ids[]'=>$job->state_id?? '', 'city_ids[]'=>$job->city_id ?? '']) }}">
                                {{ __('View all jobs') }}<i class="fas fa-arrow-right ms-2"></i></a>
                        </div>
                        <div class="row related-jobs__jobs pe-2">
                            @if(isset($relatedJobs) && count($relatedJobs))
                            @foreach($relatedJobs as $relatedJob)
                            <?php $relatedJobCompany = $relatedJob->getCompany(); ?>
                            @if(null !== $relatedJobCompany && $relatedJob->id != $job->id)
                            <!--Job start-->
                            <div class="col-xl-4 col-xxl-12">
                                <div class="card-news gap-16 mb-2">
                                    <div class="card-news__icon">
                                        <img src="{{ asset('/company_logos/'.$relatedJobCompany->logo)  }}" alt="{{ $relatedJobCompany->name }}">
                                    </div>
                                    <div class="card-news__content">
                                        <h6 class="card-news__content-title"><a href="{{route('job.detail', [$relatedJob->slug])}}" title="{{$relatedJob->title}}">{{$relatedJob->title}}</a></h6>
                                        <p class="card-news__content-detail">{{$relatedJobCompany->name}}</p>
                                        <div class="card-news__content-footer">
                                            <div class="card-news__content-footer__location">
                                                <span class="badge rounded-pill pill pill-location">{{$relatedJob->getCity('city')}}</span>
                                                <span class="badge rounded-pill pill pill-worktime">{{$relatedJob->getJobType('job_type')}}</span>
                                            </div>
                                            <div class="card-news__content-footer__salary">
                                                {{$relatedJob->salary_from.' '.$relatedJob->salary_currency}} -
                                                {{$relatedJob->salary_to.' '.$relatedJob->salary_currency}}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!--Job end-->
                            @endif
                            @endforeach
                            @endif
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="profile" aria-labelledby="profile-tab">
            <!-- Company detail title -->
            <section class="company-job-detail job-detail-title">
                <div class="job-detail-banner d-flex gap-24 justify-content-between">
                    <div class="job-detail-banner__icon">
                        <img src="{{ asset('/company_logos/'.$company->logo) }}" alt="{{ $company->name }}">
                    </div>
                    <div class="job-detail-banner__detail">
                        <div class="row">
                            <div class="col-xl-7 col-lg-12">
                                <h3 class="banner__title mb-1">{{ $company->name }}</h3>
                                <div class="banner__company">
                                    {{ !empty($company->industry)?$company->industry->industry : 'NA' }}
                                </div>
                                <div class="banner__due-day mb-3">
                                    <i class="far fa-user-alt"></i> {{ $company->established_in }}
                                </div>
                                <div class="banner__due-day mb-3">
                                    <i class="far fa-map-marker-alt"></i> {{ $company->location }}
                                </div>
                            </div>
                            <div class="col-xl-5 col-lg-12">
                                <div class="banner__due-day mb-3">
                                    <i class="far fa-phone"></i> {{ $company->phone }}
                                </div>
                                <div class="banner__due-day mb-3">
                                    <i class="far fa-envelope"></i> {{ $company->email }}
                                </div>
                                <div class="banner__due-day mb-3">
                                    <a href="{{ $company->website}}" target="_blank">
                                        <i class="far fa-globe"></i> {{ $company->website }}
                                    </a>
                                </div>
                                <div class="fs-14px mb-3">
                                    <div class="socials">
                                        <a href="#" class="social"><i class="fab fa-facebook-f fa-lg me-3"></i></a>
                                        <a href="#" class="social"><i class="fab fa-twitter fa-lg me-3"></i></a>
                                        <a href="#" class="social"><i class="fab fa-instagram fa-lg me-3"></i></a>
                                        <a href="#" class="social"><i class="fab fa-linkedin-in fa-lg me-3"></i></a>
                                        <a href="#" class="social"><i class="fab fa-youtube fa-lg me-3"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="job-detail-banner__actions job-detail-banner_info_actions d-flex flex-row gap-16">
                            <form action="{{ route('seeker.submit-message', ['message' => 'Xin chào!', 'company_id' => $company->id, 'new' => true]) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-primary"><i class="far fa-envelope me-2"></i>{{__('Send message')}}</button>
                            </form>
                            @if(Auth::check() && Auth::user()->isFavouriteCompany($company->slug))
                            <a href="{{ route('remove.from.favourite.company', ['company_slug' => $company->slug])}}" class="btn btn-outline-primary"><i class="fas fa-heart iconoutline"></i>
                                {{__('Favourite company')}} </a>
                            @else
                            <a href="{{ route('add.to.favourite.company', ['company_slug' => $company->slug]) }}" class="btn btn-outline-primary"><i class="far fa-heart"></i>
                                {{__('Follow company')}}</a>
                            @endif
                        </div>
                    </div>
                </div>
            </section>
            <div class="row">
                <div class="col-xxl-8 col-lg-8 pe-xxl-4">
                    <!-- company detail -->
                    <section class="job-detail-content company-detail mb-4">
                        <div class="require-card">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="item-require">
                                        <div class="flex-grow-1 d-flex gap-16 w-100">
                                            <div class="require-card__item-icon">
                                                <div class="icon-salary icon-size-30"></div>
                                            </div>
                                            <div class="require-card__item-content">
                                                <p>Mức lương trung bình</p>
                                                <strong>NA</strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="item-require">
                                        <div class="require-card__item-icon">
                                            <div class="icon-team icon-size-30"></div>
                                        </div>
                                        <div class="require-card__item-content">
                                            <p>Quy mô</p>
                                            <strong>{{ $company->no_of_employees }}</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="item-require item-require-last">
                                        <div class="require-card__item-icon">
                                            <div class="icon-calendar icon-size-30"></div>
                                        </div>
                                        <div class="require-card__item-content">
                                            <p>Thời gian thành lập</p>
                                            <strong>{{ $company->established_in }}</strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="item-require item-require-last item-require-end">
                                        <div class="require-card__item-icon">
                                            <div class="icon-suicase icon-size-30"></div>
                                        </div>
                                        <div class="require-card__item-content">
                                            <p>Vị trí đang tuyển</p>
                                            <strong>{{ $company->jobs->count() }}</strong>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="job-information">
                            <h3 class="job-information__title">Về công ty</h3>
                            <div class="inner-content">{!! $company->description !!}</div>
                        </div>

                    </section>
                </div>

            </div>
        </div>
        <div class="tab-pane" id="related-jobs-pane" aria-labelledby="related-jobs-tab">
            <section class="related-jobs">

                <div class="related-jobs-company row g-2">
                    @foreach ($company->jobs as $cjob)
                    <div class="col-6">
                        <div class="card-news p-3">
                            <div class="card-news__icon">
                                <img src="{{ asset('company_logos/'.$company->logo) }}" alt="{{ $company->name }}">
                            </div>
                            <div class="card-news__content">
                                <h6 class="card-news__content-title"><a href="{{route('job.detail', [$cjob->slug])}}" title="{{$cjob->title}}">{{$cjob->title}}</a></h6>
                                <p class="card-news__content-detail">{{ $company->name }}</p>
                                <div class="card-news__content-footer">
                                    <div class="card-news__content-footer__location">
                                        <span class="badge rounded-pill pill pill-location">{{ $cjob->location }}</span>
                                        <span class="badge rounded-pill pill pill-worktime">{{ $cjob->city->city }}</span>
                                    </div>
                                    <div class="card-news__content-footer__salary">
                                        {{$cjob->salary_from.' '.$cjob->salary_currency}} -
                                        {{$cjob->salary_to.' '.$cjob->salary_currency}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </section>


            <!-- @if ($company->jobs->count() > 0) -->

            <!-- <section class="related-jobs">
                    <div class="related-jobs__title d-flex justify-content-between align-items-center">
                        <h6>Vị trí đang tuyển</h6>
                    </div>
                    <div class="row related-jobs__jobs">
                        <div class="col-12">
                            @foreach ($company->jobs as $cjob)
                            <div class="card-news gap-16 mb-2">
                                <div class="card-news__icon">
                                    <img src="{{ asset('company_logos/'.$company->logo) }}" alt="{{ $company->name }}">
                                </div>
                                <div class="card-news__content">
                                    <h6 class="card-news__content-title"><a
                                            href="{{route('job.detail', [$cjob->slug])}}"
                                            title="{{$cjob->title}}">{{$cjob->title}}</a></h6>
                                    <p class="card-news__content-detail">{{ $company->name }}</p>
                                    <div class="card-news__content-footer">
                                        <div class="card-news__content-footer__location">
                                            <span
                                                class="badge rounded-pill pill pill-location">{{ $cjob->location }}</span>
                                            <span
                                                class="badge rounded-pill pill pill-worktime">{{ $cjob->city->city }}</span>
                                        </div>
                                        <div class="card-news__content-footer__salary">
                                            {{$cjob->salary_from.' '.$cjob->salary_currency}} -
                                            {{$cjob->salary_to.' '.$cjob->salary_currency}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </section> -->
            <!-- @endif -->
            <!-- map company -->
            <!-- <section class="related-jobs">
                    <div class="related-jobs__title">
                        <h6>Map</h6>

                        <div class="gmap">
                            {!!$company->map!!}
                        </div>
                    </div>
                </section> -->




        </div>
    </div>
</section>

<div class="page-job-detail__floating-header">
    <div class="container box">
        <div class="row">
            <!-- Employer Logo -->
            <div class="col-md-1 col-logo hidden-sm hidden-xs col-logo hidden-sm hidden-xs">
                <a href="#">
                    <img src="{{ asset('company_logos/'.$company->logo) }}" alt="{{ $company->name }}">
                </a>
            </div>
            <div class="col-md-11 col-xs-12 col-info">
                <div class="row">
                    <div class="col-lg-8">
                        <h3 class="banner__title">{{$job->title}}</h3>
                        <div class="banner__company">{{$company->name}}</div>
                    </div>
                    <div class="col-lg-4 btn-group-floating">
                        @if(Auth::guard('company')->check())
                        @if(Auth::guard('company')->user()->id == $job->company_id )
                        <a href="{{route('edit.front.job', $job->id)}}" class="btn btn-outline-primary">
                            {{__('Edit Job')}} </a>
                        @endif
                        @else
                        @if($job->isJobExpired())
                        <span class="btn btn-primary btn-apply">
                            <!-- <i class="fa fa-paper-plane iconawesome" aria-hidden="true"></i> -->
                            Nộp đơn
                            <!-- {{__('Job is expired')}} -->
                        </span>
                        @elseif(Auth::check() && Auth::user()->isAppliedOnJob($job->id))
                        <button class="btn btn-primary apply applied" disabled><i class="fa fa-paper-plane iconawesome" aria-hidden="true"></i>
                            {{__('Already Applied')}}</button>
                        @else
                        <a href="{{route('apply.job', $job->slug)}}" class="btn btn-primary apply"><i class="fa fa-paper-plane iconawesome" aria-hidden="true"></i>
                            Nộp đơn
                        </a>
                        @endif
                        @if(Auth::check() && Auth::user()->isFavouriteJob($job->slug))
                        <a href="{{route('remove.from.favourite', $job->slug)}}" class="btn btn-outline-primary"><i class="fas fa-heart iconoutline"></i> {{__('Favourite Job')}} </a> @else <a href="{{route('add.to.favourite', $job->slug)}}" class="btn btn-outline-primary"><i class="fas fa-heart iconoutline"></i></a>
                        @endif
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>

@include('templates.vietstar.includes.footer')
@endsection
@push('styles')
<style type="text/css">
    .view_more {
        display: none !important;
    }
</style>
@endpush
@push('scripts')
<script>
    $(document).ready(function($) {
        $("form").submit(function() {
            $(this).find(":input").filter(function() {
                return !this.value;
            }).attr("disabled", "disabled");
            return true;
        });
        $("form").find(":input").prop("disabled", false);

        $(".view_more_ul").each(function() {
            if ($(this).height() > 100) {
                $(this).css('height', 100);
                $(this).css('overflow', 'hidden');
                //alert($( this ).next());
                $(this).next().removeClass('view_more');
            }
        });

        $(document).ready(function() {
            $(window).scroll(function() {
                var scrollTop = $(window).scrollTop();
                if (scrollTop > 300) {

                    $('.page-job-detail__floating-header').addClass('is-sticky');
                } else {

                    $('.page-job-detail__floating-header').removeClass('is-sticky');

                }
            });
        });

    });
</script>
@endpush