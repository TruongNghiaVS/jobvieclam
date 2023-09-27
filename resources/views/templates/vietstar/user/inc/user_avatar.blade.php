<div class="row">
    <div class="col-md-6 col-lg-4">
        <div class="formrow formrow-photo">
            <label>{{__('Profile Image')}}</label>
            <div id="thumbnail">
                <div class="pic img-avata">
                    {{ ImgUploader::print_image("user_images/$user->image") }}
                </div>
            </div>
        </div>
        <div class="formrow">
            <label class="btn btn-default"> {{__('Select Profile Image')}}
                <input type="file" name="image" id="image" style="display: none;">
            </label>
            {!! APFrmErrHelp::showErrors($errors, 'image') !!}
            {!! APFrmErrHelp::showErrors($errors, 'image') !!}
        </div>
    </div>
    <div class="col-md-6 col-lg-8">
        <div class="formrow formrow-photo">
            <label>{{__('Cover Photo')}}</label>
            <div id="thumbnail_cover_image">
                <div class="pic img-cover-photo">
                    {{ ImgUploader::print_image("user_images/$user->cover_image") }}
                </div>
            </div>
        </div>
        <div class="formrow">
            <label class="btn btn-default"> {{__('Select Cover Photo')}}
                <input type="file" name="cover_image" id="cover_image" style="display: none;">
            </label>
            {!! APFrmErrHelp::showErrors($errors, 'cover_image') !!}
        </div>
    </div>
</div>