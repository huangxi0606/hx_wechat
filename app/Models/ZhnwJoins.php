<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ZhnwJoins extends Model
{
    //
    protected $table = 'zhnwjoin';
    protected $guarded = [];


    //获取粉丝奖品
//    public static function getPrize($zan) {
//        $prize = '';
//        if ($zan >= 30 && $zan < 60) {
//            $prize = '妖娆蓝色妖姬一支';
//        }
//        if ($zan >= 60) {
//            $prize = '娇艳玫瑰花一捧';
//        }
//        $prize = $prize == '' ? '未获得奖品' : $prize;
//        return $prize;
//    }
}
