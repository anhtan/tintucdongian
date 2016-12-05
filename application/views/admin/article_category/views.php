<div class="form-group">
    <p class="help-block fa  <?php echo $info_all[0]['article_category_image']; ?> fa-2x"></p>
</div>
<div class="form-group">
    <label>Tên danh mục</label>
    <p class="help-block"><?php echo $info_all[0]['article_category_name']; ?></p>
</div>
<div class="form-group">
    <label>Bí danh</label>
    <p class="help-block"><?php echo $info_all[0]['article_category_alias']; ?></p>
</div>
<div class="form-group">
    <label>Danh mục cha</label>
    <p class="help-block"><?php echo $info_all[0]['article_category_parent_id']; ?></p>
</div>
<div class="form-group">
    <label>Trạng thái</label>
    <?php if($info_all[0]['article_category_active'] == 1): ?>
        <p class="help-block"><?php echo "Hiện"; ?></p>
    <?php else: ?>
        <p class="help-block"><?php echo "Ẩn"; ?></p>
    <?php endif; ?>
</div>

