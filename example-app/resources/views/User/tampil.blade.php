<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"> <!-- Ini merupakan untuk menghubungkan css online-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bootstrap demo</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h2 class="text-center mb-4">Bismillah belajar ngoding</h2>
        <h3 class="text-center mb-4">Data Pegawai</h3>
		<a href="/logoutaksi" class="btn btn-primary mb-4">Keluar</a>
        <a href="/pegawai/tambah" class="btn btn-primary mb-4">+ Tambah Pegawai Baru</a>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Nama</th>
                    <th scope="col">Jabatan</th>
                    <th scope="col">Password</th>
                    <th scope="col">Akses</th>
                    <th scope="col">Opsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($user as $p)
                <tr>
                    <td>{{ $p->name }}</td>
                    <td>{{ $p->email }}</td>
                    <td>{{ $p->password }}</td>
                    <td>{{ $p->akses }}</td>
                    <td>
                        <a href="/pegawai/edit/{{ $p->id }}" class="btn btn-sm btn-primary">Edit</a>
                        <a href="/pegawai/hapus/{{ $p->id }}" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>