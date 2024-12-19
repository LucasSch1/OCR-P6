<?php
 /** Page d'accueil */
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
            <a href="<?= BASE_URL; ?>books">Voir tous les livres</a>
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
    </section>
</div>


