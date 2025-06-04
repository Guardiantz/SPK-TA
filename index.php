<?php
require("controller/Login.php");

session_start();

if (isset($_SESSION['login'])) {
    header("Location: page/index.php");
    exit;
}

if (isset($_POST['login'])) {
    $login = Login($_POST);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="asset/css/bulma.min.css">
    <link rel="stylesheet" href="asset/css/animate.min.css">
    <link rel="stylesheet" href="asset/css/costume.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body>

    <section class="section" id="section">
        <div class="container">
            <div class="row">
                <div class="columns is-centered">
                    <div class="">
                        <div class="card" style="width: 450px; height: 410px; margin-top: 80px;">
                            <div class="card-header" style="display: flex; flex-direction: column; align-items: center; padding-top: 20px; padding-bottom: 11px;">
                                <p class="card-header-title" style="font-size: 20px; padding: 0; margin-bottom: 0;">WELCOME TO</p>
                                <p class="card-header-title" style="font-size: 20px; font-weight: bold; margin-top: 0; padding: 0; margin-bottom: 10px;">
                                    SISTEM PENDUKUNG KEPUTUSAN
                                </p>
                            </div>

                            <div class="card-content" style="margin-top: 11px;">
                                <?php if (isset($login['error'])) : ?>
                                    <p>
                                        <?= "<script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: 'Gagal login, periksa kembali username dan password anda!',
            showClass: {
                popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
            }
        }).then(function() {
            window.location.href = 'index.php';
        });
        </script>"; ?></p>
                                <?php endif ?>
                                <form action="" method="post">
                                    <div class="field">
                                        <label class="label">Username</label>
                                        <div class="control has-icons-left">
                                            <input class="input" type="text" placeholder="Username" name="username" required autocomplete="off" autofocus
                                                style="border-radius: 15px; width: 400px; height: 45px; font-size: 16px;">
                                            <span class="icon is-small is-left">
                                                <ion-icon name="person"></ion-icon>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="field" style="margin-top: 10px;">
                                        <label class="label">Password</label>
                                        <div class="control has-icons-left">
                                            <input class="input" type="password" placeholder="Password" name="password" required autocomplete="off"
                                                style="border-radius: 15px; width: 400px; height: 45px; font-size: 16px;">
                                            <span class="icon is-small is-left">
                                                <ion-icon name="lock-closed"></ion-icon>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="field" style="margin-top: 25px;">
                                        <div class="control">
                                            <button class="button is-link" type="submit" name="login"
                                                style="border-radius: 15px; width: 400px; height: 48px; font-size: 18px; font-weight: bold;">
                                                <ion-icon name="log-in" class="mr-2"></ion-icon>Login
                                            </button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
</body>

</html>