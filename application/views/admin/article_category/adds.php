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

                                <?php echo form_open_multipart(base_url_admin().'articlecategory/addArticleCategory'); ?>
<!--                                    <div class="form-group">
                                        <img src="<?php /*if(isset($path_file_upload)){echo base_url().$path_file_upload;} */?>" alt="Ảnh mục tin" class="img_article_category">
                                    </div>
                                    <div class="show_error_file" >
                                        <?php /*echo @$upload_info['error']; */?>
                                    </div>
                                    <div class="form-group block_article_category">
                                        <label>Ảnh </label>
                                        <input class="fileinfo" size="20" name="userfile"  value="Chọn ảnh" type="file">
                                        <input type="submit"  class="btn_upload_form btn btn-info" value="Tải lên">
                                        <input type="hidden" name="article_category_image" value="<?php /*echo $path_file_upload; */?>">
                                    </div>
-->
                                    <div class="form-group">
                                        <i class="fa fa-5x fa-fw" id="icon_background_menu" title="Ảnh danh mục"></i>
                                    </div>
                                    <div class="form-group">
                                        <label>Ảnh danh mục </label>
                                        <input type="button" class="btn btn-info" data-target="#listIcon" data-toggle="modal" value="Chọn ảnh" />
                                        <input class="form-control icon_menu" name="article_category_image" value="<?php echo set_value('article_category_image') ?>" type="hidden">
                                        <?php echo form_error('menu_icon','<p class="help-block mess_required">','</p>'); ?>
                                    </div>

                                    <div class="form-group">
                                        <label>Tên mục tin <span class="asterik_label"> (*)</span></label>
                                        <input class="input_normal form-control article_category_name" name="article_category_name" value="<?php echo set_value('article_category_name') ?>" type="text">
                                        <?php echo form_error('article_category_name','<p class="help-block mess_required">','</p>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Bí danh <span class="asterik_label"> (*)</span></label>
                                        <input type="text" class="input_alias form-control article_category_alias" value="<?php echo set_value('article_category_alias'); ?>" name="article_category_alias">
                                        <?php echo form_error('article_category_alias','<p class="help-block mess_required">','</p>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Danh mục cha </label>
                                        <select name="article_category_parent_id" class="form-control">
                                            <option value="0">Chọn danh mục</option>
                                            <?php foreach($article_category_parent as $s_article_category_parent): ?>
                                                <option <?php if($s_article_category_parent->article_category_id == set_value('article_category_group_id')){ echo "selected"; } ?> value="<?php  echo $s_article_category_parent->article_category_id; ?>"><?php echo $s_article_category_parent->article_category_name; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <?php echo form_error('article_category_parent','<p class="help-block mess_required">','</p>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Trạng thái </label>
                                        <select class="form-control" name="article_category_active">
                                            <?php
                                                $arr_status[0] = 'Khóa';
                                                $arr_status[1] = 'Kích hoạt';
                                            ?>
                                            <option value="">Chọn trạng thái</option>
                                            <?php foreach($arr_status as $key=>$value): ?>
                                                <option <?php if($key == set_value('article_category_active')){echo "selected"; } ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <?php echo form_error('article_category_active','<p class="help-block mess_required">','</p>'); ?>
                                    </div>
                                    <input value="Thêm" type="submit" class="btn btn-info btn-default" name="submit_form" />
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

