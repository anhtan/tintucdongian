

function GetAdsFolderDynamic(key, vt) {

    try {
        if (vsAdData['' + key + ''] != undefined) {
            var countSubItem = vsAdData['' + key + ''].blocks[vt].items.length;

            var number = Math.floor((Math.random() * (countSubItem + 1)) + 1);
            if (number >= countSubItem) {
                number = 0;
            }

            var strValue = vsAdData['' + key + ''].blocks[vt].items[number].code;
            strValue = strValue.replace('http://baodatviet.vn/', 'http://old2.baodatviet.vn/');
            strValue = strValue.replace('src="/', 'src="http://old2.baodatviet.vn/');
            // Check Null
            if (strValue == '') {
                if (vsAdData['' + key + ''].blocks[vt].items[number].type == 'flash') {
                    strValue = '<embed width="300" height="250" src="' + vsAdData['' + key + ''].blocks[vt].items[number].logo + '">';
                } else if (vsAdData['' + key + ''].blocks[vt].items[number].type == 'image') {
                    // Default Image
                    strValue = '<a href="' + vsAdData['' + key + ''].blocks[vt].items[number].link + '">';
                    strValue += '<img src="' + vsAdData['' + key + ''].blocks[vt].items[number].logo + '" />';
                    strValue += "</a>";
                }
            }
            document.write(strValue);
        }

    }
    catch (ex) {
        var strValue = vsAdData['' + key + ''].blocks[vt].items[0].code;

        strValue = strValue.replace('http://baodatviet.vn/', 'http://old2.baodatviet.vn/');
        strValue = strValue.replace('src="/', 'src="http://old2.baodatviet.vn/');
        // Check Null
        if (strValue == '') {
            if (vsAdData['' + key + ''].blocks[vt].items[0].type == 'flash') {
                strValue = '<embed width="300" height="250" src="' + vsAdData['' + key + ''].blocks[vt].items[number].logo + '">';
            } else if (vsAdData['' + key + ''].blocks[vt].items[0].type == 'image') {
                // Default Image
                strValue = '<a href="' + vsAdData['' + key + ''].blocks[vt].items[0].link + '">';
                strValue += '<img src="' + vsAdData['' + key + ''].blocks[vt].items[0].logo + '" />';
                strValue += "</a>";
            }
        }
        document.write(strValue);
    }
}

function btsearch_click(strID) {
    var strText = $('#' + strID).val();
    if (strText == 'Nhập từ khóa tìm kiếm...') {
        strText = '';
    }
    var newText = strText.trim();

    try {
        newText = strText.trim().replace(/(<([^>]+)>)/ig, "");
        newText = newText.trim().replace(/ +/gi, '-');
        newText = newText.trim().replace(/-+/gi, '-');
    }
    catch (e) {

    }

    window.location = "/tim-kiem/?q=" + newText + "&chinhxac=true";
}

function btsearchPage_click(strID) {
    var strText = $('#' + strID).val();
    if (strText == 'Nhập từ khóa tìm kiếm...') {
        strText = '';
    }
    var checkExactly = '&chinhxac=true';
    if (document.getElementById('cbEcxactly').checked == false) {
        checkExactly = '';
    }
    var newText = strText.trim();
    try {
        newText = strText.trim().replace(/(<([^>]+)>)/ig, "");
        newText = newText.trim().replace(/ +/gi, '-');
        newText = newText.trim().replace(/-+/gi, '-');
    }
    catch (e) {

    }
    window.location = "/tim-kiem/?q=" + newText + checkExactly;
}

function ProccessEnterSearch(event, value) {
    if (event.which == 13 || event.keyCode == 13) {
        if (value == 'Nhập từ khóa tìm kiếm...') {
            value = '';
        }
        var newText = value.trim();
        try {
            newText = value.trim().replace(/(<([^>]+)>)/ig, "");

            newText = newText.trim().replace(/ +/gi, '-');
            newText = newText.trim().replace(/-+/gi, '-');
        }
        catch (e) {

        }
        window.location = "/tim-kiem/?q=" + newText + "&chinhxac=true";
        return false;
    }
    return true;
}

function ProccessEnterSearchPage(event, value) {
    if (event.which == 13 || event.keyCode == 13) {
        if (value == 'Nhập từ khóa tìm kiếm...') {
            value = '';
        }
        var checkExactly = '&chinhxac=true';
        if (document.getElementById('cbEcxactly').checked == false) {
            checkExactly = '';
        }
        var newText = value.trim();
        try {
            newText = value.trim().replace(/(<([^>]+)>)/ig, "");
            newText = newText.trim().replace(/ +/g, '-');
            newText = newText.trim().replace(/-+/g, '-');

        }
        catch (e) {

        }
        window.location = "/tim-kiem/?q=" + newText + checkExactly;
        return false;
    }
    return true;
}

function CheckFocus(input) {
    var valuePage = $('#' + input).val();
    if (valuePage == 'Nhập từ khóa tìm kiếm...') {
        $('#' + input).val('');
    }
    else {
        $('#' + input).val(valuePage);
    }
}



$(document).ready(function () {
    if (navigator.appName.indexOf("Internet Explorer") != -1) {

        //$('.txtSearch').css("vertical-align", "center");

        $('#datetimepicker').css("vertical-align", "center");
    }
});

function ShowVote(voteID) {
    $.ajax({
        type: "post",
        async: true,
        url: "/AjaxHandler/ProccessShowVote.ashx",
        data: { voteID: voteID },
        success: function (data2) {
            if (data2 != "[object XMLDocument]") {
                document.getElementById('Vote_' + voteID).innerHTML = data2;
                $('#Vote_' + voteID).css({ "margin": "0 auto", "width": "70%" });
            }

        }
    });
}
function ShowVideo(id, linkVideo,ImageFile) {
    var _videoId = 'Video_' + id;
    var linkImage;
    if (ImageFile === undefined) {
        linkImage = '/images/video1.jpg';
    } else {
        linkImage = ImageFile;
    }
    //alert(linkImage);
    ShowImageVideo(_videoId, linkVideo, linkImage);
}


function resizeImgSlideShow(img) {
    var paddingTop = 0;
    if (img.height < 350) {
        paddingTop = parseInt((350 - img.height) / 2);
        $('#' + img.id).css('padding-top', paddingTop + 'px');
    }
}

function ScrollTop() {
    $('html, body').animate(
        {
            "scrollTop": "0"
        },
        500
    );
}


/*Logging BinhNQ*/

function ok() {
}

function myFunction() {
    this.FolderID = _folderID;
    this.SubjectID = _subjectID;
    this.SiteID = _siteID;

    this.PageView = function () {
        try {
            $.ajax({
                url: "http://logging.galaxypub.vn/logging.asmx/PageView",
                dataType: "jsonp",
                data: { SiteID: this.SiteID,
                    FolderID: this.FolderID,
                    SubjectID: this.SubjectID
                }

            });
        }
        catch (err) { }
    }

    this.VisitView = function (IDs) {
        try {
            $.ajax({
                url: "http://logging.galaxypub.vn/logging.asmx/VisitView",
                dataType: "jsonp",
                data: { SiteID: this.SiteID,
                    FolderID: this.FolderID,
                    SubjectID: this.SubjectID
                }
            });
        }
        catch (err) { }
    }

    this.VisitorView = function () {
        try {
            $.ajax({
                url: "http://logging.galaxypub.vn/logging.asmx/VisitorView",
                dataType: "jsonp",
                data: { SiteID: this.SiteID,
                    FolderID: this.FolderID,
                    SubjectID: this.SubjectID
                }
            });
        }
        catch (err) { }
    }

    this.setCookie = function (name, value, time, updateCookie) {
        try {
            if (updateCookie) {
                var Visit = this.getCookie(name);                //lấy Visit value từ cookie
                var IDsVisit = Visit.split("|")[0] + "," + value;   //lấy list idfolder
                var TimeVisit = new Date(Visit.split("|")[1]);      //lấy time expires của cookie
                var c_value = escape(IDsVisit + "|" + TimeVisit) + ((time == null) ? "" : "; expires=" + TimeVisit.toUTCString()) + "; path=/";
                document.cookie = name + "=" + c_value;
            }
            else {
                var exdate = new Date();
                if (time == -1) {                           //time -1 xóa cookie
                    exdate.setDate(exdate.getDate + time);
                }
                else
                    if (name == "Visit")
                        exdate.setMinutes(exdate.getMinutes() + time);  //tính time expires cho Visit 
                    else
                        exdate.setTime(exdate.getTime() + (23 - exdate.getHours()) * 60 * 60 * 1000 + (59 - exdate.getMinutes()) * 60 * 1000);  //tính time expires cho Visitor
                var c_value = escape(value + "|" + exdate) + ((time == null) ? "" : "; expires=" + exdate.toUTCString()) + "; path=/";
                document.cookie = name + "=" + c_value;
            }
        }
        catch (err) { }
    }

    this.getCookie = function (name) {
        try {
            var c_value = document.cookie;
            var c_start = c_value.indexOf(" " + name + "=");
            if (c_start == -1) {
                c_start = c_value.indexOf(name + "=");
            }
            if (c_start == -1) {
                c_value = null;
            }
            else {
                c_start = c_value.indexOf("=", c_start) + 1;
                var c_end = c_value.indexOf(";", c_start);
                if (c_end == -1) {
                    c_end = c_value.length;
                }
                c_value = unescape(c_value.substring(c_start, c_end));
            }
            return c_value;
        }
        catch (err) { }
    }
    this.clearCookie = function (name) {
        this.setCookie(name, "", -1, false);
    }

    this.CheckIdFolders = function (IDs) {
        try {
            var listID = IDs.split(",");
            for (var i = 0; i < listID.length; i++) {
                if (this.FolderID == listID[i])
                    return false;
            }
            return true;
        }
        catch (err) { }
    }

}


function PushLogging() {
    var myfun = new myFunction();
    myfun.PageView();

    ////Visit//////////////////////////////////////////////////////////////////////
    if (myfun.getCookie("Visit") == null) {                     //nếu Visit cookie null
        myfun.setCookie("Visit", myfun.FolderID, 30, false);    //set cookie 
        myfun.VisitView();                                      //gửi Visit của folder đến server 
    }
    else {
        var Visit = myfun.getCookie("Visit");   //lấy cookie Visit
        var IDs = Visit.split("|")[0];          //lấy list ID folder của Visit
        if (myfun.CheckIdFolders(IDs)) {                        //kiểm tra folder id đã tồn tại hay chưa 
            myfun.setCookie("Visit", myfun.FolderID, 30, true); //update lại cookie Visit
            myfun.VisitView();                                  //gửi Visit của folder đến server
        }

    }
    /////Visitor/////////////////////////////////////////////////////////////////////
    if (myfun.getCookie("Visitor") == null) {                   //nếu Visit cookie null
        myfun.setCookie("Visitor", myfun.FolderID, 30, false);  //set cookie Visitor
        myfun.VisitorView();                                    //gửi Visit của folder đến server
    }
    else {
        var Visitor = myfun.getCookie("Visitor");   //lấy Visitor cookie
        var IDs = Visitor.split("|")[0];            //lấy list ID folder của Visitor
        if (myfun.CheckIdFolders(IDs)) {                          //kiểm tra folder id đã tồn tại hay chưa 
            myfun.setCookie("Visitor", myfun.FolderID, 30, true); //update lại cookie Visit
            myfun.VisitorView();                                  //gửi Visit của folder đến server
        }
    }
}


function loadGa(titlePage, curIndex) {
    try {

        curIndex++;
        var url = "";
        if (titlePage == '') {
            titlePage = "Báo đất việt |su-kien |p=" + curIndex;
            url = url + "?p=" + curIndex;
        }
        else {
            url = $('#hdUrl').val();

            if (url.indexOf('p=') != -1)
                url = updateQueryStringParameter(url, "p", curIndex);
            else
                url = url + '?p=' + curIndex;
            if (curIndex > 1) {
                titlePage += " | Thư viện Ảnh | baodatviet.vn | " + curIndex;
            }
            url = url.replace("http://baodatviet.vn/", "");
            url = url.replace("baodatviet.vn/", "");
        }
        if (navigator.appName.indexOf("Internet Explorer") != -1) {
            document.title = titlePage;

        }
        else {

            $('title').html(titlePage);
            try {
                history.pushState(null, titlePage, url);
            }
            catch (e) {

            }

            ga('newTracker2.send', 'pageview', url);

            //                try {
            //                    ga('send', 'pageview', {
            //                    'page': url,
            //                    'title': titlePage,
            //                    'hitCallback': function () {

            //                    }
            //
            //                    });
            //                }
            //                catch (e) {

            //                }
            //                try {
            //                    _gaq2.push(['_trackPageview', url]);
            //                }
            //                catch (e) {

            //                }
        }
    }
    catch (ex) {

    }

}

function PushGaAuto(titlePage, url) {
    try {

        if (navigator.appName.indexOf("Internet Explorer") != -1) {
            document.title = titlePage;
        }
        else {

            $('title').html(titlePage);
            try {
                history.pushState(null, titlePage, url);
            }
            catch (e) {

            }
            ga('newTracker2.send', 'pageview', url);


        }
    }
    catch (ex) {

    }

}


function PushGaPagging(url) {
    try {

        url = "http://baodatviet.vn/" + url;

        if (navigator.appName.indexOf("Internet Explorer") != -1) {
            document.title = url;
        }
        else {

            $('title').html(url);
            try {
                history.pushState(null, titlePage, url);
            }
            catch (e) {

            }
            ga('newTracker2.send', 'pageview', url);


            //                try {
            //                    ga('send', 'pageview', {
            //                        'page': url,
            //                        'title': titlePage,
            //                        'hitCallback': function () {
            //
            //                        }
            //                    });
            //                }
            //                catch (e) {

            //                }
            //                try {
            //                    _gaq2.push(['_trackPageview', url]);
            //                }
            //                catch (e) {

            //                }


        }
    }
    catch (ex) {

    }

}


//    $(window).scroll(function () {
//        try {
//            var topPos = $(document).scrollTop();
//            if (topPos < 300) {
//                topPos = 300;
//            }

//            $('#divLeftBanner').animate(
//             {
//                 "margin-top": topPos
//             },
//            30
//        )
//            $('.right_banner').animate(
//             {
//                 "margin-top": topPos
//             },
//            30
//        )
//        }
//        catch (e) {

//        }
//    });

//    $(document).on("scroll", function (e) {
//        try {
//            var topPos = $(document).scrollTop();
//            if (topPos < 300) {
//                topPos = 300;
//            }

//            $('#divLeftBanner').animate(
//             {
//                 "margin-top": topPos
//             },
//            30
//        )
//            $('.right_banner').animate(
//             {
//                 "margin-top": topPos
//             },
//            30
//        )
//        }
//        catch (e) {

//        }
//    });
var second = 0;
//    function PostGa() {

//
//        if (second >= 20) {
//            var num = Math.floor((Math.random() * 10000000) + 1);

//            var url = "/?p=" + num;
//
//            var titlePage = 'Báo Đất Việt - Bao Dat Viet - Quốc phòng, tin tức 24h, kinh tế, khoa học, quân sự';
//            if (navigator.appName.indexOf("Internet Explorer") != -1) {
//                document.title = titlePage;
//            }
//            else {
//                $('title').html(titlePage);
////                try
////                {
////                    history.pushState(null, titlePage, url);
////                }
////                catch(e)
////                {

////                }
//                _gaq.push(['_trackPageview', url]);
//                try {
//                    _gaq2.push(['_trackPageview', url]);
//                }
//                catch (e) {
//                }
//
//            }

//            second = 0;
//        }
//
//        second++;

//        if (second == 0) {
//            setInterval(PostGa, 1000);
//        }
//    }
$(document).ready(function () {


    try {
        var height = $('.top_story').find('.title').height();

        var bottomTopStory = parseInt(height) + 20;
        $('.top_story').find('.title').css("bottom", bottomTopStory + 'px');


    }
    catch (e) {
    }

});

//    $(document).ready(function () {
//        var url = '<%=Url.Action(TestAjax, Ajax)%>';
//        alert(url);
//        $.ajax({
//            type: "POST",
//            url: '<%=Url.Action("TestAjax", "Ajax")%>',
//            contentType: "application/json; charset=utf-8",
//            data: { a: "testing" },
//            dataType: "json",
//            success: function () { alert('Success'); }

//        });
//    });


/* Detect Mobile */

function Set_Cookie(name, value, time) {
    /* set time, it's in milliseconds */
    var exdate = new Date();
    exdate.setMinutes(exdate.getMinutes() + time);

    var c_value = escape(value) + ((time == null) ? "" : "; expires=" + exdate.toUTCString()) + "; path=/";
    document.cookie = name + "=" + c_value;
}

function Get_Cookie(name) {
    try {
        var c_value = document.cookie;
        var c_start = c_value.indexOf(" " + name + "=");
        if (c_start == -1) {
            c_start = c_value.indexOf(name + "=");
        }
        if (c_start == -1) {
            c_value = null;
        }
        else {
            c_start = c_value.indexOf("=", c_start) + 1;
            var c_end = c_value.indexOf(";", c_start);
            if (c_end == -1) {
                c_end = c_value.length;
            }
            c_value = unescape(c_value.substring(c_start, c_end));
        }
        return c_value;
    }
    catch (err) { }
}

function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
    return results == null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}
window.mobilecheck = function () {
    var check = false;
    (function (a) {
        if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(a) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0, 4))) check = true
    })(navigator.userAgent || navigator.vendor || window.opera);
    return check;
}

var type = window.mobilecheck();
//Define redirectlink
//var LinkMobile = 'http://localhost/cms';
var PathName = window.location.pathname;
//Get cookie
var PDA = getParameterByName('PDA'); //nếu get tham số PDA=1 là từ mobile gọi đến
if (PDA == '1') {
    Set_Cookie('DVOPDA', 1, 30);
}
var DVOPDA = Get_Cookie('DVOPDA');
var ws = screen.width;
//var refLink = window.referrer;

if (type && DVOPDA > 0) {// là mobilephone: người dùng click vào nút xem ở chế độ PC
    //Set_Cookie('DVOPDA', 0, 30);

} else if (!type && DVOPDA > 0 && ws >= 1024) { //Không phải là mobile: người dùng vào bảng mobile trên PC

} else if (type && DVOPDA <= 0) {//detect link mobile
    location.href = LinkMobile + PathName;
}

/* end Detect Mobile*/

function EventTrack(category, action, label) {
    if (category != '') {
        ga('send', 'event', category, action, label);
    }
    //alert('category=' + category + "#action=" + action + "#label=" + label);
    //console.log(action);
}


$(document).ready(function () {
    try {
        var rv = -1;
        if (navigator.appName == 'Microsoft Internet Explorer') {
            var ua = navigator.userAgent;
            var re = new RegExp("MSIE ([0-9]{1,}[\.0-9]{0,})");
            if (re.exec(ua) != null)
                rv = parseFloat(RegExp.$1);
        }
        else if (navigator.appName == 'Netscape') {
            var ua = navigator.userAgent;
            var re = new RegExp("Trident/.*rv:([0-9]{1,}[\.0-9]{0,})");
            if (re.exec(ua) != null)
                rv = parseFloat(RegExp.$1);
        }
        if (rv > -1 && rv < 9) {

            $('#content_cm').css("overflow", "scroll");

            $('#idThumb').css("width", "0px");
            $(".footer_menu").css("height", "auto");
            $('.footer_menu').find('ul').css({ "margin-left": "0px", "padding-top": "15px", "padding-left": "10px", "padding-bottom": "0px", "padding-right": "0px" });
        }
    }
    catch (e) {

    }
});

// Bổ sung jVideo
function ShowImageVideo(videoId, linkVideo,linkImage) {   
    var divparent = document.getElementById(videoId);
    divparent.innerHTML = "<div id='ImageVideo" + videoId +"'></div>";
    divparent.innerHTML += "<div id='cmd_Video'></div>";

    //17-03 add qc của blueseed
    var timestamp = new Date().getTime();
    var tag = "http://blueserving.com/vast.xml?key=b6f68f10558cf9734c4dc13fffd8428a&genre=&country=&r=" + timestamp;
    var btag = "http://blueserving.com/vast.xml?key=5dcad95614a3062de1900183e223f835&genre=&country=&r=" + timestamp;


    jwplayer('ImageVideo' + videoId).setup({
        flashplayer: "/Scripts/player.swf",
        autostart: _autoStart,
        file: linkVideo,
        image: linkImage,
        height: _heightVideo,
        width: _widthVideo,
        stretching: 'exactfit',
         plugins: {
		"http://lab.blueserving.com/plugins/ova-jw.swf": {
							"player": {
						    	"modes": {
						      		"linear": {
						        		"controls": {
						          			"visible": false
						        			}
						      		}
						    	}
						  	},
						  	"canFireEventAPICalls": true,
							"overlays": {
									"regions": [
										{
											"id": "Adnotice",
											"verticalAlign": "bottom",
											"horizontalAlign": "right",
											"backgroundColor": "transparent",
											"width": "300",
											"height": "20",
											"style": ".notice{font-size:11pt; font-family:Arial; font-style: italic;  color:#00FF33;}"
										}
									]
								},
							  "ads": {
							  "pauseOnClickThrough": true,
							  	 "skipAd": {
						          	"enabled": "true",
						          	"showAfterSeconds": 5
						         },          
							     "schedule": [
		     		
							     		{
							           		"position": "pre-roll",
							           		"server":{
							           			"tag": tag,
							           			"failoverServers": [
								                    {
								                        "tag": btag
								                    }
								                ]
							           		}
							           		//"notice": {"show": "true","region": "Adnotice","message": 'log'},							           		 
							        	}

							     ]
							  }
						      ,
						      "debug":{
						            "levels" : " none "
						      }
					   }	   
	    },
        events: {
            onReady: function (e) {
                this.startState = this.getState();
                this.seek(1);
                this.pause();
                console.log("read");
            },
            onPlay: function (e) {
                // allow PAUSING here || this.startState == "PAUSING"
                if (this.startState == "IDLE") {
                    this.startState = this.getState();
                    //execute onPlay triggered code here

                }
               // this.pause();
//                showads('cmd_Video', linkVideo);
            }
        }
    });
}
function addscriptads(videoId) {
    $("#" + videoId).wrap("<div id='ads_video'></div>");
    var html='<script src="http://wac.A164.edgecastcdn.net/80A164/blueseed-cdn/files-blueseed/templates/26/67/jwplayer.js" type="text/javascript"></script>';
    html += ' <script type="text/javascript"> var _ad_width = "460"; var  _ad_height ="300"; var timestamp = new Date().getTime();';
    html +=' var _btitle  = "Blueseed";';
    html += ' var _btag = "http://blueserving.com/vast.xml?key=b6f68f10558cf9734c4dc13fffd8428a&genre=&country=&r=" + timestamp;';
    html +=' var _backuptag =  "http://blueserving.com/vast.xml?key=5dcad95614a3062de1900183e223f835&genre=&country=&r=" + timestamp;';
    html +=' var _arrB = [_btitle,_btag];';
    html += ' var _div_player ="ads_video";';
    html +=' var _type = "alone_fallback"; ';
    html +=' var _arrTags = [_arrB];';
    html += '</script> <script type="text/javascript" src= "http://lab.blueserving.com/libs/bs_prerolls.js"></script>';
    $("#" + videoId).append(html);
}
function showads(videoId, linkVideo) {
    $("#ImageVideo_wrapper").css("display", "none");
    var d = new Date();
    // chay quảng cáo tỷ lệ 1:1:1
    var second = d.getSeconds() % 2;
    second = 2;

    console.log('type video random ' + second);
    switch (second) {
        // video omachi -30-05 
        case 2:
            console.log('video omachi');
            var arr = Poly_fn_TVC();
            var linkAds = "https://www.youtube.com/watch?v=7maJOI3QMu0";
            if (arr != null) {
                linkAds = arr[0];
                linkClick_ads = arr[1];
                bannerIdConfig = arr[4];
            }
            if (linkAds.indexOf(".swf") > -1) {
                linkflash_ads = linkAds;
                linkVideo_main = linkVideo;
                ShowFlash(videoId, linkVideo);
            }
            else {
                MyCustomVideo(linkAds, linkVideo);
            }
            return;
        case 1:
            // Ininity_ova(videoId,linkVideo);   
            console.log('video admicro_ova');
            $("#cmd_Video").wrap("<div id=\"TVC_ADMICRO\" width=\"" + _widthVideo + "\" height=\"" + _heightVideo + "\"></div>");
            Admicro_ova(videoId, linkVideo);
            return;
        case 0:
            console.log('video AmbientOva');
            AmbientOva(videoId, linkVideo);
            return;
    }

}
var linkflash_ads = "/Scripts/FuBanner-460-300.swf";
var linkVideo_main = "";
function ShowFlash(videoId, linkVideo) {
    var paddingleft = (_widthVideo - 300) / 2;
    bfmain = true;
    cmd_LogBanner('ImageVideo_wrapper');
    var divparent = document.getElementById(videoId);
    divparent.innerHTML = "<div id='cmd_flashads' style=\" padding-left: " + paddingleft + "px; \"></div>";
    divparent.innerHTML += "<div id='cmd_flashdetail'></div>";
    var vflash = '<object type="application/x-shockwave-flash" data="' + linkflash_ads + '" ';
    vflash += ' id="cmd_flashconfigads_object" style="width:300px;height:250px;">';

    vflash += '<param name="movie" value="' + linkflash_ads + '" />';
    vflash += '<param name="wmode" value="transparent" />';
    vflash += '<param name="loop" value="False" />';
    vflash += '<param name="quality" value="high" />';
    vflash += '<param name="menu" value="false" />';

    vflash += '</object>';
    $("#cmd_flashads").append(vflash);
    cmd_ShowSkipAdsFlash();
    setTimeout(cmd_finishFlash, _TimeOut);
}

function cmd_ShowSkipAdsFlash() {
    $("#cmd_flashads").append("<div id=\"cmd_divSkipFlash\" style=\"position:absolute; margin-top:-250px; z-index:9999999999; background-color:#F18D05; cursor:pointer; display:block; float:left; width:70px; height:16px; text-align:center; border:1px solid #F18D05\" onclick=\"cmd_ShowVideoRealFlash()\"> Skip Ads</div>");
    $("#cmd_divSkipFlash").css("display", "block");
    // layout mainh hinh
    $("#cmd_flashads").append("<div id=\"cmd_divLayoutClickFlash\" style=\"position:absolute; margin-top:-250px; z-index:99999; background-color:#fff;opacity:0.1; cursor:pointer; display:block; float:left; width:300px; height:250px; text-align:center; border:1px solid #F18D05\" onclick=\"cmd_LayoutClickFlash()\"> </div>");
    $("#cmd_divLayoutClickFlash").css("display", "block");
}
function cmd_ShowVideoRealFlash() {
    $("#cmd_flashads").css("display", "none");
    jwplayer('cmd_flashdetail').setup({
        flashplayer: "/Scripts/player.swf",
        file: linkVideo_main,
        height: _heightVideo,
        width: _widthVideo,
        autoStart: 'true',
        mute: false,
        events: {
            onReady: function (e) {
                this.startState = this.getState();
            },
            onPlay: function (e) {
                // allow PAUSING here || this.startState == "PAUSING"
                if (this.startState == "IDLE") {
                    this.startState = this.getState();
                    //execute onPlay triggered code here
                }
            },
            onComplete: function (e) {
                this.startState = this.getState();
                //showImageVideo();
            }
        }

    });
}
function cmd_LayoutClickFlash() {
    console.log('cmd_LayoutClick CLICK');
    window.open(linkClick_ads, "_blank");
}

function AmbientOva(videoId, linkVideo) {
    jwplayer(videoId).setup({
        flashplayer: "/Scripts/player.swf",
        plugins: 'http://media.adnetwork.vn/flash/jwplayer/ova-jw.swf',
        file: linkVideo,
        width: _widthVideo,
        height: _heightVideo,
        mute: false,
        autoStart: 'true',
        config: 'http://delivery.adnetwork.vn/247/ovavideoad/wid_1280891794/zid_1380597508/'
    })
}
function MyCustomVideo(linkAds, linkVideo) {
    var divparent = document.getElementById('cmd_Video');
    divparent.innerHTML = "<div id='cmd_Videoads'></div>";
    divparent.innerHTML += "<div id='cmd_Video_0'></div>";
    cmd_LogBanner('cmd_Video');
    jwplayer('cmd_Videoads').setup({
        flashplayer: "/Scripts/player.swf",
        file: linkAds,
        height: _heightVideo,
        width: _widthVideo,
        autoStart: 'true',
        mute: false,
        events: {
            onReady: function (e) {
                this.startState = this.getState();
            },
            onPlay: function (e) {
                // allow PAUSING here || this.startState == "PAUSING"
                if (this.startState == "IDLE") {
                    this.startState = this.getState();
                    //execute onPlay triggered code here
                }
                ShowMySkipAds(linkVideo);
            },
            onComplete: function (e) {
                this.startState = this.getState();
                cmd_HidePrerollAdv(linkVideo);
            }
        }

    });
}
function ShowMySkipAds(linkVideo) {
    var _marginTop = (_heightVideo - 2);
    $("#cmd_Videoads_wrapper").append("<div id=\"cmd_divSkip\" style=\"position:absolute; margin-top:-" + _marginTop + "px; z-index:9999999999; background-color:#F18D05; cursor:pointer; display:block; float:left; width:70px; height:16px; text-align:center; border:1px solid #F18D05\" onclick=\"cmd_HidePrerollAdv('" + linkVideo + "')\"> Skip Ads</div>");
    $("#cmd_divSkip").css("display", "block");
    // layout mainh hinh 10-11 comment đoạn code dưới
    if (linkClick_ads.indexOf('baodatviet.vn') == -1) {
        _marginTop = _heightVideo;
        $("#cmd_Videoads_wrapper").append("<div id=\"cmd_divLayoutClickMain\" style=\"position:absolute; margin-top:-" + _marginTop + "px; z-index:99999; background-color:#fff;opacity:0.1; cursor:pointer; display:block; float:left; width:" + _widthVideo + "px; height:" + _heightVideo + "px; text-align:center; border:1px solid #F18D05\" onclick=\"cmd_LayoutClickMain()\"> </div>");
        $("#cmd_divLayoutClickMain").css("display", "block");
    }
}

function cmd_HidePrerollAdv(linkVideo) {
    jwplayer("cmd_Videoads").stop();
    $("#cmd_Videoads_wrapper").css("display", "none");
    $("#cmd_Video_0_wrapper").css("display", "block");
    jwplayer('cmd_Video_0').setup({
        flashplayer: "/Scripts/player.swf",
        file: linkVideo,
        height: _heightVideo,
        width: _widthVideo,
        autoStart: 'true',
        mute: false,
        events: {
            onReady: function (e) {
                this.startState = this.getState();
            },
            onPlay: function (e) {
                // allow PAUSING here || this.startState == "PAUSING"
                if (this.startState == "IDLE") {
                    this.startState = this.getState();
                    //execute onPlay triggered code here
                }
            },
            onComplete: function (e) {
                this.startState = this.getState();
                //showImageVideo();
            }
        }

    })
}

function Ambient_Inpage(videoId, linkVideo, linkImage) {
    jwplayer(videoId).setup({
        flashplayer: "/Scripts/player.swf",
        plugins: 'http://media.adnetwork.vn/flash/jwplayer/ova-jw.swf',
        file: linkVideo,
        width: '300',
        height: '250',
        autoStart: false,
        config: 'http://delivery.adnetwork.vn/247/ovavideoad/wid_1280891794/zid_1333076400/'
    })
}

function Ininity_InPage(videoId, linkVideo, linkImage) {
    jwplayer(videoId).setup({
        flashplayer: "/Scripts/player.swf",
        autostart: false,
        file: linkVideo,
        height: '250',
        width: '300',
        plugins: 'http://plugin.innity.net/jw/InnityAdsPlugin.swf',
        config: '/Scripts/iap_config.xml'
    })
}
function Ininity_ova(videoId, linkVideo) {
    jwplayer(videoId).setup({
        flashplayer: "/Scripts/player.swf",
        autostart: true,
        file: linkVideo,
        height: _heightVideo,
        width: _widthVideo,
        mute: false,
        plugins: 'http://plugin.innity.net/jw/InnityAdsPlugin.swf',
        config: '/Scripts/iap_config.xml'
    })
}

var isShowBall = true;
function ShowBallBall() {
    var ballball = "";
    if (isShowBall) {
        ballball = " <script src='http://www.ballball.com/static/js/adverts/2.0/ad_loader.js'></script>";
        ballball += "  <script>      ";
        ballball += "   var _bbParams = {";
        ballball += "         'width': 480,";
        ballball += "        'format': 'enhanced',";
        ballball += "        'ocid': 'o1cmlxazo4sYmcpbW0GeVCkIa023yd3T',";
        ballball += "        'opid': '56f2c928e6314bcab158e6d75a289b98',";
        ballball += "         'lang': 'vi-vn',";
        ballball += "         'id': 'PARTNER-SITE-DIV-ID',";
        ballball += "          'placement': 'inject'";
        ballball += "      };";
        ballball += "   </script>";
        document.write(ballball);
        isShowBall = false;
    }
}

function ShowBallBallDefault() {
    var ballball = "";
    if (isShowBall) {
        ballball = " <script src='http://www.ballball.com/static/js/adverts/2.0/ad_loader.js'></script>";
        ballball += "  <script>      ";
        ballball += "   var _bbParams = {";
        ballball += "         'width': 480,";
        ballball += "        'format': 'enhanced',";
        ballball += "        'ocid': 'o1cmlxazo4sYmcpbW0GeVCkIa023yd3T',";
        ballball += "        'opid': '56f2c928e6314bcab158e6d75a289b98',";
        ballball += "         'lang': 'vi-vn',";
        ballball += "         'id': 'PARTNER-SITE-DIV-ID-DEFAULT',";
        ballball += "          'placement': 'inject'";
        ballball += "      };";
        ballball += "   </script>";
        document.write(ballball);
        isShowBall = false;
    }
}

function ShowVideoConfig(id, linkVideo, width, height, linkImageThumb) {
    //update 24-09
    var d = new Date();
    // chay quảng cáo tỷ lệ 1:1:1
    var second = d.getSeconds() % 2;
    if (_subjectID > 0) {
        if (_pagehot == 1) {
            second = d.getSeconds() % 4;
            switch (second) {
                case 0:
                    linkVideo = "https://www.youtube.com/watch?v=R-7XiLF2PAg";
                    break;
                case 1:
                    linkVideo = "https://www.youtube.com/watch?v=zLn_E1Dp3L8";
                    break;
                case 2:
                    linkVideo = "https://www.youtube.com/watch?v=aeGA3ES5cM0";
                    break;
                case 3:
                    linkVideo = "https://www.youtube.com/watch?v=-qbUx1FZLkc";  
                    break;
            }                
        }
        else {
            second = d.getSeconds() % 3;
            switch (second) {
                case 0:
                    linkVideo = "https://www.youtube.com/watch?v=-qbUx1FZLkc";  
                    break;
                case 1:
                    linkVideo = "https://www.youtube.com/watch?v=zLn_E1Dp3L8";
                    break;
                case 2:
                    linkVideo = "https://www.youtube.com/watch?v=aeGA3ES5cM0";
                    break;
            }    
           
        }
    }
    else {
        //  nhom 1 va 2
        var nhom1 = "Chính trị - Xã hội, Quốc phòng, Khoa học, thế giới";
        var nhom2 = "Văn Hóa, Đời Sống, Tâm sự, Bóng Đá, Pháp Luật";
        var res = _category.toLowerCase();
        if (nhom1.toLocaleLowerCase().indexOf(res) != -1) {
            second = d.getSeconds() % 3;
            switch (second) {
                case 0:
                    linkVideo = "https://www.youtube.com/watch?v=R-7XiLF2PAg";
                    break;
                case 1:
                    linkVideo = "https://www.youtube.com/watch?v=zLn_E1Dp3L8";
                    break;
                case 2:
                    linkVideo = "https://www.youtube.com/watch?v=aeGA3ES5cM0";
                    break;
            }    
            
        }
        else if (nhom2.toLocaleLowerCase().indexOf(res) != -1) {
            second = d.getSeconds() % 3;
            switch (second) {
                case 0:
                    linkVideo = "https://www.youtube.com/watch?v=-qbUx1FZLkc";
                    break;
                case 1:
                    linkVideo = "https://www.youtube.com/watch?v=zLn_E1Dp3L8";
                    break;
                case 2:
                    linkVideo = "https://www.youtube.com/watch?v=aeGA3ES5cM0";
                    break;
            }         
        }
        else {
            linkVideo = "https://www.youtube.com/watch?v=aeGA3ES5cM0";
        }

    }
    console.log('ShowVideoConfig ' + linkVideo);
    var divparentConfig = document.getElementById(id);
    divparentConfig.innerHTML = "<div id='" + _IdDivVideoConfigImage + "'></div>";
    divparentConfig.innerHTML += "<div id='" + _IdDivVideoConfigDetail + "'></div>";
    videoconfig_showads(_IdDivVideoConfigImage, linkVideo);

}
function videoconfig_showads(videoId, linkVideo) {
    console.log('videoconfig_showads videoconfig_image stop - nextId : ' + videoId);
    linkVideoConfig_main = linkVideo;
    console.log(linkVideoConfig_main);
   // ShowImageFlashConfig();

    //// 10-07 bo doan duoi
    //return;
    var d = new Date();
    // chay quang cao cua inity, ambient, ty le 1-2
    var typeAds = d.getSeconds() % 3;
    typeAds = 3; // chay omachi đến 30/6
    console.log('videoconfig_showads ' + typeAds);
    switch (typeAds) {
        // bo flash
        case 3: // chạy flash 
            var arr = Poly_fn_TVC();
            //linkflashconfig_ads = "https://www.youtube.com/watch?v=7maJOI3QMu0";
            if (arr != null) {
                linkflashconfig_ads = arr[0];
                linkClick_ads = arr[1];
                bannerIdConfig = arr[4];
                bhasAdsConfig = true;
            }
            else {
                bhasAdsConfig = false;
            }
            if (bhasAdsConfig == true) {
                if (linkflashconfig_ads.indexOf(".swf") > -1) {
                    bCheckFlash = true;
                }
                else {
                    bCheckFlash = false;
                }
                linkVideoConfig_main = linkVideo;
                //ShowFlashConfig(videoId,linkVideo);
                console.log(linkflashconfig_ads);
                ShowImageFlashConfig();
            }
            else {
                jwplayer(_IdDivVideoConfigImage).setup({
                    flashplayer: "/Scripts/player.swf",
                    file: linkVideoConfig_main,
                    height: '250',
                    width: '300',
                    autoStart: 'false',
                    mute: 'false',
                    events: {
                        onReady: function (e) {
                            this.startState = this.getState();
                        },
                        onPlay: function (e) {
                            // allow PAUSING here || this.startState == "PAUSING"
                            if (this.startState == "IDLE") {
                                this.startState = this.getState();
                                //execute onPlay triggered code here
                            }
                        },
                        onComplete: function (e) {
                            this.startState = this.getState();
                        }
                    }

                });
            }
            return;
        case 2:
            Ininity_InPage(videoId, linkVideo, "");
            return;
        case 1:
        case 0:
            Ambient_Inpage(videoId, linkVideo, "");
            return;
    }
}
function Admicro_ova(videoId, linkVideo) {
    jwplayer(videoId).setup({
        flashplayer: "/Scripts/player.swf",
        autostart: true,
        file: linkVideo,
        height: _heightVideo,
        width: _widthVideo,
        mute: false,
        'config': 'http://ads.hosting.vcmedia.vn/Jinfo.ashx?k=baongoai',
        'skin': '',
        'zoneid': '6602',
        'tag': '5'
    });
}

// cập nhật 10/05
function ShowImageFlashConfig() {
    // link youtube
    // videoconfig_image
    jwplayer(_IdDivVideoConfigImage).setup({
        flashplayer: "/Scripts/player.swf",
        file: linkVideoConfig_main,
        height: '250',
        width: '300',
        autoStart: 'false',
        mute: 'false',
        events: {
            onReady: function (e) {
                this.startState = this.getState();
            },
            onPlay: function (e) {
                // allow PAUSING here || this.startState == "PAUSING"
                if (this.startState == "IDLE") {
                    this.startState = this.getState();
                    //execute onPlay triggered code here
                }
                ShowFlashConfig(_IdDivVideoConfigDetail, linkVideoConfig_main);
            },
            onComplete: function (e) {
                this.startState = this.getState();
                //showImageVideo();
            }
        }

    });
}

var linkflashconfig_ads = ""; // 10-07 bo /Scripts/FuBanner-300-250.swf
var linkClick_ads = "";
var linkVideoConfig_main = "";
var bannerIdConfig = 0;
var bfconfig = false; // video 300x250
var bfmain = false; // video 460x300
var bCheckFlash = true; // false showvideo, true show false
var bhasAdsConfig = true;
function ShowFlashConfig(videoId, linkVideo) {
    bfconfig = true;
    cmd_LogBanner(_IdDivVideoConfigImage + '_wrapper');
    jwplayer(_IdDivVideoConfigImage).stop();
    $("#" + _IdDivVideoConfigImage + "_wrapper").css("display", "none");
    var divparent = document.getElementById(videoId);
    divparent.innerHTML = "<div id='" + _IdDivFlashConfigAds + "'></div>";
    divparent.innerHTML += "<div id='" + _IdDivFlashConfigDetail + "'></div>";
    // flash	
//    if (bCheckFlash) {
//        var vflash = '<object type="application/x-shockwave-flash" data="' + linkflashconfig_ads + '" ';
//        vflash += ' id="cmd_flashconfigads_object" style="width:300px;height:250px;">';

//        vflash += '<param name="movie" value="' + linkflashconfig_ads + '" />';
//        vflash += '<param name="wmode" value="transparent" />';
//        vflash += '<param name="loop" value="False" />';
//        vflash += '<param name="quality" value="high" />';
//        vflash += '<param name="menu" value="false" />';

//        vflash += '</object>';
//        $("#" + _IdDivFlashConfigAds).append(vflash);
//        cmd_ShowSkipAdsFlashConfig();
//        setTimeout(cmd_finishFlash, _TimeOut);
//    }
//    else {
        // video 30-05
        jwplayer(_IdDivFlashConfigAds).setup({
            flashplayer: "/Scripts/player.swf",
            file: linkflashconfig_ads,
            height: '250',
            width: '300',
            autoStart: 'true',
            mute: 'false',
            events: {
                onReady: function (e) {
                    this.startState = this.getState();
                },
                onPlay: function (e) {
                    // allow PAUSING here || this.startState == "PAUSING"
                    if (this.startState == "IDLE") {
                        this.startState = this.getState();
                        //execute onPlay triggered code here
                    }
                    cmd_ShowSkipAdsFlashConfig();
                },
                onComplete: function (e) {
                    this.startState = this.getState();
                    //showImageVideo();
                    cmd_ShowVideoRealFlashConfig();
                }
            }
        });
//    }
}
function cmd_ShowSkipAdsFlashConfig() {
    var IdDiv = _IdDivFlashConfigAds;
    if (bCheckFlash == false) {
        IdDiv += "_wrapper";
    }
    $("#" + IdDiv).append("<div id=\"cmd_divSkipFlashConfig\" style=\"position:absolute; margin-top:-248px; z-index:9999999999; background-color:#F18D05; cursor:pointer; display:block; float:left; width:70px; height:16px; text-align:center; border:1px solid #F18D05\" onclick=\"cmd_ShowVideoRealFlashConfig()\"> Skip Ads</div>");
    $("#cmd_divSkipFlashConfig").css("display", "block");
    // layout mainh hinh 10-11 commment lại đoạn này
    if (linkClick_ads.indexOf('baodatviet.vn') == -1) {
        $("#" + IdDiv).append("<div id=\"cmd_divLayoutClickFlashConfig\" style=\"position:absolute; margin-top:-250px; z-index:99999; background-color:#fff;opacity:0.1; cursor:pointer; display:block; float:left; width:300px; height:250px; text-align:center; border:1px solid #F18D05\" onclick=\"cmd_LayoutClickFlashConfig()\"> </div>");
        $("#cmd_divLayoutClickFlashConfig").css("display", "block");
    }

}
function cmd_ShowVideoRealFlashConfig() {
    if (bCheckFlash == false) {
        jwplayer(_IdDivFlashConfigAds).stop();
        $("#" + _IdDivFlashConfigAds + "_wrapper").css("display", "none");
    }
    else {
        $("#" + _IdDivFlashConfigAds).css("display", "none");
    }
    jwplayer(_IdDivFlashConfigDetail).setup({
        flashplayer: "/Scripts/player.swf",
        file: linkVideoConfig_main,
        height: '250',
        width: '300',
        autoStart: 'true',
        mute: false,
        events: {
            onReady: function (e) {
                this.startState = this.getState();
            },
            onPlay: function (e) {
                // allow PAUSING here || this.startState == "PAUSING"
                if (this.startState == "IDLE") {
                    this.startState = this.getState();
                    //execute onPlay triggered code here
                }
            },
            onComplete: function (e) {
                this.startState = this.getState();
                //showImageVideo();
            }
        }

    });
}
var bClickVideoConfig = false;
function cmd_LayoutClickFlashConfig() {
    console.log('cmd_LayoutClickFlash CLICK');
    if (bClickVideoConfig == false) {
        window.open(linkClick_ads, "_blank");
        bClickVideoConfig = true;
        jwplayer(_IdDivFlashConfigAds).pause();
    }
    else {
        jwplayer(_IdDivFlashConfigAds).play();
        bClickVideoConfig = false;
    }
}
function cmd_finishFlash() {
    console.log("finish flash");
    if (bfconfig == true)
        cmd_ShowVideoRealFlashConfig();
    if (bfmain == true)
        cmd_ShowVideoRealFlash();
}
function cmd_LogBanner(id) {
//10-11 edit lai t = 3
    var vlog = "<iframe id=\"CPMST_LOG_IMPRESSION_IFRAME_TVC\" src=\"http://polyaddis.galaxypub.vn/imp.aspx?t=3&amp;b=" + bannerIdConfig + "&amp;r=" + Math.random() + "\" frameborder=\"0\" scrolling=\"no\" width=\"1px\" height=\"1px\" style=\"display:none;\"></iframe>";
    $('#' + id).append(vlog);
    console.log(id);
}

// 30-05
var bClickVideoMain = false;
function cmd_LayoutClickMain() {
    console.log('cmd_LayoutClickMain CLICK');
    if (bClickVideoMain == false) {
        window.open(linkClick_ads, "_blank");
        jwplayer('cmd_Videoads').pause();
        bClickVideoMain = true;
    }
    else {
        jwplayer('cmd_Videoads').play();
        bClickVideoMain = false;
    }
}

// custom lai biên thediv
var _IdDivFlashConfigAds = "cmd_flashconfigads";
var _IdDivFlashConfigDetail = "cmd_flashconfigdetail";
var _IdDivVideoConfigImage = "videoconfig_image";
var _IdDivVideoConfigDetail = "videoconfig_detail";
var _TimeOut = "20000";



/// 12-06-2014
// video chạy luôn

var _widthVideo = 460; // default/ trailer: 640
var _heightVideo = 300; // default/ trailer:360
var _autoStart = false; //default/ trailer: true
function ShowVideoTrailer(id, linkVideo) {
    var _videoId = 'Video_' + id;
    _widthVideo = 640;
    _heightVideo = 360;
    _autoStart = true;
    _CheckDocQuyen = true;
    var divparent = document.getElementById(_videoId);
    divparent.innerHTML = "<div id='ImageVideo'></div>";
    divparent.innerHTML += "<div id='cmd_Video'></div>";
    jwplayer('ImageVideo').setup({
        flashplayer: "/Scripts/player.swf",
        autostart: _autoStart,
        file: linkVideo,
        height: _heightVideo,
        width: _widthVideo,
        plugins: {
            "ova-jw": {
                "ads": {
                    "companions": {
                        "regions": [
                         {
                             "id": "videoads",
                             "width": 700,
                             "height": 425
                         }
                      ]
                    },
                    "skipAd": {
                        "enabled": "true"
                    },
                    "schedule": [
                      {
                          "position": "pre-roll",
                          "tag": 'http://delivery.adnetwork.vn/247/xmlvideoad/zid_1380597508/wid_1280891794/type_inline/cb_[timestamp]'
                      }
                   ]
                },
                "debug": {
                    "levels": "fatal, config, vast_template"
                }
            }
        }
    });
}

// 16-06-2014
var _CheckDocQuyen = false; // defaul = false;


function ShowVideoHome(id, link, linkImage) {
    var _videoId = 'Video_' + id;
    var divparent = document.getElementById(_videoId);
    jwplayer(_videoId).setup({
        flashplayer: "/Scripts/player.swf",
        autostart: false,
        file: link,
        image: linkImage,
        height: '275',
        width: '440',
        mute: false,
        plugins: {
            "ova-jw": {
                "ads": {
                    "companions": {
                        "regions": [
                         {
                             "id": "videoads",
                             "width": 700,
                             "height": 425
                         }
                      ]
                    },
                    "skipAd": {
                        "enabled": "true"
                    },
                    "schedule": [
                      {
                          "position": "pre-roll",
                          "tag": 'http://delivery.adnetwork.vn/247/xmlvideoad/zid_1380597508/wid_1280891794/type_inline/cb_[timestamp]'
                      }
                   ]
                },
                "debug": {
                    "levels": "fatal, config, vast_template"
                }
            }
        }
    });
}


// File MenuNew.js
function ShowMenuActive(pos) {
    var countAllMenu = $('#hdCountMainMenu').val();
    var ulSubMenu = '#ulSub' + pos;
    var liHover = '#liMenu' + pos;
    var aHover = '#aMenu' + pos;
    for (var i = 0; i < countAllMenu; i++) {
        var ulOtherSub = '#ulSub' + i;
        if (i != pos) {
            $(ulOtherSub).css("display", "none");
        }

    }
    $('#hdSetPosHover').val(pos);

    $('#spanDate').css("display", "none");
    $(ulSubMenu).css("display", "block");
    //  $(aHover).css("border-bottom", "1px solid #b70003");

    var posCurrent = $('#hdCurrentPos').val();

    // $('#spanHover').text('menu hover ' + pos);
    // $('#spanCurrent').text('current ' + posCurrent);

}

function ShowSubMenu(sub) {

    var posHover = $('#hdSetPosHover').val();
    var countAllMenu = $('#hdCountMainMenu').val();
    for (var i = 0; i < countAllMenu; i++) {
        var ulOtherSub = '#ulSub' + i;
        if (i != posHover) {
            $(ulOtherSub).css("display", "none");
        }
    }
    if (posHover == -1) {
        $('#spanDate').css("display", "block");
    }
    else {

        $('#spanDate').css("display", "none");
        var ulSubMenu = '#ulSub' + posHover;
        $(ulSubMenu).css("display", "block");
    }
    //$('#spanHover').text(text.toUpperCase());
}

function HideMenuActive(pos) {
    var ulSubMenu = '#ulSub' + pos;
    var liHover = '#liMenu' + pos;
    var aHover = '#aMenu' + pos;

    // $(ulSubMenu).css("display", "none");
    var posCurrent = $('#hdCurrentPos').val();
    if (posCurrent != -1) {
        $('#spanDate').css("display", "none");

    }
    if (pos != posCurrent) {
        //$(aHover).css("border-bottom", "0px");
    }

    // $('#spanHover').text('');
}

function ResetPosHover() {
    var posCurrent = $('#hdCurrentPos').val();
    var posHover = $('#hdSetPosHover').val();

    var widthMenu = $('#menuID').width();
    var heightMenu = $('#menuID').height();
}

function ShowSubMenuHover() {
    var posHover = $('#hdSetPosHover').val();
    var posCurrent = $('#hdCurrentPos').val();
}

function ShowDate() {
    var countAllMenu = $('#hdCountMainMenu').val();

    var posCurrent = $('#hdCurrentPos').val();
    if (posCurrent == -1) {
        for (var i = 0; i < countAllMenu; i++) {
            var ulOtherSub = '#ulSub' + i;
            $(ulOtherSub).css("display", "none");
        }

        $('#spanDate').css("display", "block");

        var posCurrent = $('#hdCurrentPos').val();
        $('#hdSetPosHover').val(posCurrent);

    }
}

function HideDate() {
}


function ResetMenuFormat(event) {

    var posX = event.pageX;
    var posY = event.pageY;
    if (navigator.appName.indexOf("Internet Explorer") != -1) {
        posX = event.clientX;
        posY = event.clientY;
    }
    var topMenu = $('#menuID').position().top;
    var leftMenu = $('#menuID').position().left;
    var widthMenu = $('#menuID').width();
    var heightMenu = $('#menuID').height();
    var posCurrent = $('#hdCurrentPos').val();

    var posHover = $('#hdSetPosHover').val();

    var topMenuUl = $('#menu').position().top;
    var heightMenuUl = $('#menu').height();
    var bottomUL = parseInt(heightMenuUl) + parseInt(topMenuUl) - 15;
    var top = parseInt(topMenuUl);


    if (posCurrent == -1) {

        if (posY == bottomUL) {
            // $('#spanDate').css("display", "none");

        }
        else {
            if (posX <= (parseInt(leftMenu) + 5) || posX >= (parseInt(leftMenu) + parseInt(widthMenu) - 5) || posY <= (parseInt(topMenu)) || posY >= (parseInt(topMenu) + parseInt(heightMenu) - 15)) {

                var countAllMenu = $('#hdCountMainMenu').val();
                for (var i = 0; i < countAllMenu; i++) {
                    var ulOtherSub = '#ulSub' + i;
                    $(ulOtherSub).css("display", "none");
                }
                // $('#spanHover').text('ok ' + posY);
                $('#spanDate').css("display", "block");


            }
            else {
                var widthmenuHome = $('#menuHome').width();
                var heightmenuHome = $('#menuHome').height();
                var spaceHome = parseInt(leftMenu) + parseInt(widthmenuHome);
                if (posHover != -1) {
                    if (posX >= leftMenu && posX <= spaceHome && posY >= topMenuUl && posY <= parseInt(topMenu) + parseInt(heightmenuHome)) {
                        $('#spanDate').css("display", "block");
                    }
                    else {
                        $('#spanDate').css("display", "none");
                        var ulOtherSub = '#ulSub' + posHover;
                        $(ulOtherSub).css("display", "block");
                    }
                }
                else {
                    if (posX >= leftMenu && posX <= spaceHome) {
                        $('#spanDate').css("display", "block");
                    }
                    else {
                        $('#spanDate').css("display", "none");
                        var ulOtherSub = '#ulSub' + posHover;
                        $(ulOtherSub).css("display", "block");
                    }
                }
            }
        }

    }
    else {


        if (posX <= (parseInt(leftMenu) + 5) || posX >= (parseInt(leftMenu) + parseInt(widthMenu) - 5) || posY <= (parseInt(topMenu) - 3) || posY >= (parseInt(topMenu) + parseInt(heightMenu) - 15)) {


            if (posCurrent == -1) {
                var countAllMenu = $('#hdCountMainMenu').val();
                for (var i = 0; i < countAllMenu; i++) {
                    var ulOtherSub = '#ulSub' + i;
                    $(ulOtherSub).css("display", "none");
                }

                $('#spanDate').css("display", "block");

            }
            else {
                $('#spanDate').css("display", "none");
                var countAllMenu = $('#hdCountMainMenu').val();
                for (var i = 0; i < countAllMenu; i++) {
                    var ulOtherSub = '#ulSub' + i;
                    if (i != posCurrent) {
                        $(ulOtherSub).css("display", "none");

                    }

                }

                var ulSubMenu = '#ulSub' + posCurrent;
                $(ulSubMenu).css("display", "block");
            }


        }
    }
}

function SetColor(a) {

}

function ResetColor(a) {

}

$(document).ready(function () {
    var posCurrent = $('#hdCurrentPos').val();
    if (posCurrent == -1) {
        $('#spanDate').css("display", "block");
    }
    else {
        $('#spanDate').css("display", "none");
    }
});


//14-11-2014 DangCM tạo video cho bài detail
var vlink_click_ads = "";
var vlog_id = 0;
var vlink_video_ads="";
function showvideoconfigdetail(id) {
    //update 24-09
    var d = new Date();
    // chay quảng cáo tỷ lệ 1:1:1
    var vtitle_trailer = ">>>>> xem ngay Trailler : ";
    var second = d.getSeconds() % 5;
    var vlink_video = "";
    switch (second) {
        case 0:
            vlink_video = "https://www.youtube.com/watch?v=NR6YDkbnn9g";
            vtitle_trailer += "Khó tin nhưng Hố đen tử thần là có thật. Chú ý tìm trong clip.";
            break;
        case 1:
            vlink_video = "https://www.youtube.com/watch?v=-qbUx1FZLkc";
            vtitle_trailer += "Mắc kẹt “áo mưa” khi quan hệ và cách xử lý ngây ngô khó tin trong “Bồng bột tuổi dây thì”.";
            break;
        case 2:
            vlink_video = "https://www.youtube.com/watch?v=R-7XiLF2PAg";
            vtitle_trailer += "Chung Tử Đơn tái xuất với vai diễn võ thuật pha kinh dị gây tranh cãi?";
            break;
        case 3:
            vlink_video = "https://www.youtube.com/watch?v=pqse2dmO7Hc";
            vtitle_trailer += "Lại cười nghiêng ngả với bộ 3 quái chiêu Nick, Thomas và Dale trong Horrible Bosses 2.";
            break;
        case 4:
            vlink_video = "https://www.youtube.com/watch?v=jwsJEZw7n6I";
            vtitle_trailer += "Kinh hoàng người yêu sau khi chết quay lại ám hại. Không dành cho người yếu tim.";
            break;
    }    
    $("#h2-title-trailer").html(vtitle_trailer);
    console.log('showvideoconfigdetail ' + vlink_video);
    var divparentConfig = document.getElementById(id);
    divparentConfig.innerHTML = "<div id='detail-trailer'></div>";
    divparentConfig.innerHTML += "<div id='detail-video'></div>";

    jwplayer("detail-trailer").setup({
        flashplayer: "/Scripts/player.swf",
        file: vlink_video,
        height: _heightVideo,
        width: _widthVideo,
        autoStart: 'false',
        mute: 'false',
        events: {
            onReady: function (e) {
                this.startState = this.getState();
            },
            onPlay: function (e) {
                // allow PAUSING here || this.startState == "PAUSING"
                if (this.startState == "IDLE") {
                    this.startState = this.getState();
                    //execute onPlay triggered code here
                }
                runvideoads(vlink_video);
            },
            onComplete: function (e) {
                this.startState = this.getState();
                //showImageVideo();
            }
        }

    });
}
function runvideoads(vlink_video) {
    jwplayer("detail-trailer").stop();
    $("#detail-trailer_wrapper").css("display", "none");
    var divparent = document.getElementById("detail-video");
    divparent.innerHTML = "<div id='child-detail-video-trailer'></div>";
    divparent.innerHTML += "<div id='child-detai-video'></div>";

    var vcheckcuckoo = false;
    var vcount = 1;
    do {
        console.log("requet lan thu " + vcount);
        var arr = Poly_fn_TVC();
        if (arr != null) {
            vlink_video_ads = arr[0];
            vlink_click_ads = arr[1];
            vlog_id = arr[4];
        }
        if (vlink_video_ads.indexOf("uckoo") != -1) {
            vcheckcuckoo = true;
        }
        else {
            vcheckcuckoo = false;
        }
        vcount++;
    } while (vcheckcuckoo == false);

    jwplayer("child-detail-video-trailer").setup({
        flashplayer: "/Scripts/player.swf",
        file: vlink_video_ads,
        height: _heightVideo,
        width: _widthVideo,
        autoStart: 'true',
        mute: 'false',
        events: {
            onReady: function (e) {
                this.startState = this.getState();
            },
            onPlay: function (e) {
                // allow PAUSING here || this.startState == "PAUSING"
                if (this.startState == "IDLE") {
                    this.startState = this.getState();
                    //execute onPlay triggered code here
                }
                layout_skip_ads_detail_video(vlink_video);
            },
            onComplete: function (e) {
                this.startState = this.getState();
                //showImageVideo();
                run_video_real_detail(vlink_video);
            }
        }
    });
}

function layout_skip_ads_detail_video(vlink_video) {   
    $("#child-detail-video-trailer_wrapper").append("<div id=\"layout-skip-ads-detail\" style=\"position:absolute; margin-top:-298px; z-index:9999999999; background-color:#F18D05; cursor:pointer; display:block; float:left; width:70px; height:16px; text-align:center; border:1px solid #F18D05\" onclick=\"run_video_real_detail('" + vlink_video + "')\"> Skip Ads</div>");
    $("#layout-skip-ads-detail").css("display", "block");
    $("#child-detail-video-trailer_wrapper").append("<div id=\"layout-click-close-ads\" style=\"position:absolute; margin-top:-300px; z-index:99999; background-color:#fff;opacity:0.1; cursor:pointer; display:block; float:left; width:460px; height:300px; text-align:center; border:1px solid #F18D05\" onclick=\"click_video_ads()\"> </div>");
    $("#layout-click-close-ads").css("display", "block");
   
}
function run_video_real_detail(vlink_video) {
    jwplayer("child-detail-video-trailer").stop();
    log_click_video_ads_detail("child-detail-video-trailer");
    $("#child-detail-video-trailer_wrapper").css("display", "none");
    jwplayer("child-detai-video").setup({
        flashplayer: "/Scripts/player.swf",
        file: vlink_video,
        height: _heightVideo,
        width: _widthVideo,
        autoStart: 'true',
        mute: 'false',
        events: {
            onReady: function (e) {
                this.startState = this.getState();
            },
            onPlay: function (e) {
                // allow PAUSING here || this.startState == "PAUSING"
                if (this.startState == "IDLE") {
                    this.startState = this.getState();
                    //execute onPlay triggered code here
                }
            },
            onComplete: function (e) {
                this.startState = this.getState();
            }
        }
    });
}

var vclick_ads_detail = true;
function click_video_ads() {
    if (vclick_ads_detail) {
        jwplayer("child-detail-video-trailer").pause(true);
        window.open(vlink_click_ads, '_blank');
        vclick_ads_detail = false;
    }
    else {
        jwplayer("child-detail-video-trailer").pause(false);
        vclick_ads_detail = true;
    }
}
function log_click_video_ads_detail(id) {
    //10-11 edit lai t = 3
    var vlog = "<iframe id=\"CPMST_LOG_IMPRESSION_IFRAME_TVC\" src=\"http://polyaddis.galaxypub.vn/imp.aspx?t=3&amp;b=" + vlog_id + "&amp;r=" + Math.random() + "\" frameborder=\"0\" scrolling=\"no\" width=\"1px\" height=\"1px\" style=\"display:none;\"></iframe>";
    $('#' + id).append(vlog);
    console.log(id);
}


/**
* Show pictures in article content as a fullscreen slideshow
*/
function FullscreenSlideshow() {
    var BLANK_GIF = 'data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==',
        firstTime = true;

    var $contentElm,
        $slideImages,
        $btnPrevious,
        $btnNext,
        $btnAutoPlay,
        $btnFullscreen,
        $btnTitle,
        $btnExit,
        $progressBar,
        $progressBarPercent,
        $slideshowScreen,
        $divContent,
        $currentImg,
        listImages,
        currentIndex,
        timer,
        optimizeWidth,
        slideshowTimer;

    var initImages = function (documentWidth) {
        var $ul = $slideshowScreen.find('.content ul');

        listImages = [];

        for (var i = 0, length = $slideImages.length; i < length; i++) {
            var image = {},
                $slideImage = $slideImages.eq(i),
                imageSrc = $slideImage.attr('src').replace(/\/w[0-9]+\//ig, '/w' + optimizeWidth + '/');
            $wrapper = $slideImage.parents('table');

            image.src = imageSrc;
            image.thumbSrc = $slideImage.attr('src');

            if ($wrapper.length > 0) {
                $caption = $wrapper.find('.Image');
            }
            pos = (i == 0) ? 'first' : (i == length - 1) ? 'last' : i;
            var slideHtml = '<li class="loading" style="width:' + documentWidth + 'px" slidePos="' + pos + '">' +
                    '<img data-src="' + imageSrc + '" />';

            if ($caption && $caption.length > 0) {
                var captionText = $caption.text();
                captionText = (captionText != 'Nhập mô tả cho ảnh' ? captionText : '');
                slideHtml += '<p class="caption visible">' + captionText + '</p>';

                image.caption = captionText;
            }
            slideHtml += '</li>';
            $ul.append(slideHtml);

            listImages.push(image);
        };
    };

    var getPhotoIndexBySrc = function (src) {
        var size = listImages.length;
        for (var i = 0; i < size; i++) {
            if (listImages[i].thumbSrc === src) {
                return i;
            }
        }

        return -1;
    };

    var showPhoto = function (index) {
        currentIndex = index;
        var documentWidth = $(document).width();

        if ($currentImg && $currentImg.length > 0) {
            $currentImg.removeClass('current');
            $currentImg.find('img').src = BLANK_GIF;
        }

        $currentImg = $slideshowScreen.find('li:eq(' + index + ')');
        $currentImg.addClass('current');

        if (!$currentImg.attr('data-loaded')) {
            var $img = $currentImg.find('img');
            if (!$img.attr('src')) {
                $img[0].onload = function (e) {
                    var src = this.getAttribute('src'),
                        $this = $(this),
                        imageWidth = $this.width(),
                        $parentLi = $this.parent('li');

                    if (src.indexOf("data:") == -1) {
                        $(this).parent().removeClass('loading').css('background-image', 'url(' + src + ')').attr('data-loaded', 1);
                        this.onload = null;
                    }

                    if ($this.height() < $(window).height()) {

                        if ((optimizeWidth == 1920 && imageWidth < 800) ||  // for screen > 1440, the minimum width to be display fullscreen is 800
                            (optimizeWidth == 1440 && imageWidth < 600) ||  // for screen > 1024, minimum fullscreen width is 600
                            (optimizeWidth == 1024 && imageWidth < 400)) {  // for screen > 1024, minimum fullscreen width is 400
                            $parentLi.addClass('noFullscreen');
                        }
                    }
                    /*
                    if (autoplay === true && $parentLi.hasClass('current')) {
                    autoPlay(4000);
                    }
                    */
                };
            }
            $img[0].src = $img.attr('data-src');
        }

        var slidePos = $currentImg.attr('slidePos');

        // decide which button to display
        if (slidePos == 'first') {
            $btnPrevious.hide();
        } else if (slidePos == 'last') {
            $btnNext.hide();
        }
        /*
        $slideshowScreen.find('ul').css({
        'width': $slideshowScreen.find('li').length * documentWidth,
        'left': '-' + $currentImg.prevAll().length * documentWidth + 'px'
        }).attr('slideWidth', documentWidth);
        */
        var $ul = $slideshowScreen.find('ul');
        if (!$ul.attr('slideWidth')) {
            $ul.css('width', $slideshowScreen.find('li').length * documentWidth).attr('slideWidth', documentWidth);
        }

        //var step = parseInt($ul.attr('slideWidth')) * relPos;
        var moveToLeft = -$currentImg.prevAll().length * documentWidth;

        if (firstTime) {
            $ul.css('left', moveToLeft + 'px');
            firstTime = false;
        } else {
            $ul.transition({
                'left': moveToLeft + 'px'
            }, 500, 'ease', function () {
                // decide which navigation button to show
                if ($currentImg.attr('slidePos') == 'first') {
                    $btnPrevious.hide();
                } else if ($currentImg.attr('slidePos') == 'last') {
                    $btnNext.hide();
                } else {
                    $btnNext.show();
                    $btnPrevious.show();
                }
                setTimeout(function () {
                    $currentImg.find('.caption').removeClass('visible');
                }, 3500);
                //ga('send', 'event', 'Slideshow', 'Slide Next', window.location.pathname);
            });
        }
    };

    var launchFullScreen = function (element) {
        //ga('send', 'event', 'Slideshow', 'Switch fullscreen', window.location.pathname);
        if (element.requestFullScreen) {
            element.requestFullScreen();
        } else if (element.mozRequestFullScreen) {
            element.mozRequestFullScreen();
        } else if (element.webkitRequestFullScreen) {
            element.webkitRequestFullScreen();
        }
    };

    var launchSlideshow = function ($start, autoplay) {
        optimizeWidth = 1024;

        var $caption, slide, $wrapper,
            documentWidth = $(document).width();

        $('body').css('overflow', 'hidden');

        var width = $(document).width();

        $slideshowScreen = $('#slideshowScreen');

        if ($slideshowScreen.length == 0) {
            var html = '<div id="slideshowScreen">' +
                        '<div class="header"></div><div class="content"><ul></ul></div>' +
                        '<a class="btnPrevious button">Sau</a>' +
                        '<a class="btnNext button">Trước</a>' +
                        '<a href="javascript:page.article.slideshow_close();" class="btnClose button">Đóng</a>' +
                        '<div id="progressbar"><span class="percent"><span></span></span><label>Tự động chiếu hình tiếp theo. <span>Nhấn chuột vào đây để dừng</span>.</label></div>' +
                        '</div>';
            $('body').append($(html));

            $slideshowScreen = $('#slideshowScreen');
            $slideshowScreen.find('#progressbar').on('click', function () {
                stopAutoPlay();
            });

            $btnNext = $slideshowScreen.find('.btnNext');
            $btnPrevious = $slideshowScreen.find('.btnPrevious');

            $btnNext.click(function (e) {
                e.preventDefault();
                moveTo(1, true);
            });

            $btnPrevious.click(function (e) {
                e.preventDefault();
                moveTo(-1, true);
            });

            $slideshowScreen.bind('contextmenu', function (e) {
                return false;
            });
        }

        $divContent = $slideshowScreen.find('.content');
        $divContent.find('ul').empty();
        $divContent.on('click', function (e) {
            e.preventDefault();
            var x = e.hasOwnProperty('offsetX') ? e.offsetX : e.layerX;

            if (x > 200) {
                moveTo(1, true);
            } else {
                moveTo(-1, true);
            }
        });

        $divContent.on('click', '.caption', function (e) {
            e.stopPropagation();
        });

        $slideshowScreen.find('.header').html(
            '<a class="btnTitle">' + $('h1.title').text() + '</a>' +
            '<iframe src="//www.facebook.com/plugins/like.php?href=' + $("meta[property='og:url']").attr('content') + '&amp;width=170&amp;height=35&amp;colorscheme=light&amp;layout=button_count&amp;action=like&amp;show_faces=false&amp;&amp;locale=vi_VN&amp;send=true&amp;appId=1397711853803260" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:140px; height:20px; margin:7px 0 0 15px;" allowTransparency="true"></iframe>' +
            '<a class="btnExit ">Thoát</a>' +
            '<a class="btnFullscreen ">Xem toàn màn hình</a>' +
            '<a class="btnAutoPlay ">Tự động trình chiếu</a>'
        );

        $btnNext = $slideshowScreen.find('.btnNext');
        $btnPrevious = $slideshowScreen.find('.btnPrevious');
        $btnAutoPlay = $slideshowScreen.find('.btnAutoPlay');
        $btnTitle = $slideshowScreen.find('.btnTitle');
        $btnExit = $slideshowScreen.find('.btnExit');
        $btnFullscreen = $slideshowScreen.find('.btnFullscreen');
        $progressBar = $slideshowScreen.find('#progressbar');
        $progressBarPercent = $progressBar.find('.percent span');

        if (!autoplay) {
            $btnAutoPlay.show();
        }

        $btnAutoPlay.on('click', function (e) {
            e.preventDefault();
            autoPlay();
        });

        //if (page.isFullscreenEnable()) {
        if (true) {
            $btnFullscreen.on('click', function (e) {
                e.preventDefault();
                launchFullScreen(document.getElementById('slideshowScreen'));
            });
        } else {
            $btnFullscreen.hide();
        }

        $btnExit.on('click', function (e) {
            e.preventDefault();
            closeSlideshow();
        });

        $btnTitle.on('click', function (e) {
            e.preventDefault();
            closeSlideshow();
        });

        if (documentWidth > 1440) {
            optimizeWidth = 1920;
        } else if (documentWidth > 1024) {
            optimizeWidth = 1440;
        }

        initImages(width);

        if ($start.length == 1) {
            $btnPrevious.hide();
            $btnNext.hide();
        } else {
            $btnPrevious.show();
            $btnNext.show();
        }

        var index = 0;
        if ($start.length > 0) {
            index = getPhotoIndexBySrc($start.attr('src'));
            index = index == -1 ? 0 : index;
        }

        showPhoto(index);

        $(document).keydown(onKeyDown);

        $('#slideshowScreen').show();

        //ga('send', 'event', 'Slideshow', 'Launch Slideshow', window.location.pathname);

    };

    var onKeyDown = function (e) {
        //console.log(e.which);
        if (e.which == 39) { // right + up
            moveTo(1, true);
        } else if (e.which == 37) { // left + down
            moveTo(-1, true);
        } else if (e.which == 27) { // esc
            closeSlideshow();
        } else if (e.which == 13) { // enter
            //page.launchFullScreen(document.getElementById('slideshowScreen'));
        } else if (e.which == 32) { // space
            if (!slideshowTimer == null) {
                autoPlay(4000);
            } else {
                stopAutoPlay();
            }
        }
    };

    var showProgressBar = function (delay) {
        timer && clearTimeout(timer);
        timer = setTimeout(function () {
            $progressBar.show();
            $progressBarPercent.css('width', '0%').transition({
                'width': '100%'
            }, 2000, 'linear');
        }, delay - 2000);
    };

    var autoPlay = function (delay) {
        if (typeof delay === 'undefined') {
            delay = 4000;
        }

        $btnAutoPlay.hide();

        showProgressBar(delay);

        slideshowTimer && clearInterval(slideshowTimer);
        slideshowTimer = setInterval(function () {
            var current = $slideshowScreen.find('li.current');
            $progressBar.hide();
            if ($(current).attr('slidePos') == 'last') {
                showPhoto(0);
            } else {
                moveTo(1);
            }

            showProgressBar(delay);
        }, delay);
    };

    var stopAutoPlay = function () {
        $progressBar.hide();
        $progressBarPercent.css('width', '0%');

        slideshowTimer && clearInterval(slideshowTimer);
        timer && clearTimeout(timer);
        slideshowTimer = null;
        $btnAutoPlay.show();
    };

    var moveTo = function (relPos, stopAuto) {
        if (slideshowTimer != null && stopAuto) {
            stopAutoPlay();
        }

        var $current = $('#slideshowScreen li.current');
        if ($current.length == 0) {
            return;
        }
        var goNext = (relPos > 0);

        var $next = goNext ? $current.next('li') : $current.prev('li');

        if ($next.length > 0) {
            currentIndex += goNext ? 1 : -1;
            showPhoto(currentIndex);
        } else {
            //closeSlideshow();
            return;
        }
    };

    var closeSlideshow = function () {
        firstTime = true;
        stopAutoPlay();
        $("body").css("overflow", "auto");
        //page.cancelFullscreen();
        $slideshowScreen.hide().remove();
        $(document).unbind('keydown', onKeyDown);
    };

    var init = function ($elm) {
        $contentElm = $elm;
        currentIndex = 0;

        $slideImages = $('table img', $contentElm);

        if ($slideImages.length > 0) {
            $slideImages.on('mouseover', function () {
                var $img = $(this);
                var $btnSlideshow = $img.parents('td').find('.btnSlideshow');
                var $btnFBShare = $img.parents('td').find('.fbShareImage');
                var $btnShareImg = $img.parents('td').find('.fbShareImage');
                if ($btnSlideshow.length == 0) {
                    $img.after('<a href="#slideshow" class="btnSlideshow">Phóng to</a>');
                    $img.parents('td').find('.btnSlideshow').on('click', function () {
                        launchSlideshow($img);
                    });
                }
                if ($btnShareImg.length == 0) {                    
                    $(this).after('<div class="fbShareImage"><a class="btnsharefb" href="javascript:;"><span>chia sẻ</span></div>');
                    $img.parents('td').find('.fbShareImage').on('click', function () {
                        fbShareImageClick($img);
                    });
                    
                }
            }).on('click', function () {
                launchSlideshow($(this));
            });
        }
    };
    var fbShareImageClick = function ($el) {
        var shareLink = $("meta[property='og:url']").attr('content');
        console.log($el.context.src);
        var host = 'http://baodatviet.vn';
        var PathName = window.location.pathname;
        var link = host + '/Share/link.ashx?url=' + $el.context.src + "&origin=" + host + PathName;
        var a = "https://www.facebook.com/sharer/sharer.php?app_id=551283098339373&sdk=joey&u=" + encodeURIComponent(link);
        window.open(a, "_blank", "menubar=no,toolbar=no,resizable=no,scrollbars=no,height=450,width=710");
    };
    this.init = init;
};

function sharehotimage() {
    var $slideImages;
    var init = function ($elm) {
        console.log($elm);
        if ($($elm).length > 0) {
            $($elm).on('mouseover', function () {
                var $img = $(this);
                var $btnShareImg = $('.fbShareHotImage', $elm);
                if ($btnShareImg.length == 0) {
                    $($elm).append('<div class="fbShareHotImage"><a class="btnsharefb" href="javascript:;"><span>chia sẻ</span></div>');
                    $('.fbShareHotImage', $elm).on('click', function () {
                        fbShareImageClick($elm);
                    });

                }
            }).bind("contextmenu", function (e) {
                return false;
            });
        }
    };
    var fbShareImageClick = function ($el) {
        var shareLink = $("meta[property='og:url']").attr('content');
        var host = 'http://baodatviet.vn';
        var PathName = window.location.pathname;
        var link = host + '/Share/link.ashx?url=' + $($el).find('.thumb img')[0].src + "&origin=" + host + PathName;
        var a = "https://www.facebook.com/sharer/sharer.php?app_id=551283098339373&sdk=joey&u=" + encodeURIComponent(link);
        window.open(a, "_blank", "menubar=no,toolbar=no,resizable=no,scrollbars=no,height=450,width=710");
    };
    this.init = init;
}