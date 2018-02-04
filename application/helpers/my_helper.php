<?php
function refresh()
{
  $CI =& get_instance();//dodaje się to aby się dostać do CI
  return redirect($CI->uri->uri_string(),'refresh');//$CI zamiast this aby się dostać do CI
}
function vd($var)
{
  echo '<pre>';
  var_dump($var);
  echo '</pre>';
}
function logged_in()
{
  $CI =& get_instance();
  return $CI->session->userdata('logged_in');
}
