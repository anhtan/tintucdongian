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

                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-6">
                                    <br>
                                    <div class="form-group">
                                        <!-- The container for the uploaded files -->
                                        <div id="files" class="files"></div>
                                        <img class="img_article" src="<?php if(isset($_SESSION['path_file_upload'])){echo base_url().$_SESSION['path_file_upload'];} elseif(set_value('article_image')){ echo base_url().set_value('article_image'); }elseif(isset( $article[0]['article_image'])){echo base_url().$article[0]['article_image'];}
                                        elseif(( isset($_SESSION['path_file_upload']) && isset($article[0]['article_image']) && $_SESSION['path_file_upload'] != $article[0]['article_image'] )){ echo $_SESSION['path_file_upload']; } ?>" alt="">
                                    </div>

                                    <!-- The fileinput-button span is used to style the file input field as button -->
                                        <span class="btn btn-success fileinput-button">
                                            <i class="glyphicon glyphicon-plus"></i>
                                            <span>Thêm file...</span>
                                            <!-- The file input field used as target for the file upload widget -->
                                            <input id="fileupload" type="file" name="userfile" >
                                        </span>
                                    <br>
                                    <!-- The global progress bar -->
                                    <div id="progress" class="progress progress_upload progress-striped active">
                                        <div class="progress-bar progress-bar-success"></div>
                                    </div>

                                </div>
                            </div>
                            <?php $attributes = array('class' => $class_form); ?>
                            <?php echo form_open_multipart(base_url_admin().'article/editArticle/'.$article[0]['article_id'],$attributes); ?>

                            <div class="form-group">
                                <input type="hidden" name="article_userid_create" value="<?php echo $_SESSION['users_id']; ?>">
                                <input type="hidden" class="path_category_article" name="" value="<?php echo $path_category; ?>">
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="article_id" value="<?php echo $article[0]['article_id']; ?>">
                            </div>

                            <div class="form-group">
                                <input type="hidden" name="article_image" value="<?php if($article[0]['article_image']){ echo $article[0]['article_image']; }elseif(isset($_SESSION['path_file_upload'])){echo $_SESSION['path_file_upload'];} ?>">
                            </div>

                            <div class="form-group">
                                <label>Tên bài viết <span class="asterik_label"> (*)</span></label>
                                <input class="input_normal form-control medium_input article_title" name="article_title" value="<?php if($article[0]['article_title']){echo $article[0]['article_title']; }else {  echo set_value('article_title');} ?>" type="text">
                                <?php echo form_error('article_title','<p class="help-block mess_required">','</p>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Bí danh <span class="asterik_label"> (*)</span></label>
                                <input type="text" class="input_alias form-control medium_input article_alias" value="<?php if($article[0]['article_alias']){echo $article[0]['article_alias']; }else {  echo set_value('article_alias');} ?>" name="article_alias">
                                <?php echo form_error('article_alias','<p class="help-block mess_required">','</p>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Đường dẫn <span class="asterik_label"> (*)</span></label>
                                <input type="text" class="path_article input_path form-control medium_input article_path" value="<?php if($article[0]['article_path']){echo $article[0]['article_path']; }else {  echo set_value('article_path');} ?>" name="article_path">
                                <?php echo form_error('article_path','<p class="help-block mess_required">','</p>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Tóm tắt<span class="asterik_label"> (*)</span></label>
                                <textarea rows="3" cols="25" class="form-control" name="article_summary"><?php if($article[0]['article_summary']){echo $article[0]['article_summary']; }else {  echo set_value('article_summary');} ?></textarea>
                                <?php echo form_error('article_summary','<p class="help-block mess_required">','</p>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Nội dung <span class="asterik_label"> (*)</span></label>
                                <textarea rows="10" cols="35" class="form-control tinymce_text_area" name="article_content"><?php if($article[0]['article_content']){echo $article[0]['article_content']; }else {  echo set_value('article_content');} ?></textarea>
                                <?php echo form_error('article_content','<p class="help-block mess_required">','</p>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Tag</label><br>
                                <input type="text" name="article_title_tag" value="<?php if($article[0]['article_title_tag']){echo $article[0]['article_title_tag']; }else {  echo set_value('article_title_tag');} ?>" data-role="tagsinput" class="type_tag_input form-control medium_input" />
                            </div>
                            <div class="form-group">
                                <label>Danh mục tin </label>
                                <select name="article_category_id" class="form-control medium_input">
                                    <option value="0">Chọn danh mục</option>
                                    <?php foreach($article_category_info as $s_article_category_info): ?>
                                        <option <?php if($s_article_category_info->article_category_id == $article[0]['article_category_id'] ){ echo "selected"; } ?> value="<?php  echo $s_article_category_info->article_category_id; ?>"><?php echo $s_article_category_info->article_category_name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php echo form_error('article_category_id','<p class="help-block mess_required">','</p>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Trạng thái </label>
                                <select class="form-control medium_input" name="article_active">
                                    <?php
                                    $arr_status[0] = 'Khóa';
                                    $arr_status[1] = 'Kích hoạt';
                                    ?>
                                    <option value="">Chọn trạng thái</option>
                                    <?php foreach($arr_status as $key=>$value): ?>
                                        <option <?php if($article[0]['article_active']== $key){echo "selected"; } ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php echo form_error('article_active','<p class="help-block mess_required">','</p>'); ?>
                            </div>
                            <input value="Sửa" type="submit" class="btn btn-info btn-default send_info_post" name="submit_form" />
                            <button type="reset" class="btn btn-warning btn-default">Làm lại</button>
                            <?php echo form_close(); ?>
                        </div>
                        <!-- /.col-lg-6 (nested) -->
                        <div class="col-lg-4">
                            <p>Chú ý :  <span class="asterik_label"> (*)</span> là những mục bắt buộc phải nhập </p>
                            <p style="color:#337ab7;font-weight: bold;">Chọn danh mục để tạo đường dẫn tự động , lưu ý phải nhập bí danh trước</p>
                            <div class="panel panel-default block_list_article_category path_category ">
                                <div class="panel-heading">
                                    <span class="title_category_menu">Danh mục tin</span>
                                </div>
                                <div class="panel-body ">
                                    <ul>
                                        <?php foreach($list_article_category as $s_list_article_category): ?>
                                            <?php if($s_list_article_category->article_category_parent_id == 0): ?>
                                                <li title="<?php echo $s_list_article_category->article_category_alias; ?>"><?php echo $s_list_article_category->article_category_name; ?></li>
                                                <ul>
                                                    <?php foreach($list_sub_article_category as $s_list_sub_article_category): ?>
                                                        <?php if($s_list_sub_article_category->article_category_parent_id == $s_list_article_category->article_category_id): ?>
                                                            <li title="<?php echo $s_list_sub_article_category->article_category_alias; ?>"><?php echo "------ ".$s_list_sub_article_category->article_category_name ?></li>
                                                            <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </ul>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>

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
