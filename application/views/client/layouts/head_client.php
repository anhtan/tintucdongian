<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#"
      xmlns:fb="https://www.facebook.com/2008/fbml">
<head id="ctl00_Head1">

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><link rel="SHORTCUT ICON" href="<?php echo base_url(); ?>/public/client/images/logo_old.png" />
    <title>Tin tức xã hội chính trị việt nam mới nhất</title>
    <meta name="description" content="Tin tuc xa hoi chính trị mới nhất trong ngày cập nhật liên tục các chuyên mục thời sự giáo dục đảng cộng sản Việt Nam mới nhất" />
    <meta name="keywords" content="tin tức xã hội, tin tuc xa hoi" />

    <meta http-equiv="REFRESH" content="900" /><meta name="robots" content="index, follow, noodp" />
    <meta property="article:author" content="https://www.facebook.com/baodatviet" />
    <link href="<?php echo base_url(); ?>/public/client/Content/default.css?t=11212221e" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>/public/client/Content/jquery.jscrollpane.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>/public/client/Content/site.css" rel="stylesheet" type="text/css" />
   <!-- <link rel="alternate" media="only screen and (max-width: 640px)" href="http://101.99.19.43/demo/portal/cms/" />-->
    <!--ADS-->
    <script type="text/javascript" src="<?php echo base_url(); ?>/public/client/Scripts/jquery-1.8.2.js" ></script>


<!--    <script src="<?php /*echo base_url(); */?>/public/client/Scripts/datviet_dfp.js" type="text/javascript"></script>
-->    <!--End ADS-->
    <script type="text/javascript" src="<?php echo base_url(); ?>/public/client/Scripts/jquery-ui-1.9.0.custom.min.js" ></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/public/client/Scripts/Common.js?t=1112a112"></script>
    <script type="text/javascript">
        var _category = '';

    </script>

</head>
<body>
<div id="wrap">
    <div id="header" style="padding-bottom:0px">
        <h1 class="logo-home">
            <a href="/" class="logo left">
                <img alt="bao dat viet" title="báo đất việt" src="<?php echo base_url(); ?>/public/client/images/logo_new.png" style="margin-top:17px;" width="200" onclick="EventTrack(_category,'Logo','Logo');"/>
            </a>
        </h1>
        <div class="header_banner">

        </div>
    </div>
    <?php foreach($mod_info as $s_mod_info): ?>
    <?php if($s_mod_info->modules_name == 'navigation'): ?>
        <div id="menu" style="padding-bottom:5px; padding-top:10px" class="width_common" onmousemove="ResetMenuFormat(event)">
            <div id="menuID" style="float:left;">

                <ul class="ul_menu" >
<!--                    <li class="li_parent menu_home" id="menuHome" onmouseover="ShowDate()" >
                        <a href="/" onclick="EventTrack(_category,'TopMenu-chinh-tri-xa-hoi','Top Menu');" class="a_parent">
                            Trang chủ
                        </a>
                    </li>
-->
                    <?php foreach($list_navigation as $s_list_navigation) : ?>
                        <li onmouseover="ShowMenuActive('<?php echo $s_list_navigation->menu_client_id; ?>')" onmouseout="HideMenuActive('<?php echo $s_list_navigation->menu_client_id; ?>')" id="liMenu<?php echo $s_list_navigation->menu_client_id; ?>" class="li_parent menu_chinhtri">
                            <a menu_current="<?php echo $s_list_navigation->menu_client_alias.'.html'; ?>" id="aMenu<?php echo $s_list_navigation->menu_client_id; ?>" href="<?php echo base_url().$s_list_navigation->menu_client_path; ?>"  onclick="EventTrack(_category,'TopMenu-Chính trị - Xã hội','Top Menu');" class="a_parent" style="">
                                <?php echo $s_list_navigation->menu_client_name; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <input id="hdCountMainMenu" type="hidden" value="10" />
                <input id="hdSetPosHover" type="hidden" value="-1" />
                <input id="hdCurrentPos" type="hidden" value="0" />
                    <div class="ad_vertical">
                        <?php foreach($list_advertise as $s_list_advertise): ?>
                            <?php if($s_list_advertise->advertise_position == 2): ?>
                                <a href="<?php echo base_url().$s_list_advertise->advertise_link; ?>">
                                    <img class="size_ad_vertical" src="<?php echo base_url().$s_list_advertise->advertise_image; ?>" alt="">
                                </a>
                            <?php endif; ?>
                        <?php endforeach; ?>

                    </div>
            </div>
        </div>
    <?php elseif($s_mod_info->modules_name == 'advertise' && $s_mod_info->modules_position == 2) : ?>
        <?php echo "quang cao"; ?>
    <?php endif; ?>
    <?php endforeach; ?>