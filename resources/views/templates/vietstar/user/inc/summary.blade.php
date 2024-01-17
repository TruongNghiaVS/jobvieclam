<div class="section-head">
    <div class="section-head__figure">
        <div class="figure__image"><img src="https://cdn-icons-png.flaticon.com/512/3862/3862929.png" alt=""></div>
        <div class="figure__caption">
            <h5 class="">{{__('Describe yourself')}}</h5>
                @if($user->isCompleteIntroduction)
                    <div class="status complete" bis_skin_checked="1">
                        <p>Hoàn thành</p>
                    </div>
                @else
                    <div class="status complete" bis_skin_checked="1">
                        <p>Chưa hoàn thành</p>
                    </div>
                @endif
        </div>
    </div>
    <div class="section-head__right-action" bis_skin_checked="1">
        <div class="right-action__tips" bis_skin_checked="1">
            <i class="bi bi-lightbulb"></i>
            <p>Tips</p>
        </div>
        <div class="right-action__link-edit"><a data-toggle="modal" data-target="#summary-modal"><i class="bi bi-pen"></i>Chỉnh sửa</a></div>
        <div class="right-action__link-edit-mobile"><a data-toggle="modal" data-target="#summary-modal"><i class="bi bi-pen"></i></a></div>

    </div>
</div>

<div class="section-body">
    <div id="success_msg"></div>
    <div>{{ $user->getProfileSummary('summary') }}</div>
    {{--<div class="row">
        <div class="col-md-12">
            <form class="form form-user-profile" id="add_edit_profile_summary" method="POST" action="{{ route('update.front.profile.summary', [$user->id]) }}">
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
    </div> --}}
</div>



<div class="modal fade" id="summary-modal" tabindex="-1" role="dialog" aria-labelledby="summary-modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="summary-modalLabel">{{__('Describe yourself')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form class="form form-user-profile" id="add_edit_profile_summary" method="POST" action="{{ route('update.front.profile.summary', [$user->id]) }}">
                            {{ csrf_field() }}
                            <div class="form-body">
                                <div class="form-group {!! APFrmErrHelp::hasError($errors, 'summary') !!}">
                                   <textarea name="summary" class="form-control" id="summary" placeholder="{{__('Profile Summary')}}">{{ old('summary', $user->getProfileSummary('summary')) }}</textarea>
                                     <span class="help-block summary-error"></span>
                                </div>
                                <!-- <div class="form-group {!! APFrmErrHelp::hasError($errors, 'summary') !!}">
                                   <textarea name="summary" class="form-control" id="summary" placeholder="{{__('Profile Summary')}}">{{ old('summary', $user->getProfileSummary('summary')) }}</textarea>
                                     <pan class="help-block summary-error"></span>
                                </div> -->
                            </div>
                            <div class="form-group">
                                <button id="sumary_submitBtn" type="submit" class="btn btn-primary submit-button" onClick="submitProfileSummaryForm();">{{__('Update Summary')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





@push('scripts')
<script type="text/javascript">

    $( document ).ready(function() {
        $('#sumary_submitBtn').prop('disabled', true);

        // Check TinyMCE content on input change
        tinymce.get('summary').on('input', function () {
            
            var isEditorValid = tinymce.get('summary').getContent().trim().length > 0;
            console.log(isEditorValid);
            // Enable or disable the submit button based on the editor content validity
            $('#sumary_submitBtn').prop('disabled', !isEditorValid);
        });
    });
    function submitProfileSummaryForm() {
        var form = $('#add_edit_profile_summary');
        showSpinner();
        $.ajax({
            url: form.attr('action'),
            type: form.attr('method'),
            data: form.serialize(),
            dataType: 'json',
            beforeSend:   showSpinner(),
            statusCode: {
                202 :  function(responseObject, textStatus, jqXHR) {
                    console.log(responseObject.error);
        
                },
                401: function(responseObject, textStatus, jqXHR) {
                    // No content found (404)
                    console.log(responseObject.responseJSON);

                    // This code will be executed if the server returns a 404 response
                },
                503: function(responseObject, textStatus, errorThrown) {
                    // Service Unavailable (503)
                    console.log(responseObject.error);

                    // This code will be executed if the server returns a 503 response
                }           
                }
                })
                .done(function(data){
                    
                    hideSpinner();
                  
                    
                    if (data.sucess) {
                    $('#summary-modal').modal("hide");
                    showModal_Success('Thông báo', `Cập nhật mô tả bản thân thành công`, ``);
                    setTimeout(function(){
                          window.location.reload();
                    }, 3000);
                }

                    // $("#success_msg").html("<span class='text text-primary'>{{__('Cập nhật thành công')}}</span>");
              
                    
                 
                })
                .fail(function(jqXHR, textStatus){
                    hideSpinner();
                })
                .always(function(jqXHR, textStatus) {
                
                })
        }

            
          
</script>
@endpush