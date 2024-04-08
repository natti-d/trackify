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
echo "<script>console.log('Успешно свързване с базата данни!');</script>";

//MYSQL Character Set
$command = "SET CHARACTER SET utf8;";
$setCharacterSet = mysqli_query($conn, $command);

//Правят се валидации за регистрация
$email = $_POST['e-mail'];
$command = "SELECT `email` FROM `Users` WHERE `email` = '$email' LIMIT 1;";
$validateEmail = mysqli_query($conn, $command);
if ($validateEmail->num_rows == 1) {
    echo "<script>alert('Има акаунт с такъв e-mail. Моля, въведете друг!');</script>";
    echo "<script>location.href='../registration.html';</script>";
} else {
    $name = $_POST['name'];
    $accountType = $_POST['account-type'];
    $pass = $_POST['password'];

    $command = "INSERT INTO `Users` (`email`, `password`, `full_name`, `account_type`) VALUES ('$email', '$pass', '$name', '$accountType');";
    $registrateUser = mysqli_query($conn, $command);
    if ($registrateUser) {
        echo "<script>alert('Успешно се регистрирахте!');</script>";
        $command = "SELECT `user_id` FROM `Users` WHERE `email` = '$email' LIMIT 1;";
        $getID = mysqli_query($conn, $command);
        $row = mysqli_fetch_assoc($getID);
        echo "<script>location.href='../projects.php'; localStorage.setItem('user', '" . $row['user_id'] . "');</script>";
    } else {
        die("Неосъществена регистрация: " . mysqli_connect_error());
    }
}
?>
