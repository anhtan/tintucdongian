<div class="w480 left" id="left_col">
    <div class="detail" id="detail">
        <div class="bar-left_th">
            <a class="cap1" onclick="_gaq.push(['_trackEvent','the-gioi','Click Menu the-gioi - Thế giới ','Thế giới']);" href="<?php echo base_url()."category/".$category_info[0]->article_category_alias.".html"; ?>">
                <?php echo $category_info[0]->article_category_name; ?></a>

<!--            <a class="cap2" onclick="_gaq.push(['_trackEvent','the-gioi','Click Menu the-gioi - Thế giới ','Thế giới']);" href="/the-gioi/tin-tuc-24h/">/
                Tin tức 24h</a>
-->
        </div>
        <h1 class="title">
            <?php echo $article_info[0]->article_title; ?>
        </h1>
        <h2 class="lead">

            (<a style="color: #1C609F; text-decoration: none" onclick="_gaq.push(['_trackEvent','the-gioi','Click Menu the-gioi - Thế giới ','Thế giới']);" href="<?php echo base_url()."category/".$category_info[0]->article_category_alias.".html"; ?>"><?php echo $category_info[0]->article_category_name; ?></a>)
            -
            <?php echo $article_info[0]->article_summary; ?>
        </h2>

        <ul class="ul_relate">
            <?php $rl = 1; ?>
            <?php foreach($article_relation as $s_article_ralation): ?>
            <?php if($rl <=2): ?>
                <li><a title="Máy bay Nga rơi: Vì sao Mỹ nỗ lực giúp Nga?" onclick="_gaq.push(['_trackEvent','the-gioi','Click tin liên quan the-gioi tin thứ 1 ','Tin liên quan']);" href="<?php echo base_url().$s_article_ralation->article_path; ?>">
                        <?php echo $s_article_ralation->article_title; ?></a></li>
            <?php endif; ?>
                <?php $rl++; ?>
            <?php endforeach; ?>

        </ul>
        <div class="content_post_detail">
            <?php echo $article_info[0]->article_content; ?>
        </div>

    </div>

    <div id="tag">
        <div class="tagIn">

            <?php foreach(explode(',',$article_info[0]->article_title_tag) as $s_tag): ?>
            <a content="<?php echo $s_tag; ?>" href="<?php echo base_url().'tag.html'; ?>">
                <?php echo $s_tag; ?>
            </a>
            <?php endforeach; ?>

        </div>
    </div>


    <div id="div-comment-content">
    </div>
    <script type="text/javascript">
        var $cmt = $('#div-comment-content');
        var comment = new Comment(_subjectID, $cmt);
    </script>
</div>