<?php

add_action('wp_ajax_get_CV_form', 'getCVFormMaster');
add_action('wp_ajax_nopriv_get_CV_form', 'getCVFormMaster');


function getCVFormMaster()
{
    $errors = array();
    $success = false;

    // faille xss
    $tel = sanitize_text_field($_POST['tel']);
    $naiss = sanitize_text_field($_POST['naiss']);
    $adresse = sanitize_text_field($_POST['adresse']);
    $code = sanitize_text_field($_POST['code']);
    $ville = sanitize_text_field($_POST['ville']);
    $permis = sanitize_text_field($_POST['permis']);
    $motivations = sanitize_text_field($_POST['motivations']);
    $langues = sanitize_text_field($_POST['langues']);
    $photo = sanitize_text_field($_POST['photo']);
    $formation = sanitize_text_field($_POST['formation']);
    $loisirs = sanitize_text_field($_POST['loisirs']);


    // validation
    $errors = validPhoneNumber($errors, $tel, 'tel');
    $errors = validationText($errors, $naiss, 'naiss', 3, 60);
    $errors = validationText($errors, $adresse, 'adresse', 2, 60);
    $errors = validationText($errors, $code, 'code', 5, 5);
    $errors = validationText($errors, $ville, 'ville', 3, 100);
    $errors = validationText($errors, $permis, 'permis', 2, 5);



    if (count($errors) === 0 && empty($userCreationErrors)) {
        global $wpdb;

        $cv = $wpdb->prefix . 'cv';

        $current_user = wp_get_current_user();
        $nom = $current_user->user_lastname;
        $prenom = $current_user->user_firstname;

        $data = array(

            'id_user' => get_current_user_id(),
            'nom' => $nom,
            'prenom' => $prenom,
            'telephone' => $tel,
            'anniversaire' => $naiss,
            'adresse' => $adresse,
            'postale' => $code,
            'ville' => $ville,
            'permis' => $permis,
            // 'motivation' => $motivations,
            // 'created_at' => date('Y-m-d H:i:s'),
            // 'langues' => $langues,
            // 'photo' => $photo,
            // 'formation' => $formation,
            // 'loisirs' => $loisirs
        );

        $wpdb->insert($cv, $data);

        $success = true;
    }

    showJson(array(
        'errors' => $errors,
        'success' => $success
    ));
}
