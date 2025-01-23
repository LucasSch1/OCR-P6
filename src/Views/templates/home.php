<?php
 /** Page d'accueil */
?>

<div class="page">
    <section class="section-one">
        <div class="container-left">
            <h1>Rejoignez nos<br> lecteurs passionnés</h1>
            <p>Donnez une nouvelle vie à vos livres en les échangeant avec d'autres amoureux de la lecture. Nous croyons en la magie du partage de connaissances et d'histoires à travers les livres. </p>
            <div class="btn-container">
                <a href="index.php?action=showLibraryBook">Découvrir</a>
            </div>
        </div>
        <div class="container-right">
            <figure>
                <img src="<?= BASE_URL; ?>assets/accueil/image-first-section-accueil.png" alt="">
                <figcaption>Hamza</figcaption>
            </figure>
        </div>
    </section>
    <section class="section-two">
        <h2>Les derniers livres ajoutés</h2>
        <div class="container-center">
                <?php
            foreach ($lastbooks as $lastbook) {
            ?>
            <div class="card-container">
                <a class="link-book" href="index.php?action=showDetailBook&idBook=<?=$lastbook['ID']?>">
                    <div class="card-image">
                    <?php if ($lastbook['DISPONIBILITY'] == 0): ?>
                        <p class="label-non-dispo">non dispo.</p>
                        <img src="../<?= $lastbook['COVER']; ?>" alt="<?= htmlspecialchars($lastbook['COVER']); ?>">
                    <?php else: ?>
                        <img src="../<?= $lastbook['COVER']; ?>" alt="<?= htmlspecialchars($lastbook['COVER']); ?>">
                    <?php endif; ?>
                    </div>
                    <div class="card-info">
                        <h3><?= htmlspecialchars($lastbook['TITLE']); ?></h3>
                        <p><?= htmlspecialchars($lastbook['AUTHOR']); ?></p>
                        <div class="card-vendor">
                            <p>Vendu par : <?= htmlspecialchars($lastbook['USERNAME_VENDOR']); ?></p>
                        </div>
                    </div>
                </a>
            </div>
                <?php
            }
                ?>
        </div>
        <div class="btn-more-book">
            <a href="index.php?action=showLibraryBook" role="button">Voir tous les livres</a>
        </div>
    </section>
    <section class="section-three">
        <div class="container-top">
            <h2>Comment ça marche ?</h2>
            <p>Échanger des livres avec TomTroc c’est simple et amusant ! Suivez ces étapes pour commencer :</p>
        </div>
        <div class="container-center">
            <div class="first-box">
                <p>Inscrivez-vous gratuitement sur notre plateforme.</p>
            </div>
            <div class="second-box">
                <p>Ajoutez les livres que vous souhaitez échanger à votre profil.</p>
            </div>
            <div class="third-box">
                <p>Parcourez les livres disponibles chez d'autres membres.</p>
            </div>
            <div class="fourth-box">
                <p>Proposez un échange et discutez avec d'autres passionnés de lecture.</p>
            </div>
        </div>
        <div class="btn-more-book">
            <a href="index.php?action=showLibraryBook" role="button">Voir tous les livres</a>
        </div>
    </section>
    <section class="section-image">
        <div class="container-image">
            <img src="<?= BASE_URL; ?>assets/accueil/Mask group.png" alt="">
        </div>
    </section>
    <section class="section-four">
        <div class="container-text">
            <div class="first-container">
                <h2>Nos valeurs</h2>
            </div>
            <div class="second-container">
                <p>Chez Tom Troc, nous mettons l'accent sur le partage, la découverte et la communauté. Nos valeurs sont ancrées dans notre passion pour les livres et notre désir de créer des liens entre les lecteurs. Nous croyons en la puissance des histoires pour rassembler les gens et inspirer des conversations enrichissantes</p>
            </div>
            <div class="third-container">
                <p>Notre association a été fondée avec une conviction profonde : chaque livre mérite d'être lu et partagé. </p>
            </div>
            <div class="fourth-container">
                <p>Nous sommes passionnés par la création d'une plateforme conviviale qui permet aux lecteurs de se connecter, de partager leurs découvertes littéraires et d'échanger des livres qui attendent patiemment sur les étagères.</p>
            </div>
        </div>
        <div class="container-end">
            <div class="first-container">
                <p>
                    L'équipe Tom Troc
                </p>
            </div>
            <div class="second-container">
                <img src="<?= BASE_URL; ?>assets/accueil/Vector 2@2x.png" alt="">
            </div>
        </div>

    </section>
</div>


