<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tugas_2 extends CI_Model {

	var $data = array();
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$this->load->view('tugas_2/tugas2');
	}
	
	public function simpan($getdata)
	{
		$this->data = $this->session->flashdata('tempdata');
		array_push($this->data, $getdata);
		$this->session->set_flashdata('tempdata',$this->data);
	}
}
