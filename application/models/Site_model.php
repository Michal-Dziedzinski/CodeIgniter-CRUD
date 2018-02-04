<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
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
  public function get_result($table, $where)
  {
    $query=$this->db->get_where($table, $where);
    return $query->result();
  }
  public function create($table, $data)
  {
    $this->db->insert($table, $data);
  }
  public function count($table)
	{
		return $this->db->count_all($table);
  }
  
  public function fetch_posts($table, $limit, $start)
	{
		$this->db->limit($limit, $start);
		// $this->db->order_by($what, $sort);
		$query = $this->db->get($table);

		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row)
			{
				$data[] = $row;
			}
			return $data;
		}
		return false;
	}

}
