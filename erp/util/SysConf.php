<?php
namespace app\erp\util;
/**
 * User: weixuan
 * Date: 2017/6/29
 * Time: 9:33
 */
class SysConf
{
    /**
     * 唯一ID值
     * @param string $prefix
     * @return string
     */
    public static function uuid($prefix = ''){
        $chars = md5(uniqid(mt_rand(), true));
        $uuid  = substr($chars,0,8) . '-';
        $uuid .= substr($chars,8,4) . '-';
        $uuid .= substr($chars,12,4) . '-';
        $uuid .= substr($chars,16,4) . '-';
        $uuid .= substr($chars,20,12);
        return $prefix . $uuid;
    }
    /**
     * 唯一ID值
     * @param string $prefix
     * @return string
     */
    public static function uuid20($prefix = ''){
        $chars = md5(uniqid(mt_rand(), true));
        $uuid  = time();
        $uuid  .= substr($chars,0,4);
        return $prefix . $uuid;
    }
    /**
     * 采购订单的生成
     * @param string $prefix
     * @return string
     */
    public static function uuid4($prefix = ''){
        $chars = md5(uniqid(mt_rand(), true));
        $uuid  = time();
        $uuid  .= substr($chars,0,4);
        return $prefix . $uuid;
    }
}