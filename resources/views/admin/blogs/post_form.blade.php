@extends('admin.layouts.admin_layout')
@push('css')
    <link rel="stylesheet" href="{{ asset('modules/blogs/css/blogs.css') }}">
@endpush
@section('content')
<script>

function stringtoSlug()
{
 
    var title, slug;
 
    //Lấy text từ thẻ input title 
    title = document.getElementById("title").value;
 
    //Đổi chữ hoa thành chữ thường
    slug = title.toLowerCase();
 
    //Đổi ký tự có dấu thành không dấu
    slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
    slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
    slug = slug.replace(/đ/gi, 'd');
    //Xóa các ký tự đặt biệt
    slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
    //Đổi khoảng trắng thành ký tự gạch ngang
    slug = slug.replace(/ /gi, " - ");
    //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
    //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
    slug = slug.replace(/\-\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-/gi, '-');
    slug = slug.replace(/\-\-/gi, '-');
    //Xóa các ký tự gạch ngang ở đầu và cuối
    slug = '@' + slug + '@';
    slug = slug.replace(/\@\-|\-\@|\@/gi, '');
    //In slug ra textbox có id “slug”
    //alert(slug);
    slug=  slug.replace(/\s/g, '');
    document.getElementById("slugInput").value = slug;



}
</script>
    <?php
    $lang = config('default_lang');
    $lang = MiscHelper::getLang($lang);
    $direction = MiscHelper::getLangDirection($lang);
    $queryString = MiscHelper::getLangQueryStr();
    ?>
    <style type="text/css">
        .table td,
        .table th {
            font-size: 12px;
            line-height: 2.42857 !important;
        }
    </style>
    <div class="page-content-wrapper ">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <!-- BEGIN PAGE BAR -->
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li><a>Thêm Blog</a> <i class="fa fa-circle"></i></li>
                    <li><span>Blogs</span></li>
                </ul>
            </div>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title">Thêm Bài viết mới </h3>
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="">
                                @if(session()->has('message.added'))
                                    <div class="alert alert-success alert-dismissible fade show d-flex align-items-center"
                                         role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <i class="mdi mdi-checkbox-marked-circle font-32"></i><strong class="pr-1">Thành công!</strong>
                                        {!! session('message.content') !!}.
                                    </div>
                                @endif
                                <div class="tab-content">
                                    <div class="tab-pane active show" id="settings">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="">
                                                    <form method="POST" files="true"
                                                          action="{{ asset('admin/blog/create')}}"
                                                          enctype="multipart/form-data">
                                                        {{csrf_field()}}
                                                        <div class="row">
                                                            <div class="col-lg-9 bg-grey p-2">
                                                                <div class="user-account-section">
                                                                    <h3 class="section-title">Thành phần bài viết </h3>
                                                                    <div class="form-group {{ $errors->has('lang') ? 'has-error' : '' }}">
                                                                        <label class="control-label" for="lang">Lựa chọn ngôn ngữ</label>
                                                                        {!! Form::select('lang', ['' => __('Select')]+$languages, $lang, array('class'=>'form-control', 'id'=>'lang', 'onchange'=>'setLang(this.value)')) !!}
                                                                        <span
                                                                                class="text-danger">{{ $errors->first('lang') }}</span>
                                                                    </div>
                                                                    <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                                                                        <label class="control-label" for="title">Tiêu đề</label>
                                                                        <input type="text" onchange ="stringtoSlug()" class="form-control" name="title"
                                                                               id="title" autofocus
                                                                               value="{{ old('title') }}">
                                                                        <span
                                                                                class="text-danger">{{ $errors->first('title') }}</span>
                                                                    </div>
                                                                 
                                                                    <div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
                                                                        <label class="control-label" for="slug">Slug</label>
                                                                        <input readonly type="text"  class="form-control" name="slug"
                                                                               id="slugInput" autofocus
                                                                               value="{{ old('slug') }}">
                                                                        <span
                                                                                class="text-danger">{{ $errors->first('slug') }}</span>
                                                                    </div>

                                                                    <div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
                                                                        <label class="control-label"
                                                                               for="content">Nội dung</label>
                                                                        <textarea class="form-control" name="content"
                                                                                  id="description" cols="40" rows="5"
                                                                                  autofocus>{{ old('content') }}</textarea>
                                                                        <span
                                                                                class="text-danger">{{ $errors->first('content') }}</span>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="clearfix"></div>
                                                                <div class="user-account-section">
                                                                    <div class="blogboxint">
                                                                        <h3 class="section-title"> Thành phần SEO</h3>
                                                                        <div id="div_show_seo_fields">
                                                                            <div class="form-group">
                                                                                <label class="control-label" for="title">Tiêu
                                                                                    đề Meta</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="meta_title" id="meta_title"
                                                                                    autofocus
                                                                                    value="{{ old('meta_title') }}">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label" for="title">Từ
                                                                                    khóa Meta</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="meta_keywords"
                                                                                    id="meta_keywords"
                                                                                    autofocus
                                                                                    value="{{ old('meta_keywords') }}">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label" for="title">Mô
                                                                                    tả Meta</label>
                                                                                <textarea class="form-control"
                                                                                        name="meta_descriptions"
                                                                                        id="meta_descriptions" cols="40"
                                                                                        rows="5"
                                                                                        autofocus>{{ old('meta_description') }}</textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3 p-2">
                                                                <div class="blogboxint">
                                                                    <input type="submit" value="Đăng bài"
                                                                           class="btn btn-primary">
                                                                    <!--<input type="submit" value="Close" class="btn btn-warning"
                                                                        data-dismiss="modal">-->
                                                                </div>
                                                                <div class="blogboxint">
                                                                    {{csrf_field()}}
                                                                    @if($categories!='')
                                                                        <div class="form-group">
                                                                            <label class="control-label" for="title">Chọn Danh mục</label>
                                                                            <ul class="optionlist">
                                                                                @foreach($categories as $cate)
                                                                                    <li>
                                                                                        <input type="checkbox"
                                                                                               name="cate_id[]"
                                                                                               id="cate_id"
                                                                                               value="<?php echo $cate->id; ?>">
                                                                                        <label for="webdesigner"></label>
                                                                                        {!!$cate->heading!!}</li>
                                                                                @endforeach
                                                                            </ul>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                                <div class="blogboxint">
                                                                    <div class="form-group">
                                                                        <label class="control-label"
                                                                               for="Upload Image">Ảnh đại diện</label>
                                                                        <input type="file" class="form-control"
                                                                               name="image"
                                                                               id="image" autofocus>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <style type="text/css">
                .float-right .custom-control-label {
                    color: #fff !important;
                }
            </style>
            @endsection
            @push('scripts')
                @include('admin.shared.tinyMCEFront')
                <script src="{{ asset('modules/blogs/js/blogs.js') }}"></script>
                <style type="text/css">
                    #fea_img {
                        border: 2px dashed #ddd;
                        /* background: #2a2f3e; */
                        padding: 50px 30px;
                        text-align: center;
                    }
                    .jFiler-input {
                        max-width: 401px;
                        margin: 0 auto 15px auto !important;
                    }
                    .jFiler-items-grid .jFiler-item .jFiler-item-container {
                        margin: 0 14px 30px 0;
                    }
                    .cropper-bg {
                        background-image: none !important;
                        height: 100% !important;
                    }
                    .img-crop {
                        display: block;
                        width: 100%;
                        height: 100%;
                    canvas {
                        margin: 0 !important;
                    }
                    }
                </style>
    @endpush
