<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF8" />
  <title>BugTrace 在线安装</title>
  <link href="static/default.css" rel="stylesheet" type="text/css" media="screen" />
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 500px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      
      .form-signin .form-signin-heading,
      .form-signin h1 {
        text-align:center;
        margin: 30px 0 50px;
        color:#666;
      }
 
    </style>
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->
</head>
<body>
<div class="container">
<form class="form-signin form-horizontal" method="POST" >
  <h1>BugTrace 安装程序</h1>
  
  <?
  if($writable){?>
  <div class="alert" >安装后登录帐号为 admin@b24.cn 密码 admin,</div>
  <input type="hidden" class="db_type" name="db_type" value="mysql"  >  
  <div class="control-group">
    <label class="control-label" >服务器</label>
    <div class="controls">
      <input type="text" name="host" value="localhost">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" >用户名</label>
    <div class="controls">
      <input type="text" name="user" value="root">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" >密　码</label>
    <div class="controls">
      <input type="text" name="password" value="root">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" >数据库</label>
    <div class="controls">
      <input type="text" name="default_db" value="test">
    </div>
  </div>
  <div class="control-group">
    <div class="controls">
      <button class="btn btn-large btn-primary" type="submit">现在安装</button>
    </div>
  </div>
  <?}
  else {?>
  <div class="alert alert-error" ><h4>配置错误</h4>对不起，安装程序需要自动在 app 目录创建 config_user.php 文件， 请先将 app 目录设置为可写(777) 权限。 修改完成后刷新本页。</div>
  <?}?>
</form>
</div></body>
</html>
