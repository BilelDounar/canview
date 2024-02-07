

<div class="all_form_bar_horizontal">
    <img src="<?= path() ?>/app/themes/can_view/asset/img/bar_horizontal1.png" alt="">
</div>
<section id="signin">
    <div class="all_form_title">
        <h2>Inscription</h2>
    </div>
    <form action="" method="post" id="inscription_form">
        <div class="inline_form ">
            <div class="coolinput ">
                <label for="prenom" class="text">Prénom</label>
                <input type="text" name="prenom" id="prenom" class="input">
                <span id="error_prenom"></span>
            </div>
            <div class="coolinput ">
                <label for="nom" class="text">Nom</label>
                <input type="text" name="nom" id="nom" class="input">
                <span id="error_nom"></span>
            </div>
        </div>
        <div class="inline_form ">
            <div class="coolinput ">
                <label for="mail" class="text">E-mail</label>
                <input type="email" name="mail" id="mail" class="input">
                <span id="error_mail"></span>
            </div>
            <div class="coolinput ">
                <label for="password" class="text">Mot de Passe</label>
                <input type="password" name="password" id="password" class="input">
                <span id="error_password"></span>
            </div>
        </div>
        <div class="inline_form ">
            <div class="coolinput ">
                <input type="submit" id="button_inscription" class="input" value="Envoyer">
            </div>
        </div>
        <h4 id="error_global"></h4>
    </form>
    <div class="inline_form_text ">
        <div class="coolinput ">
            <a href="">Déjà un compte ?</a>
        </div>
        <div class="coolinput ">
            <p>En soumettant ce formulaire vous consentez à l’utilisation de vos données </p>
        </div>
    </div>
</section>