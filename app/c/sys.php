<?php
class sys extends base{

  function __construct()
  {
    parent::__construct();
    $this->check();
    $this->app = load('m/app');
    $this->user_app = new user_app;
  }

  function load($app,$app_id)
  {
    $auth = array(
      'app'  =>  $app,
      'id'   =>  $app_id,
      'seed' => md5(SEED.$app.$app_id)
    );
    $value = serialize($auth);
    setcookie('app' , $value , time()+9999 , '/');
    header("location:/$app/");
  } 
  
  
  function install($app)
  {
    $auth = array(
      'app'  =>  $app,
      'id'   =>  $app_id,
      'seed' => md5(SEED.$app.$app_id)
    );
    $value = serialize($auth);
    setcookie('app' , $value , time()+9999 , '/');
    header("location:/$app/");
  } 
  
  function add_user()
  {
    $users = explode("\n",$_POST['add_users']);
    foreach($users as $u){
      $this->add_user_single($u,$_POST['app_id']);
    }
    header("location:".$_SERVER['HTTP_REFERER']);
  }
  
  function add_user_single($u,$app_id)
  {
    $u = strtolower(trim($u)); 
    if(!is_email($u))return;
    $uid = load('m/user_m')->getbyemail($u);
    if(!$uid) $uid = load('m/user_m')->add(array('email'=>$u));
    //$this->user_app->addone($uid,$app_id); 
  }
}
