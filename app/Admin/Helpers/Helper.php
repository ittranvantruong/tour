<?php

if (!function_exists('status')) {
    function status($value){
        if($value == 1){
            return '<span class="badge badge-success">Hiện</span>';
        }
        return '<span class="badge badge-secondary">Ẩn</span>';

    }
}

if (!function_exists('selected')) {
    function selected($value1, $value2){
        if($value1 == $value2){
            return 'selected';
        }
        return;
    }
}

if (!function_exists('checked')) {
    function checked($value1, $value2){
        if($value1 == $value2){
            return 'checked';
        }
        return;
    }
}

if (!function_exists('htmlPlaceTo')) {
    function htmlPlaceTo($data){
        $str = '';
        foreach ($data as $value){
            $str .= '<span class="badge bg-primary text-white me-1">'.$value->title.'</span>';
        }
        return $str;
    }
}