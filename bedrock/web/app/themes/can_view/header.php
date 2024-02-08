<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package can_view
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz@9..40&display=swap" rel="stylesheet">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <header id="masthead">
        <nav class="top-nav wraphead">

            <div class="logo">
                <a href="<?= path('/') ?>">
                    <img src="<?= path() ?>/app/themes/can_view/asset/img/logo.png" alt="">
                </a>
            </div>

            <input id="menu-toggle" type="checkbox" />
            <label class='menu-button-container' for="menu-toggle">
                <div class='menu-button'></div>
            </label>

            <ul class="menu">
                <?php
                $user = wp_get_current_user();
                if (!is_user_logged_in()) { ?>
                    <li><a href="<?php echo path('all-form') ?>">Inscription</a></li>
                    <li><a id="connexion" href="">Connexion</a></li>
                    <?php } else {
                    if ($user->roles[0] == 'subscriber') {
                    ?>
                        <li><a href="<?php echo path('espace-candidat') ?>">Mon espace candidat</a></li>
                        <li><a href="<?php echo path('profil details') ?>">Mon curiculum vitae</a></li>
                    <?php } else { ?>
                        <li><a href="<?php echo path('espace-recruteur') ?>">Mon espace recruteur</a></li>
                    <?php } ?>

                    <li><a href="<?php echo wp_logout_url(path('/')); ?>">Déconnexion</a></li>

                <?php  } ?>


            </ul>
        </nav>
    </header>
    <?php include('asset/view/modal-login.php');
