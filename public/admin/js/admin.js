// remove icon
function deleteOne()
{
    $(".custom_table tbody tr td:last-child .btn_delOne").click(function(){
        var id = $(this).attr("link-id");
        var name = $(this).attr("name-del");
        $(".name_del").html(name);
        $(".link_id").attr("href",id);
    });
}
function viewAllFile()
{
    $(".info_directory").hide();
    $(".view_all_file").click(function(){
        $(".content_form").fadeOut(300);
        $(".info_directory").fadeIn(300);
    });
    $(".back_info").click(function(){
        $(".content_form").fadeIn(300);
        $(".info_directory").fadeOut(300);
    });

}
function viewDetail()
{
    $(".custom_table tbody tr td:last-child .viewDetail").click(function(){
        var id = $(this).attr("id-send");
        var link_ajax = $(this).attr("link-ajax");
        var data_send =  $(this).attr("data-send-view");
        var data = "id="+id;
        var result = function(result)
        {
            $("#viewDetail .modal-body").html(result);
            viewAllFile();
            addPathImage();
        };
        var error = function ()
        {
            console.log("loi roi");
        };
        exec_ajax('POST',link_ajax,data,result,error);
    });
}
function getIcon()
{
    $(".list_icon .row .col-lg-3 p").click(function(){
       var icon_for_menu = $(this).text();
        $(".icon_menu").val(icon_for_menu)
        $("#icon_background_menu").removeAttr("class").addClass("fa fa-5x fa-fw"+icon_for_menu);
       $("#listIcon").modal('hide');
    });
}
function changePermiss()
{
    $(".btn_change_permiss").click(function(){
        var id = $(this).attr("id");
        var typePermiss = $(this).attr("typePermiss");
        var valPermiss = $(this).attr("valPermiss");
        var url = $(this).attr("url");
        var data = 'id='+id+'&typePermiss='+typePermiss+"&valPermiss="+valPermiss;
        var result = function(result)
        {
            location.reload();
        };
        var error = function()
        {
            console.log("error");
        };
        exec_ajax("POST",url,data,result,error );
    });
}
function changeStatus()
{
    $(".btn_change_status").click(function(){
        var id = $(this).attr("id");
        var status = $(this).attr("status");
        var url = $(this).attr("url");
        var data = 'id='+id+'&status='+status;
        var result = function(result)
        {
            location.reload();
        };
        var error = function()
        {
            console.log("error");
        };
        exec_ajax("POST",url,data,result,error );
    });
}
// ham nay tu dinh nghia alias khi dien tieu de
function asign_text(str_input,str_alias)
{
    add_alias_filter(str_input,str_alias);
}
// ham nay tu dinh nghia duogn dan khi them tieu de
function asign_path_text(str_input,str_path,pre_cate)
{
    add_path_filter(str_input,str_path,pre_cate);
}
asign_path_text(".article_info .input_normal",".article_info .input_path",".article_info .path_category_article");
asign_path_text(".navigation_info .input_normal",".navigation_info .input_path",".navigation_info .path_category_article");
asign_text(".article_info .input_normal",".article_info .input_alias");
asign_text(".navigation_info .input_normal",".navigation_info .input_alias");
// ham tu them alias
// ham tu them alias
var str_input1 = ".navigation_info .input_normal1";
var str_alias1 = ".navigation_info .input_alias1";
add_alias_filter(str_input1,str_alias1);
// goi tinymce
/*
tinymce.init({
    selector: ".tinymce_text_area"
});
*/
tinymce.init({
    document_base_url: "http://"+window.location.host+"/cms/public/source/",
    selector: ".tinymce_text_area",
    theme: "modern",width: 680,height: 300,
    plugins: [
        "advlist autolink link image lists charmap  preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars insertdatetime  nonbreaking",
        "table contextmenu directionality emoticons paste textcolor responsivefilemanager"
    ],
    toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
    toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
    image_advtab: true ,

    external_filemanager_path:"http://"+window.location.host+"/cms/public/filemanager/",
    filemanager_title:"Responsive Filemanager" ,
    external_plugins: { "filemanager" : "http://"+window.location.host+"/cms/public/filemanager/plugin.min.js"}
});
// ham goi tool tip
$(".custom_tooltip").tooltip();

$(".type_tag_input").tagsinput('items');
/*-----------thao tac upload -----------*/
function process_pre_upload()
{
    $(".progress_upload").fadeOut();
    $("#fileupload").click(function(){
        $(".img_article").hide();
        $(".progress_upload").fadeIn();
    });
    $(".do_upload").click(function(){
        $(".img_article").show();
    });
}
process_pre_upload(); // xu ly truoc upload
changeStatus();
changePermiss();
getIcon();
viewDetail();
deleteOne();
// ham huy session
function unset_session(obj_del_session)
{
    $(obj_del_session).click(function(){
//                alert("ok");
        // $(window).load(function(){
        var link = "http://"+window.location.host+"/cms/admin/processupload/unset_session";
        var name = 'path_file_upload';
        var data = 'name='+name;
        var result = function(result)
        {
            console.log('ok');
        };
        var error = function()
        {
            console.log('not ok');
        };
        exec_ajax('POST',link,data,result,error);
    });
}
unset_session("#side-menu li ul li"); // huy session
unset_session(".btn_del_session"); // huy session
// ham load order theo position
function loadListPosition()
{
    $(".obj_position_edit").change(function(){
        var position = $(this).val();
        var data = 'position='+position;
        var result = function(result)
        {
            //console.log(result);
            $(".list_order_edit").html(result);
        };
        var error = function ()
        {
          console.log("loi");
        };
        exec_ajax('POST','http://'+window.location.host+'/cms/admin/blocks/listOrderByPosition',data,result,error);
    });
}
//loadListPosition();

/*-----------hien thi thong tin model */
function setInfoModel()
{
    var type_gen = $(".type_gen").val();
    $(".gen_info_model").click(function(){
        var name_model = $(".get_name_model").val();
        var name_module = $(".get_name_module").val();
        var num_field = $(".get_num_field").val();
        var link_form = $(".get_link_form").val();
        $(".get_info_model").hide();
        var obj_add = "";
        if(type_gen == 1)
        {
            var obj_add = ' <div class="form-group">'+
                '<label>Tên model  <span class="asterik_label"> (*)</span></label>'+
                '<input class="input_normal form-control article_category_name set_name_model" name="name_model" value="'+name_model+'" type="text">'+
                '</div>';

        }else if(type_gen == 2 || type_gen == 4)
        {
            var obj_add = ' <div class="form-group">'+
                '<label>Tên view  <span class="asterik_label"> (*)</span></label>'+
                '<input class="input_normal form-control article_category_name set_name_model" name="name_view" value="'+name_model+'" type="text">'+
                '</div>';
        }
        if(type_gen != 3)
        {
            obj_add = obj_add + ' <div class="form-group">'+
                                    '<label>Tên module  <span class="asterik_label"> (*)</span></label>'+
                                    '<input class="input_normal form-control article_category_name set_name_module" name="name_module" value="'+name_module+'" type="text">'+
                                '</div>'
        }

        if(type_gen == 2)
        {
            obj_add = obj_add + ' <div class="form-group">'+
                '<label>Link form  <span class="asterik_label"> (*)</span></label>'+
                '<input class="input_normal form-control article_category_name set_link_form" name="link_form" value="'+link_form+'" type="text">'+
                '</div>';
        }

        for(i=0;i<num_field;i++)
        {
            if(type_gen == 1 )
            {
                obj_add = obj_add + ' <div class="form-group">'+
                                        '<label>Tên trường thứ '+ (i+parseInt(1)) +' <span class="asterik_label"> (*)</span></label>'+
                                        '<input title_input="Tên trường thứ '+ (i+parseInt(1)) +' " class="input_normal form-control article_category_name get_name_model field_model" name="field_model[]" value="" type="text">'+
                                    '</div>'+
                                    ' <div class="form-group">'+
                                        '<label>Tên hiển thị trường thứ '+ (i+parseInt(1)) +' <span class="asterik_label"> (*)</span></label>'+
                                        '<input title_input="Tên hiển thị thứ '+ (i+parseInt(1)) +' " class="input_normal form-control article_category_name get_name_model name_display_model" name="name_display_model[]" value="" type="text">'+
                                    '</div>';
            }else if(type_gen == 2)
            {
                obj_add = obj_add + ' <div class="form-group">'+
                                        '<label>Tên trường thứ '+ (i+parseInt(1)) +' <span class="asterik_label"> (*)</span></label>'+
                                        '<input title_input="Tên trường thứ '+ (i+parseInt(1)) +' " class="input_normal form-control article_category_name get_name_model field_model" name="field_model[]" value="" type="text">'+
                                    '</div>'+
                                ' <div class="form-group">'+
                                        '<label>Tên hiển thị trường thứ '+ (i+parseInt(1)) +' <span class="asterik_label"> (*)</span></label>'+
                                        '<input title_input="Tên hiển thị thứ '+ (i+parseInt(1)) +' " class="input_normal form-control article_category_name get_name_model name_display_model" name="name_display_model[]" value="" type="text">'+
                                '</div>'+
                                ' <div class="form-group">'+
                                        '<label>Loại thành phần '+ (i+parseInt(1)) +' <span class="asterik_label"> (*)</span></label>'+
                                        '<select class="form-control" name="type_item[]">'+
                                            '<option value="1">Text input</option>' +
                                            '<option value="2">Select option</option>' +
                                            '<option value="3">Category image</option>' +
                                            '<option value="4">Image</option>' +
                                            '<option value="5">Text area</option>' +
                                            '<option value="6">Text area advance</option>' +
                                            '<option value="7">Tag</option>' +
                                            '<option value="8">Mutil select</option>' +
                                            '<option value="9">Select option status</option>' +
                                            '<option value="10">Hidden input</option>' +
                                        '</select>'+
                                '</div>';

            }else if(type_gen == 3)
            {
                obj_add = obj_add + ' <div class="form-group">'+
                    '<label>Tên trường thứ '+ (i+parseInt(1)) +' <span class="asterik_label"> (*)</span></label>'+
                    '<input title_input="Tên trường thứ '+ (i+parseInt(1)) +' " class="input_normal form-control article_category_name get_name_model field_model" name="field_model[]" value="" type="text">'+
                    '</div>'+
                    ' <div class="form-group">'+
                    '<label>Tên hiển thị trường thứ '+ (i+parseInt(1)) +' <span class="asterik_label"> (*)</span></label>'+
                    '<input title_input="Tên hiển thị thứ '+ (i+parseInt(1)) +' " class="input_normal form-control article_category_name get_name_model name_display_model" name="name_display_model[]" value="" type="text">'+
                    '</div>';

            }else if(type_gen == 4)
            {
                obj_add = obj_add + ' <div class="form-group">'+
                    '<label>Tên trường thứ '+ (i+parseInt(1)) +' <span class="asterik_label"> (*)</span></label>'+
                    '<input title_input="Tên trường thứ '+ (i+parseInt(1)) +' " class="input_normal form-control article_category_name get_name_model field_model" name="field_model[]" value="" type="text">'+
                    '</div>'+
                    ' <div class="form-group">'+
                    '<label>Tên hiển thị trường thứ '+ (i+parseInt(1)) +' <span class="asterik_label"> (*)</span></label>'+
                    '<input title_input="Tên hiển thị thứ '+ (i+parseInt(1)) +' " class="input_normal form-control article_category_name get_name_model name_display_model" name="name_display_model[]" value="" type="text">'+
                    '</div>'+
                    ' <div class="form-group">'+
                    '<label>Loại thành phần '+ (i+parseInt(1)) +' <span class="asterik_label"> (*)</span></label>'+
                    '<select class="form-control" name="type_item[]">'+
                    '<option value="1">Text</option>' +
                    '<option value="2">Image</option>' +
                    '<option value="3">Status</option>' +
                    '</select>'+
                    '</div>';

            }
        }
        if(type_gen!=3)
        {
            obj_add = obj_add + '<input value="Tạo" type="submit" class="btn btn-info btn-default send_info_model" name="submit_form" /> '+
                                '<button type="reset" class="btn btn-warning btn-default">Làm lại</button>';
        }

        $(obj_add).appendTo(".set_info_model");

    });
}
setInfoModel();
function checkForm()
{
    $(document).on('click', '.send_info_model', function() {
        $arr = 0;
        $.each($(".set_info_model .form-group"),function(key,value){
            $(this).children("span").remove();
            if($(this).children(".field_model").val() == "")
            {
                $("<span style='color:red'>"+$(this).children(".field_model").attr('title_input')+" không được để trống</span>").insertAfter($(this).children(".field_model"));
                //console.log($(this).children(".field_model").attr('title_input') + " con de trong ");
            }
            if($(this).children(".name_display_model").val() == "")
            {
                $("<span style='color:red'>"+$(this).children(".name_display_model").attr('title_input')+" không được để trống</span>").insertAfter($(this).children(".name_display_model"));
            }
            if($(this).children(".field_model").val() != "" && $(this).children(".name_display_model").val() != "")
            {
                $arr = $arr + 1;
            }
        }) ;
        if($(".set_info_model .form-group").length == $arr)
        {
            $(".send_info_model").attr("type","submit");
        }
        console.log($arr-1);
    });

}

//checkForm();
/*--------------ham hieu ung menu------------*/
function effectHoverMenu()
{
    $(".block_list_article_category .panel-body ul li").mouseover(function(){
        $(this).animate({
            paddingLeft:"+=6px"
        },300);
    });
    $(".block_list_article_category .panel-body ul li").mouseout(function(){
        $(this).animate({
            paddingLeft:"-=6px"
        },300);
    });
    $(".block_list_article_category .panel-body ul li").click(function(){
        $(this).siblings().removeClass("active_category_path");
        $(this).addClass("active_category_path");

    });
}
effectHoverMenu();
// ham lay bi danh cua category de gan vao menu
function getValueMenu()
{
    $(".get_info_category .panel-body ul li").click(function(){
        $(".navigation_info .input_normal").val($(this).text().replace('------ ',''));
        $(".navigation_info .input_alias").val(filter_sign( $(this).text().replace('------ ','')));
        $(".navigation_info .path_category_article").val(filter_sign( $(this).text().replace('------ ','')));
        $(".navigation_info .input_path").val("category/"+$(".path_category_article").val()+".html");
    });
}
getValueMenu();
function getValuePathCatetgory(parent)
{
    $(".path_category .panel-body ul li").click(function(){
        $(parent + " .path_article").val("");
        var path_category = $(this).attr("title");
        var path_post = $(parent +  " .input_alias").val()+".html";
        $(parent +  " .path_article").val(path_category+"/"+path_post);
        $(parent +  " .path_category_article").val(path_category);
    });
}
//console.log(".article_form" + " .path_article");
getValuePathCatetgory(".article_info");
function setValDefault()
{
    var path_category_article = $(".path_category_article").val();
    $.each($(".path_category .panel-body ul li"),function(){
       if($(this).attr("title") == path_category_article)
       {
           $(this).addClass("active_category_path");
       }
    });
}
setValDefault();
// ham nay them cac tuy chon them view , model ... danh cho module block
function addSubItem()
{
    var list_action_item = "";
    $(".wrap_name").clickToggle(function(){
        list_action_item += "<div class='add_sub_item'>"+
            "<a href='"+$(this).attr('add-view')+"'><span  class='glyphicon glyphicon-eye-open fa-1x'> <span class='text_add_sub_item'>Thêm view</span></a> | <a href='"+$(this).attr('add-model')+"'> <span  class='glyphicon glyphicon-floppy-disk fa-1x'> <span class='text_add_sub_item'>Thêm model</span></a> |"+
             "<a href='"+$(this).attr('add-view-detail')+"'><span  class='glyphicon glyphicon-send  fa-1x'> <span class='text_add_sub_item'>Thêm view detail</span></a> | "+
             "<a href='"+$(this).attr('add-controller')+"'><span  class='glyphicon glyphicon-flash  fa-1x'> <span class='text_add_sub_item'>Thêm controller</span></a>"+
            "<span class='btn_close_module'>X</span>"+
            "</div>";
        $(list_action_item).appendTo($(this));
    },function(){
        $(".add_sub_item").hide();
    });
    $(".test").hide();

    $(".btn_close_module").click(function(){
        $(".add_sub_item").hide();
    });
}
addSubItem();
$(".viewDetail").click(function(){
addPathImage();

});
function addPathImage()
{
    var link_img = $("#viewDetail .form-group p img").attr("src");
    $("#viewDetail .form-group p img").attr("src","http://"+window.location.host+"/cms/public/source/"+link_img);
}

