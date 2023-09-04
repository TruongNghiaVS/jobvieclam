@php
    $ads = \App\AdBanner::all();
@endphp
<div id="adbanner" class="carousel slide" data-ride="carousel">

    <!-- Indicators -->
    <ul class="carousel-indicators">
        @foreach($ads as $key => $ad)
            <li data-target="#adbanner" data-slide-to="{{ $key + 1 }}" {{$key==0 ? 'class=active' : ''}}></li>
        @endforeach
    </ul>
    <!-- The slideshow -->
    <div class="carousel-inner">

        @foreach($ads as $key => $ad)
            <div class="carousel-item {{$key==0 ? 'active' : ''}}">
                <img src="{{Storage::disk('local')->url('public/uploads/ads_banner/').'/'. $ad->image }}" alt="{{ $ad->image }}">
            </div>
        @endforeach
    </div>
    <!-- Left and right controls -->
</div>
@push('scripts')
    <script src="{{asset('/')}}js/jquery.min.js"></script>
    <script src="{{asset('/')}}js/bootstrap.min.js"></script>
@endpush
@push('styles')
    <link href="{{ asset('/vietstar/css/style.css')}}" rel="stylesheet">
    <style>
        .gad {

        }
        #adbanner,
        .carousel-inner, .carousel-inner > .carousel-item {
            width: 100%;
            height: 100%;
        }
        .carousel-inner > .carousel-item > img,
        .carousel-inner > .carousel-item > a > img {
            width: 100%;
            height: 100%;
            margin: auto;
        }
    </style>
@endpush
