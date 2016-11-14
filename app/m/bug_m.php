<?php
class bug_m extends m {
  function __construct()
  {
    global $app_id;
    parent::__construct();
    $this->table = 'bug';
    $this->fields = array( 'title' ,'app_id', 'priority','version' , 'module' , 'content' ,
     'poster' , 'doer' , 'post_time' , 'update_time' , 'state');
  }
   
  function truncate($id)
  {
    $this->db->query("delete from bug_trace where bugid in (select id from bug where app_id = $id)");
    $this->db->query("delete from bug where app_id = $id");
  }
}


class bug_trace extends m {
  function __construct()
  {
    global $app_id;
    parent::__construct();
    $this->table = 'bug_trace';
    $this->fields = array('bugid' ,'poster' ,'doer' ,'post_time' ,'content','attached');
  }
}
