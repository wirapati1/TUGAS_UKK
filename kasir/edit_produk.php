<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Edit Produk</title>
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
$data = mysqli_query($koneksi,"SELECT * FROM produk WHERE ProdukID = '$id'");
while ($d = mysqli_fetch_assoc($data)) {

?>


                <form action="aksi/edit_produk.php" method="post" class="  col-6 justify-content-center mx-auto mt-5 ">
                    <div>
                        <img src="assets/edit_produk.webp" width="40%" class="d-block mx-auto mb-3" alt="">
                        <h2 class="text-white text-center">Edit Produk Sekarang !</h2>
                    </div>
                    <input required type="hidden" value="<?php echo $d['ProdukID'] ?>" name="ProdukID"
                        style="color: white; border: none; background-color: #1a2b32;" class="form-control"
                        id="ProdukID">

                    <div class="mb-3 text-white">
                        <label for="NamaProduk" class="form-label">Nama Produk</label>
                        <input required type="text" value="<?php echo $d['NamaProduk'] ?>" name="NamaProduk"
                            style="color: white; border: none; background-color: #1a2b32;" class="form-control"
                            id="NamaProduk">

                    </div>
                    <div class="mb-3 text-white">
                        <label for="Harga" class="form-label">Harga</label>
                        <input required type="number" value="<?php echo $d['Harga'] ?>" name="Harga"
                            style="color: white; border: none; background-color: #1a2b32;" class="form-control"
                            id="Harga">

                    </div>
                    <div class="mb-3 text-white">
                        <label for="Stok" class="form-label">Stok</label>
                        <input required type="number" value="<?php echo $d['Stok'] ?>" name="Stok"
                            style="color: white; border: none; background-color: #1a2b32;" class="form-control"
                            id="Stok">

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