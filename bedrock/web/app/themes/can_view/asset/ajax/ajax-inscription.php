<?php

add_action('wp_ajax_get_inscription_form', 'getInscriptionFormMaster');
add_action('wp_ajax_nopriv_get_inscription_form', 'getInscriptionFormMaster');


function getinscriptionFormMaster()
{
    $errors = array();
    $success = false;

    // faille xss
    $prenom = sanitize_text_field($_POST['prenom']);
    $username = sanitize_text_field($_POST['username']);
    $mail = sanitize_email($_POST['mail']);
    $password = sanitize_text_field($_POST['password']);

    // validation
    $errors = validationText($errors, $prenom, 'prenom', 3, 60);
    $errors = validationText($errors, $username, 'username', 3, 60);
    $errors = validationText($errors, $password, 'password', 6, 120);
    $errors = validEmail($errors, $mail, 'mail');

    if (count($errors) === 0) {
        $success = true;
    }

    showJson(array(
        'errors' => $errors,
        'success' => $success
    ));
}
