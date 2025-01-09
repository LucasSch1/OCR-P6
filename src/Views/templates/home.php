<?php
 /** Page d'accueil */
?>

<?php
session_start();
?>
<div class="page">
    <section class="section-one">
        <div class="container-left">
            <h1>Rejoignez nos<br> lecteurs passionnés</h1>
            <p>Donnez une nouvelle vie à vos livres en les échangeant avec d'autres amoureux de la lecture. Nous croyons en la magie du partage de connaissances et d'histoires à travers les livres. </p>
            <div class="btn-container">
                <a href="<?= BASE_URL; ?>login">Découvrir</a>
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
            <div class="card-container">
                <div class="card-image">
                    <img src="<?= BASE_URL; ?>assets/accueil/Mask group-5.png" alt="">
                </div>
                <div class="card-info">
                    <h3>Esther</h3>
                    <p>Alabaster</p>
                    <div class="card-vendor">
                        <p>Vendu par : CamilleClubLit</p>
                    </div>
                </div>
            </div>
            <div class="card-container">
                <div class="card-image">
                    <img src="<?= BASE_URL; ?>assets/accueil/Mask group-5.png" alt="">
                </div>
                <div class="card-info">
                    <h3>The Kinfolk Table</h3>
                    <p>Nathan Williams</p>
                    <div class="card-vendor">
                        <p>Vendu par : Nathalire</p>
                    </div>
                </div>
            </div>
            <div class="card-container">
                <div class="card-image">
                    <img src="<?= BASE_URL; ?>assets/accueil/Mask group-5.png" alt="">
                </div>
                <div class="card-info">
                    <h3>Wabi Sabi</h3>
                    <p>Beth Kempton</p>
                    <div class="card-vendor">
                        <p>Vendu par : Alexlecture</p>
                    </div>
                </div>
            </div>
            <div class="card-container">
                <div class="card-image">
                    <img src="<?= BASE_URL; ?>assets/accueil/Mask group-5.png" alt="">
                </div>
                <div class="card-info">
                    <h3>Milk & honey</h3>
                    <p>Rupi Kaur</p>
                    <div class="card-vendor">
                        <p>Vendu par : Hugo1990_12</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="btn-more-book">
            <a href="<?= BASE_URL; ?>login" role="button">Voir tous les livres</a>
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
            <a href="<?= BASE_URL; ?>login" role="button">Voir tous les livres</a>
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


