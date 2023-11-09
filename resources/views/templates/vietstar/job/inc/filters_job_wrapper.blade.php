@push('styles')
<style type="text/css">

</style>
@endpush
{{--<?php
dd($salaryFroms)
?>--}}
<!-- SEARCH STICKY -->
<div class="page-heading-tool job-detail ">
    <div class="container">
        <div class="tool-wrapper">
            <div class="search-job">
                <div class="form-horizontal">
                    <div class="form-wrap">
                        <div class="form-group form-keyword">
                            <input type="search" class="keyword form-control" id="search" name="search" placeholder="{{__('Skills or Job Titles')}}" autocomplete="off">
                        </div>
                        <div class="form-group form-select-chosen" id="functional_area_dd">
                            <select class="form-control form-select" name="functional_area_id" id="functional_area">
                                <option value="">Chọn phòng ban</option>
                                <option value="Nhân sự">Nhân sự</option>
                                <option value="Hành chính">Hành chính</option>
                                <option value="Kế toán">Kế toán</option>
                            </select>
                        </div>
                        <div class="form-group form-select-chosen" id="city_dd2">
                            <select class="form-control form-select" name="city_id" id="city">
                                <option value="">Chọn địa điểm</option>
                                <option value="3">HCM</option>
                                <option value="5">Hà Nội</option>
                                <option value="5">Đà Nẵng</option>
                            </select>
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
                    <i class="far fa-filter"></i> Lọc
                </button>
            </div>
        </div>
    </div>
</div>

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
                    <i class="far fa-filter"></i> Lọc
                </button>
                <button class="btn btn-primary" type="submit">
                    <i class="bi bi-search text-white"></i>
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
                    <div class="col-sm-6 col-lg-2">
                        <div class="form-group form-select">
                            <label>Mức lương</label>
                            <select class="form-control form-select" name="salary" id="salary">
                                <option value="">Tất cả</option>
                                <option value="3"> 3.000.000d</option>
                                <option value="5">2.000.000</option>
                                <option value="5">1.000.000</option>

                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="form-group" id="degree_level_dd">
                            <label>Cấp bậc</label>
                            <select class="form-control form-select" id="level" name="level">
                                <option value="">Tất Cả</option>
                                <option value="5" data-id="1">
                                    Thạc sĩ
                                </option>
                                <option value="1" data-id="2">
                                    THPT
                                </option>

                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="form-group" id="job_type_dd">
                            <label>Theo ngành</label>
                            <select class="form-control form-select" name="job_type" id="job_type">
                                <option value="">Tất cả</option>
                                <option data-id="Hành Chính / Nhân Sự" value="nhan-vien-chinh-thuc_1000">
                                    Hành Chính / Nhân Sự
                                </option>
                                <option data-id="IT" value="tam-thoi-du-an_0100">
                                    Công Nghệ Thông Tin (IT)
                                </option>
                                <option data-id="Xuất Nhập Khẩu" value="tam-thoi-du-an_0100">
                                    Xuất Nhập Khẩu
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="form-group" id="benefit_id_dd">
                            <label>{{__('Select desired benefits')}}</label>
                            {!! Form::select('benefit_id[]', $benefits, Request::get('benefit_id', null),
                            ['class'=>'form-control form-select shadow-sm multiselect',
                            'id'=>'benefit_id','multiple'=>true, "data-placeholder"=>"Month"]) !!}
                        </div>
                    </div>

                </div>
                <div class="close-filter-box">
                    <div class="close-input-filter">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>


<div class="filters-job-wrapper-mobile job-detail">
    <div class="container">
        <div class="close-filter-box-mobile" onclick="closeFilterJob_mobile()">
            <div class="close-input-filter-mobile">
                <i class="fa fa-times" aria-hidden="true"></i>
            </div>
        </div>
        <div class="filters-wrapper">
            <form action="{{route('job.list')}}" method="get">
                <div class="row">
                    <div class="col-sm-6 col-lg-2">
                        <div class="form-group form-keyword">
                            <input type="search" class="keyword form-control" id="search" name="search" placeholder="{{__('Skills or Job Titles')}}" autocomplete="off">
                        </div>
                    </div>


                    <div class="col-sm-6 col-lg-2">
                        <div class="form-group form-select-chosen" id="functional_area_dd">
                            <select class="form-control form-select" name="functional_area_id" id="functional_area">
                                <option value="">Chọn phòng ban</option>
                                <option value="Nhân sự">Nhân sự</option>
                                <option value="Hành chính">Hành chính</option>
                                <option value="Kế toán">Kế toán</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-2">
                        <div class="form-group form-select-chosen" id="city_dd2">
                            <select class="form-control form-select" name="city_id" id="city">
                                <option value="">Chọn địa điểm</option>
                                <option value="3">HCM</option>
                                <option value="5">Hà Nội</option>
                                <option value="5">Đà Nẵng</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-2">
                        <div class="form-group form-select-chosen">
                            <label>Lương</label>
                            <select class="form-control form-select" name="salary" id="salary">
                                <option value="">Tất cả</option>
                                <option value="3">Từ 3.000.000 đ</option>
                                <option value="5">Từ 5.000.000 đ</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="form-group" id="degree_level_dd">
                            <label>Cấp bậc</label>
                            <select class="form-control form-select" id="level" name="level">
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
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="form-group" id="job_type_dd">
                            <label>Hình thức việc làm</label>
                            <select class="form-control form-select" name="job_type" id="job_type">
                                <option value="">Tất cả</option>
                                <option data-id="1000" value="nhan-vien-chinh-thuc_1000">
                                    Nhân viên chính thức
                                </option>
                                <option data-id="0100" value="tam-thoi-du-an_0100">
                                    Tạm thời/Dự án
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="form-group form-group-custom-multiselect" id="benefit_id_dd">
                            <label>Chọn phúc lợi mong muốn</label>
                            <select class="form-control form-select shadow-sm multiselect" name="benefit_id" id="benefit" multiple>
                                <option value="">Chọn phòng ban</option>
                                <option value="Nhân sự">Nhân sự</option>
                                <option value="Hành chính">Hành chính</option>
                                <option value="Kế toán">Kế toán</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group form-submit">
                        <button class="btn btn-primary" type="submit">
                            Tìm kiếm
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>


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