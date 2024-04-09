<!DOCTYPE html>
<html lang="en">

<!--Първата страница, която потребител БЕЗ акаунт вижда-->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ПланА</title>
    <link rel="icon" href="./images/logo/tab_ico.png"> <!--За да се постави икона в tab в браузъра-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!--Bootstrap 5.3.2 - CSS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!--Bootstrap icons-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!--Bootstrap 5.3.2 - JS-->
    <link rel="stylesheet" href="scrollbars.css"><!--Стилово офромление на scrollbars-->
    <!--Стилово офромление на градиентната анимация в За Нас контейнера-->
    <style>
        #about-homepage {
            background: linear-gradient(-45deg, #87d5fc, #64aed9, #0476b8);
            background-size: 400% 400%;
            animation: gradient 5s ease infinite;
        }

        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }
    </style>

</head>

<body class="overflow-y-auto" style="background-color: #d6f1ff;">
    <script>
        /*Проверява дали има logged акаунт */
        if (!localStorage.getItem('user') || localStorage.getItem('user') == null) {
            location.href = './home.html';
        }

        /*Взимане на user id от localStorage*/
        document.cookie = "userID=" + localStorage.getItem('user');
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
                    <!--BUG--><button class="btn m-2 btn-lg w-100" style="border: 2px solid #004e7a; color: #004e7a;" onclick="location.href='home.php#about-homepage'" onmouseover="this.style.backgroundColor = '#004e7a'; this.style.color = '#99DDFF'; this.style.border = '2px solid #004e7a';" onmouseleave="this.style.backgroundColor = ''; this.style.color = '#004e7a'; this.style.border = '2px solid #004e7a';" data-bs-dismiss="offcanvas">
                        За Нас</button>
                    <!--BUG--><button class="btn m-2 btn-lg w-100" style="border: 2px solid #004e7a; color: #004e7a;" onclick="location.href='home.php#help-homepage'" onmouseover="this.style.backgroundColor = '#004e7a'; this.style.color = '#99DDFF'; this.style.border = '2px solid #004e7a';" onmouseleave="this.style.backgroundColor = ''; this.style.color = '#004e7a'; this.style.border = '2px solid #004e7a';" data-bs-dismiss="offcanvas">
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

    <!--Основно съдържание на страницата-->
    <div class="w-100 overflow-hidden position-relative d-md-flex d-block" style="top: 0;">
        <!--Контейнер за съдаржанието на страницата-->
        <div class="" id="content-homepage">
            <!--За нас-->
            <div id="about-homepage" class="pb-5">
                <!--Вход/Регистрация и име-->
                <div class="w-100 d-flex justify-content-center align-items-center">
                    <div class="w-100 mx-3 my-2 py-5 col-8">
                        <h1 class="bold mx-5 text-center fs-md-3 fs-1">ПланА</h1>
                        <p class="fs-3 mx-5 text-center" id="maininfo-homepage">
                            Управлявайте напредъка на вашия екип лесно и постигайте най-добри резултати.
                        </p>
                    </div>
                </div>

                <!--Таблици с описание на проекта-->
                <div class="w-100 d-flex justify-content-center">
                    <div class="col-10 p-3 m-2 py-4" style="background-color: #F0F2F4;">
                        <div class="d-flex justify-content-center align-items-center">
                            <p class="text-break col-11" id="info-homepage" style="font-size: large;">Ефективното
                                управление на проекти е от
                                съществено значение за
                                ефективността на всяка корпорация в днешния забързан
                                бизнес свят. Управлението на дейности, отговорности и срокове може да бъде трудно,
                                особено
                                когато работите в екип.
                                <strong>ПланА</strong> е ефективно уеб приложение, което ще даде възможност на
                                вашия бизнес екип, като
                                предостави онлайн платформа за
                                организиране на задълженията по проекта.
                            </p>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="accordion col-11" id="accordionExample">
                                <!--Акордеон за Управление на задачите-->
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button collapsed fs-5" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne" style="background-color: #1fb4ff; color: #051923;">
                                            Управление на задачите
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body fs-6 text-break">
                                            <strong>ПланА</strong> оптимизира управлението на задачите, като предлага
                                            удобен
                                            за потребителя
                                            интерфейс, където членовете на екипа
                                            могат без усилие да създават, възлагат и проследяват дейности. Платформата
                                            осигурява
                                            категоризиране на работата и
                                            установяване на приоритети, като гарантира ясно разбиране на дълбочината на
                                            всеки
                                            проект.
                                        </div>
                                    </div>
                                </div>
                                <!--Акордеон за Kanban таблици-->
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed fs-5" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" style="background-color: #3ebfff; color: #051923;">
                                            Kanban таблици
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body fs-6 text-break">
                                            <strong>ПланА</strong> предполага създаването на Kanban таблици, за да
                                            повиши
                                            ефективността на вашия
                                            екип и да рационализира работните
                                            процеси на проекта. Kanban е визуален метод за управление, който се е
                                            доказал
                                            като
                                            мощен инструмент за организиране на
                                            задачи, подобряване на сътрудничеството и предоставяне на цялостен поглед
                                            върху
                                            напредъка и състоянието на проекта. С
                                            напредването на задачите през колони като „Да направя“, „В ход“ и
                                            „Завършени“,
                                            членовете на екипа могат лесно да
                                            проследяват и наблюдават напредъка в реално време. С прилагането на Kanban
                                            таблици от
                                            <strong>ПланА</strong>, управлението на проекти
                                            никога не е било по-лесно.
                                        </div>
                                    </div>
                                </div>
                                <!--Акордеон за Развитие на проект-->
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed fs-5" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" style="background-color: #5cc9ff; color: #051923;">
                                            Развитие на проект
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body fs-6 text-break">
                                            Функцията за проследяване на <strong>ПланА</strong> ви помага да
                                            визуализирате
                                            прогреса на проекта.
                                            Софтуерът позволява на екипите
                                            да проследяват етапите на изпълнението на зададените задачи, което дава на
                                            членовете
                                            пълна представа за напредъка на
                                            проекта.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Помощ-->
            <div id="help-homepage" class="pb-5">
                <!--Вход/Регистрация и име-->
                <div class="w-100 d-flex justify-content-center align-items-center">
                    <div class="w-100 mx-3 my-2 py-5 col-8">
                        <h1 class="bold mx-5 text-center fs-md-3 fs-1">ПланА</h1>
                        <p class="fs-3 mx-5 text-center" id="maininfo-homepage">
                            Управлявайте напредъка на вашия екип лесно и постигайте най-добри резултати.
                        </p>
                        <div class="d-flex justify-content-center mx-5 pt-4">
                            <button class="btn fs-4 mx-2 col-md-4" style="border: 2px solid #003554; color: #F0F2F4; background-color: #003554;" onclick="location.href='./login.html'" onmouseover="this.style.backgroundColor = ''; this.style.color = '#003554'; this.style.border = '2px solid #003554';" onmouseleave="this.style.backgroundColor = '#003554'; this.style.color = '#F0F2F4'; this.style.border = '2px solid #003554';">
                                Вход
                            </button>
                            <button class="btn fs-4 mx-2 col-md-4" style="border: 2px solid #003554; color: #F0F2F4; background-color: #003554;" onclick="location.href='./registration.html'" onmouseover="this.style.backgroundColor = ''; this.style.color = '#003554'; this.style.border = '2px solid #003554';" onmouseleave="this.style.backgroundColor = '#003554'; this.style.color = '#F0F2F4'; this.style.border = '2px solid #003554';">
                                Регистрация
                            </button>
                        </div>
                    </div>
                </div>

                <!--Таблици с описание на проекта-->
                <div class="w-100 d-flex justify-content-center">
                    <div class="col-10 p-3 m-2 py-4" style="background-color: #F0F2F4;">
                        <div class="d-flex justify-content-center align-items-center">
                            <p class="text-break col-11" id="info-homepage" style="font-size: large;">Ефективното
                                управление на проекти е от
                                съществено значение за
                                ефективността на всяка корпорация в днешния забързан
                                бизнес свят. Управлението на дейности, отговорности и срокове може да бъде трудно,
                                особено
                                когато работите в екип.
                                <strong>ПланА</strong> е ефективно уеб приложение, което ще даде възможност на
                                вашия бизнес екип, като
                                предостави онлайн платформа за
                                организиране на задълженията по проекта.
                            </p>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="accordion col-11" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button collapsed fs-5" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne" style="background-color: #1fb4ff; color: #051923;">
                                            Управление на задачите
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body fs-6 text-break">
                                            <strong>ПланА</strong> оптимизира управлението на задачите, като предлага
                                            удобен
                                            за потребителя
                                            интерфейс, където членовете на екипа
                                            могат без усилие да създават, възлагат и проследяват дейности. Платформата
                                            осигурява
                                            категоризиране на работата и
                                            установяване на приоритети, като гарантира ясно разбиране на дълбочината на
                                            всеки
                                            проект.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed fs-5" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" style="background-color: #3ebfff; color: #051923;">
                                            Kanban таблици
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body fs-6 text-break">
                                            <strong>ПланА</strong> предполага създаването на Kanban таблици, за да
                                            повиши
                                            ефективността на вашия
                                            екип и да рационализира работните
                                            процеси на проекта. Kanban е визуален метод за управление, който се е
                                            доказал
                                            като
                                            мощен инструмент за организиране на
                                            задачи, подобряване на сътрудничеството и предоставяне на цялостен поглед
                                            върху
                                            напредъка и състоянието на проекта. С
                                            напредването на задачите през колони като „Да направя“, „В ход“ и
                                            „Завършени“,
                                            членовете на екипа могат лесно да
                                            проследяват и наблюдават напредъка в реално време. С прилагането на Kanban
                                            таблици от
                                            <strong>ПланА</strong>, управлението на проекти
                                            никога не е било по-лесно.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed fs-5" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" style="background-color: #5cc9ff; color: #051923;">
                                            Развитие на проекта
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body fs-6 text-break">
                                            Функцията за проследяване на <strong>ПланА</strong> ви помага да
                                            визуализирате
                                            прогреса на проекта.
                                            Софтуерът позволява на екипите
                                            да проследяват етапите на изпълнението на зададените задачи, което дава на
                                            членовете
                                            пълна представа за напредъка на
                                            проекта.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
    <!--PHP за комуникация с БД и извличане на данните за аканут-->
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

    /*Попълва се информация за потребителя*/
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
-->