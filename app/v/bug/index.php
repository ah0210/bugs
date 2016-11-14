<div class="span6">
  <div class="panel_block">
    <h2>概况</h2>
      <table class="table" ><thead><tr><th>Bug总数: <?php echo $stat[0]+$stat[1]; ?></th><th>未修复:  <?php echo $stat[0]; ?></th><th>已解决: <?php echo $stat[1];?>  </th></tr></thead></table>
  </div>
  <div class="panel_block">
    <h2>待办理</h2>
    <table class="table table-hover" >
      <tbody>
      <?php
      $i=0;
      foreach($mybugs as $b){
        ?>
        <tr>
          <td width="60%" ><a href="?/bugtrace/view/<?php echo $b['id'];?>/" ><?php echo $b['title'];?></a></td>
          <td width="15%" ><div class="cc cc<?php echo $b['priority'];?>" ><?php echo $prio[$b['priority']];?></div></td>
          <td><?php echo $data['users'][$b['doer']]; ?></td>
        </tr>
        <?php  }?>
      </tbody>
    </table>
    <div><center> <a href="?/bugtrace/bugs/" >- 查看全部 -</a> </center></div>
  </div>
  <div class="panel_block table-hover" >
  <h2>新BUG</h2>
  <table class="table" >
    <tbody>
    <?php
    $i=0;
    foreach($mebugs as $b){?>
      <tr <?php echo ($i++%2==1)?' class="odd"':' class="even"'?> >
        <td width="60%" ><a href="?/bugtrace/view/<?php echo $b['id']?>/" ><?php echo $b['title']?></a></td>
        <td width="15%" ><div class="cc cc<?php echo $b['priority']?>" ><?php echo $prio[$b['priority']]?></div></td>
        <td><?php echo $data['users'][$b['doer']]?></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
  <div><center> <a href="?/bugtrace/bugs/" >- 查看全部 -</a> </center></div>
  </div>
</div>

<div class="span6">
  <div class="panel_block">
    <h2>提交Bug</h2>
    <form method="POST" action="?/bugtrace/add/" enctype="multipart/form-data" >
    <ul class="panel" >
    <li><input type="text" class="input-xxlarge"  name="title" required placeholder="Bug标题" /></li>
    <li><select name="version" required  class="input-medium" >
  <?php
  $cat = explode("\n",$data['version']);
  if(is_array($cat)){
    foreach($cat as $c)
    {
      ?>
      <option value="<?php echo $c?>" >版本:<?php echo $c?></option>
      <?php
    }
  }
  ?>
    </select>
    <select name="module"  class="input-medium"  required >
     <?php
  $cat = explode("\n",$data['module']);
  if(is_array($cat)){
    foreach($cat as $c)
    {
      ?>
      <option value="<?php echo $c?>" >模块:<?php echo $c?></option>
      <?php
    }
  }
  ?>

  </select>
    </li>
    <li>

    <select name="priority" required  class="input-medium" >
      <option value="1" >优先级:低</option>
      <option value="2" >优先级:中</option>
      <option value="3" >优先级:高</option>
      <option value="4" >优先级:紧急</option>
      <option value="5" >优先级:严重</option>
    </select>

    <select name="doer" required class="input-medium" >
      <?php
      foreach($data['users'] as $c => $u)
      { ?>
        <option value="<?php echo $c?>" >指派给:<?php echo $u?></option>
      <?php } ?>
    </select>
    </li>
    <li><textarea class="input-xxlarge" rows="10" placeholder="内容" name="content" ></textarea></li>
    <li><input type="file" multiple="" name="attach[]" /></li>
    <li><input type="submit" class="btn" /></li>
  </ul>
  </form>
  </div>
</div>

