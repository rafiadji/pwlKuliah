<html>
	<head>
		<title>Tugas 5</title>
		<script src="<?php echo base_url();?>jquery.min.js"></script>
	</head>
	<body>
		<div>
			Menu : 
				<a href="<?php echo site_url('tugas_5/tugas5/barang')?>">Barang</a> |
				<a href="#">Transaksi</a>
		</div>
		<div>
			<?php $this->load->view(@$page);?>
		</div>
	</body>
</html>

