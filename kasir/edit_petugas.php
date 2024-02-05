<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Edit Petugas</title>
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
$data = mysqli_query($koneksi,"SELECT * FROM petugas WHERE petugas_id = '$id'");
while ($d = mysqli_fetch_assoc($data)) {

?>


                <form action="aksi/edit_petugas.php" method="post" class="  col-6 justify-content-center mx-auto mt-5 ">
                    <div>
                        <img src="assets/pengguna.webp" width="40%" class="d-block mx-auto mb-3" alt="">
                        <h2 class="text-white text-center">Edit Pengguna Sekarang !</h2>
                    </div>
                    <input required type="hidden" value="<?php echo $d['petugas_id'] ?>" name="petugas_id"
                        style="color: white; border: none; background-color: #1a2b32;" class="form-control"
                        id="petugas_id">

                    <div class="mb-3 text-white">
                        <label for="nama" class="form-label">Nama Petugas</label>
                        <input required type="text" value="<?php echo $d['nama'] ?>" name="nama"
                            style="color: white; border: none; background-color: #1a2b32;" class="form-control"
                            id="nama">

                    </div>
                    <div class="mb-3 text-white">
                        <label for="username" class="form-label">username</label>
                        <input required type="text" value="<?php echo $d['username'] ?>" name="username"
                            style="color: white; border: none; background-color: #1a2b32;" class="form-control"
                            id="username">

                    </div>
                    <div class="mb-3 text-white">
                        <label for="password" class="form-label">password</label>
                        <input required type="password" name="password"
                            style="color: white; border: none; background-color: #1a2b32;" class="form-control"
                            id="password">

                    </div>
                    <div class="mb-3 text-white">
                        <label for="password2" class="form-label"> konfirmasi password</label>
                        <input required type="password2" name="password2"
                            style="color: white; border: none; background-color: #1a2b32;" class="form-control"
                            id="password2">

                    </div>
                    <div class="mb-3 text-white">
                        <label for="level" class="form-label">level</label>
                        <select name="level" id="" style="color: white; border: none; background-color: #1a2b32;"
                            class="form-control">
                            <option value="admin">admin</option>
                            <option value="petugas">petugas</option>
                        </select>

                    </div>

                    <button type="submit" class="btn btn-primary w-100">Edit Petugas</button>
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