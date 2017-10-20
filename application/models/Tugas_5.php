<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tugas_5 extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
	
	public function getBarang()
	{
		$q = $this->db->query("SELECT * FROM barang");
		return $q->result();
	}
	
	public function addBarang($data)
	{
		return $this->db->insert('barang',$data);
	}
}
