<div class="user-account">
    <div class="formpanel mt0">

        <div class="row">
            <div class="col-md-12">
                <form class="form form-user-profile" id="add_edit_profile_summary" method="POST" action="{{ route('update.front.profile.summary', [$user->id]) }}">
                    <h5 class="title-form">{{__('Personal Profile')}}</h5>
                    {{ csrf_field() }}
                    <div class="form-body">
                        <div id="success_msg"></div>
                        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'summary') !!}">
                            <textarea name="summary" class="form-control" id="summary" placeholder="{{__('Profile Summary')}}">{{ old('summary', $user->getProfileSummary('summary')) }}</textarea>
                            <span class="help-block summary-error"></span>
                        </div>
                        <button type="button" class="btn btn-primary btn-save-profile" onClick="submitProfileSummaryForm();">{{__('Update Summary')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script type="text/javascript">
    function submitProfileSummaryForm() {
        var form = $('#add_edit_profile_summary');
        $.ajax({
            url: form.attr('action'),
            type: form.attr('method'),
            data: form.serialize(),
            dataType: 'json',
            success: function(json) {
                $("#success_msg").html("<span class='text text-success'>{{__('Cập nhật thành công')}}</span>");
            },
            error: function(json) {
                if (json.status === 422) {
                    var resJSON = json.responseJSON;
                    $('.help-block').html('');
                    $.each(resJSON.errors, function(key, value) {
                        $('.' + key + '-error').html('<strong>' + value + '</strong>');
                        $('#div_' + key).addClass('has-error');
                    });
                } else {
                    // Error
                    // Incorrect credentials
                    // alert('Incorrect credentials. Please try again.')
                }
            }
        });
    }
</script>
@endpush