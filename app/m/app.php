<?php
class app extends m {
  function __construct()
  {
    global $app_id;
    parent::__construct();
    $this->table = 'app';
    $this->app = $app_id;
    $this->fields = array('title','data','create_time','admin','app');
  }
  
  function is_install()
  {
    $ret =  $this->db->query("show tables like 'app';");
    if(sizeof($ret) < 1)return false;
    
    return true;
  }
  
  function load($uid,$app)
  { 
		//$this->update(1,array('data'=> '{"category":"cate1\r\ncate2\r\ncate3","users":{"1":"admin"},"version":"v1\r\nv2"}'));
		return 1;
  }
/*
  function apps($uid)
  {
    return $this->db->query("select * from app where id in (select app_id from user_app where user_id = '$uid' )");
  }
*/  
  function users($app_id)
  {
    return $this->db->query("select * from user where 1");
  }
}

class user_app extends m{
  function __construct()
  {
    global $app_id;
    parent::__construct();
    $this->table = 'user_app';
    $this->app = $app_id;
    $this->fields = array('app_id','user_id','join_time','app');
  }
  
  function addone($uid, $aid)
  {
    $tmp = $this->get(" and app_id='$aid' and user_id = '$uid'");
    if(!isset($tmp[0])) $this->add(array('app_id'=>$aid,'user_id'=>$uid,'join_time'=>time()));
  }
  
  function delone($uid, $aid)
  {
    $tmp = load('m/user_m')->del($uid);
    return;
  }
}
