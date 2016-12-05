<?php
function base_url_admin()
{
   $base_url = base_url()."admin/";
    return $base_url;
}
function check_element_string($element,$string_compare)
{
    if(in_array($element,explode(',',$string_compare)) == true)
        return true;
    else
        return false;

}
// kiem tra phan tu co trong mang hay khong  , nhan dau vao la mot chuoi va xoa
function removeElementArray($element,$array_partern)
{
    if(is_array($element))
    {
        foreach($array_partern as $key=>$value)
        {
            foreach($element as $s_element)
            {
                if($s_element == $key)
                {
                    unset($array_partern[$key]);
                }
            }
        }
    }else
    {
        if(($key = array_search($element,$array_partern)) != false)
        {
            unset($array_partern[$key]);
        }
    }
    return $array_partern;
}

function position_module()
{
    return array(
       1=> 'Menu top trái',
       2=> 'Menu tab (ngang)',
       3=> 'Left (Bên trái)',
       4=> 'Rigth (Bên phải)',
       5=> 'Content (Nội dung)'
    );
}
function type_route()
{
    return array(
       1=>'Module',
       2=>'Controller'
    );
}
function type_site()
{
    return array(
        1 => 'Tin tức',
        2 => 'Thông tin doanh nghiệp',
        3 => 'Thương mại điện tử'
    );
}
function type_item_form()
{
    return array(
        1=>'Text input',
        2=>'Select option',
        3=>'Category image',
        4=>'Image',
        5=>'Text area',
        6=> 'Text area advance',
        7=>'Tag',
        8=>'Mutil select',
        9=>'Select option status',
        10=>'Hidden input'
    );
}

/*-----------------thao tac voi file-------------------*/
//----------ham chen bien vao trong file
function replace_in_file($FilePath, $OldText, $NewText)
{
    $Result = array('status' => 'error', 'message' => '');
    if(file_exists($FilePath)===TRUE)
    {
        if(is_writeable($FilePath))
        {
            try
            {
                $FileContent = file_get_contents($FilePath);
                $FileContent = str_replace($OldText, $NewText, $FileContent);
                if(file_put_contents($FilePath, $FileContent) > 0)
                {
                    $Result["status"] = 'success';
                }
                else
                {
                    $Result["message"] = 'Error while writing file';
                }
            }
            catch(Exception $e)
            {
                $Result["message"] = 'Error : '.$e;
            }
        }
        else
        {
            $Result["message"] = 'File '.$FilePath.' is not writable !';
        }
    }
    else
    {
        $Result["message"] = 'File '.$FilePath.' does not exist !';
    }
    return $Result;
}
function strim_title($cString,$limit)
{
    $iChar = "1"; // Max number of character(s) for cutting
    $iOutput = $limit; // Max number of character(s) for the output
    if(strlen($cString) > $iChar)
    {
        $cOutput = mb_substr($cString, 0, $iOutput, "UTF-8");
        while(substr($cOutput, -1) != " ")
        {
            $cOutput = substr($cOutput, 0, strlen($cOutput)-1);
        }
        $cString = $cOutput." ..." ;
    }
   return $cString;

}

// lay thong tin thu muc
function viewMapDirectory($path)
{
    $path_direct = "application/modules/".$path;
    return directory_map($path_direct);
}

function autoAddRoute($name_of_module)
{
    $data_update = array(
        array(
            'route_name' =>  'list '.$name_of_module.'',
            'route_old' =>   ''.$name_of_module.'/list'.ucfirst($name_of_module).'',
            'route_new' =>   'admin/'.$name_of_module.'/list'.ucfirst($name_of_module).'',
            'route_type' =>  1,
            'route_status' => 1,
            'route_object' => $name_of_module
        ),
        array(
            'route_name' =>  'changeStatus',
            'route_old' =>   ''.$name_of_module.'/changeStatus',
            'route_new' =>   'admin/'.$name_of_module.'/changeStatus',
            'route_type' =>  1,
            'route_status' => 1,
            'route_object' => $name_of_module
        ),
        array(
            'route_name' =>  'viewDetail',
            'route_old' =>   ''.$name_of_module.'/viewDetail',
            'route_new' =>   'admin/'.$name_of_module.'/viewDetail',
            'route_type' =>  1,
            'route_status' => 1,
            'route_object' => $name_of_module
        ),
        array(
            'route_name' =>  'add'.$name_of_module.'',
            'route_old' =>   ''.$name_of_module.'/add'.ucfirst( $name_of_module).'',
            'route_new' =>   'admin/'.$name_of_module.'/add'.ucfirst( $name_of_module).'',
            'route_type' =>  1,
            'route_status' => 1,
            'route_object' => $name_of_module
        ),
        array(
            'route_name' =>  'deleteOne',
            'route_old' =>   ''.$name_of_module.'/deleteOne/(:any)',
            'route_new' =>   'admin/'.$name_of_module.'/deleteOne/$1',
            'route_type' =>  1,
            'route_status' => 1,
            'route_object' => $name_of_module
        ),
        array(
            'route_name' =>  'edit'.$name_of_module.'',
            'route_old' =>   ''.$name_of_module.'/edit'.ucfirst( $name_of_module).'',
            'route_new' =>   'admin/'.$name_of_module.'/edit'.ucfirst( $name_of_module).'',
            'route_type' =>  1,
            'route_status' => 1,
            'route_object' => $name_of_module
        ),
        array(
            'route_name' =>  'listOrderByPosition',
            'route_old' =>   ''.$name_of_module.'/listOrderByPosition',
            'route_new' =>   'admin/'.$name_of_module.'/listOrderByPosition',
            'route_type' =>  1,
            'route_status' => 1,
            'route_object' => $name_of_module
        ),

    );
    return $data_update;
}
?>