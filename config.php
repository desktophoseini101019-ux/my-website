<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "contact_system";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("خطا در اتصال به دیتابیس");
}
?>
