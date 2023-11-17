@extends('templates.vietstar.layouts.app')
@section('content')
<!-- Header start -->
@include('templates.vietstar.includes.header')
<!-- Header end -->

<!-- Inner Page Title start -->


<!-- Dashboard menu start -->
@include('templates.vietstar.includes.mobile_dashboard_menu')
<!-- Dashboard menu end -->

<!-- Inner Page Title end -->
<div class="listpgWraper Jobpage">

    @include('templates.vietstar.job.inc.filters_job_wrapper')

    <div class="container Jobpage__content">
        <form id="" action="{{route('job.list')}}" method="get">
            <!-- Search Result and sidebar start -->
            <div class="row">
                <div class="col-lg-9 col-sm-12">
                    <div class="job-sorting-section">
                        <div class="sort-wrapped">
                            <div class="title sort-label">Sắp xếp theo</div>
                            <div class="sort-item-wrapped bg-white p-3">
                                <form>


                                    <!-- <div class="sort-item-wrapped__item active">Mặc định</div>
                                <div class="sort-item-wrapped__item">Lương &lpar; cao - thấp &rpar; </div>
                                <div class="sort-item-wrapped__item">Ngày đăng &lpar; mới nhất &rpar;</div>
                                <div class="sort-item-wrapped__item">Ngày đăng &lpar; cũ nhất &rpar;</div>
                                <div class="sort-item-wrapped__item">Làm việc từ xa</div> -->
                                    <div class="form-check-inline p-1">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="default" value="" checked>
                                        <label class="form-check-label px-1" for="default">Mặc định</label>
                                    </div>

                                    <div class="form-check-inline p-1">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                        <label class="form-check-label px-1" for="inlineRadio1">Lương &lpar; cao - thấp &rpar;</label>
                                    </div>
                                    <div class="form-check-inline p-1">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                        <label class="form-check-label px-1" for="inlineRadio2">Ngày đăng &lpar; mới nhất &rpar;</label>
                                    </div>
                                    <div class="form-check-inline p-1">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                                        <label class="form-check-label px-1" for="inlineRadio3">Ngày đăng &lpar; cũ nhất &rpar;</label>
                                    </div>
                                    <div class="form-check-inline p-1">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio4" value="option4">
                                        <label class="form-check-label px-1" for="inlineRadio4">Làm việc từ xa</label>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @include('flash::message')
                    <!-- Search List -->
                    {{-- <div class="searchList jobs-side-list">
                        <!-- job start -->
                        @if(isset($jobs) && count($jobs)) <?php $count_1 = 1; ?> @foreach($jobs as $job) @php $company =
                        $job->getCompany(); @endphp
                        <?php if (isset($company)) {
                        ?>
                            <?php if ($count_1 == 7) { ?>
                                <div class="inpostad">
                                    <img src="https://png.pngtree.com/thumb_back/fh260/back_pic/00/02/44/5056179b42b174f.jpg" alt="">
                                </div>
                            <?php } else { ?>
                                @php
                                $props = ["title", "job_type", "job_experience_id", "state_id", "city_id", "job_type_id",
                                "salary_currency", "salary_from", "salary_to",
                                "company_id", "department_id", "skill_id", "industry_id", "gender_id", "degree_level_id",
                                "career_level_id", "job_shift_id", "job_type_id" ];
                                $attrs = "";
                                foreach ($props as $prop) {
                                $attrs .= !empty($job->{$prop}) ? "data-{$prop}-id={$job->{$prop}} " : '';
                    }

                    @endphp
                    <div data-job-id="{{$job->id}}" {{$attrs}} class="item-job mb-3">
                        <div class="logo-company">
                            <a href="{{route('company.detail', $company->slug)}}" title="{{$company->name}}" class="pic">{{$company->printCompanyImage(140, 140)}}</a>
                        </div>
                        <div class="jobinfo">
                            <div class="info">
                                <!-- Title  Start-->
                                <div class="info-item job-title-box">
                                    <div class="job-title">
                                        <span>Mới</span>
                                        <h3 class="job-title-name"><a href="{{route('job.detail', [$job->slug])}}" title="{{$job->title}}">{{$job->title}}</a></h3>
                                    </div>
                                    @if(Auth::check() && Auth::user()->isFavouriteJob($job->slug))
                                    <a class="save-job active" href="{{route('remove.from.favourite', $job->slug)}}"><i class="far fa-heart"></i>
                                    </a>
                                    @elseif(Auth::check() && !Auth::user()->isFavouriteJob($job->slug))
                                    <a class="save-job" href="{{route('add.to.favourite', $job->slug)}}"><i class="far fa-heart"></i>
                                    </a>
                                    @else
                                    <a class="save-job" href="#" data-toggle="modal" data-target="#user_login_Modal"><i class="far fa-heart"></i>
                                    </a>
                                    @endif
                                    </a>
                                </div>
                                <!-- Title  End-->

                                <!-- companyName Start-->
                                <div class="info-item companyName"><a href="{{route('company.detail', $company->slug)}}" title="{{$company->name}}">{{$company->name}}</a></div>
                                <!-- companyName End-->
                                <!--rank-salary and place Start-->
                                <div class="info-item box-meta">
                                    <div class="rank-salary">
                                        @php($from = round($job->salary_from/1000000,0))
                                        @php($to = round($job->salary_to/1000000,0))
                                        @if($job->salary_type == \App\Job::SALARY_TYPE_FROM)
                                        <span class="fas fa-dollar-sign"></span> {{__('From: ')}} {{$from}}
                                        {{__('million')}} ({{$job->salary_currency}})
                                        @elseif($job->salary_type == \App\Job::SALARY_TYPE_TO)
                                        <span class="fas fa-dollar-sign"></span> {{__('Up To: ')}} {{$to}}
                                        {{__('million')}} ({{$job->salary_currency}})
                                        @elseif($job->salary_type == \App\Job::SALARY_TYPE_RANGE)
                                        <span class="fas fa-dollar-sign"></span> {{$from}} - {{$to}}
                                        {{__('million')}} ({{$job->salary_currency}})
                                        @elseif($job->salary_type == \App\Job::SALARY_TYPE_NEGOTIABLE)
                                        <span class="fas fa-money-bill"></span> {{__('Negotiable')}}
                                        @else
                                        <span class="fas fa-dollar-sign"></span> {{__('Salary Not provided')}}
                                        @endif
                                    </div>
                                    <div class="navbar__link-separator" bis_skin_checked="1"></div>
                                    <!--meta-city-->
                                    <div class="meta-city">
                                        <!-- <i class="far fa-map-marker-alt"></i> -->
                                        {{$job->getCity('city')}}
                                    </div>


                                    <!-- {{$job->getJobType('job_type')}} -->
                                </div>
                                <!--Rank-salary and place End-->

                                <!--Day update and place Start-->
                                <div class="info-item day-update">
                                    Hôm nay
                                </div>
                                <!--Day update and place End-->

                                <!-- <div class="short-description">{{\Illuminate\Support\Str::limit(strip_tags($job->description), 150, '...')}}</div> -->
                            </div>

                            <div class="caption">
                                <div class="welfare">
                                    <div class="box-meta">
                                        <!-- <i class="fas fa-dollar-sign"></i>  -->
                                        <span>
                                            <!-- {{__('Rewards')}} -->
                                            Automative
                                        </span>

                                    </div>
                                    <div class="box-meta">
                                        <!-- <i class="fas fa-graduation-cap"></i> -->
                                        <span>
                                            <!-- {{__('Training')}} -->
                                            Automative Infomation
                                        </span>
                                    </div>

                                </div>


                            </div>
                        </div>


                    </div>
                <?php } ?>
                <?php $count_1++; ?>
            <?php } ?>
            <!-- job end -->
            @endforeach @endif
            <!-- job end -->
                </div>
                --}}

                <div class="searchList jobs-side-list">

                </div>
                <!-- Pagination Start -->
                <div class="pagiWrap">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="showreslt">
                                {{__('Showing Pages')}} : {{ $jobs->firstItem() }} - {{ $jobs->lastItem() }}
                                {{__('Total')}} {{ $jobs->total() }}
                            </div>
                        </div>
                        <div class="col-md-7 text-right">
                            @if(isset($jobs) && count($jobs))
                            {{ $jobs->appends(request()->query())->links() }}
                            @endif
                        </div>
                    </div>
                </div>
                <!-- Pagination end -->
            </div>
            <div class="col-lg-3 col-sm-12 pull-right">
                <!-- Sponsord By -->
                <div class="sidebar">
                    @include('templates.vietstar.job.inc.ads')
                </div>
            </div>
    </div>

</div>
</div>
<div class="modal fade" id="show_alert" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <form id="submit_alert">
                @csrf
                <input type="hidden" name="search" value="{{ Request::get('search') }}">
                <input type="hidden" name="country_id" value="@if(isset(Request::get('country_id')[0])) {{ Request::get('country_id')[0] }} @endif">
                <input type="hidden" name="state_id" value="@if(isset(Request::get('state_id')[0])){{ Request::get('state_id')[0] }} @endif">
                <input type="hidden" name="city_id" value="@if(isset(Request::get('city_id')[0])){{ Request::get('city_id')[0] }} @endif">
                <input type="hidden" name="functional_area_id" value="@if(isset(Request::get('functional_area_id')[0])){{ Request::get('functional_area_id')[0] }} @endif">
                <div class="modal-header">
                    <h4 class="modal-title">Job Alert</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body">
                    <h3>Get the latest <strong>{{ ucfirst(Request::get('search')) }}</strong> jobs
                        @if(Request::get('location')!='') in
                        <strong>{{ ucfirst(Request::get('location')) }}</strong>@endif sent straight to your inbox
                    </h3>
                    <div class="form-group">
                        <input type="text" class="form-control" name="email" id="email" placeholder="Enter your Email" value="@if( Auth::check() ) {{Auth::user()->email}} @endif">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@include('templates.vietstar.includes.footer')
@endsection
@push('styles')
<style type="text/css">
    .searchList li .jobimg {
        min-height: 80px;
    }

    .hide_vm_ul {
        height: 100px;
        overflow: hidden;
    }

    .hide_vm {
        display: none !important;
    }

    .view_more {
        cursor: pointer;
    }

    .form-check-label {
        cursor: pointer;
    }
</style>
@endpush
@push('scripts')
<script>
    function checksalary(salary_from, salary_to) {
        if (salary_from && salary_to) {
            return `${salary_from.toLocaleString('it-IT', {style : 'currency', currency : 'VND'})} - ${salary_to.toLocaleString('it-IT', {style : 'currency', currency : 'VND'})}`
        } else if (salary_from && !salary_to) {
            return `{{__('From: ')}} ${salary_from.toLocaleString('it-IT', {style : 'currency', currency : 'VND'})}`
        } else if (!salary_from && salary_to) {
            return `{{__('Up To: ')}} ${salary_to.toLocaleString('it-IT', {style : 'currency', currency : 'VND'})}`
        } else
            return `{{__('Negotiable')}}`

    }



    function convertDatetime(created_at) {


        const date = new Date(created_at);

        // Get day, month, and year components
        const day = date.getUTCDate();
        const month = date.getUTCMonth() + 1; // Months are zero-based
        const year = date.getUTCFullYear();
        const created_at_formattedDate = `${day}/${month}/${year}`;
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();

        today = dd + '/' + mm + '/' + yyyy;




        // Parse date strings to get Date objects
        const dateParts1 = created_at_formattedDate.split('/');
        const date1 = new Date(`${dateParts1[2]}-${dateParts1[1]}-${dateParts1[0]}`);

        const dateParts2 = today.split('/');
        const date2 = new Date(`${dateParts2[2]}-${dateParts2[1]}-${dateParts2[0]}`);

        // Calculate the difference in milliseconds
        const timeDifference = date2 - date1;

        // Convert the time difference to days
        const daysDifference = timeDifference / (1000 * 60 * 60 * 24);

        if (Math.round(daysDifference) > 10) {
            return created_at_formattedDate;
        } else {
            return daysDifference;
        }


    }

    // $(document).ready(function() {



    //         $.ajax({
    //             type: "GET",
    //             url: "{{url('/')}}/jobs-v2?page=1",
    //             data: filters,
    //             success: function (data) {
    //                 // $(".searchList.jobs-side-list").children("div").remove();

    //                 if(data.data){

    //                 let img_url = ``
    //                 let  string  = ''
    //                 data.data.forEach((element,id) => {

    //                     let url = element.company.cover_logo;
    //                     let salary_from =  element.salary_from;
    //                     let salary_to = element.salary_to;
    //                     let string_salary = ''
    //                     if (url) {
    //                         img_url = `{{url('/')}}/company_logos/${url}`
    //                     }
    //                     else {
    //                         img_url = `{{url('/')}}/admin_assets/no-image.png`
    //                     }

    //                     // insert ads
    //                     if(id == 5) {
    //                         html.push(`   <div class="inpostad">
    //                                     <img src="https://png.pngtree.com/thumb_back/fh260/back_pic/00/02/44/5056179b42b174f.jpg" alt="">
    //                                 </div>`)
    //                     }  


    //                     string_salary  = checksalary(salary_from,salary_to)

    //                     const datetime = convertDatetime(element.created_at)


    //                     let  string = `
    //                      <div data-job-id="${element.id}"  class="item-job mb-3">
    //                                     <div class="logo-company">
    //                                         <a href="{{url('/')}}/company/${element.company.slug}" title="${element.company.name}" class="pic">

    //                                                 <img src="${img_url}" alt="">
    //                                         </a>
    //                                     </div>
    //                                     <div class="jobinfo">
    //                                         <div class="info">
    //                                             <!-- Title  Start-->
    //                                             <div class="info-item job-title-box">
    //                                                 <div class="job-title">
    //                                                     <span>Mới</span>
    //                                                     <h3 class="job-title-name"><a href="{{url('/')}}/job/${element.slug}" title="">${element.title}</a></h3>
    //                                                 </div>`;

    //                                                 if(1==1)
    //                                                 {
    //                                                     string +=  `<a class="save-job" href="#" data-toggle="modal" data-target="#user_login_Modal"><i class="far fa-heart"></i>
    //                                                 </a>`;
    //                                                 }

    //                                         string +=  `</div>
    //                                             <!-- Title  End-->

    //                                             <!-- companyName Start-->
    //                                             <div class="info-item companyName"><a href="{{url('/')}}/company/${element.company.slug}" title="${element.company.name}">${element.company.name}</a></div>
    //                                             <!-- companyName End-->
    //                                             <!--rank-salary and place Start-->
    //                                             <div class="info-item box-meta">
    //                                                 <div class="rank-salary">
    //                                                     ${string_salary}
    //                                                 </div>
    //                                                 <div class="navbar__link-separator" bis_skin_checked="1"></div>
    //                                                 <!--meta-city-->
    //                                                 <div class="meta-city">
    //                                                     <!-- <i class="far fa-map-marker-alt"></i> -->
    //                                                     ${element.city.city}
    //                                                 </div>
    //                                             </div>
    //                                             <!--Rank-salary and place End-->

    //                                             <!--Day update and place Start-->
    //                                             <div class="info-item day-update">
    //                                                 {{__('Update')}}: ${datetime}
    //                                             </div>
    //                                             <!--Day update and place End-->
    //                                         </div>

    //                                         <div class="caption">
    //                                             <div class="welfare">
    //                                                 <div class="box-meta">
    //                                                     <!-- <i class="fas fa-dollar-sign"></i>  -->
    //                                                     <span>
    //                                                         <!-- {{__('Rewards')}} -->
    //                                                         ${element.functional_area.functional_area}
    //                                                     </span>
    //                                                 </div>

    //                                             </div>
    //                                         </div>
    //                                     </div>
    //                                 </div>

    //                     `
    //                     console.log(1);

    //                     html.push(string)

    //                 });


    //                 // $(".searchList.jobs-side-list").append(html.join(" "));
    //             }

    //             console.log(datafromapi);
    //         },
    //         error: function(xhr, status, error) {
    //                 console.error('Error:', error);
    //         }
    //     });







    // })

    $(document).ready(function() {
        // Load all jobs when the page loads
          loadJobs();

        // Category filter change event
        $('.filter_submit').on('click', function() {
            loadJobs();
        });
    });



    const loadJobs =  () =>  {
        // Get filter values

        var searchQuery = $('#job_filter').serialize();
       
        // Make an AJAX request
       $.ajax({
            url: '{{url('/')}}/jobs-v2?page=1',
            type: 'GET',
            data: searchQuery,
            success: function(data) {
                // Display data in HTML
                renderJobList(data.data);
            },
            error: function(error) {
                console.error(error);
            }
        });
    }

    const  renderJobList = async (data) => {
       
        
        // Assuming data is an array of job objects
        var jobListing = $('.searchList.jobs-side-list');
        jobListing.empty(); // Clear previous data

        if (data.length === 0) {
            jobListing.append('<p>No jobs found.</p>');
        } else {
    
            // Loop through the data and append to the jobListing container
            data.forEach(function(element, id) {
                // var jobItem = $('<div class="job-item"></div>');
                // jobItem.append('<h3>' + job.title + '</h3>');
                // jobItem.append('<p>' + job.description + '</p>');
                
                let url = element.company?.cover_logo;
                let salary_from = element.salary_from;
                let salary_to = element.salary_to;
                let string_salary = ''
                if (url) {
                    img_url = `{{url('/')}}/company_logos/${url}`
                } else {
                    img_url = `{{url('/')}}/admin_assets/no-image.png`
                }

                // insert ads
                // if(id == 5) {
                //     html.push(`   <div class="inpostad">
                //     <img src="https://png.pngtree.com/thumb_back/fh260/back_pic/00/02/44/5056179b42b174f.jpg" alt="">
                //     </div>`)
                // }  

               
                string_salary = checksalary(salary_from, salary_to)

                const datetime = convertDatetime(element.created_at)
                var jobItem = $(`<div data-job-id="${element.id}"  class="item-job mb-3"></div>`);

                jobItem.append(` <div class="logo-company">
                                <a href="{{url('/')}}/company/${element.company?.slug}" title="${element.company?.name}" class="pic">
                                        
                                <img src="${img_url}" alt="">
                                </a>
                </div>`);

             

                if (id == 5 ) {
                    jobListing.append(`<div class="inpostad">
                    <img src="https://png.pngtree.com/thumb_back/fh260/back_pic/00/02/44/5056179b42b174f.jpg" alt="">
                    </div>
`
                )
                }


                jobItem.append(` <div class="jobinfo">
                                            <div class="info">
                                                <!-- Title  Start-->
                                                <div class="info-item job-title-box">
                                                    <div class="job-title">
                                                        <span>Mới</span>
                                                        <h3 class="job-title-name"><a href="{{url('/')}}/job/${element?.slug}" title="">${element.title}</a></h3>
                                                    </div>

                                                
                                                 
                                                       <a class="save-job" href="#" data-toggle="modal" data-target="#user_login_Modal"><i class="far fa-heart"></i>
                                                    </a>
                                               

                                                </div>
                                                <!-- Title  End-->

                                                <!-- companyName Start-->
                                                <div class="info-item companyName"><a href="{{url('/')}}/company/${element.company?.slug}" title="${element.company?.name}">${element.company?.name}</a></div>
                                                <!-- companyName End-->
                                                <!--rank-salary and place Start-->
                                                <div class="info-item box-meta">
                                                    <div class="rank-salary">
                                                        ${string_salary}
                                                    </div>
                                                    <div class="navbar__link-separator" bis_skin_checked="1"></div>
                                                    <!--meta-city-->
                                                    <div class="meta-city">
                                                        <!-- <i class="far fa-map-marker-alt"></i> -->
                                                        ${element.city.city}
                                                    </div>
                                                </div>
                                                <!--Rank-salary and place End-->

                                                <!--Day update and place Start-->
                                                <div class="info-item day-update">
                                                    {{__('Update')}}: ${datetime}
                                                </div>
                                                <!--Day update and place End-->
                                            </div>

                                            <div class="caption">
                                                <div class="welfare">
                                                    <div class="box-meta">
                                                        <!-- <i class="fas fa-dollar-sign"></i>  -->
                                                        <span>
                                                            <!-- {{__('Rewards')}} -->
                                                            ${element.functional_area.functional_area}
                                                        </span>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>`);

                                     



                // Add more job details as needed
                jobListing.append(jobItem);
            });
        }
    }









    $('.btn-job-alert').on('click', function() {
        @if(Auth::user())
        $('#show_alert').modal('show');
        @else
        swal({
            title: "Lưu Thông báo Việc làm",
            text: "Để lưu Thông báo Việc làm bạn phải đăng ký và đăng nhập",
            icon: "error",
            buttons: {
                Login: "Login",
                register: "Đăng ký",
                hello: "OK",
            },
        });
        @endif
    })
    $(document).ready(function($) {
        $("#search-job-list").submit(function() {
            $(this).find(":input").filter(function() {
                return !this.value;
            }).attr("disabled", "disabled");
            return true;
        });
        $("#search-job-list").find(":input").prop("disabled", false);
        $(".view_more_ul").each(function() {
            if ($(this).height() > 100) {
                $(this).addClass('hide_vm_ul');
                $(this).next().removeClass('hide_vm');
            }
        });
        $('.view_more').on('click', function(e) {
            e.preventDefault();
            alert('noday');
            $(this).prev().removeClass('hide_vm_ul');
            $(this).addClass('hide_vm');
        });


        //filter on fly
        /*
         $("#job_title, #job_type, #job_experience_id, #state_id, #city_id, #job_type_id, #salary_currency," +
             "#company_id, #department_id, #skill_id, #industry_id, #gender_id, #degree_level_id," +
             "#career_level_id, #job_shift_id, #job_type_id").change(function () {
                 var params = localStorage.getItem('params') ? JSON.parse(localStorage.getItem('params')) : {};
                 var key = $(this).attr('id');
                 var prop = $(this).attr('id');
                 if(key == 'job_title') key = 'title';

                 if(key=='title') params[key] = $("#" + prop + " :selected").map((_,e) => e.text).get();
                 else params[key]= $("#" + prop + " :selected").map((_,e) => e.value).get();
                 localStorage.setItem('params', JSON.stringify(params));
                 $.ajax({
                     url: "",
                     type: "post",
                     data: {'data': params,'_token':""},
                     beforeSend: function () {
                         console.log(params);
                     },
                     success: function (data) {
                        //
                     }
                 });
         });
         */
    });

    // if ($("#submit_alert").length > 0) {
    //     $("#submit_alert").validate({
    //         rules: {
    //             email: {
    //                 required: true,
    //                 maxlength: 5000,
    //                 email: true
    //             }
    //         },
    //         messages: {
    //             email: {
    //                 required: "Email is required",
    //             }
    //         },
    //         submitHandler: function(form) {
    //             $.ajaxSetup({
    //                 headers: {
    //                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //                 }
    //             });
    //             $.ajax({
    //                 url: "{{route('subscribe.alert')}}",
    //                 type: "GET",
    //                 data: $('#submit_alert').serialize(),
    //                 success: function(response) {
    //                     $("#submit_alert").trigger("reset");
    //                     $('#show_alert').modal('hide');
    //                     swal({
    //                         title: "Success",
    //                         text: response["msg"],
    //                         icon: "success",
    //                         button: "OK",
    //                     });
    //                 }
    //             });
    //         }
    //     })
    // }
    $(document).on('click', '.swal-button--Login', function() {
        window.location.href = "{{route('login')}}";
    })
    $(document).on('click', '.swal-button--register', function() {
        window.location.href = "{{route('register')}}";
    })



    const buttons = document.querySelectorAll('.sort-item-wrapped__item');
    buttons.forEach(button => {
        button.addEventListener('click', function() {
            buttons.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
        });
    });
</script>
@include('templates.vietstar.includes.country_state_city_js')
@endpush