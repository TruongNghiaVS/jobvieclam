
<!-- Header end --> 
<!-- Inner Page Title start --> 



<?php 
 if(isset( $user)){

 }
 else 
 {
  $user = Auth::user();
 }

 


?>



<div class="container company-content" bis_skin_checked="1">
    <div class="user-account-section" bis_skin_checked="1">

      <div class="box-profile-view" bis_skin_checked="1">
        <div class="formpanel mt0" bis_skin_checked="1">
          <div class="section-head" bis_skin_checked="1">
            <h3 class="title">Thông tin ứng viên</h3>
          </div>
          <div class="section-body" bis_skin_checked="1">
            <div class="row" bis_skin_checked="1">
              <div class="col-lg-6 col-md-12 col-sm-12" bis_skin_checked="1">
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
                      
                      <p>@if($user->nationality_id)
                            @foreach ($nationalities as $key => $nationalitie)
                                @if( $key == $user->nationality_id )
                                {{$nationalitie }}
                                @endif
                            @endforeach
                        @endif</p>
                    </li>
                    <li>
                      <p><strong>Giới tính:</strong></p>
                      <p>{{$user->getGender('gender')}} - 
                      
                      @if($user->marital_status_id)
                            @foreach ($maritalStatuses as $key => $maritalStatuse)
                                @if( $key == $user->marital_status_id )
                                {{$maritalStatuse }}
                                @endif
                            @endforeach
                        @endif
                    
                    </p>
                    </li>
                    
                    <li>
                      <p><strong>Tỉnh/Thành Phố:</strong></p>
                      <p>{{Auth::user()->getLocation() ? Auth::user()->getLocation() : __('Not update') }}</p>
                    </li>
                    <li>
                      <p><strong>Email: </strong></p>
                      <p> {{ auth()->user()->email ? auth()->user()->email : __('Not update') }}  </p>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-lg-6 col-md-12 col-sm-12" bis_skin_checked="1">
                
              </div>
            </div>
            <p class="title-flip">Mô tả bản thân</p>
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
                  <p> Chưa có thông tin</p>
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
                  <p>Chưa cập nhật</p>
                </li>
                <li>
                  <p> <strong>Hình thức:</strong></p>
                  <p>Chưa cập nhật</p>
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
            <!-- <p class="title-flip">NỘI DUNG HỒ SƠ</p> -->
          </div>

        </div>
      </div>
    </div>
  </div>

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
    }
    .box-profile-view .job-information .information-list li {
      flex: 0 0 50%;
      max-width: 50%;
      width: 100%;
      padding-right: 10px;
      display: flex;
    }
    .box-profile-view .job-information .information-list li p:first-child {
      width: 200px;
      min-width: 200px;
      padding-right: 5px
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
