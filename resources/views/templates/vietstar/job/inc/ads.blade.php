@php
$ads = \App\AdBanner::all();
@endphp
<div id="adbanner" class="carousel slide" data-ride="carousel">

    <!-- Indicators -->

    <!-- The slideshow -->
    <div class="carousel-inner">

        <div class="col">
            <div class="row">
                <div class="item">
                    <div class="image loadAds">
                        <a href="#">
                            <img src="https://media.istockphoto.com/id/1312091473/vector/we-are-hiring-banner-with-megaphone-flat-illustration.jpg?s=612x612&w=0&k=20&c=03ytHwFjPHCCIIAxR-hplKCQQNFWgZSMUg2HDJ_xTZQ="
                                alt="#">
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="item">
                    <div class="image loadAds">
                        <a href="#">
                            <img src="https://img.freepik.com/free-vector/man-search-hiring-job-online-from-laptop_1150-52728.jpg"
                                alt="#">
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="item">
                    <div class="image loadAds">
                        <a href="#">
                            <img src="https://media.istockphoto.com/id/1173054931/photo/jobs-text-on-wooden-blocks-over-keyboard.jpg?s=612x612&w=0&k=20&c=1d3E26tHR7Yf7AUuGomDISXZTQ_u8PxizqTvo3bvSTY="
                                alt="#">
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="item">
                    <div class="image loadAds">
                        <a href="#">
                            <img src="https://elca.vietnamworks.com/assets/images/page/banner/cover.png?r=1689852315"
                                alt="#">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
.gad {}

#adbanner,
.carousel-inner,
.carousel-inner>.carousel-item {
    width: 100%;
    height: 100%;
}

.carousel-inner>.carousel-item>img,
.carousel-inner>.carousel-item>a>img {
    width: 100%;
    height: 100%;
    margin: auto;
}
</style>
@endpush