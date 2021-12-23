<?php if (isset($_SESSION['id'])): ?>
    <button class="btn" type="button" id="btn-add_theme">Создать</button>
    <script>
        document.getElementById('btn-add_theme').addEventListener('click', function () {
            modal.classList.add('modal__add_theme--visible')
        })
    </script>
<?php endif; ?>