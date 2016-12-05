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

                            <?php if(isset( $class_form)): ?>
                                <?php $class_form = $class_form; ?>
                            <?php else : ?>
                                <?php $class_form = ""; ?>
                            <?php endif; ?>
                            <?php $attributes = array('class' => $class_form); ?>
                            <?php if(isset($update_info[0]->_id)): ?>
                                <?php $id = '/'.$update_info[0]->_id; ?>
                            <?php else : ?>
                                <?php $id = ""; ?>
                            <?php endif; ?>

                            <?php echo form_open_multipart(base_url_admin().'site/addSite'.$id.'',$attributes); ?>

<div class="form-group">
    <label> Tên site <span class="asterik_label"> (*)</span></label>
    <input class="input_normal form-control article_category_name" name="site_name" placeholder="Nhập Tên site"  value="<?php if(isset($update_info[0]->site_name)){echo $update_info[0]->site_name;}else if(set_value('site_name')){echo set_value("site_name");} ?>" type="text">
    <?php echo form_error('site_name','<p class="help-block mess_required">','</p>'); ?>
</div>

<div class="form-group">
    <label> Đường dẫn <span class="asterik_label"> (*)</span></label>
    <input class="input_normal form-control article_category_name" name="site_link" placeholder="Nhập Đường dẫn"  value="<?php if(isset($update_info[0]->site_link)){echo $update_info[0]->site_link;}else if(set_value('site_link')){echo set_value("site_link");} ?>" type="text">
    <?php echo form_error('site_link','<p class="help-block mess_required">','</p>'); ?>
</div>

<div class="form-group">
    <label> Loại site </label>
    <select name="site_type" class="form-control">
        <option value="0">Chọn loại site</option>
            <?php foreach($type_site as $key => $value): ?>
                <option  value="<?php echo $key; ?>"><?php echo $value; ?></option>
            <?php endforeach; ?>
    </select>
    <?php echo form_error('article_category_parent','<p class="help-block mess_required">','</p>'); ?>
</div>

<div class="form-group">
    <label> Trạng thái </label>
    <select class="form-control medium_input" name="site_status">
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
                            <?php if(isset($dialog_form)  ): ?>
                            <div class="panel panel-default block_list_article_category get_info_category">
                                <div class="panel-heading">
                                    <span class="title_category_menu">Danh mục tin</span>
                                </div>
                                <div class="panel-body ">
                                    <ul>
                                        <li>Menu parent1
                                            <ul>
                                                 <li>-----------Menu con 1</li>
                                            </ul>

                                        </li>
                                        <li>Menu parent 2</li>
                                        <li>Menu parent 3</li>
                                        <li>Menu parent 4</li>
                                        <li>Menu parent 5</li>
                                        <li>Menu parent 6</li>
                                    </ul>
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <?php else: ?>
                                <div></div>
                            <?php endif; ?>

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
