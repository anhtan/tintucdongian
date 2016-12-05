<div id="content" class="width_common">
    <div class="w480 left" id="left_col">

        <div class="top_story">
            <?php $abc = 1; ?>
            <?php foreach($list_article_by_category as $s_list_article_by_category): ?>
                <?php if($abc <=1): ?>
                <a onclick="EventTrack(_category,'Trang1_Tin'+'0','Tin chuyên mục');" class="thumb" href="<?php echo base_url().$s_list_article_by_category->article_path; ?>">
                    <img width="480px" height="270px" alt=" Việt-Trung trao đổi chân thành, thẳng thắn vấn đề trên biển" title=" Việt-Trung trao đổi chân thành, thẳng thắn vấn đề trên biển" src="<?php echo base_url().$s_list_article_by_category->article_image; ?>">
                </a>

                <p class="title" style="bottom: 70px;">
                    <a onclick="EventTrack(_category,'Trang1_Tin'+'0','Tin chuyên mục');" href="<?php echo base_url().$s_list_article_by_category->article_path; ?>">
                        <?php echo $s_list_article_by_category->article_title; ?>
                    </a>


                </p>
                 <?php endif; ?>
                <?php $abc++; ?>
            <?php endforeach; ?>
        </div>


        <ul class="list_top list_folder">
            <?php foreach($list_article_by_category as $s_list_article_by_category): ?>
                <li class="">
                    <a onclick="EventTrack(_category,'Trang1_Tin'+'1','Tin chuyên mục');" title="Bí thư Nguyễn Xuân Anh nhắc, du lịch Đà Nẵng phân bua" class="thumb" href="<?php echo base_url().$s_list_article_by_category->article_path; ?>">
                        <img width="119px" height="68px" title="Bí thư Nguyễn Xuân Anh nhắc, du lịch Đà Nẵng phân bua" alt="Bí thư Nguyễn Xuân Anh nhắc, du lịch Đà Nẵng phân bua" src="<?php echo base_url().$s_list_article_by_category->article_image; ?>">
                    </a>
                    <p class="title">
                        <a onclick="EventTrack(_category,'Trang1_Tin'+'1','Tin chuyên mục');" title="Bí thư Nguyễn Xuân Anh nhắc, du lịch Đà Nẵng phân bua" href="<?php echo base_url().$s_list_article_by_category->article_path ?>">
                            <?php echo $s_list_article_by_category->article_title; ?>
                        </a>
                    </p>
                    <p class="lead">
                        <?php echo $s_list_article_by_category->article_summary; ?>
                    </p>
                </li>
            <?php endforeach; ?>
        </ul>
        <div class="pagination_news width_common right">
            <?php  echo $this->pagination->create_links(); ?>
        </div>

    </div>
