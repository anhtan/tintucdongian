<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-10">
            <h1 class="title_page page-header">
                <?php echo $title_page; ?>
            </h1>
        </div>
        <!-- /.col-lg-10 -->
        <div class="col-lg-2">
            <?php echo $back_home; ?>
        </div>
        <!-- /.col-lg-2 -->
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

                            <div class="row">
                                <div class="col-lg-6">
                                    <br>
                                    <div class="form-group">
                                        <!-- The container for the uploaded files -->
                                        <div id="files" class="files"></div>
                                        <img class="img_article" src="<?php if(isset($_SESSION['path_file_upload'])){echo base_url().$_SESSION['path_file_upload'];}else if( $update_info[0]->advertise_image ){ echo base_url().$update_info[0]->advertise_image ; } ?>" alt="">
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

                            <?php if(isset($update_info[0]->advertise_id)): ?>
                                <?php $id = $update_info[0]->advertise_id; ?>
                            <?php else : ?>
                                <?php $id = ""; ?>
                            <?php endif; ?>
                            <?php echo form_open_multipart(base_url_admin().'advertise/editAdvertise/'.$id.''); ?>

                                    <div class="form-group">
                                        <input class="form-control" name="advertise_id" value="<?php echo $update_info[0]->advertise_id; ?>" type="hidden" />
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" name="advertise_image" value="<?php if(isset($_SESSION['path_file_upload'])){echo $_SESSION['path_file_upload'];}else if( $update_info[0]->advertise_image ){ echo $update_info[0]->advertise_image ; } ?>" type="hidden" />
                                    </div>

                                    <div class="form-group">
                                        <label> Tiêu đề quảng cáo <span class="asterik_label"> (*)</span></label>
                                        <input class="input_normal form-control article_category_name" name="advertise_name" placeholder="Nhập Tiêu đề quảng cáo"  value="<?php if($update_info[0]->advertise_name) {echo $update_info[0]->advertise_name;}else if(set_value('advertise_name')){echo set_value('advertise_name');} ?>" type="text">
                                        <?php echo form_error('advertise_name','<p class="help-block mess_required">','</p>'); ?>
                                    </div>

                                    <div class="form-group">
                                        <label> Đường dẫn <span class="asterik_label"> (*)</span></label>
                                        <input class="input_normal form-control article_category_name" name="advertise_link" placeholder="Nhập Đường dẫn"  value="<?php if($update_info[0]->advertise_link) {echo $update_info[0]->advertise_link;}else if(set_value('advertise_link')){echo set_value('advertise_name');} ?>" type="text">
                                        <?php echo form_error('advertise_link','<p class="help-block mess_required">','</p>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label> Vị trí </label>
                                        <select name="advertise_position" class="form-control">
                                            <option value="0">Chọn danh mục</option>
                                                <?php foreach($position_module as $key=>$value): ?>
                                                <option  <?php if($update_info[0]->advertise_position == $key){echo "selected";} ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                                <?php endforeach; ?>
                                        </select>
                                        <?php echo form_error('article_category_parent','<p class="help-block mess_required">','</p>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label> Trạng thái </label>
                                        <select class="form-control " name="advertise_active">
                                            <?php
                                            $arr_status[0] = 'Khóa';
                                            $arr_status[1] = 'Kích hoạt';
                                            ?>
                                            <option value="">Chọn trạng thái</option>
                                            <?php foreach($arr_status as $key=>$value): ?>
                                                <option  <?php if($update_info[0]->advertise_active == $key){echo "selected"; } ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
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
