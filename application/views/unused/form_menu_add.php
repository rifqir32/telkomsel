<html>
	<head>
		<title>Admin</title>
	</head>
	<body>
		<form method="POST" action="<?php echo base_url()."index.php/menu_add/do_insert"; ?>">
		<table>
			<tr>
				<td>
					nama makanan:
				</td>
				<td>
					<input type="text" name="nama_makanan" />
				</td>
			</tr>
			<tr>
				<td>
					deskripsi makanan:
				</td>
				<td>
					<textarea name="deskripsi_makanan"></textarea>
				</td>
			</tr>
			<tr>
				<td>
					gambar makanan:
				</td>
				<td>
					<input type="text" name="gambar_makanan" />
				</td>
			</tr>
			<tr>
				<td>
					kategori makanan:
				</td>
				<td>
					<!-- <input type="text" name="kategori_makanan" /> -->
					<select name="kategori_makanan">
						<option value="appetizer">Appetizer</option>
						<option value="main course">Main Course</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>
				</td>
				<td>
					<button type="submit">Simpan</button>
				</td>
			</tr>
		</table>
		</form>
	</body>
</html>