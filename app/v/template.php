<!DOCTYPE html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>900APP</title>
<meta name="keywords" content="Tech20 Home Page"/>
<meta name="description" content="Tech20 Home Page"/>
<link href="<?=BASE?>static/default.css" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript" src="//lib.sinaapp.com/js/jquery/1.8/jquery.min.js"></script>
  <script>
$(function(){
  $('input').focus(function(){$(this).addClass('highlight');});
  $('input').blur(function(){$(this).removeClass('highlight');});
});  </script>
</head>
<body>  
 
<div class="header">
  <div class="wrap" >
    <div class="clear" ></div>
  <ul class="menu" >
    <li id="logo" ><span class="logo" >900APP</span></li>
    <?foreach($menu as $k=>$v){?>
    <li class="<?=$k==(seg(1)?seg(1):'home')?'hover ':''?>bt" ><a href="<?=BASE?><?=$k?>/" ><?=$v?></a></li>
    <?}?>
    <li style="float:right;" ><?if(isset($u['id'])):?><?=$u['name']?$u['name']:$u['email']?> ，<a href="<?=BASE?>logout/" >退出登录</a><?endif;?></li>
  </ul>
  </div>
</div>
<div class="wrap" >
  <div class="content" >
    <?=$al_content?>
    <div class="clear" ></div>
    <div class="cpr" > <a href="http://eku.b24.cn/page/feedback/" target=_blank >意见反馈</a></div>
  </div>
</div>
</body>
</html>
