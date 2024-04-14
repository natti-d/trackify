<!--PHP към loaded_project.php (AJAX conn) за комуникация с БД:
    - за добавяне на нов член към екип;
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

$userID = $_COOKIE['userID'];
$projectID = $_COOKIE['project'];
$email_member = $_POST['email_member'];

/*Изважда се id на член*/
$command = "SELECT `user_id` FROM `Users` WHERE `email`='$email_member';";
$getUserID = mysqli_query($conn, $command);

if ($getUserID) {
    if ($getUserID->num_rows == 1) {
        $row = mysqli_fetch_assoc($getUserID);
        $user = $row['user_id'];

        /*Вписва се нов член на екип*/
        $insertCommand = "INSERT INTO `Members` (`member_id`, `projects_id`, `task_id`) VALUES ('$user', '$projectID', NULL);";
        $insertMember = mysqli_query($conn, $insertCommand);

        if ($insertMember) {
            $response = array('success' => true);
        } else {
            $response = array('success' => false, 'message' => 'Грешка при добавяне на потребителя към проекта.');
        }
    } else {
        $response = array('success' => false, 'message' => 'Не е намерен потребител с този email адрес.');
    }
} else {
    $response = array('success' => false, 'message' => 'Грешка при извличане на данни от базата данни.');
}

// JSON отговор
echo json_encode($response);
?>
<!--
    БД - База данни
-->