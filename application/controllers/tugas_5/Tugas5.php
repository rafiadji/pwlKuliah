<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tugas5 extends CI_Controller {

	var $template = "tugas_5/tugas5";
	 
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Tugas_5','t5');
	}
	
	public function index()
	{
		$data['page'] = "tugas_5/dash";
		$this->load->view($this->template, $data);
	}
	
	public function dapatData()
	{
		$brg = $this->t5->getBarang();
		foreach($brg as $row):?>
		<tr>
			<td><?php echo $row->kd_barang?></td>
			<td><?php echo $row->nm_barang?></td>
		</tr>
		<?php endforeach;
	}
	
	public function barang()
	{
		$data['page'] = "tugas_5/barang";
		$this->load->view($this->template, $data);
	}
	
	public function simpanBarang()
	{
		$data["kd_barang"] = $this->input->post('kd_barang');
		$data["nm_barang"] = $this->input->post('nm_barang');
		$this->t5->addBarang($data);
		redirect('tugas_5/tugas5/barang');
	}
}
