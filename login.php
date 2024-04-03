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
            $command = "SELECT `user_id` FROM `Users` WHERE `email` = '$email' LIMIT 1;";
            $getID = mysqli_query($conn, $command);
            $row = mysqli_fetch_assoc($getID);
            echo "<script>location.href='./projects.php'; localStorage.setItem('user', '".$row['user_id']."');</script>";
        } else {
            echo "<script>alert('Невалидна парола! Моля, въведете друга!'); location.href='./login.html';</script>";
        }
    } else {
        echo "<script>alert('Невалиден e-mail адрес! Моля, въведете друг!'); location.href='./login.html';</script>";
    }
    ?>
    
</body>

</html>