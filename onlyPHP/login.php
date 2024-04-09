<!--PHP за комуникация с БД:
    - за влизане в акаунт;
-->
<?php
//Данни за достъп до базата данни
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "PlanA";

//Прави се връзка с базата данни
$conn = mysqli_connect($servername, $username, $password, $dbname);
//Проверява се връзката
if (!$conn) {
    die("Неосъществена връзка с базата данни: " . mysqli_connect_error());
}

/*MYSQL колекция от символи*/
$command = "SET CHARACTER SET utf8;";
$setCharacterSet = mysqli_query($conn, $command);

$email = mysqli_real_escape_string($conn, $_POST['e-mail']);
$pass = mysqli_real_escape_string($conn, $_POST['password']);

/*Изтеглят се id и парола на потребител според e-mail,
паролата се сравнява и при съответствие, id се записва като localStorage*/
$command = "SELECT `user_id`, `password` FROM `Users` WHERE `email` = '$email' LIMIT 1;";
$validateAcc = mysqli_query($conn, $command);
if ($validateAcc->num_rows == 1) {
    $row = mysqli_fetch_assoc($validateAcc);
    $dbPass = $row['password'];

    if ($pass == $dbPass) {
        echo "<script>location.href='../projects.php'; localStorage.setItem('user', '" . $row['user_id'] . "');</script>";
    } else {
        echo "<script>alert('Невалидна парола! Моля, въведете друга!'); location.href='../login.html';</script>";
    }
} else {
    echo "<script>alert('Невалиден e-mail адрес! Моля, въведете друг!'); location.href='../login.html';</script>";
}
?>
<!--
    БД - База данни
-->