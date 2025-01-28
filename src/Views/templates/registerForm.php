<?php
/** Page d'inscription  */
?>

<section class="container-registration">
    <div class="container-left">
        <div class="container-form">
            <?php if (!empty($error)): ?>
                <p class="error"><?php echo htmlspecialchars($error); ?></p>
            <?php endif; ?>
            <h1>Inscription</h1>
            <form method="POST" action="index.php?action=createUser">
                <label for="pseudo">Pseudo</label>
                <input type="text" id="pseudo" name="username" required>
                <label for="email">Adresse mail</label>
                <input type="text" id="email" name="email" required>
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" required>
                <input type="submit" aria-label="S'inscrire (bouton vert)" class="submit-registration" value="S'inscrire">
            </form>

            <p>Déjà inscrit ? <a href="?action=connectionForm">Connectez-vous</a></p>
        </div>
    </div>
    <div class="container-right">
        <img src="<?= BASE_URL; ?>assets/accueil/image-inscription.png" alt="Image de garde représentant une bibliothèque de livre">
    </div>
</section>