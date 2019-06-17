<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class OrderGoods extends Model
{
        protected $table ='shop_order_goods';

        public $timestamps = false;
      public function ordergoodSel($orderId)
      {

            return $this->where('orderId',$orderId)->first()->toarray();
      }
}
