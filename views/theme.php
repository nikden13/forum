<section class="theme-one">
    <div class="container">
        <div class="theme-one__inner">
            <div class="theme-one__inner--title">
                <h3>
                    <a class="preg-page" href="/">Главная</a> &#xf101; <?php echo substr($theme['title'], 0, 50) ?>
                </h3>
            </div>

            <div class="theme-one__inner--content">
                <div class="main__theme shadow">
                    <div class="photo_user photo_user__theme">
                        <div class="list_profile__photo profile__photo">
                            <?php echo $themeUser['login'][0] ?>
                        </div>
                        <div class="author__login">
                           <span><?php echo $themeUser['login'] ?></span>
                        </div>
                    </div>
                    <div class="main__theme--description">
                        <div class="main__theme--description-date">
                            <span><?php echo $theme['create_at'] ?></span>
                        </div>
                        <div class="main__theme--description-text">
                            <p>
                                <span><?php echo $theme['description'] ?></span>
                            </p>
                        </div>
                    </div>
                </div>
                <?php if (isset($_SESSION['id'])): ?>
                    <form class="add-comment" action="add-comment.php" method="post">
                        <input type="text" name="theme_id" style="display: none" value="<?php echo $theme['id']?>">
                        <textarea name="text" rows="5" required="required"></textarea>
                        <button class="btn">Добавить комментарий</button>
                    </form>
                <?php endif; ?>

                <h4 class="comments-title">Комментарии</h4>
                <?php if (isset($comments)): ?>
                        <?php foreach ($comments as $comment): ?>
                            <div class="main__theme shadow comment-block">
                                <div class="photo_user photo_user__theme comment-avatar">
                                    <div class="list_profile__photo profile__photo">
                                        <?php echo $comment['userLogin'][0] ?>
                                    </div>
                                    <div class="author__login">
                                        <span><?php echo $comment['userLogin'] ?></span>
                                    </div>
                                </div>
                                <div class="main__theme--description">
                                    <div class="main__theme--description-date">
                                        <span><?php echo $comment['create_at'] ?></span>
                                    </div>
                                    <div class="main__theme--description-text">
                                        <p>
                                            <?php echo $comment['text'] ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                <?php else: echo 'Не найдено.'; endif; ?>
            </div>
        </div>
    </div>
</section>