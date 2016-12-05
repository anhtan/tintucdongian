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
                            <?php $status_config_system = $this->session->flashdata('config_system'); ?>
                            <?php if($status_config_system['type']=='error') : ?>
                                <div class="alert alert-warning alert-dismissable">
                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                    <?php echo $status_config_system['mess']; ?>
                                </div>
                            <?php endif; ?>
                            <?php if($status_config_system['type']=='success') : ?>
                                <div class="alert alert-success alert-dismissable">
                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                    <?php echo $status_config_system['mess']; ?>
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <?php echo form_open(base_url_admin().'dashboard/configSystem'); ?>
                            <div class="form-group">
                                <label><?php echo $obj_config->config_alias_name; ?> </label>
                                <input class="large_input form-control" name="config_name" placeholder="Nhập <?php echo $obj_config->config_alias_name; ?> " value="<?php echo $config_info[0]->config_name; ?>" type="text">
                                <?php echo form_error('config_name','<p class="help-block mess_required">','</p>'); ?>
                            </div>
                            <div class="form-group">
                                <label><?php echo $obj_config->config_alias_address; ?> </label>
                                <input type="text" class="large_input form-control" value="<?php echo $config_info[0]->config_address; ?>" placeholder="Nhập <?php echo $obj_config->config_alias_address; ?> " name="config_address">
                                <?php echo form_error('config_address','<p class="help-block mess_required">','</p>'); ?>
                            </div>
                            <div class="form-group">
                                <label><?php echo $obj_config->config_alias_phone; ?> </label>
                                <input type="text" class="form-control large_input" value="<?php echo $config_info[0]->config_phone; ?>" placeholder="Nhập <?php echo $obj_config->config_alias_phone; ?> " name="config_phone">
                                <?php echo form_error('config_phone','<p class="help-block mess_required">','</p>'); ?>
                            </div>
                            <div class="form-group">
                                <label><?php echo $obj_config->config_alias_fax; ?></label>
                                <input type="text" class="form-control large_input" value="<?php echo $config_info[0]->config_fax; ?>" placeholder="Nhập <?php echo $obj_config->config_alias_fax; ?> " name="config_fax">
                                <?php echo form_error('config_fax','<p class="help-block mess_required">','</p>'); ?>
                            </div>
                            <div class="form-group">
                                <label><?php echo $obj_config->config_alias_email_send; ?> </label>
                                <input class="form-control large_input" value="<?php echo $config_info[0]->config_email_send; ?>" name="config_email_send" placeholder="Nhập <?php echo $obj_config->config_alias_email_send; ?>" />
                                <?php echo form_error('config_email_send','<p class="help-block mess_required">','</p>'); ?>
                            </div>
                            <div class="form-group">
                                <label><?php echo $obj_config->config_alias_email_receive; ?></label>
                                <input class="form-control large_input" name="config_email_receive" type="text" value="<?php echo $config_info[0]->config_email_receive; ?>" placeholder="Nhập <?php echo $obj_config->config_alias_email_receive; ?> ">
                                <?php echo form_error('config_email_receive','<p class="help-block mess_required">','</p>'); ?>
                            </div>
                            <div class="form-group">
                                <label><?php echo $obj_config->config_alias_website; ?></label>
                                <input class="form-control large_input" name="config_website" value="<?php echo $config_info[0]->config_website; ?>" type="text" placeholder="Nhập <?php echo $obj_config->config_alias_website; ?> ">
                                <?php echo form_error('config_website','<p class="help-block mess_required">','</p>'); ?>
                            </div>
                            <div class="form-group">
                                <label><?php echo $obj_config->config_alias_banner; ?></label>
                                <input class="form-control large_input" name="config_banner" type="text" value="<?php echo $config_info[0]->config_banner; ?>" placeholder="Nhập <?php echo $obj_config->config_alias_banner; ?> ">
                                <?php echo form_error('config_banner','<p class="help-block mess_required">','</p>'); ?>
                            </div>
                            <div class="form-group">
                                <label><?php echo $obj_config->config_alias_title; ?> </label>
                                <input class="form-control large_input" name="config_title" value="<?php echo $config_info[0]->config_title; ?>" type="text" placeholder="Nhập <?php echo $obj_config->config_alias_title; ?> ">
                                <?php echo form_error('config_title','<p class="help-block mess_required">','</p>'); ?>
                            </div>
                            <div class="form-group">
                                <label><?php echo $obj_config->config_alias_meta_title; ?></label>
                                <input class="form-control large_input" name="config_meta_title" value="<?php echo $config_info[0]->config_meta_title; ?>" type="text" placeholder="Nhập <?php echo $obj_config->config_alias_meta_title; ?> ">
                                <?php echo form_error('config_meta_title','<p class="help-block mess_required">','</p>'); ?>
                            </div>
                            <div class="form-group">
                                <label><?php echo $obj_config->config_alias_meta_description; ?></label>
                                <textarea  name="config_meta_description" id="" cols="30" rows="10"  placeholder="Nhập <?php echo $obj_config->config_alias_meta_description; ?> " class="form-control tinymce_text_area"><?php echo $config_info[0]->config_meta_description; ?></textarea>
                                <?php echo form_error('config_meta_description','<p class="help-block mess_required">','</p>'); ?>
                            </div>
                            <div class="form-group">
                                <label><?php echo $obj_config->config_alias_meta_content; ?></label>
                                <textarea  name="config_meta_content" id="" cols="30" rows="10"  placeholder="Nhập <?php echo $obj_config->config_alias_meta_content; ?> " class="form-control tinymce_text_area"><?php echo $config_info[0]->config_meta_content; ?></textarea>
                                <?php echo form_error('config_meta_content','<p class="help-block mess_required">','</p>'); ?>
                            </div>
                            <div class="form-group">
                                <label><?php echo $obj_config->config_alias_meta_author; ?></label>
                                <input class="form-control large_input" name="config_meta_author" value="<?php echo $config_info[0]->config_meta_author; ?>" type="text" placeholder="Nhập <?php echo $obj_config->config_alias_meta_author; ?> ">
                                <?php echo form_error('config_meta_author','<p class="help-block mess_required">','</p>'); ?>
                            </div>
                            <div class="form-group">
                                <label><?php echo $obj_config->config_alias_temp_close; ?> </label>
                                <textarea  name="config_temp_close" id="" cols="30" rows="10" placeholder="Nhập <?php echo $obj_config->config_alias_temp_close; ?> " class="form-control tinymce_text_area"><?php echo $config_info[0]->config_temp_close; ?></textarea>
                                <?php echo form_error('config_temp_close','<p class="help-block mess_required">','</p>'); ?>
                            </div>
                            <div class="form-group">
                                <label><?php echo $obj_config->config_alias_instroduce; ?></label>
                                <textarea  name="config_instroduce" id="" cols="30" rows="10" placeholder="Nhập <?php echo $obj_config->config_alias_instroduce; ?> " class="form-control tinymce_text_area"><?php echo $config_info[0]->config_instroduce; ?></textarea>
                                <?php echo form_error('config_instroduce','<p class="help-block mess_required">','</p>'); ?>
                            </div>
                            <div class="form-group">
                                <label><?php echo $obj_config->config_alias_rule_register; ?> </label>
                                <textarea  name="config_rule_register" id="" cols="30" rows="10" placeholder="Nhập <?php echo $obj_config->config_alias_rule_register; ?> " class="form-control tinymce_text_area"><?php echo $config_info[0]->config_rule_register; ?></textarea>
                                <?php echo form_error('config_rule_register','<p class="help-block mess_required">','</p>'); ?>
                            </div>
                            <div class="form-group">
                                <label><?php echo $obj_config->config_alias_status_website; ?> </label>
                                <select class="form-control" name="config_status_website">
                                    <?php
                                    $arr_status[0] = 'Khóa';
                                    $arr_status[1] = 'Kích hoạt';
                                    ?>
                                    <option value="">Chọn trạng thái</option>
                                    <?php foreach($arr_status as $key=>$value): ?>
                                        <option <?php if($key == $config_info[0]->config_status_website){echo "selected"; } ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php echo form_error('config_status_website','<p class="help-block mess_required">','</p>'); ?>
                            </div>
                            <input value="Cập nhật" type="submit" class="btn btn-info btn-default" name="submit_form" />
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
