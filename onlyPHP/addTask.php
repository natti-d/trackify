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


$command = "INSERT INTO `Tasks`(`project_id`, `task_label`, `task_status`) VALUES ('$projectID', '$task_text', 0);";
$addTask = mysqli_query($conn, $command);

if ($addTask) {
    $response = array('success' => true);
} else{
    $response = array('success' => false);
}

// Output JSON response
echo json_encode($response);
?>
