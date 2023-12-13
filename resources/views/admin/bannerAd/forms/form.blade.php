{!! APFrmErrHelp::showErrorsNotice($errors) !!}
<div class="form-body">	
    <div class="form-group">
        <label for="imglabel">Label</label>
        <input class="form-control" name="label" type="text" id="imglabel" placeholder="label" aria-label="default input example">
    </div>
    <div class="form-group">
    <label for="linkDesktop">Link Desktop</label>
    <input type="file"  name="linkDesktop" class="form-control-file" id="linkDesktop" require>
    </div>

    <div class="form-group">
        <label for="linkMobile">Link Mobile</label>
        <input type="file"  name="linkMobile" class="form-control-file" id="linkMobile" require>
    </div>

    <div class="form-group">
    <label for="linkMobile">Vị Trí</label>
        <select class="form-control form-control-lg">
            <option value="1">Vị trí thứ nhất</option>
            <option></option>
            <option></option>
            <option></option>
        </select>
    </div>
</div>