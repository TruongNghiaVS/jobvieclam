@extends('templates.vietstar.layouts.app')
@section('content')
<!-- Header start -->
@include('templates.vietstar.includes.header')
<!-- Header end -->

<!-- Inner Page Title start -->


<!-- Dashboard menu start -->
@include('templates.vietstar.includes.mobile_dashboard_menu')
<!-- Dashboard menu end -->
<?php $jobcount = 30 ?>
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
                <div id="loadingMessage" class="text-center"><div class="spinner-border text-primary" role="status">
                    <span class="sr-only">Loading...</span>
                </div></div>
                <div class="searchList jobs-side-list">
                    
                </div>
                <!-- Pagination Start -->
                <div class="pagiWrap">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="showreslt">
                                {{$jobs->total()}} 
                            </div>
                        </div>
                        <div class="col-md-8 text-right">
                       
                        <nav class="text-center">
                                
    
                            </nav>
                            <ul class="pagination" id="job_pagination">
                            
                            </ul>
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
    .page-item.active {
        display: block;
    }
    .pagination {
        margin-top: 10px;
    }
   
    .pagination button:disabled {
            opacity: 0.5;
            cursor: not-allowed;
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
   
    $(document).ready(function() {
        // Simulated API endpoint (replace with your actual API endpoint)
        const apiEndpoint = '{{url('/')}}/jobs-v2';
        const itemsPerPage = 10;
        var currentPage = 1;


        $('.filter_submit').on('click', function() {
            fetchData();
        });

        // Function to show loading message
        function showLoading() {
        $('#loadingMessage').show();
        }
            // Function to hide loading message
        function hideLoading() {
            $('#loadingMessage').hide();
        }


        // Function to render data
        function renderData(data) {
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

        // Function to handle AJAX call
        function fetchData(page) {
            console.log();
            var searchQuery = $('#job_filter').serializeArray();
    
            let mergedObject = searchQuery.reduce((result, currentObject) => {
    
                let key = currentObject.name;
                let value =  currentObject.value;
              
                result[key] = value;
                return result;
            }, {});
           let mergedObject_convert = {
                    city_id: mergedObject.city_id ? parseInt(mergedObject.city_id, 10):"",
                    degree_level_id:mergedObject.degree_level_id ?  parseInt(mergedObject.degree_level_id, 10) :"",
                    departmentType:mergedObject.functional_area_id ? parseInt(mergedObject.functional_area_id, 10):"",
                    job_type_id:mergedObject.job_type_id ?  parseInt(mergedObject.job_type_id, 10): "",
                    salary_max:mergedObject.salary_max ? parseInt(mergedObject.salary_max, 10):"",
                    salary_min: mergedObject.salary_min ? parseInt(mergedObject.salary_min, 10): "",
                    search: mergedObject.search
           }

            $.ajax({
                url: apiEndpoint,
                type: 'GET',
                dataType: 'json',
                data: { page: page ? page : 1,
                   
                    city_id:mergedObject_convert.city_id,
                    departmentType:mergedObject_convert.departmentType,
                    salary_min:mergedObject_convert.salary_min,
                    salary_max:mergedObject_convert.salary_max,
                    search:mergedObject.search,
                    job_type_id:mergedObject.job_type_id,
                    levelDegree:mergedObject.degree_level_id
                 },
                beforeSend: showLoading,
                complete: hideLoading,
                success: function(data, textStatus, xhr) {
                    console.log(data.data);
                    // Render the data
                    // console.log(data.last_page);
                    // console.log(xhr);
                    if(data.data){
                        renderData(data.data);
                    }
                    
                    // Update pagination
                    const totalPages = Math.ceil(30 / itemsPerPage);
                 
                    updatePagination(totalPages);
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        }
        // Function to update pagination
        function updatePagination(totalPages) {
            var paginationElement = $('#job_pagination');
            // Clear existing pagination
            $('#job_pagination').empty();
            
            // Generate pagination links
            $('#job_pagination').append(`<button class="btn btn-outline  btn-sm" id="prevBtn" ><a class="page-link" href="#"><<</a></li>`)
            for (let i = 1; i <= totalPages; i++) {
                $('#job_pagination').append(`<li class="page-item btn btn-outline btn-sm" data-page="${i}"><a class="page-link" href="#" data-page="${i}">${i}</a></li>`);
            }
            $('#job_pagination').append(`<button class="btn btn-outline  btn-sm"  id="nextBtn"><a class="page-link" href="#">>></a></button>`)
            
       

            // Add click event handler to pagination links
            paginationElement.find('.page-item').on('click', function(event) {
                event.preventDefault();
                const page = $(this).data('page');
                currentPage = page
                fetchData(page);
            });
            $('.page-item').find('.page-item').removeClass('active');
          
            $(`.page-item[data-page=${currentPage}]`).addClass('active');


            $('#prevBtn').prop('disabled', currentPage == 1);
         // Enable or disable "Next" button based on currentPage
            $('#nextBtn').prop('disabled', currentPage == totalPages);

            $('#prevBtn').on('click', function() {
                     if (currentPage > 1) {
                         currentPage--;
                         fetchData(currentPage);
                         updateButtonStates();
                     }
                    
                 });
         
                 // Handle "Next" button click
            $('#nextBtn').on('click', function() {
                    
                     if (currentPage < totalPages) {
                         currentPage++;
                         fetchData(currentPage);
                         updateButtonStates();
                     }
                 });
           
        }
   
       
        // Trigger the data fetching when the page loads
        fetchData(currentPage);
      
    });








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