
    <form role="form"  class="epii" method="post" data-form="1" action="?app=adGroup@add_edit&__addons=kang/ad"> <!--data-form="1"-->
        <input type="hidden" name="id" value="{$info.id?}">

        <div class="form-group">
            <label class="control-label">分组名称:</label>
            <input type="text" class="form-control" name="name" value="{$info.name?}" required>
        </div>


        <div class="form-footer">
            <button type="reset" class="btn btn-default">重置</button>
            <button type="submit" class="btn btn-primary">提交</button>
        </div>
    </form>
