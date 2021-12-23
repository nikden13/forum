<?php
$currentPage = $GLOBALS['page'] + 1;

$tmpCountPages = $GLOBALS['countThemes'] / $GLOBALS['perpage'];
$countPages = is_int($tmpCountPages) ? $tmpCountPages : (int)$tmpCountPages + 1;

if ($countPages > 0 && $currentPage <= $countPages) {
    $newPages = [];
    if ($countPages <= 4) {
        $lastValue = $countPages;
        while ($lastValue > 1) {
            array_unshift($newPages, $lastValue);
            $lastValue--;
        }
        $visibleFirstEllipsis = false;
        $visibleLastEllipsis = false;
    } else {
        if ($currentPage < 3) {
            $newPages = [2, 3, 4];
        } else {
            $newPages = [$currentPage - 1, $currentPage, $currentPage + 1];
            if ($newPages[2] > $countPages) {
                unset($newPages[2]);
            }
        }
        $visibleFirstEllipsis = $currentPage > 3;
        $visibleLastEllipsis = $currentPage < $countPages - 1;
    }
}
?>

<?php if ($countPages > 0 && $currentPage <= $countPages): ?>
    <div class="pagination">
        <div class="pagination__inner">
        <?php if ($currentPage === 1) {
            echo '<div class="pagination__item active">';
        } else {
            echo '<div class="pagination__item">';
        }
        echo "<a href='index.php' class='pagination__item-link'>1</a>" ?>
            </div>

        <?php if ($visibleFirstEllipsis): ?>
            <div class="pagination__item ellipsis">
                <span>...</span>
            </div>
        <?php endif; ?>

        <?php foreach ($newPages as $newPage):
            if ($currentPage === $newPage) {
                echo '<div class="pagination__item active">';
            } else {
                echo '<div class="pagination__item">';
            }
            echo "<a href='index.php?page=$newPage' class='pagination__item-link'>$newPage</a>" ?>
            </div>
        <?php endforeach; ?>

        <?php  if ($visibleLastEllipsis): ?>
            <div class="pagination__item ellipsis">
                <span>...</span>
            </div>
            <div class="pagination__item">
                <?php echo "<a href='index.php?page=$countPages' class='pagination__item-link'>$countPages</a>" ?>
            </div>
        <?php endif; ?>
        </div>
    </div>
<?php endif; ?>