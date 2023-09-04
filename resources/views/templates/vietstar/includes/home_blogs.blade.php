<!-- Blogs slider -->
<section class="blogs-slider section-static">
    <div class="container">
      <h2 class="section-title">{{ __('Blog') }}</h2>
      <div class="__row justify-content-between">
        <div class="card-list d-flex flex-row gap-24">
            <div class="swiper swiper-blogs-slider">
                <div class="swiper-wrapper">
                    @if(null!==($blogs))
                        @php
                        $count = 1;
                        @endphp
                        @foreach($blogs as $blog)
                        @php
                        $cate_ids = explode(",", $blog->cate_id);
                        $data = DB::table('blog_categories')->whereIn('id', $cate_ids)->get();
                        $cate_array = array();
                        foreach ($data as $cat) {
                            $cate_array[] = "<a href='" . url('/blog/category/') . "/" . $cat->slug . "'>$cat->heading</a>";
                        }
                        @endphp
                        <div class="swiper-slide">
                            <div class="card-list-item">
                                <div class="card-list-item__img">
                                    <img src="{{asset('uploads/blogs/'.$blog->image)}}"
                                    alt="{{$blog->heading}}">
                                </div>
                                <div class="card-list-item__title"><a href="{{route('blog-detail',$blog->slug)}}">{{$blog->heading}}</a></div>
                            </div>
                        </div>
                        @php($count++)
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        <!-- button -->
        <div class="d-flex align-self-center">
          <a class="btn btn-viewall-post"  href="{{ route('blogs') }} {{ Request::url() == route('blogs') ? 'active' : '' }}" ><span>{{__('View All Blog Posts')}}</span> <i
              class="fas fa-arrow-right ms-2"></i></a>
        </div>
      </div>
    </div>
</section>
