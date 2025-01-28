<?php
/** Page de connexion  */
?>

<section class="container-connection">
    <div class="container-left">
        <div class="container-form">
            <?php if (!empty($error)): ?>
                <p class="error"><?php echo htmlspecialchars($error); ?></p>
            <?php endif; ?>
            <h1>Connexion</h1>
            <form method="POST" action="?action=connectUser">
                <label for="email">Adresse mail</label>
                <input type="text" id="email" name="email" required>
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" required>
                <input type="submit" class="submit-connection" value="Connexion">
            </form>

            <p>Pas de compte ? <a href="?action=registerForm">Inscrivez-vous</a></p>
        </div>
    </div>
    <div class="container-right">
        <img src="<?= BASE_URL; ?>assets/accueil/image-inscription.png" alt="Image de garde représentant des livres">
    </div>
</section>