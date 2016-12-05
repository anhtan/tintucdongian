<div class="form-group">
    <label>Tên thành viên</label>
    <p class="help-block"><?php echo $info_all[0]['users_name']; ?></p>
</div>
<div class="form-group">
    <label>Mật khẩu</label>
    <p class="help-block"><?php echo $info_all[0]['users_hint']; ?></p>
</div>
<div class="form-group">
    <label>Tên đầy đủ</label>
    <p class="help-block"><?php echo $info_all[0]['users_fullname']; ?></p>
</div>
<div class="form-group">
    <label>Thư điện tử</label>
    <p class="help-block"><?php echo $info_all[0]['users_email']; ?></p>
</div>
<div class="form-group">
    <label>Địa chỉ</label>
    <p class="help-block"><?php echo $info_all[0]['users_address']; ?></p>
</div>
<div class="form-group">
    <label>Quyền hạn</label>
    <p class="help-block"><?php echo $info_all[0]['users_group_name']; ?></p>
</div>
<div class="form-group">
    <label>Trạng thái</label>
    <?php if($info_all[0]['users_active'] == 1): ?>
        <p class="help-block"><?php echo "Hiện"; ?></p>
    <?php else: ?>
        <p class="help-block"><?php echo "Ẩn"; ?></p>
    <?php endif; ?>
</div>

