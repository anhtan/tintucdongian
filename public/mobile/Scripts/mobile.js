var manipulationMobile = function(base_url)
{
    this.base_url = base_url;
}
manipulationMobile.prototype.addBaseUrl = function()
{
    var url = $('.content_detail img').attr('src');
    $('.content_detail img').attr('src','http://'+window.location.host +'/cms/public/source/'+url);
}
var manipulation = new manipulationMobile('hoho');
manipulation.addBaseUrl();
