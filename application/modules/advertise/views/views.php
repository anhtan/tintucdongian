<?php /*//echo "<pre>"; print_r($info_all);  echo "</pre>";  */?>
<div class="form-group">
    <img class="img_post_detail" src="<?php  echo base_url().$info_all[0]['advertise_image']; ?>" alt="">
</div>
<div class="form-group">
    <label>Tiêu đề quảng cáo</label>
    <p class="help-block"><?php echo $info_all[0]['advertise_name']; ?></p>
</div>
<div class="form-group">
    <label>Đường dẫn</label>
    <p class="help-block"><?php echo $info_all[0]['advertise_link']; ?></p>
</div>
<div class="form-group">
    <label>Vị trí</label>
    <p class="help-block"><?php echo $position_module[ $info_all[0]['advertise_position']]; ?></p>
</div>
<div class="form-group">
    <label>Trạng thái</label>
    <?php if($info_all[0]['advertise_active'] == 1): ?>
        <p class="help-block"><?php echo "Hiện"; ?></p>
    <?php else: ?>
        <p class="help-block"><?php echo "Ẩn"; ?></p>
    <?php endif; ?>
</div>

