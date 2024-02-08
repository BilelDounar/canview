<?php
$vendor_dir = rtrim(WP_CONTENT_DIR, '/') . '/vendor';

require 'C:\xampp2\htdocs\projet_canview\projet-cvtheques\bedrock/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'C:\xampp2\htdocs\projet_canview\projet-cvtheques\bedrock/vendor/phpmailer/phpmailer/src/SMTP.php';
require 'C:\xampp2\htdocs\projet_canview\projet-cvtheques\bedrock/vendor/phpmailer/phpmailer/src/Exception.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

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
    $metier = sanitize_text_field($_POST['metier']);
    $photo = $_FILES['photo'];
    $langues = sanitize_text_field($_POST['langues']);
    $formation = sanitize_text_field($_POST['formation']);

    // validation
    $errors = validPhoneNumber($errors, $tel, 'tel');
    $errors = validationText($errors, $naiss, 'naiss', 3, 60);
    $errors = validationText($errors, $adresse, 'adresse', 2, 60);
    $errors = validationText($errors, $code, 'code', 5, 5);
    $errors = validationText($errors, $ville, 'ville', 3, 100);
    $errors = validationText($errors, $metier, 'metier', 3, 100);
    $errors = validationText($errors, $permis, 'permis', 2, 5);

    if (count($errors) === 0) {
        global $wpdb;

        $current_user = wp_get_current_user();
        $nom = $current_user->user_lastname;
        $prenom = $current_user->user_firstname;
        $email = $current_user->user_email;

        $currentYear = date('Y');
        $currentMonth = date('m');

        $target_subdir = '/user_profil/';

        $upload_dir = wp_upload_dir();
        $target_dir = $upload_dir['basedir'] . $target_subdir;

        if (!file_exists($target_dir)) {
            wp_mkdir_p($target_dir);
        }

        $file_name = $currentYear . '_' . $currentMonth . '_' . $nom . '_' . $prenom . '.' . pathinfo($photo['name'], PATHINFO_EXTENSION);
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
                'metier' => $metier,
                'permis' => $permis,
                'motivation' => $motivations,
                'created_at' => current_time('mysql'),
                'photo' => $file_name,
            );

            $wpdb->insert($cv_table, $cv_data);

            $cv_id = $wpdb->insert_id;

            // Loisirs
            $loisirs_table = $wpdb->prefix . 'loisir';
            if (isset($_POST['loisirs'])) {
                $loisirsData = isset($_POST['loisirs']) ? json_decode(stripslashes($_POST['loisirs']), true) : array();
                $loisirs = is_array($loisirsData) ? $loisirsData : array();

                foreach ($loisirs as $loisir) {
                    $loisir = sanitize_text_field($loisir);

                    $loisirs_data = array(
                        'id_cv' => $cv_id,
                        'loisir' => $loisir,
                    );
                    $wpdb->insert($loisirs_table, $loisirs_data);
                }
            }

            // Formations
            $formations_table = $wpdb->prefix . 'formation';

            if (isset($_POST['formations'])) {
                $formationsData = isset($_POST['formations']) ? json_decode(stripslashes($_POST['formations']), true) : array();
                $formations = is_array($formationsData) ? $formationsData : array();

                foreach ($formations as $formation) {
                    $formation = sanitize_text_field($formation);

                    $formations_data = array(
                        'id_cv' => $cv_id,
                        'formation' => $formation,
                    );
                    $wpdb->insert($formations_table, $formations_data);
                }
            }

            // Expériences
            $experiences_table = $wpdb->prefix . 'experience';

            if (isset($_POST['experiences'])) {
                $experiencesData = isset($_POST['experiences']) ? json_decode(stripslashes($_POST['experiences']), true) : array();
                $experiences = is_array($experiencesData) ? $experiencesData : array();

                foreach ($experiences as $experience) {
                    $experience = sanitize_text_field($experience);

                    $experiences_data = array(
                        'id_cv' => $cv_id,
                        'experience' => $experience,
                    );
                    $wpdb->insert($experiences_table, $experiences_data);
                }
            }

            // Langues
            $langues_table = $wpdb->prefix . 'passerelle_langue';

            if (isset($_POST['langues'])) {
                $languesData = isset($_POST['langues']) ? json_decode(stripslashes($_POST['langues']), true) : array();
                $langues = is_array($languesData) ? $languesData : array();

                foreach ($langues as $langue) {
                    $langue = sanitize_text_field($langue);

                    $langue_id = $wpdb->get_var(
                        $wpdb->prepare(
                            "SELECT id FROM {$wpdb->prefix}langue WHERE langue = %s",
                            $langue
                        )
                    );

                    if ($langue_id) {
                        $langues_data = array(
                            'id_cv' => $cv_id,
                            'id_langue' => $langue_id,
                        );
                        $wpdb->insert($langues_table, $langues_data);
                    }
                }
            }

            // Compétences
            $competences_table = $wpdb->prefix . 'passerelle_softskills';

            if (isset($_POST['competences'])) {
                $competencesData = isset($_POST['competences']) ? json_decode(stripslashes($_POST['competences']), true) : array();
                $competences = is_array($competencesData) ? $competencesData : array();

                foreach ($competences as $competence) {
                    $competence = sanitize_text_field($competence);

                    $competence_id = $wpdb->get_var(
                        $wpdb->prepare(
                            "SELECT id FROM {$wpdb->prefix}softskills WHERE softskills = %s",
                            $competence
                        )
                    );

                    if ($competence_id) {
                        $competences_data = array(
                            'id_cv' => $cv_id,
                            'id_softskills' => $competence_id,
                        );
                        $wpdb->insert($competences_table, $competences_data);
                    }
                }
            }

            // Compétences Tech.
            $competencehards_table = $wpdb->prefix . 'passerelle_hardskills';

            if (isset($_POST['competencehards'])) {
                $competencehardsData = isset($_POST['competencehards']) ? json_decode(stripslashes($_POST['competencehards']), true) : array();
                $competencehards = is_array($competencehardsData) ? $competencehardsData : array();

                foreach ($competencehards as $competencehard) {
                    $competencehard = sanitize_text_field($competencehard);

                    $hardskills_id = $wpdb->get_var(
                        $wpdb->prepare(
                            "SELECT id FROM {$wpdb->prefix}hardskills WHERE hardskills = %s",
                            $competencehard
                        )
                    );

                    if ($hardskills_id) {
                        $competencehards_data = array(
                            'id_cv' => $cv_id,
                            'id_hardskills' => $hardskills_id,
                        );
                        $wpdb->insert($competencehards_table, $competencehards_data);
                    }
                }
            }

            $success = true;



            $sendmail = new PHPMailer(true);
            try {
                // Paramètres du serveur SMTP
                $sendmail->CharSet = "UTF-8";
                $sendmail->isSMTP();
                $sendmail->Host = 'smtp.hostinger.com';
                $sendmail->SMTPAuth = true;
                $sendmail->Username = 'contact@portfoliobileldounar.online';
                $sendmail->Password = '7gB#2D@9fZ!';
                $sendmail->SMTPSecure = 'ssl';
                $sendmail->Port = 465;


                // Destinataire et contenu
                $sendmail->setFrom('contact@portfoliobileldounar.online');
                $sendmail->AddAddress($email);
                $sendmail->isHTML(true);
                $sendmail->Subject = 'Dépot de votre CV';
                $sendmail->Body = "
                    <div style='font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; padding: 20px; background-color: #f4f4f4; color: #333;'>
                    <h1><strong>Can View</strong></h1>
                    <h2 style='color: #95d1d8;'>Bonjour $nom $prenom !</h2>
                    <p>Votre CV a correctement été enregistré!<br><br>
                    Vous pouvez à présent vous rendre dans votre <strong><a href='" . path('espace-candidat') . "' style='color: #95d1d8; text-decoration: none;'>Espace client</a></strong> afin de le consulter ou le modifier!<br><br>
                    L'équipe <strong style='color: #95d1d8;'>Can View</strong> vous remercie pour votre confiance!
                    </p>
                    <p style='font-size: 14px; color: #888;'>Cordialement,<br>L'équipe Can View</p></div>";


                // Envoyer l'email
                $sendmail->send();
            } catch (Exception $e) {
                echo "Erreur lors de l'envoi de l'email : {$sendmail->ErrorInfo}";
            }


            showJson(array(
                'errors' => $errors,
                'success' => $success,
            ));
        }
    }

    showJson(array(
        'errors' => $errors,
        'success' => $success,
    ));
}
