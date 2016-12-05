<div class="form-group block_view_article">
    <img class="img_post_detail" src="<?php  echo base_url().$info_all[0]['article_image']; ?>" alt="">
</div>
<div class="form-group">
    <label>Tên bài viêt</label>
    <p class="help-block"><?php echo $info_all[0]['article_title']; ?></p>
</div>
<div class="form-group">
    <label>Bí danh</label>
    <p class="help-block"><?php echo $info_all[0]['article_alias']; ?></p>
</div>
<div class="form-group">
    <label>Đường dẫn</label>
    <p class="help-block"><?php echo $info_all[0]['article_path']; ?></p>
</div>
<div class="form-group">
    <label>Tóm tắt</label>
    <p class="help-block"><?php echo $info_all[0]['article_summary']; ?></p>
</div>
<div class="form-group">
    <label>Nội dung</label>
    <p class="help-block"><?php echo $info_all[0]['article_content']; ?></p>
</div>
<div class="form-group">
    <label>Danh mục cha</label>
    <p class="help-block"><?php echo $info_all[0]['article_category_id']; ?></p>
</div>
<div class="form-group">
    <label>Trạng thái</label>
    <?php if($info_all[0]['article_active'] == 1): ?>
        <p class="help-block"><?php echo "Hiện"; ?></p>
    <?php else: ?>
        <p class="help-block"><?php echo "Ẩn"; ?></p>
    <?php endif; ?>
</div>

