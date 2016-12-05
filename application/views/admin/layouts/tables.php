<?php

if(isset($custom_option))
{
    $data_option = $custom_option;
}else
{
    $data_option = "";
}
if(isset($option_add))
{
    $data_option_add = $option_add;
}else
{
    $data_option_add = "";
}
$template = array(
    'table_open'            => '<table class="table table-striped table-bordered table-hover custom_table" id="dataTables-example">',

    'thead_open'            => '<thead>',
    'thead_close'           => '</thead>',

    'heading_row_start'     => '<tr>',
    'heading_row_end'       => '</tr>',
    'heading_cell_start'    => '<th>',
    'heading_cell_end'      => '</th>',

    'tbody_open'            => '<tbody>',
    'tbody_close'           => '</tbody>',

    'row_start'             => '<tr>',
    'row_end'               => '</tr>',
    'cell_start'            => '<td>',
    'cell_end'              => '</td>',

    'row_alt_start'         => '<tr>' ,
    'row_alt_end'           => '</tr>',
    'cell_alt_start'        => '<td>',
    'cell_alt_end'          => '</td>',

    'table_close'           => '</table>'
);
$this->table->set_template($template);
?>

<div id="page-wrapper">
    <div class="row">
        <?php if($data_option_add != ""): ?>
        <div class="col-lg-6">
            <h1 class="page-header title_page"><?php echo $title_page; ?></h1>
        </div>
        <div class="col-lg-6">
            <?php echo $data_option_add; ?>
        </div>
        <?php else: ?>
            <div class="col-lg-12">
                <h1 class="page-header title_page"><?php echo $title_page; ?></h1>
            </div>
        <?php endif; ?>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <?php $status_delete = $this->session->flashdata('status_action');
                    $status_manufact = $this->session->flashdata('mess_manufact');
                ?>
                <?php if($status_delete['type'] == 'success'): ?>
                    <div class="alert alert-success alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                         <?php echo $status_delete['mess']; ?>
                    </div>
                <?php elseif($status_delete['type']=='error') : ?>
                    <div class="alert alert-warning alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <?php echo $status_delete['mess']; ?>
                    </div>
                <?php endif; ?>
                <?php if($status_manufact['type'] == 'success'): ?>
                    <div class="alert alert-success alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                         <?php echo $status_manufact['mess']; ?>
                    </div>
                <?php elseif($status_manufact['type']=='error') : ?>
                    <div class="alert alert-warning alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <?php echo $status_manufact['mess']; ?>
                    </div>
                <?php endif; ?>
                <div class="panel-heading">
                    <?php echo $title_table; ?>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">

                        <?php echo form_open($link_form_process); ?>
                        <?php echo $data_option; ?>
                            <?php echo $this->table->generate(); ?>
                        <?php echo form_close(); ?>
                    </div>
                    <!-- /.table-responsive -->

                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->

        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
    </div>    <!-- /.row -->

</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
<!-- Modal view detail -->
<div  aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="viewDetail" class="modal fade in" style="display:none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header title_view_detail">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 id="myModalLabel" class="modal-title">Thông tin chi tiết</h4>
            </div>
            <div class="modal-body">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Đóng</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--- Modal view confirm delete -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="confirmDelete" class="modal fade" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 id="myModalLabel" class="modal-title">Bạn có muốn xóa : <span class="name_del"></span> </h4>
            </div>
            <div class="modal-footer">
                <a class="link_id" href=""> <button class="btn btn-primary" type="button">Xóa</button></a>
                <button data-dismiss="modal" class="btn btn-default" type="button">Đóng</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

