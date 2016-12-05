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
                        <div class="col-lg-4">
                                <?php echo form_open(base_url_admin().'usersgroup/addUserGroup'); ?>
                                    <div class="form-group">
                                        <label>Tên quyền hạn <span class="asterik_label"> (*)</span></label>
                                        <input class="form-control" name="users_group_name" value="<?php echo set_value('users_group_name') ?>" type="text">
                                        <?php echo form_error('users_group_name','<p class="help-block mess_required">','</p>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Quyền xem </label>
                                        <select class="form-control" name="users_group_view">
                                            <?php
                                                $arr_status[0] = 'Khóa';
                                                $arr_status[1] = 'Kích hoạt';
                                            ?>
                                            <option value="">Chọn trạng thái</option>
                                            <?php foreach($arr_status as $key=>$value): ?>
                                                <option <?php if($key == set_value('users_group_view')){echo "selected"; } ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Quyền thêm </label>
                                        <select class="form-control" name="users_group_add">
                                            <?php
                                                $arr_status[0] = 'Khóa';
                                                $arr_status[1] = 'Kích hoạt';
                                            ?>
                                            <option  value="">Chọn trạng thái</option>
                                            <?php foreach($arr_status as $key=>$value): ?>
                                                <option <?php if($key == set_value('users_group_add')){echo "selected"; } ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Quyền sửa </label>
                                        <select class="form-control" name="users_group_edit">
                                            <?php
                                                $arr_status[0] = 'Khóa';
                                                $arr_status[1] = 'Kích hoạt';
                                            ?>
                                            <option value="">Chọn trạng thái</option>
                                            <?php foreach($arr_status as $key=>$value): ?>
                                                <option <?php if($key == set_value('users_group_edit')){echo "selected"; } ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Quyền xóa </label>
                                        <select class="form-control" name="users_group_delete">
                                            <?php
                                                $arr_status[0] = 'Khóa';
                                                $arr_status[1] = 'Kích hoạt';
                                            ?>
                                            <option value="">Chọn trạng thái</option>
                                            <?php foreach($arr_status as $key=>$value): ?>
                                                <option <?php if($key == set_value('users_group_delete')){echo "selected"; } ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Quyền xóa thành viên </label>
                                        <select class="form-control" name="users_group_delete_mem">
                                            <?php
                                            $arr_status[0] = 'Khóa';
                                            $arr_status[1] = 'Kích hoạt';
                                            ?>
                                            <option value="">Chọn trạng thái</option>
                                            <?php foreach($arr_status as $key=>$value): ?>
                                                <option <?php if($key == set_value('users_group_delete_mem')){echo "selected"; } ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
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
<!--                                    <p class="help-block">Example block-level help text here.</p>-->
