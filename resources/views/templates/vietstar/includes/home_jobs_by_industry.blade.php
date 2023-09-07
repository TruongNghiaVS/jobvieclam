
<section class="section-jobs-by-industry">
    <div class="container">
        <h2 class="section-title text-center mb-3 text-primary">Việc làm theo ngành nghề</h2>
        <div class="swiper-container alljobs_swiper">
            <div class="swiper-wrapper">
            <div class="swiper-slide">Slide 1</div>
                <div class="swiper-slide">Slide 2</div>
                <div class="swiper-slide">Slide 3</div>
                <div class="swiper-slide">Slide 4</div>
                <div class="swiper-slide">Slide 5</div>
                <div class="swiper-slide">Slide 6</div>
                <div class="swiper-slide">Slide 7</div>
                <div class="swiper-slide">Slide 8</div>
                <div class="swiper-slide">Slide 9</div>
                <div class="swiper-slide">Slide 10</div>
                <!-- @foreach(collect($industries)->chunk(8) as $chunk)
                    <div class="swiper-slide">
                        <div class="row">
                            @foreach($chunk as $k => $industry)
                                <div class="col-12 col-xs-6 col-md-4 col-lg-3">
                                    <a class="job-industry" href="{{route('job.list').'?fe_industry_id='.$k}}" value="{{$k}}">
                                        <div class="icon">
                                            <span class="iconmoon icon-office-building-icon"></span>
                                        </div>
                                        <h3 class="title-job">{{$industry}}</h3>
                                        <div class="job-copunt">({{number_format(random_int(1000,5660),0)}} việc làm)</div>
                                    </a>
                                </div>

                            @endforeach
                        </div>
                    </div>

                @endforeach -->
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>

