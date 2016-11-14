<?php
class user extends base{

  function __construct()
  {
    parent::__construct();
    $this->m = load('m/user_m');
  }
 
  function login()
  {
    if(!is_email($_POST['email']))redirect(BASE,'email 输入错误');
    if( $this->m->login( $_POST['email'] , $_POST['password'] )){
      redirect('?/bugtrace/','登录成功！','',0);
      exit;
    }
    redirect(BASE,$this->m->login_err);
  }

  function logout()
  {
    $this->m->logout();
    redirect(BASE,'退出登录！','',0);
  }
}
