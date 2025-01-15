<?php

/*Page librairie */


session_start();
?>
<section class="container-library">
    <div class="main-container">
        <div class="split-container">
            <div class="container-title">
                <h1>Nos livres à l'échange</h1>
            </div>
            <div class="container-search">
                <form action="search.php" method="GET">
                    <button type="submit">
                        <img src="../public/assets/icon-search.svg">
                    </button>
                    <input type="text" name="query" placeholder="Rechercher un livre" required>
                </form>
            </div>
        </div>
        <div class="books-grid-container">
            <?php
            foreach ($books as $book) {
            ?>
            <div class="card-container">
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
            </div>
            <?php
    }
    ?>
        </div>
    </div>

</section>