<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
  }
  public function create($table, $data)
  {
    $this->db->insert($table, $data);
  }
  public function read($table)
  {
    $query=$this->db->get($table);//zapytanie
    return $query->result();//rezultat zwrócone dane poprzez return
  }
  public function get($table, $where)
  {
    $query=$this->db->get_where($table, $where);//zapytanie
    return $query->row();//row() jak pojedynczy wiersz
  }
  public function edit($table,$id,$id_v, $data)
  {
    $this->db->where($id, $id_v);
    $this->db->update($table, $data);
  }
  public function delete($table,$id_v,$id)
  {
    $this->db->where($id_v, $id);
    $this->db->delete($table);
  }
}
