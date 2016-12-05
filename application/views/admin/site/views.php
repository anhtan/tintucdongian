<div class="form-group">
    <label>Tên site</label>
    <p class="help-block"><?php echo $info_all[0]['site_name']; ?></p>
</div>

<div class="form-group">
    <label>Đường dẫn</label>
    <p class="help-block"><?php echo $info_all[0]['site_link']; ?></p>
</div>

<div class="form-group">
    <label>Loại site</label>
    <p class="help-block"><?php echo $type_site[ $info_all[0]['site_type']]; ?></p>
</div>

<div class="form-group">
    <label>Trạng thái</label>
    <?php if($info_all[0]['site_status'] == 1): ?>
        <p class="help-block"><?php echo "Hiện"; ?></p>
    <?php else: ?>
        <p class="help-block"><?php echo "Ẩn"; ?></p>
    <?php endif; ?>
</div>

