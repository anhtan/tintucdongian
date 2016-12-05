<div class="form-group">
    <label>Tên menu</label>
    <p class="help-block"><?php echo $info_all[0]['menu_client_name']; ?></p>
</div>
<div class="form-group">
    <label>Bí danh</label>
    <p class="help-block"><?php echo $info_all[0]['menu_client_alias']; ?></p>
</div>
<div class="form-group">
    <label>Đường dẫn</label>
    <p class="help-block"><?php echo $info_all[0]['menu_client_path']; ?></p>
</div>
<div class="form-group">
    <label>Menu cha</label>
    <p class="help-block"><?php echo $info_all[0]['menu_client_parent']; ?></p>
</div>
<div class="form-group">
    <label>Trạng thái</label>
    <?php if($info_all[0]['menu_client_status'] == 1): ?>
        <p class="help-block"><?php echo "Hiện"; ?></p>
    <?php else: ?>
        <p class="help-block"><?php echo "Ẩn"; ?></p>
    <?php endif; ?>
</div>

