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
   
            <!-- Search Result and sidebar start -->
            <div class="row">
                <div class="col-lg-9 col-sm-12">
                    <div class="job-sorting-section">
                        <div class="sort-wrapped">
                            <div class="title sort-label">Sắp xếp theo</div>
                            <div class="sort-item-wrapped bg-white p-3">
                                <form id="sort_form_by">
                                    <div class="form-check-inline p-1">
                                        <input class="form-check-input" type="radio" name="sort_by" id="default" value="" checked>
                                        <label class="form-check-label px-1" for="default">Mặc định</label>
                                    </div>

                                    
                                    <div class="form-check-inline p-1">
                                        <input class="form-check-input" type="radio" name="sort_by" id="new_created" value="new">
                                        <label class="form-check-label px-1" for="new_created">{{__('Date Posted')}}  &lpar;  {{__('latest')}} &rpar;</label>
                                    </div>
                                    <div class="form-check-inline p-1">
                                        <input class="form-check-input" type="radio" name="sort_by" id="old_created" value="older">
                                        <label class="form-check-label px-1" for="old_created">{{__('Date Posted')}} &lpar; {{__('oldest')}}  &rpar;</label>
                                    </div>
                                </form>
                                <form id="remote_form">
                                    <div class="form-check-inline p-1 d-flex align-items-center">

                                        <label class="switch">
                                            <input type="checkbox" id="wfh">
                                            <span class="slider"></span>
                                        </label>
                                        <label class="form-check-label px-1" for="wfh">{{__('Work from home')}}</label>
                                    
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    @include('flash::message')
                    <!-- Search List -->
                   
                <div id="loadingMessage" style="display:none" class="text-center"><div class="spinner-border text-primary" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
               </div>
              
                <div class="searchList jobs-side-list">

                @php
                   function checksalary( $from, $to)
                   {
                        return "Thương lượng"; 
                   }
                @endphp
                           
                @foreach ( $jobList as  $jobitem)
                   
                    @php
                         $companyItem = $jobitem->company;

                         $logo = "/admin_assets/no-image.png";
                         $slugCompany = "javascript:void(0)";
                         $companyName =  "Công ty vô danh";
                         
                            

                         if($companyItem)
                         {
                                $logo = $jobitem->company->logo;
                                $slugCompany = "/cong-ty/".$companyItem->slug;
                                if($logo =="" || $logo == null)
                                {

                                $logo = "/admin_assets/no-image.png";
                                }
                                else 
                                {
                                $logo = "/company_logos/".$logo;
                                }
                                $companyName = $jobitem->company->name;
                         }
                         
                         
                        

                         $salaryText  = checksalary($jobitem->salary_from, $jobitem->salary_to);
                         $datetime =   Carbon\Carbon::parse($jobitem->created_at);
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
                   @endphp
                 
                   <div data-job-id="{{$jobitem->id}}" class="item-job mb-3">
                            <div class="logo-company">
                            <a href="{{$slugCompany}}" title="{{$companyName}}" class="pic">
                            <img src="http://localhost:8000{{$logo}}" alt="">
                            </a>
                            </div>
                            <div class="jobinfo">
                            <div class="info">
                            <!-- Title  Start-->
                            <div class="info-item job-title-box">
                            <div class="job-title">
                            <span>Mới</span>
                             <h3 class="job-title-name"><a href="/viec-lam/{{$jobitem->slug}}" title="">{{$jobitem->title}}</a></h3>
                            </div>

                                   @if(Auth::check() && Auth::user()->isFavouriteJob($jobitem->slug))
                                    <a class="save-job active" href="{{route('remove.from.favourite', $jobitem->slug)}}"><i class="far fa-heart"></i>
                                    </a>
                                    @elseif(Auth::check() && !Auth::user()->isFavouriteJob($jobitem->slug))
                                    <a class="save-job" href="{{route('add.to.favourite', $jobitem->slug)}}"><i class="far fa-heart"></i>
                                    </a>
                                    @else
                                    <a class="save-job" href="#" data-toggle="modal" data-target="#user_login_Modal"><i class="far fa-heart"></i>
                                    </a>
                                    @endif
                            </div>
                            <!-- Title  End-->
                            <!-- companyName Start-->
                            <div class="info-item companyName"><a href="{{$slugCompany}}" title="{{$companyName}}">{{$companyName}}</a></div>
                            <!-- companyName End-->
                            <!--rank-salary and place Start-->
                            <div class="info-item box-meta">
                            <div class="rank-salary">
                                {{$salaryText}}
                            </div>
                           
                            <!--meta-city-->
                            @isset($jobitem->city)
                                <div class="navbar__link-separator" bis_skin_checked="1"></div>
                                <div class="meta-city">
                                <!-- <i class="far fa-map-marker-alt"></i> -->
                                    {{ $jobitem->city->city }}
                                </div>
                            @endisset
                           </div>
                            <!--Rank-salary and place End-->
                            <!--Day update and place Start-->
                            <div class="info-item day-update">
                            Cập nhật: {{ $datetimeText }}
                            </div>
                            <!--Day update and place End-->
                            </div>
                            <div class="caption">
                            <div class="welfare">
                            
                            <!-- <i class="fas fa-dollar-sign"></i>  -->
                           
                            @isset($jobitem->industry)
                            <div class="box-meta">
                            <span>
                                     {{$jobitem->industry->industry}}
                            </span>
                            </div>
                            @endisset
                           
                            </div>
                            </div>
                            </div>
                            </div>
                        @if($loop->index ==5)
                       
                           
                        @endif
              
                            @endforeach

                </div>
            <div class="d-flex justify-content-center">
                {{ $jobList->links() }}
            </div>
                
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
    .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 30px;
            border-radius: 17px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            border-radius: 17px;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 3px;
            bottom: 3px;
            background-color: white;
            border-radius: 50%;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #2196F3;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }
</style>
@endpush
@push('scripts')
<script>
    
    $(document).ready(function() {
            // Set your API endpoint
            const apiUrl = `{{ route('admin.advertisementBannerJob.getAll')}}`;

            // Make the API request
            $.ajax({
                url: apiUrl,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    // Handle the data from the API
                    

                    if(data) {
                        data.forEach(element => {
                          
                            console.log(element.priorities);
                            if (element.priorities == '1') {

                                console.log(element.linkDesktop);
                                $('.searchList.jobs-side-list .item-job:nth-child(5)').after(`
                                    <div class="inpostad">
                                    <img src="{{url('/')}}/admin_assets/${element.linkDesktop}" alt="">
                                    </div>  
                                `);
                            }
                        });
                    }
                    console.log('API Response:', data);
                },
                error: function(xhr, status, error) {
                    // Handle errors
                    console.error('Error:', error);
                }
            });
        });


    




   
   
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
        return;
        var checkedValue='';
        console.log($('#sort_form_by  input[type="radio"]'));
        $('#sort_form_by').prop('checked', true);

        // Handle radio button change event
        $('#sort_form_by input[type="radio"]').change(function() {
            // Get the value of the checked radio button
            checkedValue = $('#sort_form_by input[type="radio"]:checked').val();
            fetchData(currentPage,checkedValue)
        });

        $('#remote_form input').change(function() {
            // Get the state of the switch (on or off)
            var switchState = $(this).is(':checked');
            fetchData(currentPage,checkedValue,switchState)
        });
        
        // Simulated API endpoint (replace with your actual API endpoint)
        const apiEndpoint = '{{url('/')}}/jobs-v2';
        const itemsPerPage = 10;
        var currentPage = 1;


       
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
            return;
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
                                                            <h3 class="job-title-name"><a href="{{url('/')}}/viec-lam/${element?.slug}" title="">${element.title}</a></h3>
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
        function fetchData(page,sort_by,wfh) {
            return;
      
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
                    search: mergedObject.search,
                    
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
                    levelDegree:mergedObject.degree_level_id,
                    order_by:sort_by,
                    wfh:wfh ? 1 : 0 ,
                 },
                // beforeSend: showLoading,
                complete: hideLoading,
                success: function(data, textStatus, xhr) {
                   
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
            $('#job_pagination').append(`<button class="btn btn-outline btn-sm" id="prevBtn" ><a class="page-link" href="#"><<</a></li>`)
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
                $('html, body').animate({ scrollTop: 0 }, 'slow');
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
                     $('html, body').animate({ scrollTop: 0 }, 'slow');
                    
                 });
         
                 // Handle "Next" button click
            $('#nextBtn').on('click', function() {
                    
                     if (currentPage < totalPages) {
                         currentPage++;
                         fetchData(currentPage);
                         updateButtonStates();
                     }
                     $('html, body').animate({ scrollTop: 0 }, 'slow');
                });
           
        }
   
       
    
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


       
    });

   
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
    // $('.filter_submit').on('click', function() {
    //         fetchData();
    //     });

</script>
@include('templates.vietstar.includes.country_state_city_js')
@endpush