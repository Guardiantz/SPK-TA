<?php
function Connect()
{
    return mysqli_connect("localhost", "root", "", "belajar");
}

function Show($query)
{
    $koneksi = Connect();
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function Login($data)
{
    session_start();
    $koneksi = Connect();
    $username = htmlspecialchars($data["username"]);
    $password = htmlspecialchars($data["password"]);

    $result = mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$username'");

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        if ($password === $row['password']) {
            // Simpan session login
            $_SESSION['login'] = true;
            $_SESSION['username'] = $row['username'];

            // Tambahan: simpan role admin secara eksplisit (opsional)
            $_SESSION['role'] = 'admin';

            return true;
        }
    }

    return [
        'error' => true,
        'pesan' => 'Username / Password Salah'
    ];
}

