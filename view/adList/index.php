<section class="content" style="padding: 10px">
    <div class="row">
        <div class="col-12">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">搜索</h3>
                </div>


                <div class="card-body">
                    <form role="form" data-form="1" data-search-table-id="1" data-title="自定义标题" >
                        <div class="form-inline"  >
                            <div class="form-group">
                                <label  >所属分组：</label>
                                <select class="form-control" name="group_id">
                                    <option value="0">全部</option>
                                    {:options,$group_list}
                                </select>
                            </div>
                            <div class="form-group">
                                <label  >是否推荐：</label>
                                <select class="form-control" name="is_tui">
                                    {:options,$tui_list}
                                </select>
                            </div>
                            <div class="form-group">
                                <label  >当前状态：</label>
                                <select class="form-control" name="status">
                                    {:options,$status_list}
                                </select>
                            </div>


                            <div class="form-group" style="margin-left: 10px">
                                <button type="submit" class="btn btn-primary">提交</button>
                                <button type="reset" class="btn btn-default">重置</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>




<div class="content">
    <div class="card-body table-responsive" style="padding-top: 0px">
        <a class="btn   btn-outline-primary btn-table-tool btn-dialog" href="?app=adList@add_edit&__addons=kjx/ad" data-area="60%,90%" title="新增广告位"><i class="fa fa-plus"></i>新增广告位</a>
    </div>
    <div class="card-body table-responsive" style="padding-top: 0px">
        <table data-table="1" data-url="?app=adList@ajax_data&__addons=kjx/ad" id="table1" class="table table-hover">
            <thead>
            <tr>

                <th data-field="id" data-formatter="epiiFormatter">ID</th>
                <th data-field="group_name" data-formatter="epiiFormatter">所属分组</th>
                <th data-field="img_url_show" data-align='center' data-formatter="epiiFormatter">图片信息</th>
                <th data-field="title" data-formatter="epiiFormatter">描述</th>
                <th data-field="sort" data-formatter="epiiFormatter">排序值</th>
                <th data-field="is_tui" data-formatter="epiiFormatter">是否推荐</th>
                <th data-field="status" data-formatter="epiiFormatter.switch">当前状态</th>
                <th data-formatter="epiiFormatter.btns"
                    data-btns="edit,del"
                    data-edit-url="?app=adList@add_edit&id={id}&__addons=kjx/ad"
                    data-edit-title="编辑：{name}"
                    data-del-url="?app=adList@del&id={id}&__addons=kjx/ad"
                    data-del-title="删除：{name}"
                    data-area="60%,90%"
                >操作
                </th>
            </tr>
            </thead>
        </table>
    </div>

</div>
<script>
    function show_img(field_value, row, index,field_name) {
        return '<img src="'+row.img_url_show+'"  style="width: 40px;height: 40px" />  ';
    }
    </script>
