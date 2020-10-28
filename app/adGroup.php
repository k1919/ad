<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/10/27
 * Time: 9:19
 */
namespace kang\app;
use epii\admin\center\addons_controller;
use epii\admin\ui\lib\epiiadmin\jscmd\Alert;
use epii\admin\ui\lib\epiiadmin\jscmd\CloseAndRefresh;
use epii\admin\ui\lib\epiiadmin\jscmd\JsCmd;
use epii\admin\ui\lib\epiiadmin\jscmd\Refresh;
use epii\server\Args;
use kang\model\ad_group;
use kang\model\ad_list;


class adGroup extends  addons_controller
{
        /*页面层*/
        public  function  index(){
           $this->adminUiDisplay();
        }
        /*ajax_渲染*/
        public  function  ajax_data(){
            $name=Args::params('name');
            $map=[];
            if($name){
                $map[]=['name',"LIKE",'%'.$name.'%'];
            }
            $table=ad_group::getTable()->order('updatetime DESC');
            echo $this->tableJsonData($table, $map, function($data) {
                $data['addtime'] = date('Y-m-d H:i', $data['addtime']);
                $data['updatetime'] = date('Y-m-d H:i', $data['updatetime']);
                return $data;
            });


        }

        /*添加删除*/
        public  function  add_edit(){
            $id=Args::params('id');
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $name=Args::params('name/1');
                $data=[ 'name'=>$name ];
                if($id){
                    $res=ad_group::edit([['id','EQ',$id]],$data);
                }else{
                    $res=ad_group::add($data);

                }
                if($res){
                    $alert = Alert::make()->msg("操作成功")->icon('6')->onOk(CloseAndRefresh::make()->layerNum(0)->closeNum(0))->btn("好的");
                }else{
                    $alert = Alert::make()->msg("操作失败")->icon('5')->title("重要提示")->btn("好的");

                }
                return JsCmd::make()->addCmd($alert)->run();
            }
            $this->_as_info=$id?ad_group::info([['id','EQ',$id]]):[];
            $this->adminUiDisplay();
        }


        public  function  del(){
            $id=Args::params('id/1');
            $has_list_info=ad_list::info([['group_id','EQ',$id]]);
            if($has_list_info){
                $alert = Alert::make()->msg("当前分组包含图片，不允许删除")->icon('5')->title("重要提示")->btn("好的");
                return JsCmd::make()->addCmd($alert)->run();
            }
            $res=ad_group::del([['id','eq',$id]]);
            if($res){
                $alert = Alert::make()->msg("删除成功")->icon('6')->onOk(Refresh::make()->layerNum(0)->closeNum(0))->btn("好的");
            }else{
                $alert = Alert::make()->msg("删除失败")->icon('5')->title("重要提示")->btn("好的");

            }
            return JsCmd::make()->addCmd($alert)->run();

        }

}