
@php
$user = Auth::user()

@endphp

@if(Auth::user())
<div class="modal fade" id="modal_user_info" tabindex="-1" role="dialog" aria-labelledby="modal_user_infoLabel" aria-hidden="true">
    <div class="modal-dialog modal_user_dialog" role="document" id="modal_user_dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_user_infoLabel">{{__('View Public Profile')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- <div class="card card-bio mb-4 w-100 shadow-sm" bis_skin_checked="1">
                    <div class="row g-0" bis_skin_checked="1">
                        <div class="col-md-3" bis_skin_checked="1">
                            <div class="img-avatar__wrapper" bis_skin_checked="1">
                            @if(Auth::user())
                            {{Auth::user()->printUserImage()}}
                            @else
                            <img id="avatar" class="" src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="Avatar">
                            @endif
                            </div>
                        </div>
                        <div class="col-md-9" bis_skin_checked="1">
                            <div class="card-body card-body-profile-seeker" bis_skin_checked="1">
                                <h5 class="card-title text-sub-color">Trung Đức Trần</h5>
                                <p class="card-text justify-content-between align-items-center">

                                
                                {{ auth()->user()->getProfileSummary('summary') }}
                                </p>

                            </div>

                            <div class="card-body contact-bio" bis_skin_checked="1">
                                <span class="contact-bio-info me-4 mb-2"><i class="iconmoon icon-recruiter-location"></i>{{Auth::user()->getLocation()}}</span>
                                <span class="contact-bio-info me-4 mb-2"><i class="iconmoon icon-recruiter-phone-call"></i>{{auth()->user()->phone}}</span>
                                <span class="contact-bio-info me-4 mb-2"><i class="iconmoon icon-recruiter-email"></i>{{auth()->user()->email}}</span>
                            </div>

                        </div>
                    </div>
                </div> -->

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
            <p class="title-flip">Học Vấn</p>
            <div class="job-information" bis_skin_checked="1">

              <div class="row">
                  @if(count($user->profileExperience) > 0)
                              @foreach($user->profileExperience as $experience)
                              <div class="col-lg-6">
  
                                
                                    <div class="time">
                                       <span>
                                         {{ $experience->date_start->format('d M, Y') }}
                                       </span> 
                                       <span>
                                         {{ is_null($experience->date_end) ? 'Hiện đang làm việc' : $experience->date_end->format('d M, Y') }}
                                       <span>
  
                                        
                                    </div>
                                    <div class="d-flex flex-column">
                                        <div ><strong class="mx-1" >{{ $experience->company }}</strong> | <strong class="mx-1">{{ $experience->title }}</strong></div>
                                        <div class="my-1">
                                            {{ $experience->description }}
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

            </div>

        <!-- <div class="modal-footer">
            <a href="{{ route('view.public.profile', Auth::user()->id) }}" class=" {{ route('view.public.profile', Auth::user()->id) }}" target="_blank">Xem thêm</a>
        </div> -->
        </div>
    </div>
</div>
@endif
@push('styles')
<style>
    .modal-dialog.modal_user_dialog {
        max-width: 90%;
        height: 100vh;
    }
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
    .job-information .time{
    width: 100px;
    float: left;
    text-align: center;
   }
 
    


</style>
@endpush

