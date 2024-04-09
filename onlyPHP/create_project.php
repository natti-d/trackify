<!--PHP за комуникация с БД:
    - за добавяне на нов проект със съответните данни;
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

$name = $_POST['name-of-project'];
/*Взима се индекс на цвят за числово попълване*/
$color = $_POST['color'];
switch ($color) {
    case "red-bg":
        $color = 0;
        break;
    case "orange-bg":
        $color = 1;
        break;
    case "yellow-bg":
        $color = 2;
        break;
    case "lime-bg":
        $color = 3;
        break;
    case "lightgreen-bg":
        $color = 4;
        break;
    case "green-bg":
        $color = 5;
        break;
    case "blue-bg":
        $color = 6;
        break;
    case "purple-bg":
        $color = 7;
        break;
    case "pink-bg":
        $color = 8;
        break;
    default:
        $color = 6;
        break;
}

$description = $_POST['description'];
$userID = $_COOKIE['userID'];

/*Добавят се данните за един проект в таблица*/
$command = "INSERT INTO `Projects` (`project_name`, `project_description`, `background_id`) VALUES ('$name', '$description', '$color');";
$createProject = mysqli_query($conn, $command);

/*Взима се id на проект и се вписва в таблицата за членове заедно с id на user-създателя*/
$command = "SELECT `project_id` FROM `Projects` WHERE `project_name` = '$name' AND `project_description` = '$description' AND `background_id` = '$color';";
$getProjectID = mysqli_query($conn, $command);
if ($createProject && $getProjectID->num_rows != 0) {
    while ($row = mysqli_fetch_assoc($getProjectID)) {
        $command = "INSERT INTO `Members` (`member_id`, `projects_id`, `task_id`) VALUES ('$userID', " . $row['project_id'] . ", NULL);";
        $saveMember = mysqli_query($conn, $command);
        echo "<script>console.log('Успешно създадохте проект!');</script>";
        echo "<script>location.href='../loaded_project.php'; localStorage.setItem('projectID', '" . $row['project_id'] . "');</script>";
    }
}
?>
<!--
    БД - База данни
-->