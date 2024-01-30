<?php
/**
 * Template Name: Homepage
 */


global $metaHome;
get_header();
?>
    <section id="intro">
        <div class="wrap">
            <div class="left_content">
                <h1>Showcase Your Talents</h1>
                <p>Déposez votre CV et trouvez un job!</p>
                <a href="#">Créer mon CV</a>
            </div>
            <div class="right_content">
                <div class="flexslider">
                    <ul class="slides">
                        <li>
                            <img src="<?php echo asset('img/image_diapo1.jpg')?>" />
                        </li>
                        <li>
                            <img src="<?php echo asset('img/image_diapo1.jpg')?>" />
                        </li>
                        <li>
                            <img src="<?php echo asset('img/image_diapo1.jpg')?>" />
                        </li>
                        <li>
                            <img src="<?php echo asset('img/image_diapo1.jpg')?>" />
                        </li>
                    </ul>
                </div>
            </div>
            <div class="separator"></div>
        </div>
    </section>
    <section id="statistics">
        <div class="wrap">
            <div class="titles">
                <h1>Lorem ipsum dolor</h1>
                <h3>Lorem ipsum dolor sit amet</h3>
            </div>
            <div class="infos">
                <div class="info_1">
                    <div class="titre">
                        <h2>+ 2000</h2>
                    </div>
                    <div class="texte">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>
                </div>
                <div class="info_2">
                    <div class="titre">
                        <h2>Lorem ipsum dolor sit amet</h2>
                        <img src="<?php echo asset('img/file-alt.svg') ?>" alt="icon cv">
                    </div>
                    <div class="texte">
                        <a href="">Déposez votre CV</a>
                    </div>
                </div>
                <div class="info_3"><div class="titre">
                        <h2>50 000</h2>
                    </div>
                    <div class="texte">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div></div>
                <div class="info_4">
                    <div class="titre">
                        <h2>Lorem ipsum dolor sit amet</h2>
                        <img src="<?php echo asset('img/bell.svg') ?>" alt="icon cloche">
                    </div>
                    <div class="texte">
                        <a href="#">Lorem ipsum</a>
                    </div>
                </div>
            </div>
            <div class="separator"></div>
        </div>
    </section>
    <section id="configuration">
        <div class="wrap">
            <div class="titles">
                <h1>Configurez votre compte</h1>
                <p>Lorem ipsum dolor sit amet</p>
            </div>
            <div class="onglets">
                <div class="onglet_1">
                    <div class="image">
                        <img src="<?php echo asset('img/img_onglet1.png') ?>" alt="">
                        <p>Etape 1</p>
                    </div>
                    <div class="titre">
                        <h3>Inscrivez-vous</h3>
                        <p>Add your contact and personal details</p>
                    </div>
                </div>
                <div class="onglet_2">
                    <div class="image">
                        <img src="<?php echo asset('img/img_onglet2.png') ?>" alt="">
                        <p>Etape 1</p>
                    </div>
                    <div class="titre">
                        <h3>Inscrivez-vous</h3>
                        <p>Add your contact and personal details</p>
                    </div>
                </div>
                <div class="onglet_3">
                    <div class="image">
                        <img src="<?php echo asset('img/img_onglet3.png') ?>" alt="">
                        <p>Etape 1</p>
                    </div>
                    <div class="titre">
                        <h3>Inscrivez-vous</h3>
                        <p>Add your contact and personal details</p>
                    </div>
                </div>
            </div>
            <div class="separator"></div>
        </div>
    </section>
<section id="qui_somme_nous">
    <div class="wrap">
        <div class="titles">
            <h1>Qui sommes-nous ?</h1>
            <p>Connect with profesionals worldwide</p>
        </div>
        <div class="video">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/Ukqii0VM7O4?si=StLiHWYjGBRCO9Vv" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
        <div class="separator"></div>
    </div>

</section>




<?php

get_footer();