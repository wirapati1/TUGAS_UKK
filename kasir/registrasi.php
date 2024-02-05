<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Registrasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <?php 
    session_start();
    if ($_SESSION['level'] !== 'admin') {
        # code...
        echo "<script>
        alert('anda tidak ada akses untuk masuk ke halaman ini!');
        document.location='./index.php';</script>";
    }
    ?>

</head>

<body class="container" style="background-color: rgba(15,25,30,255);">


    <form action="aksi/registrasi.php" method="post" class=" col-6 justify-content-center mx-auto ">
        <div>
            <img src="assets/login.webp" width="30%" class="d-block mx-auto" alt="">
            <h2 class="text-white text-center">Daftarkan Akunmu Sekarang</h2>
        </div>
        <div class="mb-3 text-white">
            <label for="nama" class="form-label">nama petugas</label>
            <input required type="text" name="nama" style="color: white; border: none; background-color: #1a2b32;"
                class="form-control" id="nama">

        </div>
        <div class="mb-3 text-white">
            <label for="username" class="form-label">username</label>
            <input required type="text" name="username" style="color: white; border: none; background-color: #1a2b32;"
                class="form-control" id="username">

        </div>
        <div class="mb-3 text-white">
            <label for="password" class="form-label">Password</label>
            <input required type="password" name="password"
                style="color: white; border: none; background-color: #1a2b32;" class="form-control" id="password">

        </div>
        <div class="mb-3 text-white">
            <label for="password2" class="form-label"> konfirmasi password</label>
            <input required type="password" name="password2"
                style="color: white; border: none; background-color: #1a2b32;" class="form-control" id="password">

        </div>
        <div class="mb-3 text-white">
            <label for="level" class="form-label">level</label>
            <select name="level" required style="color: white; border: none; background-color: #1a2b32;"
                class="form-control" id="level" id="">

                <option value="admin">admin</option>
                <option value="petugas">petugas</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary w-100">registrasi</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>