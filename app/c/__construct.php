<?php
load('lib/utility',false);
class base extends c{
  function __construct()
  {
    global $db_config;
    
    if(!isset($db_config)){
      // Normal Install Process
      $this->install();
      exit;
    }
     
    if(!load('m/app')->is_install()){
      $this->sae_install();
      exit;
    } 
    
  }
  
  function check()
  {
    $this->u = load('m/user_m')->check(); 
    if(!$this->u['id']){
      $this->login();
    }
  }
  
  function loadapp()
  {
    
    global $app_id;
    $app_id = 1;
    return 1;
  }
  
  function display($view,$param = array())
  {
    $param['al_content'] = view($view,$param,TRUE);
    $param['u'] = $this->u;
    $param['menu']  = $this->menu;
    header("Content-type: text/html; charset=utf-8");
    view('v/bug/template',$param);
  }
  
  
  function excel($view,$param = array())
  {
    header("Content-type:application/vnd.ms-excel");
    header("Content-Disposition:attachment;filename=test_data.xls");
    $param['al_content'] = view($view,$param,TRUE);
    view('v/excel'.$temp,$param);
  }
  
  function login()
  {
    $rtu = isset($_GET['rtu'])?$_GET['rtu']:BASE;
    $conf = array('username'=>'required','password'=>'required');
    $err = validate($conf);
    if (is_array($err)) {
      //$err['info'] = $this->m->login_err;
      $param['err'] = $err;
      $param['page_title'] = $param['meta_keywords'] = $param['meta_description'] = '登录';
      //$this->display('v/user/login',$param); 
      //if(browser() == 'html4')view('v/user/login_ie',$param);
      view('v/bug/login',$param);  
      exit;
    }
    
    if( $this->m->login( $_POST['username'] , $_POST['password'] )){
      redirect($rtu,'登录成功！');
      exit;
    }
    
    redirect(BASE.'?rtu='.$rtu,$this->m->login_err);
  }
  

  private function install(){
    global $db_config;
    if(is_array($db_config))redirect("/");
    $param['writable'] = file_put_contents(APP.'writable.tmp','test');

    if(isset($_POST['db_type'])){
      $db_type = $_POST['db_type'] == 'sqlite'?'sqlite':'mysql';
      $_POST['default_db'] = $db_type=='sqlite'?rand(100000,999999).'.sqlite':$_POST['default_db'];
      $db = new db($_POST);
      $sql = file_get_contents(APP.$db_type.'_ins.sql');
      $db->muti_query($sql);
      $base_dir = rtrim($_POST['base_dir'],'/').'/';
      $seed = randstr();
      file_put_contents(APP.'config_user.php','<?php
define(\'BASE\',\'?/\');
define(\'SEED\',\''.$seed.'\');
$db_config = array(
  \'host\'      =>\''.$_POST['host'].'\', 
  \'user\'      =>\''.$_POST['user'].'\',  
  \'password\'  =>\''.$_POST['password'].'\', 
  \'db_type\'   =>\''.$_POST['db_type'].'\',
  \'default_db\'=>\''.$_POST['default_db'].'\'
);');
      redirect($_POST['base_dir'],'安装成功','用户名 admin@b24.cn 密码 admin','8');
    }
    else {
      header("Content-type: text/html; charset=utf-8");
      $base = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']);
      view("v/home/install",$param);
    }
  }

  private function sae_install()
  {
    global $db_config,$db;
    if(load('m/app')->is_install())redirect("/");
    $sql = file_get_contents(APP.'mysql_ins.sql');
    $db->muti_query($sql);
    header("Content-type: text/html; charset=utf-8");
    view("v/home/sae_install");
  }
}
