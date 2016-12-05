<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url().'public/admin'; ?>/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Generic page styles -->
    <link rel="stylesheet" href="<?php echo base_url().'public/upload_jquery/'; ?>css/style.css">
    <!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
    <link rel="stylesheet" href="<?php echo base_url().'public/upload_jquery/'; ?>css/jquery.fileupload.css">
</head>
<body>
<div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-fixed-top .navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="https://github.com/blueimp/jQuery-File-Upload">jQuery File Upload</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="https://github.com/blueimp/jQuery-File-Upload/tags">Download</a></li>
                <li><a href="https://github.com/blueimp/jQuery-File-Upload">Source Code</a></li>
                <li><a href="https://github.com/blueimp/jQuery-File-Upload/wiki">Documentation</a></li>
                <li><a href="https://blueimp.net">&copy; Sebastian Tschan</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="container">
    <h1>jQuery File Upload Demo</h1>
    <h2 class="lead">Basic Plus version</h2>
    <ul class="nav nav-tabs">
        <li><a href="basic.html">Basic</a></li>
        <li class="active"><a href="basic-plus.html">Basic Plus</a></li>
        <li><a href="index.html">Basic Plus UI</a></li>
        <li><a href="angularjs.html">AngularJS</a></li>
        <li><a href="jquery-ui.html">jQuery UI</a></li>
    </ul>
    <br>
    <blockquote>
        <p>File Upload widget with multiple file selection, drag&amp;drop support, progress bar, validation and preview images, audio and video for jQuery.<br>
            Supports cross-domain, chunked and resumable file uploads and client-side image resizing.<br>
            Works with any server-side platform (PHP, Python, Ruby on Rails, Java, Node.js, Go etc.) that supports standard HTML form file uploads.</p>
    </blockquote>
    <br>
    <!-- The fileinput-button span is used to style the file input field as button -->
    <span class="btn btn-success fileinput-button">
        <i class="glyphicon glyphicon-plus"></i>
        <span>Add files...</span>
        <!-- The file input field used as target for the file upload widget -->
        <input id="fileupload" type="file" name="usersfile" multiple>
    </span>
    <br>
    <br>
    <!-- The global progress bar -->
    <div id="progress" class="progress">
        <div class="progress-bar progress-bar-success"></div>
    </div>
    <!-- The container for the uploaded files -->
    <div id="files" class="files"></div>
    <br>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Demo Notes</h3>
        </div>
        <div class="panel-body">
            <ul>
                <li>The maximum file size for uploads in this demo is <strong>999 KB</strong> (default file size is unlimited).</li>
                <li>Only image files (<strong>JPG, GIF, PNG</strong>) are allowed in this demo (by default there is no file type restriction).</li>
                <li>Uploaded files will be deleted automatically after <strong>5 minutes or less</strong> (demo files are stored in memory).</li>
                <li>You can <strong>drag &amp; drop</strong> files from your desktop on this webpage (see <a href="https://github.com/blueimp/jQuery-File-Upload/wiki/Browser-support">Browser support</a>).</li>
                <li>Please refer to the <a href="https://github.com/blueimp/jQuery-File-Upload">project website</a> and <a href="https://github.com/blueimp/jQuery-File-Upload/wiki">documentation</a> for more information.</li>
                <li>Built with the <a href="http://getbootstrap.com/">Bootstrap</a> CSS framework and Icons from <a href="http://glyphicons.com/">Glyphicons</a>.</li>
            </ul>
        </div>
    </div>
</div>

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
        $('#dataTables-example').DataTable({
            "language": {
                "sProcessing":  "?ang x? lý ...",
                "sLengthMenu": "Hi?n th? _MENU_ b?n ghi" ,
                "sZeroRecords": "Không có b?n ghi nào",
                "sEmptyTable": "Không có b?ng",
                "sInfo":  "Hi?n th? _START_ ??n  _END_  c?a  _TOTAL_ b?n ghi",
                "sInfoEmpty": "Không có thông tin",
                "sInfoFiltered": "_MAX_ ",
                "sInfoPostFix": "",
                "sSearch": "Tìm ki?m",
                "sUrl": "",
                "sInfoThousands": ".",
                "sLoadingRecords": "?ang t?i .....",
                "oPaginate": {
                    "sFirst": "??u",
                    "sLast": "Cu?i",
                    "sNext": "Sau",
                    "sPrevious": "Tr??c"
                },
                "oAria": {
                    "sSortAscending": "T?ng d?n",
                    "sSortDescending": "Gi?m d?n"
                }
            },
            /*
             "aoColumnDefs": [
             null,
             null,
             { "bSortable": false,"aTargets": [ 0 ] }, // <-- disable sorting for column 3
             null
             ],
             */
//                "aoColumnDefs": [ { "bSortable": false, "aTargets": [ 2, 3 ] } ], "bAutoWidth": false,,
            "columnDefs": [ { "targets": 1, "orderable": false } ], // bo sap xep tai 1 cot
            responsive: true
        });
        // insert select
        var select_obj = '<div class="row">' +
            '<div class="col-sm-12">' +
            ' <select name="list_action" class="select_action form-control">' +
            '<option value="delete">Xóa</option>' +
            '<option value="publish">Kích ho?t</option>' +
            '<option value="unpublish">Khóa</option>' +
            '</select> ' +
            '<input type="submit" name="btn_action" class="btn btn-info request_action"  value="Th?c hi?n"/>' +
            '</div>'+
            '</div>';
        $(select_obj).insertAfter("#dataTables-example_wrapper .row:nth-child(2)");
        $(".custom_table thead tr th:first-child").removeClass('sorting_asc');
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
<script>
    /*jslint unparam: true, regexp: true */
    /*global window, $ */
    $(function () {
        'use strict';
        // Change this to the location of your server-side upload handler:
        var url = window.location.hostname === 'http://localhost/cms/admin/article/addArticle/',
            uploadButton = $('<button/>')
                .addClass('btn btn-primary')
                .prop('disabled', true)
                .text('Processing...')
                .on('click', function () {
                    var $this = $(this),
                        data = $this.data();
                    $this
                        .off('click')
                        .text('Abort')
                        .on('click', function () {
                            $this.remove();
                            data.abort();
                        });
                    data.submit().always(function () {
                        $this.remove();
                    });
                });
        $('#fileupload').fileupload({
            url: url,
            dataType: 'json',
            autoUpload: false,
            acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
            maxFileSize: 999000,
            // Enable image resizing, except for Android and Opera,
            // which actually support image resizing, but fail to
            // send Blob objects via XHR requests:
            disableImageResize: /Android(?!.*Chrome)|Opera/
                .test(window.navigator.userAgent),
            previewMaxWidth: 100,
            previewMaxHeight: 100,
            previewCrop: true
        }).on('fileuploadadd', function (e, data) {
            data.context = $('<div/>').appendTo('#files');
            $.each(data.files, function (index, file) {
                var node = $('<p/>')
                    .append($('<span/>').text(file.name));
                if (!index) {
                    node
                        .append('<br>')
                        .append(uploadButton.clone(true).data(data));
                }
                node.appendTo(data.context);
            });
        }).on('fileuploadprocessalways', function (e, data) {
            var index = data.index,
                file = data.files[index],
                node = $(data.context.children()[index]);
            if (file.preview) {
                node
                    .prepend('<br>')
                    .prepend(file.preview);
            }
            if (file.error) {
                node
                    .append('<br>')
                    .append($('<span class="text-danger"/>').text(file.error));
            }
            if (index + 1 === data.files.length) {
                data.context.find('button')
                    .text('Upload')
                    .prop('disabled', !!data.files.error);
            }
        }).on('fileuploadprogressall', function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress .progress-bar').css(
                'width',
                progress + '%'
            );
        }).on('fileuploaddone', function (e, data) {
            $.each(data.result.files, function (index, file) {
                if (file.url) {
                    var link = $('<a>')
                        .attr('target', '_blank')
                        .prop('href', file.url);
                    $(data.context.children()[index])
                        .wrap(link);
                } else if (file.error) {
                    var error = $('<span class="text-danger"/>').text(file.error);
                    $(data.context.children()[index])
                        .append('<br>')
                        .append(error);
                }
            });
        }).on('fileuploadfail', function (e, data) {
            $.each(data.files, function (index) {
                var error = $('<span class="text-danger"/>').text('File upload failed.');
                $(data.context.children()[index])
                    .append('<br>')
                    .append(error);
            });
        }).prop('disabled', !$.support.fileInput)
            .parent().addClass($.support.fileInput ? undefined : 'disabled');
    });
</script>
<script src="<?php echo base_url().'public/admin'; ?>/js/morris-data.js"></script>
<script src="<?php echo base_url().'public/admin'; ?>/js/bootstrap-select.js"></script>
<script src="<?php echo base_url().'public/admin'; ?>/js/library_site.js"></script>
<script src="<?php echo base_url().'public/'; ?>/tinymce/js/tinymce/tinymce.min.js"></script>
<script src="<?php echo base_url().'public/tagsinput/'; ?>/src/bootstrap-tagsinput.js"></script>
<script src="<?php echo base_url().'public/tagsinput'; ?>/src/bootstrap-tagsinput-angular.js"></script>
</body>
</html>