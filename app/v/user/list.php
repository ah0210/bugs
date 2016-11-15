<ul class="user-list" >
<?php
if(is_array($records )){
foreach ($records as $r ){ ?>
  <li>
    <div>email <?php echo $r['email']?></div>
    <div>用户名 <?php echo $r['username']?></div>
    <div>密码 <?php echo $r['password']?></div>
    <div>发布时间 <?php echo $r['post_time']?></div>
    <div>更新时间 <?php echo $r['update_time']?></div>
    <div>级别 <?php echo $r['level']?></div>
    <div>信息 <?php echo $r['info']?></div>
    <div>
      <a href="/user/view/<?php echo $r['id']?>" >查看</a>
      <a href="/user/edit/<?php echo $r['id']?>" >编辑</a>
    </div>
  </li>
<?php  }
}?>
</ul>
<?php echo isset($pagination)?$pagination:''?>