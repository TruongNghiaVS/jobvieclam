@extends('templates.vietstar.layouts.app')

@section('content')


@include('templates.vietstar.includes.header')

<!-- Company cover -->

@include('templates.vietstar.includes.mobile_dashboard_menu')





<!-- Main content -->
<section class="company-wrapper main-content" id="main-content">
    <!-- Hero banner -->
    <section class="hero-banner-company-profile" style="background-image: url({!!asset('/vietstar/imgs/company-cover.jpg') !!});"></section>


    <div class="container">
        <section class="section-company-profile">
            <div class="container-hm">
                <div class="row">
                    <div class="col-lg-9  col-md-9 col-sm-12">

                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <div class="logo">
                                    {{ $company->locale_get_display_region }}
                                    <img src="{{url('/')}}/company_logos/{{$company->logo}}" alt="{{ $company->name }}">
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
                                            {{__('Website')}}: {{ $company->website }}
                                        </div>
                                        @endif
                                        <div class="socials">
                                            <a href="{{ $company->facebook }}" class="social" target="_blank"><i class="fa-brands fa-square-facebook"></i></a>
                                            <a href="{{ $company->twitter }}" class="social" target="_blank"><i class="fa-brands fa-square-twitter"></i></a>
                                            <a href="{{ $company->linkedin }}" class="social" target="_blank"><i class="fa-brands fa-linkedin"></i></span></a>
                                            <a href="{{ $company->google_plus }}" class="social" target="_blank"><i class="fa-brands fa-google-plus"></i></a>
                                        </div>


                                    </div>

                                </div>
                            </div>




                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-md-12 d-flex flex-column justify-content-start align-items-center">

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
        @php
        $jobs = $company->jobs;
        $minSal = count($jobs->pluck('salary_from')->toArray()) > 0 ? min($jobs->pluck('salary_from')->toArray()) : 0;
        $maxSal = count($jobs->pluck('salary_to')->toArray()) > 0 ? max($jobs->pluck('salary_to')->toArray()) : 0;
        $avaragedSal = $maxSal/2 + $minSal/2;
        @endphp
        <section class="section-company-profile-detail">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <!-- <div class="company-size">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="item-size">
                                    <div class="size-icon">
                                        <span class="iconmoon icon-recruiter-salary"></span>
                                    </div>
                                    <div class="size-content">
                                        <p>{{__('Industries')}}</p>
                                        <h4>{{ !empty($company->industry)?$company->industry->industry : 'NA' }}</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="item-size">
                                    <div class="size-icon">
                                        <i class="fa-solid fa-users-rays"></i>
                                    </div>
                                    <div class="size-content">
                                        <p>{{__('Total Employees')}}</p>
                                        <h4>{{ $company->no_of_employees }}</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="item-size">
                                    <div class="size-icon">
                                        <span class="iconmoon icon-recruiter-calendar"></span>
                                    </div>
                                    <div class="size-content">
                                        <p>{{__('Established In')}}</p>
                                        <h4>{{ $company->established_in }}</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="item-size">
                                    <div class="size-icon">
                                        <i class="fa-solid fa-suitcase"></i>
                                    </div>
                                    <div class="size-content">
                                        <p>{{__('Current jobs')}}</p>
                                        <h4>{{ $company->jobs->count() }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->


                    <div class="widget-public-profile widget-about">
                            <h4 class="title">{{__('About Company')}}</h4>

                            <div class="about-company">
                                {!! $company->description !!}
                            </div>
                        </div>

                    <div class="widget-public-profile widget-job">
                        <h4 class="title">{{__('Job Openings')}}</h4>
                        @if ($company->jobs->count() > 0)
                        @php( $jobShifts = App\JobShift::all()->pluck('job_shift','id') )

                        <div class="searchList jobs-side-list" bis_skin_checked="1">
                        
                        @foreach ($company->jobs->sortBy('id') as $cjob)
                        
                        <div data-job-id="44" class="item-job mb-3" bis_skin_checked="1">
                                <div class="logo-company" bis_skin_checked="1">
                                    <a href="{{$company->name}}" title="CTYA" class="pic">
                                        <img src="{{url('/')}}/company_logos/{{$company->logo}}" alt="{{$company->name}}">
                                    </a>
                                </div>
                                <div class="jobinfo" bis_skin_checked="1">
                                    <div class="info" bis_skin_checked="1">
                                        <!-- Title  Start-->
                                        <div class="info-item job-title-box" bis_skin_checked="1">
                                            <div class="job-title" bis_skin_checked="1">
                                                <span>Mới</span>
                                                <h3 class="job-title-name"><a href="/viec-lam/{{$cjob->slug}}" title="{{$cjob->title}}">{{$cjob->title}}</a></h3>
                                            </div>

                                            @if(Auth::check() && Auth::user()->isFavouriteJob($cjob->slug))
                                                <a class="save-job active" href="{{route('remove.from.favourite', $cjob->slug)}}"><i class="fa-regular fa-heart"></i>
                                                </a>
                                                @elseif(Auth::check() && !Auth::user()->isFavouriteJob($cjob->slug))
                                                <a class="save-job" href="{{route('add.to.favourite', $cjob->slug)}}"><i class="fa-regular fa-heart"></i>
                                                </a>
                                                @else
                                                <a class="save-job" href="#" data-toggle="modal" data-target="#user_login_Modal"><i class="fa-regular fa-heart"></i>
                                                </a>
                                            @endif
                                        </div>
                                        <!-- Title  End-->
                                        <!-- companyName Start-->
                                        <div class="info-item companyName" bis_skin_checked="1"><a href="/company/ctya-134" title="CTYA">{{$company->name}}</a></div>
                                        <!-- companyName End-->
                                        <!--rank-salary and place Start-->
                                        <div class="info-item box-meta" bis_skin_checked="1">
                                            <div class="rank-salary" bis_skin_checked="1">
                                            @php($from = round($cjob->salary_from/1000000,0))
                                            @php($to = round($cjob->salary_to/1000000,0))
                                            <?php
                                                $datetime =   Carbon\Carbon::parse($cjob->created_at);
                                                $timeCurrent = Carbon\Carbon::now();
                                                $numberDate = $timeCurrent->diffInDays($datetime);
                                                $datetimeText ="";
                                                if($numberDate < 1)
                                                {
                                                   $datetimeText = "Hôm nay";
                                                }
                                                else if($numberDate < 2){
                                                   $datetimeText = "Hôm qua";
                                                }
                                                else 
                                                {
                                                   $datetimeText =  $datetime->format('d-m-Y');
                                                }
                                            ?>
                                            @if($cjob->salary_type == \App\Job::SALARY_TYPE_FROM)
                                            <i class="fa-solid fa-dollar-sign px-1"></i> <span>
                                                {{__('From: ')}} {{$from}}
                                                {{__('million')}} ({{$cjob->salary_currency}})
                                            </span>
                                            @elseif($cjob->salary_type == \App\Job::SALARY_TYPE_TO)
                                            <i class="fa-solid fa-dollar-sign px-1"></i> 
                                            <span>
                                                {{__('Up To: ')}} {{$to}}
                                                {{__('million')}} ({{$cjob->salary_currency}})
                                            </span>
                                            @elseif($cjob->salary_type == \App\Job::SALARY_TYPE_RANGE)
                                            <i class="fa-solid fa-dollar-sign px-1"></i>
                                            <span>
                                                {{$from}} - {{$to}}
                                                {{__('million')}} ({{$cjob->salary_currency}})
                                            </span>
                                            @elseif($cjob->salary_type == \App\Job::SALARY_TYPE_NEGOTIABLE)
                                            <span class="fas fa-money-bill"></span> 
                                            <span>
                                                {{__('Negotiable')}}
                                            </span>
                                            @else
                                            <i class="fa-solid fa-dollar-sign px-1"></i> 
                                            <span>
                                                {{__('Salary Not provided')}}
                                            </span>
                                            @endif
                                            </div>

                                            <!--meta-city-->
                                            <div class="navbar__link-separator" bis_skin_checked="1"></div>
                                            <div class="meta-city" bis_skin_checked="1">
                                                <!-- <i class="far fa-map-marker-alt"></i> -->
                                                @isset($cjob->city)
                                                    {{ $cjob->city->city }}
                                                @endisset
                                            </div>
                                        </div>
                                        <!--Rank-salary and place End-->
                                        <!--Day update and place Start-->
                                        <div class="info-item day-update" bis_skin_checked="1">
                                            Cập nhật: {{$datetimeText}}
                                        </div>
                                        <!--Day update and place End-->
                                    </div>
                                    <div class="caption" bis_skin_checked="1">
                                        <div class="welfare" bis_skin_checked="1">

                                            <!-- <i class="fas fa-dollar-sign"></i>  -->
                                          
                                            @isset($cjob->industry)                       
                                            <div class="box-meta" bis_skin_checked="1">
                                                <span>
                                                    {{$cjob->industry->industry}}                                          
                                                </span>
                                                </div>
                                            @endisset

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>

                        @endif


                        
                    </div>
                    
                </div>
        </section>
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