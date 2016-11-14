<?php
class account extends base{
  function __construct()
  {  
    parent::__construct();
    global $app_id;
    
    $this->check();
    $this->loadapp();
    $this->m = load('m/bug_m');
    $this->menu = array(
      'index'=>'首页',
      'bugs'=>'Bugs',
      '../account'=>'帐号'
     );
  
    $this->priority = array(
    '1'=>'低',  
    '2'=>'中',
    '3'=>'高',
    '4'=>'紧急',
    '5'=>'严重'
    );
   
    $this->app = load('m/app')->get($app_id);
    if( $this->app['admin'] == $this->u['id'] ) $this->menu['sys'] ='设置';
  }
  
  function index()
  {
    $id = $this->u['id'];
    
    // update password 
    $conf = array('password'=>'required|comparetopwd','repassword'=>'required');
    $err = validate($conf);
    if ( $err === TRUE) {
      if(!load('m/user_m')->checkpwd($id,$_POST['oldpassword']))redirect(BASE.'account/','原密码错误');
      $_POST['post_time'] = $_POST['update_time'] = time();
      load('m/user_m')->update_user($id);
      redirect(BASE.'account/','修改成功');
    }
    else if ( isset($_POST['email']) || isset($_POST['username'])) {
      $_POST['post_time'] = $_POST['update_time'] = time();
      load('m/user_m')->update($id);
      redirect(BASE.'account','修改成功');
    }
    else {
      $param['val'] = array_merge($_POST,load('m/user_m')->get($id)); 
      $param['err'] = $err;
      $this->display('v/user/add',$param);
    }
    
    // update password 

     
    
  }
}

function comparetopwd()
{
  if($_POST['password'] == $_POST['repassword']) return true;
  return '两次输入的密码不一致';
}
