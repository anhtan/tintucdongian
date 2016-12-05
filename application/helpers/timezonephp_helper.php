<?php
// tra ve danh sach time zone cac vung
function timezonephp()
{
    return timezone_identifiers_list();
}
// lay time zone hanoi
function timezonehanoi()
{
    $timezone = timezonephp();
    return $timezone[223];
}
// lay ngay gio hien tai
function getTimeNow()
{
   date_default_timezone_set(timezonehanoi());
   $timestamp = time();
   return $timestamp;
}
// danh sach cac dinh dang date
function listFormatDate()
{
    return array(
      'Y-m-d',
       'd-m-Y'
    );
}
// hien thi ngay thang theo cac dinh dang
function getDateFormatCI($string_format,$date_time)
{
    return date($string_format,$date_time);
}

// ham lay thu
function getThu($str_day)
{
    switch(strtolower( $str_day))
    {
        case 'monday':
            $str_day = 'Thứ hai';
            break;
        case 'tuesday':
            $str_day = 'Thứ ba';
            break;
        case 'wednesday':
            $str_day = 'Thứ tư';
            break;
        case 'thursday':
            $str_day = 'Thứ năm';
            break;
        case 'friday':
            $str_day = 'Thứ sáu';
            break;
        case 'saturday':
            $str_day = 'Thứ bảy';
            break;
        default:
            $str_day = 'Chủ nhật';
            break;
    }
    return $str_day;
}
function getTimeFormat($str_format,$time)
{
    return date($str_format,strtotime($time));
}