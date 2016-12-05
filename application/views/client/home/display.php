<!--BEGIN MAIN CONTENT----------------------------------------------------------------->

<div id="content" class="width_common">
    <div class="w480 left" id="left_col">
        <!--BEGIN COL 1 -->

        <!--TopStory : GetListTopStory -->

        <div class="top_story">
            <?php $ab = 1; ?>
            <?php foreach($list_article_order as $s_list_article_order): ?>
            <?php if($ab <=1): ?>
            <a title="Su-24/27 Nga xuyên phá hệ thống phòng không tàu sân bay Mỹ" onclick="EventTrack(_category,'Noibat'+'0','Nổi bật');" class="thumb" href="<?php echo base_url().$s_list_article_order->article_path; ?>">
                <img width="480px" height="270px" alt="Su-24/27 Nga xuyên phá hệ thống phòng không tàu sân bay Mỹ" title="Su-24/27 Nga xuyên phá hệ thống phòng không tàu sân bay Mỹ" src="<?php echo base_url().$s_list_article_order->article_image; ?>">
                <div class="frame480_270 png"></div>
            </a>

            <p class="title" style="bottom: 70px;">
                <a title="Su-24/27 Nga xuyên phá hệ thống phòng không tàu sân bay Mỹ"  href="<?php echo base_url().$s_list_article_order->article_path; ?>">
                    <?php echo $s_list_article_order->article_title; ?>
                </a>

            </p>
            <?php endif; ?>
                <?php $ab++; ?>
            <?php endforeach; ?>
        </div>
        <ul class="list_top">
            <?php foreach($list_category_article as $s_list_category_article): ?>
                <?php $i=1; ?>
                <?php foreach($list_article as $s_list_article): ?>
                    <?php if($s_list_article->article_category_id == $s_list_category_article->article_category_id && $i== 1): ?>
                        <li>
                            <a class="thumb" onclick="EventTrack(_category,'Noibat'+'1','Nổi bật');" href="">
                                <img width="119px" height="68px" alt="" title="Báo Mỹ gọi tàu ngầm Nga là " src="<?php echo base_url().$s_list_article->article_image; ?>">
                            </a>

                            <p class="title">
                                <a  href="<?php echo base_url().'category/'.$s_list_category_article->article_category_alias.'.html'; ?>">
                                    <?php echo $s_list_article->article_title; ?>
                                </a>
                            </p>
                            <div style="text-align:right;position:absolute;right:0px;bottom:8px;">
                                <a href="/quoc-phong/binh-luan-quan-su/">
                                    <img width="12px" src="<?php echo base_url().'public/client'; ?>/images/add.gif">
                                </a>
                            </div>

                        </li>
                        <?php $i++; ?>

                    <?php endif; ?>

                <?php endforeach; ?>
            <?php endforeach; ?>

        </ul>


        <!--END COL 1 -->
    </div>
