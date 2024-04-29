<?php session_start(); ?>

<!doctype html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Регистрация</title>
    <meta name="description" content="Акции и призы ежедневно">
    <link href="../styles/bootstrap.css" rel="stylesheet">
    <link href="../styles/style.css" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</head>

<body class="d-flex flex-column min-vh-100">
<section class="d-none d-md-block sticky-top">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-md nav-underline bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="../index.php">
                    <img src="../shared/logos/main.svg" alt="Logo" width="auto" height="50" class="d-inline-block align-text-center">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarNavDropdown">
                    <ul class="navbar-nav gap-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../index.php">Главная</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../pages/catalog.php">Каталог</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../pages/promo.php">Акции</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Дополнительно
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../pages/promo.php">Ввести промокод</a></li>
                                <li><a class="dropdown-item" href="../pages/about.php">Разработчики</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="navbar-nav gap-3">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-circle"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="registration.php">Регистрация</a></li>
                                <li><a class="dropdown-item" href="authorization.php">Авторизация</a></li>
                                <li><div class="dropdown-divider"></div></li>
                                <li><a class="dropdown-item" href="cabinet.php">Личный кабинет</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../pages/favorites.php">
                                <i class="bi bi-heart"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../pages/cart.php">
                                <i class="bi bi-bag"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</section>

<section class="d-md-none sticky-top">
    <div class="container-fluid px-0">
        <nav class="navbar bg-body-tertiary border-1 border-bottom border-black justify-content-between">
            <a class="navbar-brand px-2" href="../index.php">
                Акции
            </a>
            <ul class="navbar-nav flex-row gap-3">
                <li class="nav-item">
                    <a class="nav-link" href="../pages/favorites.php">
                        <i class="bi bi-heart"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../pages/cart.php">
                        <i class="bi bi-bag"></i>
                    </a>
                </li>
            </ul>
            <div>
                <button class="navbar-toggler py-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header bg-light py-3 border-1 border-bottom border-black">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Акции</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body py-0">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item border-1 border-bottom border-black">
                                <a class="nav-link active" aria-current="page" href="../index.php">
                                    <i class="bi bi-house"></i>
                                    Главная
                                </a>
                            </li>
                            <li class="nav-item border-1 border-bottom border-black">
                                <a class="nav-link" href="../pages/catalog.php">
                                    <i class="bi bi-card-list"></i>
                                    Каталог
                                </a>
                            </li>
                            <li class="nav-item border-1 border-bottom border-black">
                                <a class="nav-link" href="../pages/promo.php">
                                    <i class="bi bi-award"></i>
                                    Акции
                                </a>
                            </li>
                            <li class="nav-item dropdown border-1 border-bottom border-black">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-person-circle"></i>
                                    Кабинет
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="registration.php">Регистрация</a></li>
                                    <li><a class="dropdown-item" href="authorization.php">Авторизация</a></li>
                                    <li><div class="dropdown-divider"></div></li>
                                    <li><a class="dropdown-item" href="cabinet.php">Личный кабинет</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown border-1 border-bottom border-black">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-plus-square"></i>
                                    Дополнительно
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="../pages/promo.php">Ввести промокод</a></li>
                                    <li><a class="dropdown-item" href="../pages/about.php">Разработчики</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</section>

<section class="page-section">
    <div class="container">
        <div class="rounded-5 bg-light p-3">
            <nav style="--bs-breadcrumb-divider:'-'" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-custom overflow-hidden text-center m-0">
                    <li class="breadcrumb-item">
                        <a class="link-body-emphasis fw-semibold text-decoration-none" href="../index.php">
                            <i class="bi bi-house"></i>
                            Главная
                        </a>
                    </li>
                    <li class="breadcrumb-item active">
                        <a class="link-body-emphasis fw-semibold text-decoration-none" href="#">
                            Авторизация
                        </a>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<section class="page-section">
    <div class="container">
        <div class="p-3 rounded-3 bg-light">
            <form action="../scripts/php/auth.php" method="post">
                <div class="mb-3 w-50" >
                    <label for="InputLogin" class="form-label">Логин</label>
                    <input type="text" class="form-control" id="InputLogin" name="login">
                </div>
                <div class="mb-3 w-50">
                    <label for="InputPassword" class="form-label">Пароль</label>
                    <input type="text" class="form-control" id="InputPassword" name="password">
                </div>
                <button type="submit" class="btn btn-outline-dark">Отправить</button>
                <?php
                    if(isset($_SESSION['error1']) && !empty($_SESSION['error1'])) {
                        echo '<div class="alert alert-danger text-center mt-1" role="alert">'.
                            $_SESSION['error1'] . '</div>';
                        $_SESSION['error1'] = ""; // Сброс ошибки после вывода
                    }
                ?>
            </form>
            <p class="mt-3">Первый раз на сайте? <a href="registration.php" class="link-secondary">зарегистрируйтесь</a> прямо сейчас!</p>
        </div>
    </div>
</section>

</body>
</html>