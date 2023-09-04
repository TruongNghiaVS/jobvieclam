@extends('templates.vietstar.layouts.app')
@section('content')
<!-- Header start -->
@include('templates.vietstar.includes.header')
<!-- Header end -->
<!-- Inner Page Title start -->
@include('templates.vietstar.includes.inner_page_title', ['page_title'=>__('Blog')])
<!-- Inner Page Title end -->

<div class="listpgWraper">
    <section id="blog-content">
        <div class="container">

            <!-- Blog start -->
            <div class="row">
                <div class="col-lg-12">
                    <!-- Blog List start -->
                    <div class="blogwrapper">
                        <div class="blogList">
                            <div class="row">
                                @if(null!==($blogs))
                                <?php
                            $count = 1;
                            ?>
                                @foreach($blogs as $blog)
                                <?php
                            $cate_ids = explode(",", $blog->cate_id);
                            $data = DB::table('blog_categories')->whereIn('id', $cate_ids)->get();
                            $cate_array = array();
                            foreach ($data as $cat) {
                                $cate_array[] = "<a href='" . url('/blog/category/') . "/" . $cat->slug . "'>$cat->heading</a>";
                            }
                            ?>
                                <div class="col-xl-3 col-lg-4 col-md-4 mb-3">
                                    <a class="bloginner" href="{{route('blog-detail',$blog->slug)}}">
                                        <div class="postimg">{{$blog->printBlogImage()}}</div>

                                        <div class="post-header li-text">
                                          
                                            <h4><span class="li-head" >{{$blog->heading}}</span> </h4>
                                           
                                        </div>

                                    </a>
                                </div>
                                <?php $count++; ?>
                                @endforeach
                                @endif
                              
                            </div>
                        </div>
                    </div>

                    <!-- Pagination -->
                    <div class="pagiWrap">
                        <nav aria-label="Page navigation example">
                            @if(isset($blogs) && count($blogs))
                            {{ $blogs->appends(request()->query())->links() }} @endif
                        </nav>
                    </div>
                </div>
                <div class="col-lg-3 d-none">

                    <div class="sidebar">
                        <!-- Search -->
                        <div class="widget">
                            <h5 class="widget-title">{{__('Search')}}</h5>
                            <div class="search">
                                <form action="{{route('blog-search')}}" method="GET">
                                    <input type="text" class="form-control" placeholder="{{__('Search')}}"
                                        name="search">
                                    <button type="submit" class="btn"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                        <!-- Categories -->
                        @if(null!==($categories))
                        <div class="widget">
                            <h5 class="widget-title">{{__('Categories')}}</h5>
                            <ul class="categories" style="list-style-type:none">
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
            <div class="py-5"></div>
        </div>
    </section>

</div>


@include('templates.vietstar.includes.footer')
@endsection
@push('styles')
<style>
.plus-minus-input {
    -webkit-align-items: center;
    -ms-flex-align: center;
    align-items: center;
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

.postimg img {
    max-width: 100px;
    max-height: 150px;
}

.list {
    max-width: 1400px;
    margin: 20px auto;
}

.img-list a {
    text-decoration: none;
}

.li-sub p {
    margin: 0;
}

.list li {
    border-bottom: 1px solid #ccc;
    display: table;
    border-collapse: collapse;
    width: 100%;
}

.inner {
    display: table-row;
    overflow: hidden;
}

.li-img {
    display: table-cell;
    vertical-align: middle;
    width: 30%;
    padding-right: 1em;
}

.li-img img {
    display: block;
    width: 100%;
    height: auto;

}

.li-text {
    display: table-cell;
    vertical-align: middle;
    width: 70%;
}

.li-head {
    margin: 10px 0 0 0;
}

.li-sub {
    margin: 0;
}

@media all and (min-width: 45em) {
    .list li {
        float: left;
        width: 50%;
    }
}

@media all and (min-width: 75em) {
    .list li {
        width: 33.33333%;
    }
}

/* for flexbox */
@supports(display: flex) {
    .list {
        display: flex;
        flex-wrap: wrap;
    }

    .li-img,
    .li-text,
    .list li {
        display: block;
        float: none;
    }

    .li-img {
        align-self: center;
        /* to match the middle alignment of the original */
    }

    .inner {
        display: flex;
    }
}

/* for grid */
@supports(display: grid) {
    .list {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(400px, 1fr));
    }

    .list li {
        width: auto;
        /* this overrides the media queries */
    }
}
</style>
@endpush
@push('scripts')
@include('templates.vietstar.includes.immediate_available_btn')
<script>
</script>
@endpush