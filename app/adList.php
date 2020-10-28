<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/10/27
 * Time: 9:19
 */
namespace kang\app;
use epii\admin\center\addons_controller;
use epii\server\Args;
use kang\libs\adconfig;
use kang\model\ad_group;
use kang\model\ad_list;
use epii\admin\ui\lib\epiiadmin\jscmd\Alert;
use epii\admin\ui\lib\epiiadmin\jscmd\CloseAndRefresh;
use epii\admin\ui\lib\epiiadmin\jscmd\JsCmd;
use epii\admin\ui\lib\epiiadmin\jscmd\Refresh;


class adList extends  addons_controller
{
        public  function  index(){
          $this->_as_group_list=ad_group::list();
          $this->_as_status_list=adconfig::status_info();
          $this->_as_tui_list=adconfig::tui_info();
          $this->adminUiDisplay();
        }

        public  function  ajax_data(){
            $is_tui=Args::params('is_tui');
            $status=Args::params('status');
            $group_id=Args::params('group_id');
            $map=[];
            if($is_tui){
                $map[]=['ad.is_tui','EQ',$is_tui];
            }
            if($status){
                $map[]=['ad.status','EQ',$status];
            }
            if($group_id){
                $map[]=['ad.group_id','EQ',$status];
            }
            $table=ad_list::getTable()->alias('ad')->field('ad.*,g.name as group_name')
                    ->leftJoin('adgroup g','g.id=ad.group_id')
                    ->order('ad.group_id DESC,ad.sort ASC');

            echo $this->tableJsonData($table, $map, function($data) {
                $data['addtime'] = date('Y-m-d H:i', $data['addtime']);
                $data['updatetime'] = date('Y-m-d H:i', $data['updatetime']);
                $data['is_tui_color'] =  adconfig::tui_info($data['is_tui'],0,1);
                $data['is_tui'] = adconfig::tui_info($data['is_tui']);

               $data['status'] = adconfig::status_info($data['status'])==='启用'?'1':'0';
                $data['title']=mb_strlen($data['title'], 'utf8') < 8? $data['title']: mb_substr($data['title'], 0, 8, 'utf8').'...';
                $data['img_url_show']="<a class=\"btn btn-danger btn-dialog\"  title=\"查看图片\"  data-area=\"60%,60%\" data-url=\"{$data['img_url_show']}\"><img src='{$data['img_url_show']}' style='width:50px;height: 50px;'/></a>";
                return $data;
            });

        }

        public  function  add_edit(){
            $id=Args::params('id');
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $data=[
                    'title'=>Args::params('title')?:'',
                    'is_tui'=>Args::params('is_tui')?:2,
                    'status'=>Args::params('status')?:2,
                    'img_url'=>Args::params('img_url/1','请上传图片地址'),
                    'img_url_show'=>Args::params('img_url_show/1','显示地址错误'),
                    'jump_url'=>Args::params('jump_url'),
                    'sort'=>Args::params('sort')?:0,
                    'group_id'=>Args::params('group_id/1','请选择分组')
                ];
                $res=$id?ad_list::edit([['id','EQ',$id]],$data):ad_list::add($data);
                if($res){
                    $alert = Alert::make()->msg("操作成功")->icon('6')->onOk(CloseAndRefresh::make()->layerNum(0)->closeNum(0))->btn("好的");
                }else{
                    $alert = Alert::make()->msg("操作失败")->icon('5')->title("重要提示")->btn("好的");

                }
                return JsCmd::make()->addCmd($alert)->run();
            }
            $this->_as_group_list=ad_group::list();
            $this->_as_status_list=adconfig::status_info(null,0);
            $this->_as_tui_list=adconfig::tui_info(null,0);
            $this->_as_info=$id?ad_list::info([['id','EQ',$id]]):[];
            $this->adminUiDisplay();
        }

    public  function  del(){
        $id=Args::params('id/1');
        $res=ad_list::del([['id','eq',$id]]);
        if($res){
            $alert = Alert::make()->msg("删除成功")->icon('6')->onOk(Refresh::make()->layerNum(0)->closeNum(0))->btn("好的");
        }else{
            $alert = Alert::make()->msg("删除失败")->icon('5')->title("重要提示")->btn("好的");

        }
        return JsCmd::make()->addCmd($alert)->run();

    }

}