<?php

add_action('wp_ajax_get_inscription_form', 'getInscriptionFormMaster');
add_action('wp_ajax_nopriv_get_inscription_form', 'getInscriptionFormMaster');



function getinscriptionFormMaster()
{
    $errors = array();
    $success = false;

    // faille xss
    $prenom = sanitize_text_field($_POST['prenom']);
    $nom = sanitize_text_field($_POST['nom']);
    $mail = sanitize_email($_POST['mail']);
    $password = sanitize_text_field($_POST['password']);

    // validation
    $errors = validationText($errors, $prenom, 'prenom', 3, 60);
    $errors = validationText($errors, $nom, 'nom', 3, 60);
    $errors = validationText($errors, $password, 'password', 6, 120);
    $errors = validEmail($errors, $mail, 'mail');

    if (count($errors) === 0 && empty($userCreationErrors)) {
        $success = true;
    }

    $userdata = array(
        'user_pass'             => $password,     //(string) The plain-text user password.
        'user_login'            => $nom,     //(string) The user's login username.
        'user_email'            => $mail,     //(string) The user email address.
        'first_name'            => $prenom,     //(string) The user's first name. For new users, will be used to build the first part of the user's display name if $display_name is not specified.
        'last_name'             => $nom,     //(string) The user's last name. For new users, will be used to build the second part of the user's display name if $display_name is not specified.
        'role'                  => 'subscriber',     //(string) User's role.

    );


    if (isset($prenom) && isset($nom) && isset($mail)) {
        if (!empty($nom) && !empty($password) && !empty($mail)) {
            if (ctype_alnum($nom)) {
                $user_id = wp_insert_user($userdata);

                if (!is_wp_error($user_id)) {
                    $success = true;

                    $userCreationErrors = null;

                    // Connexion automatique
                    $creds = array(
                        'user_login'    => $nom,
                        'user_password' => $password,
                        'remember'      => true,
                    );

                    $user = wp_signon($creds);

                    if (is_wp_error($user)) {
                        $userCreationErrors = 'Erreur lors de la connexion automatique : '  . $user->get_error_message();
                    }
                } else {
                    $userCreationErrors = 'Erreur lors de la création de l\'utilisateur : '  . $user_id->get_error_message();
                }
            } else {
                $userCreationErrors = 'Le nom d\'utilisateur doit contenir uniquement des caractères alphanumériques.';
            }
        }
    }



    showJson(array(
        'errors' => $errors,
        'userCreationErrors' => $userCreationErrors,
        'success' => $success,
    ));
}
