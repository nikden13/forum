<header class="header">
    <?php if (isset($_SESSION['message'])): ?>
        <div class="success-registration">
            <span><?php echo $_SESSION['message'] ?></span>
        </div>
    <?php unset($_SESSION['message']); endif; ?>

    <div class="container">
        <div class="header__inner">

            <nav class="menu">
                <ul class="menu__list">
                    <li class="menu__list-item">
                        <a href="index.php" class="menu__link">Главная</a>
                    </li>
                    <li class="menu__list-item">
                        <a href="news.php" class="menu__link">Новости</a>
                    </li>
                </ul>
            </nav>

            <?php if (isset($_SESSION['id'])): ?>
                <div class="header__my-profile menu__link">
                    <a href="profile.php" class="my-profile__link">Профиль</a>
                </div>
                <div class="user-nav__list-item">
                    <a href="logout.php" class="user__link link-btn">Выйти</a>
                </div>
            <?php else: ?>
                <nav class="user-nav">
                    <ul class="user-nav__list">
                        <li class="user-nav__list-item">
                            <a href="sign-in.php" class="user__link link-btn">Войти</a>
                        </li>
                        <li class="user-nav__list-item">
                            <a href="sign-up.php" class="user__link link-btn">Регистрация</a>
                        </li>
                    </ul>
                </nav>
            <?php endif; ?>

        </div>
    </div>
</header>
