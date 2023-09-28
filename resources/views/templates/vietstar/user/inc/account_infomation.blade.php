<div class="section-head">
    <div class="figure">
        <div class="figure__image" ><img src="https://icons.veryicon.com/png/o/system/alongthink/ico-user-info.png" alt=""></div>
        <div class="figure__caption">
            <h5 class="">{{__('Account Information')}}</h5>
            <div class="status complete" bis_skin_checked="1">
                <p>Hoàn thành</p>
            </div>
        </div>
    </div>
    <div class="right-action" bis_skin_checked="1">
        <div class="right-action__tips" bis_skin_checked="1">
            <i class="bi bi-lightbulb"></i>
            <p>Tips</p>
        </div>
        <div class="right-action__link-edit" ><a href=""><i class="bi bi-pen"></i>Chỉnh sửa</a></div>
        <div class="right-action__link-edit-mobile"><a a href="javascript:;"  onclick=""><i class="bi bi-pen"></i></a></div>
    </div>
</div>


<div class="section-body">
    <!-- <div class="row">
        <div class="col-md-6">
            <div class="formrow {!! APFrmErrHelp::hasError($errors, 'email') !!}">
                <label for="">{{__('Email')}}</label>
                {!! Form::text('email', null, array('class'=>'form-control', 'id'=>'email', 'placeholder'=>__('Email'))) !!}
                {!! APFrmErrHelp::showErrors($errors, 'email') !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="formrow {!! APFrmErrHelp::hasError($errors, 'password') !!}">
                <label for="">{{__('Password')}}</label>
                {!! Form::password('password', array('class'=>'form-control', 'id'=>'password',
                'placeholder'=>__('Password'))) !!}
                {!! APFrmErrHelp::showErrors($errors, 'password') !!}
            </div>
        </div>
    </div> -->
    <div class="table-responsive">
              <table class="table table-responsive table-user-information">
                <tbody>
                  <tr>
                    <td class="table_title">
                      <strong>
                        <i class="bi bi-envelope"></i> {{__('Email')}}
                      </strong>
                    </td>
                    <td class="text-primary table_value">
                        {!! Form::text('email', null, array('class'=>'', 'id'=>'email', 'placeholder'=>__('Email'))) !!}
                        {!! APFrmErrHelp::showErrors($errors, 'email') !!}
                    </td>
                  </tr>
                  <tr>
                     <td  class="table_title">
                      <strong>
                      <i class="bi bi-lock"></i> Password
                      </strong>
                    </td>
                    <td class="text-primary password-box table_value">
                        <input type="password" id="password" value="password">
                        <!-- <i class="toggle-password fa fa-fw fa-eye-slash"></i> -->
                    </td>
                  </tr>
                </tbody>
              </table>
              </div>
</div>


@push('scripts')
<script>
    $(".toggle-password").click(function() {
        $(this).toggleClass("fa-eye fa-eye-slash");
        password = $(this).parent().find("#password");
        if (password.attr("type") == "password") {
            password.attr("type", "text");
        } else {
            password.attr("type", "password");
        }
    });
</script>

@endpush