<!DOCTYPE html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <title>BUG追踪系统</title>
  <meta name="keywords" content="BugTRace"/>
  <meta name="description" content="BugTRace Home Page"/>
  <link href="static/default.css" rel="stylesheet" type="text/css" media="screen" />
  <script type="text/javascript" src="static/js/jquery.min.js"></script>
  <script type="text/javascript" src="static/js/bootstrap.min.js"></script>
</head>
<body>  
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="http://172.25.210.5/bug/">BugTrace</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <?php foreach($menu as $k=>$v){?>
                <li class="<?php echo $k==(seg(2)?seg(2):'index')?'active ':''; ?>bt" ><a href="?/bugtrace/<?php echo $k; ?>/" ><?php echo $v; ?></a></li>
              <?php }?>
              <li><a href="?/logout/" > <?php if(isset($u['id'])):?><?php echo $u['name']?$u['name']:$u['email']; ?> / 退出登录</a><?php endif;?></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row-fluid">
        <div class="span12">
          <div class="row-fluid">
          <?php echo $al_content; ?>
          </div>
          <div class="content" > 
    <div class="cpr" > QQ: 163828 </div>
  </div> 
        </div>
      </div>
    </div> <!-- /container -->
    
</body>
</html>
