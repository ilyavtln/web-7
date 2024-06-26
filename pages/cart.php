<?php
	session_start();
	
	if (isset($_SESSION['user_id'])) {
		$mysqli = new mysqli('localhost', 'root', 'root', 'web7-bd');
		
		$stmt = $mysqli->prepare("SELECT name, surname, points, login FROM users WHERE id = ?");
		$stmt->bind_param("i", $_SESSION['user_id']);
		$stmt->execute();
		
		$result = $stmt->get_result();
		$user = $result->fetch_assoc();
		
		$stmt->close();
		$mysqli->close();
		
		$name = $user['name'];
		$userLogin = $user['login'];
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
    <title>Корзина</title>
    <meta name="description" content="Акции и призы ежедневно">
    <link href="../styles/bootstrap.css" rel="stylesheet">
    <link href="../styles/style.css" rel="stylesheet">
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
                <a class="navbar-brand" href="../index.php">
                    <img src="../shared/logos/main.svg" alt="Logo" width="auto" height="50"
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
                            <a class="nav-link" aria-current="page" href="../index.php">Главная</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="catalog.php">Каталог</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="promo.php">Акции</a>
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
                                            <a class="dropdown-item" href="../auth/cabinet.php">Личный кабинет</a>
                                        </li>
                                        <li>
                                            <span class="dropdown-item" href="../auth/cabinet.php"><span
                                                        class="pe-1"><?= $userPoints ?></span><i
                                                        class="bi bi-coin purple-color"></i></span>
                                        </li>
                                        <li><a class="dropdown-item" href="../scripts/php/exit.php">Выйти</a></li>
									
									<?php else: ?>
                                        <li><a class="dropdown-item" href="../auth/registration.php">Регистрация</a>
                                        </li>
                                        <li><a class="dropdown-item" href="../auth/authorization.php">Авторизация</a>
                                        </li>
									
									<?php endif;
								?>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="cart.php">
                                <i class="bi bi-bag"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.php">
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
            <a class="navbar-brand px-2" href="../index.php">
                Акции
            </a>
            <ul class="navbar-nav flex-row gap-3">
				<?php
					if (isset($_COOKIE['user']) && $_COOKIE['user'] != ''): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="../auth/cabinet.php">
                                <i class="bi bi-person-circle"></i>
								<?= $userField ?>
                            </a>
                        </li>
					
					<?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="../auth/registration.php">
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
                            <li class="nav-item border-1 border-bottom border-black">
                                <a class="nav-link active" href="cart.php">
                                    <i class="bi bi-bag"></i>
                                    Корзина
                                </a>
                            </li>
                            <li class="nav-item border-1 border-bottom border-black">
                                <a class="nav-link" href="about.php">
                                    <i class="bi bi-info-circle"></i>
                                    О разработчиках
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
                                                <a class="dropdown-item" href="../auth/cabinet.php">Личный кабинет</a>
                                            </li>
                                            <li>
                                                <span class="dropdown-item" href="../auth/cabinet.php"><span
                                                            class="pe-1"><?= $userPoints ?></span><i
                                                            class="bi bi-coin purple-color"></i></span>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="../scripts/php/exit.php">Выйти</a>
                                            </li>
										
										<?php else: ?>
                                            <li><a class="dropdown-item" href="../auth/registration.php">Регистрация</a>
                                            </li>
                                            <li><a class="dropdown-item"
                                                   href="../auth/authorization.php">Авторизация</a>
                                            </li>
										
										<?php endif;
                                    ?>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</section>

<section class="page-section d-md-block d-none">
    <div class="container">
        <div class="rounded-5 bg-light p-3">
            <nav style="--bs-breadcrumb-divider: '-';" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-custom overflow-hidden text-center m-0">
                    <li class="breadcrumb-item">
                        <a class="link-body-emphasis fw-semibold text-decoration-none" href="#">
                            <i class="bi bi-house"></i>
                            Главная
                        </a>
                    </li>
                    <li class="breadcrumb-item active">
                        <a class="link-body-emphasis fw-semibold text-decoration-none" href="#">
                            Корзина
                        </a>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<section class="page-section">
    <div class="container">
        <div class="bg-light rounded-3 p-3 mt-3">
            <h3 class="display-1 text-center">
                <strong>Заказы</strong>
            </h3>
        </div>
    </div>
</section>

<?php
	$mysqli = new mysqli('localhost', 'root', 'root', 'web7-bd');
	$stmt = $mysqli->prepare("SELECT * FROM cart WHERE login = ? ORDER BY received, id DESC");
	$stmt->bind_param("s", $userLogin);
	$stmt->execute();
	$result = $stmt->get_result();
	$carts = array();
	while ($row = $result->fetch_assoc()) {
		$carts[] = $row;
	}
?>

<section class="page-section">
    <div class="container">
        <div class="d-grid ban-3 banner-gap">
			<?php foreach ($carts as $oneCart) { ?>
				<?php
                    $mysqli = new mysqli('localhost', 'root', 'root', 'web7-bd');
                    $stmt = $mysqli->prepare("SELECT * FROM catalog WHERE id = ?");
                    $stmt->bind_param("s", $oneCart["catalog_id"]);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $catalog_items = array();
                    while ($row = $result->fetch_assoc()) {
                        $catalog_items[] = $row;
                    }
				?>
                <div class="banner-flying row g-0 border rounded">
                    <div class="p-4 d-flex flex-column justify-content-between">
                        <div class="d-flex justify-content-between flex-column">
                            <div>
                                <div class="d-flex flex-lg-row flex-column gap-lg-3 gap-1 align-content-start">
                                    <div class="btn btn-outline-primary w-fit-content mb-3 text-left">№: <?= $oneCart["id"] ?></div>
                                    <div class="btn btn-outline-info w-fit-content mb-3 text-left">От <?= $oneCart["date"] ?></div>
                                </div>
                                <div class="card-text mb-3"><b>По адресу:</b> <?= $oneCart["address"] ?></div>
                                <img src="<?= $catalog_items[0]["image"] ?>" class="img-fluid mb-2 img-thumbnail " alt="(((">
                                <h3 class="card-text mb-3"><?= $catalog_items[0]["title"] ?></h3>
                            </div>
                            <div>
	                            <?php
		                            if ($oneCart["received"] == 0): ?>
                                        <a class="btn btn-outline-success mb-3 w-100" href="../scripts/php/takeOrder.php?id=<?= $oneCart["id"]?>&catalog_id=<?= $catalog_items[0]["id"] ?>" role="button">Получить</a>
                                        <a class="btn btn-danger w-100" href="../scripts/php/removeOrder.php?id=<?= $oneCart["id"]?>&catalog_id=<?= $catalog_items[0]["id"] ?>" role="button">Отменить заказ</a>
		                            <?php else: ?>
                                        <a class="btn disabled mb-3 w-100" disabled role="button">Заказ получен</a>
                                        <a class="btn disabled w-100" disabled role="button">Отменить заказ</a>
		                            <?php endif;
	                            ?>
                            </div>
                        </div>
                    </div>
                </div>
			<?php } ?>
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
                    <img src="../shared/logos/main.svg" alt="Logo" width="auto" height="30"
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