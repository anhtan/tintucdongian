
<div id="content">
    <div class="padding10">
        <!-- begin top story-->

        <div id="mostNew">
            <ul class="ul-tab_mostread">
                <li>
                    <a href="javascript:void(0)" class="tab_link_mostread active" rel="topstory_tab">Mới nhất</a>
                </li>
                <li>
                    <a href="javascript:void(0)" class="tab_link_mostread" rel="mostread_tab">Đọc nhiều</a>
                </li>
                <li>
                    <a href="javascript:void(0)" class="tab_link_mostread" rel="discuss_tab">Tri thức</a>
                </li>
            </ul>
            <ul class="list-home_mostread" id="topstory_tab" style="display: block;">

                <div id="top-news">
                    <div class="hot-news">
                        <?php $j = 1; ?>
                        <?php foreach($list_article as $s_list_article): ?>
                            <?php if($j <= 1): ?>
                            <p class="title">
                            <a href="<?php echo base_url().'mobile/'.$s_list_article['article_path']; ?>" title ="Trung Quốc hết đường lẩn tránh vấn đề Biển Đông" onclick="EventTrack(_category,'mNoibat'+'0','mNổi bật');"><?php echo $s_list_article['article_title']; ?></a>
                        </p>
                        <a href="<?php echo base_url().'mobile/'.$s_list_article['article_path']; ?>" class="aImg" title="Trung Quốc hết đường lẩn tránh vấn đề Biển Đông" onclick="EventTrack(_category,'mNoibat'+'0','mNổi bật');">
                            <img src="<?php echo base_url().$s_list_article['article_image']; ?>" width="140px" height="70px" />
                        </a>
                            <p class="lead">
                                <?php echo $s_list_article['article_title']; ?>
                            </p>
                            <?php endif; ?>
                            <?php $j++; ?>
                        <?php endforeach; ?>

                    </div>
                    <ul class="ul-top">
                        <?php $i = 1; ?>
                        <?php foreach($list_article as $s_list_article): ?>
                            <?php if($i>1 && $i <= 11): ?>
                                <li>
                                    <a href="<?php echo base_url().'mobile/'.$s_list_article['article_path']; ?>" class="aImg" title ="Ai đang nuôi IS?" onclick="EventTrack(_category,'mNoibat'+'1','mNổi bật');">
                                        <img src="<?php echo base_url().$s_list_article['article_image']; ?>" width="140px" height="70px" />
                                    </a>

                                    <p class="title"><a href="<?php echo base_url().'mobile/'.$s_list_article['article_path']; ?>" title ="Ai đang nuôi IS?" onclick="EventTrack(_category,'mNoibat'+'1','mNổi bật');"><?php echo $s_list_article['article_title']; ?></a></p>
                                </li>
                            <?php endif; ?>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </ul>
                </div>

            </ul>
            <ul class="list-home_mostread" id="mostread_tab">

                <div id="Div1">
                    <div class="hot-news">
                        <?php $ir = 1; ?>
                        <?php foreach($list_article_read as $s_list_all_article_read): ?>
                            <?php if($ir <= 1): ?>
                            <p class="title">
                                <a href="<?php echo base_url().'mobile/'.$s_list_all_article_read->article_path; ?>" title ="Sergei Shoigu - người kế vị Tổng thống Putin?" onclick="EventTrack(_category,'mNoibat'+'0','mNổi bật');">
                                    <?php echo $s_list_all_article_read->article_title; ?>
                                </a>
                            </p>
                            <a href="<?php echo base_url().'mobile/'.$s_list_all_article_read->article_path; ?>" class="aImg" title="Sergei Shoigu - người kế vị Tổng thống Putin?" onclick="EventTrack(_category,'mNoibat'+'0','mNổi bật');">
                                <img src="<?php echo base_url().$s_list_all_article_read->article_image; ?>" width="140px" height="70px" />
                            </a>

                            <p class="lead">
                                Ông Sergei Shoigu, Bộ trưởng Quốc phòng Nga hiện nay được coi là cái tên sáng giá nhất có thể thay thế tổng thống Putin nếu cần.&nbsp;
                            </p>
                             <?php endif; ?>
                            <?php $ir++; ?>
                        <?php endforeach; ?>
                    </div>
                    <ul class="ul-top">
                        <?php $jr = 1; ?>
                        <?php foreach($list_article_read as $s_list_all_article_read): ?>
                            <?php if($jr > 1 && $jr <=11): ?>
                        <li>
                            <a href="<?php echo base_url().'mobile/'.$s_list_all_article_read->article_path; ?>" class="aImg" title ="Elsin, sóng gió nước Nga và bóng dáng người Mỹ" onclick="EventTrack(_category,'mNoibat'+'1','mNổi bật');">
                                <img src="<?php echo base_url().$s_list_all_article_read->article_image; ?>" width="140px" height="70px" />
                            </a>

                            <p class="title"><a href="<?php echo base_url().'mobile/'.$s_list_all_article_read->article_path; ?>" title ="Elsin, sóng gió nước Nga và bóng dáng người Mỹ" onclick="EventTrack(_category,'mNoibat'+'1','mNổi bật');"><?php echo $s_list_all_article_read->article_title; ?></a></p>
                        </li>
                                <?php endif; ?>
                            <?php $jr++; ?>
                        <?php endforeach; ?>
                    </ul>
                </div>

            </ul>
            <ul class="list-home_mostread" id="discuss_tab">

                <div id="Div2">
                    <div class="hot-news">
                        <?php $id = 1; ?>
                        <?php foreach($list_diendan as $s_list_diendan): ?>
                            <?php if($id <= 1): ?>
                        <p class="title">
                            <a href="<?php echo base_url().'mobile/'.$s_list_diendan->article_path; ?>" title ="Phòng thủ Mỹ sẽ bị Status-6 Nga xuyên thủng" onclick="EventTrack(_category,'mNoibat'+'0','mNổi bật');">Phòng thủ Mỹ sẽ bị Status-6 Nga xuyên thủng</a>
                        </p>
                        <a href="<?php echo base_url().'mobile/'.$s_list_diendan->article_path; ?>" class="aImg" title="Phòng thủ Mỹ sẽ bị Status-6 Nga xuyên thủng" onclick="EventTrack(_category,'mNoibat'+'0','mNổi bật');">
                            <img src="http://rs100.galaxypub.vn/staticFile/Subject/2015/11/15/29166/suc-manh-ngam-hai-quan-nga-datviet.vn_151610480.jpg" width="140px" height="70px" />
                        </a>

                        <p class="lead">
                            Hôm 15/11, phát ngôn viên của Tổng thống Nga ông Dmitry Peskov đã khẳng định rằng hệ thống NMD không thể cứu Mỹ khỏi đe dọa hạt nhân ngầm.
                        </p>
                                <?php endif; ?>
                            <?php $id++; ?>
                        <?php endforeach; ?>
                    </div>
                    <ul class="ul-top">
                        <?php $jd = 1; ?>
                        <?php foreach($list_diendan as $s_list_diendan): ?>
                            <?php if($jd > 1 && $jd <=11): ?>
                            <li>
                                <a href="<?php echo base_url().'mobile/'.$s_list_diendan->article_path; ?>" class="aImg" title ="Đóng tàu Nga khốn đốn: Phải mua động cơ Trung Quốc" onclick="EventTrack(_category,'mNoibat'+'1','mNổi bật');">
                                    <img src="<?php echo base_url().$s_list_diendan->article_image; ?>" width="140px" height="70px" />
                                </a>
                                <p class="title"><a href="<?php echo base_url().'mobile/'.$s_list_diendan->article_path; ?>" title ="Đóng tàu Nga khốn đốn: Phải mua động cơ Trung Quốc" onclick="EventTrack(_category,'mNoibat'+'1','mNổi bật');"><?php echo $s_list_diendan->article_title; ?></a></p>
                            </li>
                             <?php endif; ?>
                            <?php $jd++; ?>
                        <?php endforeach; ?>
                    </ul>
                </div>

            </ul>
        </div>






        <!--end top story-->

        <!--begin hot new -->




        <div id="newest">

            <ul class="ul-tab">
                <li><a href="javascript:void(0)" class="tab_link active" rel="newest_tab" onclick="EventTrack(_category,'mBar_'+'mTinmoi','mTin mới');">Thể thao</a>
                </li>

                <li><a href="javascript:void(0)" class="tab_link" rel="image_tab" onclick="EventTrack(_category,'mBar_'+'mHinhAnh','mHình ảnh');">Công nghệ</a> </li>
            </ul>
            <ul class="list-home" id="newest_tab" style="display: block;">
                <?php $itt = 1; ?>
                <?php foreach($list_thethao as $s_list_thethao): ?>
                    <?php if($itt <= 8): ?>
                        <li><a href="<?php echo base_url().'mobile/'.$s_list_thethao->article_path; ?>" title = "Tàu sân bay Mỹ nối đuôi Pháp tới tham chiến Syria" onclick="EventTrack(_category,'mTinmoi'+'1','mTin mới');"><?php echo $s_list_thethao->article_title; ?></a></li>
                    <?php endif; ?>
                    <?php $itt++; ?>
                <?php endforeach; ?>
            </ul>

            <ul class="list-home" id="image_tab">
                <?php $icn = 1; ?>
                <?php foreach($list_congnghe as $s_list_congnghe): ?>
                    <?php if($icn <= 8): ?>
                        <li><a href="<?php echo base_url().'mobile/'.$s_list_congnghe->article_path; ?>" title = "Bom Saudi Arabia mua của Mỹ thông minh cỡ nào?" onclick="EventTrack(_category,'mHinhAnh'+'1','mHình ảnh');"><?php echo $s_list_congnghe->article_title; ?></a></li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </div>




        <!--end hot new -->

        <!--begin folder-->
        <?php $t = 1; ?>
        <?php foreach($list_category_article as $s_list_category_article): ?>
            <?php $iee=1; ?>

            <div class="box-home">
                    <div class="bar" >
                        <a href="<?php echo base_url().'mobile/category/'.$s_list_category_article->article_category_alias.'.html'; ?>" class="category_<?php echo $t; ?>"  ><?php echo $s_list_category_article->article_category_name; ?></a>
                    </div>
                    <?php foreach($list_article as $s_list_article): ?>
                        <?php if($s_list_article['article_category_id'] == $s_list_category_article->article_category_id && $iee <= 1): ?>
                            <div class="hot-box" style="overflow:hidden;">
                                <p class="title"> <a href="<?php echo base_url().'mobile/'.$s_list_article['article_path']; ?>" onclick="EventTrack(_category,'mChinhtrixahoi'+'0','mChính trị - Xã hội');"> <?php echo $s_list_article['article_title']; ?> </a> </p>
                                <a href="<?php echo base_url().'mobile/'.$s_list_article['article_path']; ?> " class="aImg" title="Con Chủ tịch TP.HCM làm Phó giám đốc Công an Đồng Nai" onclick="EventTrack(_category,'mChinhtrixahoi'+'0','mChính trị - Xã hội');">
                                    <img src=" <?php echo base_url().$s_list_article['article_image']; ?>" width="140px" height="79px" />
                                </a>
                                <p class="lead">
                                    <?php echo $s_list_article['article_summary']; ?>
                                </p>
                            </div>
                            <?php //echo $iee."<br>"; ?>
                            <?php $iee++; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>

                    <ul class="list-home list_home_mobile">
                        <?php $jtt = 1; ?>
                        <?php foreach($list_article as $s_list_article): ?>
                            <?php if( $jtt <=4  && $s_list_article['article_category_id'] == $s_list_category_article->article_category_id ): ?>
                                <li> <a href="<?php echo base_url().'mobile/'.$s_list_article['article_path']; ?>" title="Bộ trưởng Nội vụ thừa nhận nhiều nơi tự phong cấp hàm" onclick="EventTrack(_category,'mChinhtrixahoi'+'1','mChính trị - Xã hội');"> <?php echo $s_list_article['article_title']; ?> </a> </li>
                                <?php $jtt++; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>

                    </ul>
                </div>

            <?php $t++; ?>
        <?php endforeach; ?>



        <div style="text-align:center">
        </div>
        <br/>
        <!--end folder-->

    </div>

</div>