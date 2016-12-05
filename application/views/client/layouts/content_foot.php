<div id="two_col_home" class="width_common">
    <div class="w660 left">
        <!--BEGIN BODY -->

        <?php foreach($list_category_article as $s_list_category_article): ?>
            <?php if($s_list_category_article->article_category_id == 5 || $s_list_category_article->article_category_id == 6|| $s_list_category_article->article_category_id == 4|| $s_list_category_article->article_category_id == 14): ?>
                <div id="folder_8842" class="box_660 width_common">

                    <div class="bar_box_home">
                        <div class="left folder_8842" style="border-top-width:2px;border-top-style:solid;padding-left:10px">
                            <h3 class="h3-seo"><a title="<?php echo $s_list_category_article->article_category_name; ?>" class="folder_name_home folder_8842" onclick="EventTrack(_category,'Bar_Chinhtrixahoi','Ch�nh tr? - X� h?i');" href="/chinh-tri-xa-hoi/"><?php echo $s_list_category_article->article_category_name; ?></a></h3>
                        </div>
                    </div>
                    <div class="content_660 width_common">
                        <div class="main_news_folder">
                            <?php $tk=1; ?>
                            <?php foreach($list_article as $s_list_article): ?>
                                <?php if($s_list_article->article_category_id == $s_list_category_article->article_category_id && $tk<=1 ): ?>
                                    <a title="<?php echo $s_list_article->article_title; ?>" class="thumb" href="<?php echo base_url().$s_list_article->article_path; ?>" >
                                        <img width="260px" height="146px" title="" alt="T�n S?n Nh?t: �n t?c do xe c�ng ?? sai quy ??nh" src="<?php echo base_url().$s_list_article->article_image; ?>">
                                    </a>
                                    <?php $tk++; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>

                        </div>
                        <?php $i = 1; ?>
                        <ul class="list_660 list_category_bottom" >
                            <?php foreach($list_article as $s_list_article): ?>
                                <?php if($s_list_article->article_category_id == $s_list_category_article->article_category_id && $i <=4  ): ?>
                                    <li class="title">
                                        <a style="font-size:15px" href="<?php echo base_url().$s_list_article->article_path; ?>" >
                                            <?php echo $s_list_article->article_title; ?>
                                        </a>
                                    </li>
                                    <?php $i++; ?>
                                <?php endif; ?>

                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>


        <!--END BODY -->
        <!--BEGIN Home/Artical.ascx-->

    </div>



</div>


<!--END MAIN CONTENT------------------------------------------------------------------->


<script type="text/javascript" src="<?php echo base_url().'public/client/' ?>Scripts/lazyload.js"></script>

