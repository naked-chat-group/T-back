<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class shop_goods_attributes extends Model
{



    protected $table = 'shop_goods_attributes';
    protected $primaryKey = 'attrId';
    public $timestamps = false;
    protected $fillable = ['goodsCatId','goodsCatPath','attrName','attrVal','isShow','dataFlag'];
//    查询属性值
    public function  value($id)
    {
        return $this->select('attrVal')->find($id);
    }
//    查询属性
    public function Attributes($id)
    {
        return $this->where('goodsCatId',$id)->select('attrId','attrName')->get();
    }
    //添加数据
    public function cate($data)
    {
        return $this->create($data);
    }
//    分页
    public function findAll($offset,$limit)
    {
        return $this->offset($offset)->limit($limit)->select('goodsCatId','goodsCatPath','attrName','attrVal','isShow','dataFlag','attrId')->get();
    }
//   搜索
    public function findAllById($key,$offset,$limit)
    {
        return $this->where('attrName','like',"$key%")->offset($offset)->limit($limit)->select('goodsCatId','goodsCatPath','attrName','attrVal','isShow','dataFlag','attrId')->get();
    }
    public function del($id)
    {
        return $this->find($id)->delete();
    }
    public function updshow($data)
    {
        if($data['isShow'] == 0)
        {
            return $this->where('attrId',$data['attrId'])->update(['isShow'=>1]);
        }
        else
        {
            return $this->where('attrId',$data['attrId'])->update(['isShow'=>0]);
        }
    }
    public function updflag($data)
    {
        if($data['flag'] == 0)
        {
            return $this->where('attrId',$data['attrId'])->update(['dataFlag'=>1]);
        }
        else
        {
            return $this->where('attrId',$data['attrId'])->update(['dataFlag'=>0]);
        }
    }
}
