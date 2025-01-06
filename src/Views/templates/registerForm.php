<?php
/** Page d'inscription  */
?>

<section class="container-registration">
    <div class="container-left">
        <div class="container-form">
            <h1>Inscription</h1>
            <form method="POST" action="index.php?action=createUser">
                <label for="pseudo">Pseudo</label>
                <input type="text" name="username">
                <label for="email">Adresse mail</label>
                <input type="text" name="email">
                <label for="password">Mot de passe</label>
                <input type="password" name="password">
                <input type="submit" class="submit-registration" value="S'inscrire">
            </form>

            <p>Déjà inscrit ? <a href="?action=connectionForm">Connectez-vous</a></p>
        </div>
    </div>
    <div class="container-right">
        <img src="<?= BASE_URL; ?>assets/accueil/Mask group-2.png" alt="">
    </div>
</section>