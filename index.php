<?php session_start(); ?>

<!doctype html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Страница акций</title>
    <meta name="description" content="Акции и призы ежедневно">
    <link href="styles/bootstrap.css" rel="stylesheet">
    <link href="styles/style.css" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</head>

<body class="d-flex flex-column min-vh-100">

<section class="d-none d-md-block sticky-top">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-md nav-underline bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">
                    <img src="shared/logos/main.svg" alt="Logo" width="auto" height="50" class="d-inline-block align-text-center">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarNavDropdown">
                    <ul class="navbar-nav gap-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Главная</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pages/catalog.php">Каталог</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pages/promo.php">Акции</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Дополнительно
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="pages/promo.php">Ввести промокод</a></li>
                                <li><a class="dropdown-item" href="pages/about.php">Разработчики</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="navbar-nav gap-3">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-circle"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="auth/registration.php">Регистрация</a></li>
                                <li><a class="dropdown-item" href="auth/authorization.php">Авторизация</a></li>
                                <li><div class="dropdown-divider"></div></li>
                                <li><a class="dropdown-item" href="auth/cabinet.php">Личный кабинет</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pages/favorites.php">
                                <i class="bi bi-heart"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pages/cart.php">
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
            <a class="navbar-brand px-2" href="index.php">
                Акции
            </a>
            <ul class="navbar-nav flex-row gap-3">
                <li class="nav-item">
                    <a class="nav-link" href="pages/favorites.php">
                        <i class="bi bi-heart"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pages/cart.php">
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
                                <a class="nav-link active" aria-current="page" href="index.php">
                                    <i class="bi bi-house"></i>
                                    Главная
                                </a>
                            </li>
                            <li class="nav-item border-1 border-bottom border-black">
                                <a class="nav-link" href="pages/catalog.php">
                                    <i class="bi bi-card-list"></i>
                                    Каталог
                                </a>
                            </li>
                            <li class="nav-item border-1 border-bottom border-black">
                                <a class="nav-link" href="pages/promo.php">
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
                                    <li><a class="dropdown-item" href="auth/registration.php">Регистрация</a></li>
                                    <li><a class="dropdown-item" href="auth/authorization.php">Авторизация</a></li>
                                    <li><div class="dropdown-divider"></div></li>
                                    <li><a class="dropdown-item" href="auth/cabinet.php">Личный кабинет</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown border-1 border-bottom border-black">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-plus-square"></i>
                                    Дополнительно
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="pages/promo.php">Ввести промокод</a></li>
                                    <li><a class="dropdown-item" href="pages/about.php">Разработчики</a></li>
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
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src=shared/images/news-2.jpg class="d-block w-100 rounded-3" alt="...">
                </div>
                <div class="carousel-item">
                    <img src=shared/images/news-2.jpg class="d-block w-100 rounded-3" alt="...">
                </div>
                <div class="carousel-item">
                    <img src=shared/images/news-2.jpg class="d-block w-100 rounded-3" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Предыдущий</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Следующий</span>
            </button>
        </div>
    </div>
</section>

<section class="page-section">
    <div class="container">
        <div class="rounded-5 bg-light p-3">
            <nav style="--bs-breadcrumb-divider: '\';" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-custom overflow-hidden text-center m-0">
                    <li class="breadcrumb-item active">
                        <a class="link-body-emphasis fw-semibold text-decoration-none" href="#">
                            <i class="bi bi-house"></i>
                            Главная
                        </a>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<section class="page-section">
    <div class="container">
        <div class="bg-light rounded-3 p-3">
            <h1>Это главная страница</h1>
            <h5>Это описание главной страницы</h5>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores cupiditate delectus dicta earum
                excepturi harum hic inventore itaque labore magni, minima neque nihil odio reiciendis, sequi voluptates
                voluptatibus. Doloremque, repellat.
            </p>
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
                    <img src="shared/logos/main.svg" alt="Logo" width="auto" height="30" class="d-inline-block align-text-center">
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