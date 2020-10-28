<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/10/27
 * Time: 14:19
 */
namespace  kang\libs;
class adconfig
{

    /*获取状态*/
    public  static  function  status_info($num=null,$is_all=1){
        $type_name = [
           1=> ['key' => 1, 'name' => '启用'],
            2=>['key' => 2, 'name' => '关闭'],
        ];
        if($is_all===1){
            array_unshift($type_name, ["id" => "", "name" => "全部"]);
        }
        return isset($num) ? $type_name[$num ]['name'] : $type_name;
    }

    /*获取是否推荐*/
    public  static  function  tui_info($num=null,$is_all=1,$is_color=0){
        $type_name = [
            1=> ['key' => 1, 'name' => '推荐','color'=>'green'],
            2=>['key' => 2, 'name' => '不推荐','color'=>'red'],
        ];
        if($is_all===1){
            array_unshift($type_name, ["id" => "", "name" => "全部",'color'=>'']);
        }
        $str=$is_color===1?'color':'name';
        return isset($num) ? $type_name[$num ][$str] : $type_name;
    }
}