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
                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">x</button>
                                    <?php echo $status_manufact['mess']; ?>
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <?php echo form_open(base_url_admin().'menus/addMenu'); ?>
                            <div class="form-group">
                                <i class="fa fa-5x fa-fw" id="icon_background_menu" title="Ảnh menu"></i>
                            </div>
                            <div class="form-group">
                                <label>Ảnh menu </label>
                                <input type="button" class="btn btn-info" data-target="#listIcon" data-toggle="modal" value="Chọn ảnh" />
                                <input class="form-control icon_menu" name="menu_icon" value="<?php echo set_value('menu_icon') ?>" type="hidden">
                                <?php echo form_error('menu_icon','<p class="help-block mess_required">','</p>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Tên menu <span class="asterik_label"> (*)</span></label>
                                <input class="form-control" name="menu_name" value="<?php echo set_value('menu_name') ?>" type="text">
                                <?php echo form_error('menu_name','<p class="help-block mess_required">','</p>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Đường dẫn </label>
                                <input type="text" class="form-control" value="<?php echo set_value('menu_path'); ?>" name="menu_path">
                                <?php echo form_error('menu_path','<p class="help-block mess_required">','</p>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Menu cha <span class="asterik_label"> (*)</span></label>
                                <select name="menu_parent" class="form-control">
                                    <option value="0">Chọn menu cha</option>
                                    <?php foreach($list_parent_menu as $s_list_parent_menu): ?>
                                        <option <?php if($s_list_parent_menu->menu_id == set_value('menu_parent')){echo "selected";  } ?> value="<?php  echo $s_list_parent_menu->menu_id; ?>"><?php echo $s_list_parent_menu->menu_name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php echo form_error('menu_parent','<p class="help-block mess_required">','</p>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Menu con <span class="asterik_label"> (*)</span></label>
                                <select class="form-control" name="menu_has_child">
                                    <?php
                                    $arr_has_child[0] = 'Không';
                                    $arr_has_child[1] = 'Có';
                                    ?>
                                    <option value="">Chọn trạng thái menu con</option>
                                    <?php foreach($arr_has_child as $key=>$value): ?>
                                        <option <?php if($key == set_value('menu_has_child')){echo "selected"; } ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php echo form_error('menu_has_child','<p class="help-block mess_required">','</p>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Trạng thái <span class="asterik_label"> (*)</span></label>
                                <select class="form-control" name="menu_active">
                                    <?php
                                    $arr_status[0] = 'Khóa';
                                    $arr_status[1] = 'Kích hoạt';
                                    ?>
                                    <option value="">Chọn trạng thái</option>
                                    <?php foreach($arr_status as $key=>$value): ?>
                                        <option <?php if($key == set_value('menu_active')){echo "selected"; } ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php echo form_error('menu_active','<p class="help-block mess_required">','</p>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="">Quyền hạn</label>
                                <select name="menu_display[]" class=" form-control selectpicker"  title="Chọn quyền hạn"   data-showContent="true" multiple>
                                    <?php foreach($list_users_group as $s_list_users_group): ?>
                                    <option value="<?php echo $s_list_users_group->users_group_id; ?>"><?php echo $s_list_users_group->users_group_name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <input value="Thêm" type="submit" class="btn btn-info btn-default" name="submit_form" />
                            <button type="reset" class="btn btn-warning btn-default">Làm lại</button>
                            <?php echo form_close(); ?>
                        </div>
                        <!-- /.col-lg-6 (nested) -->
                        <div class="col-lg-4">
                            <p>Chú ý :  <span class="asterik_label"> (*)</span> là những mục bắt buộc phải nhập </p>
                        </div>
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
<?php include "listIcon.php"; ?>