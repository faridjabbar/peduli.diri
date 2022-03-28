<!DOCTYPE html>
<html>
<head>
	<title>PDF PEDULI DIRI</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>PDF BUKAN SEMBARANG PDF</h4>
	</center>

	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>NIK</th>
				<th>Nama</th>
				<th>Email</th>
				<th>Alamat</th>
				<th>Telepon</th>
				<th>Username</th>
			</tr>
		</thead>
		<tbody>
			@foreach ( $user as $p)
			<tr>
				<td>{{ $p->nik }}</td>
				<td>{{ $p->name }}</td>
				<td>{{ $p->email }}</td>
				<td>{{ $p->alamat }}</td>
				<td>{{ $p->telp }}</td>
				<td>{{ $p->username }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>