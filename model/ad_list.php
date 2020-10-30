<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/10/27
 * Time: 13:18
 */
namespace  kang\model;
use think\Db;
use think\db\exception\DataNotFoundException;
use think\db\exception\DbException;
use think\db\exception\ModelNotFoundException;

/**
 * @property string table
 */
class ad_list
{
    static $table='adlist';
    public  static  function getTable(){
      return Db::name(self::$table);
    }
    public  static  function  list($where=[]){
        return self::getTable()->select();
    }
    public  static  function  add($data){
        $data['addtime']=time();
        $data['updatetime']=time();
        return self::getTable()->insertGetId($data);
    }
    public static  function  edit($where,$data){
        $data['updatetime']=time();
        return self::getTable()->where($where)->update($data);
    }

    public  static  function  info($where){
        return self::getTable()->where($where)->find();
    }
    public  static  function  del($where){
        return self::getTable()->where($where)->delete();
    }
    /*
     * @param  group_id 组ID
     * @param  where 条件  默认当前状态启用
     * @param  order  排序值  默认从小到大排序
     * @param limit  默认限制20条
     * */
    public  static  function  getLists($group_id,$where=[['status','EQ',1]],$order='sort ASC',$limit=20){
                $where[]=['group_id','EQ',$group_id];
       return     self::getTable()->where($where)->order($order)->limit($limit)->select();
    }

    public  static  function  getInfoById($id){
        return self::info([['id','EQ',$id]]);
    }


}