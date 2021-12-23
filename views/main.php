<section class="active_themes__content">
    <div class="container">
        <div class="active_themes__content-inner">
            <div class="title-add_action">
                <h3 class="active_themes__title">
                    Темы
                </h3>
                <?php if (isset($_SESSION['id'])): ?>
                    <button class="btn" type="button" id="btn-add_theme">Добавить</button>
                    <script>
                        document.getElementById('btn-add_theme').addEventListener('click', function () {
                            modal.classList.add('modal__add_theme--visible')
                        })
                    </script>
                <?php endif; ?>
            </div>
            <div class="active_themes__set">
                <?php for ($i = 0; $i < count($GLOBALS['themes']); $i++): ?>
                    <div class="active_themes__set-item">
                        <div class="active_themes__set-item__left">
                            <a class="item__tittle" href="#">
                                <?php echo $GLOBALS['themes'][$i]['title'] ?>
                            </a>
                            <span class="autor"><br>Автор: </span>
                            <a class="item__autor" href="#">
                                <?php echo $GLOBALS['themes'][$i]['user_login'] ?>
                            </a>
                        </div>

                        <div class="active_themes__set-item__right">
                            <div class="item__comment">
                                <a class="item__comment-number" href="#">
                                    <?php echo $GLOBALS['themes'][$i]['count_messages'] ?>
                                </a>
                            </div>

                            <div class="item__time">
                                <span>Создана: </span>
                                <a class="item__time-number" href="#">
                                    <?php echo date("d.m.Y",strtotime($_GET['themes'][$i]['create_at'])) ?>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endfor; ?>
            </div>
        </div>
    </div>
</section>

<?php if (isset($_SESSION['id'])): ?>
    <div class="modal__add_theme">
        <div class="modal__add_theme-content">
            <div class="modal__content-title">
                <div class="modal__content-title--text">
                    <span>Добавить новую тему</span>
                </div>
                <button class="btn-close" type="button">
                    &#215;
                </button>
            </div>
            <form class="modal__content-inputs" action="create-theme.php" method="post">
                <div class="modal__content-inputs--item">
                    <label class="label__title">
                        Заголовок
                        <input class="title_theme" type="text" name="title" required="required">
                    </label>
                </div>
                <div class="modal__content-inputs--item">
                    <label class="label__description">
                        Описание
                        <textarea class="description_theme" rows="5" name="description"></textarea>
                    </label>
                </div>
                <button class="btn btn-modal" type="submit">
                    Сохранить
                </button>
            </form>
        </div>
    </div>
    <script>
        let modal = document.getElementsByClassName('modal__add_theme')[0]
        let modalContent = document.getElementsByClassName('modal__add_theme-content')[0]
        let btnClose = document.getElementsByClassName('btn-close')[0]

        modal.addEventListener('click', function () {
            if (modal.classList.contains('modal__add_theme--visible') && event.target === modal) {
                modal.classList.remove('modal__add_theme--visible')
            }
        })

        btnClose.addEventListener('click', function () {
            modal.classList.remove('modal__add_theme--visible')
        })
    </script>
<?php  endif; ?>

<script>
    let elements = document.getElementsByClassName('active_themes__set-item')
    for (let i = 0; i < elements.length; i++) {
        console.log(i)
        if (i % 2 === 0) {
            elements[i].style.backgroundColor = '#f3f4f5'
        }
    }
</script>
