<div id="content_cm">
    <div class="cnn_contentarea cnn_filterareabox width_common_cm">
        <div class="cnn_sdbx">
            <div class="cnn_sdbx1">
                <div class="cnn_sdbx2">
                    <div class="cnn_sdbx3">
                        <div class="cnn_sdbx4">
                            <div class="cnn_sdbx5">
                                <div class="cnn_sdbxcntnt">
                                    <div style="width: 980px;">
                                        <div class="cnn_fabheader">
                                            <div class="cnn_fabh1" style="color: #e54028">
                                                Sự Kiện</div>
                                            <div id="cnnGalleryTabs" class="cnn_fabh2">
                                            </div>
                                            <div class="cnn_clear">
                                            </div>
                                        </div>

                                        <div id="cnn_fabcontent" class="cnn_fabcontentarea">
                                            <div id="cnn_fabcprev" class="cnn_prev_sk" onclick="EventTrack(_category,'Quaylai_Chuyende','Chuy�n ??');">
                                            </div>
                                            <div class="cnn_fabcaholder">
                                                <div class="cnn_fabcawindow">
                                                    <div class="cnn_fabcaslide">
                                                        <div id="cnn_GalleryViewPort">
                                                            <div class="slider_container">
                                                                <?php $z =1; ?>
                                                                <?php foreach($list_category_article as $s_list_category_article): ?>
                                                                    <div class=" item_slider slide<?php echo $z; ?>">

                                                                        <ul class="ul_five_cm">
                                                                            <?php foreach($list_article as $s_list_article): ?>
                                                                                <?php if($s_list_article->article_category_id == $s_list_category_article->article_category_id && $z <=5): ?>
                                                                                    <li>
                                                                                        <a href="<?php echo base_url().$s_list_article->article_path; ?>" onclick="EventTrack(_category,'Chuyende'+'1','Chuy�n ??');" class="aImg_cm">
                                                                                            <img class="lazyTopic" id="imageTopic0" src="<?php echo base_url().$s_list_article->article_image; ?>" width="160px" height="90px" />
                                                                                        </a>
                                                                                        <p class="title_cm">
                                                                                            <a href="<?php echo base_url().$s_list_article->article_path; ?>" onclick="EventTrack(_category,'Chuyende'+'1','Chuy�n ??');">
                                                                                                <?php echo $s_list_article->article_title; ?>
                                                                                            </a>
                                                                                        </p>
                                                                                    </li>
                                                                                <?php endif; ?>
                                                                            <?php endforeach; ?>
                                                                        </ul>
                                                                    </div>
                                                                    <?php $z++; ?>
                                                                <?php endforeach; ?>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="cnn_fabcnext" class="cnn_next_sk" onclick="EventTrack(_category,'Xemtiep_Chuyende','Chuy�n ??');">
                                            </div>
                                            <div class="cnn_clear">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<input type="hidden" id="hdTotalTopic" value="124" />
<script type="text/javascript" src="<?php echo base_url(); ?>/public/client/Scripts/circle_slide.js"></script>
<script type="text/javascript">
    $('.cnn_fabcontentarea .slider_container').cycle({
        fx: 'fade',
        timeout: 100000000,
        prev: '.cnn_fabcontentarea .cnn_prev_sk',
        next: '.cnn_fabcontentarea .cnn_next_sk'
    });
    $(document).ready(function () {
        try {
            var iOS = (navigator.userAgent.match(/(iPad|iPhone|iPod)/g) ? true : false);
            if (iOS) {
                $('.slide00').width(900);
                $('#caption0').width(624);
            }
        }
        catch (e) {
        }
    });
</script>
<!--Show Banner FOOTER-->

<!--FOOTER_BANNER.ascx-->
<div id="divFooterBanner" class="banner_980 width_common">

</div>




<div id="footer" class="width_common">
    <div class="contact_f">
        <a href="" target="_blank" class="lienhe ct_adv">Liên hệ quảng cáo</a>
        <a href="/lien-he/" class="lienhe ct_toasoan">Thông tin tòa soạn</a>
        <a href="#wrap" class="vedautrang">Về đầu trang</a>
    </div>




    <div class="copyRight">
        <a href="#" class="f_logo">
            Trí việt
        </a>
        <div class="right_cp">
            <p class="baodatviet">© TRÍ VIỆT - DIỄN ĐÀN CỦA LIÊN HIỆP CÁC HỘI KHOA HỌC VÀ KỸ THUẬT VIỆT NAM</p>
            <p class="giayphep">
                Giấy phép: Số 57/GP-BTTTT, Bộ Thông tin và Truyền thông cấp ngày 01/03/2013. Tổng biên tập: Vũ Hữu Nghị. <br />
                Tòa soạn: 3/C11, Ngõ 17, Hoàng Ngọc Phách, Đống Đa, Hà Nội. Điện thoại và fax: 0432 484 645
            </p>
        </div>
    </div>
    <div style="width: 100%; height: 1px; overflow-y: hidden;"><a title="Báo bóng đá, tin tức bóng đá việt nam và quốc tế , choibong.vn" href="http://choibong.vn" style="color: rgb(255, 255, 255);">Báo bóng đá, tin tức bóng đá việt nam và quốc tế , choibong.vn</a></div>
</div>


</div>

<script type="text/javascript">


    $('.vedautrang').click(function () {
        $("html, body").animate({ scrollTop: $('#wrap').offset().top }, 800);
    })


</script>

<script type="text/javascript" src="<?php echo base_url().'public/client/js/library_site.js'; ?>"></script>
<script type="text/javascript" src="<?php echo base_url().'public/client/js/site.js'; ?>"></script>
</body>
</html>
