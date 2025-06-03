<?php
include "KoneksiDatabase.php";

if (isset($_POST["register"])) {
    $username = strtolower($_POST["username"]);
    $password = $_POST["password"];
    $password2 = $_POST["password2"];

    if ($password != $password2) {
        echo "<script>alert('Input password tidak sesuai');</script>";
    } else {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO account (username, password) VALUES ('$username', '$password')";
        $q = mysqli_query($conn, $query);

        if ($q) {
            echo "<script>alert('User berhasil ditambahkan');</script>";
            header("Location: LoginAkun.php");
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Daftar Akun</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background: linear-gradient(to top, #567C8D, #C8D9E6);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card-custom {
            width: 900px;
            border-radius: 30px;
            margin-top: 40px;
        }

        .register-image {
            width: 100%;
            height: 500px;
            object-fit: cover;
        }

        .form-section {
            padding: 60px 30px 30px;
        }

        .btn-submit,
        .btn-kembali {
            transition: 0.3s;
        }

        .btn-submit:hover {
            background-color: #0d6efd;
            transform: scale(1.03);
        }

        .btn-kembali:hover {
            color: #000;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container-fluid d-flex justify-content-center">
        <div class="card shadow bg-body-tertiary d-flex flex-md-row flex-column card-custom">
            <div class="col-md-6 position-relative border-end">
                <img src="image/LogoWeb.png" class="position-absolute" style="top: 20px; left: 20px; width: 100px; height: 100px;" alt="Logo" />
                <img src="image/DesainRegister.jpeg" class="register-image" alt="Register" />
            </div>

            <form action="" method="POST" class="col-md-6 form-section">
                <h3 class="text-center mb-3">Sign Up</h3>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" id="username" required />
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password" required />
                </div>
                <div class="mb-3">
                    <label for="password2" class="form-label">Konfirmasi Password</label>
                    <input type="text" class="form-control" name="password2" id="password2" required />
                </div>
                <div class="mb-3">
                    <button type="submit" name="register" class="btn-submit btn btn-primary w-100">Sign Up</button>
                </div>
                <div class="text-center">
                    <a href="LoginAkun.php" class="btn-kembali text-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>