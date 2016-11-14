<ul class="user-list" >
<?
if(is_array($records )){
foreach ($records as $r ){ ?>
  <li>
    <div>email <?=$r['email']?></div>
    <div>用户名 <?=$r['username']?></div>
    <div>密码 <?=$r['password']?></div>
    <div>发布时间 <?=$r['post_time']?></div>
    <div>更新时间 <?=$r['update_time']?></div>
    <div>级别 <?=$r['level']?></div>
    <div>信息 <?=$r['info']?></div>
    <div>
      <a href="/user/view/<?=$r['id']?>" >查看</a>
      <a href="/user/edit/<?=$r['id']?>" >编辑</a> 
    </div>
  </li>
<?  }
}?>
</ul>
<?=isset($pagination)?$pagination:''?>