<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tugas2 extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Tugas_2','t2');
	}
	
	public function index()
	{
		if($this->session->flashdata('udata')){
			$data['udata'] = $this->session->flashdata('udata');
			$data['nilai'] = $this->session->flashdata('tempdata');
			$this->session->set_flashdata('udata', $data['udata']);
			$this->session->set_flashdata('tempdata', $data['nilai']);
		}
		elseif($this->session->flashdata('tempdata')){
			$data['nilai'] = $this->session->flashdata('tempdata');
			$this->session->set_flashdata('tempdata', $data['nilai']);
		}
		else {
			$data['nilai'] = array();
			$this->session->set_flashdata('tempdata', $data['nilai']);
		}
		$this->load->view('tugas_2/tugas2', $data);
		
	}
	
	public function simpan()
	{
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
		$this->t2->simpan($dataarr);
		redirect('tugas_2/tugas2');
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
