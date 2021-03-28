<?php
include 'functions.php';
$mahasiswa = query("SELECT*FROM datamhs");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>

<body>
    <h1 class="float-left">Data Mahasiswa</h1>
    <br>
    <a href="tambah.php" class="btn btn-primary float-right" role="button" data-toggle="modal" data-target="#modalTambah">+ &nbsp; Tambah Data</a>
    <br>
    <table class="table table-striped table-bordered table-hover table-sm">
        <thead class="thead-dark">
            <tr>
                <th>No.</th>
                <th>Foto</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Agama</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>No HP</th>
                <th>Email</th>
                <th>Jurusan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($mahasiswa as $row) : ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><img src="img/<?= $row["foto"] ?>" width="50px"></td>
                    <td><?= $row["nim"] ?></td>
                    <td><?= $row["nama_mahasiswa"] ?></td>
                    <td><?= $row["tempat_lahir"] ?></td>
                    <td><?= $row["tgl_lahir"] ?></td>
                    <td><?= $row["agama"] ?></td>
                    <td><?= $row["jenis_kelamin"] ?></td>
                    <td><?= $row["alamat"] ?></td>
                    <td><?= $row["no_hp"] ?></td>
                    <td><?= $row["email"] ?></td>
                    <td><?= $row["jurusan"] ?></td>
                    <td>
                        <a class="btn btn-warning btn-sm" href="ubah.php?id_mahasiswa=<?= $row["id_mahasiswa"]; ?>">Ubah</a> <br> <br>
                        <a class="btn btn-danger btn-sm" href="hapus.php?id_mahasiswa=<?= $row["id_mahasiswa"]; ?>" onclick="return confirm('Anda yakin ingin menghapus data ini?');">Hapus</a>
                    </td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="modal" id="modalTambah" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title">Tambah Data Mahasiswa</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nim">NIM</label>
                            <input type="text" name="nim" id="nim" required class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="nama_mahasiswa">Nama</label>
                            <input type="text" name="nama_mahasiswa" id="nama_mahasiswa" required class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" id="tempat_lahir" required class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="tgl_lahir">Tanggal Lahir</label>
                            <input type="date" name="tgl_lahir" id="tgl_lahir" required class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="agama">Agama</label>
                            <select name="agama" id="agama" class="form-control">
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Katodivk">Katolik</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Budha">Budha</option>
                                <option value="Konghucu">Konghucu</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin" class="form-check-label">Jenis Kelamin</label>
                            <div class="form-check">
                                <input type="radio" name="jenis_kelamin" id="laki-laki" value="Laki-laki" checked class="form-check-input">
                                <label for="laki-laki" class="form-check-label">Laki-laki</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" name="jenis_kelamin" id="perempuan" value="Perempuan" class="form-check-input">
                                <label for="perempuan" class="form-check-label">Perempuan</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" id="alamat" required class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="no_hp">No. Handphone</label>
                            <input type="text" name="no_hp" id="no_hp" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="jurusan">Jurusan</label>
                            <select name="jurusan" id="jurusan" class="form-control">
                                <option value="Teknik Sipil">Teknik Sipil</option>
                                <option value="Teknik Mesin">Teknik Mesin</option>
                                <option value="Teknik Kimia">Teknik Kimia</option>
                                <option value="Teknik Elektro">Teknik Elektro</option>
                                <option value="Akuntansi">Akuntansi</option>
                                <option value="Administrasi Bisnis">Administrasi Bisnis</option>
                                <option value="Teknik Komputer">Teknik Komputer</option>
                                <option value="Manajemen Informatika">Manajemen Informatika</option>
                                <option value="Bahasa Inggris">Bahasa Inggris</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <input type="file" name="foto" id="foto" class="form-control-file">
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn btn-primary">Tambah Data</button>
                        <?php
                        if (isset($_POST["submit"])) {
                            if (tambah($_POST) > 0) {
                                echo "
        <script>
        alert('Data berhasil ditambahkan!');
        document.location.href = 'index.php';
        </script>
        ";
                            } else {
                                echo "
        <script>
        alert('Data gagal ditambahkan!');
        document.location.href = 'index.php';
        </script>
        ";
                            }
                        }
                        ?>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>

</html>