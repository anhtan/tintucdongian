<?php /*//echo "<pre>"; print_r($info_all);  echo "</pre>";  */?>
<div class="form-group">
    <label>Ảnh menu</label><br>
    <p class="help-block fa <?php echo $info_all[0]['menu_icon']; ?>"></p>
</div>
<div class="form-group">
    <label>Tên menu</label>
    <p class="help-block"><?php echo $info_all[0]['menu_name']; ?></p>
</div>
<div class="form-group">
    <label>Đường dẫn</label>
    <p class="help-block"><?php echo $info_all[0]['menu_path']; ?></p>
</div>
<div class="form-group">
    <label>Menu cha</label>
    <p class="help-block"><?php echo $info_all[0]['menu_parent']; ?></p>
</div>
<div class="form-group">
    <label>Menu con</label>
    <p class="help-block"><?php echo $info_all[0]['menu_has_child']; ?></p>
</div>
<div class="form-group">
    <label>Quyền hạn</label>
    <p class="help-block"><?php echo $info_all[0]['menu_display']; ?></p>
</div>
<div class="form-group">
    <label>Trạng thái</label>
    <p class="help-block">
        <?php echo $info_all[0]['menu_active']; ?>
    </p>
</div>

