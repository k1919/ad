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
                                <label  >分组名称：</label>
                                <input type="text" class="form-control" name="name" placeholder="支持模糊搜索">
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
        <a class="btn   btn-outline-primary btn-table-tool btn-dialog" href="?app=adGroup@add_edit&__addons=kjx/ad" data-area="30%,50%" title="新增分组"><i class="fa fa-plus"></i>新增</a>
    </div>
    <div class="card-body table-responsive" style="padding-top: 0px">
        <table data-table="1" data-url="?app=adGroup@ajax_data&__addons=kjx/ad" id="table1" class="table table-hover">
            <thead>
            <tr>

                <th data-field="id" data-formatter="epiiFormatter">ID</th>
                <th data-field="name" data-formatter="epiiFormatter">分组名称</th>
                <th data-field="updatetime" data-formatter="epiiFormatter">更新时间</th>
                <th data-formatter="epiiFormatter.btns"
                    data-btns="edit,del"
                    data-edit-url="?app=adGroup@add_edit&id={id}&__addons=kjx/ad"
                    data-edit-title="编辑：{name}"
                    data-del-url="?app=adGroup@del&id={id}&__addons=kjx/ad"
                    data-del-title="删除：{name}"
                    data-area="30%,50%"
                >操作
                </th>
            </tr>
            </thead>
        </table>
    </div>

</div>
