<?php
$host = "localhost"; // hostname
$username = "root"; //username
$password = ""; //password untuk login ke mysql
$database = "appletalk"; //nama database

$conn = mysqli_connect ($host, $username, $password, $database);
if ($conn->connect_error) {
    // jika terjadi error, matikan proses dengan die() atau exit();
    die('Maaf koneksi gagal: ' . $connect->connect_error);
}

?>