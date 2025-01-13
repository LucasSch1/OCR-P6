<?php
/**
 * Page de modification d'un livre
 */

use Lucas\OcrP6\Models\BookManager;

session_start();
$bookManager = new BookManager();
$book = $bookManager->getBookById($_REQUEST['id']);
?>


<section class="container-modification-book">
    <div class="return-container">
        <a><img src="../public/assets/arrow_return.svg"> retour</a>
    </div>
    <h1 class="title-page">Modifier les informations</h1>
    <div class="container-main">
        <div class="container-photo">
            <h2>Photo</h2>
            <div class="container-image-book">
                <img src="../<?php echo htmlspecialchars($book[0]['COVER']); ?>">
            </div>
            <a href="">Modifier la photo</a>
        </div>
        <div class="container-informations">
            <form method="POST" action="?action=updateUser">
                <label for="titlebookUpdate">Titre</label>
                <input type="text" name="titlebookUpdate" value="<?php echo htmlspecialchars($book[0]['TITLE']); ?>">
                <label for="authorUpdate">Auteur</label>
                <input type="text" name="authorUpdate" value="<?php echo htmlspecialchars($book[0]['AUTHOR']); ?>">
                <label for="commentaryUpdate">Commentaire</label>
                <input type="text" name="commentaryUpdate" value="<?php echo htmlspecialchars($book[0]['DESCRIPTION']); ?>">
                <label for="choice-disponibility">Disponibilité</label>
                <select id="disponibility-choice-book" name="choice-disponibility">
                    <option value="1">disponible</option>
                    <option value="0">non disponible</option>
                </select>
                <input type="submit" class="submit-modification" value="Valider">
            </form>
        </div>
    </div>


</section>