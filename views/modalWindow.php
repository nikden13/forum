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
                        <textarea class="description_theme" rows="15" name="description"></textarea>
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