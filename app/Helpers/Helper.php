<?php


//hasPermission
if (!function_exists('hasPermission')) {
    function hasPermission($permission = null)
    {
        if (in_array($permission, auth()->user()->permissions)) {
            return true;
        }
        return false;
    }

    
}