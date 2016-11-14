<!DOCTYPE html>
<html>
<head>
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
<meta content="yes" name="apple-mobile-web-app-capable" />
<meta content="black" name="apple-mobile-web-app-status-bar-style" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="refresh" content="<?=$sec?>;url=<?=$url?>" />
<title> <?=$msg?> </title>
  <link href="static/default.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>
<div class="win" >
  <h1><?=$msg?></h1>
  <div class="msg" ><?=$ext_msg?></div>
  <div class="msg1" >页面跳转至: <a href="<?=$url?>" ><?=$url?></a>
   <br />你可以点击 <a href="<?=$url?>" >直接前往</a>
  </div>
</div>
</body>
</html>
