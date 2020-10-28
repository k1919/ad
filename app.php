<?php
namespace song;

use epii\admin\center\libs\AddonsApp;

class app extends AddonsApp
{
    //http://test.testepii.com/?app=test1&__addons=song/test
    public function install(): bool
    {
        // TODO: Implement install() method.
        $pid = $this->addMenu(0,"宋扬测试导航","");
        $this->addMenu( $pid,"导航1","?app=adList@index&__addons=kang/ad");
        $this->addMenu( $pid,"导航2","?app=adGroup@index&__addons=kang/ad");
       // $this->execSqlFile(__)
        return  true;
    }

    public function update($new_version, $old_version): bool
    {
        // TODO: Implement update() method.
        return  true;
    }

    public function onOpen(): bool
    {
        // TODO: Implement onOpen() method.
        return  true;
    }

    public function onClose(): bool
    {
        // TODO: Implement onClose() method.
        return  true;
    }
}