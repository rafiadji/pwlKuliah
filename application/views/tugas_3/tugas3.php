<form action="<?php echo site_url('tugas_3/tugas3/simpan')?>" method="post">
	<table>
		<tr><td>Tahun</td><td>:</td><td><input type="text" name="THN" value=""/></td></tr>
		<tr><td>Semester</td><td>:</td><td><select name="SMT"><option value="ganjil">Ganjil</option><option value="genap">Genap</option></select></td></tr>
		<tr><td>Kode Matakuliah</td><td>:</td><td><input type="text" name="KDMK" value=""/></td></tr>
		<tr><td>Nama Matakuliah</td><td>:</td><td><input type="text" name="NAMAMK" value=""/></td></tr>
		<tr><td>SKS</td><td>:</td><td><input type="text" name="SKS" value=""/></td></tr>
		<tr><td>Nilai Tugas</td><td>:</td><td><input type="text" name="NTGS" value=""/></td></tr>
		<tr><td>Nilai UTS</td><td>:</td><td><input type="text" name="NUTS" value=""/></td></tr>
		<tr><td>Nilai UAS</td><td>:</td><td><input type="text" name="NUAS" value=""/></td></tr>
		<tr><td><input type="submit" value="Simpan &#10004;"/></td></tr>
	</table>
</form>
<?php for($i = 1; $i <= 8; $i++):
	echo "Semester ".$i;
	$smt = 0;
	$thn_msk = 2015;
	?>

<table border="1">
	<tr>
		<th>Kode MK</th>
		<th>Nama MK</th>
		<th>SKS</th>
		<th>Nilai</th>
	</tr>
	<?php foreach ($nilai as $row):
			if($row->thn == $thn_msk){
				if($row->smt == "ganjil"){
					$smt = 1;
				}
			}
			elseif (($row->thn-1) == $thn_msk){
				if($row->smt == "genap"){
					$smt = 2;
				}else{
					$smt = 3;
				}
			}
			elseif (($row->thn-2) == $thn_msk){
				if($row->smt == "genap"){
					$smt = 4;
				}else{
					$smt = 5;
				}
			}
			elseif (($row->thn-3) == $thn_msk){
				if($row->smt == "genap"){
					$smt = 6;
				}else{
					$smt = 7;
				}
			}
			elseif (($row->thn-4) == $thn_msk){
				if($row->smt == "genap"){
					$smt = 8;
				}
			}
		if($smt == $i):
		?>
	<tr>
		<td><?php echo $row->kdmk?></td>
		<td><?php echo $row->namamk?></td>
		<td><?php echo $row->sks?></td>
		<td><?php echo $row->nilai?></td>
	</tr>
	<?php endif; endforeach;?>
	<tr>
		<th colspan="2">IPS</th>
		<th colspan="2"><?php echo $ips[$i]?></th>
	</tr>
</table>
<?php endfor;?>