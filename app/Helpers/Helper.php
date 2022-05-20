<?php
if (!function_exists('formatStatusButton')) {
    function formatStatusButton($status)
    {
        if($status == 'on'){
            return 1;
        }else{
            return 0;
        }
    }
}