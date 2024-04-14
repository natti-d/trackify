<!--PHP към loaded_project.php (AJAX conn) за комуникация с БД:
    - за смяна етикет (име) на задача.
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
$task_text = $_POST['task_text'];
$taskID = $_POST['task_ID'];

/*Променя етикета/името на задача*/
$command = "UPDATE `Tasks` SET `task_label` = '$task_text' WHERE `task_id` = '$taskID';";
$updateTitle = mysqli_query($conn, $command);

if ($updateTitle) {
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