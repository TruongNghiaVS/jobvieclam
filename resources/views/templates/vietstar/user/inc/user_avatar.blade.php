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
</style>
@endpush

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
            <div class="user__name" bis_skin_checked="1">
                <h4 id="">{{auth()->user()->name}}</h4>
            </div>

            <div class="user__infomation" bis_skin_checked="1">
                <h5 id="">{{Auth::user()->getLocation() ? Auth::user()->getLocation() : __('Not update') }}</h5>
            </div>
            <div class="user__infomation" bis_skin_checked="1">
                <h5 id="">{{auth()->user()->phone ? auth()->user()->phone : __('Not update') }}</h5>
            </div>
            <div class="user__infomation" bis_skin_checked="1">
                <h5 id="">{{ auth()->user()->email ? auth()->user()->email : __('Not update') }}</h5>
            </div>

            <div class="user__complete_section" bis_skin_checked="1">
                
            </div>
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