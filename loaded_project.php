<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ПланА - проект</title>
    <link rel="icon" href="./images/logo/tab_ico.png"> <!--За да се постави икона в tab в браузъра-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!--Bootstrap 5.3.2 - CSS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!--Bootstrap icons-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!--Bootstrap 5.3.2 - JS-->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> <!--jQuery-->
    <!--<script src="./creating_project.js"></script> Скрипт за създаване на нов проект-->
    <link rel="stylesheet" href="scrollbars.css"><!--Стилово офромление на scrollbars-->

</head>

<body class="overflow-y-auto" style="background-color: #d6f1ff;">
    <script>
        /*Проверява дали има logged акаунт */
        if (!localStorage.getItem('user') || localStorage.getItem('user') == null) {
            location.href = './home.html';
        }

        /*Променливи, уникални за един проект*/
        var members = [];
        var users = [];
        var pTitle = "";
        var pColor = "";

        /*Взимане на user id, project id от localStorage*/
        document.cookie = "userID=" + localStorage.getItem('user');
        document.cookie = "project=" + localStorage.getItem('projectID');
        /*Взимане на цвят*/
        function getColors(bg) {
            switch (bg) {
                case "0":
                    return ["#B11B22", "text-light"];
                    break;
                case "1":
                    return ["#E9640C", "text-black"];
                    break;
                case "2":
                    return ["#F6B213", "text-black"];
                    break;
                case "3":
                    return ["#CAC568", "text-black"];
                    break;
                case "4":
                    return ["#A8CC8F", "text-black"];
                    break;
                case "5":
                    return ["#007A5E", "text-light"];
                    break;
                case "6":
                    return ["#47C2FF", "text-light"];
                    break;
                case "7":
                    return ["#36276B", "text-light"];
                    break;
                case "8":
                    return ["#DB76DB", "text-light"];
                    break;
                default:
                    return ["#47C2FF", "text-light"];
                    break;
            }
        }

        /*Функция за единично презареждане на страницата за пълното изписване на съдържанието в нея */
        function reload() {
            window.onload = function() {
                if (!window.location.hash) {
                    window.location = window.location + '#loaded';
                    window.location.reload();
                }
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

    /*MYSQL колекция от символи*/
    $command = "SET CHARACTER SET utf8;";
    $setCharacterSet = mysqli_query($conn, $command);

    if(isset($_COOKIE['project'])){
        $projectID = $_COOKIE['project'];
    }else{
        echo "<script>window.location.reload();</script>";
    }

    /*Взима се цвета на фона и името на проекта*/
    $command = "SELECT * FROM `Projects` WHERE `project_id`='$projectID';";
    $getProjectInfo = mysqli_query($conn, $command);
    if ($getProjectInfo) {
        if ($getProjectInfo->num_rows != 0) {
            echo "<script>reload();</script>";
            while ($row = mysqli_fetch_assoc($getProjectInfo)) {
                $color = $row['background_id'];
                $pName = htmlspecialchars($row['project_name']);
                echo "<script>document.getElementsByTagName('body')[0].style.backgroundColor = getColors('$color')[0]; pTitle = '$pName'; pColor = getColors('$color')[1];</script>";
            }
        } else {
            echo "Грешка: " . mysqli_error($conn);
        }
    } else {
        echo "Грешка: " . mysqli_error($conn);
    }
    ?>
    <!--Заглавен елемент-->
    <header class="col-12 position-relative w-100 top-0 m-0 start-0 d-flex justify-content-between overflow-hidden" id="top-navigation" style="background-color: #F0F2F4;">
        <!--Лява част-->
        <div class="d-flex">
            <img src="./images/logo/official.png" alt="logo" style="height: 100px;" class="my-0 mx-3">
            <div class="align-middle m-auto d-md-flex d-none">
                <button class="btn mx-2 btn-lg" style="border: 2px solid #004e7a; color: #004e7a;" onmouseover="this.style.backgroundColor = '#004e7a'; this.style.color = '#99DDFF'; this.style.border = '2px solid #004e7a';" onmouseleave="this.style.backgroundColor = ''; this.style.color = '#004e7a'; this.style.border = '2px solid #004e7a';" onclick="location.href='projects.php#projects-content';">
                    Проекти</button>

                <button class="btn mx-2 btn-lg" style="border: 2px solid #004e7a; color: #004e7a;" onmouseover="this.style.backgroundColor = '#004e7a'; this.style.color = '#99DDFF'; this.style.border = '2px solid #004e7a';" onmouseleave="this.style.backgroundColor = ''; this.style.color = '#004e7a'; this.style.border = '2px solid #004e7a';" data-bs-toggle="modal" data-bs-target="#create" type="button">
                    Създай</button>
            </div>
        </div>

        <!--Дясна част-->
        <div class="pe-md-5 m-3 d-md-flex d-none align-items-center">
            <button class="btn mx-2 btn-lg" style="border: 2px solid #004e7a; color: #004e7a;" onmouseover="this.style.backgroundColor = '#004e7a'; this.style.color = '#99DDFF'; this.style.border = '2px solid #004e7a';" onmouseleave="this.style.backgroundColor = ''; this.style.color = '#004e7a'; this.style.border = '2px solid #004e7a';" onclick="location.href='home.php#about-homepage'">
                За Нас</button>

            <button class="btn mx-2 btn-lg" style="border: 2px solid #004e7a; color: #004e7a;" onmouseover="this.style.backgroundColor = '#004e7a'; this.style.color = '#99DDFF'; this.style.border = '2px solid #004e7a';" onmouseleave="this.style.backgroundColor = ''; this.style.color = '#004e7a'; this.style.border = '2px solid #004e7a';" onclick="location.href='home.php#help-homepage'">
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
                    <button class="btn m-2 btn-lg w-100" style="border: 2px solid #004e7a; color: #004e7a;" onclick="location.href='projects.php#projects-content';" onmouseover="this.style.backgroundColor = '#004e7a'; this.style.color = '#99DDFF'; this.style.border = '2px solid #004e7a';" onmouseleave="this.style.backgroundColor = ''; this.style.color = '#004e7a'; this.style.border = '2px solid #004e7a';" data-bs-dismiss="offcanvas">
                        Проекти</button>
                    <button class="btn m-2 btn-lg w-100" style="border: 2px solid #004e7a; color: #004e7a;" onmouseover="this.style.backgroundColor = '#004e7a'; this.style.color = '#99DDFF'; this.style.border = '2px solid #004e7a';" onmouseleave="this.style.backgroundColor = ''; this.style.color = '#004e7a'; this.style.border = '2px solid #004e7a';" data-bs-toggle="modal" data-bs-target="#create" type="button" data-bs-dismiss="offcanvas">
                        Създай</button>
                    <button class="btn m-2 btn-lg w-100" style="border: 2px solid #004e7a; color: #004e7a;" onclick="location.href='home.php#about-homepage'" onmouseover="this.style.backgroundColor = '#004e7a'; this.style.color = '#99DDFF'; this.style.border = '2px solid #004e7a';" onmouseleave="this.style.backgroundColor = ''; this.style.color = '#004e7a'; this.style.border = '2px solid #004e7a';" data-bs-dismiss="offcanvas">
                        За Нас</button>
                    <button class="btn m-2 btn-lg w-100" style="border: 2px solid #004e7a; color: #004e7a;" onclick="location.href='home.php#help-homepage'" onmouseover="this.style.backgroundColor = '#004e7a'; this.style.color = '#99DDFF'; this.style.border = '2px solid #004e7a';" onmouseleave="this.style.backgroundColor = ''; this.style.color = '#004e7a'; this.style.border = '2px solid #004e7a';" data-bs-dismiss="offcanvas">
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
                        <p class="my-1" id="userName">Име Фамилия</p>
                        <p class="my-1" id="userEmail">e-mail</p>
                    </div>
                </div>
            </div>
            <div class="offcanvas-body">
                <!--Настройки - за бъдеща реализация
                    <button class="w-100 btn mx-2 my-1 btn-lg" style="color: #003554;"
                    onmouseover="this.style.backgroundColor = '#003554'; this.style.color = '#99DDFF';"
                    onmouseleave="this.style.backgroundColor = ''; this.style.color = '#003554';">Настройки</button>-->
                <button class="w-100 btn mx-2 my-1 btn-lg" style="color: #003554;" onmouseover="this.style.backgroundColor = '#003554'; this.style.color = '#99DDFF';" onmouseleave="this.style.backgroundColor = ''; this.style.color = '#003554';" onclick="location.href='home.php#help-homepage';">Помощ</button>
                <button class="w-100 btn mx-2 my-1 btn-lg" style="color: #003554;" onmouseover="this.style.backgroundColor = '#003554'; this.style.color = '#99DDFF';" onmouseleave="this.style.backgroundColor = ''; this.style.color = '#003554';" onclick="localStorage.removeItem('user'); location.href='home.html';">Излез</button>
            </div>
        </div>
    </header>

    <!--Лента с допълнителни настройки на един проект-->
    <div class="d-flex w-100 py-2 border-bottom justify-content-end">
        <div class="flex-fill justify-content-center d-flex">
            <h1 class="fs-1" id="project-title"></h1>
        </div>
        <div class="col-3 justify-content-end d-flex">
            <p class="btn btn-primary mx-3 text-center align-middle my-auto" data-bs-toggle="offcanvas" data-bs-target="#addMemberOffCanva" aria-controls="addMemberOffcanvas" onclick="printMembers();">
                Добави Екип<i class="bi bi-plus-circle ms-2 align-middle my-auto"></i>
            </p>
        </div>
    </div>

    <!--Контейнер с таблиците и задачите на един проект-->
    <div class="d-inline-block flex-row overflow-y-auto w-100 pt-3">
        <div class="d-flex flex-row" id="tables-container">

            <!--Таблица Зададено-->
            <div class="col-lg-3 col-md-4">
                <div class="card mx-2 d-flex flex-column col-11">
                    <h5 class="card-header text-truncate" title="Зададено">Зададено</h5>

                    <div class="card-body overflow-y-auto overflow-y-auto" id="todo" style="max-height: 60vh;">
                    </div>
                    <div class="card-footer d-flex justify-content-center">
                        <p class="btn btn-primary mx-3 text-center d-flex justify-content-center col-12 align-middle my-auto" onclick="createTask();">Добави Задача<i class="bi bi-plus-circle ms-2 align-middle my-auto"></i></p>
                    </div>
                </div>
            </div>

            <!--Таблица В прогрес-->
            <div class="col-lg-3 col-md-4">
                <div class="card mx-2 d-flex flex-column col-11">
                    <h5 class="card-header text-truncate" title="В прогрес">В прогрес
                    </h5>

                    <div class="card-body overflow-y-auto" id="inprogress" style="max-height: 70vh;">
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
                <input type="email" class="form-control mb-1" id="email-member" name="email-member" placeholder="name" required>
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

    <!--Модал за създаване на проект-->
    <div class="modal fade" id="create" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen-sm-down">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title fs-5" id="staticBackdropLabel">Създай проект</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="./onlyPHP/create_project.php" method="post" autocomplete="off">
                    <div class="modal-body">
                        <div class="w-100">
                            <img class="img-fluid" src="./images/patterns for projects/blue-bg2.png" alt="Example of tables" id="project-pattern">
                        </div>
                        <div class="form-floating w-100 mt-3 position-relative">
                            <input type="name" name="name-of-project" class="form-control" id="name-of-project" onkeyup="verificateData();" placeholder="name" required>
                            <label for="name-of-project">Име на проект</label>
                        </div>

                        <div class="w-100 mt-3 position-relative" id="color-picking">
                            <span>Гама на проект</span>
                            <ul class="colorpicker w-100 h-100 d-flex overflow-x-auto list-unstyled fs-4">
                                <li class="col-2 py-2 text-center text-light" id="red-bg" style="background-color: #B11B22;" onclick="selectedColor(this.id)">A</li>
                                <li class="col-2 py-2 text-center text-black" id="orange-bg" style="background-color: #E9640C;" onclick="selectedColor(this.id)">A</li>
                                <li class="col-2 py-2 text-center text-black" id="yellow-bg" style="background-color: #F6B213;" onclick="selectedColor(this.id)">A</li>
                                <li class="col-2 py-2 text-center text-black" id="lime-bg" style="background-color: #CAC568;" onclick="selectedColor(this.id)">A</li>
                                <li class="col-2 py-2 text-center text-black" id="lightgreen-bg" style="background-color: #A8CC8F;" onclick="selectedColor(this.id)">A</li>
                                <li class="col-2 py-2 text-center text-light" id="green-bg" style="background-color: #007A5E;" onclick="selectedColor(this.id)">A</li>
                                <li class="col-2 py-2 text-center text-black" id="blue-bg" style="background-color: #47C2FF;" onclick="selectedColor(this.id)">A</li>
                                <li class="col-2 py-2 text-center text-light" id="purple-bg" style="background-color: #36276B;" onclick="selectedColor(this.id)">A</li>
                                <li class="col-2 py-2 text-center text-black" id="pink-bg" style="background-color: #DB76DB;" onclick="selectedColor(this.id)">A</li>
                            </ul>
                            <div class="form-floating w-100 mt-3 position-relative">
                                <input type="name" name="color" class="form-control" id="color-of-project" placeholder="name" value="blue-bg" readonly>
                                <label for="color-of-project">Код на тема</label>
                            </div>
                        </div>

                        <div class="form-floating w-100 mt-3 position-relative">
                            <textarea type="name" name="description" class="form-control" id="description" placeholder="name" style="min-height: 120px;" onkeyup="verificateData();" required></textarea>
                            <label for="description">Описание на проект</label>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" id="close-create-modal" onclick="alert('Направените промени няма да се запазят.');" data-bs-dismiss="modal">Отмени</button>
                        <button type="submit" class="btn btn-primary" id="create-project-btn" onclick="restartCreateModal();" disabled>Създай</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--Модал за възлагане на задача-->
    <div class="modal fade" id="assign-task" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen-sm-down">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title fs-5" id="assignTaskH2">Възложи задача</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="./onlyPHP/assignTasks.php" method="post" autocomplete="off">
                    <div class="modal-body">
                        <ul class="list-group" id="list-members-assign">
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" id="close-create-modal" onclick="alert('Направените промени няма да се запазят.');" data-bs-dismiss="modal">Отмени</button>
                        <button type="submit" class="btn btn-primary">Възложи</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--Скрипт за създаване на нова задача, проследяване на прогреса и добавяне членове на екипа-->
    <script>
        /*Задава името на проекта*/
        document.getElementById('project-title').innerText = pTitle;
        document.getElementById('project-title').classList.add(pColor);
        document.title = "ПланА - " + pTitle;

        /*Добавя e-mail към екип*/
        var team_list = document.getElementById('team-list');

        /*Добавя се член на екипа визуално*/
        function addMember() {
            if (members.length == 0) {
                team_list.innerHTML = '';
            }
            let email_member = document.getElementById('email-member').value;
            if (members.includes(email_member)) {
                alert("Този e-mail е вече член на екипа.");
            } else if (email_member == "") {
                alert("Невалиден e-mail");
            } else if (!users.includes(email_member)) {
                alert("Това не е наш потребител.");
            } else {
                //Добавя email към БД след определените (предварителни) верификации [горепосочените if(); else if();]
                $.ajax({
                    url: './onlyPHP/addMember.php',
                    type: 'POST',
                    data: {
                        email_member: email_member
                    },
                    success: function(response) {
                        $(team_list).append('<li class="list-group-item">' + email_member + '</li>');
                        members.push(email_member);
                        if (response.success) {} else {}
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }
        }

        /*Изписва членове на екип */
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

        /*Функцията принтира задачите в БД и активно update-ва в нея */
        function printTaskTemplate(taskTitle, statusNum, taskID, assigned) {
            status = returnStatusOfTable(parseInt(statusNum));

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
            task_text.value = taskTitle;

            task_text.addEventListener("click", function() {
                task_text.select();
            });
            task_text.addEventListener("focusout", function() {
                //Актуализира името на задачата в БД
                $.ajax({
                    url: './onlyPHP/changeTaskTitleByID.php',
                    type: 'POST',
                    data: {
                        task_text: task_text.value,
                        task_ID: taskID
                    },
                    success: function(response) {
                        window.location.reload();
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });

            //Бутони на задача
            let task_btn_container = document.createElement('div');
            task_btn_container.classList.add('justify-content-between', 'align-middle', 'my-auto', 'd-flex', 'flex-row');

            //Бутон за задаване на човек
            let assign_member = document.createElement('i');
            assign_member.classList.add('bi', 'bi-plus-circle', 'w-50', 'px-2', 'fs-3');
            assign_member.addEventListener("click", function() {
                localStorage.setItem('taskID', taskID);
                /*Взимане на task id от localStorage като бисквитка*/
                document.cookie = "taskID=" + localStorage.getItem('taskID');
                assignTask(task_text.value, assigned);
            });

            //Бутон за преместване напред в таблиците
            let move_task = document.createElement('i');
            move_task.classList.add('bi', 'bi-arrow-right-circle', 'w-50', 'px-2', 'fs-3');
            checkIfTaskIsClosed(move_task, status);

            task_btn_container.appendChild(assign_member);
            task_btn_container.appendChild(move_task);

            task_text_conatiner.append(task_text);

            task.appendChild(task_text_conatiner);
            task.appendChild(task_btn_container);

            document.getElementById(status).appendChild(task);

            move_task.addEventListener("click", function() {
                statusNum++;
                status = returnStatusOfTable(statusNum);
                document.getElementById(status).appendChild(task);
                checkIfTaskIsClosed(move_task, status);
                //Функцията променя статуса на задача в БД
                $.ajax({
                    url: './onlyPHP/changeTaskStatusByID.php',
                    type: 'POST',
                    data: {
                        task_status: statusNum,
                        task_ID: taskID
                    },
                    success: function(response) {},
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        }

        //Функцията създава нов ред в БД за задача
        function createTask() {
            $.ajax({
                url: './onlyPHP/addTask.php',
                type: 'POST',
                data: {
                    task_text: "Задача"
                },
                success: function(response) {
                    window.location.reload();
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
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

        function assignTask(task, assigned) {
            list_members_assign.innerHTML = "";
            for (let i = 0; i < members.length; i++) {
                let member = members[i];
                let li = document.createElement('li');
                li.classList.add('list-group-item');
                let input = document.createElement('input');
                input.classList.add('form-check-input', 'me-1');
                input.type = 'checkbox';
                input.id = 'memberCheckBox' + i;
                input.name = 'membersAssign[]';
                input.value = member;
                if (assigned.includes(member)) {
                    input.checked = true;
                    input.addEventListener("change", function() {
                        if (input.checked == false) {
                            //Премахва назначаването на задача на член от БД
                            $.ajax({
                                url: './onlyPHP/unassign.php',
                                type: 'POST',
                                data: {
                                    email_member: member
                                },
                                success: function(response) {},
                                error: function(xhr, status, error) {
                                    console.error(xhr.responseText);
                                }
                            });
                        }
                    });
                }
                let label = document.createElement('label');
                label.classList.add('form-check-label', 'ms-1');
                label.innerHTML = member;
                label.htmlFor = input.id;
                li.append(input);
                li.append(label);
                list_members_assign.append(li);
            }
            document.getElementById('assignTaskH2').innerText = task + " - възложи задача";
            $('#assign-task').modal('show');
        }
    </script>

    <!--Скрипт за модала за създаване на нов проект-->
    <script>
        const colors = ["red-bg", "orange-bg", "yellow-bg", "lime-bg", "lightgreen-bg", "green-bg", "blue-bg", "purple-bg", "pink-bg"];

        var name_of_project = null;
        var background = 'blue-bg';
        var description = null;
        var create_btn = document.getElementById('create-project-btn');

        /*Селектира се цветовата гама на проект*/
        function selectedColor(color) {
            colors.forEach(item => {
                if (item != color) {
                    let other = document.getElementById(item);
                    other.classList.add('opacity-50');
                    other.innerHTML = 'A';
                }
            });
            let select = document.getElementById(color);
            select.innerHTML = '<i class="bi bi-check"></i>';
            select.classList.remove('opacity-50');
            document.getElementById('project-pattern').src = ("./images/patterns for projects/" + (color + "2.png"));
            background = color;
            document.getElementById('color-of-project').value = background;
        }

        /*Верифицира се, че данните са попълнени с някакви ст-сти*/
        function verificateData() {
            name_of_project = document.getElementById('name-of-project').value;
            description = document.getElementById('description').value;

            if (!(/[a-zA-Z]/.test(name_of_project) && !/[a-zA-Z]/.test(description))) {
                create_btn.disabled = false;
            } else {
                create_btn.disabled = true;
            }
        }

        /*Рестартиране на модала за създаване*/
        function restartCreateModal() {
            $('#create').modal('hide');

            setTimeout(function() {
                $('#name-of-project').val('');
                $('#description').val('');
                create_btn.disabled = true;
                colors.forEach(item => {
                    let color_block = document.getElementById(item);
                    color_block.classList.remove('opacity-50');
                    color_block.innerHTML = 'A';
                });
                document.getElementById('project-pattern').src = ("./images/patterns for projects/blue_bg2.png");
            }, 1000);
        }
    </script>

    <!--PHP за комуникация с БД: 
        - за цвят, текст, име;
        - за членове на екип;
        - за задачите, името им, статуса им и на кого са назначени;
        - информация за профила
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

    /*Изписват се членовете на един екип с техните e-mails, 
намерени чрез id's и се записват като членове на екип към проект*/
    $command = "SELECT Users.email 
                FROM Members 
                INNER JOIN Users ON Members.member_id = Users.user_id
                WHERE Members.projects_id = '$projectID' 
                GROUP BY Members.member_id;";
    $getMembers = mysqli_query($conn, $command);
    if (!$getMembers) {
        echo ("Error description: " . mysqli_error($conn));
    }
    while ($row = mysqli_fetch_assoc($getMembers)) {
        $email = strval($row['email']);
        echo "<script>members.push('$email');</script>";
    }
    $command = "SELECT `email` FROM `Users`";
    $getUsers = mysqli_query($conn, $command);

    if (!$getUsers) {
        echo ("Error description: " . mysqli_error($conn));
    }
    while ($row = mysqli_fetch_assoc($getUsers)) {
        $user = strval($row['email']);
        echo "<script>users.push('$user');</script>";
    }

    /*Взимат се задачите към проекта и се изписват*/
    $command = "SELECT * FROM `Tasks` WHERE `project_id` = '$projectID';";
    $getTasks = mysqli_query($conn, $command);
    if (!$getTasks) {
        echo ("Error description: " . mysqli_error($conn));
    }
    while ($row = mysqli_fetch_assoc($getTasks)) {
        $taskTitle = $row['task_label'];
        $taskStatus = $row['task_status'];
        $taskID = $row['task_id'];
        $assignedMemb = [];
        $command = "SELECT `member_id` FROM `Members` WHERE `task_id` = '$taskID';";
        $getUsers = mysqli_query($conn, $command);
        while ($row2 = mysqli_fetch_assoc($getUsers)) {
            $userID = $row2['member_id'];
            $command = "SELECT `email` FROM `Users` WHERE `user_id`='$userID' LIMIT 1;";
            $getEmail = mysqli_query($conn, $command);
            $row3 = mysqli_fetch_assoc($getEmail);
            $email = $row3['email'];
            array_push($assignedMemb, $email);
        }
        $assignedMembJSON = json_encode($assignedMemb);
        echo "<script>printTaskTemplate('$taskTitle', '$taskStatus', '$taskID', '$assignedMembJSON');</script>";
    }

    /*Попълва се информация за потребителя */
    $userID = $_COOKIE['userID'];
    $command = "SELECT * FROM `Users` WHERE `user_id` = '$userID' LIMIT 1;";
    $getUserInfo = mysqli_query($conn, $command);
    $row = mysqli_fetch_assoc($getUserInfo);
    $name = $row['full_name'];
    $email = $row['email'];
    echo "<script>document.getElementById('userName').innerText = '$name'; document.getElementById('userEmail').innerText = '$email';</script>";
    ?>
</body>

</html>

<!--
    БД - База данни
    ст-сти - стойности
-->