<?php

add_action('wp_ajax_get_connexion_data', 'getConnexionAjaxMaster');
add_action('wp_ajax_nopriv_get_connexion_data', 'getConnexionAjaxMaster');

function getConnexionAjaxMaster(){
    $errors=[];
    $success=false;

    // login
    $mail=trim(strip_tags($_POST['mail']));
    // password
    $password=trim(strip_tags($_POST['password']));

    $creds = array(
        'user_login'    => $mail,
        'user_password' => $password,
        'remember'      => true
    );

    $user = wp_signon( $creds, false );

    if ( is_wp_error( $user ) ) {
        $errors['login'] =  $user->get_error_message();
    } else {
        $success =true;
    }
    showJson(array('errors' => $errors, 'success' => $success));
}