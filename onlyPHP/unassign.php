<!--PHP към loaded_project.php (AJAX conn) за комуникация с БД:
    - за премахване на назначен член към задача;
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
echo "<script>console.log('Успешно свързване с базата данни!');</script>";

/*MYSQL колекция от символи*/
$command = "SET CHARACTER SET utf8;";
$setCharacterSet = mysqli_query($conn, $command);

$task = $_COOKIE['taskID'];
$member = $_POST['email_member'];

/*Взима се id според e-mail на члена */
$command = "SELECT `user_id` FROM `Users` WHERE `email` = '$member' LIMIT 1;";
$getUser = mysqli_query($conn, $command);
$row = mysqli_fetch_assoc($getUser);
$userID = $row['user_id'];

/*Премахва се като назначен на определена задача*/
$command = "DELETE FROM `Members` WHERE `member_id`='$userID' AND `task_id`='$task';";
$deleteAssign = mysqli_query($conn, $command);

if ($deleteAssign) {
    $response = array('success' => true);
} else {
    $response = array('success' => false);
}

//JSON отговор
echo json_encode($response);
?>
<!--
    БД - База данни
-->