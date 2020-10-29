<?php
namespace kang;

use epii\admin\center\libs\AddonsApp;

//https://packagist.org/api/github?username=k1919
//ijijb-AnrIZVtKgEkVw5
class app extends AddonsApp
{
    //http://test.testepii.com/?app=test1&__addons=song/test
    public function install(): bool
    {
        // TODO: Implement install() method.
        $pid = $this->addMenu(0,"广告位管理","",'fa-cc-discover');
        $this->addMenu( $pid,"广告位列表","?app=adList@index&__addons=kjx/ad",'fa-image');
        $this->addMenu( $pid,"广告位分组","?app=adGroup@index&__addons=kjx/ad",'fa-align-right');
        $this->execSqlFile(__DIR__.'/ad.sql','epii_');
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