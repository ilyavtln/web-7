<?php session_start(); ?>

<!doctype html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>О нас</title>
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
                            <a class="nav-link" aria-current="page" href="../index.php">Главная</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="catalog.php">Каталог</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="promo.php">Акции</a>
                        </li>
                        <!-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Дополнительно
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="promo.php">Ввести промокод</a></li>
                                <li><a class="dropdown-item" href="about.php">Разработчики</a></li>
                            </ul>
                        </li> -->
                    </ul>
                    <ul class="navbar-nav gap-3">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-circle"></i>
                            </a>
                            <ul class="dropdown-menu">
                            <?php
                                if (isset($_COOKIE['user']) && $_COOKIE['user'] != ''): ?>
                                <li><a class="dropdown-item" href="../auth/cabinet.php">Личный кабинет</a></li>
                                <li><a class="dropdown-item" href="../scripts/php/exit.php">Выйти</a></li>
                              
                                <?php else: ?>
                                <li><a class="dropdown-item" href="../auth/registration.php">Регистрация</a></li>
                                <li><a class="dropdown-item" href="../auth/authorization.php">Авторизация</a></li>
                                
                                <?php endif; ?>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="favorites.php">
                                <i class="bi bi-heart"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php">
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
                    <a class="nav-link" href="favorites.php">
                        <i class="bi bi-heart"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cart.php">
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
                                <a class="nav-link" aria-current="page" href="../index.php">
                                    <i class="bi bi-house"></i>
                                    Главная
                                </a>
                            </li>
                            <li class="nav-item border-1 border-bottom border-black">
                                <a class="nav-link" href="catalog.php">
                                    <i class="bi bi-card-list"></i>
                                    Каталог
                                </a>
                            </li>
                            <li class="nav-item border-1 border-bottom border-black">
                                <a class="nav-link" href="promo.php">
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
                                <?php
                                if (isset($_COOKIE['user']) && $_COOKIE['user'] != ''): ?>
                                <li><a class="dropdown-item" href="../auth/cabinet.php">Личный кабинет</a></li>
                                <li><a class="dropdown-item" href="../scripts/php/exit.php">Выйти</a></li>
                              
                                <?php else: ?>
                                <li><a class="dropdown-item" href="../auth/registration.php">Регистрация</a></li>
                                <li><a class="dropdown-item" href="../auth/authorization.php">Авторизация</a></li>
                                
                                <?php endif; ?>
                                </ul>
                            </li>
                            <!-- <li class="nav-item dropdown border-1 border-bottom border-black">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-plus-square"></i>
                                    Дополнительно
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="promo.php">Ввести промокод</a></li>
                                    <li><a class="dropdown-item" href="about.php">Разработчики</a></li>
                                </ul>
                            </li> -->
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</section>

<section class="page-section">
    <div class="container">
        <div class="bg-light rounded-3 p-3 mt-3" >
            <h3 class="display-3 text-center">
                <strong>Оформление заказа</strong>
            </h3>
        </div>

<section class="page-section">
    <div class="container">
        <div class="p-3 rounded-3 bg-white mt-3">
            <form action="../scripts/php/order.php" method="post">
                <div class="mb-3 w-50" >
                    <label for="InputAdress" class="form-label">Адрес доставки</label>
                    <input type="text" class="form-control" id="InputAdress" name="adress">
                </div>
                <button type="submit" class="btn btn-outline-dark">Отправить</button>
            </form>
             </div>
    </div>
</section>


<section class="page-section">
    <!-- Для нормального отступа -->
</section>

<section class="page-section mt-auto">
    <div class="container-fluid">
        <footer class="d-flex py-2 flex-wrap justify-content-between align-items-center border-top">
            <div class="d-flex align-items-center">
                <a href="/" class="text-body-secondary text-decoration-none pe-2">
                    <img src="../shared/logos/main.svg" alt="Logo" width="auto" height="30" class="d-inline-block align-text-center">
                </a>
                <span class="text-body-secondary">&copy; 2024 Company, Inc</span>
            </div>

            <ul class="justify-content-end list-unstyled m-0 d-flex">
                <li class="ms-3"><a class="text-body-secondary" href="#"><i class="bi bi-person-circle"></i></a></li>
                <li class="ms-3"><a class="text-body-secondary" href="#"><i class="bi bi-person-circle"></i></a></li>
                <li class="ms-3"><a class="text-body-secondary" href="#"><i class="bi bi-person-circle"></i></a></li>
            </ul>
        </footer>
    </div>
</section>
</body>
</html>