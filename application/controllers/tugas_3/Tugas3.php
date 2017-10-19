<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tugas3 extends CI_Controller {

	var $alldata = array();
	var $path = "";
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Tugas_3','t3');
		$this->load->helper('file');
		$this->path = FCPATH.'assets/data.json';
	}
	
	public function index()
	{
		$this->alldata = json_decode(read_file($this->path));
		$data['ips'] = $this->t3->ipk($this->alldata);
		$data['nilai'] =  $this->alldata;
		
		$this->load->view('tugas_3/tugas3', $data);
		
	}
	
	public function simpan()
	{
		$this->alldata = json_decode(read_file($this->path));
		$arrdata['thn'] = $this->input->post('THN');
		$arrdata['smt'] = $this->input->post('SMT');
		$arrdata['kdmk'] = $this->input->post('KDMK');
		$arrdata['namamk'] = $this->input->post('NAMAMK');
		$arrdata['sks'] = $this->input->post('SKS');
		$arrdata['ntgs'] = $this->input->post('NTGS');
		$arrdata['nuts'] = $this->input->post('NUTS');
		$arrdata['nuas'] = $this->input->post('NUAS');
		$arrdata['nilai'] = $this->t3->grade($arrdata['ntgs'], $arrdata['nuts'], $arrdata['nuas']);
		array_push($this->alldata, $arrdata);
		if (!write_file($this->path, json_encode($this->alldata), 'r+'))
		{
			echo 'Unable to write the file';
		}
		else
		{
			echo 'File written!';
			redirect('tugas_3/tugas3');
		}
	}
	
	public function ubah($id)
	{
		if($this->session->flashdata('tempdata')){
			$arrdata = $this->session->flashdata('tempdata');
			$arrkey = array_search($id, array_column($arrdata, "kdmk"));
			$this->session->set_flashdata('tempdata', $arrdata);
			$this->session->set_flashdata('udata', $arrdata[$arrkey]);
			redirect('tugas_2/tugas2');
		}
	}
	
	public function ubahcon()
	{
		if($this->session->flashdata('tempdata')){
			$arrdata = $this->session->flashdata('tempdata');
			$arrkey = array_search($id, array_column($arrdata, "kdmk"));
			$dataarr['kdmk'] = $this->input->post('KDMK');
			$dataarr['namamk'] = $this->input->post('NAMAMK');
			$dataarr['sks'] = $this->input->post('SKS');
			$dataarr['ntgs'] = $this->input->post('NTGS');
			$dataarr['nuts'] = $this->input->post('NUTS');
			$dataarr['nuas'] = $this->input->post('NUAS');
			$tgs = ($this->input->post('NTGS')*20)/100;
			$uts = ($this->input->post('NUTS')*30)/100;
			$uas = ($this->input->post('NUAS')*50)/100;
			$total = $tgs + $uts + $uas;
			if ($total >= 85) {
				$akhir = "A";
			}
			elseif ($total >= 75) {
				$akhir = "B+";
			}
			elseif ($total >= 70) {
				$akhir = "B";
			}
			elseif ($total >= 65) {
				$akhir = "C+";
			}
			elseif ($total >= 60) {
				$akhir = "C";
			}
			elseif ($total >= 55) {
				$akhir = "D";
			}
			else{
				$akhir = "E";
			}
			$dataarr['nilai'] = $akhir;
			$arrdata[$arrkey] = $dataarr;
			$this->session->set_flashdata('tempdata', $arrdata);
			redirect('tugas_2/tugas2');
		}
	}
	
	public function hapus($id)
	{
		if($this->session->flashdata('tempdata')){
			$arrdata = $this->session->flashdata('tempdata');
			$arrkey = array_search($id, array_column($arrdata, "kdmk"));
			unset($arrdata[$arrkey]);
			$this->session->set_flashdata('tempdata', $arrdata);
			redirect('tugas_2/tugas2');
		}
	}
	
	public function hapus_terpilih()
	{
		$arrdata = $this->session->flashdata('tempdata');
		$this->session->set_flashdata('tempdata', $arrdata);
		$data_cek = $this->input->post('chapus');
		for ($i=0; $i < count($data_cek); $i++) { 
			$arrdata = $this->session->flashdata('tempdata');
			$arrkey = array_search($data_cek[$i], array_column($arrdata, "kdmk"));
			unset($arrdata[$arrkey]);
		}
		$this->session->set_flashdata('tempdata', $arrdata);
	}
}
