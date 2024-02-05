<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Edit Pelanggan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <?php 
    session_start();
    if ($_SESSION['level'] == '') {
        # code...
        echo "<script>
        alert('belum login !');
        document.location='./index.php';</script>";
    }
    ?>
</head>

<body style="background-color: rgba(15,25,30,255);">
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <?php 
            include 'sidebars.php'
            ?>

            <div class="col py-3 mt-5 mx-5">

                <?php 
include 'aksi/koneksi.php';
$id = $_GET['id'];
$data = mysqli_query($koneksi,"SELECT * FROM pelanggan WHERE PelangganID = '$id'");
while ($d = mysqli_fetch_assoc($data)) {

?>


                <form action="aksi/edit_pelanggan.php" method="post"
                    class="  col-6 justify-content-center mx-auto mt-5 ">
                    <div>
                        <img src="assets/edit_pelanggan.webp" width="40%" class="d-block mx-auto mb-3" alt="">
                        <h2 class="text-white text-center">Edit Pelanggan Sekarang !</h2>
                    </div>
                    <input required type="hidden" value="<?php echo $d['PelangganID'] ?>" name="PelangganID"
                        style="color: white; border: none; background-color: #1a2b32;" class="form-control"
                        id="PelangganID">

                    <div class="mb-3 text-white">
                        <label for="NamaPelanggan" class="form-label">Nama Pelanggan</label>
                        <input required type="text" value="<?php echo $d['NamaPelanggan'] ?>" name="NamaPelanggan"
                            style="color: white; border: none; background-color: #1a2b32;" class="form-control"
                            id="NamaPelanggan">

                    </div>
                    <div class="mb-3 text-white">
                        <label for="Alamat" class="form-label">Alamat</label>
                        <input required type="text" value="<?php echo $d['Alamat'] ?>" name="Alamat"
                            style="color: white; border: none; background-color: #1a2b32;" class="form-control"
                            id="Alamat">

                    </div>
                    <div class="mb-3 text-white">
                        <label for="NomorTelepon" class="form-label">NomorTelepon</label>
                        <input required type="number" value="<?php echo $d['NomorTelepon'] ?>" name="NomorTelepon"
                            style="color: white; border: none; background-color: #1a2b32;" class="form-control"
                            id="NomorTelepon">

                    </div>

                    <button type="submit" class="btn btn-primary w-100">Tambah Pelanggan</button>
                </form>
                <?php } ?>




            </div>



        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>