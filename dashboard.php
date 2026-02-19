<?php
include "config.php";

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

$result = $conn->query("SELECT * FROM messages ORDER BY created_at DESC");
?>

<h2>پنل مدیریت</h2>
<a href="logout.php">خروج</a>

<?php
while($row = $result->fetch_assoc()) {
    echo "<hr>";
    echo "نام: " . $row['name'] . "<br>";
    echo "ایمیل: " . $row['email'] . "<br>";
    echo "پیام: " . $row['message'] . "<br>";
    echo "تاریخ: " . $row['created_at'] . "<br>";
    echo "<a href='delete.php?id=".$row['id']."'>حذف</a>";
}
?>