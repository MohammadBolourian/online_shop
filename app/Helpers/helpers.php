<?php

use Morilog\Jalali\Jalalian;

function jalaliDate($date, $format = '%A, %d %B %Y')
{
    return Jalalian::forge($date)->format($format);
}

if(! function_exists('isUrl') ) {

    function isUrl($url , $activeClassName = 'sort_selected') {
        return \request()->fullUrlIs($url) ? $activeClassName : '';
    }

}


