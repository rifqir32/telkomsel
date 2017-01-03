<html>
	<head>
		<title>Menu | Gardenia</title>
	</head>
	<body>
	<table border="1" style="border-collapse:collapse">
		<tr style="background:grey">
			<th>nama_makanan</th>
			<th>desc_makanan</th>
			<th>pict_makanan</th>
		</tr>
		<?php foreach ($data as $d) { ?>
		<tr>
			<td><?php echo $d['nama_makanan']; ?></td>
			<td><?php echo $d['desc_makanan']; ?></td>
			<td><img src="<?php echo base_url('assets/image/gallery/01.jpg');?>" /></td>
		</tr>
		<?php } ?>
	</table>
	</body>
</html>