<?php
/**
 * Created by PhpStorm.
 * User: xumu
 * Date: 2018/5/1
 * Time: 12:01
 */
namespace App\Services;

/**
 * 通用工具服务类
 */
class CommonUnits
{
    //检测是否从微信打开
    public static function isWechat() {
        if (isset($_SERVER['HTTP_USER_AGENT']) && strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false) {
            return true;
        }
        return false;
    }
    public static function hx() {
       return '12344';
    }

}