<?php

/**
 * Template Name: ProfilDetails
 */
get_header();
?>
<section id="profil_details">
    <div class="wrap">
        <div class="sidebar">
            <div class="elements">
                <a href=""><img src="<?php echo asset('img/profil-icon.svg') ?>" alt="">Profil</a>
                <div class="separator"></div>
                <a href=""><img src="<?php echo asset('img/formation-icon.svg') ?>" alt="">Formation & expérience</a>
                <div class="separator"></div>
                <a href=""><img src="<?php echo asset('img/puzzle-icon.svg') ?>" alt="">Loisirs</a>
                <div class="separator"></div>
                <a href=""><img src="<?php echo asset('img/brain-icon.png') ?>" alt="">Hardskills</a>
                <div class="separator"></div>
                <a href=""><img src="<?php echo asset('img/lotus-icon.png') ?>" alt="">Softskills</a>
            </div>
        </div>
        <div class="infos_principal">
            <div class="photo">
                <img src="<?php echo asset('img/photo_profil.jpg') ?>" alt="photo de profil">
            </div>
            <div class="text">
                <div class="titres">
                    <h2>Nom prénom</h2>
                    <h3>Métier</h3>
                </div>
                <div class="liens">
                    <a href="https://github.com/"><img src="<?php echo asset('img/github-icon.svg')?>" alt=""></a>
                    <a href="https://stackoverflow.com/"><img src="<?php echo asset('img/stackoverflow-icon.svg')?>" alt=""></a>
                    <a href="https://fr.linkedin.com/"><img src="<?php echo asset('img/linkedin-icon.svg')?>" alt=""></a>
                    <a href="https://twitter.com/"><img src="<?php echo asset('img/twitter-icon.svg')?>" alt=""></a>
                    <a href="https://www.instagram.com/"><img src="<?php echo asset('img/instagram-icon.svg')?>" alt=""></a>
                </div>
                <div class="separator"></div>
                <div class="lien_pdf">
                    <a href="">Télécharger le CV</a>
                </div>
            </div>
        </div>
        <div class="infos_modulable">
            <div class="profil">
                <div class="title">
                    <h1><span>A propos de </span>moi</h1>
                    <div class="separator"></div>
                </div>
                <div class="texte">
                    <p>A la base j’étais juste un jedi tres sympa formé par Obi-wan Kenobi mais Palpatine est venu me faire la discute et en sah, le côté obscure... ça vaaaaaaaaaa, c’est pas si terrible.</p>
                    <table>
                        <tr>
                            <td>Date de naissance : </td>
                            <td>30/05/2004</td>
                        </tr>
                        <tr>
                            <td>Téléphone : </td>
                            <td>0647314056</td>
                        </tr>
                        <tr>
                            <td>Email : </td>
                            <td>darkvador@gmail.com</td>
                        </tr>
                        <tr>
                            <td>Adresse : </td>
                            <td>Etoile de la mort</td>
                        </tr>
                        <tr>
                            <td>Permis : </td>
                            <td>Oui</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
