<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
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

    $email = $_POST['e-mail'];
    $command = "SELECT `email` FROM `Users` WHERE `email` = '$email' LIMIT 1;";
    $validateEmail = mysqli_query($conn, $command);
    if ($validateEmail->num_rows == 1) {
        $pass = $_POST['password'];
        $command = "SELECT `email` FROM `Users` WHERE `password` = '$pass' LIMIT 1;";
        $logUser = mysqli_query($conn, $command);
        if ($logUser->num_rows == 1) {
            echo "<script>alert('Успешно влязохте в акаунта си!');</script>";
            echo "<script>location.href='./projects.html';</script>";
            //set id of user as localStorage and return to home.html every time its empty!!!
        } else {
            echo "<script>alert('Невалидна парола! Моля, въведете друга!');</script>";
        }
    } else {
        echo "<script>alert('Невалиден e-mail адрес! Моля, въведете друг!');</script>";
    }
    ?>
</body>

</html>