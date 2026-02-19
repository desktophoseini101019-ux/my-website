<?php
include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM admins WHERE username=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        if (password_verify($password, $row['password'])) {
            $_SESSION['admin'] = $username;
            header("Location: dashboard.php");
            exit();
        } else {
            echo "رمز اشتباه است";
        }
    } else {
        echo "کاربری یافت نشد";
    }
}
?>

<form method="POST">
    نام کاربری:<br>
    <input type="text" name="username"><br><br>

    رمز عبور:<br>
    <input type="password" name="password"><br><br>

    <button type="submit">ورود</button>
</form>