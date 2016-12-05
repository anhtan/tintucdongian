<div id="mid_col" class="w200 left">
    <!--BEGIN COL 2 -->

    <!--Box Mới Nhất : GetListLatestNews.ascx -->


    <div id="moinhat" class="width_common">
        <div class="bar_160 white" style="padding-bottom:5px;">
            <div class="bar_box_home">

                <div class="left folder_8842" style="border-top-width:2px;border-top-style:solid;padding-left:5px;padding-right:5px; border-top-color:#1E61BF;color:#1E61BF; width:43%">
                    <h3 class="h3-seo">Mới nhất</h3>
                </div>

            </div>
        </div>

        <div class="content_160" style="margin-top:-5px;">
            <ul class="list_200">
                <?php $i = 1; $j=1; ?>
                <?php foreach($list_article_order as $s_list_article_order): ?>
                    <?php if($i <= 1): ?>
                        <li class="big_news">

                            <a class="aImg" href="<?php echo $s_list_article_order->article_path; ?>" onclick="EventTrack(_category,'Tinmoi'+'0','Tin mới');" title="Việt Nam đàm phán mua tên lửa đối không của Nga?">
                                <img src="<?php echo base_url().$s_list_article_order->article_image; ?>" width="160px" height="90px" title="Việt Nam đàm phán mua tên lửa đối không của Nga?" alt="Việt Nam đàm phán mua tên lửa đối không của Nga?">
                            </a>

                            <p class="title">
                                <a href="<?php echo base_url().$s_list_article_order->article_path; ?>" onclick="EventTrack(_category,'Tinmoi'+'0','Tin mới');" >
                                    <?php echo $s_list_article_order->article_title; ?>
                                </a>
                            </p>
                        </li>
                    <?php endif; ?>
                    <?php $i++; ?>
                <?php endforeach; ?>
                <?php foreach($list_article_order as $s_list_article_order2): ?>
                    <?php if($j <=4): ?>
                        <li>
                            <p class="title">
                                <a href="<?php echo base_url().$s_list_article_order2->article_path; ?>" onclick="EventTrack(_category,'Tinmoi'+'1','Tin mới');" title="Trần Lập lên bàn mổ, tuyên bố xăm đè lên vết sẹo">
                                    <?php echo $s_list_article_order2->article_title; ?>
                                </a>
                            </p>
                        </li>
                    <?php endif; ?>
                    <?php $j++; ?>
                <?php endforeach; ?>

            </ul>
            <div class="clear_fix"></div>

        </div>

        <a href='/dien-dan-tri-thuc/'><img src="<?php echo base_url().'public/client/' ?>images/ddtt.png" alt="diendantrithuc" style="width:160px;height:25px;padding-left:20px;margin-top:-30px"></a>
    </div>
    <!--BoxDocNhieuNhatCap2.ascx-->

    <div id="docnhieunhat" class="width_common">
        <div class="bar_160">
            <div class="bar_box blue">
                Đọc nhiều nhất
            </div>
        </div>
        <div class="content_160">
            <?php $k=1;$l=1; ?>
            <ul class="list_200">
                <?php foreach($list_article_diendan as $s_list_article_diendan): ?>
                    <?php if($l<=1): ?>
                        <li class="big_news">
                            <a class="aImg" href="<?php echo base_url().$s_list_article_diendan->article_path; ?>" onclick="EventTrack(_category,'Docnhieunhat'+'0','Đọc nhiều nhất');" title="Gần 13.000 tỷ nuôi xe công, Việt Nam giàu hơn Hàn Quốc?">
                                <img src="<?php echo base_url().$s_list_article_diendan->article_image; ?>" width="160px" height="90px" alt="Gần 13.000 tỷ nuôi xe công, Việt Nam giàu hơn Hàn Quốc?" title="Gần 13.000 tỷ nuôi xe công, Việt Nam giàu hơn Hàn Quốc?">
                            </a>
                            <p class="title">
                                <a href="<?php echo base_url().$s_list_article_diendan->article_path; ?>" onclick="EventTrack(_category,'Docnhieunhat'+'0','Đọc nhiều nhất');" title="Gần 13.000 tỷ nuôi xe công, Việt Nam giàu hơn Hàn Quốc?">
                                    <?php echo $s_list_article_diendan->article_title; ?>
                                </a>
                            </p>
                        </li>
                    <?php endif; ?>
                    <?php $l++; ?>
                <?php endforeach; ?>
                <?php foreach($list_article_diendan as $s_list_article_diendan): ?>
                    <?php if($k <=4): ?>
                        <li >
                            <p class="title">
                                <a href="<?php echo base_url().$s_list_article_diendan->article_path; ?>" onclick="EventTrack(_category,'Docnhieunhat'+'1','Đọc nhiều nhất');" title="Người trẻ nhất vào Ban Chấp hành Đảng bộ Hà Nội">
                                    <?php echo $s_list_article_diendan->article_title; ?>
                                </a>
                            </p>
                        </li>
                    <?php endif; ?>
                    <?php $k++; ?>
                <?php endforeach; ?>
            </ul>


        </div>
    </div>

    <!--BoxNewsInFolder.ascx-->

</div>
<?php foreach($mod_info as $s_mod_info): ?>
    <div id="right_col" class="w300 left">
        <?php if($s_mod_info->modules_position==4 && $s_mod_info->modules_name == 'advertise'): ?>
            <?php foreach($list_advertise as $s_list_advertise): ?>
                <?php if($s_list_advertise->advertise_position == 4): ?>
                    <a href="<?php echo base_url().$s_list_advertise->advertise_link; ?>">
                        <img class="size_ad_right" src="<?php echo base_url().$s_list_advertise->advertise_image; ?>" alt="">
                    </a>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php elseif($s_mod_info->modules_position == 4 && $s_mod_info->modules_name == 'navigation'): ?>
        <?php endif; ?>
    </div>
<?php endforeach; ?>
