<?php
/**
 * Template Name: Homepage
 */

require_once 'functions.php';

global $metaHome;
get_header();
?>
    <section id="intro">
        <div class="wrap">
            <div class="content">
                <div class="left_content">
                    <div class="texte">
                        <h1>Showcase Your Talents</h1>
                        <p>Déposez votre CV et trouvez un job!</p>
                    </div>
                    <div class="btn">
                        <a href="#">Créer mon CV</a>
                    </div>


                </div>
                <div class="right_content">
                    <?php
                    $args = array(
                        'post_type'      => 'diapo',
                        'posts_per_page' => 4
                    );
                    $the_query = new WP_Query( $args );
                    ?>

                    <div class="flexslider">
                        <ul class="slides">
                            <?php if ( $the_query->have_posts() ) {
                                while ( $the_query->have_posts() ) { $the_query->the_post(); ?>
                                    <li>
                                        <?php echo getImageOneByPostId(get_the_ID(),'diapo', get_the_title()); ?>
                                    </li>
                                <?php }
                            } wp_reset_postdata(); ?>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="separator"></div>
        </div>
    </section>
    <section id="statistics">
        <div class="wrap">
            <div class="content">
                <div class="titles">
                    <h1>Les chiffres clés</h1>
                    <h3>Des statistiques qui parlent</h3>
                </div>
                <div class="infos">
                    <div class="info_1">
                        <div class="titre">
                            <h2>+ de 2000</h2>
                        </div>
                        <div class="texte">
                            <p>Professionnels ont déjà trouvé leur opportunité grâce à nous.</p>
                        </div>
                    </div>
                    <div class="info_2">
                        <div class="titre">
                            <h2>Enregistrez votre CV dès maintenant!</h2>
                            <div class="icon">
                                <img src="<?php echo asset('img/file-alt.svg') ?>" alt="icon cv">
                            </div>
                        </div>
                        <div class="texte">
                            <a href="">Déposez votre CV</a>
                        </div>
                    </div>
                    <div class="info_3"><div class="titre">
                            <h2>50 000</h2>
                        </div>
                        <div class="texte">
                            <p>Postes à pourvoir dans notre réseau de recrutement.</p>
                        </div>
                    </div>
                    <div class="info_4">
                        <div class="titre">
                            <h2>Recevez des alertes sur les opportunités</h2>
                            <div class="icon">
                                <img src="<?php echo asset('img/bell.svg') ?>" alt="icon cloche">

                            </div>
                        </div>
                        <div class="texte">
                            <a href="#">Notifications</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="separator"></div>
        </div>
    </section>
    <section id="configuration">
        <div class="wrap">
            <div class="content">
                <div class="titles">
                    <h1>Configurez votre compte</h1>
                    <p>Lorem ipsum dolor sit amet</p>
                </div>
                <div class="onglets">
                    <div class="onglet_1">
                        <div class="image">
                            <?php echo getImageById(web_r($metaHome, 'image_1'), 'img_etape_config'); ?>
                            <p>Etape 1</p>
                        </div>
                        <div class="titre">
                            <h3>Inscrivez-vous</h3>
                            <p>Créez-vous un compte en renseignant vos moyens de contact</p>
                        </div>
                    </div>
                    <div class="onglet_2">
                        <div class="image">
                            <?php echo getImageById(web_r($metaHome, 'image_2'), 'img_etape_config'); ?>
                            <p>Etape 2</p>
                        </div>
                        <div class="titre">
                            <h3>Créez votre CV</h3>
                            <p>Remplissez le formulaire avec vos compétences et expériences</p>
                        </div>
                    </div>
                    <div class="onglet_3">
                        <div class="image">
                            <?php echo getImageById(web_r($metaHome, 'image_3'), 'img_etape_config'); ?>
                            <p>Etape 3</p>
                        </div>
                        <div class="titre">
                            <h3>Envoyez-le</h3>
                            <p>Envoyez votre cv à notre agence et recevez une propositions d'emploie sous 48h !</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="separator"></div>
        </div>
    </section>
<section id="qui_somme_nous">
    <div class="transition"></div>
    <div class="wrap">
        <div class="content">
            <div class="titles">
                <h1>Qui sommes-nous ?</h1>
                <p>Connect with profesionals worldwide</p>
            </div>
            <div class="video">
                <iframe width="1024" height="554" src="<?php echo web_r($metaHome, 'video') ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
        </div>
        <div class="separator"></div>
    </div>
</section>
<section id="mobile">
    <div class="wrap">
        <div class="content">
            <div class="left_content">
                <img src="<?php echo asset('img/telephone.png') ?>" alt="téléphone">
            </div>
            <div class="right_content">
                <div class="logo">
                    <img src="<?php echo asset('img/logo.png') ?>" alt="logo canview">
                </div>
                <div class="texte">
                    <h1>Bientôt...</h1>
                    <p>Retrouver Can View sur toutes vos plateformes bientôt</p>
                </div>
                <div class="download">
                    <a class="apple" href="https://www.apple.com/fr/app-store/"><img src="<?php echo asset('img/app-store-badge.svg') ?>" alt="logo apple"></a>
                    <a class="google" href="https://play.google.com/store/"><img src="<?php echo asset('img/google-play-badge.png') ?>" alt="logo google"></a>
                </div>
            </div>

        </div>
    </div>

</section>





<?php

get_footer();