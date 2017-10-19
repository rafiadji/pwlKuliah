<?php if($this->session->flashdata('udata')):?>
<form action="<?php echo site_url('tugas_2/tugas2/ubahcon')?>" method="post">
	<table>
		<tr><td>Kode Matakuliah</td><td>:</td><td><input type="text" name="KDMK" value="<?php echo $udata['kdmk']?>" disabled /></td></tr>
		<input type="hidden" name="KDMK" value="<?php echo $udata['kdmk']?>"/>
		<tr><td>Nama Matakuliah</td><td>:</td><td><input type="text" name="NAMAMK" value="<?php echo $udata['namamk']?>"/></td></tr>
		<tr><td>SKS</td><td>:</td><td><input type="text" name="SKS" value="<?php echo $udata['sks']?>"/></td></tr>
		<tr><td>Nilai Tugas</td><td>:</td><td><input type="text" name="NTGS" value="<?php echo $udata['ntgs']?>"/></td></tr>
		<tr><td>Nilai UTS</td><td>:</td><td><input type="text" name="NUTS" value="<?php echo $udata['nuts']?>"/></td></tr>
		<tr><td>Nilai UAS</td><td>:</td><td><input type="text" name="NUAS" value="<?php echo $udata['nuas']?>"/></td></tr>
		<tr><td><input type="submit" value="Ubah &#10004;"/></td></tr>
	</table>
</form>
<?php else:?>
<form action="<?php echo site_url('tugas_2/tugas2/simpan')?>" method="post">
	<table>
		<tr><td>Kode Matakuliah</td><td>:</td><td><input type="text" name="KDMK" value=""/></td></tr>
		<tr><td>Nama Matakuliah</td><td>:</td><td><input type="text" name="NAMAMK" value=""/></td></tr>
		<tr><td>SKS</td><td>:</td><td><input type="text" name="SKS" value=""/></td></tr>
		<tr><td>Nilai Tugas</td><td>:</td><td><input type="text" name="NTGS" value=""/></td></tr>
		<tr><td>Nilai UTS</td><td>:</td><td><input type="text" name="NUTS" value=""/></td></tr>
		<tr><td>Nilai UAS</td><td>:</td><td><input type="text" name="NUAS" value=""/></td></tr>
		<tr><td><input type="submit" value="Simpan &#10004;"/></td></tr>
	</table>
</form>
<?php endif;?>
<form action="<?php echo site_url('tugas_2/tugas2/hapus_terpilih')?>" method="post">
<table border="1">
	<tr>
		<th></th>
		<th>Kode MK</th>
		<th>Nama MK</th>
		<th>SKS</th>
		<th>Nilai</th>
		<th>Opsi</th>
	</tr>
	<?php $jumip = 0; $ip = 0; $sks = 0; foreach ($nilai as $row):?>
	<tr>
		<td><input type="checkbox" name="chapus[]" value="<?php echo $row["kdmk"]?>" /></td>
		<td><?php echo $row["kdmk"]?></td>
		<td><?php echo $row["namamk"]?></td>
		<td><?php echo $row["sks"]?></td>
		<td><?php echo $row["nilai"]?></td>
		<td>
			<a href="<?php echo site_url('tugas_2/tugas2/ubah/'.$row["kdmk"])?>">Ubah</a>
			<a href="<?php echo site_url('tugas_2/tugas2/hapus/'.$row["kdmk"])?>">Hapus</a>
		</td>
	</tr>
	<?php
		if ($row["nilai"] == "A") {
			$ip = 4;
		}
		elseif ($row["nilai"] == "B+") {
			$ip = 3.5;
		}
		elseif ($row["nilai"] == "B") {
			$ip = 3;
		}
		elseif ($row["nilai"] == "C+") {
			$ip = 2.5;
		}
		elseif ($row["nilai"] == "C") {
			$ip = 2;
		}
		elseif ($row["nilai"] == "D") {
			$ip = 1;
		}
		elseif ($row["nilai"] == "E") {
			$ip = 0;
		}
		$sks += $row["sks"];
		$jumip += $row["sks"] * $ip;
	?>
	<?php endforeach; if (!empty($jumip) && !empty($sks)): ?>
	<tr>
		<th colspan="3">IPK</th>
		<th colspan="3"><?php echo ($jumip/$sks)?></th>
	</tr>
	<?php endif;?>
</table>
<input type="submit" value="Hapus terpilih &#10004;"/>
</form>

