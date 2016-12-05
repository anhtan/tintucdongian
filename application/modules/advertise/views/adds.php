<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-10">
            <h1 class="title_page page-header">
                <?php echo $title_page; ?>
            </h1>
        </div>
        <div class="col-lg-2">
                <?php echo $back_home; ?>
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

                            <?php if(isset( $class_form)): ?>
                                <?php $class_form = $class_form; ?>
                            <?php else : ?>
                                <?php $class_form = ""; ?>
                            <?php endif; ?>
                            <?php $attributes = array('class' => $class_form); ?>
                            <?php echo form_open_multipart(base_url_admin().'advertise/addAdvertise',$attributes); ?>

<div class="form-group">
    <label> Mã <span class="asterik_label"> (*)</span></label>
    <input class="input_normal form-control article_category_name" name="advertise_id" placeholder="Nhập Mã"  value="<?php  ?>" type="text">
    <?php echo form_error('advertise_id','<p class="help-block mess_required">','</p>'); ?>
</div>

<div class="form-group">
    <label> Tên <span class="asterik_label"> (*)</span></label>
    <input class="input_normal form-control article_category_name" name="advertise_name" placeholder="Nhập Tên"  value="<?php  ?>" type="text">
    <?php echo form_error('advertise_name','<p class="help-block mess_required">','</p>'); ?>
</div>

<div class="form-group">
    <label> Ảnh <span class="asterik_label"> (*)</span></label>
    <input class="input_normal form-control article_category_name" name="advertise_image" placeholder="Nhập Ảnh"  value="<?php  ?>" type="text">
    <?php echo form_error('advertise_image','<p class="help-block mess_required">','</p>'); ?>
</div>

<div class="form-group">
    <label> Đường dẫn <span class="asterik_label"> (*)</span></label>
    <input class="input_normal form-control article_category_name" name="advertise_link" placeholder="Nhập Đường dẫn"  value="<?php  ?>" type="text">
    <?php echo form_error('advertise_link','<p class="help-block mess_required">','</p>'); ?>
</div>

<div class="form-group">
    <label> Vị trí <span class="asterik_label"> (*)</span></label>
    <input class="input_normal form-control article_category_name" name="advertise_position" placeholder="Nhập Vị trí"  value="<?php  ?>" type="text">
    <?php echo form_error('advertise_position','<p class="help-block mess_required">','</p>'); ?>
</div>

<div class="form-group">
    <label> Trạng thái </label>
    <select class="form-control medium_input" name="advertise_active">
        <?php
            $arr_status[0] = 'Khóa';
            $arr_status[1] = 'Kích hoạt';
        ?>
        <option value="">Chọn trạng thái</option>
        <?php foreach($arr_status as $key=>$value): ?>
            <option  value="<?php echo $key; ?>"><?php echo $value; ?></option>
        <?php endforeach; ?>
    </select>
    <?php echo form_error('','<p class="help-block mess_required">','</p>'); ?>
</div>


                                    <input value="Thêm" type="submit" class="btn btn-info btn-default send_info_post" name="submit_form" />
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
