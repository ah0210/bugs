<!DOCTYPE html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>EKU | 缺陷跟踪 </title>
<meta name="keywords" content="免费,在线,仓库管理,软件,云计算"/>
<meta name="description" content="免费在线仓库管理软件"/>
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
<meta content="yes" name="apple-mobile-web-app-capable" />
<meta content="black" name="apple-mobile-web-app-status-bar-style" />
<link href="<?=BASE?>static/default.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>
	<div  class="wrap" style="width:360px;text-align:center;"  >
	<div class="panel_block" style="padding:40px 0;" >
  <h1><span class="logo" >EKU</span>缺陷跟踪 </h1>
<form method="POST"action="<?=BASE?>login/" class="padding" >
    <ul class="panel" >
   <li >
	 <input class="medium" required name="email" placeholder="email" type="email"  value="<?=isset($val['email'])?$val['email']:''?>" />
   </li>
  <li>
      <input class="medium" required placeholder="密码" name="password" type="password" value="<?=isset($val['password'])?$val['password']:''?>" />
    <input type="hidden" name="some"  value="ok" /></li>
  <li> <input class="medium"  type="submit" class="button" value="登录 ( 自动注册 )" /> </li>
   </ul> 
 </form>
 </div>
 </div>
</body>
</html>
