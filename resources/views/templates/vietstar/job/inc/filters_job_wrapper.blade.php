{!! Form::open(['method' => 'get','route' => 'job.list', 'id' => 'job_filter']) !!}
<div class="page-heading-tool">
    <div class="container">
        <div class="tool-wrapper">

            <div class="search-job">
                <div class="form-horizontal">
                    <div class="form-wrap">
                        <div class="form-group form-keyword">
                            <input type="search" class="keyword form-control" id="search" name="search"
                                placeholder="{{__('Skills or Job Titles')}}" autocomplete="off">
                        </div>
                        <div class="form-group form-select-chosen" id="functional_area_dd">
                            {!! Form::select('functional_area_id[]', ['' => __('Select functional area')]+$funclAreas,
                            Request::get('functional_area_id', null), array('class'=>'form-control form-select
                            shadow-sm', 'id'=>'functional_area_id')) !!}
                        </div>
                        <div class="form-group form-select-chosen" id="city_dd2">
                            {!! Form::select('city_id[]', ['' => __('Select City')]+$cities, Request::get('city_id',
                            null), array('class'=>'form-control form-select shadow-sm', 'id'=>'city_id')) !!}
                        </div>
                        <div class="form-group form-submit">
                            <button class="btn-gradient" type="submit">
                                Tìm kiếm
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mobile-filter toollips">
                <button type="button" class="btn btn-filter" id="atcFilters" title="Lọc">
                    <i class="far fa-filter"></i> {{__('Filter')}}
                </button>

            </div>
        </div>
    </div>
</div>

<div class="filters-job-wrapper">
    <div class="container">
        <div class="filters-wrapper">
            <form action="{{route('job.list')}}" method="get">
                <div class="row">
                    <div class="col-sm-6 col-lg-2">
                        <div class="form-group form-select">
                            <label> {{__('Salary Level')}}</label>
                            <!--<select class="form-control form-select" name="salary" id="salary">
                            <option value="">Tất cả</option>
                            <option value="3">Từ  3.000.000 đ</option>
                            <option value="5">Từ  5.000.000 đ</option>
                            <option value="7">Từ  7.000.000 đ</option>
                            <option value="10">Từ  10.000.000 đ</option>
                            <option value="15">Từ  15.000.000 đ</option>
                            <option value="20">Từ  20.000.000 đ</option>
                            <option value="30">Từ  30.000.000 đ</option>
                            <option value="40">Từ 40.000.000 đ</option>
                            <option value="50">Từ 50.000.000 đ</option>
                            <option value="60">Từ 60.000.000 đ</option>
                            <option value="70">Từ 70.000.000 đ</option>
                        </select>
                        -->
                            {!! Form::select('salary_from[]',['' => __('Salary Level')]+$salaryFroms,
                            Request::get('salary_from', null), array('class'=>'form-control form-select shadow-sm',
                            'id'=>'salary_from')) !!}
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="form-group" id="degree_level_dd">
                            <label>Cấp bậc</label>
                            <!--<select class="form-control form-select" id="level" name="level">
                            <option value="">Tất cả</option>
                            <option value="sinh-vien-thuc-tap-sinh_1" data-id="1">
                                Sinh viên/ Thực tập sinh
                            </option>
                            <option value="moi-tot-nghiep_2" data-id="2">
                                Mới tốt nghiệp
                            </option>
                            <option value="nhan-vien_3" data-id="3">
                                Nhân viên
                            </option>
                            <option value="truong-nhom-giam-sat_4" data-id="4">
                                Trưởng nhóm / Giám sát
                            </option>
                            <option value="quan-ly_5" data-id="5">
                                Quản lý
                            </option>
                            <option value="quan-ly-cap-cao_11" data-id="11">
                                Quản lý cấp cao
                            </option>
                            <option value="dieu-hanh-cap-cao_12" data-id="12">
                                Điều hành cấp cao
                            </option>
                        </select> -->

                            {!! Form::select('degree_level_id[]', ['' => __('Select Degree Level')] + $degreeLevels,
                            Request::get('degree_level_id', null), array('class'=>'form-control form-select shadow-sm',
                            'id'=>'degree_level_id')) !!}

                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="form-group" id="job_type_dd">
                            <label>Hình thức việc làm</label>
                            <!--<select class="form-control form-select" name="job_type" id="job_type">
                            <option value="">Tất cả</option>
                            <option data-id="1000" value="nhan-vien-chinh-thuc_1000">
                                Nhân viên chính thức
                            </option>
                            <option data-id="0100" value="tam-thoi-du-an_0100">
                                Tạm thời/Dự án
                            </option>
                            <option data-id="0010" value="thoi-vu-nghe-tu-do_0010">
                                Thời vụ - Nghề tự do
                            </option>
                            <option data-id="0001" value="thuc-tap_0001">
                                Thực tập
                            </option>
                        </select> -->
                            {!! Form::select('job_type_id[]', ['' => __('Select Job Type')] + $jobTypes,
                            Request::get('job_type_id', null), array('class'=>'form-control form-select shadow-sm',
                            'id'=>'job_type_id')) !!}

                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="form-group form-group-custom-multiselect" id="benefit_id_dd">
                            <label>{{__('Select desired benefits')}}</label>
                            {!! Form::select('benefit_id[]', $benefits, Request::get('benefit_id', null),
                            ['class'=>'form-control form-select shadow-sm multiselect',
                            'id'=>'benefit_id','multiple'=>true, "data-placeholder"=>"Month"]) !!}
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-1 close-filter-box">
                        <div class="close-input-filter">
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </div>
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
    $('#benefit_id').multiselect({
        texts: {
            placeholder: "{{__('Select desired benefits')}}"
        }
    });
});
$('#benefit_id').each(function() {
    $(this).multiselect({
        texts: {
            placeholder: "{{__('Select desired benefits')}}", // or $(this).prop('title'),
        },
    });
});
</script>
@endpush