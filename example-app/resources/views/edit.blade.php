<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> <!-- Ini merupakan untuk menghubungkan css online-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tutorial Membuat CRUD Pada Laravel</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2><a href="https://www.malasngoding.com" >www.dfsdfsg.com</a></h2>
				<h3>Edit Pegawai</h3>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<a href="/pegawai" class="btn btn-secondary">Kembali</a>
			</div>
		</div>
		<br/>
		@foreach($pegawai as $p)
		<div class="row">
			<div class="col-md-6 col-md-offset-3" style="box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); padding: 20px; border-radius: 10px; background-color: #f9f9f9;">
				<form action="/pegawai/update" method="post" class="form-horizontal">
					{{ csrf_field() }}
					<input type="hidden" name="id" value="{{ $p->pegawai_id }}">
					<div class="form-group">
						<label for="nama" class="col-md-2 control-label" style="bo">Nama</label>
						<div class="col-md-10">
							<input type="text" required="required" name="nama" value="{{ $p->pegawai_nama }}" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label for="jabatan" class="col-md-2 control-label">Jabatan</label>
						<div class="col-md-10">
							<input type="text" required="required" name="jabatan" value="{{ $p->pegawai_jabatan }}" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label for="umur" class="col-md-2 control-label">Umur</label>
						<div class="col-md-10">
							<input type="number" required="required" name="umur" value="{{ $p->pegawai_umur }}" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label for="alamat" class="col-md-2 control-label">Alamat</label>
						<div class="col-md-10">
							<textarea required="required" name="alamat" class="form-control">{{ $p->pegawai_alamat }}</textarea>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-10 col-md-offset-2">
							<input type="submit" value="Simpan Data" class="btn btn-primary">
						</div>
					</div>
				</form>
			</div>
		</div>
		@endforeach
	</div>
</body>
</html>