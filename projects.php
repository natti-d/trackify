<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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

    if(isset($_GET['userID'])) {
        $userID = $_GET['userID'];
        $command = "SELECT * FROM `Members` WHERE `member_id` = '$userID';";
        $getProjects = mysqli_query($conn, $command);
        if ($getProjects->num_rows == 0) {
            /*no projects */
        }
    }
    else {
        echo "Error: User ID parameter is missing";
    }
</body>
</html>