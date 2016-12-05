<div id="content">
    <!--begin paging-->


<!--    <div class="bar-folder"><a href="/quoc-phong/" style="display:block; float:left; width:95%" class="breadCrum"><?php /*echo $article_category_info[0]->article_category_name; */?></a><img style="margin-top:10px; cursor:pointer" onclick="ShowMenuAll()" src="<?php /*echo base_url().'public/mobile/' */?>images/drop_breadCrum.gif"></div>
-->
    <!--end paging-->

    <!--begin top-->

    <div id="top-folder">
        <div class="hot-news">
            <?php $i=1; ?>
            <?php foreach($list_article_by_category as $s_list_article_by_category): ?>
                <?php if($i<=1): ?>
                    <p class="title"> <a onclick="EventTrack(_category,'mTrang1_Tin'+'0','mTin chuyên mục');" href="<?php echo base_url().'mobile/'.$s_list_article_by_category->article_path; ?>"><?php echo $s_list_article_by_category->article_title; ?></a> </p>
                    <a onclick="EventTrack(_category,'mTrang1_Tin'+'0','mTin chuyên mục');" title="Nga - Mỹ mang vũ khí hạt nhân ra dọa nhau" class="aImg" href="<?php echo base_url().'mobile/'.$s_list_article_by_category->article_path; ?>">
                        <img width="170px" height="96px" title="Nga - Mỹ mang vũ khí hạt nhân ra dọa nhau" alt="Nga - Mỹ mang vũ khí hạt nhân ra dọa nhau" src="<?php echo base_url().$s_list_article_by_category->article_image; ?>">
                    </a>

                    <p class="lead"><?php echo $s_list_article_by_category->article_summary; ?></p>
                <?php endif; ?>
                <?php $i++; ?>
            <?php endforeach; ?>
        </div>
        <ul class="ul-top">
            <?php $j = 1; ?>
            <?php foreach($list_article_by_category as $s_list_article_by_category): ?>
                <?php if($j>1&& $j<=4): ?>
                    <li>
                        <a onclick="EventTrack(_category,'mTrang1_Tin'+'1','mTin chuyên mục');" title="Tuần dương hạm Moskva giúp giữ bầu trời Syria" class="aImg" href="<?php echo base_url().'mobile/'.$s_list_article_by_category->article_path; ?>">
                            <img width="140px" height="79px" title="Tuần dương hạm Moskva giúp giữ bầu trời Syria" alt="Tuần dương hạm Moskva giúp giữ bầu trời Syria" src="<?php echo base_url().$s_list_article_by_category->article_image; ?>">
                        </a>

                        <p class="title"><a onclick="EventTrack(_category,'mTrang1_Tin'+'1','mTin chuyên mục');" title="Tuần dương hạm Moskva giúp giữ bầu trời Syria" href="<?php echo base_url().'mobile/'.$s_list_article_by_category->article_path; ?>"><?php echo $s_list_article_by_category->article_title; ?></a></p>
                    </li>
                <?php endif; ?>
                <?php $j++; ?>
            <?php endforeach; ?>
        </ul>
    </div>


    <!--end top-->
    <!--Quảng cáo của Smaato-->


    <ul class="box-folder">
        <?php $t=1; ?>
        <?php foreach($list_article_by_category as $s_list_article_by_category): ?>
            <?php if($t>4 && $t <=12): ?>
            <li class="hot-box">
                <p class="title"> <a onclick="EventTrack(_category,'mTrang1_Tin'+'4','mTin chuyên mục');" href="<?php echo base_url().'mobile/'.$s_list_article_by_category->article_path; ?>"><?php echo $s_list_article_by_category->article_title; ?></a> </p>

                <a onclick="EventTrack(_category,'mTrang1_Tin'+'4','mTin chuyên mục');" title="Nga tung bộ 3 MBNB chiến lược sang Syria hủy diệt IS" class="aImg" href="<?php echo base_url().'mobile/'.$s_list_article_by_category->article_path; ?>">
                    <img width="140px" height="79px" title="Nga tung bộ 3 MBNB chiến lược sang Syria hủy diệt IS" alt="Nga tung bộ 3 MBNB chiến lược sang Syria hủy diệt IS" src="<?php echo base_url().$s_list_article_by_category->article_image; ?>">
                </a>
                <p class="time"> <b><?php echo date('H:i',strtotime( $s_list_article_by_category->article_created)) ; ?></b> | <?php echo date('d/m/Y',strtotime( $s_list_article_by_category->article_created)) ; ?></p>
                <p class="lead"><?php echo $s_list_article_by_category->article_summary; ?></p>
            </li>
            <?php  endif; ?>
            <?php $t++; ?>
        <?php endforeach; ?>

    </ul>
    <?php if(isset($next_page)&& $next_page != 0): ?>
    <div class="xemtiep"><a href="<?php echo base_url().'mobile/category/'.$article_category_info[0]->article_category_alias.'.html/'.$next_page; ?>" >Xem tiếp</a></div>
    <?php else : ?>
        <p></p>
    <?php endif; ?>


    <div style="text-align:center">
    </div>
    <br>



</div>