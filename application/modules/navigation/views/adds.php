<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-10">
            <h1 class="title_page page-header">
                <?php echo $title_page; ?>
            </h1>
        </div>
        <!-- /.col-lg-8 -->
        <div class="col-lg-2">
                <?php echo $back_home; ?>
        </div>
        <!-- /.col-lg-4 -->
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
                            <?php echo form_open_multipart(base_url_admin().'navigation/addNavigation',$attributes); ?>

                            <div class="form-group">
                                <label> Tên menu <span class="asterik_label"> (*)</span></label>
                                <input class="input_normal form-control article_category_name" name="menu_client_name" placeholder="Nhập Tên menu"  value="<?php  ?>" type="text">
                                <?php echo form_error('menu_client_name','<p class="help-block mess_required">','</p>'); ?>
                            </div>
                            <input type="hidden" class="path_category_article" name="" value="<?php ?>">


                            <div class="form-group">
                                <label> Bí danh <span class="asterik_label"> (*)</span></label>
                                <input class="input_alias form-control article_category_name" name="menu_client_alias" placeholder="Nhập Bí danh"  value="<?php  ?>" type="text">
                                <?php echo form_error('menu_client_alias','<p class="help-block mess_required">','</p>'); ?>
                            </div>

                            <div class="form-group">
                                <label> Đường dẫn <span class="asterik_label"> (*)</span></label>
                                <input class="input_path form-control article_category_name" name="menu_client_path" placeholder="Nhập Đường dẫn"  value="<?php  ?>" type="text">
                                <?php echo form_error('menu_client_path','<p class="help-block mess_required">','</p>'); ?>
                            </div>

                            <div class="form-group">
                                <label> Menu cha </label>
                                <select name="menu_client_parent" class="form-control">
                                    <option value="0">Chọn danh mục</option>
                                    <?php foreach($list_parent as $s_list_parent): ?>
                                        <option  value="<?php echo $s_list_parent->menu_client_id; ?>"><?php echo $s_list_parent->menu_client_name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php echo form_error('article_category_parent','<p class="help-block mess_required">','</p>'); ?>
                            </div>

                            <div class="form-group">
                                <label> Trạng thái </label>
                                <select class="form-control medium_input" name="menu_client_status">
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
                                        <?php foreach($list_article_category as $s_list_article_category): ?>
                                            <?php if($s_list_article_category->article_category_parent_id == 0): ?>
                                                <li><?php echo $s_list_article_category->article_category_name; ?></li>
                                                <ul>
                                                    <?php foreach($list_sub_article_category as $s_list_sub_article_category): ?>
                                                        <?php if($s_list_sub_article_category->article_category_parent_id == $s_list_article_category->article_category_id): ?>
                                                            <li><?php echo "------ ".$s_list_sub_article_category->article_category_name ?></li>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </ul>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <?php else: ?>
                                <div></div>
                            <?php endif; ?>
<!--                            <div class="block_list_article_category">
                                <h4>Danh mục tin</h4>
                                <?php /*foreach($list_article_category as $s_list_article_category): */?>
                                    <div class="form-group">
                                        <p class="item_list"><?php /*echo $s_list_article_category->article_category_name; */?></p>
                                    </div>
                                <?php /*endforeach; */?>
                            </div>
-->                        </div>
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
