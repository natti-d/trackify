<!--PHP към loaded_project.php за комуникация с БД:
    - за изтриване на проект.
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
$userID = $_COOKIE['userID'];
$email = $_POST['e-mail'];
$pass = $_POST['password'];

/*Проверяват се данните на собственика */
$command = "SELECT * FROM `Users` WHERE `email` = '$email' AND `password`='$pass' LIMIT 1;";
$getUser = mysqli_query($conn, $command);
if ($getUser) {
    $row = mysqli_fetch_assoc($getUser);
    $user = $row['user_id'];
    if ($user == $userID) {
        /*Изриват се всички записи, съответстващи на id на проекта*/
        $command = "DELETE FROM `Members` WHERE `projects_id`='$projectID';";
        $removeProjectM = mysqli_query($conn, $command);

        $command = "DELETE FROM `Projects` WHERE `project_id`='$projectID';";
        $removeProjectP = mysqli_query($conn, $command);

        $command = "DELETE FROM `Tasks` WHERE `project_id`='$projectID';";
        $removeProjectT = mysqli_query($conn, $command);
        if ($removeProjectM && $removeProjectP && $removeProjectT) {
            /*Пренасочвания*/
            echo "<script>location.href='../projects.php'; localStorage.removeItem('projectID');</script>";
        }else{
            echo "<script>location.href='../loaded_project.php'; alert('Неуспешно изтриване.');</script>";
        }
    } else {
        echo "<script>location.href='../loaded_project.php'; alert('Невалидни данни.');</script>";
    }
} else {
    echo "<script>location.href='../loaded_project.php'; alert('Невалидни данни.');</script>";
}
