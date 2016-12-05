</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url().'public/admin/'; ?>/bower_components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url().'public/admin/'; ?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url().'public/admin/'; ?>/bower_components/metisMenu/dist/metisMenu.min.js"></script>
<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url().'public/admin/'; ?>/dist/js/sb-admin-2.js"></script>

<!-- Morris Charts JavaScript -->
<script src="<?php echo base_url().'public/admin'; ?>/bower_components/raphael/raphael-min.js"></script>
<script src="<?php echo base_url().'public/admin'; ?>/bower_components/morrisjs/morris.min.js"></script>
<!-- DataTables JavaScript -->
<script src="<?php echo base_url().'public/admin'; ?>/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url().'public/admin'; ?>/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>


<script>


    $(document).ready(function() {
        // goi bang va cac cau hinh ngon ngu
      var tabledata=  $('#dataTables-example').DataTable({
            "language": {
                "sProcessing":  "Đang xử lý ...",
                "sLengthMenu": "Hiển thị _MENU_ bản ghi" ,
                "sZeroRecords": "Không có bản ghi nào",
                "sEmptyTable": "Không có bảng",
                "sInfo":  "Hiển thị _START_ đến  _END_  của  _TOTAL_ bản ghi",
                "sInfoEmpty": "Không có thông tin",
                "sInfoFiltered": "_MAX_ ",
                "sInfoPostFix": "",
                "sSearch": "Tìm kiếm",
                "sUrl": "",
                "sInfoThousands": ".",
                "sLoadingRecords": "Đang tải .....",
                "oPaginate": {
                    "sFirst": "Đầu",
                    "sLast": "Cuối",
                    "sNext": "Sau",
                    "sPrevious": "Trước"
                },
                "oAria": {
                    "sSortAscending": "Tăng dần",
                    "sSortDescending": "Giảm dần"
                },


            },
            "columnDefs": [ { "targets": 1, "orderable": false } ], // bo sap xep tai 1 cot
            responsive: true,


        });
        // insert select action
        $(' #select_val').change(function(){
            $.fn.dataTable.ext.search.push(
                function( settings, data, dataIndex ) {
                    var select_val = $('#select_val').val();
                    var age = data[3]  || ""; // use data for the age column
                    if (  age == select_val)
                    {
                        return true;
                    }else if(select_val == "")
                    {
                        return true;
                    }else
                    {
                        return false;
                    }
                }
            );
                        tabledata.draw();

        });
        var select_obj = '<div class="row">' +
                            '<div class="col-sm-6">' +
                                ' <select name="list_action" class="select_action form-control">' +
                                        '<option value="delete">Xóa</option>' +
                                        '<option value="publish">Kích hoạt</option>' +
                                        '<option value="unpublish">Khóa</option>' +
                                    '</select> ' +
                                    '<input type="submit" name="btn_action" class="btn btn-info request_action"  value="Thực hiện"/>' +
                            '</div>'+
                         '</div>';
        $(select_obj).insertAfter("#dataTables-example_wrapper .row:nth-child(2)");

        /*-----------------------them select--------------------------*/


        $(".custom_table thead tr th:first-child").removeClass('sorting_asc');// xoa sap xep
        $(window).load(function(){
            $(".custom_table thead tr th:first-child").removeClass('sorting');
        });
        $(".custom_table thead tr th:last-child").removeClass('sorting');

    });

</script>


<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src="<?php echo base_url().'public/upload_jquery/'; ?>js/vendor/jquery.ui.widget.js"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src="//blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src="//blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
<!-- Bootstrap JS is not required, but included for the responsive demo navigation -->
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="<?php echo base_url().'public/upload_jquery/'; ?>js/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script src="<?php echo base_url().'public/upload_jquery/'; ?>js/jquery.fileupload.js"></script>
<!-- The File Upload processing plugin -->
<script src="<?php echo base_url().'public/upload_jquery/'; ?>js/jquery.fileupload-process.js"></script>
<!-- The File Upload image preview & resize plugin -->
<script src="<?php echo base_url().'public/upload_jquery/'; ?>js/jquery.fileupload-image.js"></script>
<!-- The File Upload audio preview plugin -->
<script src="<?php echo base_url().'public/upload_jquery/'; ?>js/jquery.fileupload-audio.js"></script>
<!-- The File Upload video preview plugin -->
<script src="<?php echo base_url().'public/upload_jquery/'; ?>js/jquery.fileupload-video.js"></script>
<!-- The File Upload validation plugin -->
<script src="<?php echo base_url().'public/upload_jquery/'; ?>js/jquery.fileupload-validate.js"></script>

<script src="<?php echo base_url().'public/admin'; ?>/js/bootstrap-select.js"></script>
<script src="<?php echo base_url().'public/admin'; ?>/js/library_site.js"></script>
<script src="<?php echo base_url().'public'; ?>/tinymce/js/tinymce/tinymce.min.js"></script>
<script src="<?php echo base_url().'public/tagsinput/'; ?>/src/bootstrap-tagsinput.js"></script>
<script src="<?php echo base_url().'public/tagsinput'; ?>/src/bootstrap-tagsinput-angular.js"></script>

<!-- Process upload --------->
<script src="<?php echo base_url().'public/upload_jquery/'; ?>js/process_upload.js"></script>
<script></script>
<script src="<?php echo base_url().'public/admin'; ?>/js/admin.js"></script>
<script src="<?php echo base_url().'public/admin'; ?>/js/morris-data.js"></script>
</body>

</html>
