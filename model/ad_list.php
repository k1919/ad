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

}