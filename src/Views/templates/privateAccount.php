<?php
/** Page du compte */

use Lucas\OcrP6\Models\UserManager;

session_start();
$userManager = new UserManager();
$userId = $_SESSION['user']['id'];
$books = $userManager->getBookByUserId($userId);
$total_books = $userManager->countBooksByUserId($userId);
$registrationDate = $userManager->getUserRegistrationDate($userId);
?>

<div class="page-private-account">
    <h1>Mon compte</h1>
    <div class="grid-container">
        <div class="informations-cards">
            <div class="container-left">
                <div class="img-profile-container">
                    <img src="../<?php echo htmlspecialchars($_SESSION['user']['picture']); ?>" class="img-profile">
                    <a href="" class="modify-button">modifier</a>
                    <hr class="separator">
                    <h2 class="username-container"><?php echo htmlspecialchars($_SESSION['user']['username']); ?></h2>
                    <p class="date-member-container"><?php echo htmlspecialchars($userManager->getMembershipDuration($registrationDate)); ?></p>
                    <h3 class="text-bibliotheque">BIBLIOTHEQUE</h3>
                    <div class="container-bibliotheque">
                        <img src="../public/assets/icon_book.svg" class="icon-container">
                        <p class="book-number-container"><?php echo htmlspecialchars($total_books); ?> livres</p>
                    </div>
                </div>
            </div>
            <div class="container-right">
                <h2>Vos informations personnelles</h2>
                <form method="POST" action="index.php?action=createUser">
                    <label for="email">Adresse mail</label>
                    <input type="text" name="email" value="<?php echo htmlspecialchars($_SESSION['user']['email']); ?>">
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" value="<?php echo htmlspecialchars($_SESSION['user']['password']); ?>">
                    <label for="pseudo">Pseudo</label>
                    <input type="text" name="username" value="<?php echo htmlspecialchars($_SESSION['user']['username']); ?>">
                    <input type="submit" class="submit-modification" value="Enregistrer">
                </form>

            </div>
        </div>
        <div class="library-user">
            <table>
                <!-- En-têtes statiques en HTML -->
                <thead>
                <tr>
                    <th>PHOTO</th>
                    <th>TITRE</th>
                    <th>AUTEUR</th>
                    <th>DESCRIPTION</th>
                    <th>DISPONIBILITE</th>
                    <th>ACTION</th>

                </tr>
                </thead>
                <tbody>
                <!-- Données dynamiques en PHP -->
                <?php foreach ($books as $book): ?>
                    <tr>
                        <td class="td-cover"><img src="../<?= htmlspecialchars($book['COVER'], ENT_QUOTES, 'UTF-8') ?>"></td>
                        <td class="td-titre"><?= htmlspecialchars($book['TITLE'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td class="td-auteur"><?= htmlspecialchars($book['AUTHOR'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td class="td-description"><?= htmlspecialchars($shortDescription = substr($book['DESCRIPTION'], 0, 87).'...', ENT_QUOTES, 'UTF-8') ?></td>
                        <td class="td-disponibilite"><?= htmlspecialchars($book['DISPONIBILITY'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td>
                            <a href="">Editer</a>
                            <a href="">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

