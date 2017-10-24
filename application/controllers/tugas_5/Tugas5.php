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
			<?php if($this->input->post('status') == "ya"):?>
			<input type="hidden" name="kd_barang[]" value="<?php echo $row->kd_barang?>" />
			<td><input type="text" name="harga[]" value="" /></td>
			<td><input type="text" name="jumlah[]" value="" /></td>
			<?php endif;?>
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
	
	public function transaksibeli()
	{
		$data['page'] = "tugas_5/transaksibeli";
		$this->load->view($this->template, $data);
	}
	
	public function simpanTransaksi()
	{
		$data["tgl_trans"] = $this->input->post('tgl_trans');
		$data["status"] = $this->input->post('status');
		$this->t5->addTrans($data);
		$data1["no_trans"] = $this->db->insert_id();
		$data1["kd_barang"] = $this->input->post('kd_barang');
		$data1["harga"] = $this->input->post('harga');
		$data1["stok"] = $this->input->post('jumlah');
		$this->t5->addDetTrans($data1);
		if($data["status"] == "beli"){
			redirect('tugas_5/tugas5/transaksibeli');
		}
	}
}
