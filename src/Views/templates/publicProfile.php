<?php
/*Compte public */

var_dump($user);
?>

<section class="public-profile-page">
    <div class="split-container">
        <div class="container-user-information">
            <div class="image-user-container">
                <img src="../<?php echo $user->getPicture(); ?>">
            </div>
            <hr>
            <div class="information-user">
                <h1 class="username-container"><?php echo htmlspecialchars($user->getUsername()); ?></h1>
                <p class="date-member-container"><?php echo htmlspecialchars($memberShipDuration); ?></p>
                <h2>BIBLIOTHEQUE</h2>
                <div class="container-bibliotheque">
                    <img src="../public/assets/icon_book.svg" class="icon-container">
                    <p class="book-number-container"><?php echo htmlspecialchars($total_books); ?> livres</p>
                </div>
                <div class="bouton-container">
                    <a href="">Écrire un message</a>
                </div>
            </div>
        </div>
        <div class="library-user">
            <table>
                <thead>
                <tr>
                    <th>PHOTO</th>
                    <th>TITRE</th>
                    <th>AUTEUR</th>
                    <th>DESCRIPTION</th>
                </tr>

                </thead>
                <tbody>
                <?php foreach ($books as $book): ?>
                    <tr>
                        <?php $url = "index.php?action=showDetailBook&idBook=" . $book['ID']; ?>
                        <td class="td-cover">
                            <a href="<?= $url ?>">
                                <img src="../<?= htmlspecialchars($book['COVER'], ENT_QUOTES, 'UTF-8') ?>">
                            </a>
                        </td>
                        <td class="td-titre"><?= htmlspecialchars($book['TITLE'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td class="td-auteur"><?= htmlspecialchars($book['AUTHOR'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td class="td-description"><?= htmlspecialchars($shortDescription = substr($book['DESCRIPTION'], 0, 87).'...', ENT_QUOTES, 'UTF-8') ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

