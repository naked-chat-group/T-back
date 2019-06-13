<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Password extends Model
{
    protected $table = 'shop_admin_password';

    protected $guarded = [];

    public $timestamps = false;
}


