<?php
	session_start();
	
	if (isset($_SESSION['user_id'])) {
		$mysqli = new mysqli('localhost', 'root', 'root', 'web7-bd');
		
		$stmt = $mysqli->prepare("SELECT name, surname, points FROM users WHERE id = ?");
		$stmt->bind_param("i", $_SESSION['user_id']);
		$stmt->execute();
		
		$result = $stmt->get_result();
		$user = $result->fetch_assoc();
		
		$stmt->close();
		$mysqli->close();
		
		$name = $user['name'];
		$surname = strval($user['surname']);
		$userField = $name . " " . mb_strimwidth($surname, 0, 1) . ".";
		
		$userPoints = $user['points'];
	} else {
		$userField = "";
		$userPoints = 0;
	}
?>

<!doctype html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Страница акций</title>
    <meta name="description" content="Акции и призы ежедневно">
    <link href="styles/bootstrap.css" rel="stylesheet">
    <link href="styles/style.css" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
            integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
            crossorigin="anonymous"></script>
</head>

<body class="d-flex flex-column min-vh-100">


<!-- Десктоп меню -->
<section class="d-none d-md-block sticky-top">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-md nav-underline bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">
                    <img src="shared/logos/main.svg" alt="Logo" width="auto" height="50"
                         class="d-inline-block align-text-center">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                        aria-label="Toggle navigation">
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
                    </ul>
                    <ul class="navbar-nav gap-3">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                               aria-expanded="false">
                                <i class="bi bi-person-circle"></i>
								<?= $userField ?>
                            </a>
                            <ul class="dropdown-menu">
								<?php
									if (isset($_COOKIE['user']) && $_COOKIE['user'] != ''): ?>
                                        <li>
                                            <a class="dropdown-item" href="auth/cabinet.php">Личный кабинет</a>
                                        </li>
                                        <li>
                                            <span class="dropdown-item" href="auth/cabinet.php"><span
                                                        class="pe-1"><?= $userPoints ?></span><i
                                                        class="bi bi-coin purple-color"></i></span>
                                        </li>
                                        <li><a class="dropdown-item" href="scripts/php/exit.php">Выйти</a></li>
									
									<?php else: ?>
                                        <li><a class="dropdown-item" href="auth/registration.php">Регистрация</a></li>
                                        <li><a class="dropdown-item" href="auth/authorization.php">Авторизация</a></li>
									
									<?php endif;
								?>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pages/cart.php">
                                <i class="bi bi-bag"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pages/about.php">
                                <i class="bi bi-info-circle"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</section>


<!-- Мобилка меню -->
<section class="d-md-none sticky-top">
    <div class="container-fluid px-0">
        <nav class="navbar bg-body-tertiary border-1 border-bottom border-black justify-content-between">
            <a class="navbar-brand px-2" href="index.php">
                Акции
            </a>
            <ul class="navbar-nav flex-row gap-3">
				<?php
					if (isset($_COOKIE['user']) && $_COOKIE['user'] != ''): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="auth/cabinet.php">
                                <i class="bi bi-person-circle"></i>
								<?= $userField ?>
                            </a>
                        </li>
					
					<?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="auth/registration.php">
                                <i class="bi bi-person-circle"></i>
                            </a>
                        </li>
					
					<?php endif;
				?>
            </ul>
            <div>
                <button class="navbar-toggler py-0" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar"
                        aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                     aria-labelledby="offcanvasNavbarLabel">
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
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                   aria-expanded="false">
                                    <i class="bi bi-person-circle"></i>
                                    Кабинет
                                </a>
                                <ul class="dropdown-menu">
									<?php
										if (isset($_COOKIE['user']) && $_COOKIE['user'] != ''): ?>
                                            <li>
                                                <a class="dropdown-item" href="auth/cabinet.php">Личный кабинет</a>
                                            </li>
                                            <li>
                                                <span class="dropdown-item" href="auth/cabinet.php"><span
                                                            class="pe-1"><?= $userPoints ?></span><i
                                                            class="bi bi-coin purple-color"></i></span>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="scripts/php/exit.php">Выйти</a>
                                            </li>
										
										<?php else: ?>
                                            <li><a class="dropdown-item" href="auth/registration.php">Регистрация</a>
                                            </li>
                                            <li><a class="dropdown-item" href="auth/authorization.php">Авторизация</a>
                                            </li>
										
										<?php endif; ?>
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
        <div class="bg-light rounded-3 p-3 mt-3 d-flex flex-row">
            <h3 class="display-1">
                <strong>ВВОДИ КОДЫ,<br>ПОЛУЧАЙ ПРИЗЫ</strong>
            </h3>
            <div class="d-lg-flex d-none align-items-end">
                <img src="shared/images/Cookie.png" class="d-block" alt="...">
            </div>
        </div>
		<?php
			if (isset($_COOKIE['user']) && $_COOKIE['user'] != ''): ?>
                <button type="button" class="btn btn-primary mb-3 w-100" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                    Ввести код
                </button>

                <!-- Модальное окно -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Ввод промокода</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Закрыть"></button>
                            </div>
                            <div class="modal-body">
                                <div class="p-3 rounded-3 bg-light">
                                    <form action="scripts/php/addpromocode.php" method="post">
                                        <div class="mb-3">
                                            <label for="InputType" class="form-label">Название</label>
                                            <input type="text" class="form-control" id="InputType" name="type">
                                        </div>
                                        <button type="submit" class="btn btn-outline-dark">Отправить</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
			
			<?php else: ?>
                <div class="d-grid gap-2">
                    <a class="btn btn-primary mb-3" href="auth/registration.php" role="button">Ввести код</a>
                </div>
			<?php endif; ?>
		
		    <?php
			if (isset($_SESSION['admin_access']) && $_SESSION['admin_access'] == true): ?>
                <button type="button" class="btn btn-outline-danger mb-3 w-100" data-bs-toggle="modal"
                        data-bs-target="#exampleModalAdmin">
                    Добавить промокод
                </button>

                <!-- Модальное окно -->
                <div class="modal fade" id="exampleModalAdmin" tabindex="-1" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Добавление промокода</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Закрыть"></button>
                            </div>
                            <div class="modal-body">
                                <div class="p-3 rounded-3 bg-light">
                                    <form action="scripts/php/createPromo.php" method="get">
                                        <div class="mb-3">
                                            <label for="InputType" class="form-label">Секретный код</label>
                                            <input type="text" class="form-control" name="code">
                                            <label for="InputType" class="form-label">Количество баллов</label>
                                            <input type="text" class="form-control" name="coast">
                                        </div>
                                        <button type="submit" class="btn btn-outline-dark">Отправить</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
			<?php endif; ?>
    </div>
	<?php
		if (isset($_SESSION['error4']) && !empty($_SESSION['error4'])) {
			echo '<div class="alert alert-danger text-center mt-1" role="alert">' .
				$_SESSION['error4'] . '</div>';
			$_SESSION['error4'] = ""; // Сброс ошибки после вывода
		}
	?>
</section>


<div class="py-1 mt-3 bg-black">
    <hr class="my-0">
</div>

<section class="page-section">
    <div class="container">
        <div class="bg-light rounded-3 p-3 mt-3 ">
            <h5 class="display-3 text-center">
                <strong>Как получить призы?</strong>
            </h5>
            <div class="d-flex flex-lg-row flex-column justify-content-center gap-3">
                <div class="badge rounded-pill bg-primary mt-3 py-2 px-4">
                    <h3 class="text-center">
                        1. Купи товар, <br> участвующий в акции
                    </h3>
                </div>
                <div class="badge rounded-pill bg-primary mt-3 py-2 px-4">
                    <h3 class="text-center">
                        2. Регистрируй <br>код на сайте
                    </h3>
                </div>
                <div class="badge rounded-pill bg-primary mt-3 py-2 px-4">
                    <h3 class="text-center">
                        3. Получи <br>гарантированный приз
                    </h3>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="page-section">
    <!-- Для нормального отступа -->
</section>

<section class="page-section mt-auto">
    <div class="container-fluid">
        <footer class="d-flex py-3 flex-wrap justify-content-between align-items-center border-top">
            <div class="d-flex align-items-center">
                <a href="/" class="text-body-secondary text-decoration-none pe-2">
                    <img src="shared/logos/main.svg" alt="Logo" width="auto" height="30"
                         class="d-inline-block align-text-center">
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