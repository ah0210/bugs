<table class="user-list-table table-list table" cellspacing=0 >
<?if(is_array($records )){?>
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
<?foreach ($records as $r ){?>
  <tr>
    <td><?=$r['email']?></td>
    <td><?=$r['username']?></td> 
    <td><?=$r['post_time']?></td>
    <td><?=$r['update_time']?></td>
    <td><?=$r['level']?></td>
    <td><?=$r['info']?></td>
    <td>
      <a href="/user/view/<?=$r['id']?>" >查看</a>
      <a href="/user/edit/<?=$r['id']?>" >编辑</a> 
    </td>
  </tr>
<?  }
}?>
</table>
<?=$pagination?>
