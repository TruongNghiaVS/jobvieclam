@extends('templates.vietstar.layouts.app')
@section('content') 
<!-- Header start --> 
@include('templates.vietstar.includes.header') 
<!-- Header end --> 
<!-- Inner Page Title start --> 



<!-- Public profile cover -->



<section class="container cb-section">
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
                          {{ $user->printUserImage() }}
                        </div>
                        <ul class="info-list">
                          <li>
                            <p> <strong>Ứng viên:</strong></p>
                            <p class="name"> <strong>{{ $user->name }}</strong></p>
                          </li>
                          <li>
                            <p><strong>Tuổi</strong></p>
                            <p>{{$user->getAge()}} </p>
                          </li>
                          <li>
                            <p><strong>Quốc tịch:</strong></p>

                            <p>Viet Nam</p>
                          </li>
                          <li>
                            <p><strong>Giới tính:</strong></p>
                            <p>{{$user->getGender('gender')}} -

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
                  <p class="title-flip">Mô tả bản thân </p>
                  <div class="p-4 fs-18px">
                    {{ $user->getProfileSummary('summary') }}
                  </div>

                  <p class="title-flip">Thông tin nghề nghiệp</p>


                  <div class="job-information" bis_skin_checked="1">
                    <ul class="information-list">
                      <li>
                        <p> <strong>Năm kinh nghiệm:</strong></p>
                        <p>{{$user->getJobExperience('job_experience')}}</p>
                      </li>
                      <li>
                        <p> <strong>Bằng cấp cao nhất:</strong></p>
                        <p> Thạc sĩ </p>
                      </li>
                      <li>
                        <p> <strong>Lương hiện tại</strong></p>
                        <p>{{ number_format($user->current_salary)}}</p>
                      </li>
                      <li>
                        <p> <strong>Mức lương mong muốn:</strong></p>
                        <p>{{number_format($user->expected_salary)}} </p>
                      </li>
                      <li>
                        <p> <strong>Ngành nghề:</strong></p>
                        <p>{{$user->getIndustry('industry')}}</p>
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
                        <p>{{ date('d-m-Y', strtotime($user->created_at)) }}</p>
                      </li>
                      <li>
                        <p> <strong>Cập nhật:</strong></p>
                        <p>{{ date('d-m-Y', strtotime($user->updated_at)) }}</p>
                      </li>

                    </ul>

                  </div>
                  <p class="title-flip">Kinh nghiệm làm việc</p>
                  <div class="job-information" bis_skin_checked="1">
                    <div class="row  gy-3">
                      @if(count($user->profileExperience) > 0)
                      @foreach($user->profileExperience as $experience)
                      <div class="col-lg-9 ">
                        <div class="row  job_ex_box" >
                          <div>
                            {{ $experience->date_start->format('d M, Y') }} -  {{ is_null($experience->date_end) ? 'Hiện đang làm việc' : $experience->date_end->format('d M, Y') }}
                          </div>
                            <div class="d-flex flex-column">
                              <div><strong class="">{{ $experience->company }} - {{ $experience->title }}</strong></div>
                              <div >
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

                      @if(count($user->profileEducation) > 0)
                      @foreach($user->profileEducation as $education)
                        @php
                        $degree_type = ($education->Industries) ? ' - '.$education->Industries->industry : '';
                        @endphp

                      <div class="col-lg-9 ">
                        <div class="row  job_ex_box">
                        
                          <div class="d-flex flex-column">
                          <div><strong class="">{{ $education->getDegreeLevel('degree_level') }}  {{ $degree_type }}</strong></div>
                            <div >
                              {{ $education->date_completion }} -  {{ $education->getCity('city') }}
                            </div>
                            <div >
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

                    @if(count($user->profileSkills) > 0)
                        @foreach($user->profileSkills as $skill)
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

                    @if(count($user->profileLanguages) > 0)
                        @foreach($user->profileLanguages as $language)
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

                    @if (isset($user) && count($user->profileActivity))
                    @foreach ($user->profileActivity as $activity)
                        @php
                        $date_end = ($activity->date_end) ? $activity->date_end->format('d M, Y') : 'Currently working';
                       
                        @endphp

                      <div class="col-lg-9 ">
                        <div class="row  job_ex_box">
                        
                          <div class="d-flex flex-column">
                          <div><strong class="">{{ $activity->company  }}</strong></div>
                            <div >
                            {{ $activity->role }}
                            </div>
                            <div >
                            {{ $activity->date_start->format('d M, Y')  }} - {{  $date_end }}
                            </div>
                            <div >
                            {{ $activity->description}}
                            </div>
                            <div >
                              
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

                    @if (isset($user) && count($user->profileReferences))
                    @foreach ($user->profileReferences as $references)
                       
                      <div class="col-lg-9 ">
                        <div class="row  job_ex_box">
                        
                          <div class="d-flex flex-column">
                          <div><strong class="">{{ $references->ref_name }}</strong></div>
                            <div >
                            {{ $references->ref_company }} - {{ $references->ref_position }}
                            </div>
                            
                            <div >
                              {{ $references->ref_phone }} / {{ $references->ref_email }}
                            </div>
                            <div >
                              
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


</section>
@include('templates.vietstar.includes.footer')
@endsection
@push('styles')
<style type="text/css">
    .formrow iframe {
        height: 78px;
    }
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
    font-size: 17;
    padding: 1px;

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
  .progress-group  .progress{
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
@endpush
@push('scripts') 
<script type="text/javascript">
    $(document).ready(function () {
    $(document).on('click', '#send_applicant_message', function () {
    var postData = $('#send-applicant-message-form').serialize();
    $.ajax({
    type: 'POST',
            url: "{{ route('contact.applicant.message.send') }}",
            data: postData,
            //dataType: 'json',
            success: function (data)
            {
            response = JSON.parse(data);
            var res = response.success;
            if (res == 'success')
            {
            var errorString = '<div role="alert" class="alert alert-success">' + response.message + '</div>';
            $('#alert_messages').html(errorString);
            $('#send-applicant-message-form').hide('slow');
            $(document).scrollTo('.alert', 2000);
            } else
            {
            var errorString = '<div class="alert alert-danger" role="alert"><ul>';
            response = JSON.parse(data);
            $.each(response, function (index, value)
            {
            errorString += '<li>' + value + '</li>';
            });
            errorString += '</ul></div>';
            $('#alert_messages').html(errorString);
            $(document).scrollTo('.alert', 2000);
            }
            },
    });
    });
    showEducation();
    showProjects();
    showExperience();
    showSkills();
    showLanguages();
    });
    function showProjects()
    {
    $.post("{{ route('show.applicant.profile.projects', $user->id) }}", {user_id: {{$user->id}}, _method: 'POST', _token: '{{ csrf_token() }}'})
            .done(function (response) {
            $('#projects_div').html(response);
            });
    }
    function showExperience()
    {
    $.post("{{ route('show.applicant.profile.experience', $user->id) }}", {user_id: {{$user->id}}, _method: 'POST', _token: '{{ csrf_token() }}'})
            .done(function (response) {
            $('#experience_div').html(response);
            });
    }
    function showEducation()
    {
    $.post("{{ route('show.applicant.profile.education', $user->id) }}", {user_id: {{$user->id}}, _method: 'POST', _token: '{{ csrf_token() }}'})
            .done(function (response) {
            $('#education_div').html(response);
            });
    }
    function showLanguages()
    {
    $.post("{{ route('show.applicant.profile.languages', $user->id) }}", {user_id: {{$user->id}}, _method: 'POST', _token: '{{ csrf_token() }}'})
            .done(function (response) {
            $('#language_div').html(response);
            });
    }
    function showSkills()
    {
    $.post("{{ route('show.applicant.profile.skills', $user->id) }}", {user_id: {{$user->id}}, _method: 'POST', _token: '{{ csrf_token() }}'})
            .done(function (response) {
            $('#skill_div').html(response);
            });
    }

    function send_message() {
        const el = document.createElement('div')
        el.innerHTML = "Please <a class='btn' href='{{route('login')}}' onclick='set_session()'>log in</a> as a Employer and try again."
        @if(null!==(Auth::guard('company')->user()))
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
                    required: "Message is required",
                }

            },
            submitHandler: function(form) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                @if(null !== (Auth::guard('company')->user()))
                $.ajax({
                    url: "{{route('submit-message-seeker')}}",
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