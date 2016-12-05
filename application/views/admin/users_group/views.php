<div class="form-group">
    <label>Tên quyền</label>
    <p class="help-block"><?php echo $info_all[0]['users_group_name']; ?></p>
</div>
<div class="form-group">
    <label>Quyền Xem</label>
    <?php $info_all[0]['users_group_view'] == 1 ? $info_all[0]['users_group_view']= "Kích hoạt" : $info_all[0]['users_group_view']= "Khóa"; ?>
    <p class="help-block"><?php echo $info_all[0]['users_group_view']; ?></p>
</div>
<div class="form-group">
    <label>Quyền Thêm</label>
    <?php $info_all[0]['users_group_add'] == 1 ? $info_all[0]['users_group_add']= "Kích hoạt" : $info_all[0]['users_group_add']= "Khóa"; ?>
    <p class="help-block"><?php echo $info_all[0]['users_group_add']; ?></p>
</div>
<div class="form-group">
    <label>Quyền Sửa</label>
    <?php $info_all[0]['users_group_edit'] == 1 ? $info_all[0]['users_group_edit']= "Kích hoạt" : $info_all[0]['users_group_edit']= "Khóa"; ?>
    <p class="help-block"><?php echo $info_all[0]['users_group_edit']; ?></p>
</div>
<div class="form-group">
    <label>Quyền Xóa</label>
    <?php $info_all[0]['users_group_delete'] == 1 ? $info_all[0]['users_group_delete']= "Kích hoạt" : $info_all[0]['users_group_delete']= "Khóa"; ?>
    <p class="help-block"><?php echo $info_all[0]['users_group_delete']; ?></p>
</div>
<div class="form-group">
    <label>Quyền Xóa Thành Viên</label>
    <?php $info_all[0]['users_group_delete_mem'] == 1 ? $info_all[0]['users_group_delete_mem']= "Kích hoạt" : $info_all[0]['users_group_delete_mem']= "Khóa"; ?>
    <p class="help-block"><?php echo $info_all[0]['users_group_delete_mem']; ?></p>
</div>
