<?php
/*Page librairie */
?>
<section class="container-library">
    <div class="main-container">
        <div class="split-container">
            <div class="container-title">
                <h1>Nos livres à l'échange</h1>
            </div>
            <div class="container-search">
                <form action="index.php" method="GET">
                    <input type="hidden" name="action" value="searchBook">
                    <button type="submit">
                        <img src="../public/assets/icon-search.svg" alt="Icone de recherche">
                    </button>
                    <input type="text" name="query" aria-label="Rechercher un livre" placeholder="Rechercher un livre" value="<?= htmlspecialchars($query) ?>" required>
                </form>
            </div>
        </div>
        <div class="books-grid-container">
            <?php
            foreach ($books as $book) {
            ?>
            <div class="card-container">
                <a class="link-book" href="index.php?action=showDetailBook&idBook=<?=$book['ID']?>">
                    <div class="card-image">
                        <?php if ($book['DISPONIBILITY'] == 0): ?>
                            <p class="label-non-dispo">non dispo.</p>
                            <img src="../<?= $book['COVER']; ?>" alt="<?= htmlspecialchars($book['COVER']); ?>">
                        <?php else: ?>
                            <img src="../<?= $book['COVER']; ?>" alt="<?= htmlspecialchars($book['COVER']); ?>">
                        <?php endif; ?>
                    </div>
                    <div class="card-info">
                        <h3><?= htmlspecialchars($book['TITLE']); ?></h3>
                        <p><?= htmlspecialchars($book['AUTHOR']); ?></p>
                        <div class="card-vendor">
                            <p>Vendu par : <?= htmlspecialchars($book['USERNAME_VENDOR']); ?></p>
                        </div>
                    </div>
                </a>
            </div>
            <?php
    }
    ?>
        </div>
    </div>

</section>