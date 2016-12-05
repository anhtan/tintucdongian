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

                        </div>
                    </div>

                    <div class="row">

                        <div class="col-lg-4">

                            <?php $attributes = array('class' => $class_form); ?>
                            <?php echo form_open_multipart(base_url_admin().'route/editRoute/'.$update_info[0]->route_id.'',$attributes); ?>

<div class="form-group">
    <input class="form-control" name="route_id" value="<?php echo $update_info[0]->route_id; ?>" type="hidden" />
</div>

<div class="form-group">
    <label> Tên route <span class="asterik_label"> (*)</span></label>
    <input class="input_normal form-control article_category_name" name="route_name" placeholder="Nhập Tên route"  value="<?php if(isset($update_info[0]->route_name)){echo $update_info[0]->route_name;}else if(set_value('route_name')){echo set_value("route_name");} ?>" type="text">
    <?php echo form_error('route_name','<p class="help-block mess_required">','</p>'); ?>
</div>

<div class="form-group">
    <label> Đường dẫn gốc <span class="asterik_label"> (*)</span></label>
    <input class="input_normal form-control article_category_name" name="route_old" placeholder="Nhập Đường dẫn gốc"  value="<?php if(isset($update_info[0]->route_old)){echo $update_info[0]->route_old;}else if(set_value('route_old')){echo set_value("route_old");} ?>" type="text">
    <?php echo form_error('route_old','<p class="help-block mess_required">','</p>'); ?>
</div>

<div class="form-group">
    <label> Đường dẫn mới <span class="asterik_label"> (*)</span></label>
    <input class="input_normal form-control article_category_name" name="route_new" placeholder="Nhập Đường dẫn mới"  value="<?php if(isset($update_info[0]->route_new)){echo $update_info[0]->route_new;}else if(set_value('route_new')){echo set_value("route_new");} ?>" type="text">
    <?php echo form_error('route_new','<p class="help-block mess_required">','</p>'); ?>
</div>

<div class="form-group">
    <label> Đối tượng route <span class="asterik_label"> (*)</span></label>
    <input class="input_normal form-control article_category_name" name="route_object" placeholder="Nhập Đối tượng route"  value="<?php if(isset($update_info[0]->route_object)){echo $update_info[0]->route_object;}else if(set_value('route_object')){echo set_value("route_object");} ?>" type="text">
    <?php echo form_error('route_object','<p class="help-block mess_required">','</p>'); ?>
</div>

<div class="form-group">
    <label> Loại route </label>
    <select name="route_type" class="form-control">
        <option value="0">Chọn danh mục</option>
        <?php foreach($type_route as $key=>$value): ?>
            <option  <?php if($key==$update_info[0]->route_type){echo "selected";} ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
        <?php endforeach; ?>
    </select>
    <?php echo form_error('article_category_parent','<p class="help-block mess_required">','</p>'); ?>
</div>

<div class="form-group">
    <label> Trạng thái </label>
    <select class="form-control medium_input" name="route_status">
        <?php
            $arr_status[0] = 'Khóa';
            $arr_status[1] = 'Kích hoạt';
        ?>
        <option value="">Chọn trạng thái</option>
        <?php foreach($arr_status as $key=>$value): ?>
            <option  <?php if($update_info[0]->route_status == $key){echo "selected";} ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
        <?php endforeach; ?>
    </select>
    <?php echo form_error('','<p class="help-block mess_required">','</p>'); ?>
</div>


                                    <input value="Sửa" type="submit" class="btn btn-info btn-default send_info_post" name="submit_form" />
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
