<!--PHP към loaded_project.php за комуникация с БД:
    - за премахване на член на екипа.
-->
<?php
/*Данни за достъп до базата данни*/
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "PlanA";

/*Прави се връзка с базата данни*/
$conn = mysqli_connect($servername, $username, $password, $dbname);
/*Проверява се връзката*/
if (!$conn) {
    die("Неосъществена връзка с базата данни: " . mysqli_connect_error());
}

/*MYSQL колекция от символи*/
$command = "SET CHARACTER SET utf8;";
$setCharacterSet = mysqli_query($conn, $command);

$projectID = $_COOKIE['project'];
$email = $_POST['member-email'];

/*Изтегля се id на потребителя според e-mail адреса му */
$command = "SELECT `user_id` FROM `Users` WHERE `email` = '$email' LIMIT 1;";
$getUID = mysqli_query($conn, $command);
$row = mysqli_fetch_assoc($getUID);
$user = $row['user_id'];
/*Потребителят се изтрива от записите към проекта*/
$command = "DELETE FROM `Members` WHERE `projects_id`='$projectID' AND `member_id` = '$user';";
$removeMember = mysqli_query($conn, $command);
if ($removeMember) {
    /*Пренасочвания*/
    echo "<script>location.href='../loaded_project.php';</script>";
}else{
    echo "<script>location.href='../loaded_project.php'; alert('Неуспешно премахване на член.');</script>";
}


?>
<!--
    БД - База данни
-->