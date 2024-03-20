@extends('templates.vietstar.layouts.app')
@section('content')
<!-- Header start -->
@include('templates.vietstar.includes.header')
<!-- Header end -->
<!-- Inner Page Title start -->
<!-- Inner Page Title end -->
@include('templates.vietstar.includes.mobile_dashboard_menu')
<div class="user-wrapper">
    @include('flash::message')
    @include('templates.vietstar.includes.default_sidebar_menu')
    <div class="content">
     

            <div class="myads">
                <h1 class="fs-25px mb-3">{{__('Applied Jobs')}}</h1>
                <div class="searchList jobs-side-list">
                    <!-- job start -->
                    @if(isset($jobs) && count($jobs))
                    @foreach($jobs as $job)
                    @php $company = $job->getCompany(); @endphp
                    @if(null !== $company)
                    <div class="item-job mb-3">
    
                        <div class="logo-company">
                            <div class="pic">
                                {{$company->printCompanyImage()}}
                            </div>
                        </div>
                        <div class="jobinfo">
                            <div class="info" bis_skin_checked="1">
                                <!-- Title  Start-->
                                <div class="info-item job-title-box" bis_skin_checked="1">
                                    <div class="job-title" bis_skin_checked="1">
                                        <!-- <span>Mới</span> -->
                                        <h3 class="job-title-name"><a href="{{route('job.detail', [$job->slug])}}" title="{{$job->title}}">{{$job->title}}</a></h3>
                                    </div>
                                    <a class="card-news__content-detail mb-2 status-apply cursor-pointer"  onclick="CV_statusmodal('{{ $job->jobApplyId }}')"   status="{{ ($job->appliedUsers) ? __(\App\JobApply::getListStatus()[$job->status_job_apply]) : '' }}">
                                        {{ ($job->appliedUsers) ? __(\App\JobApply::getListStatus()[$job->status_job_apply]) : '' }}
                                    </a>
                                </div>
                                <!-- Title  End-->
    
                                <!-- companyName Start-->
                                <div class="info-item companyName" bis_skin_checked="1"><a href="/cong-ty/{{$company->slug}}" 
                                title="{{$company->name}}">{{$company->name}}</a>
                                </div>
                                <!-- companyName End-->
                                <!--rank-salary and place Start-->
                                <div class="info-item box-meta" bis_skin_checked="1">
                                    <div class="rank-salary" bis_skin_checked="1">
                                        
                                        @php 
                                            $salaryTextFrom = 0;
                                            $salaryTextTo =  0;
                                            $textSalary ='';
                                            if($job->salary_from > 0)
                                            {
                                                $salaryTextFrom = number_format($job->salary_from, 0, '', '.');
                                            
                                            }
                                            if($job->salary_to > 0)
                                            {
                                                $salaryTextTo = number_format($job->salary_to, 0, '', '.');
                                                
                                            }
                                        @endphp
                                            @if($job->salary_type == \App\Job::SALARY_TYPE_FROM)
                                            <i class="fa-solid fa-dollar-sign"></i> {{__('From: ')}} {{$salaryTextFrom}}
                                            {{__('million')}} ({{$job->salary_currency}})
                                            @elseif($job->salary_type == \App\Job::SALARY_TYPE_TO)
                                            <i class="fa-solid fa-dollar-sign"></i> {{__('Up To: ')}} {{$salaryTextTo}}
                                            {{__('million')}} ({{$job->salary_currency}})
                                            @elseif($job->salary_type == \App\Job::SALARY_TYPE_RANGE)
                                            <i class="fa-solid fa-dollar-sign"></i> {{$salaryTextFrom}} - {{$salaryTextTo}}
                                            {{__('million')}} ({{$job->salary_currency}})
                                            @elseif($job->salary_type == \App\Job::SALARY_TYPE_NEGOTIABLE)
                                            <span class="fas fa-money-bill"></span> {{__('Negotiable')}}
                                            @else
                                            <i class="fa-solid fa-dollar-sign"></i> {{__('Salary Not provided')}}
                                            @endif
                                    </div>
                                    <div class="navbar__link-separator" bis_skin_checked="1"></div>
                                    <!--meta-city-->
                                    <div class="meta-city" bis_skin_checked="1">
                                      
                                        {{$job->getCity('city')}}
                                    </div>
    
                                  
                                </div>
                              
                                @php
                                $datetime =   Carbon\Carbon::parse($job->created_at);
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

                  
                         $datetime1 =   Carbon\Carbon::parse($job->applyDate);
                         $timeCurrent = Carbon\Carbon::now();
                         $numberDate1 = $timeCurrent->diffInDays($datetime1);
                          $datetimeText1 ="";
                         if($numberDate1 < 1)
                         {
                            $datetimeText1 = "Hôm nay";
                         }
                         else if($numberDate1 < 2){
                            $datetimeText1 = "Hôm qua";
                         }
                         else 
                         {
                            $datetimeText1 =  $datetime1->format('d-m-Y');
                         }
                                @endphp
                                <div class="info-item day-update" bis_skin_checked="1">
                                  Ngay Đăng Tuyển: {{$datetimeText}}
                                </div>

                                <div class="info-item day-update" bis_skin_checked="1">
                                  Ngày Nộp: {{$datetimeText1}}
                                </div>
                             
                            </div>
                            <div class="caption" bis_skin_checked="1">
                                

                                @isset($job->industry)
                                   <div class="welfare" bis_skin_checked="1">
                                    <div class="box-meta" bis_skin_checked="1">
                                        <!-- <i class="fas fa-dollar-sign"></i>  -->
                                        <span>
                                            <!-- Chế độ thưởng -->
                                            {{$job->industry->industry}}
                                        </span>
    
                                    </div>
                                </div>
                             
                            @endisset
    
                                <div class="user-action" bis_skin_checked="1">
                                    <a class="btn-view-details" href="javascript:void(0)" onclick ="CV_statusmodal('{{ $job->jobApplyId }}')"   status="{{ ($job->appliedUsers) ? __(\App\JobApply::getListStatus()[$job->status_job_apply]) : '' }}"></span> {{__('View Details')}}</a>
                                </div>
                            </div>
                        </div>
    
                        <!-- <p>{{\Illuminate\Support\Str::limit(strip_tags($job->description), 150, '...')}}</p> -->
                    </div>
                    <!-- job end -->
                    @endif
                    @endforeach
                    @endif
                </div>
            </div>
            <!-- Pagination -->
            <div class="pagiWrap">
                <nav aria-label="Page navigation example">
                    @if(isset($jobs) && count($jobs))
                    {{ $jobs->appends(request()->query())->links() }} @endif
                </nav>
            </div>
       
       
    </div>
</div>

<div class="modal fade" id="CV_Status" tabindex="-1" role="dialog" aria-labelledby="CV_StatusLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="CV_Statustitle">Thông báo việc làm</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ">
       
                      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        
      </div>
    </div>
  </div>
</div>


@include('templates.vietstar.includes.footer')
@endsection




@push('scripts')
<script>
    const apply_status = document.querySelectorAll(".status-apply");
    apply_status.forEach((item) => {
        // console.log(item.getAttribute('status'));
        switch (item.getAttribute('status')) {
        
            case "Từ chối":
                item.classList.remove('accept');
                item.classList.add('reject');
                break;
            default:
            item.classList.add('accept');
                item.classList.remove('reject');
                break;               
        }
    })



    function CV_statusmodal(id) {
        if(id){
            $('#CV_Status .modal-body').empty()
            $.ajax({
            type: "GET",
            url:  `jobaply/detail/${id}`,
            beforeSend:   showSpinner(),
            statusCode: {
                202 :  function(responseObject, textStatus, jqXHR) {
                    console.log(responseObject.error);
                    hideSpinner();
        
                },
                401: function(responseObject, textStatus, jqXHR) {
                    // No content found (404)
                    hideSpinner();
                   
                },
                503: function(responseObject, textStatus, errorThrown) {
                    hideSpinner();
           
                }           
                }
                })
                .done(function(data){
                    hideSpinner();

                    if (data) {
                        $('#CV_Status .modal-body').append(data);
                    }
                })
                .fail(function(jqXHR, textStatus){
                    hideSpinner();
                 
                    
                })
                .always(function(jqXHR, textStatus) {
                
                });
        }
        // Show the modal
        $('#CV_Status').modal('show');
    }

</script>
@endpush
@push('scripts')
@include('templates.vietstar.includes.immediate_available_btn')
@endpush