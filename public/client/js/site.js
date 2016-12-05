function activeMenu()
{
    var url = window.location.href;
    //console.log(url.split('/'));
    $.each($(".ul_menu li"),function(){

        if(url.indexOf('category')>-1)
        {
            var str_alias = url.replace('http://'+ window.location.host+'/cms/category/','');
            if($(this).children("a").attr('menu_current') == str_alias )
                $(this).addClass("menu_active");
        }else if(url == "http://"+window.location.host+"/cms/")
        {
            $(".ul_menu li:first-child").addClass("menu_active");
        }else
        {
            var arr_url = url.split('/');
            if($(this).children("a").attr('menu_current') == arr_url[4]+'.html')
                $(this).addClass("menu_active");

        }
        //console.log(window.location.href);
    });

}
activeMenu();
var link_img = $(".content_post_detail p img").attr("src");
$(".content_post_detail p img").attr("src","http://"+window.location.host+"/cms/public/source/"+link_img);