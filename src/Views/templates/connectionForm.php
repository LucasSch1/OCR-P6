<?php
/** Page de connexion  */
?>

<section class="container-connection">
    <div class="container-left">
        <div class="container-form">
            <h1>Connexion</h1>
            <form>
                <label for="email">Adresse mail</label>
                <input type="text">
                <label for="password">Mot de passe</label>
                <input type="password">
                <input type="submit" class="submit-connection" value="Connexion">
            </form>

            <p>Pas de compte ? <a href="main.php">Inscrivez-vous</a></p>
        </div>
    </div>
    <div class="container-right">
        <img src="<?= BASE_URL; ?>assets/accueil/Mask group-2.png" alt="">
    </div>
</section>