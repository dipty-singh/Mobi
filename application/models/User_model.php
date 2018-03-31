<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function get_all($table)
	{
		$this->db->select('*');
		$this->db->from($table);
		$query = $this->db->get();
		return $query->result();
	}
	public function get_row($table,$cond)
	{
		$this->db->select('*');
		$this->db->where($cond);
		$this->db->from($table);
		$query = $this->db->get();
		return $query->row();
	}
	public function get_result($table,$cond)
	{
		$this->db->select('*');
		$this->db->where($cond);
		$this->db->from($table);
		$query = $this->db->get();
		return $query->result();
	}
	public function add($table,$data){
		$query = $this->db->insert($table,$data);
		return $this->db->affected_rows();
	}
}
