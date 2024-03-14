@extends('templates.vietstar.layouts.app')
@section('content')
<!-- Header start -->

@include('templates.vietstar.includes.header')
<!-- Header end -->

<!-- Dashboard menu start -->
@include('templates.vietstar.includes.mobile_dashboard_menu')
<!-- Dashboard menu end -->




<div class="company-wrapper company-list-wrapper">
    <div class="container company-list-container">
        
    <form method ="get" action="/cong-ty">
        <div id="topcompanyhead" class="topcompanyhead">
            <h1>Khám phá 1.000+ công ty nổi bật</h1>
            <p style="margin-bottom:10px;">Tìm hiểu văn hoá công ty và chọn cho bạn nơi làm việc phù hợp nhất.</p>
            <div class="topcompanyhead__search row g-0">
                <div class="search-company col-lg-6 col-md-6 col-sm-12">

                    <div class="d-flex flex-row search__box">
                        <input type="search" class="" id="keyword" name="keyword" placeholder="{{__('Skills or Job Titles')}}" autocomplete="off">
                    </div>

                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                        <button class="btn btn-primary" id="btn-search-cp" type="submit">
                            Tìm Kiếm
                        </button>
                </div>
            </div>
        </div>
        </form>
        <div id="bottomcompanycontent" class="bottomcompanycontent">
            <div class="bottomcompanyconten__head">
                <h2>DANH SÁCH CÁC CÔNG TY NỔI BẬT</h2>

               
            </div>

            @if($companies)
            <div class="list-company hideContent">

         
                @foreach($companies  as $company)
               
                <div emId="{{$company->id}}" class="company-item-wrapper shadow-sm">
                    <div class="company-item-header">
                        <div class="company-items__background">
                            <!-- <img class="background-img" src="https://www.vietnamworks.com/_next/image?url=https%3A%2F%2Fimages02.vietnamworks.com%2Fcompanyprofile%2Fnull%2Fen%2FB%C3%ACa_%C4%91%E1%BA%A7u_trang_-_Coverc.jpg&w=1920&q=75" alt="">
                             -->
                            {{$company->printCompanyCoverImage()}}
                        </div>
                        <a class="company-items__logo shadow" href="{{route('company.detail',$company->slug)}}">
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
                           {!! $company->description !!}
                        </div>
                        

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
            @endif
            <!-- <div class="show-more">
                <button class="btn btn-secondary show-more-btn ">Xem Thêm</button>
            </div> -->
            <div class="d-flex justify-content-center align-items-center">

                {{ $companies->links() }}
            </div>
            
        </div>

    </div>
</div>

@include('templates.vietstar.includes.footer')
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".show-more-btn").on("click", function() {
      
            var id =   $(".company-item-wrapper:last-child").attr("emId")
            var html  =  '';
            $.ajax({
            url: `{{url('/')}}/companies/getData/?id=${id}`, // Replace with your API endpoint
            type: 'GET',
            dataType: 'json',
            success: function(data) {
          
                // Process the data
              
               html  = data.map(element => {
                    return `
                    
                    <div emId="${element.id}" class="company-item-wrapper shadow-sm">
                    <div class="company-item-header">
                        <div class="company-items__background">
                            <img class="background-img" src="https://www.vietnamworks.com/_next/image?url=https%3A%2F%2Fimages02.vietnamworks.com%2Fcompanyprofile%2Fnull%2Fen%2FB%C3%ACa_%C4%91%E1%BA%A7u_trang_-_Coverc.jpg&w=1920&q=75" alt="">
                        </div>

                        <a class="company-items__logo shadow" href="#">
                            <img src="${element.logo ? `{{url('/')}}/company_logos/${element.logo}` : `{{url('/')}}/admin_assets/no-image.png` }" alt="">
                        </a>
                      
                        <!-- <div class="company-items__follower">
                            <span><i class="bi bi-people-fill"></i> 176 lượt theo dõi</span>
                        </div> -->
                    </div>

                    <div class="company-items__desc">
                        <div class="company-items__name">
                            <a href="" title="${element.name}">
                                <h3>
                                    ${element.name}
                                </h3>
                            </a>
                        </div>
                        <div class="company-items__category">
                            <i class="bi bi-folder2"></i>
                            <span>
                                Hàng tiêu dùng
                            </span>

                        </div>
                        <div class="company-items__category">

                            <i class="bi bi-archive"></i>
                            <span>
                                5 Việc làm
                            </span>

                        </div>

                    </div>

                    <div class="company-items__bottom">
                       @if(isset( $company) == true)
                        
                                @if(Auth::check() && Auth::user()->isFavouriteCompany($company->slug))
                                <a class="btn btn-outline-primary" href="{{ route('remove.from.favourite.company', ['company_slug' => $company->slug]) }}"><i class="fas fa-heart iconoutline"></i> Đã theo dõi</a>
                                @else
                                <a class="btn btn-outline-primary" href="{{ route('add.to.favourite.company', ['company_slug' => $company->slug]) }}"><i class="fa-regular fa-heart"></i> Theo dõi</a>
                                @endif

                      @endif
                    </div>

                </div>
                    
                    `
               });
               
               $(".list-company.hideContent").append(html.join(" "))
              
               if($(".company-item-wrapper:last-child").attr("emId") == 1 ){
                    $(".show-more-btn").addClass("hide")
               }
            },
            error: function(xhr, status, error) {
                // Handle errors
                console.error('Error:', error);
            }
        });
        });
    });



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
                      
                        $('#send-company-message-form').hide('slow');
                        $(document).scrollTo('.alert', 2000);
                    } else {
                        var errorString = '<div class="alert alert-danger" role="alert"><ul>';
                        response = JSON.parse(data);
                        $.each(response, function(index, value) {
                            errorString += '<li>' + value + '</li>';
                        });
                        errorString += '</ul></div>';
               
                        $(document).scrollTo('.alert', 2000);
                    }
                },
            });
        });
    });

 
</script>
@endpush