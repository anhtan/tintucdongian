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
                            <?php $status_manufact = $this->session->flashdata('mess_manufact');
                                $status_user_info = $this->session->flashdata('update_user_info');
                            ?>
                            <?php if($status_manufact['type']=='error') : ?>
                                <div class="alert alert-warning alert-dismissable">
                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                    <?php echo $status_manufact['mess']; ?>
                                </div>
                            <?php endif; ?>
                            <?php if($status_user_info['type']=='error') : ?>
                                <div class="alert alert-warning alert-dismissable">
                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                    <?php echo $status_user_info['mess']; ?>
                                </div>
                            <?php endif; ?>
                            <?php if($status_user_info['type']=='success') : ?>
                                <div class="alert alert-success alert-dismissable">
                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                    <?php echo $status_user_info['mess']; ?>
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <?php echo form_open(base_url_admin().'users/userInfo'); ?>
                            <div class="form-group">
                                <label>Tên đầy đủ </label>
                                <input type="text" class="form-control" value="<?php if($info_user[0]->users_fullname){echo $info_user[0]->users_fullname;}else{ echo set_value('users_fullname');} ?>" name="users_fullname">
                                <?php echo form_error('users_fullname','<p class="help-block mess_required">','</p>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Mật khẩu <span class="asterik_label"> (*)</span></label>
                                <input type="password" class="form-control" value="<?php if($info_user[0]->users_hint){echo $info_user[0]->users_hint;}else{ echo set_value('users_hint');} ?>" name="users_pass">
                                <?php echo form_error('users_pass','<p class="help-block mess_required">','</p>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Xác nhận mật khẩu </label>
                                <input type="password" class="form-control" value="<?php if($info_user[0]->users_hint){echo $info_user[0]->users_hint;}else{ echo set_value('users_hint');} ?>" name="users_repeatpass">
                                <?php echo form_error('users_repeatpass','<p class="help-block mess_required">','</p>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Thư điện tử </label>
                                <input class="form-control" value="<?php if($info_user[0]->users_email){echo $info_user[0]->users_email;}else{ echo set_value('users_email');} ?>" name="users_email">
                                <?php echo form_error('users_email','<p class="help-block mess_required">','</p>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ </label>
                                <input class="form-control" name="users_address" type="text" value="<?php if($info_user[0]->users_address){echo $info_user[0]->users_address;}else{ echo set_value('users_address');} ?>">
                                <?php echo form_error('users_address','<p class="help-block mess_required">','</p>'); ?>
                            </div>
                            <input value="Sửa" type="submit" class="btn btn-info btn-default" name="submit_form" />
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
