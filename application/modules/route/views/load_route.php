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

                    <div class="row">

                        <div class="col-lg-4">

                            <?php $attributes = array('class' => $class_form); ?>
                            <?php echo form_open_multipart(base_url_admin().'route/loadRoute',$attributes); ?>

<div class="form-group">
    <label> Tên module <span class="asterik_label"> (*)</span></label>
    <input class="input_normal form-control article_category_name" name="name_of_module" placeholder="Nhập Tên module"  value="<?php if(isset($update_info[0]->name_of_module_name)){echo $update_info[0]->name_of_module_name;}else if(set_value('name_of_module_name')){echo set_value("name_of_module_name");} ?>" type="text">
    <?php echo form_error('name_of_module','<p class="help-block mess_required">','</p>'); ?>
</div>


                                    <input value="Load" type="submit" class="btn btn-info btn-default send_info_post" name="submit_form" />
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
<?php include "listIcon.php"; ?>
