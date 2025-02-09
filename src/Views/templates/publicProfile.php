<?php
/*Compte public */

?>

<section class="public-profile-page">
    <div class="split-container">
        <div class="container-user-information">
            <div class="image-user-container">
                <img src="../<?php echo $user->getPicture(); ?>" alt="Image de profil du vendeur">
            </div>
            <hr>
            <div class="information-user">
                <h1 class="username-container"><?php echo htmlspecialchars($user->getUsername()); ?></h1>
                <p class="date-member-container"><?php echo htmlspecialchars($memberShipDuration); ?></p>
                <h2>BIBLIOTHEQUE</h2>
                <div class="container-bibliotheque">
                    <img src="../public/assets/icon_book.svg" class="icon-container" alt="Icone livre">
                    <p class="book-number-container"><?php echo htmlspecialchars($total_books); ?> livres</p>
                </div>
                <?php if ($connectedUserId !== $user->getId()): ?>
                    <div class="bouton-container">
                        <form action="index.php?action=showMessageByUserId" method="POST">
                            <input type="hidden" name="user_id" value="<?= $user->getId()?>">
                            <button type="submit" class="btn-send-message">Envoyer un message</button>
                        </form>
                    </div>
                <?php endif; ?>
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
                                <img src="../<?= htmlspecialchars($book['COVER'], ENT_QUOTES, 'UTF-8') ?>" alt="Image du livre <?= htmlspecialchars($book['TITLE']) ?>">
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

