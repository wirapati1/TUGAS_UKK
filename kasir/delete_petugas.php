<?php
include 'aksi/koneksi.php';
$id = $_GET['id'];
$result = mysqli_query($koneksi,"DELETE FROM petugas where petugas_id = '$id'");

if ($result) {
    # code...
    echo "<script>
    alert('Data Berhasil Didelete !');
    document.location='./data_petugas.php';</script>";
}else {
        # code...
        echo "<script>
        alert('Data Gagal Didelete !');
        document.location='./data_petugas.php';</script>";
    
}