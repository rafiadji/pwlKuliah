<form action="<?php echo site_url('tugas_5/tugas5/simpanBarang')?>" method="post">
	<table>
		<tr><td>Kode Barang</td><td>:</td><td><input type="text" name="kd_barang" value=""/></td></tr>
		<tr><td>Nama Barang</td><td>:</td><td><input type="text" name="nm_barang" value=""/></td></tr>
		<tr><td><input type="submit" value="Simpan &#10004;"/></td></tr>
	</table>
</form>
<table border="1">
	<thead>
		<tr>
			<th>Kode Barang</th>
			<th>Nama Barang</th>
		</tr>
	</thead>
	<tbody class="isi">
		
	</tbody>
</table>
<script>
	$(document).ready(function(){
		$.ajax({
			type:"POST",
			url:"<?php echo site_url('tugas_5/tugas5/dapatData')?>",
			success:function(msg){
				$('.isi').html(msg);
			}
		})
	})
</script>