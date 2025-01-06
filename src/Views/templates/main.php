<?php
/** Ce fichier est le template principal qui contient ce qui a été généré par les autres vues */

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>OCR-P6</title>
    <link rel="stylesheet" href="./assets/style.css">
</head>
<body>
<header>
    <div class="logo">
        <img src="http://localhost/OCR-P6/OCR-P6/public/assets/logo-header.svg" alt="Logo">
    </div>
    <nav class="nav-menu">
        <ul class="menu">
            <li><a href="http://localhost/OCR-P6/OCR-P6/public/index.php">Accueil</a></li>
            <li><a href="http://localhost/OCR-P6/OCR-P6/public/index.php/upload">Nos livres à l'échange</a></li>
        </ul>
    </nav>
    <nav class="nav-account">
        <ul class="menu-account">
            <li><a href="http://localhost/OCR-P6/OCR-P6/public/index.php/login">Messagerie</a></li>
            <?php
            // Si on est connecté, on affiche le bouton de déconnexion, sinon, on affiche le bouton de connexion :
            if (isset($_SESSION['user'])) {
                echo '<li><a href="index.php?action=disconnectUser">Mon compte</a></li>';
                echo '<li><a href="index.php?action=disconnectUser">Déconnexion</a></li>';
            }else{
                echo '<li><a href="index.php?action=connectionForm">Connexion</a></li>';
            }
            ?>
        </ul>
    </nav>
</header>
	<?php echo $content; ?>
<footer>
    <nav class="nav-footer">
        <div class="menu-footer">
            <ul>
                <li><a href="http://localhost/OCR-P6/OCR-P6/public/index.php/login">Politique de confidentialité</a></li>
                <li><a href="http://localhost/OCR-P6/OCR-P6/public/index.php/logout">Mention légales</a></li>
                <li><a href="http://localhost/OCR-P6/OCR-P6/public/index.php/logout">Tom Troc&copy;</a></li>
            </ul>
            <div class="logo-footer">
                <img src="http://localhost/OCR-P6/OCR-P6/public/assets/logo-footer.svg" alt="Logo">
            </div>
        </div>
    </nav>
</footer>
</body>
</html>
