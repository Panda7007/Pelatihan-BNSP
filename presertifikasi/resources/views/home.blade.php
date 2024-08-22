<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perpustakaan Digital</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylescheet" href="{ asset('/assets/css/bootstrap.min.css)}">

    <meta name="robots" content="noindex, follow">

    <style>
    
        input[type="text"], input[type="date"], input[type="password"] {
            width: 100%;
            height: 40px;
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
        }
    
        button[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    
        button[type="submit"]:hover {
            background-color: #3e8e41;
        }
    </style>
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Perpustakaan Digital</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#peminjaman">Peminjaman Buku</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#login">Login Admin</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container mt-4">
            <h1>Selamat Datang di Perpustakaan Digital</h1>
            <p>Temukan berbagai buku menarik di sini.</p>

            <div class="row mt-3">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Judul</th>
                            <th scope="col">Penulis</th>
                            <th scope="col">Abstrak</th>
                            <th scope="col">Stok</th>
                            <th scope="col">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($buku as $p)
                        <tr>
                            <td>{{ $p->judul_buku }}</td>
                            <td>{{ $p->penulis }}</td>
                            <td>{{ $p->abstrak }}</td>
                            <td>{{ $p->stok }}</td>
                            <td>
                                <a href="/pegawai/edit/{{ $p->id_buku }}" class="btn btn-sm btn-primary">Edit</a>
                                <a href="/pegawai/hapus/{{ $p->id_buku }}" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <h2>Buku yang dalam proses</h2>
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Urutan Pengajuan</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Judul Buku</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($peminjam as $p)
                    @if($p->status != 'Selesai')
                        <tr>
                            <td>{{ $p->id_peminjaman }}</td>
                            <td>{{ $p->nama }}</td>
                            <td>{{ $p->judul_buku }}</td>
                            <td>{{ $p->tanggal }}</td>
                            <td>{{ $p->status }}</td>
                        </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="container mt-5" id="peminjaman">
            <h2>Formulir Peminjaman Buku</h2>
            <form action="/buku/pinjam" method="POST">
                <div class="form-group">
                    <label for="book_title" class="col-sm-4 control-label">Judul Buku:</label>
                    <div class="col-sm-10">
                        <select id="book_title" name="book_title" class="form-control">
                            @if(count($buku) > 0)
                                @foreach($buku as $p)
                                    @if($p->stok > 0)
                                        <option value="{{ $p->id_buku }}">{{ $p->judul_buku }}</option>
                                    @endif
                                @endforeach
                            @else
                                <option value="">Tidak ada buku</option>
                            @endif
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="borrower_name" class="col-sm-4 control-label">Nama Peminjam:</label>
                    <div class="col-sm-10">
                        <input type="text" id="borrower_name" name="borrower_name" class="form-control" placeholder="Masukkan nama peminjam">
                    </div>
                </div>
                <div class="form-group">
                    <label for="borrower_name" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" id="borrower_email" name="email" class="form-control" placeholder="Admin@gmail.com">
                    </div>
                </div>
                <div class="form-group">
                    <label for="borrow_date" class="col-sm-4 control-label">Tanggal Peminjaman:</label>
                    <div class="col-sm-10">
                        <input type="date" id="borrow_date" name="borrow_date" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary">Pinjam Buku</button>
                    </div>
                </div>
            </form>
        </div>
        
        <div class="container mt-5" id="login">
            <h2>Login Admin</h2>
            <form>
                <!-- form fields for admin login form -->
                <label for="username">Username:</label>
                <input type="text" id="username" name="username"><br><br>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password"><br><br>
                <button type="submit">Login</button>
            </form>
        </div>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>