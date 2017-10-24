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
	
	public function addTrans($data)
	{
		return $this->db->insert('transaksi',$data);
	}
	
	public function addDetTrans($data)
	{
		$jum = count($data["kd_barang"]);
		for ($i=0; $i < $jum ; $i++) {
			if(!empty($data["harga"][$i]) && !empty($data["stok"][$i])){
				$data1["no_trans"] = $data["no_trans"];
				$data1["kd_barang"] = $data["kd_barang"][$i]; 
				$data1["harga"] = $data["harga"][$i]; 
				$data1["stok"] = $data["stok"][$i]; 
				$data1["subtotal"] = $data1["harga"] * $data1["stok"]; 
				$this->db->insert('det_transaksi',$data1);
			}
		}
	}
}
