<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class shop_warehouses extends Model
{
    protected $table = 'shop_warehouses';
    protected $primaryKey = 'id';
    public $timestamps = false;
    public function index()
    {
        return $this->select('id','serve_area')->get();
    }
}
