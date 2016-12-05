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
    var element = document.getElementById('cbEcxactly');
    if (typeof (element) != 'undefined' && element != null) {
        if (document.getElementById('cbEcxactly').checked == false) {
            checkExactly = '';
        }
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
        var element = document.getElementById('cbEcxactly');
        if (typeof (element) != 'undefined' && element != null) {
            if (document.getElementById('cbEcxactly').checked == false) {
                checkExactly = '';
            }
        }
        var newText = value.trim();

        try {
             newText = value.trim().replace(/(<([^>]+)>)/ig, "");
            newText = newText.trim().replace(/ +/gi, '-');
            newText = newText.trim().replace(/-+/gi, '-');
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
       
        $('.txtSearch').css("vertical-align", "center");

        $('#datetimepicker').css("vertical-align", "center");
    }
});

function ShowVote(voteID) {
    var divVote = '#Vote_' + voteID;
 
    $(divVote).css({"margin":"0 auto auto auto","width":"100%"});
    $.ajax({
        type: "post",
        async: true,
        url: "/AjaxHandler/ProccessShowVote.ashx",
        data: { voteID: voteID },
        success: function (data2) {
            if (data2 != '[object XMLDocument]') {
                document.getElementById('Vote_' + voteID).innerHTML = data2;

            }
        }
    });
}

// Resize image mobile
function resizeImg(img) {
    sWidth = screen.width;
    var ratio = img.width / img.height;
    if (sWidth >= img.width)
        return;
    else {
        img.width = sWidth - 25;
        img.height = (sWidth - 25) / ratio;
    }
}
function ShowVideo(id, linkVideo) {
    var divVideo = '#Video_' + id;
    jwplayer("Video_" + id).setup({
        file: linkVideo,
        height: 250,
        width: 300
    });

    $(divVideo).css("margin", "auto");
}

$(document).ready(function () {
    $('#uptop').click(function () {
        $('html,body').animate({ "scrollTop": "0" }, 600);
    });

    $("iframe").each(function () {
        sWidth = screen.width;
        var ratio = 1;
        if ($(this).attr("width") != 'undefined' && $(this).attr("height") != 'undefined') {
            if ($(this).attr("width") > sWidth) {
                ratio = $(this).attr("width") / $(this).attr("height");
                $(this).attr("width", (screen.width - 25));
                $(this).attr("height", ((screen.width - 25) / ratio));
            }
        } else if ($(this).attr("width") != 'undefined') {
            if ($(this).attr("width") > sWidth) {
                $(this).attr("width", (screen.width - 25));
            }
        }
        //alert($(this).attr("alt"));
        //$(this).attr("width", (screen.width - 25));
    });
});


(function (i, s, o, g, r, a, m) {
    i['GoogleAnalyticsObject'] = r; i[r] = i[r] || function () {
        (i[r].q = i[r].q || []).push(arguments)
    }, i[r].l = 1 * new Date(); a = s.createElement(o),
  m = s.getElementsByTagName(o)[0]; a.async = 1; a.src = g; m.parentNode.insertBefore(a, m)
})(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

ga('create', 'UA-3224519-65', 'auto', { 'name': 'newTracker2' });
ga('newTracker2.send', 'pageview');

function updateQueryStringParameter(a, k, v) {
    var re = new RegExp("([?|&])" + k + "=.*?(&|$)", "i"),
                    separator = a.indexOf('?') !== -1 ? "&" : "?";

    if (a.match(re)) return a.replace(re, '$1' + k + "=" + v + '$2');
    else return a + separator + k + "=" + v;
}


function loadGa(titlePage, curIndex) {
    try {

        curIndex++;
        var url = $('#hdUrl').val();
        if (url.indexOf('p=') != -1)
            url = updateQueryStringParameter(url, "p", curIndex);
        else
            url = url + '?p=' + curIndex;
        if (curIndex > 1) {
            titlePage += " | Thư viện Ảnh | baodatviet.vn | " + curIndex;
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
            //                    _gaq2.push(['_trackPageview', url]);
            //                }
            //                catch (e) {

            //                }

          
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
            //                    _gaq2.push(['_trackPageview', url]);
            //                }
            //                catch (e) {

            //                }

          
        }
    }
    catch (ex) {

    }


}
/*End Logging*/

function EventTrack(category, action, label) {
    if (category != '') {
        ga('send', 'event', category, action, label);
    }
    //alert('category=' + category + "#action=" + action + "#label=" + label);
    //console.log(action);
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


$(document).ready(function () {
    PushLogging();
});
/*End Logging BinhNQ*/
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
                        fbShareImageClick(this);
                    });

                }
            }).bind("contextmenu", function (e) {
                return false;
            });
        }
    };
    var fbShareImageClick = function ($el) {
        console.log($($el).parent().find("img")[0].src);
        var img = $($el).parent().find("img")[0].src;
        if (img.indexOf("?w=") != -1) {
            img = img.substring(0,img.indexOf("?w="));
        }
        var host = 'http://baodatviet.vn';
        var PathName = window.location.pathname;
        var link = host + '/Share/link.ashx?url=' + img + "&origin=" + host + PathName;
        var a = "https://www.facebook.com/sharer/sharer.php?app_id=551283098339373&sdk=joey&u=" + encodeURIComponent(link);
        window.open(a, "_blank", "menubar=no,toolbar=no,resizable=no,scrollbars=no,height=450,width=710");
    };
    this.init = init;
}
function shareimage() {
    var $slideImages, $contentElm;
    var init = function ($elm) {
        $contentElm = $elm;
        $slideImages = $('table img', $contentElm);

        if ($slideImages.length > 0) {
            $slideImages.on('mouseover', function () {
                var $img = $(this);
                var $btnShareImg = $img.parents('td').find('.fbShareImage');
                if ($btnShareImg.length == 0) {
                    $(this).after('<div class="fbShareImage"><a class="btnsharefb" href="javascript:;"><span>chia sẻ</span></div>');
                    $img.parents('td').find('.fbShareImage').on('click', function () {
                        fbShareImageClick($img);
                    });

                }
            }).bind("contextmenu", function (e) {
                return false;
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
}