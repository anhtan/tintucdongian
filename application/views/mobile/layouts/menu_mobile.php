<div class="div-menu">
    <div class="searh-popup">
        <div class="search">

            <input name="txtSearchPageMain" id="txtSearchPageMain" onkeydown="return ProccessEnterSearchPage(event,this.value)" onfocus="CheckFocus('txtSearchPageMain')" onblur="if(this.value=='') this.value='Nh?p t? kh�a t�m ki?m...'" type="text" class="txt_search" />
            <input type="button" class="search_btt" onclick="btsearchPage_click('txtSearchPageMain');"/>
        </div>
    </div>
    <!--begin menu-->

    <ul class="ul_menu">
        <?php foreach($list_navigation as $s_list_navigation): ?>
            <li class="parent"><a href="<?php echo base_url()."mobile/".$s_list_navigation->menu_client_path; ?>" class="a_parent" onclick="EventTrack(_category,'mTopmenu-'+'Home','mTop Menu');"><?php echo $s_list_navigation->menu_client_name; ?></a></li>
        <?php endforeach; ?>
<!--        <li class="parent">
            <a href="/chinh-tri-xa-hoi/" class="a_parent " onclick="EventTrack(_category,'mTopmenu-'+'Ch�nh tr? - X� h?i','mTop Menu');">Ch�nh tr? - X� h?i

            </a>
            <div style="float:right; text-align:right;margin-top:-5%;"><img src="images/drop.png" class="haveChild"></div>

            <ul class="sub_menu" >

                <li><a href="/chinh-tri-xa-hoi/chinh-tri-viet-nam/">Ch�nh tr? Vi?t Nam</a> </li>

                <li><a href="/chinh-tri-xa-hoi/tin-tuc-thoi-su/">Tin t?c th?i s?</a> </li>

                <li><a href="/chinh-tri-xa-hoi/binh-luan/">B�nh lu?n</a> </li>

                <li><a href="/chinh-tri-xa-hoi/giao-duc/">Gi�o d?c</a> </li>

                <li><a href="/chinh-tri-xa-hoi/chuyen-de/">Chuy�n ??</a> </li>

            </ul>

        </li>
-->


    </ul>

    <!--end menu-->
</div>



<div style="text-align:center">
</div>