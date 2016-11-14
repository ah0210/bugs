<script>
$(function(){
  var ajax = 0;
  $('input').focus(function(){$(this).addClass('highlight');});
  $('input').blur(function(){$(this).removeClass('highlight');});
  $('#pid').blur(function(){
    if(!$(this).val())return;
    if(ajax) return;
    ajax = 1;
    $.post('<?=BASE?>home/pid/'+$(this).val()+'/',function(data){
      if(data == null) {
        $('#unit').val('');
        $('#alert_level').val('');
        $('#kuwei').val('');
        $('#customer').val('');
        $('#category').val('');
        $('#balance').val('');
        return;
      }
      $('#pname').val(data.pname);
      $('#unit').val(data.unit);
      $('#alert_level').val(data.alert_level);
      $('#kuwei').val(data.kuwei);
      $('#customer').val(data.customer);
      $('#category').val(data.category);
      $('#balance').val(data.balance);
      $('#num').focus();
    },"json");
    ajax=0;
  });

  $('#pname').blur(function(){ 
    if(!$(this).val())return;   
    if(ajax) return;
    ajax = 1;
    $.post('<?=BASE?>home/pname/'+$(this).val()+'/',function(data){
      if(data == null) {
        $('#unit').val('');
        $('#alert_level').val('');
        $('#kuwei').val('');
        $('#customer').val('');
        $('#category').val('');
        $('#balance').val('');
        return;
      }
      $('#pid').val(data.pid);
      $('#unit').val(data.unit);
      $('#alert_level').val(data.alert_level);
      $('#kuwei').val(data.kuwei);
      $('#customer').val(data.customer);
      $('#category').val(data.category);
      $('#balance').val(data.balance);
      $('#num').focus();
    },"json");
    ajax=0;
  });
  
  $('#opid').blur(function(){
    if(!$(this).val())return;
    $.post('<?=BASE?>home/pid/'+$(this).val()+'/',function(data){
      if(data == null) {
        $('#ounit').val('');
        $('#oalert_level').val('');
        $('#okuwei').val('');
        $('#ocustomer').val('');
        $('#ocategory').val('');
        $('#obalance').val('');
        return;
      }
      $('#opname').val(data.pname);
      $('#ounit').val(data.unit);
      $('#oalert_level').val(data.alert_level);
      $('#okuwei').val(data.kuwei);
      $('#ocustomer').val(data.customer);
      $('#ocategory').val(data.category);
      $('#obalance').val(data.balance);
      $('#onum').focus();
    },"json");
  });

  $('#opname').blur(function(){
    if(!$(this).val())return;
    $.post('<?=BASE?>home/pname/'+$(this).val()+'/',function(data){
      if(data == null) {
        $('#ounit').val('');
        $('#oalert_level').val('');
        $('#okuwei').val('');
        $('#ocustomer').val('');
        $('#ocategory').val('');
        $('#obalance').val('');
        return;
      }
      $('#opid').val(data.pid);
      $('#ounit').val(data.unit);
      $('#oalert_level').val(data.alert_level);
      $('#okuwei').val(data.kuwei);
      $('#ocustomer').val(data.customer);
      $('#ocategory').val(data.category);
      $('#obalance').val(data.balance);
      $('#onum').focus();
    },"json");
  });
});
</script>
  <h2>入库</h2>
<div class="panel_block" >
<form method="POST" action="" >
  <input type="hidden" name="action" value="1" />
<ul class="panel" >
  <li><label for="pid" >品号</label><input type="text" placeholder="双击选择" required name="pid" id="pid" list="pid_item" autocomplete="off" /></li>
  <li><label for="pname" >品名</label><input type="text" placeholder="双击选择" required name="pname" id="pname" list="pname_item" autocomplete="off" /></li>
  <li><label for="num" >数量</label><input required type="text" name="num" id="num" autocomplete="off" /></li>
  <li><label for="eku_id" >单号</label><input type="text" name="eku_id" id="eku_id" autocomplete="off" value="<?=$_GET['action']?$_GET['eku_id']:''?>"/></li>
  <li><label for="customer" >客户</label><input type="text" name="customer" id="customer" /></li>
  <li><label for="remark" >备注</label><input type="text" class="long" name="remark" id="remark" autocomplete="off"/></li>
  <li><label>  <select type="text" name="action_label" id="action_label" >
    <option>入库</option>
    <option>盘盈</option>
  </select></label>
  <input tabindex="2" type="submit" value="确认提交" class="button"  /></li>
</ul>
<ul class="panel c1" >
  <li><label for="category" >类别</label><input type="text" name="category" id="category" list="category_item" autocomplete="off" /></li>
  <li><label for="unit" >单位</label><input type="text" name="unit" id="unit" autocomplete="off" /></li>
  <li><label for="kuwei" >库位编号</label><input type="text" name="kuwei" id="kuwei" /></li>
  <li><label for="balance" >当前库存</label><input type="text" disabled="true" name="balance" id="balance" list="balance_item" autocomplete="off" /></li>
  <li><label for="alert_level" >警戒库存</label><input type="text" name="alert_level" id="alert_level" /></li>
  <li><label for="datetime" >入库时间</label><input type="text" class="medium"  name="datetime" id="datetime" autocomplete="off" value="<?=date('Y-m-d H:i:s')?>"/></li>
</ul>
</form>
<div class="clear" ></div>
</div>
  <h2>出库</h2>
<div class="panel_block" >
<form method="POST" action="" >
  <input type="hidden" name="action" value="-1" />
<ul class="panel" >
   <li ><label for="opid" >品号</label><input type="text" required name="pid" id="opid" list="pid_item" autocomplete="off" /></li>
  <li ><label for="opname" >品名</label><input type="text" required name="pname" id="opname" list="pname_item"  autocomplete="off" /></li>
  <li  ><label for="onum" >数量</label><input tabindex="21" required type="text" name="num" id="onum" autocomplete="off" /></li>
 <li ><label for="oeku_id" >单号</label><input type="text" name="eku_id" id="oeku_id"  value="<?=$_GET['action']==-1?$_GET['eku_id']:''?>"/></li>
  <li><label for="ocustomer" >客户</label><input type="text" name="customer" id="ocustomer" /></li>
   <li><label for="oremark" >备注</label><input type="text" class="long" name="remark" id="oremark" autocomplete="off"/></li>
  <li><label>  <select type="text" name="action_label" id="oaction_label" >
    <option>出库</option>
    <option>盘亏</option>
  </select></label>
  <input tabindex="22" type="submit" value="确认提交" class="button" /></li>
</ul>
<ul class="panel c1" >
  <li><label for="ocategory" >类别</label><input type="text" name="category" id="ocategory" list="category_item" autocomplete="off" /></li>
  <li><label for="ounit" >单位</label><input type="text" name="unit" id="ounit" autocomplete="off" /></li>
  <li><label for="okuwei" >库位编号</label><input type="text" name="kuwei" id="okuwei" /></li>
 <li><label for="obalance" >当前库存</label><input type="text" disabled="true" name="balance" id="obalance" list="balance_item" autocomplete="off" /></li>
  <li><label for="oalert_level" >警戒库存</label><input type="text" name="alert_level" id="oalert_level" /></li>
  <li><label for="odatetime" >入库时间</label><input type="text" class="medium" name="datetime" id="odatetime" autocomplete="off" value="<?=date('Y-m-d H:i:s')?>"/></li>

</ul>
</form>
<div class="clear" ></div>
</div>

<datalist id="pid_item">
<?foreach($eku as $e):?>
  <option value="<?=$e['pid']?>" > 
<?endforeach;?>
</datalist>

<datalist id="pname_item">
<?foreach($eku as $e):?>
  <option value="<?=$e['pname']?>" > 
<?endforeach;?>
</datalist>

<datalist id="category_item">
  <option value="原料" >
  <option value="产成品" >
  <option value="其他" >
</datalist>

<div style="padding:5px 10px 15px;">
 1. html5 浏览器，建议 <a href="http://www.google.cn/chrome/intl/zh-CN/landing_chrome.html" target="_blank" >Chrome</a> 。 2. 录入错误或退货请用负数进行冲抵。  3. Tab 键方便你在输入框之间切换
</div>
