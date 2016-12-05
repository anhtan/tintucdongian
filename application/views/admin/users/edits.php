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

                            <?php echo form_open(base_url_admin().'users/editUser/'.$users_info[0]->users_id); ?>
                            <div class="form-group">
                                <input class="form-control" name="users_id" value="<?php  if($users_info[0]->users_id){echo $users_info[0]->users_id;}  ?>" type="hidden" />
                            </div>
                            <div class="form-group">
                                <label>Tên thành viên <span class="asterik_label"> (*)</span></label>
                                <input class="form-control" name="users_name" value="<?php  if($users_info[0]->users_name){echo $users_info[0]->users_name;} elseif(set_value('users_name')){ set_value('users_name'); } ?>" type="text" />
                                <?php echo form_error('users_name','<p class="help-block mess_required">','</p>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Mật khẩu <span class="asterik_label"> (*)</span></label>
                                <input type="password" class="form-control" value="<?php if($users_info[0]->users_hint){echo $users_info[0]->users_hint; }  ?>" name="users_pass">
                                <?php echo form_error('users_pass','<p class="help-block mess_required">','</p>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Xác nhận mật khẩu <span class="asterik_label"> (*)</span></label>
                                <input type="password" class="form-control" value="<?php if($users_info[0]->users_hint){echo $users_info[0]->users_hint;} ?>" name="users_repeatpass">
                                <?php echo form_error('users_repeatpass','<p class="help-block mess_required">','</p>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Tên đầy đủ <span class="asterik_label"> (*)</span></label>
                                <input type="text" class="form-control" value="<?php if($users_info[0]->users_fullname){echo $users_info[0]->users_fullname; }  elseif(set_value('users_fullname')){ set_value('users_fullname'); } ?>" name="users_fullname">
                                <?php echo form_error('users_fullname','<p class="help-block mess_required">','</p>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Thư điện tử<span class="asterik_label"> (*)</span></label>
                                <input class="form-control" value="<?php if($users_info[0]->users_email){echo $users_info[0]->users_email; }  elseif(set_value('users_email')){ set_value('users_email'); } ?>" name="users_email">
                                <?php echo form_error('users_email','<p class="help-block mess_required">','</p>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ<span class="asterik_label"> (*)</span></label>
                                <input class="form-control" name="users_address" value="<?php if($users_info[0]->users_address){echo $users_info[0]->users_address; }  elseif(set_value('users_address')){ set_value('users_address'); } ?>" type="text">
                                <?php echo form_error('users_address','<p class="help-block mess_required">','</p>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Quyền hạn<span class="asterik_label"> (*)</span></label>
                                <select name="users_group_id" class="form-control">
                                    <option value="0">Chọn quyền hạn</option>
                                    <?php foreach($users_group_info as $s_users_group_info): ?>
                                        <option <?php if($users_info[0]->users_group_id == $s_users_group_info->users_group_id){ echo "selected"; } elseif($s_users_group_info->users_group_id == set_value('users_group_id')){ echo "selected"; } ?> value="<?php  echo $s_users_group_info->users_group_id; ?>"><?php echo $s_users_group_info->users_group_name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php echo form_error('users_group_id','<p class="help-block mess_required">','</p>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Trạng thái<span class="asterik_label"> (*)</span></label>
                                <select class="form-control" name="users_active">
                                    <?php
                                    $arr_status[0] = 'Khóa';
                                    $arr_status[1] = 'Kích hoạt';
                                    ?>
                                    <option value="">Chọn trạng thái</option>
                                    <?php foreach($arr_status as $key=>$value): ?>
                                        <option <?php if($users_info[0]->users_active == $key){echo "selected"; } elseif($key == set_value('users_active')){echo "selected"; } ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php echo form_error('users_active','<p class="help-block mess_required">','</p>'); ?>
                            </div>
                            <input value="Sửa" type="submit" class="btn btn-info btn-default" name="submit_form" />
                            <button type="reset" class="btn btn-warning btn-default">Làm lại</button>
                            <?php echo form_close(); ?>
                        </div>
                        <!-- /.col-lg-6 (nested) -->
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
