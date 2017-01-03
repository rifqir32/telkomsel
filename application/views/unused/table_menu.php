<html>
	<head>
		<title>Admin</title>
	</head>
	<body>
		<table border="1" style="border-collapse:collapse">
		<tr style="background:grey">
			<th>nama_makanan</th>
			<th>desc_makanan</th>
			<th>pict_makanan</th>
			<th>kategori_makanan</th>
			<th>action</th>
		</tr>
		<?php foreach ($data as $d) { ?>
		<tr>
			<td><?php echo $d['nama_makanan']; ?></td>
			<td><?php echo $d['desc_makanan']; ?></td>
			<td><img src="<?php echo base_url("/assets/image/gallery/$d[pict_makanan]");?>" /></td>
			<td><?php echo $d['kategori_makanan']; ?></td>
			<td>
				<a href="<?php echo base_url()."index.php/menu_update_delete/edit_menu/".$d['id_menu']; ?>">Edit</a>
				<a href="<?php echo base_url()."index.php/menu_update_delete/do_delete/".$d['id_menu']; ?>">Delete</a>
			</td>
		</tr>
		<?php } ?>
	</table>
	<!-- <a href="<?php echo base_url()."index.php/crud/add_data"; ?>">Update Data</a> -->
	</body>
</html>