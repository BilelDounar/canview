<?php 

$errors = '';

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['mail'])) {
    // Assurez-vous que les valeurs ne sont pas vides
    if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['mail'])) {
        // Assurez-vous que le nom d'utilisateur ne contient que des caractères alphanumériques
        if (ctype_alnum($_POST['username'])) {
            // Utilisez wp_create_user pour créer l'utilisateur
            $user_id = wp_create_user($_POST['username'], $_POST['password'], $_POST['mail']);

            if (!is_wp_error($user_id)) {
                // L'utilisateur a été créé avec succès
                $errors = '';
            } else {
                // Il y a eu une erreur lors de la création de l'utilisateur
                $errors = 'Erreur lors de la création de l\'utilisateur : ' . $user_id->get_error_message();
            }
        } else {
            // Le nom d'utilisateur n'est pas valide
            $errors = 'Le nom d\'utilisateur doit contenir uniquement des caractères alphanumériques.';
        }
    } else {
        // Les champs ne doivent pas être vides
        $errors = 'Veuillez remplir tous les champs.';
    }
}

?>

<div class="all_form_bar_horizontal">
    <img src="<?= path() ?>/app/themes/can_view/asset/img/bar_horizontal1.png" alt="">
</div>
<section id="signin">
    <div class="all_form_title">
        <h2>Inscription</h2>
    </div>
    <form action="" method="post" id="inscritpion">
        <div class="inline_form ">
            <div class="coolinput ">
                <label for="prenom" class="text">Prénom / Nom</label>
                <input type="text" name="prenom" id="prenom" class="input">
                <span id="error_prenom"></span>
            </div>
            <div class="coolinput ">
                <label for="username" class="text">Username</label>
                <input type="text" name="username" id="username" class="input">
                <span id="error_username"></span>
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
                <label for="password2" class="text">Confirmer</label>
                <input type="password" name="password2" id="password2" class="input">
            </div>
            <div class="coolinput ">
                <button id="signin_button" class="input ">Envoyer</button>
            </div>
        </div>
        <?= $errors ?>
    </form>
    <div class="inline_form_text ">
        <div class="coolinput ">
            <a href="">Déjà un compte ?</a>
        </div>
        <div class="coolinput ">
            <p>En soumettant ce formulaire vous concenter à l’utilisation de vos données </p>
        </div>

    </div>
    <? debug($errors) ?>
</section>