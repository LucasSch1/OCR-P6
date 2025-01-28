<?php
/** Page du compte */

use Lucas\OcrP6\Models\UserManager;

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
                    <form action="index.php?action=updateUserPicture" method="POST" enctype="multipart/form-data">
                        <img src="../<?php echo htmlspecialchars($_SESSION['user']['picture']); ?>" class="img-profile" alt="Image de profil">
                        <input type="file" id="profile-picture-upload" name="profile-picture" accept="image/*" onchange="this.form.submit()">
                        <a href="#" class="modify-button" onclick="document.getElementById('profile-picture-upload').click(); return false;">modifier</a>
                    </form>
                    <hr class="separator">
                    <h2 class="username-container"><?php echo htmlspecialchars($_SESSION['user']['username']); ?></h2>
                    <p class="date-member-container"><?php echo htmlspecialchars($userManager->getMembershipDuration($registrationDate)); ?></p>
                    <h3 class="text-bibliotheque">BIBLIOTHEQUE</h3>
                    <div class="container-bibliotheque">
                        <img src="../public/assets/icon_book.svg" class="icon-container" alt="Icone de livre">
                        <p class="book-number-container"><?php echo htmlspecialchars($total_books); ?> livres</p>
                    </div>
                </div>
            </div>
            <div class="container-right">
                <h2>Vos informations personnelles</h2>
                <form method="POST" action="index.php?action=updateUser">
                    <label for="email">Adresse mail</label>
                    <input type="text" id="email" name="emailUpdate" value="<?php echo htmlspecialchars($_SESSION['user']['email']); ?>">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="passwordUpdate">
                    <label for="pseudo">Pseudo</label>
                    <input type="text" id="pseudo" name="usernameUpdate" value="<?php echo htmlspecialchars($_SESSION['user']['username']); ?>">
                    <input type="submit" class="submit-modification" value="Enregistrer">
                </form>

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
                    <th>DISPONIBILITE</th>
                    <th>ACTION</th>

                </tr>

                </thead>
                <tbody>
                <?php foreach ($books as $book): ?>
                    <tr>
                        <?php $url = "index.php?action=showDetailBook&idBook=" . $book['ID']; ?>
                        <td class="td-cover">
                            <a href="<?= $url ?>">
                                <img src="../<?= htmlspecialchars($book['COVER'], ENT_QUOTES, 'UTF-8') ?>" alt="Image du livre <?= htmlspecialchars($book['TITLE'])?>">
                            </a>
                        </td>
                        <td class="td-titre"><?= htmlspecialchars($book['TITLE'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td class="td-auteur"><?= htmlspecialchars($book['AUTHOR'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td class="td-description"><?= htmlspecialchars($shortDescription = substr($book['DESCRIPTION'], 0, 87).'...', ENT_QUOTES, 'UTF-8') ?></td>
                        <td class="td-disponibilite">
                            <?php if ($book['DISPONIBILITY'] == 1): ?>
                                <span class="disponible">disponible</span>
                            <?php else: ?>
                                <span class="non-disponible">non dispo.</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a class="edit-button" href="?action=showUpdateBook&id=<?= $book['ID'] ?>">Éditer</a>
                            <a class="delete-button" href="?action=deleteBookById&id=<?= $book['ID'] ?>">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

