<?php
/*Page de détail d'un livre*/
?>

<section class="page-detail-book">
    <div class="ariane-fil">
        <p>Nos livres ><?= $book->getTitle() ?></p>
    </div>
    <div class="split-container">
        <div class="image-container">
            <img src="../<?= $book->getCover() ?>" alt="Image représentant un livre">
        </div>
        <div class="informations-container">
            <div class="title-author-container">
                <h1><?= $book->getTitle() ?></h1>
                <p>par <?= $book->getAuthor() ?></p>
            </div>
            <hr>
            <div class="main-container-description">
                <h2>DESCRIPTION</h2>
                <div class="container-description">
<!--                    Insère un retour à la ligne à chaque nouvelle ligne.-->
                    <?=  nl2br($book->getDescription()) ?>
                </div>
            </div>
            <div class="main-container-owner">
                <h2>PROPRIÉTAIRE</h2>
                <div class="container-owner">
                    <a href="index.php?action=showPublicProfile&id=<?= $book->getIdOwner() ?>">
                        <div class="image-container-owner">
                            <img src="..<?= $book->getUsernamePicture() ?>" alt="<?= $book->getUsernamePicture() ?>">
                        </div>
                        <p><?= $book->getUsernameOwner() ?></p>
                    </a>
                </div>
            </div>
            <?php if ($connectedUserId !== $book->getIdOwner()): ?>
                <div class="btn-send-message-container">
                    <form action="index.php?action=showMessageByUserId" method="POST">
                        <input type="hidden" name="user_id" value="<?= $book->getIdOwner() ?>">
                        <button type="submit" class="btn-send-message">Envoyer un message</button>
                    </form>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

