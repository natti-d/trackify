<!--PHP към loaded_project.php за комуникация с БД:
    - за назначаване на изпълнител на задача;
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

$projectID = $_COOKIE['project'];
$task = $_COOKIE['taskID'];

/*Ако има отблеязани членове на екип като изпълнители, те се въвеждат в БД */
if (!($_POST['membersAssign'])) {
    echo "<script>location.href='../loaded_project.php'; localStorage.removeItem('taskID');</script>";
} else {
    $assignedMembers = $_POST['membersAssign'];
    foreach ($assignedMembers as $member) {
        $command = "SELECT `user_id` FROM `Users` WHERE `email` = '$member' LIMIT 1;";
        $getUID = mysqli_query($conn, $command);
        $row = mysqli_fetch_assoc($getUID);
        $user = $row['user_id'];

        $command = "INSERT INTO `Members` (`member_id`, `projects_id`, `task_id`) VALUES ('$user', '$projectID', '$task');";
        $assignTask = mysqli_query($conn, $command);
    }
}
echo "<script>location.href='../loaded_project.php'; localStorage.removeItem('taskID');</script>"
?>
<!--
    БД - База данни
-->