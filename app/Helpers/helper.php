<?php
/**
 * Created by PhpStorm.
 * User: csi0n
 * Date: 6/23/17
 * Time: 2:03 PM
 */
if (!function_exists('is_debug')){
    function is_debug(){
        return config('app.debug');
    }
}
if (!function_exists('user')) {
    function user()
    {
        if (is_debug())
            return \App\User::find(1);
        return JWTAuth::toUser();
    }
}