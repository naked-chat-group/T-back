<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Auth extends Model
{
    protected $table = 'shop_right';

    protected $guarded = [];

    public $timestamps = false;

    /*
     * 查找所有权限
     */
    public function findAll($offset, $limit)
    {
        return $this->offset($offset)->limit($limit)->select('id', 'name', 'right', 'types')->get()->toArray();
    }

    /*
     * 获取权限总数
     */
    public function getCount()
    {
        return $this->count();
    }

    /*
     * 增加权限
     */
    public function store($data)
    {
        $right = implode(',', $data['code']);
        unset($data['code']);
        $right = ltrim($right, ',');
        $data['right'] = $right;

        return $this->create($data);
    }

    /*
     * 根据id查找权限
     *
     */
    public function findById($id)
    {
        return $this->where([['id',$id], ['types', 1]])->select('name','id')->first()->toArray();
    }
    /*
     * 根据类型查找权限
     */
    public function findByType($type, $id)
    {
        return $this->where([['right','<>',''],['types', $type], ['id', '<>', $id]])->select('name','id')->get()->toArray();
    }

    public function getAuth()
    {
        $auth = $this->get()->toArray();
//        dd($auth);
        $newAuth = [];
        foreach ($auth as $key => $val) {
            preg_match('/\[.*?\]/',$val['name'],$localPre);
            $arrayKey = trim($localPre[0],'[]');
            if (isset($newAuth[$arrayKey])) {
                $newAuth[$arrayKey][] = $val;
            } else {
                $newAuth[$arrayKey] = [];
            }
        }

        return $newAuth;
    }

}
