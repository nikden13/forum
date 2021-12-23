<section class="active_themes__content">
    <div class="container">
        <div class="active_themes__content-inner">
            <div class="title-add_action">
                <h3 class="active_themes__title">
                    Активные темы
                </h3>
                <?php require_once('views/btn-create.php');?>
            </div>
            <div class="active_themes__set shadow">
                <?php foreach ($GLOBALS['themes'] as $theme): ?>
                    <div class="active_themes__set-item">
                        <div class="photo_user">
                            <div class="profile__photo list_profile__photo">
                                <span><?php echo $theme['user_login'][0] ?></span>
                            </div>
                        </div>

                        <div class="active_themes__set-item__left">
                            <?php
                                echo "<a class='item__tittle' href='theme.php?id=$theme[id]'>";
                                echo $theme['title'];
                                echo '</a>';
                            ?>
                            <span class="autor"><br>Автор: </span>
                            <?php
                                echo "<a class='item__autor' href='profile-author.php?id=$theme[user_id]'>";
                                echo $theme['user_login'];
                                echo '</a>';
                            ?>
                        </div>

                        <div class="active_themes__set-item__right">
                            <div class="item__comment">
                                <span class="item__comment-number" href="#">
                                    <?php echo $theme['commentsCount'] ?>
                                </span>
                            </div>

                            <div class="item__time">
                                <span>Дата создания: </span>
                                <?php echo date("d.m.Y",strtotime($theme['create_at'])) ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <?php require_once('views/pagination.php');?>
    </div>
</section>

<?php require_once('views/modalWindow.php');?>
