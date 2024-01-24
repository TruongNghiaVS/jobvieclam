
@push('styles')
<style type="text/css">
.select-menu {
  max-width: 100%;

}
.select-menu .select-btn {
  display: flex;
 
  padding: 8px 16px;
    border: 1px solid #ced4da;
    border-radius: 4px;
    font-size: 14px;
    font-weight: 400;
    line-height: 1.5;
    color: #212529;
}
.select-menu .options {
  position: absolute;
  width: 360px;
  overflow-y: auto;
  max-height: 295px;
  padding: 10px;
  margin-top: 10px;
  border-radius: 8px;
  background: #fff;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  animation-name: fadeInDown;
  -webkit-animation-name: fadeInDown;
  animation-duration: 0.35s;
  animation-fill-mode: both;
  -webkit-animation-duration: 0.35s;
  -webkit-animation-fill-mode: both;
}
.select-menu .options .option {
  display: flex;
  height: 55px;
  cursor: pointer;
  padding: 0 16px;
  border-radius: 8px;
  align-items: center;
  background: #fff;
}
.select-menu .options .option:hover {
  background: #f2f2f2;
  color: var(--bs-primary);
}
.select-menu .options .option:hover .option-text {
    color: var(--bs-primary);
}
.select-menu .options .option i {
  font-size: 25px;
  margin-right: 12px;
}
.select-menu .options .option .option-text {
  font-size: 18px;
  color: #333;
}

.select-btn i {
  font-size: 25px;
  transition: 0.3s;
}

.select-menu.active .select-btn i {
  transform: rotate(-180deg);
}
.select-menu.active .options {
  display: block;
  opacity: 0;
  z-index: 10;
  animation-name: fadeInUp;
  -webkit-animation-name: fadeInUp;
  animation-duration: 0.4s;
  animation-fill-mode: both;
  -webkit-animation-duration: 0.4s;
  -webkit-animation-fill-mode: both;
}
.box-field {
    align-items: center;
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;

}
.box-field input {
    background-color: #fff!important;
    border: 1px solid #e9eaec!important;
    border-radius: 6px;
    color: #000!important;
    font-weight: 700;
    height: 40px;
    padding: 8px 12px;
    width: 105.5px!important;
}
.custom-salary-option {
    margin:10px 0;
}
@keyframes fadeInUp {
  from {
    transform: translate3d(0, 30px, 0);
  }
  to {
    transform: translate3d(0, 0, 0);
    opacity: 1;
  }
}
@keyframes fadeInDown {
  from {
    transform: translate3d(0, 0, 0);
    opacity: 1;
  }
  to {
    transform: translate3d(0, 20px, 0);
    opacity: 0;
  }
}
</style>
@endpush
{{--<?php
dd($salaryFroms)
?>--}}
{!! Form::open(['method' => 'get','route' => 'job.list', 'id' => 'job_filter']) !!}
<!-- SEARCH STICKY -->
<div class="page-heading-tool job-detail ">
    <div class="container">
        <div class="tool-wrapper">
            <div class="search-job">
                <div class="form-horizontal">
                    <div class="form-wrap">
                        <div class="form-group form-keyword">
                            <input type="search" class="keyword form-control" id="search" name="search"
                            value = "{{$requestSearch->input('search')}}"
                            placeholder="{{__('Skills or Job Titles')}}" autocomplete="off">
                        </div>
                        <div class="form-group form-select-chosen" id="functional_area_dd">
                        
                            <select name="industry_id" class="form-control form-select shadow-sm" id="industry_id">
                                         <option value="-1">Chọn lĩnh vực</option>
                                        @foreach  ($Industrys as $itemSelect)
                                             @if($itemSelect->industry_id == $requestSearch->industry_idRequest)
                                                     <option selected value="{{$itemSelect->industry_id}}">{{$itemSelect->industry}}</option>
                                              @else
                                                     <option value="{{$itemSelect->industry_id}}">{{$itemSelect->industry}}</option>
                                              @endif
                                            
                                        @endforeach
                            </select>
                    
                        </div>
                        <!-- <div class="form-group form-select-chosen" id="city_dd2">
                        {!! Form::select('city_id', ['' => __('Select City')]+$cities, Request::get('city_id', null), array('class'=>'form-control form-select shadow-sm', 'name'=>'city_id', 'id'=>'city_id')) !!}
                        </div>
                         -->
                        <div class="form-group form-select-chosen" id="functional_area_dd">
                        
                            <select name="city_id" class="form-control form-select shadow-sm" id="city_id">
                                         <option value="-1">Tỉnh/Thành</option>
                                        @foreach  ($cities2 as $itemSelect)
                                             @if($itemSelect->city_id == $requestSearch->city_idRequest)
                                                     <option selected value="{{$itemSelect->city_id}}">{{$itemSelect->city}}</option>
                                              @else
                                                     <option value="{{$itemSelect->city_id}}">{{$itemSelect->city}}</option>
                                              @endif
                                            
                                        @endforeach
                            </select>
                    
                        </div>
                        
                        <div class="form-group form-submit">
                            <button class="btn-gradient  filter_submit" type="submit">
                            {{__('Search')}} 
                            </button>
                        </div>


                    </div>
                </div>
            </div>
            <div class="mobile-filter toollips">
                <button type="button" class="btn btn-filter" id="atcFilters" title="Lọc">
                    <i class="fa-solid fa-filter"></i>  {{__('Filter')}}
                </button>
            </div>
        </div>
    </div>
</div>

<!-- SEARCH ADVANDCE STICKY -->
<div class="filters-job-wrapper job-detail">
    <div class="container">
        <div class="filters-wrapper">
            <form action="{{route('job.list')}}" method="get">
                <div class="row">
                    <div class="form-group col-sm-6 col-lg-2">
                        
                            <label>{{__('Salary Level')}}</label>
       

                            <div class="select-menu">
                                <div class="select-btn">
                                    @if(1==2) 
                                    <span class="sBtn-text">{{__('Salary Level')}}</span>

                                    @else
                                    <span class="sBtn-text">30 triệu</span>

                                    
                                    @endif
                                    <i class="bx bx-chevron-down"></i>
                                </div>
                              
                                <ul class="options">
                                    <form id="custom-salary-form">
                                        <li class="custom-salary-option">
                                            <div class="">
                                                <div class="box-field">
                                                    <input type="number" name="salary_min" id="salary_min" placeholder="Từ" max="9999" data-gtm-form-interact-field-id="0">
                                                    <span>-</span>
                                                    <input type="number" name="salary_max"  id="salary_max" placeholder="Đến" max="9999" data-gtm-form-interact-field-id="1">
                                                    <span>triệu</span>
                                                </div>
                                                <button type="button" class="btn btn-primary w-100 btn-custom-salary" disabled>Áp dụng</button>
                                            </div>
                                        </li>
                                    </form>

                                  
                                        <li class="option">
                                            <span class="option-text" key="" salary_max="10" salary_min="1" >Dưới 10 triệu</span>
                                        </li>
                                        <li class="option">
                                            <span class="option-text" key="" salary_max="15" salary_min="10">10 - 15 triệu</span>
                                        </li>
                                        <li class="option">
                                            <span class="option-text" key="" salary_max="30" salary_min="15">15 - 30 triệu</span>
                                        </li>
                                        <li class="option">
                                            <span class="option-text" key=""  salary_min="30" >Trên 30 triệu</span>
                                        </li>
                                </ul>
                            </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="form-group" id="degree_level_dd">
                            <label>{{__('Career Level')}}</label>
                            {!! Form::select('degree_level_id', ['' => __('Select Degree Level')] + $degreeLevels, Request::get('degree_level_id', null), array('class'=>'form-control form-select shadow-sm', 'id'=>'degree_level_id')) !!}
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="form-group" id="job_type_dd">
                            <label>Hình thức làm việc</label>
                            <select class="form-control form-select shadow-sm" id="job_type_id" name="job_type_id">
                                         @foreach  ($jobtypes2 as $itemSelect)
                                             @if($itemSelect->job_type_id == $requestSearch->job_type_idRequest)
                                                     <option selected value="{{$itemSelect->job_type_id}}">{{$itemSelect->job_type}}</option>
                                              @else
                                                     <option value="{{$itemSelect->job_type_id}}">{{$itemSelect->job_type}}</option>
                                              @endif
                                            
                                        @endforeach
                            </select>
                           
                        </div>
                    </div>

                    
                    <div class="col-sm-6 col-lg-3">
                        <div class="form-group" id="benefit_id_dd">
                            <label>{{__('Select desired benefits')}}</label>
                            {!! Form::select('benefit_id[]', $benefits, Request::get('benefit_id', null), ['class'=>'form-control form-select shadow-sm multiselect', 'id'=>'benefit_id','multiple'=>true, "data-placeholder"=>"Month"]) !!}
                        </div>
                    </div>

                </div>
                <div class="close-filter-box">
                    <div class="close-input-filter">
                        <i class="fa-solid fa-x"></i>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
{!! Form::close() !!}

{!! Form::open(['method' => 'get','route' => 'job.list', 'id' => 'job_filter2']) !!}
<!-- SEARCH STICKY Mobile-->

<div class="page-heading-tool job-detail mobile">
    <div class="container">
        <div class="tool-wrapper">
            <div class="search-job">
                <div class="form-horizontal">
                    <div class="row g-0">
                        <div class="col-12">
                            <input type="search" class="keyword form-control" id="search" name="search" placeholder="{{__('Skills or Job Titles')}}" autocomplete="off">
                        </div>
                    </div>
                </div>
            </div>
            <div class="mobile-filter toollips">
                <button type="button" class="btn btn-filter" id="#atcFilters-mobile" title="Lọc" onclick="openFilterJob_mobile()">
                    <i class="fa-solid fa-filter"></i> {{__('Filter')}}
                </button>
                <button class="btn btn-primary" type="submit">
                    <i class="bi bi-search text-white"></i>
                </button>
            </div>
        </div>
    </div>
</div>



<div class="filters-job-wrapper-mobile job-detail">
    <div class="container">
        <div class="close-filter-box-mobile" onclick="closeFilterJob_mobile()">
            <div class="close-input-filter-mobile">
                <i class="fa-solid fa-x"></i>
            </div>
        </div>
        <div class="filters-wrapper">
            <form action="{{route('job.list')}}" method="get">
                <div class="row">
                    <div class="col-sm-6 col-lg-2">
                        <div class="form-group form-keyword">
                            <input type="search" class="keyword form-control" id="search" name="search" value=""  placeholder="{{__('Skills or Job Titles')}}" autocomplete="off">
                        </div>
                    </div>


                    <div class="col-sm-6 col-lg-2">
                        <div class="form-group form-select-chosen" id="functional_area_dd">
                        {!! Form::select('functional_area_id', ['' => __('Select functional area')]+$funclAreas, Request::get('functional_area_id', null), array('class'=>'form-control form-select shadow-sm','name' =>"departmentType", 'id'=>'functional_area_id')) !!}
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-2">
                        <div class="form-group form-select-chosen" id="city_dd2">
                        {!! Form::select('city_id', ['' => __('Select City')]+$cities, Request::get('city_id', null), array('class'=>'form-control form-select shadow-sm', 'id'=>'city_id')) !!}
                        </div>
                    </div>

                    <!-- <div class="col-sm-6 col-lg-2">
                        <div class="form-group form-select-chosen">
                            <label>{{__('Salary')}}</label>
                            {!! Form::select('salary_from',['' => __('Salary Level')]+$salaryFroms, Request::get('salary_from', null), array('class'=>'form-control form-select shadow-sm', 'id'=>'salary_from')) !!}
                        </div>
                    </div> -->
                    <div class="form-group col-sm-6 col-lg-2">
                        
                            <label>{{__('Salary Level')}}</label>
       

                            <div class="select-menu">
                                <div class="select-btn">
                                    @if(1==2) 
                                    <span class="sBtn-text">{{__('Salary Level')}}</span>

                                    @else
                                    <span class="sBtn-text">30 triệu</span>

                                    
                                    @endif
                                    <i class="bx bx-chevron-down"></i>
                                </div>

                                <ul class="options">
                                    <form id="custom-salary-form">
                                        <li class="custom-salary-option">
                                            <div class="">
                                                <div class="box-field">
                                                    <input type="number" name="salary_min" id="salary_min" placeholder="Từ" max="9999" data-gtm-form-interact-field-id="0">
                                                    <span>-</span>
                                                    <input type="number" name="salary_max"  id="salary_max" placeholder="Đến" max="9999" data-gtm-form-interact-field-id="1">
                                                    <span>triệu</span>
                                                </div>
                                                <button type="button" class="btn btn-primary w-100 btn-custom-salary" disabled>Áp dụng</button>
                                            </div>
                                        </li>
                                    </form>

                                    @foreach ($salaryFroms as $key => $salaryFrom) 
                                        <li class="option">
                                            <span class="option-text" key="{{$key}}">{{$salaryFrom}}</span>
                                        </li>
                                    @endforeach
                                    
                                </ul>
                        
                    
                            </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="form-group" id="degree_level_dd">
                            <label>{{__('Career Level')}}</label>
                        
                            {!! Form::select('degree_level_id', ['' => __('Select Degree Level')] + $degreeLevels, Request::get('degree_level_id', null), array('class'=>'form-control form-select shadow-sm','name'=>'levelDegree' ,'id'=>'degree_level_id')) !!}
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="form-group" id="job_type_dd">
                            <label>Hình thức làm việc</label>
                            {!! Form::select('job_type_id', ['' => __('Select Job Type')] + $jobTypes, Request::get('job_type_id', null), array('class'=>'form-control form-select shadow-sm', 'name'=>'jobType', 'id'=>'job_type_id')) !!}

                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                            <div class="form-group" id="benefit_id_dd">
                                    <label>{{__('Select desired benefits')}}</label>
                                    {!! Form::select('benefit_id[]', $benefits, Request::get('benefit_id', null), ['class'=>'form-control  shadow-sm multiselect', 'id'=>'benefit_mobile_id','multiple'=>true, "data-placeholder"=>"Month"]) !!}
                            </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group form-submit">
                        <button class="btn btn-primary filter_submit" type="button">
                            {{__('Search')}} 
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

{!! Form::close() !!}
@push('scripts')
<script type="text/javascript">

    $(document).ready(function() {
        var salary_max,saralymin;
        $('.select-menu').on('click', '.select-btn', function() {
            $(this).parents('.select-menu').toggleClass('active');
        });

        $('.select-menu').on('click', '.option', function() {
            var selectedOption = $(this).find('.option-text').text();
            salary_max = $(this).find('.option-text').attr("salary_max");
            salary_min = $(this).find('.option-text').attr("salary_min");
        
            $(' #salary_max').val(salary_max)
            $(' #salary_min').val(salary_min)

            $('.select-menu .sBtn-text').text(selectedOption);
            $('.select-menu').removeClass('active');
            $('.btn-custom-salary').prop('disabled', false);
        });
    });

    $(document).ready(function() {
        // Attach input event listeners
        $('#salary_min, #salary_max').on('input', function() {
            checkInputs(); // Check inputs whenever there is input
        });
    });

    function checkInputs() {
        
        // Get the values of the inputs
        var input1Value = $('.select-menu.active #salary_min').val();
        var input2Value = $('.select-menu.active #salary_max').val();
        // Enable the button if both inputs have values, otherwise disable it
        console.log(input1Value,input2Value);
        

        if ((input1Value && input2Value) && (input1Value != input2Value)  && (input1Value > 0 && input2Value > 0) && (input2Value > input1Value)) {
           
            $('.btn-custom-salary').prop('disabled', false);
        }
        else {
            $('.btn-custom-salary').prop('disabled', true);
        }

     
    }




    $(document).ready(function() {
        $('#benefit_id').multiselect({
            texts: {
                placeholder: "{{__('Select desired benefits')}}"
            }
        });

        $('#benefit_mobile_id').multiselect({
            texts: {
                placeholder: "{{__('Select desired benefits')}}"
            }
        });


        $('#filter_submit').submit(()=>{

            $('#job_filter')[0].reset();
        })
       

      
    });
    $('#benefit_id').each(function() {
        $(this).multiselect({
            texts: {
                placeholder: "{{__('Select desired benefits')}}", // or $(this).prop('title'),
            },
        });
    });

    $('#benefit_mobile_id').multiselect({
            columns: 1,
            placeholder: "{{__('Select desired benefits')}}",
            search: true,
            selectAll: true
            
    });

    // const optionMenu = document.querySelector(".select-menu"),
    // selectBtn = optionMenu.querySelector(".select-btn"),
    // options = optionMenu.querySelectorAll(".option"),
    // sBtn_text = optionMenu.querySelector(".sBtn-text");

    // selectBtn.addEventListener("click", () =>
    //     optionMenu.classList.toggle("active")
    // );

    // options.forEach((option) => {
    // option.addEventListener("click", () => {
    //     let selectedOption = option.querySelector(".option-text").innerText;
    //     sBtn_text.innerText = selectedOption;

    //     optionMenu.classList.remove("active");
    // });
    // });
  



    
    
</script>
@endpush