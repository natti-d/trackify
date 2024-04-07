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
$userID = $_COOKIE['userID'];
$projectID = $_COOKIE['project'];
$email_member = $_POST['email_member'];

//Изписват се членовете на един екип
$command = "SELECT Users.email 
FROM Members 
INNER JOIN Users ON Members.member_id = Users.user_id
WHERE Members.projects_id = '$projectID' 
GROUP BY Members.member_id;";
$getMembers = mysqli_query($conn, $command);

if (!$getMembers)
{
echo("Error description: " . mysqli_error($conn));
}
while ($row = mysqli_fetch_assoc($getMembers)) {
$email = strval($row['email']);
echo "<script>members.push('$email');</script>";
}

$command = "SELECT `user_id` FROM `Users` WHERE `email`='$email_member';";
$getUserID = mysqli_query($conn, $command);

if ($getUserID) {
    if ($getUserID->num_rows == 1) {
        $row = mysqli_fetch_assoc($getUserID);
        $user = $row['user_id'];

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

echo "<script>printMembers();</script>";

// Output JSON response
echo json_encode($response);
?>