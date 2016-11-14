<?php
class bugtrace extends base{

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
      'account'=>'帐号'
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
    global $app_id;
    
    $param['prio'] = $this->priority;
    $param['app'] = $app = $this->app;
    $param['data'] = json_decode($app['data'],true);
    $param['states'] = 
    $states = $this->m->db->query("select state,count(*) as  sum from bug where app_id='".$app_id."' group by state",1,10); 
    foreach($states as $sta){
      $k = $sta['state'];
      $v = $sta['sum'];
      $stat[$k] = $v;
    }
    $param['stat'] = $stat;
    $param['mybugs'] = $this->m->get("and app_id='".$app_id."' and state='0' and doer='".$this->u['id']."'",1,10); 
    $param['mebugs'] = $this->m->get("and app_id='".$app_id."' and state='0' order by update_time desc",1,10); 

    $this->display('v/bug/index',$param);   
  }
  
  function add()
  {
    global $app_id;
    $conf = array('title'=>'required');//,'pid'=>'required','pname'=>'required','unit'=>'required','num'=>'required','action'=>'required','action_label'=>'required','alert_level'=>'required','kuwei'=>'required','datetime'=>'required','doer'=>'required','remark'=>'required','category'=>'required','balance'=>'required','cur_balance'=>'required',);
    $err = validate($conf);
    if ( $err === TRUE) {
      $_POST['update_time'] = $_POST['post_time'] = time();
      $_POST['poster'] = $this->u['id'];
      $_POST['app_id'] = $app_id;
      $bugid = $this->m->add();
      $_POST['attached'] = json_encode($this->upload('attach'));
      //print_r($attach);
      $bugt = new bug_trace;
      $_POST['bugid'] = $bugid;
      $bugt->add();
      
      redirect("?/bugtrace/",'提交成功!');
    }
    else {
      $param['val'] = $_POST; 
      $param['err'] = $err;
      $param['app'] = $app = $this->app;
      $param['app']['data'] = json_decode($app['data'],true);
      $param['eku'] = $this->m->eku();
      $this->display('v/bug/add',$param);    
    }  
  }
  
  function edit($pid)
  {
    global $app_id; 
    $param['prio'] = $this->priority;
    $param['app'] = $app = $this->app;
    $param['data'] = json_decode($app['data'],true);
    
    $pid = addslashes($pid);

    $conf = array('title'=>'required');
    $err = validate($conf);
    if ( $err === TRUE) {
      $_POST['update_time'] = $_POST['post_time'] = time();
      $_POST['poster'] = $this->u['id'];
      $_POST['app_id'] = $app_id;
      $this->m->update($pid);      
      $bugt = new bug_trace;
      $_POST['bugid'] = $pid;
      $bugt->add();
      redirect(BASE.'bugtrace/view/'.$pid.'/','修改成功！');
    }
    else {
      $r = $this->m->get($pid);
     // print_r($r);
      $param['r']= $r;
      $this->display('v/bug/add',$param); 
    }   
  }
  
  function bugs()
  {    
    global $app_id;
    $param['uid'] = $this->u['id'];
    $param['app'] = $app = $this->app;
    $param['data'] = json_decode($app['data'],true);
    $param['bugs'] = $this->m->get(" and app_id='$app_id'",0,9999);
    $param['prio'] = $this->priority;
    $this->display('v/bug/list',$param);
  }
  
 
  function sys($action ='' , $aid ='' )
  {
    global $app_id;
    if( $this->app['admin'] != $this->u['id'] ) redirect(BASE.'bugtrace/','对不起，您不是管理员'); 
    if( $aid == $this->u['id'] ) redirect('?/bugtrace/','无权限');    

    switch($action){
      case 'remove':
        $ua = new user_app;
        $ua->delone($aid,$app_id);
        redirect('?/bugtrace/sys','删除成功');    
        break;
      case 'reset':
        load('m/user_m')->update($aid , array('password'=>''));
        redirect('?/bugtrace/sys','密码清空','系统将记录下次登录时输入密码为帐号密码！',10);
        break;
      default:
    }
    
    $param['app'] = $app = $this->app;
    $param['data'] = $data = is_array(json_decode($app['data'],true))?json_decode($app['data'],true):array();

    if (isset($_POST['title'])) load('m/app')->update( $app_id , array('title'=>$_POST['title']));

    if (isset($_POST['version']) || isset($_POST['module'])|| isset($_POST['users'])) {
      $data = array_merge($data,$_POST);
      $data = json_encode($data);
      load('m/app')->update( $app_id , array('data'=>$data));
      redirect(BASE.'bugtrace/sys','修改成功');
    }
    
    if ( isset($_POST['password']) || isset($_POST['password'])) {
      if(!load('m/user_m')->checkpwd($this->u['id'],$_POST['password']))redirect(BASE.'bugtrace/sys/','原密码错误');
      $this->m->truncate($app_id);
      redirect(BASE.'bugtrace/sys/','删除成功');
    }
    
    $param['users'] = $users = load('m/app')->users($app_id);
    
    if(sizeof($users)!=sizeof($data['users'])){
      foreach($users as $u){
        $uid = $u['id'];
        $uname = explode('@',$u['email']);
        if(!$data['users'][$uid]) $nu[$uid] = $uname[0];
        else $nu[$uid] = $data['users'][$uid];
      }
      $data['users'] = $nu;
      load('m/app')->update( $app_id , array('data'=>json_encode($data)));
    }
    $param['data'] = $data;
    $this->display('v/bug/sys',$param);
  }
  
  function help()
  {
    $this->display('v/bug/help',$param);    
  }
  
  function view($id)
  {
    global $app_id;
    $id = addslashes(trim($id));
    $param['r'] = $r = $this->m->get($id);
    if( $r['app_id']!=$app_id )redirect("/","对不起，您没有权限访问这个页面");
    
    $bugt = new bug_trace;
    if ($_POST['bugid']) {
      $_POST['post_time'] = time();
      $_POST['poster'] = $this->u['id'];
      $_POST['attached'] = json_encode($this->upload('attach'));
      $bugt->add();
      if($_POST['doer']) {
        $update['doer'] = $_POST['doer'];
      }
      else {
        $update['state'] = 1;
      }
      $update['update_time'] = time();
      $this->m->update($id,$update);
      redirect(BASE."bugtrace/view/$id/",'更新成功!');
    }
    
    $param['trace'] = $bugt->get(" and bugid=$id");
    $param['prio'] = $this->priority;
    $param['app'] = $app = $this->app;
    $param['data'] = json_decode($app['data'],true);
    $this->display('v/bug/show',$param);
  }

  function display($view,$param = array())
  {
    $param['al_content'] = view($view,$param,TRUE);
    $param['u'] = $this->u;
    $param['menu']  = $this->menu;
    header("Content-type: text/html; charset=utf-8");
    view('v/bug/template',$param);
  }

     
  function upload($name,$dir = 'upload/')
  {
    if(defined('SAE')){
      $s = new SaeStorage();
    }
        
    if(!$_FILES[$name]['name'][0] && !$_FILES[$name]['name'] )return false;
    if(is_array($_FILES[$name]['name'])){
      if(!$_FILES[$name]['name'][0])return false;

      $j = sizeof($_FILES[$name]['name']);
      for($i=0;$i<$j;$i++)
      {
        $file = $_FILES[$name];
        $nfile = $dir.time().'_'.$file['name'][$i];
        $nfile = str_replace('.php','_php.file',$nfile);
        if(defined('SAE')){
          $s->upload( 'upload',$nfile  , $file['tmp_name'][$i]);
          $nfile = $s->getUrl( 'upload' , $nfile);
        }
        else {
          copy($file['tmp_name'][$i],$nfile); 
          $nfile = $nfile;     
        }
        
        $ret[] = array(
          'file'=>$nfile,
          'title' =>$file['name'][$i]
        );
      }
    }
    else {
      if(!$_FILES[$name]['name'])return false;
      
      $file = $_FILES[$name];
      $nfile = $dir.time().'_'.$file['name'][$i];
      copy($file['tmp_name'],$nfile);
      $ret[] = array(
        'file'=>$nfile,
        'title' =>$file['name']
      );
    }
    return $ret;
  }
  
  
  function account()
  {
    $id = $this->u['id']; 
    // update password 
    $conf = array('password'=>'required|comparetopwd','repassword'=>'required');
    $err = validate($conf);
    if ( $err === TRUE) {
      if(!load('m/user_m')->checkpwd($id,$_POST['oldpassword']))redirect(BASE.'account/','原密码错误');
      $_POST['post_time'] = $_POST['update_time'] = time();
      load('m/user_m')->update_user($id);
      redirect('?/bugtrace/account/','修改成功');
    }
    else if ( isset($_POST['email']) || isset($_POST['username'])) {
      $_POST['post_time'] = $_POST['update_time'] = time();
      load('m/user_m')->update($id);
      redirect('?/bugtrace/account','修改成功');
    }
    else {
      $param['val'] = array_merge($_POST,load('m/user_m')->get($id)); 
      $param['err'] = $err;
      $this->display('v/bug/account',$param);
    } 
  }
}

function comparetopwd()
{
  if($_POST['password'] == $_POST['repassword']) return true;
  return '两次输入的密码不一致';
}
