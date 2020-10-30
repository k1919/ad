查询广告列表数据
===============================
```ruby
     use kang\model\ad_list;


    /*
     * @param  group_id 组ID
     * @param  where 条件  默认当前状态启用
     * @param  order  排序值  默认从小到大排序
     * @param limit  默认限制20条
     * */ 
     getLists($group_id,$where,$order,$limit)
     
     例子:   ad_list::getLists(1);


```
查询某一条数据
===============================
```ruby
     use kang\model\ad_list;


     /*
     * @param  group_id 组ID
     * */ 
     getInfoById($group_id)
     
     例子:   ad_list::getInfoById(1);
```  




