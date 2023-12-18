<div class="form-body">
<div class="form-group">
                <label for="linkDesktop">Link Desktop</label>
                <input type="file" name="linkDesktop" class="form-control" id="linkDesktop" accept="image/*" required>
                <img id="desktopPreview" src="#" alt="Desktop Image" style="display: none; max-width: 100%;">
                <div class="error" id="linkDesktopError"></div>
            </div>

            <div class="form-group">
                <label for="linkMobile">Link Mobile</label>
                <input type="file" name="linkMobile" class="form-control" id="linkMobile" accept="image/*" required>
                <img id="mobilePreview" src="#" alt="Mobile Image" style="display: none; max-width: 100%;">
                <div class="error" id="linkMobileError"></div>
            </div>

    <div class="form-group">
        <label for="position">Vị Trí</label>
        <select class="form-control" name="position" id="position" required>
            <option value="">Select Position</option>
            <option value="1">Vị trí thứ nhất</option>
            <option value="2.1">Vị trí 2.1</option>
            <option value="2.2">Vị trí 2.2</option>
            <option value="2.3">Vị trí 2.3</option>
            <option value="2.4">Vị trí 2.4</option>

            <!-- Add other options -->
        </select>
        <div class="error" id="positionError"></div>
    </div>

    <div class="form-group">
        <label for="status">Trạng Thái</label>
        <select class="form-control" name="status" id="status" required>
            <option value="">Select Status</option>
            <option value="1">Hoạt động</option>
            <option value="0">Không hoạt động</option>
            <!-- Add other options -->
        </select>
        <div class="error" id="statusError"></div>
    </div>
</div>

<div class="form-actions">
    <button class="btn btn-large btn-primary" type="submit">Cập nhật</button>
</div>