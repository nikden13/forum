<section class="profile__content">
    <div class="container">
        <div class="profile__content-inner">
            <h3 class="profile__title">
                Профиль
            </h3>
            <div class="profile__info">
                <div class="profile__my-photo">
                    <span><?php echo $_SESSION['login'][0] ?></span>
                </div>
                <div class="profile__text">
                    <p class="profile__text-item">
                        <span>ID: </span> <?php echo $_SESSION['id'] ?>
                    </p>
                    <p class="profile__text-item">
                        <span>Логин: </span> <?php echo $_SESSION['login'] ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
