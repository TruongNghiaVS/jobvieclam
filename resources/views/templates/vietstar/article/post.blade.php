

@extends('templates.vietstar.layouts.app')
@section('content')
@include('templates.vietstar.includes.header')


<div class="blog-single gray-bg">
    <div class="container">
        <article class="article">

       
        @if($item)
            <div class="article-title" bis_skin_checked="1">
                        <h6><a href="#" class="text-primary">{!! $item->title !!}</a></h6>
                        <h1>{!! $item->description !!}</h1>
                        <div class="media" bis_skin_checked="1">
                            
                            <div class="media-body" bis_skin_checked="1">
                                <span class="time">{!! $item->created_at !!}</span>
                            </div>
                        </div>
            </div>

            <div class="article-content">

                {!! $item->content !!}
            </div>
        @endif
        </article>
    </div>
</div>

@include('templates.vietstar.includes.footer')
@endsection

@push('scripts')
 
<script>
</script>
@endpush

