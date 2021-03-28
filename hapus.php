<?php
include 'functions.php';

$id_mahasiswa = $_GET["id_mahasiswa"];

if (hapus($id_mahasiswa) > 0) {
    echo "
        <script>
        alert('Data berhasil dihapus!');
        document.location.href = 'index.php';
        </script>
        ";
} else {
    echo "
        <script>
        alert('Data gagal dihapus!');
        document.location.href = 'index.php';
        </script>
        ";
}
