@push('styles')
<style type="text/css">
    a.uploadImage_btn {
        position: absolute;
        bottom: 3px;
        right: 3px;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 34px;
        height: 34px;
        margin-bottom: 0;
        border-radius: 100%;
        background: #FFFFFF;
        border: 1px solid #d2d6de;
        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
        cursor: pointer;
        font-weight: normal;
        transition: all .2s ease-in-out;
        z-index: 5;
    }

    a.uploadImage_btn i {
        color: #6c7eb7;
        font-size: 20px;
    }
    .cursor-pointer {
        cursor: pointer;
    }

    .cursor-pointer {
        cursor: pointer;
    }
    .text-decoration {
        text-decoration: underline;
    }
</style>
@endpush

@php
  $overviewUser = Auth::user()->getStatusOverview();
@endphp
<div class="section-head">
    <h3 class="title-form">JobViecLam Profile</h3>
</div>

<div class="section-body">
    <div class="row">
        <div class="col-md-6 col-lg-4 d-flex flex-column justify-content-center align-items-center">
            <div class="formrow formrow-photo">
                <div id="thumbnail">
                    <div class="pic img-avatar">
                        <div class="img-avatar__wrapper">
                           
                            @include('flash::message')
                            @if(Auth::user())
                            {{Auth::user()->printUserImage()}}
                            @else
                            <img id="avatar" class="avatar" src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="Avatar">
                            @endif

                            
                        </div>
                        <input type="file" name="image" id="userfileInput" style="display: none;">

                        <a class="uploadImage_btn" href="javascript:void(0);" onclick="$('#userfileInput').click()"><i class="bi bi-camera-fill"></i></a>
                        {!! APFrmErrHelp::showErrors($errors, 'image') !!}
                        {!! APFrmErrHelp::showErrors($errors, 'image') !!}

                      
                    </div>
                   
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-8">
            <div class="user__name d-flex flex-row justify-content-between" bis_skin_checked="1">
                <h4 id="">{{auth()->user()->name}}</h4>
                <a class="cursor-pointer text-decoration text-secondary" data-toggle="modal" data-target="#changepassword"> Đổi mật khẩu<i class="mx-1 bi bi-lock-fill"></i></a>
            </div>
            @if($overviewUser->statusComPlete)
            <div class="status error my-2" bis_skin_checked="1">
                <p>{{$overviewUser->statusComPlete}}</p>
            </div>
            @endif

            <div class="user__infomation" bis_skin_checked="1">
                 <h5 id=""><i class="iconmoon icon-recruiter-location mr-2"></i> {{Auth::user()->getLocation() ? Auth::user()->getLocation() : __('Not update') }}</h5>
                 
            </div>
            <div class="user__infomation" bis_skin_checked="1">
                 <h5 id=""><i class="iconmoon icon-recruiter-phone-call mr-2"></i> {{auth()->user()->phone ? auth()->user()->phone : __('Not update') }}</h5>
            </div>
            <div class="user__infomation" bis_skin_checked="1">
                <h5 id=""><i class="bi bi-envelope text-primary mr-2"></i>  {{ auth()->user()->email ? auth()->user()->email : __('Not update') }}</h5>
            </div>
            @if($overviewUser->degreeComplete)
            <div class="user__complete_section" bis_skin_checked="1">
                <span class="font-weight-bold"> {{__('Level of completion')}}:</span>   <p class="font-weight-bold fs-18px  px-1"> {{$overviewUser->degreeComplete}}</p>
            </div>
            @endif
            @if($overviewUser)
            <div class="py-3">
                <div class="progress">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: {{$overviewUser->percent}}%;" aria-valuenow="{{$overviewUser->percent}}" aria-valuemin="0" aria-valuemax="100">{{$overviewUser->percent}}</div>
                </div>
                
            </div>
            @endif
        </div>
    </div>
</div>




@push('scripts')
<script type="text/javascript">
      function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('.img-avatar img').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
            var formData = new FormData();
            var avatarFile = $('#userfileInput')[0].files[0];
            
           
            if (avatarFile) {
                    formData.append('image', avatarFile);
                 
                    // Simulating an AJAX POST request
                    console.log(formData);
                        $.ajaxSetup({
                        headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                        });
                    $.ajax({
                        url: `{{ route('put.my.updateAvatar') }}`,
                        type: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                     
                        success: function (response) {
                            // Handle success response
                            location.reload();
                        },
                        error: function (xhr, status, error) {
                            // Handle error
                            console.error('Error uploading avatar:', error);
                        }
                    });
                } else {
                    alert('Please select an image before uploading.');
                }

        }
    }

    $('#userfileInput').change(function() {
        readURL(this);
    });
</script>
@endpush