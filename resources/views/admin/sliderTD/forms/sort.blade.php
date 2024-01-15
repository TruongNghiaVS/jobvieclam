{!! APFrmErrHelp::showErrorsNotice($errors) !!}
@include('flash::message')
<div class="form-body">
    <h3>Drag and Drop to Sort Sliders</h3>
    {!! Form::select('lang', ['' => __('Select')]+$languages, config('default_lang'), array('class'=>'form-control', 'id'=>'lang', 'onchange'=>'refreshSliderSortData();')) !!}
    <div id="sliderTDSortDataDiv"></div>
</div>
@push('scripts') 
<script>
    $(document).ready(function () {
        refreshSliderSortData();
    });
    function refreshSliderSortData() {
        var language = $('#lang').val();
        $.ajax({
            type: "GET",
            url: "{{ route('sliderTD.sort.data') }}",
            data: {lang: language},
            success: function (responseData) {
                $("#sliderTDSortDataDiv").html('');
                $("#sliderTDSortDataDiv").html(responseData);
                /**************************/
                $('#sortable').sortable({
                    update: function (event, ui) {
                        var sliderOrder = $(this).sortable('toArray').toString();
                        $.post("{{ route('sliderTD.sort.update') }}", {sliderOrder: sliderOrder, _method: 'PUT', _token: '{{ csrf_token() }}'})
                    }
                });
                $("#sortable").disableSelection();
                /***************************/
            }
        });
    }
</script> 
@endpush
