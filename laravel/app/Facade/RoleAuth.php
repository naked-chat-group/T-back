<?php
/**
 * Created by PhpStorm.
 * User: Lxink
 * Date: 2019/6/10
 * Time: 14:15
 */
namespace App\Facade;

use Illuminate\Support\Facades\Facade;


class RoleAuth extends  Facade {
    protected static function getFacadeAccessor()
    {
        return 'App\Models\RoleAuth';
    }
}
