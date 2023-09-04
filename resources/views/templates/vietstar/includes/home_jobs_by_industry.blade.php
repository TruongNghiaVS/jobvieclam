
<section class="section-jobs-by-industry">
    <div class="container">
        <h2 class="section-title text-center mb-3 text-primary">Việc làm theo ngành nghề</h2>
        <div class="swiper alljobs_swiper">
            <div class="swiper-wrapper">
                @foreach(collect($industries)->chunk(8) as $chunk)
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

                @endforeach
            </div>
            <div class="swiper-pagination"></div>
        </div>
        {{--<div class="row">
            <div class="col-12 col-xs-6 col-md-4 col-lg-3">
                <a class="job-industry" href="#">
                    <div class="icon">
                        <span class="iconmoon icon-recruiter-suitcase"></span>
                    </div>
                    <h3 class="title-job">Tài chính</h3>
                    <div class="job-copunt">(3,209 việc làm)</div>
                </a>
            </div>
            <div class="col-12 col-xs-6 col-md-4 col-lg-3">
                <a class="job-industry" href="#">
                    <div class="icon">
                        <span class="iconmoon icon-office-building-icon"></span>
                    </div>
                    <h3 class="title-job">Bất động sản</h3>
                    <div class="job-copunt">(3,209 việc làm)</div>
                </a>
            </div>
            <div class="col-12 col-xs-6 col-md-4 col-lg-3">
                <a class="job-industry" href="#">
                    <div class="icon">
                        <span class="iconmoon icon-money-database"></span>
                    </div>
                    <h3 class="title-job">Việc làm lương cao</h3>
                    <div class="job-copunt">(3,209 việc làm)</div>
                </a>
            </div>
            <div class="col-12 col-xs-6 col-md-4 col-lg-3">
                <a class="job-industry" href="#">
                    <div class="icon">
                        <span class="iconmoon icon-recruiter-suitcase"></span>
                    </div>
                    <h3 class="title-job">Việc làm IT</h3>
                    <div class="job-copunt">(3,209 việc làm)</div>
                </a>
            </div>
            <div class="col-12 col-xs-6 col-md-4 col-lg-3">
                <a class="job-industry" href="#">
                    <div class="icon">
                        <span class="iconmoon icon-team-icon"></span>
                    </div>
                    <h3 class="title-job">Tuyển thực tập sinh</h3>
                    <div class="job-copunt">(3,209 việc làm)</div>
                </a>
            </div>
            <div class="col-12 col-xs-6 col-md-4 col-lg-3">
                <a class="job-industry" href="#">
                    <div class="icon">
                        <span class="iconmoon fa fa-hourglass-half"></span>
                    </div>
                    <h3 class="title-job">Việc làm bán thời gian</h3>
                    <div class="job-copunt">(3,209 việc làm)</div>
                </a>
            </div>
            <div class="col-12 col-xs-6 col-md-4 col-lg-3">
                <a class="job-industry" href="#">
                    <div class="icon">
                        <span class="iconmoon fas fa-newspaper"></span>
                    </div>
                    <h3 class="title-job">việc làm mới</h3>
                    <div class="job-copunt">(3,209 việc làm)</div>
                </a>
            </div>
        </div>--}}
    </div>
</section>

