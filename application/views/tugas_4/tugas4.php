<script src="<?php echo base_url();?>jquery.min.js"></script>
<form action="<?php echo site_url('tugas_4/tugas4/simpan')?>" method="post">
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
<select class="persmt">
	<option value="per">Per Semester</option>
	<option value="tot">Total Semester</option>
</select>
<select class="smt">
	<option value="Ganjil 2015">Ganjil 2015</option>
	<option value="Genap 2016">Genap 2016</option>
	<option value="Ganjil 2016">Ganjil 2016</option>
	<option value="Genap 2017">Genap 2017</option>
	<option value="Ganjil 2017" selected>Ganjil 2017</option>
	<option value="Genap 2018">Genap 2018</option>
	<option value="Ganjil 2018">Ganjil 2018</option>
	<option value="Genap 2019">Genap 2019</option>
</select>
<table border="1">
	<thead>
		<tr>
			<th>Kode MK</th>
			<th>Nama MK</th>
			<th>SKS</th>
			<th>Nilai</th>
		</tr>
	</thead>
	<tbody class="isi">
		
	</tbody>
</table>
<script>
	var persmt = $('.persmt').val();
	var smt = $('.smt').val();
	$(document).ready(function(){
		$.ajax({
			type:"POST",
			url:"<?php echo site_url('tugas_4/tugas4/dapatData')?>",
			data:"persmt="+persmt+"&smt="+smt,
			success:function(msg){
				$('.isi').html(msg);
			}
		})
		
		$('.persmt').change(function(){
			var persmt = $('.persmt').val();
			var smt = $('.smt').val();
			$.ajax({
				type:"POST",
				url:"<?php echo site_url('tugas_4/tugas4/dapatData')?>",
				data:"persmt="+persmt+"&smt="+smt,
				success:function(msg){
					$('.isi').html(msg);
				}
			})
		})
		
		$('.smt').change(function(){
			var persmt = $('.persmt').val();
			var smt = $('.smt').val();
			$.ajax({
				type:"POST",
				url:"<?php echo site_url('tugas_4/tugas4/dapatData')?>",
				data:"persmt="+persmt+"&smt="+smt,
				success:function(msg){
					$('.isi').html(msg);
				}
			})
		})
	})
</script>