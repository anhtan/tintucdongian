<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">

<title>SB Admin 2 - Bootstrap Admin Theme</title>

<!-- Bootstrap Core CSS -->
<link href="<?php echo base_url()."public/admin"; ?>/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- MetisMenu CSS -->
<link href="<?php echo base_url()."public/admin"; ?>/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="<?php echo base_url()."public/admin"; ?>/dist/css/sb-admin-2.css" rel="stylesheet">
<link href="<?php echo base_url()."public/admin"; ?>/dist/css/custom.css" rel="stylesheet">

<!-- Custom Fonts -->
<link href="<?php echo base_url()."public/admin"; ?>/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->


<body>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading block_mess">

                    <?php if((validation_errors() != "")): ?>
                            <?php echo validation_errors(); ?>
                    <?php elseif(@$error_mess != ""): ?>
                        <p><?php echo @$error_mess ;?></p>
                     <?php else: ?>
                        <h3 class="panel-title">Đăng nhập quản trị</h3>
                    <?php endif; ?>
                </div>
                <div class="panel-body">
                    <?php echo form_open(base_url_admin()."dashboard/login"); ?>
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Tên đăng nhập" name="users_name" type="text" value="<?php echo set_value('users_name'); ?>" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Mật khẩu" name="users_pass" type="password" value="<?php echo set_value('users_pass'); ?>">
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input name="remember" type="checkbox" value="Remember Me">Ghi nhớ
                                </label>
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            <input name="btn_login" class="btn btn-lg btn-success btn-block" type="submit" value="Đăng nhập"/>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="<?php echo base_url()."public/admin"; ?>/bower_components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url()."public/admin"; ?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url()."public/admin"; ?>/bower_components/metisMenu/dist/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url()."public/admin"; ?>/dist/js/sb-admin-2.js"></script>

</body>

</html>