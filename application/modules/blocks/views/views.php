<div class="row content_form">
    <div class="col-lg-10">

    <div class="form-group">
        <label><?php echo $obj_title->modules_alias_icon; ?></label>
        <p class="help-block fa <?php echo $info_all[0]['modules_icon']; ?> fa-2x"></p>
    </div>
    <div class="form-group">
        <label><?php echo $obj_title->modules_alias_symbol; ?></label>
        <p class="help-block"><?php echo $info_all[0]['modules_symbol']; ?></p>
    </div>
    <div class="form-group">
        <label><?php echo $obj_title->modules_alias_name; ?></label>
        <p class="help-block"><?php echo $info_all[0]['modules_name']; ?></p>
    </div>
    <div class="form-group">
        <label><?php echo $obj_title->modules_alias_name_model; ?></label>
        <p class="help-block"><?php echo $info_all[0]['modules_name_model']; ?></p>
    </div>
    <div class="form-group">
        <label><?php echo $obj_title->modules_alias_alias; ?></label>
        <p class="help-block"><?php echo $info_all[0]['modules_alias']; ?></p>
    </div>
    <div class="form-group">
        <label><?php echo $obj_title->modules_alias_position; ?></label>
        <p class="help-block"><?php echo $list_position[ $info_all[0]['modules_position']]; ?></p>
    </div>
    <div class="form-group">
        <label><?php echo $obj_title->modules_alias_path; ?></label>
        <p class="help-block"><?php echo $info_all[0]['modules_path']; ?></p>
    </div>
    <div class="form-group">
        <label><?php echo $obj_title->modules_alias_order; ?></label>
        <p class="help-block"><?php echo $info_all[0]['modules_order']; ?></p>
    </div>
    <div class="form-group">
        <label><?php echo $obj_title->modules_alias_status; ?></label>
        <?php if($info_all[0]['modules_status'] == 1): ?>
            <p class="help-block"><?php echo "Hiện"; ?></p>
        <?php else: ?>
            <p class="help-block"><?php echo "Ẩn"; ?></p>
        <?php endif; ?>
    </div>
    </div>
    <div class="col-lg-2">
        <button type="button" class="btn btn-success view_all_file"><i class="fa fa-eye"></i> Xem các file</button>
    </div>
</div>

<!--// end form -->
<div class="info_directory">
    <div class="row">
        <div class="col-lg-10">
            <?php foreach(viewMapDirectory( $info_all[0]['modules_name']) as $key=>$val) : ?>
                <p><?php echo $key; ?></p>
                <?php foreach($val as $s_val): ?>
                    <p>----<?php echo $s_val; ?></p>
                <?php endforeach; ?>
            <?php endforeach; ?>

        </div>
        <div class="col-lg-2">
            <button type="button" class="btn btn-success back_info"><i class="fa fa-reply"></i> Trở lại</button>
        </div>
    </div>
</div>

