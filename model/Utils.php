<?php
/**
 * Created by PhpStorm.
 * User: David
 * Date: 3/8/14
 * Time: 3:26 PM
 */

date_default_timezone_set('Asia/Taipei');

class Utils{

    static function getDateToday(){
        return date('Y-m-d H:i:s');
    }

    static function getDefaultImageDir(){
        return '../images';
    }

    static function getDefaultImgProductDir(){
        return self::getDefaultImageDir() . '/product/';
    }

    static function getDefaultProfilePicDir(){
        return self::getDefaultImageDir() . '/profile_pics/';
    }

}
