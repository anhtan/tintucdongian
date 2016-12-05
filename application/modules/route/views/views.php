<div class="form-group">
    <label>Tên route</label>
    <p class="help-block"><?php echo $info_all[0]['route_name']; ?></p>
</div>

<div class="form-group">
    <label>Đường dẫn gốc</label>
    <p class="help-block"><?php echo $info_all[0]['route_old']; ?></p>
</div>

<div class="form-group">
    <label>Đường dẫn mới</label>
    <p class="help-block"><?php echo $info_all[0]['route_new']; ?></p>
</div>

<div class="form-group">
    <label>Loại route</label>
    <p class="help-block"><?php echo $info_all[0]['route_type']; ?></p>
</div>

<div class="form-group">
    <label>Trạng thái</label>
    <?php if($info_all[0]['route_status'] == 1): ?>
        <p class="help-block"><?php echo "Hiện"; ?></p>
    <?php else: ?>
        <p class="help-block"><?php echo "Ẩn"; ?></p>
    <?php endif; ?>
</div>

