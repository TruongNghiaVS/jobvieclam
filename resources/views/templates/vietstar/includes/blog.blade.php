
<?php
// dd($dataDraw);
// $data = $dataDraw["blogs"];
$data = $dataDraw;
$category = $data["category"];
$heading = $data["category"]->heading;
$blogs = $data["blogs"]->items();


// foreach ($blogs as $value) {
//     echo "$value->heading";
// }


?>


<div class="blog-content">
   
    <section id="secondary-blog-content">
        <div class="container">
            <div class="head-box" bis_skin_checked="1">
                <div class="cb-title" bis_skin_checked="1">
                    <h1>{{$heading}}</h1>
                </div>
                
            </div>
            <div class="row align-items-start ">

            
                @foreach($blogs as $blog)
                <div class="col-sm-12 col-md-6 col-lg-3  mb-4 ">
                    <div class="figure">
                        <a href="{{url('/')}}/blog/{{$blog->slug}}" class="figure-images">
                            @if($blog-> image) 
                            <img src="{{url('/')}}/uploads/blogs/{{ $blog-> image }}" alt="{{$blog->heading}}">
                            @else 
                            <img src="{{ asset('/') }}/admin_assets/no-image.png" alt="{{ $blog->heading}}">
                            @endif
                        </a>
                        <div class="figcaption">
                            <h3 class="figcaption__category-name"><a href="{{url('/')}}/blog/category/{{$category -> slug }}">{{$heading}}</a></h3>
                            <div class="figcaption__title"><a href="{{url('/')}}/blog/{{ $blog-> slug }}">{{ $blog-> heading}} </a></div>

                        </div>
                    </div>
                </div>
                @endforeach


                
            </div>
            <div class="d-flex justify-content-center">
            {{ $data["blogs"]->links() }}
            </div>
        </div>
    </section>
</div>
