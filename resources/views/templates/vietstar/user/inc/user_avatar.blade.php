<div class="section-head">
    <h3 class="title-form">JobViecLam Profile</h3>
</div>

<div class="section-body">
    <div class="row">
        <div class="col-md-6 col-lg-4 d-flex flex-column justify-content-center align-items-center">
            <div class="formrow formrow-photo">
                <div id="thumbnail">
                    <div class="pic img-avata">
                        <!-- {{ ImgUploader::print_image("user_images/$user->image") }} -->
                        @if(Auth::user())
                        {{Auth::user()->printUserImage()}}
                        @else 
                        <img id="avatar" class="avatar" src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="Avatar">
                        @endif
                    </div>
                </div>
            </div>
            <div class="formrow">
                <label class="">
                <input type="file" name="image" id="fileInput" style="display: none;">
                    <i class="bi bi-upload"></i>
                <a href="javascript:void(0);" onclick="$('#fileInput').click()"><span>{{__('Select Profile Image')}}</span></a>
                </label>
                <label class=""> 
                    <i class="bi bi-x"></i>
                    <a href="javascript:void(0);" onclick="removeAvatar()"  id="remove-image"><span>xóa hình ảnh</span></a>
                </label>
                {!! APFrmErrHelp::showErrors($errors, 'image') !!}
                {!! APFrmErrHelp::showErrors($errors, 'image') !!}
            </div>
        </div>

        <div class="col-md-6 col-lg-8">
            <div class="user__name" bis_skin_checked="1">
                <h4 id="">{{auth()->user()->name}}</h4>
            </div>

            <div class="user__infomation" bis_skin_checked="1">
                <h5 id="">Freelandcer</h5>
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
                reader.onload = function (e) {
                    $('#avatar').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $('#fileInput').change(function(){
            readURL(this);
        });

        function removeAvatar() {
            $('#avatar').attr('src', 'https://cdn-icons-png.flaticon.com/512/149/149071.png');
            $('#fileInput').val('');
        }
</script>
@endpush


