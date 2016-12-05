<div id="page-wrapper">
    <div class="row">
        <?php if(isset( $back_home)): ?>
        <div class="col-lg-10">
            <h1 class="title_page page-header">
                <?php echo $title_page; ?>
            </h1>
        </div>
        <div class="col-lg-2">
            <?php echo $back_home; ?>
        </div>
        <?php else: ?>
            <div class="col-lg-12">
                <h1 class="title_page page-header">
                    <?php echo $title_page; ?>
                </h1>
            </div>
        <?php endif; ?>
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
                            <?php if($status_manufact['type']=='success') : ?>
                                <div class="alert alert-success alert-dismissable">
                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                    <?php echo $status_manufact['mess']; ?>
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>
                    <?php $attributes = array('class' => $class_form); ?>
                    <?php echo form_open_multipart(base_url_admin().'generation/genController',$attributes); ?>

                    <div class="row">

                        <div class="col-lg-4">

                            <div class="form-group">
                                <label><?php echo "Tên bản ghi khi xóa"; ?></label>
                                <input type="text" class="form-control" value="<?php echo set_value('name_display_del'); ?>"  class="input_alias" placeholder="Nhập <?php echo "Tên bản ghi hiển thị xóa"; ?>" name="name_display_del">
                            </div>
                            <div class="form-group">
                                <label><?php echo "Tên controller"; ?></label>
                                <input type="text" class="form-control" value="<?php echo set_value('name_of_controller'); ?>"  class="input_alias" placeholder="Nhập <?php echo "Tên controller"; ?>" name="name_of_controller">
                            </div>
                            <div class="form-group">
                                <label><?php echo "Tên module"; ?></label>
                                <input type="text" class="form-control" value="<?php if(isset( $name_of_module)){echo $name_of_module;}else{ echo set_value('name_module');} ?>"  class="input_alias" placeholder="Nhập <?php echo "Tên module"; ?>" name="name_module">
                            </div>
                            <div class="form-group">
                                <label><?php echo "Tên model"; ?></label>
                                <input type="text" class="form-control" value="<?php if(isset( $name_of_model)){echo $name_of_model;}else{ echo set_value('name_model');} ?>"  class="input_alias" placeholder="Nhập <?php echo "Tên model"; ?>" name="name_model">
                            </div>


                                    <input value="Thêm" type="submit" class="btn btn-info btn-default send_info_post" name="submit_form" />
                                    <button type="reset" class="btn btn-warning btn-default">Làm lại</button>
                        </div>
                        <!-- /.col-lg-6 (nested) -->
                        <div class="col-lg-4">
                            <p>Chú ý :  <span class="asterik_label"> (*)</span> là những mục bắt buộc phải nhập </p>
                            <input type="hidden" class="type_gen" value="3"/>
                            <h3>Tạo bảng dữ liệu </h3>
                            <div class="get_info_model">
                                <div class="form-group">
                                    <label>Số trường <span class="asterik_label"> (*)</span></label>
                                    <input class="input_normal form-control article_category_name get_num_field" name="" value="<?php echo set_value('article_category_name') ?>" type="text">
                                    <?php //echo form_error('article_category_name','<p class="help-block mess_required">','</p>'); ?>
                                </div>
                                <input value="Tạo" type="button" class="btn btn-info btn-default gen_info_model" name="submit_form" />
                                <a href="<?php echo base_url_admin()."blocks/listBlocks"; ?>"><button type="button" class="btn btn-warning btn-default">Trở về</button></a>
                            </div>
                            <div class="set_info_model"></div>
                        </div>
                    </div>
                    <!-- /.row (nested) -->
                    <?php echo form_close(); ?>

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
