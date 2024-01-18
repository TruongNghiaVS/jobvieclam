<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="{{ asset('/vietstar/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/vietstar/css/user_update.css')}}" rel="stylesheet">
    <link href="{{ asset('/vietstar/css/employee_update.css')}}" rel="stylesheet">
    <link href="{{ asset('/vietstar/css/responsive.css')}}" rel="stylesheet">
    <link href="{{ asset('/vietstar/css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('/vietstar/fonts/icon-vietstart/style.css')}}" rel="stylesheet">
    <link href="{{ asset('/vietstar/css/recruiter.css')}}" rel="stylesheet">
    <link href="{{ asset('/vietstar/css/select2.min.css')}}" rel="stylesheet" />
    <link href="{{ asset('/vietstar/css/jquery.multiselect.css')}}" rel="stylesheet">
    <link href="{{ asset('/vietstar/css/chosen/chosen.min.css')}}" rel="stylesheet">
    <link href="{{asset('/')}}vendor/bootstrap-date-time-picker/css/bootstrap-datetimepicker.min.css" rel="stylesheet"
    type="text/css" />
   
    <link href="{{ asset('/fontawesome-free-6.5.1-web/css/all.min.css')}}" rel="stylesheet">
    <link href="{{ asset('/vietstar/css/default_sidebar.css')}}" rel="stylesheet">
    <link href="{{ asset('/vietstar/css/animation.css')}}" rel="stylesheet">
    <link href="{{ asset('/vietstar/css/font-awsome.min.css')}}" rel="stylesheet">
    <link href="{{ asset('/vietstar/css/custom-chosen.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper/css/swiper.min.css">
    <link href="{{ asset('/vietstar/css/default_sidebar.css')}}" rel="stylesheet">
    <link href="{{ asset('/vietstar/css/login.css')}}" rel="stylesheet">
    <link href="{{ asset('/vietstar/css/update.css')}}" rel="stylesheet">
    <link href="{{ asset('/vietstar/css/user_update.css')}}" rel="stylesheet">
    <link href="{{ asset('/vietstar/css/employee_update.css')}}" rel="stylesheet">
    <link href="{{ asset('/vietstar/css/responsive.css')}}" rel="stylesheet">
    <style>
        .user-account-section .action {
            background: #fff1f4;
            padding: 8px 20px;
        }

        .user-account-section .action .action-list {
            display: flex;
            list-style-type: none;
            margin-bottom: 0;
            padding-left: 0;
            -webkit-box-pack: end;
            -ms-flex-pack: end;
            justify-content: flex-end;
        }

        .box-profile-view .section-head .title {
            color: var(--bs-primary);
            font-size: 16px;
            font-weight: 700;
            text-transform: uppercase;
        }

        .box-profile-view .section-body .info {
            display: flex;
        }

        .box-profile-view .section-body .info .image {
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 160px;
            height: 160px;
            margin-top: 20px;
            margin-right: 40px;
            margin-left: 0;
            overflow: hidden;
        }

        .box-profile-view .section-body .info .image img {
            width: 100%;
            height: 100%;
        }

        .box-profile-view .section-body .info .info-list {
            margin-top: 25px;
            list-style-type: none;
        }

        .box-profile-view .section-body .info-list li {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
        }

        .box-profile-view .section-body .info-list li p:first-child {
            width: 200px;
            min-width: 200px;
            padding-right: 10px;
        }

        .box-profile-view .section-body .info-list li p {
            color: #182642;
            font-size: 17px;
            padding: 1px;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            display: -webkit-box;
            overflow: hidden;
        }

        .box-profile-view .title-flip {
            margin-top: 15px;
            padding: 8px 20px;
            background: #fff1f4;
            color: #172642;
            font-size: 16px;
            font-weight: 700;
            text-transform: uppercase;
        }

        .box-profile-view .job-information {
            margin-top: 15px;
            padding: 0 15px;
        }

        .box-profile-view .job-information .information-list {
            display: flex;
            flex-wrap: wrap;
            list-style-type: none;
            padding: 0;
        }

        .box-profile-view .job-information .information-list li {
            flex: 0 0 100%;
            max-width: 100%;
            width: 100%;
            padding-right: 10px;
            display: flex;
        }

        .experience_box {
            display: flex;
        }

        .box-profile-view .job-information .information-list li p:first-child {
            width: 300px;
            min-width: 300px;
            padding-right: 5px
        }

        .job-information .time {
            width: 100px;
            float: left;
            text-align: center;
        }

        .progress-group .progress {
            position: relative;
        }

        .progress-group .progress .line {
            position: absolute;
            top: 0;
            height: 100%;
            width: 2px;
            background-color: #ffffff;
            display: block;
            opacity: 0.8;
        }

        .progress .line.line-1 {
            left: 20%;

        }

        .progress .line.line-2 {
            left: 40%;
        }

        .progress .line.line-3 {
            left: calc(60% - 1px);
        }

        .progress .line.line-4 {
            left: calc(80% - 2px);
        }
    </style>
</head>

<body>
    <main style="padding-top:76px; padding-bottom:76px; ">
        <div class="container company-content CV-profile border rounded p-2" id="CV-{{$data->id ? $data->id : '0' }}">
            <div class="user-account-section border" bis_skin_checked="1">

                <div class="box-profile-view" bis_skin_checked="1">
                    <div class="formpanel mt0" bis_skin_checked="1">
                        <div class="section-head" bis_skin_checked="1">
                            <h3 class="title">Thông tin ứng viên</h3>
                        </div>
                        <div class="section-body" bis_skin_checked="1">
                            <div class="row" bis_skin_checked="1">
                                <div class="col-lg-12 col-md-12 col-sm-12" bis_skin_checked="1">
                                    <div class="info" bis_skin_checked="1">
                                        <div class="image" bis_skin_checked="1">
                                            {{ $data->printUserImage() }}
                                        </div>
                                        <ul class="info-list">
                                            <li>
                                                <p> <strong>Ứng viên:</strong></p>
                                                <p class="name"> <strong>{{ $data->name }}</strong></p>
                                            </li>
                                            <li>
                                                <p><strong>Tuổi</strong></p>
                                                <p>{{$data->getAge()}} </p>
                                            </li>
                                            <li>
                                                <p><strong>Quốc tịch:</strong></p>

                                                <p>Viet Nam</p>
                                            </li>
                                            <li>
                                                <p><strong>Giới tính:</strong></p>
                                                <p>{{$data->getGender('gender')}} -

                                                    Đã kết hôn

                                                </p>
                                            </li>

                                            <li>
                                                <p><strong>Tỉnh/Thành Phố:</strong></p>
                                                <p>{{Auth::user()->getCity('city') ? Auth::user()->getCity('city') : __('Not update') }}</p>
                                            </li>
                                            <li>
                                                <p><strong>Email: </strong></p>
                                                <p> {{ auth()->user()->email ? auth()->user()->email : __('Not update') }} </p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                            <p class="title-flip">Mô tả bản thân</p>
                            <div class="p-4 fs-18px">
                                {{ $data->getProfileSummary('summary') }}
                            </div>

                            <p class="title-flip">Thông tin nghề nghiệp</p>


                            <div class="job-information" bis_skin_checked="1">
                                <ul class="information-list">
                                    <li>
                                        <p> <strong>Năm kinh nghiệm:</strong></p>
                                        <p>{{$data->getJobExperience('job_experience')}}</p>
                                    </li>
                                    <li>
                                        <p> <strong>Bằng cấp cao nhất:</strong></p>
                                        <p> Thạc sĩ </p>
                                    </li>
                                    <li>
                                        <p> <strong>Lương hiện tại</strong></p>
                                        <p>{{ number_format($data->current_salary)}}</p>
                                    </li>
                                    <li>
                                        <p> <strong>Mức lương mong muốn:</strong></p>
                                        <p>{{number_format($data->expected_salary)}} </p>
                                    </li>
                                    <li>
                                        <p> <strong>Ngành nghề:</strong></p>
                                        <p>{{$data->getIndustry('industry')}}</p>
                                    </li>
                                    <li>
                                        <p> <strong>Địa điểm:</strong></p>
                                        <p>{{Auth::user()->getCity('city') ? Auth::user()->getCity('city') : __('Not update') }}</p>
                                    </li>
                                    <li>
                                        <p> <strong>{{__('Career Level')}}</strong></p>
                                        <p>Nhân viên</p>
                                    </li>

                                    <li>
                                        <p> <strong>Bộ phận</strong></p>
                                        <p>Hành Chính</p>
                                    </li>

                                    <li>
                                        <p> <strong>Ngày tạo:</strong></p>
                                        <p>{{ date('d-m-Y', strtotime($data->created_at)) }}</p>
                                    </li>
                                    <li>
                                        <p> <strong>Cập nhật:</strong></p>
                                        <p>{{ date('d-m-Y', strtotime($data->updated_at)) }}</p>
                                    </li>

                                </ul>

                            </div>
                            <p class="title-flip">Kinh nghiệm làm việc</p>
                            <div class="job-information" bis_skin_checked="1">
                                <div class="row  gy-3">
                                    @if(count($data->profileExperience) > 0)
                                    @foreach($data->profileExperience as $experience)
                                    <div class="col-lg-9 ">
                                        <div class="row  job_ex_box">
                                            <div>
                                                {{ $experience->date_start->format('d M, Y') }} - {{ is_null($experience->date_end) ? 'Hiện đang làm việc' : $experience->date_end->format('d M, Y') }}
                                            </div>
                                            <div class="d-flex flex-column">
                                                <div><strong class="">{{ $experience->company }} - {{ $experience->title }}</strong></div>
                                                <div>
                                                    {{ $experience->description }}
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                            <p class="title-flip">Học vấn</p>
                            <div class="job-information" bis_skin_checked="1">
                                <div class="row  gy-3">

                                    @if(count($data->profileEducation) > 0)
                                    @foreach($data->profileEducation as $education)
                                    @php
                                    $degree_type = ($education->Industries) ? ' - '.$education->Industries->industry : '';
                                    @endphp

                                    <div class="col-lg-9 ">
                                        <div class="row  job_ex_box">

                                            <div class="d-flex flex-column">
                                                <div><strong class="">{{ $education->getDegreeLevel('degree_level') }} {{ $degree_type }}</strong></div>
                                                <div>
                                                    {{ $education->date_completion }} - {{ $education->getCity('city') }}
                                                </div>
                                                <div>
                                                    {{ $education->institution }}
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                            <p class="title-flip">Kĩ năng</p>
                            <div class="job-information" bis_skin_checked="1">
                                <div class="row  gy-3">

                                    @if(count($data->profileSkills) > 0)
                                    @foreach($data->profileSkills as $skill)
                                    <div class="col-lg-9 ">

                                        <div class="progress-group">
                                            <div>{{ $skill->getJobSkill('job_skill') }}</div>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: {{ 100 * $skill['job_experience_id']/5 }}%" aria-valuenow="{{ 100 * $skill['job_experience_id']/5 }}" aria-valuemin="0" aria-valuemax="100"></div>
                                                <div class="line line-1"></div>
                                                <div class="line line-2"></div>
                                                <div class="line line-3"></div>
                                                <div class="line line-4"></div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                            <p class="title-flip">Ngoại ngữ</p>
                            <div class="job-information" bis_skin_checked="1">
                                <div class="row  gy-3">

                                    @if(count($data->profileLanguages) > 0)
                                    @foreach($data->profileLanguages as $language)
                                    <div class="col-lg-9 ">

                                        <div class="progress-group">
                                            <div>{{ $language->getLanguageLevel('language_level') }}</div>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: {{ ceil(100 * $language->getLanguageLevel('language_level_id')/6) }}%" aria-valuenow="{{ ceil(100 * $language['language_level_id']/6) }}" aria-valuemin="0" aria-valuemax="100"></div>
                                                <div class="line line-1"></div>
                                                <div class="line line-2"></div>
                                                <div class="line line-3"></div>
                                                <div class="line line-4"></div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                            </div>

                            <p class="title-flip">Hoạt động</p>
                            <div class="job-information" bis_skin_checked="1">
                                <div class="row  gy-3">

                                    @if (isset($data) && count($data->profileActivity))
                                    @foreach ($data->profileActivity as $activity)
                                    @php
                                    $date_end = ($activity->date_end) ? $activity->date_end->format('d M, Y') : 'Currently working';

                                    @endphp

                                    <div class="col-lg-9 ">
                                        <div class="row  job_ex_box">

                                            <div class="d-flex flex-column">
                                                <div><strong class="">{{ $activity->company  }}</strong></div>
                                                <div>
                                                    {{ $activity->role }}
                                                </div>
                                                <div>
                                                    {{ $activity->date_start->format('d M, Y')  }} - {{ $date_end }}
                                                </div>
                                                <div>
                                                    {{ $activity->description}}
                                                </div>
                                                <div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                            </div>

                            <p class="title-flip">Người giới thiệu</p>
                            <div class="job-information" bis_skin_checked="1">
                                <div class="row  gy-3">

                                    @if (isset($data) && count($data->profileReferences))
                                    @foreach ($data->profileReferences as $references)

                                    <div class="col-lg-9 ">
                                        <div class="row  job_ex_box">

                                            <div class="d-flex flex-column">
                                                <div><strong class="">{{ $references->ref_name }}</strong></div>
                                                <div>
                                                    {{ $references->ref_company }} - {{ $references->ref_position }}
                                                </div>

                                                <div>
                                                    {{ $references->ref_phone }} / {{ $references->ref_email }}
                                                </div>
                                                <div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>