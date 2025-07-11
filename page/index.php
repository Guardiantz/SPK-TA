<?php
require("../controller/Login.php");
session_start();

// Cek apakah sudah login
if (!isset($_SESSION['login'])) {
    header("Location: ../index.php");
    exit;
}

// Cek apakah user adalah admin
$isAdmin = isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPK</title>
    <link rel="stylesheet" href="../asset/css/bulma.min.css">
    <link rel="stylesheet" href="../asset/css/animate.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body>
    <!-- NAVBAR -->
    <nav class="navbar has-shadow" role="navigation" aria-label="main navigation">
        <div class="container">
            <div class="navbar-brand">
                <a class="navbar-item" href="index.php?halaman=home">
                    <h3 class="title">SPK</h3>
                </a>

                <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="NavbarUtama">

                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>

            <div id="NavbarUtama" class="navbar-menu">

                <div class="navbar-end">
                    <a class="navbar-item" href="index.php?halaman=home">Home</a>
                    <a class="navbar-item" href="index.php?halaman=dataalternatif">Alternatif</a>
                    <a class="navbar-item" href="index.php?halaman=datakriteria">Kriteria</a>
                    <a class="navbar-item" href="index.php?halaman=databobot">Penilaian</a>
                    <a class="navbar-item" href="index.php?halaman=datapenilaian">Perhitungan</a>

                    

                    <div class="navbar-item">
                        <div class="buttons">
                            <a class="button is-danger" href="../logout.php">
                                <strong>Logout</strong>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </nav>
    <!-- AKHIR NAVBAR -->

    <!-- HALAMAN -->
    <?php require '../controller/Menu.php' ?>
    <!-- AKHIR HALAMAN -->

    <!-- JAVASCRIPT -->
    <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
    <script src="asset/js/main.js"></script>
    <script>
        // Script untuk toggle hamburger Bulma
        document.addEventListener('DOMContentLoaded', () => {
            // Dapatkan semua elemen "navbar-burger"
            const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

            // Cek jika ada navbar burger
            if ($navbarBurgers.length > 0) {
                $navbarBurgers.forEach(el => {
                    el.addEventListener('click', () => {
                        // Ambil target dari "data-target"
                        const target = el.dataset.target;
                        const $target = document.getElementById(target);

                        // Toggle class "is-active"
                        el.classList.toggle('is-active');
                        $target.classList.toggle('is-active');
                    });
                });
            }
        });
    </script>



</body>

</html>