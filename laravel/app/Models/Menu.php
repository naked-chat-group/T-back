<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Menu extends Model
{
    protected $table = 'shop_admin_menu';

    public $timestamps = false;

    protected $guarded = [];

    /*
     * 根据pid  查找
     */
    public function findByPid($id)
    {
        $pid = $this->findByRid($id);
        if (!$pid) {
            return [];
        }
        return $this->with('right')->where('pid',$pid->id)->get()->toArray();
    }

    /*
     * 关联权限表
     */
    public function right()
    {
        return $this->hasOne('App\Models\Auth', 'id', 'rid');
    }

    /*
     * 根据rid 查找
     */
    public function findByRid($id)
    {
        return $this->where('rid', $id)->select('id')->first();
    }

    /*
     * 菜单的添加
     */

    public function store($parentId, $childId)
    {
        $id = $this->findByRid($parentId);

        DB::beginTransaction();
        try {
            if (!$id) {
                $id = $this->create(['rid' => $parentId]);
            } else {
                $this->where('pid',$id->id)->delete();
                if (null == $childId) {
                    DB::commit();
                    return true;
                }
            }
            if ($id) {
                foreach($childId as &$val) {
                    $val = ['rid' => $val, 'pid' => $id->id];
                }
                if ($this->insert($childId)) {
                    DB::commit();
                    return true;
                }
            }
        } catch(\Exception $e) {
            DB::rollBack();
        }
        return false;

    }


    /*
     * 获取所有菜单
     */
    public function getMenu()
    {
        return $this->with('right')->get()->toArray();
    }

}
