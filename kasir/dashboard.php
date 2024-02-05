<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Dashboard</title>
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

<body style="background-color: rgba(15,25,30,255);overflow: hidden !important;">
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <?php 
            include 'sidebars.php'
            ?>

            <div class=" py-3 mt-5 ms-2 ">
                <?php 
include 'aksi/koneksi.php';
$produk = mysqli_query($koneksi,"SELECT * FROM produk");
$data_produk = mysqli_num_rows($produk);
$pelanggan = mysqli_query($koneksi,"SELECT * FROM pelanggan");
$data_pelanggan = mysqli_num_rows($pelanggan);
?>

                <h3 class="text-white mb-5">Selamat datang <?php echo $_SESSION['username'] ?> sebagai
                    <?php echo $_SESSION['level'] ?> </h3>
                <div class="d-flex flex flex-wrap">
                    <div class="card me-4" style="width: 18rem; background-color: #1a2b32;">



                        <div class="card-body">
                            <i style="font-size: 30px;"
                                class="bi  bi-box-seam text-white mb-2 text-center d-block mx-auto"></i>
                            <h2 class="card-title text-white text-center"><?php echo $data_produk ?></h5>

                                <p class="card-text text-white text-center">Ini Adalah Jumlah Data Produk</p>
                                <a  href="data_produk.php" class="btn btn-success me-3 d-block mx-auto">
                                    data produk</a>
                        </div>
                    </div>

                    <div class="card me-4" style="width: 18rem; background-color: #1a2b32;">
                        <div class="card-body">
                            <i style="font-size: 30px;"
                                class="bi bi-person text-white mb-2 text-center d-block mx-auto"></i>
                            <h2 class="card-title text-white text-center"><?php echo $data_pelanggan ?></h5>

                                <p class="card-text text-white text-center">Ini Adalah Jumlah Data Pelanggan</p>
                                <a type="button" href="data_pelanggan.php" class="btn btn-success me-3 d-block mx-auto">
                                    data pelanggan</a>
                        </div>
                    </div>
                    <div class="card me-4" style="width: 18rem; background-color: #1a2b32;">



                        <div class="card-body">
                            <i style="font-size: 30px;"
                                class="bi bi-basket text-white mb-2 text-center d-block mx-auto"></i>
                            <h2 class="card-title text-white text-center"><?php echo $data_produk ?></h5>

                                <p class="card-text text-white text-center">Ini Adalah Jumlah Data Pembelian</p>
                                <a type="button" href="detail_pembelians.php"
                                    class="btn btn-success me-3 d-block mx-auto">
                                    data pembelian</a>
                        </div>
                    </div>
                    <?php
if ($_SESSION['level']=='admin') {
  // code...
  $produk = mysqli_query($koneksi,"SELECT * FROM produk");

  $data_produk = mysqli_num_rows($produk);

  echo '<div class="card me-4"  style="width: 18rem; background-color: #1a2b32;">

    <div class="card-body">

      <i style="font-size: 30px;" class="bi bi-people text-white mb-2 text-center d-block mx-auto"></i>

      <h2 class="card-title text-white text-center">' . $data_produk . '</h5>

      <p class="card-text text-white text-center">Ini Adalah Jumlah Data Petugas</p>

      <a type="button"  href="data_petugas.php" class="btn btn-success me-3 d-block mx-auto"> data petugas</a>

    </div>

  </div>';

}
?>
                </div>
            </div>



        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>