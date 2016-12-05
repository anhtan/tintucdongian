function ShowPopupComment(){
    var comment = $('#txtAreaComment').val();
    comment = comment.trim();
    if (comment == "" || comment == "Ý kiến của bạn") {

        $('#login-box').css("display", "inline");
        $('#login-box').css("width", "400px");
        $('#login-box').css("height", "130px");
        $('#login-box').css("top", "180px");
        $('#login-box').css("left", "25%");

        $('#tableComment').css("display", "none");
        $('#tableMessageComment').css("display", "inline");
        $('#tableCommentSuccess').css("display", "none");
        $('#divAllComment').css("display", "none");
        var loginBox = $(this).attr('href');

        //Fade in the Popup and add close button
        $(loginBox).fadeIn(300);

        //Set the center alignment padding + border
        var popMargTop = ($(loginBox).height() + 24) / 2;
        var popMargLeft = ($(loginBox).width() + 24) / 2;

        $(loginBox).css({
            'margin-top': -popMargTop,
            'margin-left': -popMargLeft
        });

        // Add the mask to body
        $('body').append('<div id="mask"></div>');
        if (navigator.appName.indexOf("Internet Explorer") != -1) {

            $('#mask').css("filter", "alpha(opacity=70);");
        }
        $('#mask').css("display", "block");
        $('#mask').fadeIn(300);
    }
    else {
        $('#tdLoading').html("");
        $('#login-box').css("display", "inline");
        $('#login-box').css("width", "460px");
        $('#login-box').css("height", "160px");
        $('#login-box').css("top", "180px");
        $('#login-box').css("left", "25%");
        $('#tableComment').css("display", "inline");
        $('#tableMessageComment').css("display", "none");
        $('#tableCommentSuccess').css("display", "none");
        $('#divAllComment').css("display", "none");
        var loginBox = $(this).attr('href');
       
      
        $('#txtEmail').val('Email (Không hiển thị trên trang)');
        $('#txtFullName').val('Họ tên (Hiển thị trên trang)');
        var cookieEmail = getCookie("cookieEmail");
        var cookieName = getCookie("cookieName");
        if (cookieEmail != "" && cookieEmail != null) {
            $('#txtEmail').val(cookieEmail);
        }
        if (cookieName != "" && cookieName != null) {
            $('#txtFullName').val(cookieName);
        }
        //Fade in the Popup and add close button
        $(loginBox).fadeIn(300);

        //Set the center alignment padding + border
        var popMargTop = ($(loginBox).height() + 24) / 2;
        var popMargLeft = ($(loginBox).width() + 24) / 2;

        $(loginBox).css({
            'margin-top': -popMargTop,
            'margin-left': -popMargLeft
        });

        // Add the mask to body
        $('body').append('<div id="mask"></div>');
        if (navigator.appName.indexOf("Internet Explorer") != -1) {

            $('#mask').css("filter", "alpha(opacity=70);");
        }
        $('#mask').css("display", "block");
        $('#mask').fadeIn(300);

        $('#hdComment').val(comment);


    }

}



function ClosePopup() {
    $('#mask , .login-popup').fadeOut(300, function () {
        $('#mask').remove();
    });
    $('#hdCommentID').val('0');
    $('#tdLoading').html("");
}

$(document).on('click', '#mask', function () {
    $('#mask , .login-popup').fadeOut(300, function () {
        $('#mask').remove();
    });
    $('#hdCommentID').val('0');
    $('#tdLoading').html("");
});


function ShowPopupCommentAllNew() {
    var comment = $('#txtAllCommentRely').val();
    comment = comment.trim();
    if (comment == "" || comment == "Ý kiến của bạn") {

        $('#login-box2').css("display", "inline");
        $('#login-box2').css("width", "400px");
        $('#login-box2').css("height", "130px");
        $('#login-box2').css("top", "180px");
        $('#login-box2').css("left", "30%");

        $('#tableComment2').css("display", "none");
        $('#tableMessageComment2').css("display", "inline");
        $('#tableCommentSuccess2').css("display", "none");
       // $('#divAllComment').css("display", "none");
        var loginBox = $(this).attr('href');

        //Fade in the Popup and add close button
        $(loginBox).fadeIn(300);

        //Set the center alignment padding + border
        var popMargTop = ($(loginBox).height() + 24) / 2;
        var popMargLeft = ($(loginBox).width() + 24) / 2;

        $(loginBox).css({
            'margin-top': -popMargTop,
            'margin-left': -popMargLeft
        });

        // Add the mask to body
        $('body').append('<div id="mask"></div>');
        if (navigator.appName.indexOf("Internet Explorer") != -1) {

            $('#mask2').css("filter", "alpha(opacity=70);");
        }
        $('#mask').css("display", "block");
        $('#mask2').fadeIn(300);
    }
    else {
        $('#tdLoading2').html("");
        $('#login-box2').css("display", "inline");
        $('#login-box2').css("width", "460px");
        $('#login-box2').css("height", "160px");
        $('#login-box2').css("top", "180px");
        $('#login-box2').css("left", "30%");
        $('#tableComment2').css("display", "inline");
        $('#tableMessageComment2').css("display", "none");
        $('#tableCommentSuccess2').css("display", "none");
       // $('#divAllComment').css("display", "none");
        var loginBox = $(this).attr('href');
        $('#txtEmailAllNew').val('Email (Không hiển thị trên trang)');
        $('#txtFullNameAllNew').val('Họ tên (Hiển thị trên trang)');
        var cookieEmail = getCookie("cookieEmail");
        var cookieName = getCookie("cookieName");
        if (cookieEmail != "" && cookieEmail != null) {
            $('#txtEmailAllNew').val(cookieEmail);
        }
        if (cookieName != "" && cookieName != null) {
            $('#txtFullNameAllNew').val(cookieName);
        }
        //Fade in the Popup and add close button
        $(loginBox).fadeIn(300);

        //Set the center alignment padding + border
        var popMargTop = ($(loginBox).height() + 24) / 2;
        var popMargLeft = ($(loginBox).width() + 24) / 2;

        $(loginBox).css({
            'margin-top': -popMargTop,
            'margin-left': -popMargLeft
        });

        // Add the mask to body
        $('body').append('<div id="mask"></div>');
        if (navigator.appName.indexOf("Internet Explorer") != -1) {

            $('#mask2').css("filter", "alpha(opacity=70);");
        }
        $('#mask').css("display", "block");
        $('#mask2').fadeIn(300);

        $('#hdCommentAllNew').val(comment);


    }
}

function ClosePopupAllNew() {
    $('#mask2 , .login-popup2').fadeOut(300, function () {
        $('#mask2').remove();
    });
    $('#hdCommentIDAllNew').val('0');
    $('#tdLoading2').html("");
}

$(document).on('click', '#mask2', function () {
    $('#mask2, .login-popup2').fadeOut(300, function () {
        $('#mask2').remove();
    });
    $('#hdCommentIDAllNew').val('0');
    $('#tdLoading2').html("");
});


function SubmitComment_old() {
    var email = $('#txtEmail').val();
    var fullname = $('#txtFullName').val();
    var content = $('#hdComment').val();
    var subjectID = $('#hdSubjectID').val();
    var folderID = $('#hdFolderID').val();
    var parentID = $('#hdCommentID').val();
    
    if (parentID != "0") {
        content = $('#hdRelyComment').val();
    }
 
    var filterEmail = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (email == "Email (Không hiển thị trên trang)") {
        $('#lbErrorEmail').text('Vui lòng nhập email');
    }
    else {
        if (!filterEmail.test(email)) {
            $('#lbErrorEmail').text('Email không hợp lệ');
        }
        else {
            if (content.indexOf("<script>") != -1 || content.indexOf("</script>") != -1 || content.indexOf("<script type='text/javascript'>") != -1 || content.indexOf("<SCRIPT>") != -1 || content.indexOf("</SCRIPT>") != -1 || content.indexOf("<SCRIPT LANGUAGE='JAVASCRIPT'>") != -1 || content.indexOf("<script language='javascript'>") != -1 || content.indexOf("<SCRIPT TYPE='TEXT/JAVASCRIPT'>") != -1) {
                alert("Nội dung bạn nhập vào không hợp lệ");
            }
            else {
                if (fullname == 'Họ tên (Hiển thị trên trang)' || fullname == '') {
                    alert('Vui lòng nhập họ tên');
                }
                else {
                    $('#tdLoading').html("<img src='/images/loading.gif' width='40px' height='40px' />");
                    content = content.trim();
                    $.ajax({
                        type: "post",
                        async: true,
                        url: "/AjaxHandler/ProccessInsertComment.aspx",
                        data: { subjectID: subjectID, folderID: folderID, email: email, fullname: fullname, content: content, parentID: parentID },
                        success: function (data2) {
                            $('#login-box').css("width", "400px");
                            $('#login-box').css("height", "130px");
                            $('#login-box').css("top", "180px");
                            $('#login-box').css("left", "25%");
                            $('#tableComment').css("display", "none");
                            $('#tableMessageComment').css("display", "none");
                            $('#divAllComment').css("display", "none");
                            $('#tableCommentSuccess').css("display", "inline");

                            // ClosePopup();
                            $('#hdRelyComment').val('');
                            $('#hdCommentID').val('0');
                            $('#hdComment').val('');
                            $('#txtEmail').val('');
                            $('#txtFullName').val('');
                            if (parentID != "0") {
                                var txtRelyID = '#txtRelyComment' + parentID;
                                $(txtRelyID).val('');
                                var divForm = '#divFormRely' + parentID;
                                $(divForm).css("display", "none");
                                var spanID = '#spanTitleRely' + parentID;
                                $(spanID).val('Trả lời');
                                $('#tdLoading').html("");
                            }
                            else {
                                $('#txtAreaComment').val('')
                                $('#tdLoading').html("");
                            }
                        }

                    });
                }
            }
        }
    }
}

function SubmitNewComment() {
    var email = $('#txtEmail').val();
    var fullname = $('#txtFullName').val();
    var content = $('#hdComment').val();
    var subjectID = $('#hdSubjectID').val();
    var folderID = $('#hdFolderID').val();
    var parentID = $('#hdCommentID').val();
    var commentID = $('#hdChildCommentID').val();
    var filterEmail = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (email == "Email (Không hiển thị trên trang)") {
        $('#lbErrorEmail').text('Vui lòng nhập email');
    }
    else {
        if (!filterEmail.test(email)) {
            $('#lbErrorEmail').text('Email không hợp lệ');
        }
        else {
            if (content.indexOf("<script>") != -1 || content.indexOf("</script>") != -1 || content.indexOf("<script type='text/javascript'>") != -1 || content.indexOf("<SCRIPT>") != -1 || content.indexOf("</SCRIPT>") != -1 || content.indexOf("<SCRIPT LANGUAGE='JAVASCRIPT'>") != -1 || content.indexOf("<script language='javascript'>") != -1 || content.indexOf("<SCRIPT TYPE='TEXT/JAVASCRIPT'>") != -1) {
                alert("Nội dung bạn nhập vào không hợp lệ");
            }
            else {
                if (fullname == 'Họ tên (Hiển thị trên trang)' || fullname == '') {
                    alert('Vui lòng nhập họ tên');
                }
                else {
                    $('#tdLoading').html("<img src='/images/loading.gif' width='40px' height='40px' />");
                    content = content.trim();
                    $.ajax({
                        type: "post",
                        async: true,
                        url: "/AjaxHandler/ProccessInsertComment.aspx",
                        data: { subjectID: subjectID, folderID: folderID, email: email, fullname: fullname, content: content, parentID: parentID },
                        success: function (data2) {

                            var txtRelyID = '#txtRelyNewComment' + commentID;
                            $(txtRelyID).val('');
                            var divForm = '#divFormRelyNewComment' + commentID;
                           
                            $(divForm).css("display", "none");
                            var spanID = '#spanTitleRelyNewComment' + commentID;
                            $(spanID).val('Trả lời');
                            $('#tdLoading').html("");

                            $('#hdRelyComment').val('');
                            $('#hdCommentID').val('0');
                            $('#hdComment').val('');
                            $('#txtEmail').val('');
                            $('#txtFullName').val('');
                            $('#hdSubjectID').val('0');
                            $('#hdFolderID').val('0');

                            $('#login-box').css("width", "400px");
                            $('#login-box').css("height", "130px");
                            $('#login-box').css("top", "180px");
                            $('#login-box').css("left", "25%");
                            $('#tableComment').css("display", "none");
                            $('#tableMessageComment').css("display", "none");
                            $('#tableCommentSuccess').css("display", "inline");
                            $('#divAllComment').css("display", "none");
                            // ClosePopup();




                        }

                    });
                }
            }
        }
    }
}

function SubmitCommentAllNew() {

    var heightScreen = $(window).height();
    var heightPopup = parseInt(heightScreen) - 100;
    var widthScreen = $(window).width();
    var leftScreen = ((parseInt(widthScreen) - 700) / 2);
    var email = $('#txtEmailAllNew').val();
    var fullname = $('#txtFullNameAllNew').val();
    var content = $('#hdCommentAllNew').val();
    var subjectID = $('#hdNewSubjectID').val();
    var folderID = $('#hdNewFolderID').val();
    var parentID = $('#hdCommentIDAllNew').val();
    var commentID = $('#hdChildCommentID').val();
    if (parentID != "0") {
        content = $('#hdRelyCommentAllNew').val();
    }

    var filterEmail = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (email == "Email (Không hiển thị trên trang)") {
        $('#lbErrorEmailAllNew').text('Vui lòng nhập email');
    }
    else {
        if (!filterEmail.test(email)) {
            $('#lbErrorEmailAllNew').text('Email không hợp lệ');
        }
        else {
            if (content.indexOf("<script>") != -1 || content.indexOf("</script>") != -1 || content.indexOf("<script type='text/javascript'>") != -1 || content.indexOf("<SCRIPT>") != -1 || content.indexOf("</SCRIPT>") != -1 || content.indexOf("<SCRIPT LANGUAGE='JAVASCRIPT'>") != -1 || content.indexOf("<script language='javascript'>") != -1 || content.indexOf("<SCRIPT TYPE='TEXT/JAVASCRIPT'>") != -1) {
                alert("Nội dung bạn nhập vào không hợp lệ");
            }
            else {
                if (fullname == 'Họ tên (Hiển thị trên trang)' || fullname == '') {
                    alert('Vui lòng nhập họ tên');
                }
                else {
                    $('#tdLoading2').html("<img src='/images/loading.gif' width='40px' height='40px' />");
                    content = content.trim();
                    $.ajax({
                        type: "post",
                        async: true,
                        url: "/AjaxHandler/ProccessInsertComment.aspx",
                        data: { subjectID: subjectID, folderID: folderID, email: email, fullname: fullname, content: content, parentID: parentID },
                        success: function (data2) {
                            $('#login-box').css("display", "inline");
                            $('#login-box').css("width", "700px");
                            $('#login-box').height(heightPopup);
                            $('#login-box').css("top", "50px");
                            $('#login-box').css("left", leftScreen + "px");
                            $('#divAllComment').css("display", "inline");
                            $('#tableComment2').css("display", "none");
                            $('#tableMessageComment2').css("display", "none");
                            $('#tableCommentSuccess2').css("display", "inline");


                            // ClosePopup();
                            $('#hdRelyCommentAllNew').val('');
                            $('#hdCommentIDAllNew').val('0');
                            $('#hdCommentAllNew').val('');
                            $('#txtEmailAllNew').val('');
                            $('#txtFullNameAllNew').val('');
                            if (parentID != "0") {
                                var txtRelyID = '#txtRelyCommentAllNew' + parentID;
                                $(txtRelyID).val('');
                                var divForm = '#divFormRelyAllNew' + parentID;
                                $(divForm).css("display", "none");
                                var spanID = '#spanTitleRelyAllNew' + parentID;
                                $(spanID).val('Trả lời');
                                $('#tdLoading2').html("");
                            }
                            else {
                                $('#txtAllCommentRely').val('')
                                $('#tdLoading2').html("");
                            }
                        }

                    });
                }
            }
        }
    }
}

function ShowFormRelyComment(parentID) {
    var spanID = '#spanTitleRely' + parentID;
    var title = $(spanID).val();
  
    if (title == "Trả lời") {
        var divForm = '#divFormRely' + parentID;
        $(divForm).css("display", "block");
        $(spanID).val('Đóng lại');
    }
    else if (title == "Đóng lại") {
        var divForm = '#divFormRely' + parentID;
        $(divForm).css("display", "none");
        $(spanID).val('Trả lời');
    }

}

function ShowFormRelyNewComment(id) {
    var spanID = '#spanTitleRelyNewComment' + id;
    var title = $(spanID).val();

    if (title == "Trả lời") {
        var divForm = '#divFormRelyNewComment' + id;
        $(divForm).css("display", "block");
        $(spanID).val('Đóng lại');
    }
    else if (title == "Đóng lại") {
        var divForm = '#divFormRelyNewComment' + id;
        $(divForm).css("display", "none");
        $(spanID).val('Trả lời');
    }
}


function ShowFormRelyNewCommentLike(id) {
    var spanID = '#spanTitleRelyNewCommentLike' + id;
    var title = $(spanID).val();

    if (title == "Trả lời") {
        var divForm = '#divFormRelyNewCommentLike' + id;
        $(divForm).css("display", "block");
        $(spanID).val('Đóng lại');
    }
    else if (title == "Đóng lại") {
        var divForm = '#divFormRelyNewCommentLike' + id;
        $(divForm).css("display", "none");
        $(spanID).val('Trả lời');
    }
}


function ShowFormRelyAllNewComment(id) {
    var spanID = '#spanTitleRelyAllNew' + id;
    var title = $(spanID).val();
    var txtRelyID = '#txtRelyCommentAllNew' + id;
    
    if (title == "Trả lời") {
        var divForm = '#divFormRelyAllNew' + id;
        $(divForm).css("display", "block");
        $(spanID).val('Đóng lại');
        $(txtRelyID).val('');
    }
    else if (title == "Đóng lại") {
        var divForm = '#divFormRelyAllNew' + id;
        $(divForm).css("display", "none");
        $(spanID).val('Trả lời');
    }
}

function SubmitRelyComment(parentID) {
    var txtRelyID = '#txtRelyComment' + parentID;
    var contentRely = $(txtRelyID).val();
    contentRely = contentRely.trim();
  
    if (contentRely == "") {
        $('#login-box').css("display", "inline");
        $('#login-box').css("width", "400px");
        $('#login-box').css("height", "130px");
        $('#login-box').css("top", "180px");
        $('#login-box').css("left", "25%");
        $('#tableComment').css("display", "none");
        $('#tableMessageComment').css("display", "inline");
        $('#tableCommentSuccess').css("display", "none");
        $('#divAllComment').css("display", "none");
        var loginBox = $(this).attr('href');

        //Fade in the Popup and add close button
        $(loginBox).fadeIn(300);

        //Set the center alignment padding + border
        var popMargTop = ($(loginBox).height() + 24) / 2;
        var popMargLeft = ($(loginBox).width() + 24) / 2;

        $(loginBox).css({
            'margin-top': -popMargTop,
            'margin-left': -popMargLeft
        });

        // Add the mask to body
        $('body').append('<div id="mask"></div>');
        if (navigator.appName.indexOf("Internet Explorer") != -1) {

            $('#mask').css("filter", "alpha(opacity=70);");
        }
        $('#mask').css("display", "block");
        $('#mask').fadeIn(300);
    }
    else {
        $('#tdLoading').html("");
        $('#login-box').css("display", "inline");
        $('#login-box').css("width", "460px");
        $('#login-box').css("height", "160px");
        $('#login-box').css("top", "180px");
        $('#login-box').css("left", "25%");
        $('#tableComment').css("display", "inline");
        $('#tableMessageComment').css("display", "none");
        $('#tableCommentSuccess').css("display", "none");
        $('#divAllComment').css("display", "none");
        var loginBox = $(this).attr('href');
        $('#txtEmail').val('Email (Không hiển thị trên trang)');
        $('#txtFullName').val('Họ tên (Hiển thị trên trang)');
        var cookieEmail = getCookie("cookieEmail");
        var cookieName = getCookie("cookieName");
        if (cookieEmail != "" && cookieEmail != null) {
            $('#txtEmail').val(cookieEmail);
        }
        if (cookieName != "" && cookieName != null) {
            $('#txtFullName').val(cookieName);
        }
        //Fade in the Popup and add close button
        $(loginBox).fadeIn(300);

        //Set the center alignment padding + border
        var popMargTop = ($(loginBox).height() + 24) / 2;
        var popMargLeft = ($(loginBox).width() + 24) / 2;

        $(loginBox).css({
            'margin-top': -popMargTop,
            'margin-left': -popMargLeft
        });

        // Add the mask to body
        $('body').append('<div id="mask"></div>');
        if (navigator.appName.indexOf("Internet Explorer") != -1) {

            $('#mask').css("filter", "alpha(opacity=70);");
        }
        $('#mask').css("display", "block");
        $('#mask').fadeIn(300);

        $('#hdCommentID').val(parentID);
        $('#hdRelyComment').val(contentRely);
    }
}

function SubmitRelyCommentAllNew(parentID) {
    var txtRelyID = '#txtRelyCommentAllNew' + parentID;
    var contentRely = $(txtRelyID).val();
    contentRely = contentRely.trim();
    if (contentRely == "" || contentRely == " ") {
        $('#login-box2').css("display", "inline");
        $('#login-box2').css("width", "400px");
        $('#login-box2').css("height", "130px");
        $('#login-box2').css("left", "30%");
        $('#tableComment2').css("display", "none");
        $('#tableMessageComment2').css("display", "inline");
        $('#tableCommentSuccess2').css("display", "none");
        //$('#divAllComment').css("display", "none");
        var loginBox = $(this).attr('href');
       
        //Fade in the Popup and add close button
        $(loginBox).fadeIn(300);

        //Set the center alignment padding + border
        var popMargTop = ($(loginBox).height() + 24) / 2;
        var popMargLeft = ($(loginBox).width() + 24) / 2;

        $(loginBox).css({
            'margin-top': -popMargTop,
            'margin-left': -popMargLeft
        });

        // Add the mask to body
        $('body').append('<div id="mask"></div>');
        if (navigator.appName.indexOf("Internet Explorer") != -1) {

            $('#mask').css("filter", "alpha(opacity=70);");
        }
        $('#mask').css("display", "block");
        $('#mask').fadeIn(300);
    }
    else {
        $('#tdLoading2').html("");
        $('#login-box2').css("display", "inline");
        $('#login-box2').css("width", "460px");
        $('#login-box2').css("height", "160px");
        $('#login-box2').css("left", "30%");
        $('#tableComment2').css("display", "inline");
        $('#tableMessageComment2').css("display", "none");
        $('#tableCommentSuccess2').css("display", "none");
       
       // $('#divAllComment').css("display", "none");
        var loginBox = $(this).attr('href');
        $('#txtEmailAllNew').val('Email (Không hiển thị trên trang)');
        $('#txtFullNameAllNew').val('Họ tên (Hiển thị trên trang)');
        var cookieEmail = getCookie("cookieEmail");
        var cookieName = getCookie("cookieName");
        if (cookieEmail != "" && cookieEmail != null) {
            $('#txtEmailAllNew').val(cookieEmail);
        }
        if (cookieName != "" && cookieName != null) {
            $('#txtFullNameAllNew').val(cookieName);
        }
        //Fade in the Popup and add close button
        $(loginBox).fadeIn(300);

        //Set the center alignment padding + border
        var popMargTop = ($(loginBox).height() + 24) / 2;
        var popMargLeft = ($(loginBox).width() + 24) / 2;

        $(loginBox).css({
            'margin-top': -popMargTop,
            'margin-left': -popMargLeft
        });

        // Add the mask to body
        $('body').append('<div id="mask"></div>');
        if (navigator.appName.indexOf("Internet Explorer") != -1) {

            $('#mask').css("filter", "alpha(opacity=70);");
        }
        $('#mask').css("display", "block");
        $('#mask').fadeIn(300);

        $('#hdCommentIDAllNew').val(parentID);
        $('#hdRelyCommentAllNew').val(contentRely);
    }
}


function ShowPopupNewComment(id, parentID, subjectID, folderID) {
  
    var txtRelyID = '#txtRelyNewComment' + id;
    var contentRely = $(txtRelyID).val();
    contentRely = contentRely.trim();
    if (contentRely == "") {
        $('#login-box').css("display", "inline");
        $('#login-box').css("width", "400px");
        $('#login-box').css("height", "130px");
        $('#login-box').css("top", "180px");
        $('#login-box').css("left", "25%");
        $('#tableComment').css("display", "none");
        $('#tableMessageComment').css("display", "inline");
        $('#tableCommentSuccess').css("display", "none");
        $('#divAllComment').css("display", "none");
        var loginBox = $(this).attr('href');

        //Fade in the Popup and add close button
        $(loginBox).fadeIn(300);

        //Set the center alignment padding + border
        var popMargTop = ($(loginBox).height() + 24) / 2;
        var popMargLeft = ($(loginBox).width() + 24) / 2;

        $(loginBox).css({
            'margin-top': -popMargTop,
            'margin-left': -popMargLeft
        });

        // Add the mask to body
        $('body').append('<div id="mask"></div>');
        if (navigator.appName.indexOf("Internet Explorer") != -1) {

            $('#mask').css("filter", "alpha(opacity=70);");
        }
        $('#mask').css("display", "block");
        $('#mask').fadeIn(300);
    }
    else {
        $('#tdLoading').html("");
        $('#login-box').css("display", "inline");
        $('#login-box').css("width", "460px");
        $('#login-box').css("height", "160px");
        $('#login-box').css("top", "180px");
        $('#login-box').css("left", "25%");
        $('#tableComment').css("display", "inline");
        $('#tableMessageComment').css("display", "none");
        $('#tableCommentSuccess').css("display", "none");
        $('#divAllComment').css("display", "none");
        var loginBox = $(this).attr('href');
        $('#txtEmail').val('Email (Không hiển thị trên trang)');
        $('#txtFullName').val('Họ tên (Hiển thị trên trang)');
        var cookieEmail = getCookie("cookieEmail");
        var cookieName = getCookie("cookieName");
        if (cookieEmail != "" && cookieEmail != null) {
            $('#txtEmail').val(cookieEmail);
        }
        if (cookieName != "" && cookieName != null) {
            $('#txtFullName').val(cookieName);
        }
        //Fade in the Popup and add close button
        $(loginBox).fadeIn(300);

        //Set the center alignment padding + border
        var popMargTop = ($(loginBox).height() + 24) / 2;
        var popMargLeft = ($(loginBox).width() + 24) / 2;

        $(loginBox).css({
            'margin-top': -popMargTop,
            'margin-left': -popMargLeft
        });

        // Add the mask to body
        $('body').append('<div id="mask"></div>');
        if (navigator.appName.indexOf("Internet Explorer") != -1) {

            $('#mask').css("filter", "alpha(opacity=70);");
        }
        $('#mask').css("display", "block");
        $('#mask').fadeIn(300);

      
        $('#hdCommentID').val(parentID);
        $('#hdComment').val(contentRely);
        $('#hdSubjectID').val(subjectID);
        $('#hdFolderID').val(folderID);
        $('#hdChildCommentID').val(id);
    }
 }

 function ShowPopupNewCommentLike(id, parentID, subjectID, folderID) {

     var txtRelyID = '#txtRelyNewCommentLike' + id;
     var contentRely = $(txtRelyID).val();
     contentRely = contentRely.trim();
     if (contentRely == "") {
         $('#login-box').css("display", "inline");
         $('#login-box').css("width", "400px");
         $('#login-box').css("height", "130px");
         $('#login-box').css("top", "180px");
         $('#login-box').css("left", "25%");
         $('#tableComment').css("display", "none");
         $('#tableMessageComment').css("display", "inline");
         $('#tableCommentSuccess').css("display", "none");
         $('#divAllComment').css("display", "none");
         var loginBox = $(this).attr('href');

         //Fade in the Popup and add close button
         $(loginBox).fadeIn(300);

         //Set the center alignment padding + border
         var popMargTop = ($(loginBox).height() + 24) / 2;
         var popMargLeft = ($(loginBox).width() + 24) / 2;

         $(loginBox).css({
             'margin-top': -popMargTop,
             'margin-left': -popMargLeft
         });

         // Add the mask to body
         $('body').append('<div id="mask"></div>');
         if (navigator.appName.indexOf("Internet Explorer") != -1) {

             $('#mask').css("filter", "alpha(opacity=70);");
         }
         $('#mask').css("display", "block");
         $('#mask').fadeIn(300);
     }
     else {
         $('#tdLoading').html("");
         $('#login-box').css("display", "inline");
         $('#login-box').css("width", "460px");
         $('#login-box').css("height", "160px");
         $('#login-box').css("top", "180px");
         $('#login-box').css("left", "25%");
         $('#tableComment').css("display", "inline");
         $('#tableMessageComment').css("display", "none");
         $('#tableCommentSuccess').css("display", "none");
         $('#divAllComment').css("display", "none");
         var loginBox = $(this).attr('href');
         $('#txtEmail').val('Email (Không hiển thị trên trang)');
         $('#txtFullName').val('Họ tên (Hiển thị trên trang)');
         var cookieEmail = getCookie("cookieEmail");
         var cookieName = getCookie("cookieName");
         if (cookieEmail != "" && cookieEmail != null) {
             $('#txtEmail').val(cookieEmail);
         }
         if (cookieName != "" && cookieName != null) {
             $('#txtFullName').val(cookieName);
         }
         //Fade in the Popup and add close button
         $(loginBox).fadeIn(300);

         //Set the center alignment padding + border
         var popMargTop = ($(loginBox).height() + 24) / 2;
         var popMargLeft = ($(loginBox).width() + 24) / 2;

         $(loginBox).css({
             'margin-top': -popMargTop,
             'margin-left': -popMargLeft
         });

         // Add the mask to body
         $('body').append('<div id="mask"></div>');
         if (navigator.appName.indexOf("Internet Explorer") != -1) {

             $('#mask').css("filter", "alpha(opacity=70);");
         }
         $('#mask').css("display", "block");
         $('#mask').fadeIn(300);


         $('#hdCommentID').val(parentID);
         $('#hdComment').val(contentRely);
         $('#hdSubjectID').val(subjectID);
         $('#hdFolderID').val(folderID);
         $('#hdChildCommentID').val(id);
     }
 }

 function ShowPopupAllNewComment(subjectID, folderID,linkSubject,title) {
     var heightScreen = $(window).height();
     var heightPopup = parseInt(heightScreen) - 100;
     var widthScreen = $(window).width();
     var leftScreen = ((parseInt(widthScreen) - 700) / 2);
     $('body').append('<div id="mask"></div>');
     if (navigator.appName.indexOf("Internet Explorer") != -1) {

         $('#mask').css("filter", "alpha(opacity=70);");
     }
     $('#mask').css("display","block");
     $('#mask').fadeIn(300);

     $('#login-box').css("display", "inline");
     $('#login-box').css("width", "700px");
     $('#login-box').height(heightPopup);
     $('#login-box').css("top", "50px");
     $('#login-box').css("left", leftScreen+"px");

    
     var loginBox = $(this).attr('href');
 
     //Fade in the Popup and add close button
     $(loginBox).fadeIn(300);

     //Set the center alignment padding + border
     var popMargTop = ($(loginBox).height() + 24) / 2;
     var popMargLeft = ($(loginBox).width() + 24) / 2;

     $(loginBox).css({
         'margin-top': -popMargTop,
         'margin-left': -popMargLeft
     });

     // Add the mask to body
    

     $('#tableComment').css("display", "none");
     $('#tableMessageComment').css("display", "none");
     $('#tableCommentSuccess').css("display", "none");

     $('#divAllComment').height(heightPopup);
     $('#divAllComment').css("display", "inline");
     $('#txtEmail').val('Email (Không hiển thị trên trang)');
     $('#txtFullName').val('Họ tên (Hiển thị trên trang)');

     $('#divAllComment').load("/AjaxHandler/ProccessLoadAllCommentBySubject.aspx?subjectID=" + subjectID + "&folderID=" + folderID );
 }

 function ShowPopupAllNewCommentLike(subjectID, folderID, linkSubject, title) {
     var heightScreen = $(window).height();
     var heightPopup = parseInt(heightScreen) - 100;
     var widthScreen = $(window).width();
     var leftScreen = ((parseInt(widthScreen) - 700) / 2);
     $('body').append('<div id="mask"></div>');
     if (navigator.appName.indexOf("Internet Explorer") != -1) {

         $('#mask').css("filter", "alpha(opacity=70);");
     }
     $('#mask').css("display", "block");
     $('#mask').fadeIn(300);

     $('#login-box').css("display", "inline");
     $('#login-box').css("width", "700px");
     $('#login-box').height(heightPopup);
     $('#login-box').css("top", "50px");
     $('#login-box').css("left", leftScreen + "px");


     var loginBox = $(this).attr('href');

     //Fade in the Popup and add close button
     $(loginBox).fadeIn(300);

     //Set the center alignment padding + border
     var popMargTop = ($(loginBox).height() + 24) / 2;
     var popMargLeft = ($(loginBox).width() + 24) / 2;

     $(loginBox).css({
         'margin-top': -popMargTop,
         'margin-left': -popMargLeft
     });

     // Add the mask to body


     $('#tableComment').css("display", "none");
     $('#tableMessageComment').css("display", "none");
     $('#tableCommentSuccess').css("display", "none");

     $('#divAllComment').height(heightPopup);
     $('#divAllComment').css("display", "inline");
     $('#txtEmail').val('Email (Không hiển thị trên trang)');
     $('#txtFullName').val('Họ tên (Hiển thị trên trang)');

     $('#divAllComment').load("/AjaxHandler/ProccessLoadAllCommentBySubject.aspx?subjectID=" + subjectID + "&folderID=" + folderID);
 }


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


function loadGaComment(curIndex) {
    try {
        var url = $('#hdLinkSubject').val();
       
        var titlePage = $('#hdTitleSubject').val();
        if (url.indexOf('p=') != -1)
            url = updateQueryStringParameter(url, "p", curIndex);
        else
            url = url + '?p=' + curIndex;
        if (curIndex > 1) {
            titlePage += " | baodatviet.vn | " + curIndex;
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
            //ga.send(['_trackPageview', url]);

//            try {
//                ga('send', 'pageview', {
//                    'page': url,
//                    'title': titlePage,
//                    'hitCallback': function () {
//                      
//                    }
//                });
//            }
//            catch (e) {

//            }

//            try {
//                _gaq2.push(['_trackPageview', url]);
//            }
//            catch (e) {
//            }

        }
    }
    catch (ex) {

    }

}


function loadGaShowMoreComment() {
    try {

        var num = Math.floor((Math.random() * (100 + 1)) + 1)

        var url = $('#hdLinkSubject').val();

        var titlePage = $('#hdTitleSubject').val();
        if (url.indexOf('p=') != -1)
            url = updateQueryStringParameter(url, "p", num);
        else
            url = url + '?p=' + num;
        if (num > 1) {
            titlePage += " | baodatviet.vn | " + num;
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
           // ga.send(['_trackPageview', url]);
        }
    }
    catch (ex) {

    }

}


function loadGaShowAllComment(url, titlePage) {
    try {

        //var num = Math.floor((Math.random() * (100 + 1)) + 1)
//        if (url.indexOf('p=') != -1)
//            url = updateQueryStringParameter(url, "p", num);
//        else
//            url = url + '?p=' + num;
//        if (num > 1) {
//            titlePage += " | baodatviet.vn | " + num;
//        }

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
            //ga.send(['_trackPageview', url]);
        }
    }
    catch (ex) {

    }

}


jQuery.exists = function (selector) { return ($(selector).length > 0); }

//$(window).scroll(function () {

//    try {
//        var countComment = $('#hdTotalPage').val();
//        if (countComment > 0) {
//            var positionTopComment = $('#regionListBoxComment').position().top;
//            var heightRegionComment = $('#regionListBoxComment').height();
//            var bottomRegionComment = parseInt(positionTopComment) + parseInt(heightRegionComment) - 600;
//            var posY = $(window).scrollTop();
//            var numPage = $('#hdPageComment').val();
//            var totalPage = $('#hdTotalPage').val();
//            if (posY >= parseInt(bottomRegionComment)) {

//                var subjectID = $('#hdSubjectID').val();
//                var typeSort = $('#cbSortComment').val();
//                if (parseInt(numPage) <= parseInt(totalPage)) {
//                    $('#divCommentLoading').css("display", "block");

//                    $.ajax({
//                        type: "post",
//                        async: false,
//                        url: "/AjaxHandler/ProccessPaggingComment.aspx",
//                        data: { subjectID: subjectID, numPage: numPage, typeSort: typeSort },
//                        success: function (data2) {
//                            var newPage = parseInt(numPage) + 1;
//                            $('#hdPageComment').val(newPage);
//                            //document.getElementById('regionListBoxComment').innerHTML = data2;
//                            $('#regionListBoxComment').append(data2);
//                            $('#divCommentLoading').css("display", "none");
//                        }
//                    });

//                    loadGaComment(numPage);
//                }
//            }
//        }
//    } catch (e) {

//    }
//});


function PaggingComment(numPage, subjectID) {
    var typeSort = $('#cbSortComment').val();
    $.ajax({
        type: "post",
        async: true,
        url: "/AjaxHandler/ProccessPaggingComment.aspx",
        data: { subjectID: subjectID, numPage: numPage, typeSort: typeSort },
        success: function (data2) {
            document.getElementById('regionListBoxComment').innerHTML = data2;
        }
    });

    loadGaComment(numPage);

    var topComment = $('.postComment').position().top;
    topComment = parseInt(topComment) - 50;
    $('html, body').animate(
                    {
                        "scrollTop": topComment
                    },
                    500
                );
}
function PaggingAllNewComment(numPage, subjectID) {
    var heightScreen = $(window).height();
    var heightTable = parseInt(heightScreen) - 300;
    var typeSort = $('#cbSortAllNewComment').val();
    $.ajax({
        type: "post",
        async: true,
        url: "/AjaxHandler/ProccessPaggingAllNewComment.aspx",
        data: { subjectID: subjectID, numPage: numPage, typeSort: typeSort, heightTable: heightTable },
        success: function (data2) {
            document.getElementById('regionListBoxComment').innerHTML = data2;
        }
    });

    loadGaComment(numPage);

}

function ShowAllNewCommentFollowSort(typeSort) {
    var heightScreen = $(window).height();
    var heightTable = parseInt(heightScreen) - 300;
    var numPage = 1;
    if (typeSort == 'publishDate') {
        $('#spanSort').text('Comment mới nhất');
    }
    else if (typeSort == 'like') {
        $('#spanSort').text('Like nhiều nhất');
    }
    var subjectID = $('#hdNewSubjectID').val();
    $.ajax({
        type: "post",
        async: true,
        url: "/AjaxHandler/ProccessPaggingAllNewComment.aspx",
        data: { subjectID: subjectID, numPage: numPage, typeSort: typeSort, heightTable: heightTable },
        success: function (data2) {
            document.getElementById('regionListBoxComment').innerHTML = data2;
        }
    });

    //loadGaComment(numPage);
}


function getCookie(c_name) {
    var c_value = document.cookie;
    var c_start = c_value.indexOf(" " + c_name + "=");
    if (c_start == -1) {
        c_start = c_value.indexOf(c_name + "=");
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
function LikeComment(id) {
    var cookieLike = getCookie("likeCookie" + id);

    if (document.cookie != "" && document.cookie != null) {
        var arrCookie = document.cookie.split(";");
        var checkCookieExists = false;
        for (var i = 0; i < arrCookie.length; i++) {
            var valueCookie = arrCookie[i].split("=");
            if (valueCookie[1] == cookieLike) {
                checkCookieExists = true;
                break;
            }
        }

        if (!checkCookieExists) {
            $.ajax({
                type: "post",
                async: true,
                url: "/AjaxHandler/ProccessLikeComment.aspx",
                data: { id: id },
                success: function (data2) {
                    if (data2 == 'likesuccess') {
                        var spanLikeID = '#spanLike' + id;
                        var spanUnLikeID = '#spanUnLike' + id;
                        $(spanUnLikeID).css("display", "inline");
                        $(spanLikeID).css("display", "none");
                       
                        var oldLike = $(spanLikeID).text();
                        var newLike = parseInt(oldLike) + 1;
                        $(spanUnLikeID).text("+" + newLike);
                    }
                }
            });
        }
    }
    else {
        $.ajax({
            type: "post",
            async: true,
            url: "/AjaxHandler/ProccessLikeComment.aspx",
            data: { id: id },
            success: function (data2) {
                if (data2 == 'likesuccess') {
                    var spanLikeID = '#spanLike' + id;
                    var spanUnLikeID = '#spanUnLike' + id;
                    $(spanUnLikeID).css("display", "inline");
                    $(spanLikeID).css("display", "none");

                    var oldLike = $(spanLikeID).text();
                    var newLike = parseInt(oldLike) + 1;
                    $(spanUnLikeID).text("+" + newLike);
                }
            }
        });
    }

}


function LikeAllNewComment(id) {
    var cookieLike = getCookie("likeCookie" + id);
 
    if (document.cookie != "" && document.cookie != null) {
        var arrCookie = document.cookie.split(";");
        var checkCookieExists = false;
        for (var i = 0; i < arrCookie.length; i++) {
            var valueCookie = arrCookie[i].split("=");
            if (valueCookie[1] == cookieLike) {
                checkCookieExists = true;
                break;
            }
        }

        if (!checkCookieExists) {
            $.ajax({
                type: "post",
                async: true,
                url: "/AjaxHandler/ProccessLikeComment.aspx",
                data: { id: id },
                success: function (data2) {
                    if (data2 == 'likesuccess') {
                        var spanLikeID = '#spanLikeAllNew' + id;
                        var spanUnLikeID = '#spanUnLikeAllNew' + id;
                        $(spanUnLikeID).css("display", "inline");
                        $(spanLikeID).css("display", "none");

                        var oldLike = $(spanLikeID).text();
                        var newLike = parseInt(oldLike) + 1;
                        $(spanUnLikeID).text("+" + newLike);
                    }
                }
            });
        }
    }
    else {
        $.ajax({
            type: "post",
            async: true,
            url: "/AjaxHandler/ProccessLikeComment.aspx",
            data: { id: id },
            success: function (data2) {
                if (data2 == 'likesuccess') {
                    var spanLikeID = '#spanLikeAllNew' + id;
                    var spanUnLikeID = '#spanUnLikeAllNew' + id;
                    $(spanUnLikeID).css("display", "inline");
                    $(spanLikeID).css("display", "none");

                    var oldLike = $(spanLikeID).text();
                    var newLike = parseInt(oldLike) + 1;
                    $(spanUnLikeID).text("+" + newLike);
                }
            }
        });
    }

}

function UnLikeComment(id) {
    var cookieLike = getCookie("unLikeCookie" + id);

    if (document.cookie != "" && document.cookie != null) {
        var arrCookie = document.cookie.split(";");
        var checkCookieExists = false;
        for (var i = 0; i < arrCookie.length; i++) {
            var valueCookie = arrCookie[i].split("=");
            if (valueCookie[1] == cookieLike) {
                checkCookieExists = true;
                break;
            }
        }

        if (!checkCookieExists) {
            $.ajax({
                type: "post",
                async: true,
                url: "/AjaxHandler/ProccessUnLikeComment.aspx",
                data: { id: id },
                success: function (data2) {
                    if (data2 == 'unlikesuccess') {
                        var spanUnLikeID = '#spanUnLike' + id;
                        var spanLikeID = '#spanLike' + id;
                        $(spanLikeID).css("display", "inline");
                        $(spanUnLikeID).css("display", "none");
                        var oldLike = $(spanUnLikeID).text();
                        var newLike = parseInt(oldLike) - 1;
                        $(spanLikeID).text("+" + newLike);
                    }
                }
            });
        }
    }
    else {
        $.ajax({
            type: "post",
            async: true,
            url: "/AjaxHandler/ProccessUnLikeComment.aspx",
            data: { id: id },
            success: function (data2) {
                if (data2 == 'unlikesuccess') {
                    var spanUnLikeID = '#spanUnLike' + id;
                    var spanLikeID = '#spanLike' + id;
                    $(spanLikeID).css("display", "inline");
                    $(spanUnLikeID).css("display", "none");
                    var oldLike = $(spanUnLikeID).text();
                    var newLike = parseInt(oldLike) - 1;
                    $(spanLikeID).text("+" + newLike);
                }
            }
        });
    }
}


function UnLikeCommentAllNew(id) {
    var cookieLike = getCookie("unLikeCookie" + id);

    if (document.cookie != "" && document.cookie != null) {
        var arrCookie = document.cookie.split(";");
        var checkCookieExists = false;
        for (var i = 0; i < arrCookie.length; i++) {
            var valueCookie = arrCookie[i].split("=");
            if (valueCookie[1] == cookieLike) {
                checkCookieExists = true;
                break;
            }
        }

        if (!checkCookieExists) {
            $.ajax({
                type: "post",
                async: true,
                url: "/AjaxHandler/ProccessUnLikeComment.aspx",
                data: { id: id },
                success: function (data2) {
                    if (data2 == 'unlikesuccess') {
                        var spanUnLikeID = '#spanUnLikeAllNew' + id;
                        var spanLikeID = '#spanLikeAllNew' + id;
                        $(spanLikeID).css("display", "inline");
                        $(spanUnLikeID).css("display", "none");
                        var oldLike = $(spanUnLikeID).text();
                        var newLike = parseInt(oldLike) - 1;
                        $(spanLikeID).text("+" + newLike);
                    }
                }
            });
        }
    }
    else {
        $.ajax({
            type: "post",
            async: true,
            url: "/AjaxHandler/ProccessUnLikeComment.aspx",
            data: { id: id },
            success: function (data2) {
                if (data2 == 'unlikesuccess') {
                    var spanUnLikeID = '#spanUnLikeAllNew' + id;
                    var spanLikeID = '#spanLikeAllNew' + id;
                    $(spanLikeID).css("display", "inline");
                    $(spanUnLikeID).css("display", "none");
                    var oldLike = $(spanUnLikeID).text();
                    var newLike = parseInt(oldLike) - 1;
                    $(spanLikeID).text("+" + newLike);
                }
            }
        });
    }
}

function ShowCommentFollowSort(typeSort) {

    $('#hdPageComment').val(2);
    var numPage = 1;
    if (typeSort == 'publishDate') {
        $('#spanSort').text('Comment mới nhất');
    }
    else if (typeSort == 'like') {
        $('#spanSort').text('Like nhiều nhất');
    }
    var subjectID = $('#hdSubjectID').val();
    $.ajax({
        type: "post",
        async: true,
        url: "/AjaxHandler/ProccessPaggingComment.aspx",
        data: { subjectID: subjectID, numPage: numPage, typeSort: typeSort },
        success: function (data2) {
            document.getElementById('regionListBoxComment').innerHTML = data2;
        }
    });

    //loadGaComment(numPage);
}

$(document).ready(function () {
    $('.pluginCountBox').css("padding-top", "0px");
    $('.pluginCountBox').height(14);
});

// 20-10-2014 DangCM edit

/**DangCM 03-10 edit comment**/
function Comment(id, parent) {
    var checktimer,self = this, articleid = id;
    var $comment = $(parent), $commentField, $notes, $btnSubmit, $commentList, $btnMore;
    this.userinfo = null;
    var $top = 5;
    var $totalAllComment = 0;
    var $totalPaging = 1;

    // fetch approved comments from CMS
    this.getData = function (callback, pagination, timeorder, parent){
        var strTimeOrder = timeorder ? 'publishDate' : 'like';
        if (articleid == null) return;
        
        $.ajax({
            type: "POST",
            url: "/Detail/GetAllCommentParent",
            data: { subjectId: articleid, typesort: strTimeOrder, top: $top, page: pagination }
        }).done(function (data) {
            if (callback && (typeof callback == 'function')) {
                callback(data);
            }
        });
    };
	
	// fetch approved comments from CMS
    this.Like = function (commentID,cmtTemp){
        var strCookie = readCookie('CommentKey');
       
		if(strCookie==null) {
			strCookie='';
		}
	
		if(strCookie.indexOf(commentID)>-1){
			showDialog(
				'Thông báo',
				'<p>Bạn đã bình chọn cho bình luận này rồi. Bạn chỉ có thể bình chọn 1 lần cho mỗi bình luận.</p>'
			);
			return;
		}
		$.ajax({
            type: 'GET',
            url: '/AjaxHandler/Comment.ashx?Type=2&SubjectID=' + articleid,
            cache: false,
            data: {CommentID:commentID,Value:1}
        }).done(function (data) {
           if(data=='OK'){
				var iLike = parseInt(cmtTemp.find('span').text());
				iLike+=1;
				cmtTemp.find('span').html(iLike);
				strCookie=strCookie+commentID+',';
				createCookie('CommentKey',strCookie,30);
		   }
        });
    };


    // update comments list
    this.updateComment = function (commentpage, orderbytime, pushed) {
        var pagination = (commentpage == null) ? 1 : commentpage;
        var comment, comment_content = '';

        self.getData(function (data) {
            if (data.length > 0 && commentpage == 1 && $comment.find('.order').length == 0 && !pushed) {
                $commentList.before('<div class="order"><label>Xếp theo: </label><a href="#" class="orderbyimportance current">Hay nhất</a><a href="#" class="orderbytime">Mới nhất</a> </div>');
                $comment.find('.order a').on('click', function (e) {
                    e.preventDefault();
                    if ($(this).hasClass('current')) return;
                    $btnMore.attr('nextpage', 1);
                    //SetNextPage();
                    $(this).siblings('.current').removeClass('current');
                    $(this).addClass('current');
                    if ($(this).hasClass('orderbyimportance')) {
                        $comment.removeAttr('orderbytime');
                    } else {
                        $comment.attr('orderbytime', 1);
                    }
                    $commentList.html('');
                    var orderbytime = ($comment.attr('orderbytime') == 1);
                    self.updateComment(1, orderbytime);
                });

            }
            if (!pushed) {
                $commentList.html(data);
            } else {//pushed=true;
                $commentList.append(data);
            }

            $commentList.find('.comment-actions a').off('click').on('click', function (e) {
                e.preventDefault();
                var $cmt = $(this);
                var cmt_id = $cmt.parents('li').attr('id');
                var cmt_name = $cmt.parents('li').find('.author').html();
                if ($cmt.hasClass('btnReply')) {
                    if ($cmt.parents('li').find('.reply').length == 0) {
                        var $replyForm = $('<div>', { 'class': 'reply' }).html('<textarea comment-parent="' + cmt_id + '"></textarea><a href="#" class="btnSubmit disabled">Gửi trả lời</a>');
                        $cmt.after($replyForm);
                        $replyForm.find('.btnSubmit').on('click', function (e) {
                            e.preventDefault();
                            $replyForm.hide();
                            var $reply = $(this).parents('.reply').find('textarea');
                            self.submitComment($reply.val(), true, $reply.attr('comment-parent'), function (result) {
                                if (result === false) {
                                    $replyForm.show();
                                }
                            });
                        });
                    }
                    else {
                        $cmt.parents('li').find('.reply').remove();
                    }
                } else if ($cmt.hasClass('btnLike')) {
                    self.Like(cmt_id, $cmt);
                } else if ($cmt.hasClass('btnsharefb')) {
                    var m = $('meta[property="og:image"]');
                    var host = 'http://baodatviet.vn';
                   var PathName = window.location.pathname;
					FB.ui({
						method: 'share',
						href: host + PathName,
					  
					}, function(response){
						if (response && !response.error_code) {
							// Lay thong tin user
							//alert('vao day');
							self.getUserInfo(function (user) {
								self.logShareFB(user,cmt_id);
							});
						} else {
						  //alert('Error while posting.');
						}

					});
                }
            });

            $commentList.find('a.btnMore').off('click').on('click', function (e) {
                e.preventDefault();
                var $cmt = $(this);
                var cmt_id = $cmt.parents('li').attr('id');
                var content_ul = $cmt.parents('li').find('ul');
                $.ajax({
                    type: 'POST',
                    url: "/Detail/GetAllCommentParent",
                    data: { subjectId: articleid, typesort: '', top: $top, page: 2, parentId: cmt_id }
                }).done(function (data) {
                    content_ul.html(data);
                });
                $cmt.remove();
            });

            if (pagination == 1) {
                $totalPaging = $("#hddTotalComment").val();
                $totalAllComment = $("#ip-total-all-comment").val();
                if ($totalAllComment == undefined) {
                    $totalAllComment = 0;
                }
                if ($totalPaging == undefined) {
                    $totalPaging = 1;
                }
                if ($("#a-comment").hasClass("cmd-count") == false) {
                    $("#a-comment").find("span").append($totalAllComment);
                    $("#a-comment").addClass("cmd-count");
                }
                $("#sp-total-comment").html("(" + $totalAllComment + ")");
            }
            //SetNextPage();               
            self.PagingCommentNew(pagination);
        }, pagination, orderbytime);
    };
	
	this.logShareFB = function (user,cmt_id)
	{
		var commentData = {
            'FacebookID': user.id,
            'Name': user.name,
			'Email': user.email,
			'CommentID': cmt_id
        };
		//alert(cmt_id);
		$.ajax({
            type: 'GET',
            url: '/AjaxHandler/Comment.ashx?Type=3&SubjectID=' + articleid,
            cache: false,
            data: commentData
        }).done(function (data, status, jqXHR) {
			console.log('Log share thanh cong');
        });
	}
	
	
	this.login = function(comment_content,parentid,callback){
		//alert(comment_content);
		showDialog(
			'Thông tin người dùng',
			'<p>Để gửi bình luận, bạn vui lòng cung cấp thông tin:</p>'
			+'<form>'
			+'<p><label>Họ và tên</label> <input type="text" id="comment_name" maxlength="25"  /></p>'
			+'<p><label>Email</label> <input type="text" id="comment_email"  /></p>'
			+'</form>',
			{
				submit: {
					text: 'Gửi bình luận',
					action: function(){
						var username = $('#comment_name').val().trim();
						var useremail = $('#comment_email').val().trim();
						if(username!='' && useremail!='') {
							//log('New user. Generate new user!',self.userinfo);
							self.userinfo = {
								id: 0,
								name: username,
								email:useremail,
								avatar:''
							};

							self.pushComment({
								'userid': self.userinfo.id,
								'username': self.userinfo.name,
								'useremail': self.userinfo.email,
								'useravatar': self.userinfo.avatar,
								'comment_content': comment_content
							}, function (result) {
								if (callback && typeof callback == 'function') {
									callback(result);
								}
							}, parentid);
							closeDialog();
						} else {
							alert('Bạn cần phải cung cấp tên và email để gửi bình luận!');
						}

					}
				},
				cancel: {
					text:'Đóng',
					action: function(){
						//log('User provide no information!');
						closeDialog();
						setTimeout(function(){
							showDialog(
								'Bình luận chưa được gửi',
								'<p>Bạn chưa đăng nhập hoặc chưa điền thông tin cá nhân. Để gửi bình luận, bạn cần phải cung cấp thông tin người dùng. Vui lòng thử lại.</p>'
							);
						},100);

					}
				}
			}
		);
	}


    // submit comment
    this.submitComment = function (comment_content, checked, parentid, callback) {
		var result = false;
        if (checked == null || checked === true) {
            //log('Checking comment content');
            result = self.checkCommentContent(comment_content, function () {
				//alert('vao call back');
                self.submitComment(comment_content, false, parentid);
            });
            if (result === false) {
                if (callback && typeof callback == 'function') {
					callback(result);
				}
            }
            return;
        }
		//alert(comment_content);
		//alert(FBAvailable);
		if(FBAvailable){
			self.getUserInfo(function (user) {
				//alert('Call Back ve submitComment');
				//user=null;
				if (user == null) {
					self.login(comment_content,parentid,callback);
				} else {
					self.pushComment({
						'userid': user.id,
						'username': user.name,
						'useremail': user.email,
						'useravatar': user.avatar,
						'comment_content': comment_content
					}, function (result) {
						if (callback && typeof callback == 'function') {
							callback(result);
						}
					}, parentid);
				}
			});
		}
		else
		{
			self.login(comment_content,parentid,callback);
		}
    };

    this.pushComment = function (comment, callback, ParentID) {       
        var commentContent = comment.comment_content;
        var commentData = {
            'FacebookID': comment.userid,
            'Name': comment.username,
            'Email': comment.useremail,
            'Content': commentContent,
            'FolderID': _folderID
        };

        if (ParentID) {
            commentData.ParentID = ParentID;
        }else{
            commentData.ParentID = 0;
        }

        // then send comment to server
        $.ajax({
            type: 'GET',
            url: '/AjaxHandler/Comment.ashx?Type=1&SubjectID=' + articleid,
            cache: false,
            data: commentData
        }).fail(function (jqXHR, status, error) {
            //alert('loi roi');
        }).done(function (data, status, jqXHR) {
            showDialog(
				'Chia sẻ bình luận',
				'<p>Bình luận của bạn đã được gửi thành công!</p>',
				{
					// submit: {
						// text: 'Đóng',
						// action: function(){
							// closeDialog();
							// //page.socialplugin.comment(comment.comment_content,$comment.attr('url'));
							// //page.socialplugin.showFanpagePopup();
						// }
					// },
					 cancel: {
						 text:'Đóng',
						 action:function(){
							 closeDialog();
							// //socialplugin.showFanpagePopup();
						 }
					 }
				}
			);
			if(ParentID){
				$('#'+ParentID).find('.reply').remove();
			}else{
				$('.commentbox').find('p.content textarea').val('');
			}
			
        });
    }

    // Get user info
    this.getUserInfo = function (callback) {     

        // if already checked before
        if (self.userinfo != null) {
            if (callback && typeof callback == 'function') {
                callback(self.userinfo);
            }
            return;
        } else {
            //log('User not login yet');
        }

        // fb available, looking for fb info first
        // log('Checking Facebook login status');
        FB.getLoginStatus(function (response) {
			//alert(response.status);
            if (response.status === 'connected') {
                var uid = response.authResponse.userID;
                var accessToken = response.authResponse.accessToken;
                $('body').addClass('fbAuthorized');

                FB.api('/' + uid, function (user) {
                    self.userinfo = {
                        name: user.name,
                        email: user.username + '@facebook.com',
                        id: user.id,
                        avatar: 'http://graph.facebook.com/' + user.id + '/picture?type=square'
                    };
                    
                    if (callback && typeof callback == 'function') {
                        callback(self.userinfo);
                    }

                });
            } else {
				FB.login(function(response){
					console.log(response);
					if (response.authResponse)
					{
						//alert('Khong vao');
						FB.api('/me', function(response) {
							self.userinfo = {
								name: user.name,
								email: user.username + '@facebook.com',
								id: user.id,
								avatar: 'http://graph.facebook.com/' + user.id + '/picture?type=square'
							};
							
							if (callback && typeof callback == 'function') {
								callback(self.userinfo);
							}
						});
					}else{
						if (callback && typeof callback == 'function') {
							callback(null);
						}
					}
				});
                
            }
        });
		
		
    };

    // check comment content
    this.checkCommentContent = function (comment, callback) {

        // first check if comment is not empty
        if (comment.trim() == '') {
            showDialog(
                'Bình luận không có nội dung',
                '<p>Bình luận không thể để trống. Vui lòng chia sẻ vài dòng suy nghĩ của bạn về bài viết.</p>'
            );
            return false;
        };

//        // check if comment is too short
//        var words = comment.split(' ');
//        if (words.length < 10) {
//            showDialog(
//            'Bình luận quá ngắn',
//            '<p style="margin-bottom:8px;"><strong>Bình luận của bạn quá ngắn!</strong> Ban quản trị sẽ chỉ duyệt nếu bình luận dài tối thiểu 10 chữ. Bạn có muốn tiếp tục?</p><p style="font-size:0.9em;color:#888;">Chú ý: Bạn vẫn có thể gửi bình luận nhưng bình luận của bạn sẽ không vào danh sách chờ duyệt và sẽ không hiển thị.</p>',
//            {
//                submit: {
//                    text: 'Quay lại cập nhật',
//                    action: function () {
//                        closeDialog();
//                    }
//                },
//                cancel: {
//                    text: 'Gửi bình luận',
//                    action: function () {
//                        closeDialog();
//                        if (callback && typeof callback == 'function') {
//							setTimeout(function(){
//								callback();
//							},100);
//                            
//                        }
//                    }
//                }
//            }
//        );
//            return false;
//        }

        // check if comment is Vietnamese
//        if (!isVietnamese(comment)) {
//            showDialog(
//            'Bình luận bằng tiếng Việt có dấu',
//            '<p><strong>baodatviet.vn chỉ đăng bình luận bằng tiếng Việt có dấu!</strong> Nội dung bình luận của bạn không có ký tự tiếng Việt. Bạn có muốn tiếp tục?</p>',
//            {
//                submit: {
//                    text: 'Quay lại cập nhật',
//                    action: function () {
//                        closeDialog();
//                    }
//                },
//                cancel: {
//                    text: 'Gửi bình luận không dấu',
//                    action: function () {
//                        closeDialog();
//                        if (callback && typeof callback == 'function') {
//                            setTimeout(function(){
//								callback();
//							},100);
//                        }
//                    }
//                }
//            }
//        );
//            return false;
//        }

        if (callback && typeof callback == 'function') {
            callback();
        }
		return true;
    };

    var SetNextPage = function () {
        var TotalComment = $("#hddTotalComment").val();
        var vtotal = $("#ip-total-all-comment").val();
        var CurrentPage = parseInt($btnMore.attr('nextpage'));
        if (TotalComment / $top >= CurrentPage) {
            $btnMore.attr('nextpage', CurrentPage+1);
            $btnMore.show();
        } else {
            $btnMore.hide();
        }
        if(vtotal==undefined){
            vtotal = 0;
        }  
        if($("#a-comment").hasClass("cmd-count") == false)
        {         
            $("#a-comment").find("span").append(vtotal);
            $("#a-comment").addClass("cmd-count");           
        }
        $("#sp-total-comment").html("(" + vtotal + ")");
    }

    // setup comment box
    var init = function () {
        //setup
        $comment.addClass('commentbox').attr('url', 'http://news.zing.vn/zing-post' + articleid + '.html').html('');
        $comment.html('<header><h1>Bình luận <span id="sp-total-comment"></span></h1></header>');

        $comment.append(
            '<div class="form">'
            + '<p class="content"><label>Nội dung</label>'
            + '<textarea></textarea></p>'
        //+ '<p class="note"><span class="length">tối thiểu 10 chữ</span> <span class="vietnamese">tiếng Việt có dấu</span> <span class="link">không chứa liên kết</span> </p>'
            + '<a href="#" class="btnSubmit disabled">Gửi bình luận</a>'
            + '</div>'
            + '<ul class="comments"></ul>'
            + '<a href="#" nextpage="1" style="display:none;" class="btnMore">Xem thêm</a>'
            + '<div class="pagination_news width_common right"><div id="pagination" style="width:400px;margin-right: -100px;"></div></div>'
        );
        if (fbID > 0) {
            $('.commentbox').find('p.content label').html('<img src="http://graph.facebook.com/' + fbID + '/picture?type=square" width="40" height="40" class="avatar"><strong>' + fbName + '</strong> (<a href="javascript:logout();" title="Thoát">Thoát</a>)');
        }

        $commentField = $comment.find('.form textarea');
        $notes = $comment.find('.note span');
        $btnSubmit = $comment.find('a.btnSubmit');
        $commentList = $comment.find('ul.comments');
        $btnMore = $comment.find('> .btnMore');

        // setup submitting event
        $btnSubmit.on('click', function (e) {
            e.preventDefault();
            self.submitComment($commentField.val(), true);
        });

        // user click to see more comments
        $btnMore.on('click', function (e) {
            e.preventDefault();
            var orderbytime = ($comment.attr('orderbytime') == 1);
            self.updateComment(parseInt($(this).attr('nextpage')), orderbytime, true);
        });

        //        // setup event tracking on textarea
        //        $commentField.on('input propertychange', function () {
        //            clearTimeout(checktimer);
        //            checktimer = setTimeout(function () {
        //                var comment_content = $commentField.val();
        //                //log('Checking comment content');
        //                if (comment_content.trim() == '') {
        //                    $notes.removeClass('ok').removeClass('fail');
        //                    $btnSubmit.addClass('disabled');
        //                    return;
        //                }
        //                var words = comment_content.split(' ');
        //                if (words.length < 10) {
        //                    $comment.find('.length').addClass('fail').removeClass('ok');
        //                } else {
        //                    $comment.find('.length').addClass('ok').removeClass('fail');
        //                    $btnSubmit.removeClass('disabled');
        //                }

        //                if (words.length > 1) {
        //                    if (!isVietnamese(comment_content)) {
        //                        $comment.find('.vietnamese').addClass('fail').removeClass('ok');
        //                    } else {
        //                        $comment.find('.vietnamese').addClass('ok').removeClass('fail');
        //                    }

        //                    if (comment_content.match(/https*:|www\.\S+/i) != null) {
        //                        $comment.find('.link').addClass('fail').removeClass('ok');
        //                    } else {
        //                        $comment.find('.link').addClass('ok').removeClass('fail');
        //                    }
        //                }

        //            }, 200);
        //        });

        // update comment list
        var orderbytime = ($comment.attr('orderbytime') == 1);
        //var orderbytime = true;
        self.updateComment(1, orderbytime);
        $comment.show();
    };

    // 06-10 DangCM edit
     // push comment on facebook
    this.comment = function(content, url, callback){
        log('Attempt share comment on facebook');
        if (typeof FB == undefined || !self.isFBLogin) {
//            log('Facebook is not accessible. Share cancel!');
            return;
        }

        log('Sharing article '+url);

        /* using custom open graph action */
        FB.api('me/zing_news:comment', 'post', {
            article : url,
            message: content,
            'fb:explicitly_shared': true
        }, function(response) {
            log(response);
            if (response && !response.error) {
//                log ('Comment posted on Facebook');
                if(callback && typeof callback == 'function') {
                    callback(true);
                }
            } else {
                if(callback && typeof callback == 'function') {
                    callback(false);
                }
//                log ('Unable to submit comment to Facebook');
            }
        });
    };

    // share url on facebook
    this.share = function(url, type, caption) {                
        var shareInfo = {
            link : url,
            display: 'popup'
        };
        if (type) { shareInfo.method = type; } else {shareInfo.method = 'feed';}
        if (caption) {shareInfo.caption = caption};

        FB.ui(shareInfo, function(response) {});
    };

    // like an url on facebook
    this.like = function(url, callback, message) {

        if (typeof FB == undefined) {
            log('Facebook is not accessible. Like cancel!');
            if(callback) callback(false);
            return;
        }

//        log('User like an article: '+url);

        if (!self.isFBLogin) {
            FB.login(function(response) {
                if (response.authResponse) {
                    log("Login with FB successful");
                    self.isFBLogin = true;
                    self.like(url,callback);

                } else {
                    log('User cancelled login or did not fully authorize.');
                    page.showDialog(
                        'Đăng nhập thất bại',
                        '<p>Bạn cần đăng nhập Facebook và cấp quyền để có thể thực hiện tác vụ này. Bạn muốn thử lại?</p>',
                        {
                            submit: {
                                text:'Thử lại',
                                action: function(){
                                    self.like(url,callback);
                                    page.closeDialog();
                                }
                            },
                            cancel: {
                                text:'Đóng',
                                action: function(){
                                    page.closeDialog();
                                    callback(false);
                                }
                            }
                        }
                    );

                }
            },{scope: 'publish_actions,publish_stream'});
            return;
        }

        var msg = null, fbshare = true;
        if (message===false) {
            fbshare = false;
        } else if (message!="") {
            msg = message;
        }

        FB.api('me/og.likes', 'post', {
            object : url,
            message: msg,
            'fb:explicitly_shared': false
        }, function(response) {
//            log(response);
            if ((response.error && response.error.code==3501) || response.id) {
                var actionid;
                if(response.id) actionid = response.id;
                else {
                    actionid = response.error.message.match(/\d+$/i)[0];
                }
//                log('Like success: '+url);
                page.socialplugin.showFanpagePopup();
                //page.storage.insert(url,actionid);
                callback(true,actionid);
            } else {
//                log('Like fail: '+url);
                callback(false);
            }

        });
    };
     // open fanpage follow box
    this.showFanpagePopup = function(){
        if (FB==undefined) return;
        if (self.userinfo==null || self.isFBLogin===false) {
            var show_popup = page.storage.loadContent('popup_follow');
            // only show the first time or at least 7 days separated
            if(show_popup==null || show_popup===false || show_popup.age > 10000) {
                page.showFollowDialog();
//                log("User hasn't login, but last popup is MORE than 7 days ago --> show");
            } else {
//                log("User is not login, and last popup is LESS than 7 days ago --> no show");
            }
            return;
        }        
        FB.api({
            method: 'fql.query', 
            query:  'SELECT uid FROM page_fan WHERE uid='+self.userinfo.id+' AND page_id=1414411772114879'
        }, function(resp) {
            var show_popup = page.storage.loadContent('popup_follow');
            if (!resp || resp.error) {
                // error (no authorization)                
                if(show_popup==null || show_popup===false || show_popup.age > 10000) {
                    page.showFollowDialog();
//                    log("Error authenticating user, but last popup is MORE than 7 days ago --> show");
                }  else {
//                    log("Error authenticating user, but last popup is LESS than 7 days ago --> no show");
                }
            } else {
                if (resp.length) {
                    // already a fan, so no asking                
//                    log("User is login and already be a fan --> no show");
                } else {
                    if(show_popup==null || show_popup===false || show_popup.age > 10000) {
//                        log("User is login and hasn't liked yet, last popup is MORE than 7 days ago --> show");
                        page.showFollowDialog();                        
                    }  else {
                    }
                }
            }
            
        });
    };

    /**31-10 DangCM edit paging**/
    this.PagingCommentNew=function(pagecurrent) {
        var vnumpage = Math.ceil($totalPaging / $top);
        var vpaging ="";
        var vnumlinks = 5;
        if(vnumpage > 1){
            var begin = 1;
            var end = begin + vnumlinks;
            if (vnumpage <= vnumlinks) {
               begin = 1;
               end = begin + vnumpage;
            } else {
                if(pagecurrent > 3){
                    begin = pagecurrent - 2;
                    end = begin + vnumlinks;
                    if(end > vnumpage + 1) {
                        end = vnumpage + 1;
                        begin = end - vnumlinks;
                    }
                }
                if (pagecurrent + 1 >= vnumpage){
                    end = vnumpage + 1;
                    begin = end - vnumlinks;
                }
            }            
            if(pagecurrent > 1){
                vpaging +='<a href="javascript:void(0)" class="pagination_btn prev">&nbsp;</a>';
            }
            for (var i = begin; i < end && i <= vnumpage; i++) {
                if (i == pagecurrent) {
                    vpaging += '<a class="number active" href="javascript:void(0)">' + i + '</a>';
                } else {
                    vpaging +='<a class="number" href="javascript:void(0)">' + i + '</a>';
                }
            }
            if(pagecurrent < vnumpage){                
                vpaging+='<a href="javascript:void(0)" class="next pagination_btn">&nbsp;</a>';
            }
            $(".pagination_news").show();
        }
        else {
            $(".pagination_news").hide();
        }

        $comment.find(".pagination_news").find("#pagination").html(vpaging);      
        $comment.find(".pagination_news").find("#pagination a").on("click",function(){
            if($(this).hasClass("active") == false){
                if($(this).hasClass("next")) {
                    pagecurrent = pagecurrent + 1;
                }else if($(this).hasClass("prev")) {
                    pagecurrent = pagecurrent - 1;
                }else {
                    pagecurrent = parseInt($(this).text());
                }
                $commentList.html('');
                ScrollToBoxComment();
                var orderbytime = ($comment.attr('orderbytime') == 1);
                self.updateComment(pagecurrent, orderbytime);
            }
        });   
    };
    init();
}

function ScrollToBoxComment() {
    var topComment = $('#div-comment-content').position().top;
    topComment = parseInt(topComment) - 50;
    $('html, body').animate(
            {
                "scrollTop": topComment
            },
            500
        );
}
function createCookie(name,value,days) {
    if (days) {
        var date = new Date();
        date.setTime(date.getTime()+(days*24*60*60*1000));
        var expires = "; expires="+date.toGMTString();
    }
    else var expires = "";
    document.cookie = name+"="+value+expires+"; path=/";
}

function readCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}
var delete_cookie = function(name) {
    document.cookie = name + '=;expires=Thu, 01 Jan 1970 00:00:01 GMT;';
};

function fixContent(content) {
    var output = content;

    //fix common short-hand
    output = output.replace(/\s(k|hok|ko)\s/ig,' không ');
    output = output.replace(/\sj\s/ig,' gì ');
    output = output.replace(/potay/ig,'bó tay');
    output = output.replace(/\sngta/ig,' người ta');
    output = output.replace(/\sng\s/ig,' người ');
    output = output.replace(/\s(dc|đc)/ig,' được');
    output = output.replace(/\smún/ig,' muốn');
    output = output.replace(/\se\s/ig,' em ');
    output = output.replace(/\swa\s/ig,' qua ');
    output = output.replace(/\szậy/ig,' vậy');

    // remove common emotion expressions
    output = output.replace(/hehe(\S*)/i,'');
    output = output.replace(/:v/ig,'');
    output = output.replace(/:\)\)+/ig,':)');
    output = output.replace(/\^\^+/ig,'');
    output = output.replace(/@@+/g,'@');
    output = output.replace(/haizz+/ig,'');
    output = output.replace(/T_+T/ig,'');
    output = output.replace(/[@#$!%][!@#$%]+/ig,'');
//    output = output.replace(/=\)\)*/ig,'');

    return output;
}

function fixCommonErrors(content) {
    var output = content;

    // fix common error of repeat characters
    output = output.replace(/!{2,}/g,'!'); // multiple !!!!
    output = output.replace(/\.{2,}/g,'...'); // multiple ....
    output = output.replace(/\?{2,}/g,'?'); // multiple ???
    output = output.replace(/,{2,}/g,','); // multiple ,,,
    output = output.replace(/__+/ig,'_'); // multiple ___

    // fix common spacing errors
    output = output.replace(/\s+!/g,'!'); // extra space before !
    output = output.replace(/\s+\?/g,'?'); // extra space before ?
    output = output.replace(/\s+,/g,','); // extra space before ,
    output = output.replace(/\s+\./g,'.'); // extra space before .
    output = output.replace(/\s+\)/g,')'); // extra space before )

    // remove all emails & URL (just for simple common case)
    output=output.replace(/\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b/ig,'');
    output=output.replace(/(https*:|www\.)\S+/ig,'');

    // insert whitespace before certain characters (i.e. "a (b)")
    var words = ['('];
    for(var i=0,j=words.length;i<j;i++){
        var s = content.match(new RegExp("(\\S)\\"+words[i],'g'));
        if (s==null) continue;
        for(var a=0,b=s.length;a<b;a++){
            output = output.replace(s[a],s[a].charAt(0)+' '+words[i]);
        }
    }

    // just one more thing, remove extra space
    output = output.replace(/(\s)\1+/g,' '); // multiple spacing

    return output;
}

function capitalizeSentence(content){
    var split = ['.','?','!'];
    for(var a=0,b=split.length; a<b; a++){
        var s = content.match(new RegExp("\\"+split[a]+"\\s*([^"+split[a]+"])",'g'));
        if (s==null) continue;
        for(var i=0,j=s.length;i<j;i++) {
            var firstLetter = s[i].charAt(s[i].length-1).toUpperCase();
            content = content.replace(s[i],split[a]+' '+firstLetter);
        }
    }
    content = content.charAt(0).toUpperCase()+content.substring(1);

    return content;
}


// Display and hide dialog
function showDialog(title, content, actions) {
    if (content == null) {
        return;
    }

    var $dialog = $('#dialog');

    if ($dialog.length == 0) {
        $('body').append($('<div>', {
            id: 'dialog'
        }));

        $dialog = $('#dialog');

        var dialogHtml = '<div>' +
                '<div class="header"></div>' +
                '<div class="content"></div>' +
                '<div class="action"><button class="btnSubmit">Đồng ý</button><button class="btnCancel">Đóng</button></div>' +
                '</div>';

        $dialog.html(dialogHtml);
    }

    var $btnSubmit = $dialog.find('.action button.btnSubmit'),
            $btnCancel = $dialog.find('.action button.btnCancel');

    $dialog.find('.header').html(title || 'Thông báo');
    $dialog.find('.content').html(content);

    $btnCancel.text('Đóng');

    if (actions != null) {
        if (actions.submit != null) {
            $btnSubmit.html(actions.submit.text || 'Đồng ý');

            $btnSubmit.on('click', function () {
                actions.submit.action();
            }).show();
        } else {
            $btnSubmit.hide();
        }
        if (actions.cancel != null) {
            if (actions.cancel.text != null) {
                $btnCancel.html(actions.cancel.text);
            }
        }
    }

    $btnCancel.on('click', function () {
        if (actions && actions.cancel && actions.cancel.action) {
            actions.cancel.action();
        }
        self.closeDialog();
    });

    $btnCancel.show();

    $dialog.find('> div').css({
        'margin-top': '-' + Math.round($('#dialog > div').height() + 100) + 'px'
    });

    $dialog.show();
}

function closeDialog() {
    //console.log("close dialog");
    var $dialog = $('#dialog');
    $dialog.hide();
    $dialog.find('.header').empty();
    $dialog.find('.content').empty();
    $dialog.find('.action button').unbind('click').hide();
}

// Check if a string is in vietnamese
function isVietnamese(content) {
    if (content.trim() == '') return true;
    var s = content.match(/á|à|ả|ã|ạ|â|ấ|ầ|ậ|ẩ|ẫ|ă|ắ|ằ|ặ|ẳ|é|è|ẻ|ẹ|ê|ế|ề|ệ|ể|ẽ|đ|ụ|ủ|ù|ú|ũ|ư|ứ|ừ|ử|ự|ữ|ó|ò|ỏ|õ|ọ|ô|ố|ồ|ộ|ổ|ơ|ớ|ờ|ợ|ở|ỡ|ỉ|ì|í|ị|ĩ|ý|ỵ|ỳ|ỹ/i);
    return (s != null);
}
