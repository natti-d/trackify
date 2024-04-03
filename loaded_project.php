<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ПланА - проект</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!--Bootstrap 5.3.2 - CSS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!--Bootstrap icons-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!--Bootstrap 5.3.2 - JS-->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> <!--jQuery-->
    <script src="./creating_project.js"></script> <!--Скрипт за създаване на нов проект-->
    <link rel="stylesheet" href="scrollbars.css"><!--Стилово офромление на scrollbars-->

</head>

<body class="overflow-y-auto" style="background-color: #d6f1ff;">
    <script>
        /*Взимане на user id, project id от localStorage*/
        document.cookie = "userID=" + localStorage.getItem('user');
        document.cookie = "project=" + localStorage.getItem('projectID');
        /*Взимане на цвят*/
        function getColors(bg) {
            switch (bg) {
                case "0" || 0:
                    return ["#F94144", "text-light"];
                    break;
                case "1" || 1:
                    return ["#F3722C", "text-black"];
                    break;
                case "2" || 2:
                    return ["#F9C74F", "text-black"];
                    break;
                case "3" || 3:
                    return ["#C5C35E", "text-black"];
                    break;
                case "4" || 4:
                    return ["#90BE6D", "text-black"];
                    break;
                case "5" || 5:
                    return ["#007A5E", "text-light"];
                    break;
                case "6" || 6:
                    return ["#314087", "text-light"];
                    break;
                case "7" || 7:
                    return ["#7462AB", "text-light"];
                    break;
                case "8" || 8:
                    return ["#8A4A8A", "text-light"];
                    break;
                default:
                    return ["#314087", "text-light"];
                    break;
            }
        }
    </script>
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

    $command = "SELECT * FROM `Projects` WHERE `project_id`='$projectID';";
    $getProjectInfo = mysqli_query($conn, $command);
    if ($getProjectInfo->num_rows != 0) {
        while ($row = mysqli_fetch_assoc($getProjectInfo)) {
            $color = $row['background_id'];
            echo "<script>
            document.getElementsByTagName('body')[0].style.backgroundColor = getColors('$color')[0];
            </script>";
        }
    }
    ?>

    <!--Заглавен елемент-->
    <header class="col-12 position-relative w-100 top-0 m-0 start-0 d-flex justify-content-between overflow-hidden" id="top-navigation" style="background-color: #F0F2F4;">
        <!--Лява част-->
        <div class="d-flex">
            <img src="./images/logo/0.png" alt="logo" style="height: 100px;" class="my-0 mx-3">
            <div class="align-middle m-auto d-md-flex d-none">
                <button class="btn mx-2 btn-lg" style="border: 2px solid #004e7a; color: #004e7a;" onmouseover="this.style.backgroundColor = '#004e7a'; this.style.color = '#99DDFF'; this.style.border = '2px solid #004e7a';" onmouseleave="this.style.backgroundColor = ''; this.style.color = '#004e7a'; this.style.border = '2px solid #004e7a';" onclick="location.href='projects.php#projects-content';">
                    Проекти</button>

                <button class="btn mx-2 btn-lg" style="border: 2px solid #004e7a; color: #004e7a;" onclick="" onmouseover="this.style.backgroundColor = '#004e7a'; this.style.color = '#99DDFF'; this.style.border = '2px solid #004e7a';" onmouseleave="this.style.backgroundColor = ''; this.style.color = '#004e7a'; this.style.border = '2px solid #004e7a';" data-bs-toggle="modal" data-bs-target="#create" type="button">
                    Създай</button>
            </div>
        </div>

        <!--Дясна част-->
        <div class="pe-md-5 m-3 d-md-flex d-none align-items-center">
            <button class="btn mx-2 btn-lg" style="border: 2px solid #004e7a; color: #004e7a;" onmouseover="this.style.backgroundColor = '#004e7a'; this.style.color = '#99DDFF'; this.style.border = '2px solid #004e7a';" onmouseleave="this.style.backgroundColor = ''; this.style.color = '#004e7a'; this.style.border = '2px solid #004e7a';" onclick="location.href='home.html#about-homepage'">
                За Нас</button>

            <button class="btn mx-2 btn-lg" style="border: 2px solid #004e7a; color: #004e7a;" onmouseover="this.style.backgroundColor = '#004e7a'; this.style.color = '#99DDFF'; this.style.border = '2px solid #004e7a';" onmouseleave="this.style.backgroundColor = ''; this.style.color = '#004e7a'; this.style.border = '2px solid #004e7a';">
                Помощ</button>
            <button class="btn mx-2 btn-lg bi bi-person-circle" style="border: 2px solid #004e7a; color: #004e7a;" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions" onmouseover="this.style.backgroundColor = '#004e7a'; this.style.color = '#99DDFF'; this.style.border = '2px solid #004e7a';" onmouseleave="this.style.backgroundColor = ''; this.style.color = '#004e7a'; this.style.border = '2px solid #004e7a';">
            </button>
        </div>

        <div class="pe-md-5 m-3 d-flex d-md-none align-items-center">
            <button class="btn mx-2 btn-lg bi bi-list-ul" style="border: 2px solid #004e7a; color: #004e7a;" onmouseover="this.style.backgroundColor = '#004e7a'; this.style.color = '#99DDFF'; this.style.border = '2px solid #004e7a';" onmouseleave="this.style.backgroundColor = ''; this.style.color = '#004e7a'; this.style.border = '2px solid #004e7a';" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"></button>

            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                <div class="offcanvas-header">
                    <h3 class="offcanvas-title" id="offcanvasRightLabel" style="color: #004e7a;">ПланА</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <button class="btn m-2 btn-lg w-100" style="border: 2px solid #004e7a; color: #004e7a;" onclick="" onmouseover="this.style.backgroundColor = '#004e7a'; this.style.color = '#99DDFF'; this.style.border = '2px solid #004e7a';" onmouseleave="this.style.backgroundColor = ''; this.style.color = '#004e7a'; this.style.border = '2px solid #004e7a';">
                        Проекти</button>
                    <button class="btn m-2 btn-lg w-100" style="border: 2px solid #004e7a; color: #004e7a;" onclick="" onmouseover="this.style.backgroundColor = '#004e7a'; this.style.color = '#99DDFF'; this.style.border = '2px solid #004e7a';" onmouseleave="this.style.backgroundColor = ''; this.style.color = '#004e7a'; this.style.border = '2px solid #004e7a';" data-bs-toggle="modal" data-bs-target="#create" type="button">
                        Създай</button>
                    <button class="btn m-2 btn-lg w-100" style="border: 2px solid #004e7a; color: #004e7a;" onclick="" onmouseover="this.style.backgroundColor = '#004e7a'; this.style.color = '#99DDFF'; this.style.border = '2px solid #004e7a';" onmouseleave="this.style.backgroundColor = ''; this.style.color = '#004e7a'; this.style.border = '2px solid #004e7a';">
                        За Нас</button>
                    <button class="btn m-2 btn-lg w-100" style="border: 2px solid #004e7a; color: #004e7a;" onclick="" onmouseover="this.style.backgroundColor = '#004e7a'; this.style.color = '#99DDFF'; this.style.border = '2px solid #004e7a';" onmouseleave="this.style.backgroundColor = ''; this.style.color = '#004e7a'; this.style.border = '2px solid #004e7a';">
                        Помощ</button>
                    <button class="btn mx-2 btn-lg w-100 bi bi-person-circle" style="border: 2px solid #004e7a; color: #004e7a;" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions" onmouseover="this.style.backgroundColor = '#004e7a'; this.style.color = '#99DDFF'; this.style.border = '2px solid #004e7a';" onmouseleave="this.style.backgroundColor = ''; this.style.color = '#004e7a'; this.style.border = '2px solid #004e7a';">
                    </button>
                </div>
            </div>
        </div>

        <!--Странично поле за всеки акаунт с допълнителни или нужни функции-->
        <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
            <div class="offcanvas-header w-100 d-flex flex-row-reverse flex-md-row justify-content-between" style="height: 100px; border-bottom: 2px solid #003554;">
                <button type="button" class="btn-close d-block d-md-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                <div class="d-flex align-middle">
                    <div class="d-block">
                        <p class="my-1">Име Фамилия</p>
                        <p class="my-1">e-mail</p>
                    </div>
                </div>
            </div>
            <div class="offcanvas-body">
                <!--Настройки - за бъдеща реализация
                            <button class="w-100 btn mx-2 my-1 btn-lg" style="color: #003554;"
                            onmouseover="this.style.backgroundColor = '#003554'; this.style.color = '#99DDFF';"
                            onmouseleave="this.style.backgroundColor = ''; this.style.color = '#003554';">Настройки</button>-->
                <button class="w-100 btn mx-2 my-1 btn-lg" style="color: #003554;" onmouseover="this.style.backgroundColor = '#003554'; this.style.color = '#99DDFF';" onmouseleave="this.style.backgroundColor = ''; this.style.color = '#003554';">Помощ</button>
                <button class="w-100 btn mx-2 my-1 btn-lg" style="color: #003554;" onmouseover="this.style.backgroundColor = '#003554'; this.style.color = '#99DDFF';" onmouseleave="this.style.backgroundColor = ''; this.style.color = '#003554';">Излез</button>
            </div>
        </div>
    </header>

    <!--Лента с допълнителни настройки на един проект-->
    <div class="d-flex w-100 justify-content-end py-2 border-bottom">
        <p class="btn btn-primary mx-3 text-center my-0" data-bs-toggle="offcanvas" data-bs-target="#addMemberOffCanva" aria-controls="addMemberOffcanvas" onclick="printMembers();">
            Добави Екип<i class="bi bi-plus-circle ms-2"></i>
        </p>
    </div>

    <!--Контейнер с таблиците и задачите на един проект-->
    <div class="d-inline-block flex-row overflow-y-auto w-100 pt-3">
        <div class="d-flex flex-row" id="tables-container">

            <!--Таблица Зададено-->
            <div class="col-lg-3 col-md-4">
                <div class="card mx-2 d-flex flex-column col-11">
                    <h5 class="card-header text-truncate" title="Зададено">Зададено</h5>

                    <div class="card-body overflow-y-auto overflow-y-auto" id="todo" style="max-height: 60vh;">
                        <!--Поле за една задача-->
                        <div class="d-none rounded-4 d-flex flex-column flex-md-row mt-1 mb-2 p-2 justify-content-around" onmouseover="this.classList.add('shadow');" onmouseleave="this.classList.remove('shadow');">

                            <!--Име на задачата-->
                            <div class="w-100">
                                <input type="text" class="rounded-3 fs-5 w-100 px-2 py-1 text-truncate" value="Task" onclick="this.select();" onkeyup="this.title = this.value;">
                            </div>

                            <div class="justify-content-between align-middle my-auto d-flex flex-row">
                                <i class="bi bi-plus-circle w-50 px-2 fs-3"></i> <!--Задаване на човек-->
                                <i class="bi bi-arrow-right-circle w-50 px-2 fs-3"></i>
                                <!--Преместване напред в таблиците-->
                            </div>

                        </div>
                    </div>
                    <div class="card-footer">
                        <p class="btn btn-primary mx-3 text-center" onclick="createTask(0)">Добави Задача<i class="bi bi-plus-circle ms-2"></i></p>
                    </div>
                </div>
            </div>

            <!--Таблица В прогрес-->
            <div class="col-lg-3 col-md-4">
                <div class="card mx-2 d-flex flex-column col-11">
                    <h5 class="card-header text-truncate" title="В прогрес">В прогрес
                    </h5>

                    <div class="card-body overflow-y-auto" id="inprogress" style="max-height: 70vh;">
                        <!--Поле за една задача-->
                        <div class="d-none rounded-4 d-flex flex-column flex-md-row mt-1 mb-2 p-2 justify-content-around" onmouseover="this.classList.add('shadow');" onmouseleave="this.classList.remove('shadow');">

                            <!--Име на задачата-->
                            <div class="w-100">
                                <input type="text" class="rounded-3 fs-5 w-100 px-2 py-1 text-truncate" value="Task" onclick="this.select();" onkeyup="this.title = this.value;">
                            </div>

                            <div class="justify-content-between align-middle my-auto d-flex flex-row">
                                <i class="bi bi-plus-circle w-50 px-2 fs-3"></i> <!--Задаване на човек-->
                                <i class="bi bi-arrow-right-circle w-50 px-2 fs-3"></i>
                                <!--Преместване напред в таблиците-->
                            </div>

                        </div>
                    </div>
                    <div class="card-footer"></div>
                </div>
            </div>

            <!--Таблица Изпълнено-->
            <div class="col-lg-3 col-md-4">
                <div class="card mx-2 d-flex flex-column col-11">
                    <h5 class="card-header">Изпълнено
                    </h5>

                    <div class="card-body overflow-y-auto" id="done" style="max-height: 70vh;">
                        <!--Поле за една задача-->
                        <div class="d-none rounded-4 d-flex flex-column flex-md-row mt-1 mb-2 p-2 justify-content-around" onmouseover="this.classList.add('shadow');" onmouseleave="this.classList.remove('shadow');">
                            <!--Име на задачата-->
                            <div class="w-100">
                                <input type="text" class="rounded-3 fs-5 w-100 px-2 py-1 text-truncate" value="Task" onclick="this.select();" onkeyup="this.title = this.value;">
                            </div>

                            <div class="justify-content-between align-middle my-auto d-flex flex-row">
                                <i class="bi bi-plus-circle w-50 px-2 fs-3"></i> <!--Задаване на човек-->
                                <i class="bi bi-arrow-right-circle w-50 px-2 fs-3"></i>
                                <!--Преместване напред в таблиците-->
                            </div>

                        </div>
                    </div>
                    <div class="card-footer"></div>
                </div>
            </div>

            <!--Таблица приключено-->
            <div class="col-lg-3 col-md-4">
                <div class="card mx-2 d-flex flex-column col-11">
                    <h5 class="card-header">Приключено
                    </h5>

                    <div class="card-body overflow-y-auto" id="closed" style="max-height: 70vh;">
                        <!--Поле за една задача-->
                        <div class="d-none rounded-4 d-flex flex-column flex-md-row mt-1 mb-2 p-2 justify-content-around" onmouseover="this.classList.add('shadow');" onmouseleave="this.classList.remove('shadow');">

                            <!--Име на задачата-->
                            <div class="w-100">
                                <input type="text" class="rounded-3 fs-5 w-100 px-2 py-1 text-truncate" value="Task" onclick="this.select();" onkeyup="this.title = this.value;">
                            </div>

                            <div class="justify-content-between align-middle my-auto d-flex flex-row">
                                <i class="bi bi-plus-circle w-50 px-2 fs-3"></i> <!--Задаване на човек-->
                                <i class="bi bi-arrow-right-circle w-50 px-2 fs-3 d-none"></i>
                                <!--Няма накъде повече да се премества, затова го скриваме-->
                            </div>
                        </div>
                    </div>
                    <div class="card-footer"></div>
                </div>
            </div>
        </div>
    </div>

    <!--Offcanva за добавяне членове на екип-->
    <div class="offcanvas offcanvas-end w-md-100" tabindex="-1" id="addMemberOffCanva" aria-labelledby="offcanvasLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasLabel">Добави членове на екип</h5>
            <button type="button" class="btn-close d-md-none d-block" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-block justify-content-center">
            <!--За e-mail на член от екиш-->
            <div class="form-floating w-100 mb-3">
                <input type="email" class="form-control mb-1" id="email-member" placeholder="name" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" required>
                <label for="email-member">Email address на член от екип</label>

                <p class="btn btn-primary w-100 text-center mt-1" onclick="addMember();">
                    Добави<i class="bi bi-pencil-square ms-2"></i>
                </p>
            </div>

            <!--Списък с екип-->
            <ul class="list-group overflow-y-auto" id="team-list" max-height: 70vh;>
            </ul>
        </div>
    </div>

    <!--Модал за създаване-->
    <div class="modal fade" id="create" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen-sm-down">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title fs-5" id="staticBackdropLabel">Създай проект</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="w-100">
                        <img class="img-fluid" src="./images/patterns for projects/blue-bg2.png" alt="Example of tables" id="project-pattern">
                    </div>
                    <div class="form-floating w-100 mt-3 position-relative">
                        <input type="name" class="form-control" id="name-of-project" placeholder="name" required>
                        <label for="name-of-project">Име на проект</label>
                    </div>

                    <div class="w-100 mt-3 position-relative" id="color-picking">
                        <span>Гама на проект</span>
                        <ul class="colorpicker w-100 h-100 d-flex overflow-x-auto list-unstyled fs-4">
                            <li class="col-2 py-2 text-center text-light" id="red-bg" style="background-color: #F94144;" onclick="selectedColor(this.id)">A</li>
                            <li class="col-2 py-2 text-center text-black" id="orange-bg" style="background-color: #F3722C;" onclick="selectedColor(this.id)">A</li>
                            <li class="col-2 py-2 text-center text-black" id="yellow-bg" style="background-color: #F9C74F;" onclick="selectedColor(this.id)">A</li>
                            <li class="col-2 py-2 text-center text-black" id="lime-bg" style="background-color: #C5C35E;" onclick="selectedColor(this.id)">A</li>
                            <li class="col-2 py-2 text-center text-black" id="lightgreen-bg" style="background-color: #90BE6D;" onclick="selectedColor(this.id)">A</li>
                            <li class="col-2 py-2 text-center text-light" id="green-bg" style="background-color: #007a5e;" onclick="selectedColor(this.id)">A</li>
                            <li class="col-2 py-2 text-center text-light" id="blue-bg" style="background-color: #314087;" onclick="selectedColor(this.id)">A</li>
                            <li class="col-2 py-2 text-center text-light" id="purple-bg" style="background-color: #7462AB;" onclick="selectedColor(this.id)">A</li>
                            <li class="col-2 py-2 text-center text-light" id="pink-bg" style="background-color: #8A4A8A;" onclick="selectedColor(this.id)">A</li>
                        </ul>
                    </div>

                    <div class="form-floating w-100 mt-3 position-relative">
                        <textarea type="name" class="form-control" id="description" placeholder="name" style="min-height: 120px;" required></textarea>
                        <label for="description">Описание на проект</label>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="close-create-modal" onclick="alert('Направените промени няма да се запазят.');" data-bs-dismiss="modal">Отмени</button>
                    <button type="button" class="btn btn-primary" onclick="createProject();">Създай</button>
                </div>
            </div>
        </div>
    </div>

    <!--Модал за възлагане на задача-->
    <div class="modal fade" id="assign-task" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen-sm-down">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title fs-5" id="staticBackdropLabel">Възложи задача</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul class="list-group" id="list-members-assign">
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="close-create-modal" onclick="alert('Направените промени няма да се запазят.');" data-bs-dismiss="modal">Отмени</button>
                    <button type="button" class="btn btn-primary" onclick="">Възможи</button>
                </div>
            </div>
        </div>
    </div>

    <!--Скрипт за създаване на нова задача, проследяване на прогреса и добавяне членове на екипа-->
    <script>
        /*Добавя e-mail към екип*/
        var members = [];
        var team_list = document.getElementById('team-list');

        function addMember() {
            if (members.length == 0) {
                team_list.innerHTML = '';
            }
            let email_member = document.getElementById('email-member').value;
            if (members.includes(email_member)) {
                alert("Този e-mail е вече член на екипа.");
            } else if (email_member == "") {
                alert("Невалиден e-mail");
            } else {
                members.push(email_member);
                $(team_list).append('<li class="list-group-item">' + members[members.length - 1] + "</li>");
            }
        }

        function printMembers() {
            team_list.innerHTML = '';
            if (members.length > 0) {
                for (let i = 0; i < members.length; i++) {
                    let member = members[i];
                    $(team_list).append('<li class="list-group-item">' + members[i] + "</li>");
                }
            } else {
                team_list.append('Няма добавени членове на екип.');
            }
        }

        /*Връща статуса на задача (т.е. към коя таблица принадлежи) в думи, като чете index числа*/
        function returnStatusOfTable(status) {
            switch (status) {
                case 0:
                    return 'todo';
                    break;
                case 1:
                    return 'inprogress';
                    break;
                case 2:
                    return 'done';
                    break;
                case 3:
                    return 'closed';
                    break;
            }
        }

        /*Функцията създава ново поле на задача*/
        function createTask(statusNum) {
            status = returnStatusOfTable(statusNum);
            //Поле за задача
            let task = document.createElement('div');
            task.classList.add('rounded-4', 'd-flex', 'flex-column', 'flex-md-row', 'mt-1', 'mb-2', 'p-2', 'justify-content-around');
            task.id = 'task';

            task.addEventListener("mouseover", function() {
                task.classList.add('shadow');
            });

            task.addEventListener("mouseleave", function() {
                task.classList.remove('shadow');
            });

            //Име на задача
            let task_text_conatiner = document.createElement('div');
            task_text_conatiner.classList.add('w-100');

            let task_text = document.createElement('input');
            task_text.classList.add('rounded-3', 'fs-5', 'w-100', 'px-2', 'py-1', 'text-truncate');
            task_text.type = 'text';
            task_text.value = 'Task';

            task.addEventListener("click", function() {
                task_text.select();
            });

            //Бутони на задача
            let task_btn_container = document.createElement('div');
            task_btn_container.classList.add('justify-content-between', 'align-middle', 'my-auto', 'd-flex', 'flex-row');

            //Бутон за задаване на човек
            let assign_member = document.createElement('i');
            assign_member.classList.add('bi', 'bi-plus-circle', 'w-50', 'px-2', 'fs-3');
            assign_member.addEventListener("click", function() {
                assignTask();
            });

            //Бутон за преместване напред в таблиците
            let move_task = document.createElement('i');
            move_task.classList.add('bi', 'bi-arrow-right-circle', 'w-50', 'px-2', 'fs-3');
            checkIfTaskIsClosed(move_task, status);

            task_btn_container.appendChild(assign_member);
            task_btn_container.appendChild(move_task);

            task_text_conatiner.appendChild(task_text);

            task.appendChild(task_text_conatiner);
            task.appendChild(task_btn_container);

            document.getElementById(status).appendChild(task);

            move_task.addEventListener("click", function() {
                if (statusNum == 3) {
                    return "Closed";
                } else {
                    statusNum++;
                    //document.getElementById(status).removeChild(task); - не е нужно, за да работи добре
                    status = returnStatusOfTable(statusNum);
                    document.getElementById(status).appendChild(task);
                    checkIfTaskIsClosed(move_task, status);
                }
            });
        }

        /*Функцията проверява дали задачата не е напълно прикючена*/
        function checkIfTaskIsClosed(next, status) {
            if (status == "closed") {
                next.classList.add('d-none');
            }
        }

        /*Функцията възлага задачи на отделни членове от екипа*/
        var list_members_assign = document.getElementById('list-members-assign');

        function assignTask() {
            list_members_assign.innerHTML = "";
            for (let i = 0; i < members.length; i++) {
                let member = members[i];
                let li = document.createElement('li');
                li.classList.add('list-group-item');
                let input = document.createElement('input');
                input.classList.add('form-check-input', 'me-1');
                input.type = 'checkbox';
                input.id = 'memberCheckBox' + i;
                let label = document.createElement('label');
                label.classList.add('form-check-label', 'ms-1');
                label.innerHTML = member;
                label.htmlFor = input.id;
                console.log(label);
                li.append(input);
                li.append(label);
                list_members_assign.append(li);
            }

            $('#assign-task').modal('show');
        }
    </script>
</body>

</html>