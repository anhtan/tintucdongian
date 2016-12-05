<script type="text/javascript" language="javascript">
    $(document).ready(function (e) {
        // tab moi nhat - noi bat
        $('.tab_link').click(function () {
            $('.ul-tab').find('.active').removeClass('active');
            $(this).addClass('active');
            var nameTab = $(this).attr('rel');
            $('#newest .list-home').hide();
            $('#' + nameTab).show();
        })


    });
    $(document).ready(function (e) {
        $('.tab_link_mostread').click(function () {
            $('.ul-tab_mostread').find('.active').removeClass('active');
            $(this).addClass('active');
            var nameTab = $(this).attr('rel');
            $('#mostNew .list-home_mostread').hide();
            $('#' + nameTab).show();
        })
    });
</script>




<div class="up_top"> <a style="cursor:pointer" id="uptop" onclick="EventTrack(_category,'mLendautrang','mLên đầu trang');"></a> </div>
<div id="footer">
    <div class="contact">
        <div class="call">
            <a href="http://baodatviet.vn/BGDVO.pdf" onclick="EventTrack(_category,'mLienHeQuangCao','mLiên hệ quảng cáo');">Liên hệ QC</a>
        </div>
        <div class="info">
            <a href="/lien-he/" onclick="EventTrack(_category,'mThongTinToaSoan','mThông tin tòa soạn');">Thông tin tòa soạn</a>
        </div>
    </div>
    <div class="ctFooter">
        <strong>© BÁO ĐẤT VIỆT</strong><br />
        DIỄN ĐÀN CỦA LIÊN HIỆP CÁC HỘI KHOA HỌC VÀ KỸ THUẬT VIỆT NAM<br /><br />

        <label>Giấy phép: Số 57/GP-BTTTT, Bộ Thông tin và Truyền thông cấp ngày 01/03/2013</label> <br />
        <label>Tòa soạn: </label>3/C11, Ngõ 17, Hoàng Ngọc Phách, Đống Đa, Hà Nội. <br />
        <label>Tổng biên tập:</label> Vũ Hữu Nghị. <br />
        <label>Điện thoại - fax:</label> 0432 484 645<br />
    </div>
</div>
<div class="buttonmoveup" onclick="MoveTop()"></div>
</div>




<script type="text/javascript" language="javascript">
    $(document).ready(function (e) {
        window.scrollTo(0, 1);
        //var t = $(document).width();
        //alert(t);
        $('.link-menu').click(function () {
            $('.div-menu').fadeToggle(500, "linear");
            if (!$(this).hasClass('menu_act')) {
                $(this).addClass('menu_act');
            } else {
                $(this).removeClass('menu_act');
            }
        })

        $('.ul_menu .parent').click(function () {

            if (!$(this).hasClass('showSub')) {
                $('.showSub').removeClass('showSub');
                $(this).addClass('showSub');
                $('.sub_menu').hide();
                $('.a_parent').removeClass('parent_act');
                $(this).find('.sub_menu').fadeIn();
                $(this).find('.a_parent').addClass('parent_act');
                $(this).find('.a_parent').css("background-color", "#666");
                $(this).find('.a_parent').css("color", "#fff");
            } else {
                $('.showSub').removeClass('showSub');
                $(this).find('.sub_menu').hide();
                $(this).find('.a_parent').removeClass('parent_act');
            }
        })


    });

    function MoveTop() {
        $('html,body').animate({ "scrollTop": "0" }, 600);

    }
    $(window).scroll(function () {
        var posY = $(window).scrollTop();
        if (posY > 100) {
            $('.buttonmoveup').css("display", "block");
        }
        else {
            $('.buttonmoveup').css("display", "none");
        }

    });
</script>



<div style="position:absolute;bottom: -10000px;left: -1000px;">
    <a href="http://www.dichvuketoanacb.biz">dich vu ke toan</a>
</div>


<!-- Bắc DVO order đưa lên ngày 29/7/2015-->
<!-- End Bắc -->
<script src="<?php echo base_url().'public/mobile/Scripts/mobile.js'; ?>"></script>
</body>
</html>
