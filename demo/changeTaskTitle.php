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

$projectID = $_COOKIE['project'];
$task_text = $_POST['task_text'];
$status = $_POST['task_status'];

$command = "SELECT `task_id` FROM `Tasks` WHERE `project_id` = '$projectID' AND `task_status`='$status' LIMIT 1;";
$getTaskID = mysqli_query($conn, $command);
if (!$getTaskID) {
}
while ($row = mysqli_fetch_assoc($getTaskID)) {
    $taskID = $row['task_id'];
    $command = "UPDATE `Tasks` SET `task_label` = '$task_text' WHERE `task_id` = '$taskID';";
    $updateTitle = mysqli_query($conn, $command);

    if ($updateTitle) {
        $response = array('success' => true);
    } else {
        $response = array('success' => false);
    }
}



// Output JSON response
echo json_encode($response);
?>