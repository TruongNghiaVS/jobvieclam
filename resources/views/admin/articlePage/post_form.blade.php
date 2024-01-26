@extends('admin.layouts.admin_layout')
@push('css')
    <link rel="stylesheet" href="{{ asset('modules/blogs/css/blogs.css') }}">
@endpush
@section('content')
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
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <!-- BEGIN PAGE BAR -->
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    @if($item->id <0 )
                    <li><a> Chính sách</a> <i class="fa fa-circle"></i></li>
                    <li><span>Thêm mới</span></li>
                    @else 
                    <li><a>Sửa chính sách</a> <i class="fa fa-circle"></i></li>
                    <li><span>{{$item->title}}</span></li>
                    @endif
                </ul>
            </div>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
          
            @if($item->id <0 )
            <h3 class="page-title">Thêm Bài viết mới </h3>
                    @else 
                    <h3 class="page-title">Sửa chính sách </h3>
                    @endif
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
                                                          action="{{ route('admin.article.create')}}"
                                                          enctype="multipart/form-data">
                                                        {{csrf_field()}}

                                                        <input type ="hidden" value ="{{$item->id}}" name ="id">
                                                        <div class="row">
                                                            <div class="col-lg-9">
                                                               
                                                                <div
                                                                        class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                                                                    <label class="control-label" for="title">Tiêu
                                                                        đề</label>
                                                                    <input type="text" class="form-control" name="title"
                                                                           id="title" autofocus
                                                                           value="{{$item->title}}">
                                                                    <span
                                                                            class="text-danger">{{ $errors->first('title') }}</span>
                                                                </div>
                                                                <div
                                                                        class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
                                                                    <label class="control-label" for="Slug">Slug</label>
                                                                    <input type="text" class="form-control" name="slug"
                                                                           id="slug" autofocus
                                                                           value="{{$item->slug}}">
                                                                    <span
                                                                            class="text-danger">{{ $errors->first('slug') }}</span>
                                                                </div>

                                                                <div
                                                                        class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
                                                                    <label class="control-label"
                                                                           for="content">Mô tả </label>
                                                                    <textarea class="form-control" name="description"
                                                                              id="" cols="40" rows="5"
                                                                              autofocus>{{$item->description}}</textarea>
                                                                    <span
                                                                            class="text-danger">{{ $errors->first('content') }}</span>
                                                                </div>


                                                                <div
                                                                        class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
                                                                    <label class="control-label"
                                                                           for="content">Nội dung</label>
                                                                    <textarea class="form-control" name="content"
                                                                              id="description" cols="40" rows="5"
                                                                              autofocus>{{$item->content}}</textarea>
                                                                    <span
                                                                            class="text-danger">{{ $errors->first('content') }}</span>
                                                                </div>
                                                                <br/><br/><br/>
                                                                <div class="clearfix"></div>
                                                                <div class="blogboxint">
                                                                    <h3>SEO</h3>
                                                                    <div id="div_show_seo_fields">
                                                                       
                                                                        <div class="form-group">
                                                                            <label class="control-label" for="title">Từ
                                                                                khóa Meta</label>
                                                                            <input type="text" class="form-control"
                                                                                   name="meta_keywords"
                                                                                   id="meta_keywords"
                                                                                   autofocus
                                                                                   value="{{$item->meta_keywords}}">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="control-label" for="title">Mô
                                                                                tả Meta</label>
                                                                            <textarea class="form-control"
                                                                                      name="meta_descriptions"
                                                                                      id="meta_descriptions" cols="40"
                                                                                      rows="5"
                                                                                      autofocus>{{$item->meta_descriptions}}</textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <div class="blogboxint">
                                                                    @if($item< 1)
                                                                    <input type="submit" value="Thêm mới"
                                                                           class="btn btn-primary">
                                                                    @else 
                                                                    <input type="submit" value="Cập nhật"
                                                                           class="btn btn-primary">
                                                                    @endif
                                                                
                                                                </div>

                                                                <!-- <div class="blogboxint">
                                                                    <div class="form-group">
                                                                        <label class="control-label"
                                                                               for="Upload Image">Ảnh đại diện</label>
                                                                        <input type="file" class="form-control"
                                                                               name="imageShare"
                                                                               id="image" autofocus>
                                                                    </div>
                                                                </div> -->
                                                               
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
