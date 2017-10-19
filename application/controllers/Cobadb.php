<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cobadb extends CI_Controller {

	public function index()
	{
		$this->load->view('coba_db');
	}
	
	public function dapatData()
	{
		$jk = $this->input->post('jk');
		$order = $this->input->post('order');
		
		if($jk == "laki-laki"){
			$jk = "where JK = 'L'";
		}
		elseif($jk == "perempuan"){
			$jk = "where JK = 'P'";
		}
		else{
			$jk = "";
		}
		
		if($order == "DESC"){
			$order = "ORDER BY NAMA DESC";
		}
		elseif($order == "ASC"){
			$order = "ORDER BY NAMA ASC";
		}
		elseif($order == "RAND"){
			$order = "ORDER BY RAND()";
		}
		else{
			$order = "";
		}
		$q = $this->db->query('SELECT * FROM mahasiswa '.$jk.' '.$order);
		foreach($q->result() as $row):?>
		<tr>
			<td><?php echo $row->ID?></td>
			<td><?php echo $row->NRP?></td>
			<td><?php echo $row->NAMA?></td>
			<td><?php echo $row->JK?></td>
		</tr>	
		<?php endforeach;?>
		<tr>
			<td colspan="4">Jumlah Record : <?php echo $q->num_rows()?></td>
		</tr>
		<?php
	}
}
