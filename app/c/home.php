<?php
class home extends base{
  function __construct()
  {
  }
  
  function index()
  {
    header("location:?/bugtrace/");
  }
}
