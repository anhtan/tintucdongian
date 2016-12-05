<?php
$route["navigation.html"] = "navigation/display";
$route["category/(:any).html/(:any)"] = "client/category/listCategory/$1/$2";
$route["category/(:any).html"] = "client/category/listCategory/$1";
$route["(:any)/(:any).html"] = "client/post/postdetail/$1/$2";
$route["tag.html"] = "client/tag/display";
$route["admin/navigation/listNavigation"] = "navigation/listNavigation";
$route["admin/generation/test"] = "generation/test";
$route["admin/generation/genController"] = "generation/genController";
$route["admin/generation/genController/(:any)/(:any)"] = "generation/genController/$1/$2";
$route["home.html"] = "home";
$route["mobile"] = "mobile/home/display";
$route["mobile/category/(:any).html"] = "mobile/category/listCategory/$1";
$route["mobile/category/(:any).html/(:any)"] = "mobile/category/listCategory/$1/$2";
$route["mobile/(:any)/(:any).html"] = "mobile/post/detail/$1/$2";