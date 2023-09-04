@extends('templates.vietstar.layouts.app')
@section('content')
<!-- Header start -->
@include('templates.vietstar.includes.header')
<!-- Header end -->
<!-- Company cover -->
<section class="public-profile-cover" style="background-image: url({{ asset('/vietstar/imgs/company-cover.jpg') }})">
</section>
<!-- Inner Page Title start -->
@include('templates.vietstar.includes.inner_page_title', ['page_title'=>__('Blog Detail')])
<!-- Inner Page Title end -->
@if(null!==($blog))


<div class="listpgWraper">
    <section id="blog-content">
        <div class="container">
            <?php
            $cate_ids = explode(",", $blog->cate_id);
            $data = DB::table('blog_categories')->whereIn('id', $cate_ids)->get();
            $cate_array = array();
            foreach ($data as $cat) {
                $cate_array[] = "<a href='" . url('/blog/category/') . "/" . $cat->slug . "'>$cat->heading</a>";
            }
            ?>
            <!-- Blog start -->
            <div class="row">
                <div class="col-lg-9">
                    <!-- Blog List start -->
                    <div class="blogWraper">
                        <div class="blogList">
                            <div class="blog-detail bloginner pb-5">
                                <!-- <div class="postimg">{{$blog->printBlogImage()}}</div> -->
                                <div class="post-header">
                                    <h2>{{$blog->heading}}</h2>
                                    <!-- <div class="postmeta">Category : {!!implode(', ',$cate_array)!!}</div> -->
                                </div>
                                <p>{!! $blog->content !!}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">

                    <div class="sidebar">
                        <!-- Search -->
                        <div class="widget">
                            <h5 class="widget-title">{{__('Search')}}</h5>
                            <div class="search">
                                <form action="{{route('blog-search')}}" method="GET">
                                    <input type="text" class="form-control" placeholder="{{__('Search')}}" name="search">
                                    <button type="submit" class="btn"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                        <!-- Categories -->
                        @if(null!==($categories))
                        <div class="widget">
                            <h5 class="widget-title">{{__('Categories')}}</h5>
                            <ul class="categories">
                                @foreach($categories as $category)
                                <li><a href="{{url('/blog/category/').'/'.$category->slug}}">{{$category->heading}}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <hr>
    </div>
    <section class="">
        <div class="container">
            
            <h3 class="section-title aline-left mb-3">{{__('Related post')}}</h3>
            <div class="blogwrapper">
                <div class="blogList">
                    <div class="row">
                        @if(!empty($data))
                            @foreach($data as $item)
                                @php($posts = \App\Blog::where('cate_id', 'like',  $item->id)->where('id','!=',$blog->id)->get())
                                @foreach($posts as $related_post)
                                    <div class="col-xl-3 col-lg-4 col-md-4 mb-3">
                                        <a href="{{route('blog-detail',$related_post->slug)}}" class="bloginner">
                                            <div class="postimg">{{$related_post->printBlogImage()}}</div>
                                            <div class="post-header li-text">
                            
                                                <h4>
                                                    <span class="li-head" >{{$related_post->heading}}</span>
                                                </h4>
                                                
                                            </div>

                                        </a>
                                    </div>
                                @endforeach
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endif
@include('templates.vietstar.includes.footer')
@endsection
@push('styles')
<style>
    .sidebar .widget .categories li a {
    font-size: 14px;
}
.search .form-control{
    width: 100%;
}
#blog-content {
    max-width: 100%;
    width: 100%;
    margin: 0 auto 40px auto;
}
.section-blog-related{
    
    padding: 60px 0;
}
.plus-minus-input {
    -webkit-align-items: center;
    -ms-flex-align: center;
    align-items: center;
}
.blog-detail h1{
    font-size: 1.3rem;
}
.blog-detail h2{
font-size: 1.3rem;
}
.blog-detail h3{
font-size: 1.25rem;
}
.blog-detail h4{
font-size: 1.2rem;
}
.blog-detail h5{
font-size: 1.1rem;
}
.plus-minus-input .input-group-field {
    text-align: center;
    margin-left: 0.5rem;
    margin-right: 0.5rem;
    padding: 0rem;
}

.plus-minus-input .input-group-field::-webkit-inner-spin-button,
.plus-minus-input .input-group-field ::-webkit-outer-spin-button {
    -webkit-appearance: none;
    appearance: none;
}

.plus-minus-input .input-group-button .circle {
    border-radius: 50%;
    padding: 0.25em 0.8em;
}
</style>
@endpush
@push('scripts')
@include('templates.vietstar.includes.immediate_available_btn')
<script>
</script>
@endpush
