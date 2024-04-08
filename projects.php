<!DOCTYPE html>
<html lang="en">

<!--Страница с всички проекти на един потребител-->

<!--ИЗПОЛЗВАНИ:
        - HTML5;
        - CSS3;
        - JAVASCRIPT;
        - BOOTSTRAP;
        - JQUERY;
        - AJAX;
    -->


<!--RACIONALIZIRAI PHP-->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ПланА Проекти</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!--Bootstrap 5.3.2 - JS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!--Bootstrap icons-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!--Bootstrap 5.3.2 - CSS-->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> <!--jQuery-->
    <!--<script src="./creating_project.js"></script>Скрипт за създаване на нов проект-->
    <link rel="stylesheet" href="scrollbars.css"><!--Стилово офромление на scrollbars-->
</head>

<body class="overflow-y-auto" style="background-color: #d6f1ff;">

    <script>
        /*Проверява дали има logged акаунт */
        if (!localStorage.getItem('user') || localStorage.getItem('user') == null) {
            location.href = './home.html';
        }

        function reload() {
            window.onload = function() {
                if (!window.location.hash) {
                    window.location = window.location + '#loaded';
                    window.location.reload();
                }
            }
        }
    </script>

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

    <!--Контейнер за проекти-->
    <div class="w-100 overflow-y-hidden overflow-x-hidden position-relative d-md-flex d-block" id="content-homepage" style="top: 0; background-color: #d6f1ff;">
        <div class="col-md-12 px-3">

            <!--Име на страница - Проекти-->
            <div class="overflow-hidden pt-2 d-flex justify-content-around" style="color: #004e7a;" id="projects-content">
                <div class="d-md-flex d-block justify-content-around">
                    <h2 class="py-2 px-4 col-md-8 w-100 text-center">Проекти</h2>
                </div>
            </div>

            <!--Контейнер със съдържанието-->
            <div class="h-100 d-flex me-3">
                <div class="row col-12 mx-4 d-flex position-relative align-content-start justify-content-around justify-content-md-between flex-wrap overflow-hidden" style=" border-top: 2px solid #004e7a;" id="cards-container">
                </div>
            </div>
        </div>

        <!--Контейнер със задачи - За бъдеща реализация
        <div class="flex-fill m-4 overflow-y-auto overflow-x-hidden top-0" style="height: fit-content;"
            style="background-color: #F0F2F4;">
            <fieldset class="px-2 w-100 d-md-flex d-block position-relative" style="border: solid 2px #003554;">
                <legend class="fw-bold float-none ps-2" style="color: #003554;">Настоящи задачи</legend>
                <div class="w-100 d-block">
                    <div class="card mx-2 my-2" style="height: 100px; background-color: #37007a; color: #F0F2F4;">
                        <div class="card-img-overlay overflow-y-auto overflow-x-hidden py-1">
                            <div class="d-lg-flex d-block justify-content-between mx-2 align-middle m-auto">
                                <div class="w-100 my-0 my-lg-2">
                                    <h5 class="card-title w-100">Задача</h5>
                                    <p class="card-text w-100"><small>Име Проект</small></p>
                                </div>
                                <div class="w-100 my-0 my-lg-2">
                                    <p class="card-title w-100">24/12/2024</p>
                                    <p class="card-text w-100 d-lg-flex d-none"><small>Статус</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </fieldset>
        </div>-->
    </div>

    <!--Модал за създаване на проект-->
    <div class="modal fade" id="create" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen-sm-down">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title fs-5" id="staticBackdropLabel">Създай проект</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="./create_project.php" method="post" autocomplete="off">
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
                            <div class="form-floating w-100 mt-3 position-relative">
                                <input type="name" name="color" class="form-control" id="color-of-project" placeholder="name" value="blue-bg" required>
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

    <!--Скрипт за отпечатване на картите с таблици-->
    <script>
        let cards_container = document.getElementById('cards-container');
        /*Генериране на карти за проект*/
        function generateProjectCard(name, description, bg, id) {
            //cards_container.innerHTML = '';
            let card = document.createElement('div');
            let text = getColors(bg)[1];
            let bgColor = getColors(bg)[0];
            card.classList.add('card', 'mx-1', 'mt-2', 'col-md-3', 'col-12', text);
            card.style.height = '150px';
            card.style.backgroundColor = bgColor;

            let card_display = document.createElement('div');
            card_display.classList.add('card-img-overlay', 'overflow-y-auto', 'overflow-x-hidden', 'text-break');

            let h5 = document.createElement('h5');
            h5.classList.add('card-title');
            h5.innerText = name;
            card_display.append(h5);

            let details = document.createElement('details');
            details.classList.add('d-flex');

            let summary = document.createElement('summary');
            summary.classList.add('card-text');
            summary.innerText = "Описание";
            details.append(summary);

            let p = document.createElement('p');
            p.classList.add('card-text');
            p.innerText = description.replace(/['"]+/g, '');
            details.append(p);

            card_display.append(details);
            card.append(card_display);
            cards_container.append(card);

            h5.addEventListener("click", function() {
                localStorage.setItem('projectID', id);
                location.href = './loaded_project.php';
            });
        }

        /*Взимане на цвят*/
        function getColors(bg) {
            switch (bg) {
                case "0":
                    return ["#F94144", "text-light"];
                    break;
                case "1":
                    return ["#F3722C", "text-black"];
                    break;
                case "2":
                    return ["#F9C74F", "text-black"];
                    break;
                case "3":
                    return ["#C5C35E", "text-black"];
                    break;
                case "4":
                    return ["#90BE6D", "text-black"];
                    break;
                case "5":
                    return ["#007A5E", "text-light"];
                    break;
                case "6":
                    return ["#314087", "text-light"];
                    break;
                case "7":
                    return ["#7462AB", "text-light"];
                    break;
                case "8":
                    return ["#8A4A8A", "text-light"];
                    break;
                default:
                    return ["#314087", "text-light"];
                    break;
            }
        }

        /*Изписва съобщение, че няма проекти*/
        function noProjects() {
            /*RAZKRASI!!!    */
            cards_container.innerHTML = '';
            cards_container.innerHTML = '<p>Няма проекти.</p>';
            console.log("nqq proekti");
        }

        /*Взимане на user id от localStorage*/
        document.cookie = "userID=" + localStorage.getItem('user');
    </script>

    <!--PHP за взимане на информацията за отпечатване на картите с таблици-->
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

    echo "<script>reload()</script>";
    //Взима от бисквитката userID и търси съответните IDs, за да изпише проектите
    $userID = $_COOKIE['userID'];
    if ($userID != '') {
        $command = "SELECT `projects_id` FROM `Members` WHERE `member_id` = '$userID' GROUP BY `projects_id`;"; //check if works
        $getProjects = mysqli_query($conn, $command);
        if ($getProjects->num_rows == 0) {
            echo "<script>noProjects();</script>";
        } else {

            while ($row = mysqli_fetch_assoc($getProjects)) { //check if works
                $pID = $row['projects_id'];
                $command = "SELECT * FROM `Projects` WHERE `project_id` = '$pID';"; //check if works
                $getInfo = mysqli_query($conn, $command);
                while ($row2 = mysqli_fetch_assoc($getInfo)) {
                    $pName = $row2['project_name'];
                    $pDescr = json_encode($row2['project_description']);
                    $pBg = $row2['background_id'];
                    $pID = $row2['project_id'];
                    echo "<script>generateProjectCard( '$pName', '$pDescr', '$pBg', '$pID');</script>";
                }
            }
        }

        /*Попълва се информация за потребителя */
        $command = "SELECT * FROM `Users` WHERE `user_id` = '$userID' LIMIT 1;";
        $getUserInfo = mysqli_query($conn, $command);
        $row = mysqli_fetch_assoc($getUserInfo);
        $name = $row['full_name'];
        $email = $row['email'];
        echo "<script>document.getElementById('userName').innerText = '$name'; document.getElementById('userEmail').innerText = '$email';</script>";
    }
    ?>
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
</body>

</html>