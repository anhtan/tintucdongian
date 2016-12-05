<?php foreach($mod_info as $s_mod_info): ?>
<?php if($s_mod_info->modules_name == 'navigation'): ?>
<div id="menu" style="padding-bottom:5px; padding-top:10px" class="width_common" onmousemove="ResetMenuFormat(event)">
    <div id="menuID" style="float:left;">

        <ul class="ul_menu" >
            <li class="li_parent menu_home" id="menuHome" onmouseover="ShowDate()" >
                <a href="/" onclick="EventTrack(_category,'TopMenu-chinh-tri-xa-hoi','Top Menu');" class="a_parent">
                    Trang ch?
                </a>
            </li>

            <li onmouseover="ShowMenuActive('0')" onmouseout="HideMenuActive('0')" id="liMenu0" class="li_parent menu_chinhtri">
                <a id="aMenu0" href="/chinh-tri-xa-hoi/"  onclick="EventTrack(_category,'TopMenu-Chính tr? - Xã h?i','Top Menu');" class="a_parent" style="">
                    Ch&#237;nh tr? - X&#227; h?i
                </a>
            </li>


            <li onmouseover="ShowMenuActive('1')" onmouseout="HideMenuActive('1')" id="liMenu1" class="li_parent menu_chinhtri">
                <a id="aMenu1" href="/dien-dan-tri-thuc/" onclick="EventTrack(_category,'TopMenu-Di?n ?àn trí th?c','Top Menu');" class="a_parent" style="">
                    Di?n ?&#224;n tr&#237; th?c
                </a>
            </li>


            <li onmouseover="ShowMenuActive('2')" onmouseout="HideMenuActive('2')" id="liMenu2" class="li_parent menu_khoahoc">
                <a id="aMenu2" href="/khoa-hoc/" onclick="EventTrack(_category,'TopMenu-Khoa h?c','Top Menu');" class="a_parent" style="">
                    Khoa h?c
                </a>
            </li>


            <li onmouseover="ShowMenuActive('3')" onmouseout="HideMenuActive('3')" id="liMenu3" class="li_parent menu_kinhte">
                <a id="aMenu3" href="/kinh-te/" onclick="EventTrack(_category,'TopMenu-Kinh t?','Top Menu');" class="a_parent" style="">
                    Kinh t?
                </a>
            </li>


            <li onmouseover="ShowMenuActive('4')" onmouseout="HideMenuActive('4')" id="liMenu4" class="li_parent menu_thegioi">
                <a id="aMenu4" href="/the-gioi/" onclick="EventTrack(_category,'TopMenu-Th? gi?i','Top Menu');" class="a_parent" style="">
                    Th? gi?i
                </a>
            </li>


            <li onmouseover="ShowMenuActive('5')" onmouseout="HideMenuActive('5')" id="liMenu5" class="li_parent menu_quocphong">
                <a id="aMenu5" href="/quoc-phong/" onclick="EventTrack(_category,'TopMenu-Qu?c phòng','Top Menu');" class="a_parent" style="">
                    Qu?c ph&#242;ng
                </a>
            </li>


            <li onmouseover="ShowMenuActive('6')" onmouseout="HideMenuActive('6')" id="liMenu6" class="li_parent menu_vanhoa">
                <a id="aMenu6" href="/van-hoa/" onclick="EventTrack(_category,'TopMenu-V?n hóa','Top Menu');" class="a_parent" style="">
                    V?n h&#243;a
                </a>
            </li>


            <li onmouseover="ShowMenuActive('7')" onmouseout="HideMenuActive('7')" id="liMenu7" class="li_parent menu_doisong">
                <a id="aMenu7" href="/doi-song/" onclick="EventTrack(_category,'TopMenu-??i s?ng','Top Menu');" class="a_parent" style="">
                    ??i s?ng
                </a>
            </li>


            <li onmouseover="ShowMenuActive('8')" onmouseout="HideMenuActive('8')" id="liMenu8" class="li_parent menu_phapluat">
                <a id="aMenu8" href="/phap-luat/" onclick="EventTrack(_category,'TopMenu-Pháp lu?t','Top Menu');" class="a_parent" style="">
                    Ph&#225;p lu?t
                </a>
            </li>



        </ul>
        <input id="hdCountMainMenu" type="hidden" value="10" />
        <input id="hdSetPosHover" type="hidden" value="-1" />
        <input id="hdCurrentPos" type="hidden" value="0" />

        <div class="bar-top width_common" style="padding-bottom:5px">

            <div class="bar-left" style="width:590px">
                <span id="spanDate" style="display:none"> Th?? Ba?y, 07/11/2015 11:41</span>

                <ul id="ulSub0" style="width:100%; margin:0 auto; padding:0px; float:left; display:block">

                    <li style="list-style-type:none; float:left; padding:0 10px 0 0; margin:0 10px 0 0;">
                        <a href='/chinh-tri-xa-hoi/chinh-tri-viet-nam/' onmouseover="SetColor(this)" onmouseout="ResetColor(this)"  style="color:#01A4A4">Ch&#237;nh tr? Vi?t Nam</a>

                    </li>

                    <li style="list-style-type:disc; float:left; padding:0 10px 0 0; margin:0 10px 0 0;">
                        <a href='/chinh-tri-xa-hoi/tin-tuc-thoi-su/' onmouseover="SetColor(this)" onmouseout="ResetColor(this)"  style="color:#01A4A4">Tin t?c th?i s?</a>

                    </li>

                    <li style="list-style-type:disc; float:left; padding:0 10px 0 0; margin:0 10px 0 0;">
                        <a href='/chinh-tri-xa-hoi/binh-luan/' onmouseover="SetColor(this)" onmouseout="ResetColor(this)"  style="color:#01A4A4">B&#236;nh lu?n</a>

                    </li>

                    <li style="list-style-type:disc; float:left; padding:0 10px 0 0; margin:0 10px 0 0;">
                        <a href='/chinh-tri-xa-hoi/giao-duc/' onmouseover="SetColor(this)" onmouseout="ResetColor(this)"  style="color:#01A4A4">Gi&#225;o d?c</a>

                    </li>

                    <li style="list-style-type:disc; float:left; padding:0 10px 0 0; margin:0 10px 0 0;">
                        <a href='/chinh-tri-xa-hoi/chuyen-de/' onmouseover="SetColor(this)" onmouseout="ResetColor(this)"  style="color:#01A4A4">Chuy&#234;n ??</a>

                    </li>

                </ul>

                <ul id="ulSub2" style="width:100%; margin:0 auto; padding:0px; float:left; display:none">

                    <li style="list-style-type:none; float:left; padding:0 10px 0 0; margin:0 10px 0 0;">
                        <a href='/khoa-hoc/the-gioi-dong-vat/'  onmouseover="SetColor(this)" onmouseout="ResetColor(this)" style="color:#32742C">Th? gi?i ??ng v?t</a>
                    </li>

                    <li style="list-style-type:disc; float:left; padding:0 10px 0 0; margin:0 10px 0 0;">
                        <a href='/khoa-hoc/bi-an-khoa-hoc/'  onmouseover="SetColor(this)" onmouseout="ResetColor(this)" style="color:#32742C">B&#237; ?n khoa h?c</a>
                    </li>

                    <li style="list-style-type:disc; float:left; padding:0 10px 0 0; margin:0 10px 0 0;">
                        <a href='/khoa-hoc/quan-diem/'  onmouseover="SetColor(this)" onmouseout="ResetColor(this)" style="color:#32742C">Quan ?i?m</a>
                    </li>

                    <li style="list-style-type:disc; float:left; padding:0 10px 0 0; margin:0 10px 0 0;">
                        <a href='/khoa-hoc/khoa-hoc/'  onmouseover="SetColor(this)" onmouseout="ResetColor(this)" style="color:#32742C">Khoa h?c</a>
                    </li>

                    <li style="list-style-type:disc; float:left; padding:0 10px 0 0; margin:0 10px 0 0;">
                        <a href='/khoa-hoc/cong-nghe/'  onmouseover="SetColor(this)" onmouseout="ResetColor(this)" style="color:#32742C">C&#244;ng ngh?</a>
                    </li>

                </ul>

                <ul id="ulSub3" style="width:100%; margin:0 auto; padding:0px; float:left; display:none">

                    <li style="list-style-type:none; float:left; padding:0 10px 0 0; margin:0 10px 0 0;">
                        <a href='/kinh-te/thi-truong/'  onmouseover="SetColor(this)" onmouseout="ResetColor(this)" style="color:#F18D05">Th? tr??ng</a>
                    </li>

                    <li style="list-style-type:disc; float:left; padding:0 10px 0 0; margin:0 10px 0 0;">
                        <a href='/kinh-te/doanh-nghiep/'  onmouseover="SetColor(this)" onmouseout="ResetColor(this)" style="color:#F18D05">Doanh nghi?p</a>
                    </li>

                    <li style="list-style-type:disc; float:left; padding:0 10px 0 0; margin:0 10px 0 0;">
                        <a href='/kinh-te/dai-gia/'  onmouseover="SetColor(this)" onmouseout="ResetColor(this)" style="color:#F18D05">??i gia</a>
                    </li>

                    <li style="list-style-type:disc; float:left; padding:0 10px 0 0; margin:0 10px 0 0;">
                        <a href='/kinh-te/tai-chinh/'  onmouseover="SetColor(this)" onmouseout="ResetColor(this)" style="color:#F18D05">T&#224;i ch&#237;nh</a>
                    </li>

                    <li style="list-style-type:disc; float:left; padding:0 10px 0 0; margin:0 10px 0 0;">
                        <a href='/kinh-te/bat-dong-san/'  onmouseover="SetColor(this)" onmouseout="ResetColor(this)" style="color:#F18D05">B?t ??ng s?n</a>
                    </li>

                    <li style="list-style-type:disc; float:left; padding:0 10px 0 0; margin:0 10px 0 0;">
                        <a href='/kinh-te/bao-ve-nguoi-tieu-dung/'  onmouseover="SetColor(this)" onmouseout="ResetColor(this)" style="color:#F18D05">B?o v? ng??i ti&#234;u d&#249;ng</a>
                    </li>

                </ul>

                <ul id="ulSub4" style="width:100%; margin:0 auto; padding:0px; float:left; display:none">

                    <li style="list-style-type:none; float:left; padding:0 10px 0 0; margin:0 10px 0 0;">
                        <a href='/the-gioi/tin-tuc-24h/'  onmouseover="SetColor(this)" onmouseout="ResetColor(this)" style="color:#61AE24">Tin t?c 24h</a>
                    </li>

                    <li style="list-style-type:disc; float:left; padding:0 10px 0 0; margin:0 10px 0 0;">
                        <a href='/the-gioi/quan-he-quoc-te/'  onmouseover="SetColor(this)" onmouseout="ResetColor(this)" style="color:#61AE24">Quan h? qu?c t?</a>
                    </li>

                    <li style="list-style-type:disc; float:left; padding:0 10px 0 0; margin:0 10px 0 0;">
                        <a href='/the-gioi/ho-so/'  onmouseover="SetColor(this)" onmouseout="ResetColor(this)" style="color:#61AE24">H? s?</a>
                    </li>

                    <li style="list-style-type:disc; float:left; padding:0 10px 0 0; margin:0 10px 0 0;">
                        <a href='/the-gioi/chuyen-la/'  onmouseover="SetColor(this)" onmouseout="ResetColor(this)" style="color:#61AE24">Chuy?n l?</a>
                    </li>

                </ul>

                <ul id="ulSub5" style="width:100%; margin:0 auto; padding:0px; float:left; display:none">

                    <li style="list-style-type:none; float:left; padding:0 10px 0 0; margin:0 10px 0 0;">
                        <a href='/quoc-phong/vu-khi/'  onmouseover="SetColor(this)" onmouseout="ResetColor(this)" style="color:#D70060">V? kh&#237;</a>
                    </li>

                    <li style="list-style-type:disc; float:left; padding:0 10px 0 0; margin:0 10px 0 0;">
                        <a href='/quoc-phong/giao-duc-quoc-phong/'  onmouseover="SetColor(this)" onmouseout="ResetColor(this)" style="color:#D70060">Gi&#225;o d?c qu?c ph&#242;ng</a>
                    </li>

                    <li style="list-style-type:disc; float:left; padding:0 10px 0 0; margin:0 10px 0 0;">
                        <a href='/quoc-phong/quoc-phong-viet-nam/'  onmouseover="SetColor(this)" onmouseout="ResetColor(this)" style="color:#D70060">Qu?c ph&#242;ng Vi?t Nam</a>
                    </li>

                    <li style="list-style-type:disc; float:left; padding:0 10px 0 0; margin:0 10px 0 0;">
                        <a href='/quoc-phong/binh-luan-quan-su/'  onmouseover="SetColor(this)" onmouseout="ResetColor(this)" style="color:#D70060">B&#236;nh lu?n qu&#226;n s?</a>
                    </li>

                    <li style="list-style-type:disc; float:left; padding:0 10px 0 0; margin:0 10px 0 0;">
                        <a href='/quoc-phong/luc-luong-vu-trang/'  onmouseover="SetColor(this)" onmouseout="ResetColor(this)" style="color:#D70060">L?c l??ng v? trang</a>
                    </li>

                </ul>

                <ul id="ulSub6" style="width:100%; margin:0 auto; padding:0px; float:left; display:none">

                    <li style="list-style-type:none; float:left; padding:0 10px 0 0; margin:0 10px 0 0;">
                        <a href='/van-hoa/nguoi-viet/'  onmouseover="SetColor(this)" onmouseout="ResetColor(this)" style="color:#113F8C">Ng??i Vi?t</a>
                    </li>

                    <li style="list-style-type:disc; float:left; padding:0 10px 0 0; margin:0 10px 0 0;">
                        <a href='/van-hoa/tin-tuc-giai-tri/'  onmouseover="SetColor(this)" onmouseout="ResetColor(this)" style="color:#113F8C">Tin t?c gi?i tr&#237;</a>
                    </li>

                    <li style="list-style-type:disc; float:left; padding:0 10px 0 0; margin:0 10px 0 0;">
                        <a href='/van-hoa/phim/'  onmouseover="SetColor(this)" onmouseout="ResetColor(this)" style="color:#113F8C">Phim</a>
                    </li>

                    <li style="list-style-type:disc; float:left; padding:0 10px 0 0; margin:0 10px 0 0;">
                        <a href='/van-hoa/nguoi-dep/'  onmouseover="SetColor(this)" onmouseout="ResetColor(this)" style="color:#113F8C">Ng??i ??p</a>
                    </li>

                </ul>

                <ul id="ulSub7" style="width:100%; margin:0 auto; padding:0px; float:left; display:none">

                    <li style="list-style-type:none; float:left; padding:0 10px 0 0; margin:0 10px 0 0;">
                        <a href='/doi-song/gia-dinh/'  onmouseover="SetColor(this)" onmouseout="ResetColor(this)" style="color:#01A4A4">Gia ?&#236;nh</a>
                    </li>

                    <li style="list-style-type:disc; float:left; padding:0 10px 0 0; margin:0 10px 0 0;">
                        <a href='/doi-song/an-ngon/'  onmouseover="SetColor(this)" onmouseout="ResetColor(this)" style="color:#01A4A4">?n Ngon</a>
                    </li>

                    <li style="list-style-type:disc; float:left; padding:0 10px 0 0; margin:0 10px 0 0;">
                        <a href='/doi-song/du-lich/'  onmouseover="SetColor(this)" onmouseout="ResetColor(this)" style="color:#01A4A4">Du l?ch</a>
                    </li>

                    <li style="list-style-type:disc; float:left; padding:0 10px 0 0; margin:0 10px 0 0;">
                        <a href='/doi-song/suc-khoe/'  onmouseover="SetColor(this)" onmouseout="ResetColor(this)" style="color:#01A4A4">S?c kh?e</a>
                    </li>

                </ul>

                <ul id="ulSub8" style="width:100%; margin:0 auto; padding:0px; float:left; display:none">

                    <li style="list-style-type:none; float:left; padding:0 10px 0 0; margin:0 10px 0 0;">
                        <a href='/phap-luat/phap-dinh/'  onmouseover="SetColor(this)" onmouseout="ResetColor(this)" style="color:#E54028">Ph&#225;p ?&#236;nh</a>
                    </li>

                    <li style="list-style-type:disc; float:left; padding:0 10px 0 0; margin:0 10px 0 0;">
                        <a href='/phap-luat/ky-an/'  onmouseover="SetColor(this)" onmouseout="ResetColor(this)" style="color:#E54028">K? &#225;n</a>
                    </li>

                    <li style="list-style-type:disc; float:left; padding:0 10px 0 0; margin:0 10px 0 0;">
                        <a href='/phap-luat/tin-tuc-phap-luat/'  onmouseover="SetColor(this)" onmouseout="ResetColor(this)" style="color:#E54028">Tin t?c ph&#225;p lu?t</a>
                    </li>

                    <li style="list-style-type:disc; float:left; padding:0 10px 0 0; margin:0 10px 0 0;">
                        <a href='/phap-luat/te-nan-xa-hoi/'  onmouseover="SetColor(this)" onmouseout="ResetColor(this)" style="color:#E54028">T? n?n x&#227; h?i</a>
                    </li>

                </ul>

            </div>
            <div class="bar-right">
                <a rel="nofollow"  href="https://www.facebook.com/sharer/sharer.php?u=http://baodatviet.vn/chinh-tri-xa-hoi/" target="_blank"  class="like_social like_f" onclick="EventTrack(_category,'Button_Facebook','Button Facebook');" ></a>
                <a rel="nofollow"  href="http://www.twitter.com/share?url=http://baodatviet.vn/chinh-tri-xa-hoi/" target="_blank" class="like_social like_b" onclick="EventTrack(_category,'Button_Twitter','Button Twitter');"></a>
                <a rel="nofollow"  href="https://plus.google.com/share?url=http://baodatviet.vn/chinh-tri-xa-hoi/" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');EventTrack(_category,'Button_G+','Button G+');return false;" class="like_social like_g"></a>
                <!--<a rel="nofollow"  href="#" class="like_social like_tw"></a>-->
                <div class="search">

                    <script>
                        (function () {
                            var cx = '017271345374805835314:k7ux3zxszti';
                            var gcse = document.createElement('script');
                            gcse.type = 'text/javascript';
                            gcse.async = true;
                            gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//cse.google.com/cse.js?cx=' + cx;
                            var s = document.getElementsByTagName('script')[0];
                            s.parentNode.insertBefore(gcse, s);
                        })();
                    </script>
                    <gcse:search></gcse:search>
                </div>
            </div>
        </div>
    </div>
</div>
<?php elseif($s_mod_info->module_name == 'advertise') : ?>
    <?php echo "quang cao"; ?>
<?php endif; ?>
<?php endforeach; ?>