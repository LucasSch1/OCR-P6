<?php
/** Page du compte */
session_start();
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
                    <p class="date-member-container">Membre depuis <?php echo htmlspecialchars($_SESSION['user']['date_created']); ?></p>
                    <h3 class="text-bibliotheque">BIBLIOTHEQUE</h3>
                    <div class="container-bibliotheque">
                        <img src="../public/assets/icon_book.svg" class="icon-container">
                        <p class="book-number-container">4 livres</p>
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
            <a>Bibliothèques de l'utilisateur</a>
        </div>
    </div>

</div>

