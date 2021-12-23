<section class="content">
    <div class="container">
        <div class="register">
            <h3 class="sign-in__title">Вход</h3>
            <form action="sign-in.php" method="post" class="form__register">
                <div class="form__register-inputs">
                    <label>
                        <input type="text" class="register__email" name="login" placeholder="Логин">
                    </label>
                    <label>
                        <input type="password" class="register__pwd" name="password" placeholder="Пароль">
                    </label>
                </div>
                <button class="btn-reg" type="submit">&#xf0da;</button>
            </form>

            <?php if (!empty($errors)): ?>
                <div class="block__errors">
                    <ul class="errors">
                        <?php foreach ($errors as $error): ?>
                            <li class="errors-item">
                                <?php echo $error ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
