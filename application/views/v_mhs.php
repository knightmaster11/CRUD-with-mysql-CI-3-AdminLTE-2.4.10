<!DOCTYPE html>
<html>
<head>
	<title>List Mahasiswa</title>
</head>
<body>
<table border="1px solid black">
	<tr>
		<td>Nim</td>
		<td>Mahasiswa Name</td>
		<td>Address</td>
	</tr>

<?php foreach ($mahasiswa as $mhs) : ?>
	<tr>
		<td><?php echo $mhs['nim']; ?></td>
		<td><?php echo $mhs['name']; ?></td>
		<td><?php echo $mhs['address']; ?></td>
	</tr>
<?php endforeach; ?>
</table>
</body>
</html>