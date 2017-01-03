<html>
	<head>
		<title>Home | Gardenia</title>
	</head>
	<body>
	<table border="1" style="border-collapse:collapse">
		<tr style="background:grey">
			<th>nama_makanan</th>
			<th>desc_makanan</th>
			<th>pict_makanan</th>
			<th>kategori_makanan</th>
		</tr>
		<?php foreach ($data as $d) { ?>
		<tr>
			<td><?php echo $d['nama_makanan']; ?></td>
			<td><?php echo $d['desc_makanan']; ?></td>
			<td><img src="<?php echo base_url("/assets/image/gallery/$d[pict_makanan]");?>" /></td>
			<td><?php echo $d['kategori_makanan']; ?></td>
		</tr>
		<?php } ?>
	</table>

	<h1>Main Course</h1>
	<table border="1" style="border-collapse:collapse">
		<tr style="background:grey">
			<th>nama_makanan</th>
			<th>desc_makanan</th>
			<!-- <th>pict_makanan</th> -->
			<th>kategori_makanan</th>
		</tr>
		<?php foreach ($data as $d) { ?>
			<?php if ($d['kategori_makanan'] == "appetizer") { ?>
				<tr>
					<td><?php echo $d['nama_makanan']; ?></td>
					<td><?php echo $d['desc_makanan']; ?></td>
					<!-- <td><img src="<?php echo base_url("/assets/image/gallery/$d[pict_makanan]");?>" /></td> -->
					<td><?php echo $d['kategori_makanan']; ?></td>
				</tr>
			<?php } ?>
		<?php } ?>
	</table>
	<table border="1" style="border-collapse:collapse">
		<tr style="background:grey">
			<!-- <th>nama_makanan</th>
			<th>desc_makanan</th> -->
			<th>pict_makanan</th>
			<!-- <th>kategori_makanan</th> -->
		</tr>
		<?php foreach ($data as $d) { ?>
			<?php if ($d['kategori_makanan'] == "appetizer") { ?>
				<tr>
					<!-- <td><?php echo $d['nama_makanan']; ?></td>
					<td><?php echo $d['desc_makanan']; ?></td> -->
					<td><img src="<?php echo base_url("/assets/image/gallery/$d[pict_makanan]");?>" /></td>
					<!-- <td><?php echo $d['kategori_makanan']; ?></td> -->
				</tr>
			<?php } ?>
		<?php } ?>
	</table>
	</body>
</html>