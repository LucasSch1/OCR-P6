<?php
/** Ce fichier est le template principal qui contient ce qui a été généré par les autres vues */

$current_page = basename($_SERVER['PHP_SELF']);
function isActive($page) {
    $current_page = $_GET['action'] ?? 'home';
    return $current_page === $page ? 'active' : '';
}

if (!isset($_SESSION['unread_messages'])) {
    $_SESSION['unread_messages'] = 0;
}
$is_logged_in = isset($_SESSION['user']) && $_SESSION['user'];
$unread_messages = $is_logged_in ? $_SESSION['unread_messages'] : 0;

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>OCR-P6</title>
    <link rel="stylesheet" href="./assets/style.css">
</head>
<body>
<header>
    <div class="container-logo-menu">
        <div class="logo">
            <a href="index.php?action=home">
                <img src="../public/assets/logo-header.svg" alt="Logo">
            </a>
        </div>
        <nav class="nav-menu">
            <ul class="menu">
                <li class="<?php echo isActive('home'); ?>"><a href="index.php?action=home">Accueil</a></li>
                <li class="<?php echo isActive('showLibraryBook'); ?>"><a href="index.php?action=showLibraryBook">Nos livres à l'échange</a></li>
            </ul>
        </nav>
    </div>
    <nav class="nav-account">
        <ul class="menu-account">
            <li class="<?php echo isActive('showMessagerie'); ?>"><a href="index.php?action=showMessagerie">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="14" viewBox="0 0 15 14" fill="none">
                        <path d="M12.5342 10.8594L12.3182 11.0439L12.4441 11.2822V12.7332L11.1804 12.0036L11.0119 11.8558L10.8037 11.9494C9.81713 12.3931 8.6938 12.645 7.5 12.645C3.50458 12.645 0.355 9.84779 0.355 6.5C0.355 3.15221 3.50458 0.355 7.5 0.355C11.4954 0.355 14.645 3.15221 14.645 6.5C14.645 8.19467 13.8458 9.73885 12.5342 10.8594ZM11.1765 12.0014C11.1765 12.0014 11.1766 12.0014 11.1766 12.0014L11.1765 12.0014L11.1765 12.0014Z" stroke="#292929" stroke-width="0.71"/>
                    </svg>Messagerie
                    <span id="message-counter" class="<?php echo $unread_messages == 0 ? 'zero' : ''; ?>">
                          <?php echo $unread_messages; ?>
                    </span>
                </a>
            </li>

            <?php
            if (isset($_SESSION['user'])) {
                echo '<li class="'.isActive('privateAccountUser').'">
                     <a href="index.php?action=privateAccountUser">
                        <svg xmlns="http://www.w3.org/2000/svg" width="11" height="13" viewBox="0 0 11 13" fill="none">
                        <mask id="path-1-inside-1_10556_31" fill="white">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M5.42801 9.28571C7.99219 9.28571 10.0709 7.20704 10.0709 4.64286C10.0709 2.07868 7.99219 0 5.42801 0C2.86383 0 0.785156 2.07868 0.785156 4.64286C0.785156 7.20704 2.86383 9.28571 5.42801 9.28571ZM5.42801 9.28571C2.86383 9.28571 0.785156 10.1172 0.785156 11.1429C0.785156 12.1685 2.86383 13 5.42801 13C7.99219 13 10.0709 12.1685 10.0709 11.1429C10.0709 10.1172 7.99219 9.28571 5.42801 9.28571Z"/>
                        </mask>
                        <path d="M9.36087 4.64286C9.36087 6.81491 7.60007 8.57571 5.42801 8.57571V9.99571C8.38431 9.99571 10.7809 7.59916 10.7809 4.64286H9.36087ZM5.42801 0.71C7.60007 0.71 9.36087 2.4708 9.36087 4.64286H10.7809C10.7809 1.68656 8.38431 -0.71 5.42801 -0.71V0.71ZM1.49516 4.64286C1.49516 2.4708 3.25596 0.71 5.42801 0.71V-0.71C2.47171 -0.71 0.0751563 1.68656 0.0751563 4.64286H1.49516ZM5.42801 8.57571C3.25596 8.57571 1.49516 6.81491 1.49516 4.64286H0.0751563C0.0751563 7.59916 2.47171 9.99571 5.42801 9.99571V8.57571ZM5.42801 8.57571C4.07872 8.57571 2.82447 8.79318 1.88133 9.17044C1.41173 9.35828 0.984055 9.59971 0.662168 9.90412C0.338782 10.2099 0.0751563 10.6283 0.0751563 11.1429H1.49516C1.49516 11.1387 1.49538 11.1236 1.51157 11.0919C1.52924 11.0574 1.56597 11.0038 1.63786 10.9358C1.78586 10.7959 2.03811 10.6371 2.4087 10.4889C3.14595 10.194 4.21313 9.99571 5.42801 9.99571V8.57571ZM0.0751563 11.1429C0.0751563 11.6574 0.338783 12.0758 0.662168 12.3816C0.984055 12.686 1.41173 12.9274 1.88133 13.1153C2.82447 13.4925 4.07872 13.71 5.42801 13.71V12.29C4.21313 12.29 3.14595 12.0917 2.4087 11.7968C2.03811 11.6486 1.78586 11.4898 1.63786 11.3499C1.56597 11.2819 1.52924 11.2283 1.51157 11.1938C1.49538 11.1621 1.49516 11.147 1.49516 11.1429H0.0751563ZM5.42801 13.71C6.77731 13.71 8.03156 13.4925 8.9747 13.1153C9.4443 12.9274 9.87197 12.686 10.1939 12.3816C10.5172 12.0758 10.7809 11.6574 10.7809 11.1429H9.36087C9.36087 11.147 9.36064 11.1621 9.34445 11.1938C9.32679 11.2283 9.29005 11.2819 9.21817 11.3499C9.07017 11.4898 8.81791 11.6486 8.44732 11.7968C7.71008 12.0917 6.6429 12.29 5.42801 12.29V13.71ZM10.7809 11.1429C10.7809 10.6283 10.5172 10.2099 10.1939 9.90412C9.87197 9.59971 9.4443 9.35828 8.9747 9.17044C8.03156 8.79318 6.77731 8.57571 5.42801 8.57571V9.99571C6.6429 9.99571 7.71008 10.194 8.44732 10.4889C8.81791 10.6371 9.07017 10.7959 9.21817 10.9358C9.29005 11.0038 9.32679 11.0574 9.34445 11.0919C9.36064 11.1236 9.36087 11.1387 9.36087 11.1429H10.7809Z" fill="#292929" mask="url(#path-1-inside-1_10556_31)"/>
                        </svg>Mon compte
                     </a>
                </li>';
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
                <li><a href="">Politique de confidentialité</a></li>
                <li><a href="">Mention légales</a></li>
                <li><a href="">Tom Troc&copy;</a></li>
            </ul>
            <div class="logo-footer">
                <img src="../public/assets/logo-footer.svg" alt="Logo">
            </div>
        </div>
    </nav>
</footer>
</body>
</html>
