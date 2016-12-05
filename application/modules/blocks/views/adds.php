<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="title_page page-header">
                <?php echo $title_page; ?>
            </h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo $title_form; ?>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php $status_manufact = $this->session->flashdata('mess_manufact'); ?>
                            <?php if($status_manufact['type']=='error') : ?>
                                <div class="alert alert-warning alert-dismissable">
                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                    <?php echo $status_manufact['mess']; ?>
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>
                    <div class="row">
                        <?php echo form_open(base_url_admin().'blocks/addBlocks'); ?>
                        <div class="col-lg-4">
                                    <div class="form-group">
                                        <i class="fa fa-5x fa-fw" id="icon_background_menu" title="Ảnh module"></i>
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo $obj_title->modules_alias_icon; ?></label>
                                        <input type="button" class="btn btn-info" data-target="#listIcon" data-toggle="modal" value="Chọn ảnh" />
                                        <input class="form-control icon_menu" name="modules_icon" value="<?php echo set_value('modules_icon') ?>" type="hidden">
                                        <?php echo form_error('menu_icon','<p class="help-block mess_required">','</p>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo $obj_title->modules_alias_symbol; ?><span class="asterik_label"> (*)</span></label>
                                        <input class="input_normal form-control" name="modules_symbol" placeholder="<?php echo $obj_title->modules_alias_symbol; ?>"  value="<?php echo set_value('modules_symbol') ?>" type="text">
                                        <?php echo form_error('modules_symbol','<p class="help-block mess_required">','</p>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo "Tên bản ghi khi xóa"; ?></label>
                                        <input type="text" class="form-control" value="<?php echo set_value('modules_alias'); ?>"  class="input_alias" placeholder="Nhập <?php echo "Tên bản ghi hiển thị xóa"; ?>" name="name_display_del">
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo $obj_title->modules_alias_name; ?><span class="asterik_label"> (*)</span></label>
                                        <input type="text" class="form-control" value="<?php echo set_value('modules_name'); ?>" placeholder="Nhập <?php echo $obj_title->modules_alias_name; ?>" name="modules_name">
                                        <?php echo form_error('modules_name','<p class="help-block mess_required">','</p>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo $obj_title->modules_alias_name_model; ?><span class="asterik_label"> (*)</span></label>
                                        <input type="text" class="form-control" value="<?php echo set_value('modules_name_model'); ?>" placeholder="Nhập <?php echo $obj_title->modules_alias_name_model; ?>" name="modules_name_model">
                                        <?php echo form_error('modules_name_model','<p class="help-block mess_required">','</p>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo $obj_title->modules_alias_alias; ?></label>
                                        <input type="text" class="input_alias form-control" value="<?php echo set_value('modules_alias'); ?>"  class="input_alias" placeholder="Nhập <?php echo $obj_title->modules_alias_alias; ?>" name="modules_alias">
                                        <?php echo form_error('modules_alias','<p class="help-block mess_required">','</p>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo $obj_title->modules_alias_position; ?> <span class="asterik_label"> (*)</span></label>
                                        <select name="modules_position" id="" class="form-control obj_position">
                                            <option value="0">Chọn vị trí</option>
                                            <?php foreach($list_position as $key=>$value): ?>
                                                <option value="<?php echo $key; ?>" <?php if($key == set_value('modules_position')){echo "selected";} ?>><?php echo $value; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <?php echo form_error('modules_position','<p class="help-block mess_required">','</p>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo $obj_title->modules_alias_path; ?> <span class="asterik_label"> (*)</span></label>
                                        <input type="text" class="form-control" value="<?php echo set_value('modules_path'); ?>" placeholder="Nhập <?php echo $obj_title->modules_alias_path; ?>" name="modules_path">
                                        <?php echo form_error('modules_path','<p class="help-block mess_required">','</p>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo $obj_title->modules_alias_order; ?> <span class="asterik_label"> (*)</span></label>
                                        <select name="modules_order" id="" class="list_order form-control">
                                            <option value="0">Chọn thứ tự</option>
                                            <?php for($i=1;$i <= 10;$i++): ?>
                                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                            <?php endfor; ?>
                                        </select>
                                        <?php echo form_error('modules_order','<p class="help-block mess_required">','</p>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo $obj_title->modules_alias_status; ?><span class="asterik_label"> (*)</span></label>
                                        <select class="form-control" name="modules_status">
                                            <?php
                                                $arr_status[0] = 'Khóa';
                                                $arr_status[1] = 'Kích hoạt';
                                            ?>
                                            <option value="">Chọn trạng thái</option>
                                            <?php foreach($arr_status as $key=>$value): ?>
                                                <option <?php if($key == set_value('modules_status')){echo "selected"; } ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <?php echo form_error('modules_status','<p class="help-block mess_required">','</p>'); ?>
                                    </div>
                                    <input value="Thêm" type="submit" class="btn btn-info btn-default" name="submit_form" />
                                    <button type="reset" class="btn btn-warning btn-default">Làm lại</button>
                        </div>
                        <!-- /.col-lg-6 (nested) -->
                        <div class="col-lg-4">
                            <p>Chú ý :  <span class="asterik_label"> (*)</span> là những mục bắt buộc phải nhập </p>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
<!--                                    <p class="help-block">Example block-level help text here.</p>-->
<?php include "listIcon.php"; ?>
