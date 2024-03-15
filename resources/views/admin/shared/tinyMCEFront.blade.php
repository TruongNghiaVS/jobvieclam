<script src="{{ asset('admin_assets/global/plugins/tinymce/js/tinymce/jquery.tinymce.min.js') }}"></script>
<script src="{{ asset('admin_assets/global/plugins/tinymce/js/tinymce/tinymce.min.js') }}"></script>
<script>
tinymce.init({
    selector: '#description',
    height: 300,
    entity_encoding : "raw",
    forced_root_block: '',
    convert_urls: false,
    plugins: [
        'advlist autolink lists image',
        'searchreplace visualblocks code fullscreen',
        'media table contextmenu paste code',
        'toc',
    ],
    toolbar: 'insertfile undo redo | styleselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | image | toc ',
    toc_depth: 3,
    relative_urls: true,
    images_upload_url: "{{ route('tinymce.image_upload.front') }}",
    images_upload_handler: function (blobInfo, success, failure) {
        var xhr, formData;
        xhr = new XMLHttpRequest();
        xhr.withCredentials = false;
        xhr.open('POST', "{{ route('tinymce.image_upload.front') }}");
        xhr.onload = function () {
            var json;
            if (xhr.status != 200) {
                failure('HTTP Error: ' + xhr.status);
                return;
            }
            json = JSON.parse(xhr.responseText);
            if (!json || typeof json.location != 'string') {
                failure('Invalid JSON: ' + xhr.responseText);
                return;
            }
            success(json.location);
        };
        formData = new FormData();
        formData.append('image', blobInfo.blob(), blobInfo.filename());
        xhr.send(formData);
    },
});
tinymce.init({
    selector: '#benefits',
    height: 150,
    entity_encoding : "raw",
    forced_root_block: '',
    plugins: [
        'advlist autolink lists image',
        'searchreplace visualblocks code fullscreen',
        'media table contextmenu paste code'
    ],
    toolbar: 'insertfile undo redo | styleselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | image',
    relative_urls: true,
    images_upload_url: "{{ route('tinymce.image_upload.front') }}",
    images_upload_handler: function (blobInfo, success, failure) {
        var xhr, formData;
        xhr = new XMLHttpRequest();
        xhr.withCredentials = false;
        xhr.open('POST', "{{ route('tinymce.image_upload.front') }}");
        xhr.onload = function () {
            var json;
            if (xhr.status != 200) {
                failure('HTTP Error: ' + xhr.status);
                return;
            }
            json = JSON.parse(xhr.responseText);
            if (!json || typeof json.location != 'string') {
                failure('Invalid JSON: ' + xhr.responseText);
                return;
            }
            success(json.location);
        };
        formData = new FormData();
        formData.append('image', blobInfo.blob(), blobInfo.filename());
        xhr.send(formData);
    },
});
</script>

@push('styles')
<style>
    /* Example styles for TOC list */

</style>
@endpush


