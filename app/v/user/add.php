<div class="col50" style="margin-right:20px;" >

<div class="panel_block" >
  <h2>修改密码</h2>
<form method="POST" >
  <ul>
	<li>
    原密码  <input placeholder="输入原密码"  type="password" class="medium"  name="oldpassword" value="" required />
    </li>
    <li>
     新密码 <input placeholder="输入新密码"  type="password" class="medium"  name="password" value="" required />
    </li>
    <li>
     再一次 <input placeholder="重复输入密码"  type="password" class="medium"  name="repassword" value="" required />
    </li>
    <li>
    <input type="submit"  value="修改密码" /> 
    </li>
  </ul>
</form> 
</div>

</div>
</div>

<div class="col50" >

<div class="panel_block" >
  <h2>修改登录email</h2>
<form method="POST" >
  <ul>
    <li>
      <input placeholder="Email"  type="email" class="medium"  name="email" value="<?=$val['email']?>" />
	  <input type="submit"  value="修改登录email" /> 
    </li> 
   </ul>
</form> 
</div>

<div class="panel_block" >
  <h2>修改姓名</H2> 
<form method="POST" >
  <ul>
    <li>
		<input placeholder="姓名"  type="text" class="medium"  name="username" value="<?=$val['username']?>" />
		<input type="submit"  value="修改显示姓名" /> 
    </li>
  </ul>
</form> 
</div>
</div>
<div>
