<?php
//
// Template Name: All-Form-Fisrt-Time 
//  
include('header.php');

?>


<section id="all_form">
    <div class="wrap">
        <div class="all_form_container">
            <div class="all_form_left">
                <div class="all_form_bar_vertical">
                    <div class="all_form_text">
                        <div class="all_form_text_box">
                            <img src="<?= path() ?>/app/themes/can_view/asset/img/dote.png" alt="">
                            <div class="">
                                <h4>étape 1</h4>
                                <p>Créez-vous un compte afin de consulter et modifier vos CV à votre guise.</p>
                            </div>
                        </div>
                        <div class="all_form_text_box">
                            <img src="<?= path() ?>/app/themes/can_view/asset/img/dote.png" alt="">
                            <div class="">
                                <h4>étape 2</h4>
                                <p>Créez-vous un compte afin de consulter et modifier vos CV à votre guise.</p>
                            </div>
                        </div>
                        <div class="all_form_text_box">
                            <img src="<?= path() ?>/app/themes/can_view/asset/img/dote.png" alt="">
                            <div class="">
                                <h4>étape 3</h4>
                                <p>Créez-vous un compte afin de consulter et modifier vos CV à votre guise.</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="all_form_right">
                <div class="all_form_bar_horizontal">
                    <img src="<?= path() ?>/app/themes/can_view/asset/img/bar_horizontal.png" alt="">
                </div>
                <div class="all_form_title">
                    <h2>Inscription</h2>
                </div>
                <form action="" id="inscritpion">
                    <div class="inline_form ">
                        <div class="coolinput ">
                            <label for="nom" class="text">Nom</label>
                            <input type="text" name="nom" id="nom" class="input">
                        </div>
                        <div class="coolinput ">
                            <label for="prenom" class="text">Prénom</label>
                            <input type="text" name="prenom" id="prenom" class="input">
                        </div>
                    </div>
                    <div class="inline_form ">
                        <div class="coolinput ">
                            <label for="mail" class="text">E-mail</label>
                            <input type="email" name="mail" id="mail" class="input">
                        </div>
                        <div class="coolinput ">
                            <label for="password" class="text">Mot de Passe</label>
                            <input type="password" name="password" id="password" class="input">
                        </div>
                    </div>
                    <div class="inline_form ">
                        <div class="coolinput ">
                            <label for="password2" class="text">Confirmer</label>
                            <input type="password" name="password2" id="password2" class="input">
                        </div>
                        <div class="coolinput ">
                            <a href="" id="signin" class="input">Continuer</a>
                        </div>
                    </div>
                    <div class="inline_form_text ">
                        <div class="coolinput ">
                            <a href="">Déjà un compte ?</a>
                        </div>
                        <div class="coolinput ">
                            <p>En soumettant ce formulaire vous concenter à l’utilisation de vos données </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php echo get_template_directory_uri();