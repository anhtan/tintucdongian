/*-------Hàm này có tác dụng tạo 2 hành động thay phiên nhau ------*/
(function ($) {
    $.fn.clickToggle = function (func1, func2) {
        var funcs = [func1, func2];
        this.data('toggleclicked', 0);
        this.click(function () {
            var data = $(this).data();
            var tc = data.toggleclicked;
            $.proxy(funcs[tc], this)();
            data.toggleclicked = (tc + 1) % 2;
        });
        return this;
    };
}(jQuery));
$.fn.eqAnyOf = function (arrayOfIndexes) {
    return this.filter(function (i) {
        return $.inArray(i, arrayOfIndexes) > -1;
    });
};
// ham thay the ki tu trong chuoi
function replace_char(str_json,dot_replace,str_replace)
{
    var str_conv_json = str_json.replace(new RegExp(dot_replace, 'g'), str_replace); // chuyen tat ca dau ' thanh dau "
    return str_conv_json;
}
// ham chuyen chuoi json thanh doi tuong trong javascript
function conv_json(str_json,dot_replace,str_replace)
{
    var str_conv_json = replace_char(str_json, dot_replace, str_replace);
    var result = JSON.parse(str_conv_json);
    return result;
}
/* --------ham chuyen doi tuong thanh mang---------- */
/*
 *  obj_con : mang tuong can chuyen thanh mang
 *  img_post_detail : anh trong bai viet chi tiet
 *  arr_lang : mang ngon ngu can gan 
 */
function getStatusDetail(title_status,status_show,status_hide)
{
    var arr = new Array();
    arr["title_status"] = title_status;
    arr["status_show"] = status_show;
    arr["status_hide"] = status_hide;
    return arr;
}
function conObjToArr(obj_con, img_post_detail,arr_status,arr_lang) {           
    var arr = $.map(obj_con, function (value, index) {
        index = arr_lang[index];
        if (index == arr_status["title_status"]) {
            if (value == 1)
                value = arr_status["status_show"];
            else
                value = arr_status["status_hide"];
        } else if (index == img_post_detail) {
            var val_img = 'fa fa-fw ' + value + ' fa-1x';
            value =  "<i class='"+val_img+"'></i>" 
        } else
            value = value;
        var itemList = "<li>" + "<span>" + index + "</span>" +" : " + value + "</li>";
        return itemList;
    });
    return arr;
}
// ham thuc hien ajax đơn giản 
function exec_ajax(type_data, link, data, action_result, action_error) {
    $.ajax({
        type: type_data,
        url: link,
        data: data,
        success: action_result,
        error: action_error
    });
}
// ham thuc hien ajax full
function exec_ajax_full(link, type_data, content_type, data_type, data, action_result, action_error) {
    $.ajax({
        url: link,
        type: type_data,
        contentType: content_type,
        dataType: data_type,
        data: JSON.stringify(data),
        success: action_result,
        error: action_error
    });
}
// ham thuc hien request post
function exec_post(link, data, action_result) {
    $.post(link, data, action_result);
}
// ham thuc hien load 
function exec_load(obj_click,link,data,action_result)
{
    obj_click.load(link,data,action_result);
}
// ham thay doi trang thai status
function change_status(obj_parent, link) {
    $(obj_parent).children(".btn_status").click(function () {
        var status_val = $(this).attr("status-post");
        var mod_id = $(this).attr("mod-id");
        if (status_val == 1) {
            var status_val = 0;
            var label_status = "status_hide";
        } else {
            var status_val = 1;
            var label_status = "status_show";
        }
        var data = { status: status_val, mod_id: mod_id };
        var action_result = function () {
            if (label_status == "status_hide") {
                $(this).text($(".name_common").attr("status_hide"));
                $(this).addClass("btn-danger");
                $(this).removeClass("btn-success");
            } else {
                $(this).text($(".name_common").attr("status_show"));
                $(this).addClass("btn-success");
                $(this).removeClass("btn-danger");
            }
            $(this).attr("status-post", status_val);
        };
        exec_load($(this),link,data,action_result);
        //exec_post(link, data, action_result);

    });
}
function getTitleTab(obj_tab,title)
{
    return $(obj_tab).attr(title);
}
// ham hien thi hop thoai
function display_box(box_select) {
    $(box_select).fadeIn(100);
}
// ham dong hop thoai
function hide_box(box_select) {
    $(box_select).fadeOut(500);
}
// ham click
function obj_click(obj_select, area_other, box_select) {
    $(obj_select).clickToggle(function () {
        //display_box(box_select);
        display_box(box_select);
    }, function () {
        hide_box(box_select);
    });
    $(area_other).click(function () {
        hide_box(box_select);
    });
}
// ham nhan cac doi so va gui toi trang su ly thong qua su kien load
function run_load(obj_load, link, data, after_pro) {
    $(obj_load).load(link, data, after_pro);
}
// ham active page khi click
function active_page(btn_pagi) {
    $(btn_pagi).eq($(".page_current").attr("page-cur")).addClass("page_active");
}
/*------------thay doi trang thai-------------------------------*/
function size_box_detail(obj_change_size, width) {
    $(obj_change_size).css({ "width": width });
}
function effect_box_detail(obj_box) {
    $(obj_box).show(600);
}
function effect_hidden_box(obj_box) {
    $(obj_box).hide(500);
}

/*--------------ham thao tac voi mang -----------------*/
// ham kiem tra co phai mang hay khong
function check_array(arr_check) {
    return Array.isArray(arr_check); // kiem tra co phai mang hay khong , tra ve true neu dung , false neu sai
}
// ham xoa cac phan tu thuoc mang con thuoc mang cho san 
function remove_elem(arr_all, elem_remove) {
    var arr_temp = null;
    if (check_array(arr_all) == true && check_array(elem_remove) == true) {
        arr_temp = $.grep(arr_all, function (n, i) {
            return $.inArray(n, elem_remove) == -1;
        });
    } else {
        arr_temp = "";
    }
    return arr_temp;
}
// ham xoa phan tu trong mang theo vi tri (ham cho phep xoa theo mang vi tri hoac vi tri lon hon , nho hon )
function remove_elem_posi(arr_all, posi_remove , dis_compare) {
    var arr_temp = null;
    //typeof dis_compare == null ? dis_compare : null;
    if (check_array(arr_all) == true && check_array(posi_remove) == true && dis_compare == null )
    {
        arr_temp = $.grep(arr_all, function (n, i) {
            return $.inArray(i,posi_remove) == -1;
        });
    } else if (check_array(arr_all) == true && check_array(posi_remove) == false && dis_compare != null)
    {
        arr_temp = $.grep(arr_all, function (n, i) {
            if (dis_compare == "greate") 
                return (i < posi_remove);
            else if(dis_compare == "less")
                return (i > posi_remove);
        });
    }

    return arr_temp;
}
// ham chuyen mang chuoi thanh int
function arr_to_int(arr_nor)
{
    return arr_nor.map(function (x) {
        return parseInt(x,10);
    });
}
// hàm này chuyển mảng thành chuỗi
function con_arr_to_str(arr_raw)
{
    var after_arr_raw = arr_raw.toString();
    return after_arr_raw;
}
// hàm chuyển chuỗi thành mảng
function con_str_to_arr(str_raw)
{
    var arr_new = str_raw.split(",");
    return arr_new;
}
// hàm xóa các phần tử của mảng
function remove_val(var_raw) {
    var_raw = [];
    return var_raw;
}
// hàm lây từng id được chuyển gửi vào trong mảng có sẵn
function get_spe_id(arr_id_spe, id_spe_raw) {
    if ($.inArray(id_spe_raw, arr_id_spe) == -1)
        arr_id_spe.push(id_spe_raw);
    return arr_id_spe;
}

// hàm xóa id trong mảng 
function remove_spe_id(arr_id_spe, id_spe_raw)
{
    if ($.inArray(id_spe_raw, arr_id_spe) != -1 )
    {
        arr_id_spe.splice($.inArray(id_spe_raw,arr_id_spe),1)
    } 
    return arr_id_spe;
}


// ham lay do dai doi tuong
function getObjectLength(o) {
    var length = 0;

    for (var i in o) {
        if (Object.prototype.hasOwnProperty.call(o, i)) {
            length++;
        }
    }
    return length;
}
/*-------------ham tuong tac voi doi tuong---------------*/
// ham nay doi ten thuoc tinh trong doi tuong
Object.defineProperty(
    Object.prototype,
    'renameProperty',
    {
        writable: false, // Cannot alter this property
        enumerable: false, // Will not show up in a for-in loop.
        configurable: false, // Cannot be deleted via the delete operator
        value: function (oldName, newName) {
            // Do nothing if the names are the same
            if (oldName == newName) {
                return this;
            }
            // Check for the old property name to 
            // avoid a ReferenceError in strict mode.
            if (this.hasOwnProperty(oldName)) {
                this[newName] = this[oldName];
                delete this[oldName];
            }
            return this;
        }
    }
);
// ham so sanh so phan tu cua 2 mang 
function compare_arr(arr1,arr2)
{
    if(arr1.length == arr2.length)
        return true;
    else
        return false;
}
// ham hoan doi so phan tu o 2 mang , dk 2 mang co so phan tu bang nhau 
function conv_elem_arr(arr1,arr2)
{
    if(compare_arr(arr1,arr2) == true)
    {
        for (var i = 0; i < arr1.length; i++)
        {
            for (var j = 0; j < arr2.length; j++) {
                if(i == j)
                {
                    arr1[i] = arr2[j];
                }
            }
        }
        return arr1
    }else
    {
        return null;
    }
}
//ham loc cac ki tu trung nhau trong mot chuoi
/*
 * @obj_str : doi tuong chuoi 
 */
function find_unique_characters(obj_str) {
    return obj_str.split(",").filter(function (x, n, s) { return s.indexOf(x) == n }).join(",");
}
// ham lay nhieu gia tri khi click va them vao mang
/*
 * @list_val_spe : mang chua elem
 * @id_elem      : id phan tu 
 * @store_link   : doi tuong luu link 
 * @atr_store    : thuoc tinh luu giu gia tri link 
 * @class_choose : class selected 
 * @obj_select   : doi tuong ap dung class selected
 */
function add_elem_str(list_val_spe,id_elem,store_link, atr_store,class_choose,obj_select)
{
    var strRawspe = get_spe_id(list_val_spe, id_elem);
    store_link.attr(atr_store, strRawspe);
    obj_select.addClass("selected");
}
// ham xoa gia tri khi click va xoa bot tu mang
function remove_elem_str(list_val_spe, id_elem, store_link, atr_store, class_choose, obj_select)
{
    var strRawspe = remove_spe_id(list_val_spe, id_elem);
    store_link.attr(atr_store, strRawspe);
    obj_select.removeClass(class_choose);
}
// ham theo phan tu 
function add_elem_html(obj_html,obj_contain)
{
    $(obj_html).prependTo(obj_contain);
}


/*--------------------------------------cac ham hieu ung----------------------*/
// tu them bi danh
function filter_sign(str){
    str= str.toLowerCase();
    str= str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g,"a");
    str= str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g,"e");
    str= str.replace(/ì|í|ị|ỉ|ĩ/g,"i");
    str= str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g,"o");
    str= str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u");
    str= str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g,"y");
    str= str.replace(/đ/g,"d");
    str= str.replace(/!|@|\$|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\'| |\"|\&|\#|\[|\]|~/g,"-");
    str= str.replace(/-+-/g,"-"); //thay thế 2- thành 1-
    str= str.replace(/^\-+|\-+$/g,"");//cắt bỏ ký tự - ở đầu và cuối chuỗi
    str= str.replace(/^\"|\'+$/g,"");//cắt bỏ ký tự - ở đầu và cuối chuỗi
    return str;
}

/*
 *   - str_input : o input
 *   - str_alias : o alias
 * */
function add_alias_filter(str_input,str_alias)
{
    $(str_input).keyup(function(){
        var str = $(str_input).val();
        var str_filter = filter_sign(str);
        $(str_alias).val(str_filter);
    });
}
function add_path_filter(str_input,str_path,str_cate)
{
    $(str_input).keyup(function(){
        var str = $(str_input).val();
        var str_filter = filter_sign(str);
        var pre_cate = $(str_cate).val();
        $(str_path).val(pre_cate+"/"+str_filter+".html");
    });
}



