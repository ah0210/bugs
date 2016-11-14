<div class="span6">
  <div class="panel_block">
    <h2><?php echo $r['title']?>
    <span class="edit_button" > <a href="?/bugtrace/edit/<?php echo $r['id']?>/" >编辑</a></span>
    </h2> 
  <ul class="panel" >
    <li><span class="cc cc<?php echo $r['state']?2:5?>" ><?php echo $r['state']?'已解决':'未修复'?></span></li>
    <li>
      版本： <?php echo $r['version']?> ,
      模块版本： <?php echo $r['module']?>
    </li>
    <li>
      优先级： <span class="cc cc<?php echo $r['priority']?>" > <?php echo $prio[$r['priority']]?></span> ,
      指派给:  <?php echo $data['users'][$r['doer']]?>
    </li>
    <li><div class="ctt odd"><?php echo nl2br($r['content'])?></div></li>
  </ul> 
  <div class="clear" ></div>
  </div>

  <div class="panel_block">
    <h2>处理过程</h2> 
    <ul>
      <?php foreach($trace as $b){?>
        <li  <?php echo ($i++%2==1)?' class="odd"':' class="even"'?> >
          <div> 
          <?php
          if($b['doer']) echo '<span class="cc5 cc" >转发</span> '.$data['users'][$b['poster']].' → '.$data['users'][$b['doer']];
          else echo '<span class="cc cc2" >解决</span> '.$data['users'][$b['poster']];
          ?>
          <span class="date" ><?php echo date('Y-m-d H:m:s',$b['post_time'])?></span></div>
          <div class="ctt" ><?php echo nl2br($b['content'])?>
            <?php
              $attached = json_decode($b['attached'],TRUE);
              if( $attached[0]['file'] ) {
              echo "<br />附件 : ";
              foreach($attached as $at){
                echo '<a href="'.$at['file'].'" target="_blank" >'.$at['title'].'</a> , ';
              }
            }
            ?>
          </div><hr />
        </li>  
      <?php }?>
    </ul>
  </div> 
</div>
 
<div class="span6">
  <div class="panel_block">
    <h2>操作</h2>
 <form method="POST" enctype="multipart/form-data" >
    <input type="hidden" name="bugid" value="<?php echo $r['id']?>" />
    <ul class="panel" >
      <li>状态 <input type="radio" name="state" value="0" checked class="state" />已解决  <input  class="state"  type="radio" name="state" value="1" />转发
      <span id="sel" ></span>
      </li>
      <li><textarea class="input-xxlarge" rows="10" placeholder="内容" name="content" ></textarea></li> 
      <li><input type="file" multiple="" name="attach[]" /></li>
      <li><input type="submit" class="btn" value="提交" /></li>
    </ul>
  </div> </form>
</div>

<div class="clear" ></div>

<div id="seldoer" style="display:none;" >
<select name="doer" required  >
      <option value="" ></option>
    <?php
    foreach($data['users'] as $c => $u)
    { ?>
      <option value="<?php echo $c?>" ><?php echo $u?></option>
    <?php } ?>
  </select>
</div>
<script>
$(function(){
  $('input[name=state]').click(function(){
    if($(this).val()==1){
      $('#sel').html($('#seldoer').html());
    }
    else {  
      $('#sel').html('');
    }
  });
});  
</script>
