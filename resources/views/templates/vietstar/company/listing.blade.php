@extends('templates.vietstar.layouts.app')
@section('content')
<!-- Header start -->
@include('templates.vietstar.includes.header')
<!-- Header end -->
<!-- Inner Page Title start -->
@include('templates.vietstar.includes.inner_page_title', ['page_title'=>__('Tất cả các công ty')])
<!-- Inner Page Title end -->
<form id="job_filter" method="GET" action="{{route('company.listing')}}">

    <div class="page-heading-tool">
        <div class="container">
            <div class="tool-wrapper">
                <div class="close-input-filter"><em class="lnr lnr-cross"></em></div>
                <div class="search-job search-company-full-size">
                    <div class="form-horizontal">
                        <div class="form-wrap">
                            <div class="form-group form-keyword">
                                <input type="search" class="keyword form-control" id="search" name="search" placeholder="{{__('Select city, company name...')}}" autocomplete="off">
                            </div>
                            <div class="form-group form-select-chosen" id="industry_id_dd">
                                {{ Form::select('industry_id', $industries, null, ['class'=>'form-control form-select shadow-sm chosen', 'id'=>'industry_id', 'placeholder'=>__('Select Industry')]) }}
                            </div>
                            <div class="form-group form-select-chosen" id="city_dd">
                                {{Form::select('city_id', $cities, null, ['id' => 'city_id', 'class' => 'form-control form-select shadow-sm chosen', 'placeholder' => __('Select City')]) }}
                            </div>
                            <div class="form-group form-submit">
                                <button class="btn-gradient" type="submit">
                                    <i class="far fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</form>

<div class="listpgWraper">
    <div class="container">
        <div class="row compnaieslist">
            <div class="col-lg-9 col-sm-12">
                @if($companies)
                <div class="searchList jobs-side-list">
                    @foreach($companies as $company)

                    <div class="item-job mb-3">
                        <div class="logo-company">
                            <a href="{{route('company.detail',$company->slug)}}" title="{{$company->name}}" class="pic">
                                {{$company->printCompanyImage()}}
                            </a>
                        </div>
                        <div class="jobinfo">
                            <div class="info">
                                <h3 class="job-title"><a href="{{route('company.detail',$company->slug)}}" title="{{$company->name}}">{{$company->name}}</a></h3>
                                <div class="box-meta">
                                    <i class="far fa-map-marker-alt"></i> {{__('Street Address')}}:
                                    {{$company->location}}
                                </div>
                                <div class="box-meta">
                                    <i class="fas fa-globe"></i> Website: {{$company->website}}
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="box-meta">
                                            <i class="far fa-envelope"></i> Email: {{$company->email}}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="box-meta">
                                            <i class="far icon-recruiter-phone-call"></i> {{__('Mobile Number')}}:
                                            {{$company->phone}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if(Auth::check() && Auth::user()->isFavouriteCompany($company->slug))
                            <a class="save-company-favorite" href="{{ route('remove.from.favourite.company', ['company_slug' => $company->slug]) }}"><i class="fas fa-heart iconoutline"></i></a>
                            @else
                            <a class="save-company-favorite" href="{{ route('add.to.favourite.company', ['company_slug' => $company->slug]) }}"><i class="far fa-heart"></i></a>
                            @endif

                        </div>

                    </div>
                    @endforeach
                </div>
                @endif
                <div class="pagiWrap">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="showreslt">
                                {{__('Hiển thị các trang')}} : {{ $companies->firstItem() }} -
                                {{ $companies->lastItem() }}
                                {{__('Total')}} {{ $companies->total() }}
                            </div>
                        </div>
                        <div class="col-md-7 text-right">
                            @if(isset($companies) && count($companies))
                            {{ $companies->appends(request()->query())->links() }}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 pull-right">
                <!-- Sponsord By -->
                <div class="sidebar">
                    <h4 class="widget-title">{{__('Sponsord By')}}</h4>
                    <div class="gad">{!! $siteSetting->listing_page_vertical_ad !!}</div>
                </div>
            </div>
        </div>


    </div>
</div>

@include('templates.vietstar.includes.footer')
@endsection
@push('styles')
<style type="text/css">
    .formrow iframe {
        height: 78px;
    }

    i.fas.fa-heart.iconoutline {
        font-size: 24px;
        color: #981b1d;
    }
</style>
@endpush
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // js chosen dropdown select
        $(".chosen").chosen();
        $(document).on('click', '#send_company_message', function() {
            var postData = $('#send-company-message-form').serialize();
            $.ajax({
                type: 'POST',
                url: "{{ route('contact.company.message.send') }}",
                data: postData,
                //dataType: 'json',
                success: function(data) {
                    response = JSON.parse(data);
                    var res = response.success;
                    if (res == 'success') {
                        var errorString = '<div role="alert" class="alert alert-success">' +
                            response.message + '</div>';
                        $('#alert_messages').html(errorString);
                        $('#send-company-message-form').hide('slow');
                        $(document).scrollTo('.alert', 2000);
                    } else {
                        var errorString = '<div class="alert alert-danger" role="alert"><ul>';
                        response = JSON.parse(data);
                        $.each(response, function(index, value) {
                            errorString += '<li>' + value + '</li>';
                        });
                        errorString += '</ul></div>';
                        $('#alert_messages').html(errorString);
                        $(document).scrollTo('.alert', 2000);
                    }
                },
            });
        });
    });
</script>
@endpush