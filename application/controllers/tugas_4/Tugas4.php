<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tugas4 extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Tugas_4','t4');
	}
	
	public function index()
	{
		$this->load->view('tugas_4/tugas4');		
	}
	
	public function simpan()
	{
		$data['thn'] = $this->input->post('THN');
		$data['smt'] = $this->input->post('SMT');
		$data['kdmk'] = $this->input->post('KDMK');
		$data['namamk'] = $this->input->post('NAMAMK');
		$data['sks'] = $this->input->post('SKS');
		$data['ntgs'] = $this->input->post('NTGS');
		$data['nuts'] = $this->input->post('NUTS');
		$data['nuas'] = $this->input->post('NUAS');
		$data['nilai'] = $this->t4->grade($data['ntgs'], $data['nuts'], $data['nuas']);
		if($this->t4->addPenilaian($data)){
			redirect('tugas_4/tugas4');
		}
	}
	
	public function dapatData()
	{
		$persmt = $this->input->post('persmt');
		$smt = $this->input->post('smt');
		$nilai = $this->t4->getPenilaian($smt);
		foreach($nilai as $row):?>
		<tr>
			<td><?php echo $row->kdmk?></td>
			<td><?php echo $row->namamk?></td>
			<td><?php echo $row->sks?></td>
			<td><?php echo $row->nilai?></td>
		</tr>
		<?php endforeach;
	}
}
