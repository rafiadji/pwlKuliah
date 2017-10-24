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