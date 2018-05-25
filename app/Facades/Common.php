<?php
/**
 * Created by PhpStorm.
 * User: xumu
 * Date: 2018/5/1
 * Time: 12:03
 */
namespace App\Facades;
use Illuminate\Support\Facades\Facade;
class Common extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'CommonService';
    }

}