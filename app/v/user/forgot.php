<!DOCTYPE html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>一库仓储</title>
<meta name="keywords" content="Tech20 Home Page"/>
<meta name="description" content="Tech20 Home Page"/>
<link href="<?=BASE?>static/default.css" rel="stylesheet" type="text/css" media="screen" />
  <script charset="utf-8" src="<?=BASE?>static/jquery-1.7.1.min.js"></script>
</head>
<body>
	<div  class="wrap" style="width:260px;text-align:center;"  >
	<div class="panel_block"  >
  <h1>取回密码 </h1> 
<form method="POST"action="/login/" class="padding" >
    <ul class="panel" >
         <li >
输入你登录用 email 帐号   </li>
   
   <li >
	 <input class="medium" required name="username" placeholder="email" type="text"  value="<?=isset($val['username'])?$val['username']:''?>" />
   </li>
  <li>
    <input class="medium"  type="submit" class="button" value="取回密码" /> </li> 
   </ul> 
 </form>
 </div></div>

</body>
</html>
