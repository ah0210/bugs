<div class="span6">
  <form method="POST" >
    <div class="panel_block" >
    <h2>修改企业名称</H2> 
    <ul>
      <li>
        <input placeholder="企业名称"  type="text" class="input-xlarge"  name="title" value="<?=$app['title']?>" />
        <input type="submit" class="btn" value="修改企业名称" /> 
        </li>
      </ul>
  </div>

  <div class="panel_block" >
    <h2>版本管理</H2> 
      <ul>
        <li><textarea class="input-xxlarge" name="version" style="width:90%;height:80px;"><?=$data['version']?></textarea><input type="submit" class="btn"  value="确认提交" /></li>
      </ul> 
  </div>

  <div class="panel_block" >
    <h2>模块管理</H2> 
      <ul>
        <li><textarea class="input-xxlarge" name="module" style="width:90%;height:80px;"><?=$data['module']?></textarea><input type="submit" class="btn"  value="确认提交" /></li>
      </ul> 
  </div>
  </form> 
 
  <div class="panel_block" >
    <h2>数据清空</H2> 
    <form method="POST" >
      <ul>
        <li><h4></h4></li>
        <li>
        <input placeholder="输入管理帐号密码"  type="password" class="medium"  name="password" value="" />
        <input type="submit"  class="btn"  value="清空现有数据" /> 
        </li>
      </ul>
    </form>
  </div>
</div> 
<div class="span6">
  <div class="panel_block" >
    <h2>系统版本</H2> 
    <form method="POST" >
      <ul>
        <li>Open Source Edition</li>
      </ul>
    </form> 
  </div>
  <div class="panel_block" >
    <h2>用户管理</H2>
    <form method="POST" >      <ul>
        <li>
        <table>
          <tr><td>email</td><td>姓名</td><td></td></tr>
          <?foreach($users as $u){?>
            <tr>
              <td><?=$u['email']?></td><td><input type="text" name="users[<?=$u['id']?>]" value="<?=$data['users'][$u['id']]?>" class="short" ><td>
              <td><?=$app['admin'] == $u['id']?'管理员':'<a href="?/bugtrace/sys/remove/'.$u['id'].'" >删除</a> <a href="?/bugtrace/sys/reset/'.$u['id'].'" >清空密码</a>'?> </td>
            </tr>
          <?}?>
        </table></li>
        <li><input type="submit" value="更新用户"  class="btn"  /></li>
    </ul>
    </form>
  </div>
  <div class="panel_block" >
  <h2>添加用户</H2>
  <ul>
    <li>
    <form method="POST" action="<?=BASE?>sys/add_user/" >
      <input type="hidden" value="<?=$app['id']?>" name="app_id" />
      每行输入一个 email 地址
      <textarea name="add_users" style="width:90%;height:80px;"></textarea>
      <input type="submit" value="添加用户"  class="btn"  /></li>
      <li> <div class="alert" >注意： 添加完成后，用添加的 email登录，系统会记住第一次登录的密码为登录密码</div> </li>
    </ul>
  </div>
</div>
