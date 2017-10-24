<form action="<?php echo site_url('tugas_5/tugas5/simpanTransaksi')?>" method="post">
	<input type="hidden" name="status" value="beli" />
	<table>
		<tr><td>Tanggal Transaksi</td><td>:</td><td><input type="date" name="tgl_trans" value=""/></td></tr>
	</table>
	<table border="1">
		<thead>
			<tr>
				<th>Kode Barang</th>
				<th>Nama Barang</th>
				<th>Harga Barang</th>
				<th>Jumlah</th>
			</tr>
		</thead>
		<tbody class="isi">
			
		</tbody>
	</table>
	<input type="submit" value="Proses &#10004;"/>
</form>
<script>
	$(document).ready(function(){
		$.ajax({
			type:"POST",
			url:"<?php echo site_url('tugas_5/tugas5/dapatData')?>",
			data:"status=ya",
			success:function(msg){
				$('.isi').html(msg);
			}
		})
	})
</script>