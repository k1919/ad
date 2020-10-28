
    <form role="form"  class="epii" method="post" data-form="1" action="?app=adList@add_edit&__addons=kjx/ad"> <!--data-form="1"-->
        <input type="hidden" name="id" value="{$info.id?}">

        <div class="form-group">
            <label class="control-label">描述:</label>
            <input type="text" class="form-control" name="title" value="{$info.title?}" >
        </div>
        <div class="form-group">
            <label class="control-label">所属分组:</label>
            <select class="form-control" name="group_id">
                {:options,$group_list,$info.group_id?}
            </select>
        </div>
        <div class="form-group">
            <label class="control-label">是否推荐:</label>
            <select class="form-control" name="is_tui">
                {:options,$tui_list,$info.is_tui?}
            </select>
        </div>
        <div class="form-group">
            <label class="control-label">是否启用:</label>
            <select class="form-control" name="status">
                {:options,$status_list,$info.status?}
            </select>
        </div>
        <div class="form-group">
            <label class="control-label">排序值:</label>
            <input type="number" class="form-control" name="sort" value="{$info.sort?}"  min="0" max="100" placeholder="数值越小越靠前（0-100） ">
        </div>
        <div class="form-group">
            <label class="control-label"></label>
            <small style="color: #c69500">文件格式为.jpg,gif,png,jpeg大小限制20M</small>
        </div>

        <div class="form-group">
            <label class="control-label">图片:</label>
            <div style="width: 60%"
                 data-upload-preview="1"
                 data-multiple="0"
                 data-input-id="id1"
                 data-maxcount="1"
                 data-mimetype="jpg,gif,png,jpeg"
                 data-maxsize="20480kb"

                 data-upload-success="upload_success"
            ></div>
        </div>
        <div class="form-group">
            <label class="control-label">图片存储地址:</label>
            <input type="text" class="form-control" readonly id="id1" name="img_url" value="{$info.img_url?}"   data-src="{$info.img_url_show?}">
        </div>
        <div class="form-group">
            <label class="control-label">图片展示地址:</label>
            <input type="text" class="form-control" readonly name="img_url_show" value="{$info.img_url_show?}">
        </div>
        <div class="form-group">
            <label class="control-label">链接地址:</label>
            <input type="text" class="form-control" name="jump_url" value="{$info.jump_url?}" >
        </div>



        <div class="form-footer">
            <button type="reset" class="btn btn-default">重置</button>
            <button type="submit" class="btn btn-primary">提交</button>
        </div>
    </form>
    <script>
        function upload_success() {
            var src=$('.epii-upload-file-icon').attr('src');
            $('input[name="img_url_show"]').val(src)
        }

    </script>