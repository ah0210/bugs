<table class="user-list-table table-list table" cellspacing=0 >
<?php if(is_array($records )){?>
  <tr>
    <th>email</th>
    <th>用户名</th> 
    <th>发布时间</th>
    <th>更新时间</th>
    <th>级别</th>
    <th>信息</th>
    <th>
      操作
    </th>
  </tr>
<?php  foreach ($records as $r ){?>
  <tr>
    <td><?php echo $r['email']?></td>
    <td><?php echo $r['username']?></td>
    <td><?php echo $r['post_time']?></td>
    <td><?php echo $r['update_time']?></td>
    <td><?php echo $r['level']?></td>
    <td><?php echo $r['info']?></td>
    <td>
      <a href="/user/view/<?php echo $r['id']?>" >查看</a>
      <a href="/user/edit/<?php echo $r['id']?>" >编辑</a>
    </td>
  </tr>
<?php   }
}?>
</table>
<?php  echo $pagination?>
