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
    $photo = $_FILES['photo'];
    $langues = sanitize_text_field($_POST['langues']);
    $formation = sanitize_text_field($_POST['formation']);
    // $loisirs = sanitize_text_field($_POST['loisirs']);

    // validation
    $errors = validPhoneNumber($errors, $tel, 'tel');
    $errors = validationText($errors, $naiss, 'naiss', 3, 60);
    $errors = validationText($errors, $adresse, 'adresse', 2, 60);
    $errors = validationText($errors, $code, 'code', 5, 5);
    $errors = validationText($errors, $ville, 'ville', 3, 100);
    $errors = validationText($errors, $permis, 'permis', 2, 5);

    if (count($errors) === 0) {
        global $wpdb;

        $current_user = wp_get_current_user();
        $nom = $current_user->user_lastname;
        $prenom = $current_user->user_firstname;
        $email = $current_user->user_email;

        $currentYear = date('Y');
        $currentMonth = date('m');

        $upload_dir = wp_upload_dir();
        $target_dir = $upload_dir['basedir'] . '/' . $currentYear . '/' . $currentMonth . '/';

        if (!file_exists($target_dir)) {
            wp_mkdir_p($target_dir);
        }

        $file_name = $current_user->user_login . '_' . $nom . '_' . $prenom . '.' . pathinfo($photo['name'], PATHINFO_EXTENSION);
        $target_file = $target_dir . $file_name;

        if (move_uploaded_file($photo['tmp_name'], $target_file)) {

            // Insérer les données dans la table principale (cv)
            $cv_table = $wpdb->prefix . 'cv';

            $cv_data = array(
                'id_user' => get_current_user_id(),
                'nom' => $nom,
                'prenom' => $prenom,
                'mail' => $email,
                'telephone' => $tel,
                'anniversaire' => $naiss,
                'adresse' => $adresse,
                'postale' => $code,
                'ville' => $ville,
                'permis' => $permis,
                'motivation' => $motivations,
                'created_at' => current_time('mysql'),
                // 'langues' => $langues,
                'photo' => $file_name,
                // 'formation' => $formation,
                // 'loisirs' => $loisirs
            );

            $wpdb->insert($cv_table, $cv_data);

            $cv_id = $wpdb->insert_id;

            $loisirs_table = $wpdb->prefix . 'loisir';

            $loisirsData = json_decode(stripslashes($_POST['loisirs']), true);


            $loisirs = is_array($loisirsData) ? $loisirsData : array();

            foreach ($loisirs as $loisir) {
                $loisirs_data = array(
                    'id_cv' => $cv_id,
                    'loisir' => $loisir,
                );

                $wpdb->insert($loisirs_table, $loisirs_data);
            }

            $success = true;
        }
    }

    showJson(array(
        'errors' => $errors,
        'success' => $success
    ));
}
