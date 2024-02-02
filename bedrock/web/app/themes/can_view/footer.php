<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package can_view
 */
?>

<a href="#" id="back-to-top">Retour en haut</a>

<footer id="colophon">
    <div class="logo">
        <img src="<?= path() ?>/app/themes/can_view/asset/img/logo.png" alt="">
    </div>
    <div class="fine-print">
        <ul>
            <li>Main</li>
            <li>Concept</li>
            <li>Squad</li>
        </ul>
        <p>All rights reserved 2024</p>
    </div>
    <div class="social">
        <img src="<?= path() ?>/app/themes/can_view/asset/img/twitter.svg" alt="">
        <img src="<?= path() ?>/app/themes/can_view/asset/img/instagram.svg" alt="">
        <img src="<?= path() ?>/app/themes/can_view/asset/img/linkedin.svg" alt="">
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>