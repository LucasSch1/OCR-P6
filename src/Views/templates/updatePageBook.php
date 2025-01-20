<?php
/**
 * Page de modification d'un livre
 */

use Lucas\OcrP6\Models\BookManager;


$bookManager = new BookManager();
$book = $bookManager->getBookById($_REQUEST['id']);
$currentDisponibility = $book[0]['DISPONIBILITY'];
var_dump($book[0]['ID']);
?>


<section class="container-modification-book">
    <div class="return-container">
        <a href="?action=privateAccountUser" class="back-link"><img src="../public/assets/arrow_return.svg"> retour</a>
    </div>
    <h1 class="title-page">Modifier les informations</h1>
    <div class="container-main">
        <div class="container-photo">
            <h2>Photo</h2>
            <form action="index.php?action=updateBookPicture" method="POST" enctype="multipart/form-data">
                <div class="container-image-book">
                    <img src="../<?php echo htmlspecialchars($book[0]['COVER']); ?>">
                </div>
                <input type="hidden"  name="bookId" value="<?php echo htmlspecialchars($book[0]['ID']); ?>">
                <input type="file" id="book-picture-upload" name="book-picture" accept="image/*" onchange="this.form.submit()">
                <a href="#" class="modify-button" onclick="document.getElementById('book-picture-upload').click(); return false;">Modifier la photo</a>
            </form>
        </div>
        <div class="container-informations">
            <form method="POST" action="?action=updateBook">
                <input type="hidden" name="idBookUpdate" value="<?php echo htmlspecialchars($book[0]['ID']); ?>">
                <label for="titlebookUpdate">Titre</label>
                <input type="text" name="titlebookUpdate" value="<?php echo htmlspecialchars($book[0]['TITLE']); ?>">
                <label for="authorUpdate">Auteur</label>
                <input type="text" name="authorUpdate" value="<?php echo htmlspecialchars($book[0]['AUTHOR']); ?>">
                <label for="commentaryUpdate">Commentaire</label>
                <textarea name="commentaryUpdate" class="commentary-container" rows="17"><?php echo htmlspecialchars($book[0]['DESCRIPTION']); ?></textarea>

                <label for="choice-disponibility">Disponibilité</label>
                <select id="disponibility-choice-book" name="choice-disponibility">
                    <option value="1" <?php echo $currentDisponibility == 1 ? 'selected': '' ?>>disponible</option>
                    <option value="0" <?php echo $currentDisponibility == 0 ? 'selected' : '' ?>>non disponible</option>
                </select>
                <input type="submit" class="submit-modification" value="Valider">
            </form>
        </div>
    </div>


</section>