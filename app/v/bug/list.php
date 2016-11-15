<script type="text/javascript" src="static/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
  $('#bugs').dataTable({ "sPaginationType": "full_numbers",
         "oLanguage": {
            "sLengthMenu": "显示 _MENU_ 条每页",
            "sZeroRecords": "什么都没有找到 - 很抱歉",
            "sInfo": "总共 _TOTAL_ , 显示 _START_ 至 _END_ 条",
            "sSearch": "搜索",
            "sInfoEmpty": "没有数据！",
            "sInfoFiltered": "(过滤自 _MAX_ 条数据)",
            "oPaginate":{
                "sFirst":"第一页",
                "sLast":"最后页",
                "sNext":"下一页",
                "sPrevious":"上一页"
            }},
       
        });
} );

var filt = function(str){$('#bugs').dataTable().fnFilter( str );}
</script>
<div class="panel_block" >
<ul class="nav nav-pills" >
  <li> <a href="javascript: filt( '' );" >全部</a></li>
  <li> <a href="javascript: filt( 'F:<?php echo $data['users'][$uid]?>' );" >我发布的</a></li>
  <li> <a href="javascript: filt( 'D:<?php echo $data['users'][$uid]?>' );" >我执行的</a></li>
  <li> <a href="javascript: filt( '未修复' );" >未修复</a></li>
  <li> <a href="javascript: filt( '已解决' );" >已解决</a></li>
</ul>
<table id="bugs" class="table table-hover" >
  <thead>
    <tr>
      <th>#</th>
      <th width="40%" >标题</th>
      <th>优先级</th>
      <th>状态</th>
      <th>执行人</th>
      <th>模块</th>
      <th>版本</th>
      <th>发布人</th>
      <th>更新时间</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $i=1;
    foreach($bugs as $b){?>
    <tr>
      <td><?php echo $i++?></td>
      <td><a href="?/bugtrace/view/<?php echo $b['id']?>/" ><?php echo $b['title']?></a></td>
      <td><div class="cc cc<?php echo $b['priority']?>" ><?php echo $b['priority']?> : <?php echo $prio[$b['priority']]?></div></td>
      <td><div class="cc cc<?php echo $b['state']?2:5?>" ><?php echo $b['state']?'已解决':'未修复'?></div></td>
      <td>D:<?php echo $data['users'][$b['doer']]?></td>
      <td><?php echo $b['module']?></td>
      <td><?php echo $b['version']?></td>
      <td>F:<?php echo $data['users'][$b['poster']]?></td>
      <td><?php echo date('Y-m-d',$b['update_time'])?></td>
    </tr>
    <?php }?>
  </tbody>
</table>
<div class="clear"  ></div>
</div>
