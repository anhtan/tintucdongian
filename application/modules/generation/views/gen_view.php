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
                            $status_create_success = $this->session->flashdata('create_success');
                            ?>
                            <?php if($status_manufact['type']=='error') : ?>
                                <div class="alert alert-warning alert-dismissable">
                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">X</button>
                                    <?php echo $status_manufact['mess']; ?>
                                </div>
                            <?php endif; ?>
                            <?php if($status_create_success) : ?>
                                <div class="alert alert-success alert-dismissable">
                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">X</button>
                                    <?php echo $status_create_success; ?>
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <input type="hidden" class="type_gen" value="2"/>
                            <?php echo form_open_multipart(base_url_admin().'generation/genView'); ?>
                            <div class="get_info_model">
                                <div class="form-group">
                                    <label>Tên view <span class="asterik_label"> (*)</span></label>
                                    <input class="input_normal form-control article_category_name get_name_model" name="" value="<?php echo set_value('article_category_name') ?>" type="text">
                                    <?php //echo form_error('article_category_name','<p class="help-block mess_required">','</p>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Tên module <span class="asterik_label"> (*)</span></label>
                                    <input class="input_normal form-control article_category_name get_name_module" name="" value="<?php if(isset($name_of_module)){echo $name_of_module;} ?>" type="text">
                                    <?php //echo form_error('article_category_name','<p class="help-block mess_required">','</p>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Link form <span class="asterik_label"> (*)</span></label>
                                    <input class="input_normal form-control article_category_name get_link_form" name="" value="<?php echo set_value('article_category_name') ?>" type="text">
                                    <?php //echo form_error('article_category_name','<p class="help-block mess_required">','</p>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Số trường <span class="asterik_label"> (*)</span></label>
                                    <input class="input_normal form-control article_category_name get_num_field" name="" value="<?php echo set_value('article_category_name') ?>" type="text">
                                    <?php //echo form_error('article_category_name','<p class="help-block mess_required">','</p>'); ?>
                                </div>
                                <input value="Tạo" type="button" class="btn btn-info btn-default gen_info_model" name="submit_form" />
                                <a href="<?php echo base_url_admin()."blocks/listBlocks"; ?>"><button type="button" class="btn btn-warning btn-default">Trở về</button></a>
                            </div>
                            <div class="set_info_model">

                            </div>
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

