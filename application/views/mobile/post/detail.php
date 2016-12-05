<div id="content">
    <input type="hidden" value="/the-gioi/quan-he-quoc-te/is-giup-cham-dut-cuoc-chien-syria-3292464/" id="hdLinkSubject">
    <input type="hidden" value="IS giúp chấm dứt cuộc chiến Syria?" id="hdTitleSubject">
    <!--begin breakcum-->

    <div class="bar-folder">
        <a href="/the-gioi/" style="font-weight:bold; color:#666" class="breadCrum"><?php echo $article_category_info[0]->article_category_name; ?></a>
    </div>
    <!--end breakcum-->
    <div class="padding10">
        <!--begin content-->
        <div class="content_detail" id="content_detail" style="background: rgb(255, 255, 255) none repeat scroll 0% 0%;"><div id="divfirst" style="background: rgb(255, 255, 255) none repeat scroll 0% 0%; z-index: 990; position: relative;">
                <p class="time">
                    <?php echo getThu( getTimeFormat('l',$article_info[0]->article_created) ); ?>, <?php echo getTimeFormat('d/m/Y',$article_info[0]->article_created)." ".getTimeFormat('H:i',$article_info[0]->article_created); ?> </p>
                <p class="title">
                    <?php echo $article_info[0]->article_title; ?>
                </p>
                <p class="lead">
                    <?php echo $article_info[0]->article_summary; ?>
                 </p>

                <!--begin relate-->


                <!--end relate-->
                <!--begin content page-->


            </div>
            <div id="divend" style="background: rgb(255, 255, 255) none repeat scroll 0% 0%; z-index: 990; position: relative;" class="block_mobile_post">
                    <p class="Normal">
                        <?php echo $article_info[0]->article_content; ?>
                    </p>
                <p class="Normal tCenter"></p><div style="text-align:center;margin-bottom: 30px;">
            </div>

                <!--end content page-->
            </div>
        </div>
        <!--end content-->
        <div class="share">


            <div style="width:100px; float:left;margin-top:10px;">
                <div style="text-indent: 0px; margin: 0px; padding: 0px; background: transparent none repeat scroll 0% 0%; border-style: none; float: none; line-height: normal; font-size: 1px; vertical-align: baseline; display: inline-block; width: 90px; height: 20px;" id="___plusone_0"><iframe width="100%" frameborder="0" hspace="0" marginheight="0" marginwidth="0" scrolling="no" style="position: static; top: 0px; width: 90px; margin: 0px; border-style: none; left: 0px; visibility: visible; height: 20px;" tabindex="0" vspace="0" id="I0_1447859866812" name="I0_1447859866812" src="https://apis.google.com/u/0/se/0/_/+1/fastbutton?usegapi=1&amp;size=Medium&amp;width=100&amp;origin=http%3A%2F%2Fm.baodatviet.com.vn&amp;url=http%3A%2F%2Fbaodatviet.vn%2Fthe-gioi%2Fquan-he-quoc-te%2Fis-giup-cham-dut-cuoc-chien-syria%2F&amp;gsrc=3p&amp;ic=1&amp;jsh=m%3B%2F_%2Fscs%2Fapps-static%2F_%2Fjs%2Fk%3Doz.gapi.vi.gd99dRSQumM.O%2Fm%3D__features__%2Fam%3DEQ%2Frt%3Dj%2Fd%3D1%2Ft%3Dzcms%2Frs%3DAGLTcCMwamjWwHOBEuUCGSIQJkoa5C1WtA#_methods=onPlusOne%2C_ready%2C_close%2C_open%2C_resizeMe%2C_renderstart%2Concircled%2Cdrefresh%2Cerefresh%2Conload&amp;id=I0_1447859866812&amp;parent=http%3A%2F%2Fm.baodatviet.com.vn&amp;pfname=&amp;rpctoken=23587715" data-gapiattached="true" title="+1"></iframe></div>
            </div>
        </div>
        <div style="text-align:center">

        </div>
        <!-- -->

        <!--begin tag-->

        <div id="tag">
            <div class="tagIn">
                <?php $arr_tag = explode(',', $article_info[0]->article_title_tag); ?>
                <?php foreach($arr_tag as $s_arr_tag): ?>
                    <a title="Pháp" href="/tag?q=Pháp" onclick="EventTrack(_category,'Tag1','Tag Box');"><?php echo $s_arr_tag; ?></a>
               <?php endforeach; ?>
            </div>
        </div>



        <!--end tag-->
        <!--begin su kien lien quan-->


        <!--end su kien-->
    </div>
    <div id="divAnotherNews">
        <div class="divTitleAnotherNews">
            <span>Tin liên quan</span>
        </div>

        <div style="padding-left:20px">
            <?php foreach($article_relation as $s_article_relation): ?>
            <div style="padding-bottom:10px;clear:both">
                <a title="Cuộc chiến chống IS: Cơn thịnh nộ của Nga, Pháp" href="<?php echo base_url().'mobile/'.$s_article_relation->article_path; ?>">
                    <img width="140px" height="70px" style="vertical-align: text-top;float:left;padding-bottom:10px;padding-right:10px" src="<?php echo base_url().$s_article_relation->article_image; ?>">
                    <span class="spanTitle"> <?php echo $s_article_relation->article_title; ?> </span>
                </a>

            </div>
            <?php endforeach; ?>
        </div>

    </div>




    <br>

</div>
