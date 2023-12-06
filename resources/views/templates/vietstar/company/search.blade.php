@extends('templates.vietstar.layouts.app')
@php

@endphp
@section('content')
<!-- Header start -->

@include('templates.vietstar.includes.header')
<!-- Header end -->

<!-- Dashboard menu start -->
@include('templates.vietstar.includes.mobile_dashboard_menu')
<!-- Dashboard menu end -->




<div class="company-wrapper company-list-wrapper">
    <div class="container company-list-container">
    <form method ="get" action="/companies">
         <div id="topcompanyhead" class="topcompanyhead">
            <h3>Tìm kiếm thông tin công ty để jobvieclam kết nối bạn với những <br> cơ hội việc làm phù hợp nhất.</h3>
       
            <div class="topcompanyhead__search row">
                <div class="search-company col-6">

                    <div class="d-flex flex-row search__box">
                        <input type="search" class="" id="keyword" name="keyword" placeholder="{{__('Skills or Job Titles')}}"
                         value ="{{$keyword}}"
                        autocomplete="off">
                    </div>

                </div>
                <div class="col-6">
                        <button class="btn btn-primary" type="submit">
                            Tìm kiếm
                        </button>
                </div>
            </div>

        </div>
</form>

        <div id="bottomcompanycontent" class="bottomcompanycontent">
            <div class="bottomcompanyconten__head">
                @if( $companies->total() > 0 )
                <h6>Tìm thấy <span>{{$companies->total() }}</span> công ty phù hợp với yêu cầu của bạn</h6>
                @else 
                <h6>hông tìm thấy thông tin công ty phù hợp với yêu cầu của bạn. Dưới đây là các công ty nổi bật có thể bạn sẽ quan tâm.</h6>
                @endif
                
              
                <!-- <div class="filter-company">
                    <div class="form-group form-select-chosen" id="functional_area_dd">
                        <select class="form-control form-select" name="functional_area_id" id="functional_area">
                            <option value="">Chọn phòng ban</option>
                            <option value="Nhân sự">Nhân sự</option>
                            <option value="Hành chính">Hành chính</option>
                            <option value="Kế toán">Kế toán</option>
                        </select>
                    </div>
                </div> -->
            </div>

            @if($companies)
            <div class="list-company hideContent">

                @foreach($companies as $company)
                <div emId="{{$company->id}}" class="company-item-wrapper shadow-sm">
                    <div class="company-item-header">
                        <div class="company-items__background">
                            <img class="background-img" src="https://www.vietnamworks.com/_next/image?url=https%3A%2F%2Fimages02.vietnamworks.com%2Fcompanyprofile%2Fnull%2Fen%2FB%C3%ACa_%C4%91%E1%BA%A7u_trang_-_Coverc.jpg&w=1920&q=75" alt="">
                        </div>
                        <a class="company-items__logo shadow" href="#">
                            {{$company->printCompanyImage()}}
                        </a>
                        <!-- <div class="company-items__follower">
                            <span><i class="bi bi-people-fill"></i> 176 lượt theo dõi</span>
                        </div> -->
                    </div>

                    <div class="company-items__desc">
                        <div class="company-items__name">
                            <a href="{{route('company.detail',$company->slug)}}" title="{{$company->name}}">
                                <h3>
                                    {{$company->name}} 
                                </h3>
                            </a>
                        </div>
                        
                        <div class ="company-items__shortDes">
                           {{$company->description}}
                        </div>
                     
                           
                        @if($company->companyOverview)
                        <div class="company-items__category">
                            <i class="bi bi-archive"></i>
                            <span>
                            Đang tuyển {{$company->companyOverview->openning}}  vị trí
                            </span>
                        </div>
                        
                        @endif
                           

                     

                    </div>

                    <div class="company-items__bottom">
                  
                        @if(Auth::check() && Auth::user()->isFavouriteCompany($company->slug))
                        <a class="btn btn-primary" href="{{ route('remove.from.favourite.company', ['company_slug' => $company->slug]) }}"><i class="fas fa-heart text-white px-1"></i> Đã theo dõi</a>
                        @elseif(Auth::check() && !Auth::user()->isFavouriteCompany($company->slug))
                        <a class="btn btn-outline-primary" href="{{ route('add.to.favourite.company', ['company_slug' => $company->slug]) }}"><i class="fas fa-heart px-1"></i>Theo dõi</a>
                        
                        @else
                        <a class="btn btn-outline-primary" href="#" data-toggle="modal" data-target="#user_login_Modal"><i class="far fa-heart px-1"></i> Theo dõi</a>
                        @endif
                    </div>

                </div>
                @endforeach

            </div>
            
            {!! $companies->links() !!}
            
            @endif

          
        
        </div>

    </div>
</div>

@include('templates.vietstar.includes.footer')
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
<script type="text/javascript">


   
 
</script>
@endpush