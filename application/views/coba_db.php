<script src="<?php echo base_url();?>jquery.min.js"></script>
Kode Barang : <input type="text" name="kd_barang" value="" /> <br>
Nama Barang : <input type="text" name="kd_barang" value="" />
Jenis Kelamin : 
<select class="jk">
	<option value="all">Semua</option>	
	<option value="laki-laki">Laki-Laki</option>	
	<option value="perempuan">Perempuan</option>	
</select>
Order By : 
<select class="order">
	<option value="ASC">ASC</option>	
	<option value="DESC">DESC</option>	
	<option value="RAND">RAND</option>	
</select>
<table border="1">
	<thead>
		<tr>
			<th>ID</th>
			<th>NRP</th>
			<th>Nama</th>
			<th>Jenis Kelamin</th>
		</tr>
	</thead>
	<tbody class="isi">
		
	</tbody>
</table>
<script>
	var jk = $('.jk').val();
	var order = $('.order').val();
	$(document).ready(function(){
		$.ajax({
			type:"POST",
			url:"<?php echo site_url('cobadb/dapatData')?>",
			data:"jk="+jk+"&order="+order,
			success:function(msg){
				$('.isi').html(msg);
			}
		})
		
		$('.jk').change(function(){
			var jk = $('.jk').val();
			var order = $('.order').val();
			$.ajax({
				type:"POST",
				url:"<?php echo site_url('cobadb/dapatData')?>",
				data:"jk="+jk+"&order="+order,
				success:function(msg){
					$('.isi').html(msg);
				}
			})	
		})
		
		$('.order').change(function(){
			var jk = $('.jk').val();
			var order = $('.order').val();
			$.ajax({
				type:"POST",
				url:"<?php echo site_url('cobadb/dapatData')?>",
				data:"jk="+jk+"&order="+order,
				success:function(msg){
					$('.isi').html(msg);
				}
			})	
		})
	})
</script>