@extends('admin.layouts.admin_layout')


@section('content')

<div class="content-wrapper">

    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            @if(session()->has('message.added'))

            <div class="alert alert-success fade in">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                {!! session('message.content') !!}
            </div>
            @endif
            @if(session()->has('message.updated'))
            <div class="alert alert-success fade in">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                {!! session('message.content') !!}
            </div>
            @endif
            <!-- BEGIN PAGE HEADER-->
            <!-- BEGIN PAGE BAR -->
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->
            <div class="row">
                <div class="col-lg-12">
                    <section class="content-header">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-md-9">

                                    <h1>
                                        Quản lý Blogs

                                    </h1>
                                </div>
                            </div>


                            <ul class="breadcrumb">
                                <li class="active"><a href="{{ URL::asset('/admin/blog')}}"><i class="fa fa-dashboard"></i> Quản lý Blogs </a></li>
                                <li><a href="{{ URL::asset('/admin/blog_category')}}"><i class="fa fa-file-text-o"></i>
                                        Quản lý Danh mục</a></li>

                            </ul>

                        </div>


                    </section>

                    <div class="filter_blog">


                        <div class="form-row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="search">Search</label>
                                    <input type="text" id="search" class="form-control" placeholder="Tìm kiếm">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Example select</label>
                                    <select class="form-control" id="exampleFormControlSelect1">
                                    <option>Bí Quyết Tìm Việc</option>
                                    <option>Thị Trường - Xu Hướng</option>
                                    <option>Góc Thư Giãn</option>
                                    <option>Tiện Ích</option>
                                    <option>Góc Báo Chí</option>
                                    <option>Thị trường lương</option>
                                    <option>Cẩm nang nghề nghiệp</option>
                                    </select>
                                </div>
                            </div>
 
                        </div>

                    </div>

                    <section class="content">


                        <div class="panel-body">
                            <table class="table" id="blogTable">
                                <thead>
                                    <tr>

                                        <th>Tiêu đề</th>
                                        <th>Slug</th>

                                        <th>Cập nhật lần cuối</th>
                                        <th>{{__('Action')}}</th>
                                    </tr>
                                    {{ csrf_field() }}
                                </thead>
                                <tbody>
                                    @foreach($user as $blog)
                                    <tr class="item{{$blog->id}}">

                                        <td>{{$blog->heading}}</td>
                                        <td>
                                            {{$blog->slug}}
                                        </td>

                                        <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $blog->updated_at)->diffForHumans() }}
                                        </td>
                                        <td>
                                            <a id="popup" class="edit-modal btn btn-success" href="{{route('edit-blog',$blog->id)}}"><span class="fa fa-pencil"></span>
                                                Sửa</a>
                                            <button id="popup" class="delete-modal btn btn-danger" onClick="delete_blog({{$blog->id}});"><span class="fa fa-trash"></span>
                                                Xóa</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- /.panel-body -->
                    </section>
                </div>
            </div><!-- /.panel panel-default -->
            <!-- /.col-md-8 -->
            <div id="addModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="POST" files="true" action="{{ asset('admin/blog/create')}}" enctype="multipart/form-data">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Thêm Blog</h4>
                            </div>
                            <div class="modal-body">

                                {{csrf_field()}}
                                @if($categories!='')
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="title">Chọn Danh mục</label>
                                    <div class="col-sm-12">
                                        <select id="cate_id" name="cate_id[]" class="form-control" multiple="multiple">
                                            @foreach($categories as $cate)
                                            <option value="<?php echo $cate->id; ?>">{!!$cate->heading!!}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @endif
                                <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                                    <label class="control-label col-sm-3" for="title">Tiêu đề</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="title" id="title" autofocus value="{{ old('title') }}">
                                        <span class="text-danger">{{ $errors->first('title') }}</span>
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
                                    <label class="control-label col-sm-3" for="Slug">Slug</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="slug" id="slug" autofocus value="{{ old('slug') }}">
                                        <span class="text-danger">{{ $errors->first('slug') }}</span>
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
                                    <label class="control-label col-sm-3" for="content">Nội dung</label>
                                    <div class="col-sm-12">
                                        <textarea class="form-control" name="content" id="content" cols="40" rows="5" autofocus>{{ old('content') }}</textarea>
                                        <span class="text-danger">{{ $errors->first('content') }}</span>
                                    </div>
                                </div>
                                <br /><br /><br /> <br />
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="Upload Image">Ảnh đại diện</label>
                                    <div class="col-sm-12">
                                        <input type="file" class="form-control" name="image" id="image" autofocus>

                                    </div>
                                </div>
                                <br /> <br />
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="Quản lý SEO">
                                        <input type="checkbox" id="show_seo_fields" />
                                        Quản lý Seo
                                    </label>
                                </div>
                                <div style="clear:both"></div>
                                <div id="div_show_seo_fields" style="display: none">

                                    <div class="form-group">
                                        <label class="control-label col-sm-3" for="title">Tiêu đề Meta </label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="meta_title" id="meta_title" autofocus value="{{ old('meta_title') }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-3" for="title">Từ khóa Meta </label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="meta_keywords" id="meta_keywords" autofocus value="{{ old('meta_keywords') }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-3" for="title">Mô tả Meta </label>
                                        <div class="col-sm-12">
                                            <textarea class="form-control" name="meta_descriptions" id="meta_descriptions" cols="40" rows="5" autofocus>{{ old('meta_description') }}</textarea>
                                        </div>
                                    </div>
                                </div>


                            </div>

                            <div style="clear:both"></div>
                            <br>
                            <div class="modal-footer">
                                <input type="submit" value="Add" class="btn btn-primary">
                                <input type="submit" value="Close" class="btn btn-warning" data-dismiss="modal">
                            </div>


                        </form>
                    </div>

                </div>

            </div>

            <!-- Modal form to add a form close -->

            <!-- Modal form to edit a form -->
            <div id="editModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="POST" files="true" action="{{ asset('/admin/blog')}}" enctype="multipart/form-data">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Cập nhật Blog</h4>

                            </div>
                            <div class="modal-body">

                                {{csrf_field()}}
                                <input type="hidden" name="id" id="id">
                                @if($categories!='')
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="title">Chọn Danh mục</label>
                                    <div class="col-sm-12">
                                        <select id="cate_id_update" name="cate_id_update[]" class="form-control" multiple="multiple">
                                            @foreach($categories as $cate)
                                            <option value="<?php echo $cate->id; ?>">{!!$cate->heading!!}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @endif
                                <div class="form-group {{ $errors->has('title_update') ? 'has-error' : '' }}">
                                    <label class="control-label col-sm-3" for="title">Tiêu đề</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="title_update" id="title_update" value="{{ old('title_update') }}">
                                        <span class="text-danger">{{ $errors->first('title_update') }}</span>
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('slug_update') ? 'has-error' : '' }}">
                                    <label class="control-label col-sm-3" for="Slug">Slug</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" value="{{ old('slug_update') }}" name="slug_update" id="slug_update">
                                        <span class="text-danger">{{ $errors->first('slug_update') }}</span>
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('content_update') ? 'has-error' : '' }}">
                                    <label class="control-label col-sm-3" for="content">Nội dung</label>
                                    <div class="col-sm-12">
                                        <textarea class="form-control" name="content_update" id="content_update" cols="40" rows="5">{{ old('content_update') }}</textarea>
                                        <span class="text-danger">{{ $errors->first('content_update') }}</span>
                                    </div>
                                </div>
                                <br /><br /><br /> <br />
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="Upload Image">Ảnh đại diện</label>
                                    <div class="col-sm-12">
                                        <input type="file" class="form-control" name="imageupdate" id="imageupdate">
                                        <p class="errorTitle text-center alert alert-danger hidden"></p>
                                        <div class="image_append" id="image_append">

                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="Quản lý SEO">
                                        <input type="checkbox" id="show_seo_fields_for_update" />
                                        Quản lý SEO
                                    </label>
                                </div>
                                <div style="clear:both"></div>
                                <div id="div_show_seo_fields_for_update" style="display: none">
                                    <div class="form-group">
                                        <label class="control-label col-sm-3" for="title">Tiêu đề Meta</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="meta_title_update" id="meta_title_update" autofocus value="{{ old('meta_title_update') }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-3" for="title">Từ khóa Meta</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="meta_keywords_update" id="meta_keywords_update" autofocus value="{{ old('meta_keywords_update') }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-3" for="title">Mô tả Meta</label>
                                        <div class="col-sm-12">
                                            <textarea class="form-control" name="meta_descriptions_update" id="meta_descriptions_update" cols="40" rows="5">{{ old('meta_description_update') }}</textarea>
                                        </div>
                                    </div>
                                </div>




                            </div>
                            <div style="clear:both"></div>
                            <br>
                            <div class="modal-footer">
                                <input type="submit" value="Update" class="btn btn-primary">
                                <input type="submit" value="Close" class="btn btn-warning" data-dismiss="modal">
                            </div>
                        </form>
                    </div>
                </div>
            </div>



            <!-- Modal form to add a form -->
            <div id="viewModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Nội dung</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">

                                <div class="col-sm-12">
                                    <textarea class="form-control" name="contentview" id="contentview" disabled="" cols="40" rows="5"></textarea>
                                    <p class="errorContent text-center alert alert-danger hidden"></p>
                                </div>
                            </div>
                        </div>

                        <div style="clear:both"></div>
                        <br>
                        <div class="modal-footer">

                            <input type="submit" value="Close" class="btn btn-warning" data-dismiss="modal">
                        </div>



                    </div>

                </div>

            </div>

            @endsection

            @push('css')
            <link rel="stylesheet" href="{{ asset('modules/blogs/css/blogs.css') }}">
            @endpush