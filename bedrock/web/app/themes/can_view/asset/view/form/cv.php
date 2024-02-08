<?php
// debug($_POST);
// debug(wp_upload_dir());

global $wpdb;

$table_langues = $wpdb->prefix . 'langue';
$table_competences = $wpdb->prefix . 'softskills';
$table_competencestech = $wpdb->prefix . 'hardskills';

$query_langues = "SELECT * FROM $table_langues ORDER BY langue ASC";
$query_skill = "SELECT * FROM $table_competences ORDER BY softskills ASC";
$query_hardskill = "SELECT * FROM $table_competencestech ORDER BY hardskills ASC";

$langues = $wpdb->get_results($query_langues, ARRAY_A);
$competences = $wpdb->get_results($query_skill, ARRAY_A);
$competencestech = $wpdb->get_results($query_hardskill, ARRAY_A);

?>

<div class="all_form_bar_horizontal">
    <img src="<?= path() ?>/app/themes/can_view/asset/img/bar_horizontal2.png" alt="">
</div>
<section id="cv">
    <div class="all_form_title">
        <h2>Créez votre CV</h2>
    </div>
    <form action="" id="formcv" enctype="multipart/form-data" method="post">
        <div class="padd_cv">
            <div class="inline_form ">
                <div class="coolinput ">
                    <label for="tel" class="text">Tel</label>
                    <input type="number" name="tel" id="tel" class="input">
                    <span id="error_tel"></span>
                </div>
                <div class="coolinput ">
                    <label for="naiss" class="text">Date de naissance</label>
                    <input type="date" name="naiss" id="naiss" class="input">
                    <span id="error_naiss"></span>
                </div>
            </div>
            <div class="inline_form ">
                <div class="coolinput ">
                    <label for="adresse" class="text">Adresse</label>
                    <input type="text" name="adresse" id="adresse" class="input">
                    <span id="error_adresse"></span>
                </div>
                <div class="coolinput ">
                    <label for="code" class="text">Code Postal</label>
                    <input type="text" name="code" id="code" class="input">
                    <span id="error_code"></span>
                </div>
            </div>
            <div class="inline_form ">
                <div class="coolinput ">
                    <label for="ville" class="text">Ville</label>
                    <input type="text" name="ville" id="ville" class="input">
                    <span id="error_ville"></span>
                </div>
                <div class="inline_check">
                    <div class=""><span>Permis</span></div>
                    <label class="switch"><span class="choix">Non</span>
                        <input type="checkbox" id="permis" name="permis" value="oui" checked>
                        <span class="slider"></span>
                        <span class="choix">Oui</span>
                    </label>
                </div>
            </div>

            <div class="inline_form ">
                <div class="coolinput coolinput_large">
                    <label for="metier" class="text">Votre métier </label>
                    <input type="text" name="metier" id="metier" class="input">
                    <span id="error_metier"></span>
                </div>
            </div>
            <div class="inline_form ">
                <div class="form_textarea">
                    <div class="coolinput coolinput_large">
                        <label for="motivations" class="text">Vos Motivations</label>
                        <textarea name="motivations" id="motivations" class="input"></textarea>
                    </div>
                </div>
            </div>
            <div class="inline_form ">

                <div class="coolinput box_form ">
                    <label for="motivations" class="text box_title">Vos Langues</label>
                    <div class="coolinput box_datalist">
                        <label for="searchInput" class="text">Langues :</label>
                        <div class="box_datalist" id="boxDataLangues">
                            <select id="searchInputLangues" name="langues" class="searchInput">
                                <option value="" selected disabled hidden>Sélectionner une langue</option>
                                <?php if ($langues) {
                                    // Parcourir les résultats et faire quelque chose avec chaque langue
                                    foreach ($langues as $langue) {
                                        // Utiliser $langue['nom_langue'] pour accéder au nom de la langue, par exemple
                                        $nom_langue = $langue['langue'];
                                        echo '<option value="' . $nom_langue . '">' . $nom_langue . '</option>';
                                    }
                                } else {
                                    // Aucune langue trouvée
                                    echo "Aucune langue trouvée.";
                                } ?>

                            </select>
                            <div class="container_button_cv">
                                <a href="#" id="addLangues" class="input button_add">Ajouter</a>
                            </div>
                            <hr class="dashed_hr">
                        </div>


                    </div>
                </div>
                <div class="coolinput box_form ">
                    <label for="motivations" class="text box_title">Vos Compétences</label>
                    <div class="coolinput box_datalist">
                        <label for="searchInput" class="text">Compétences :</label>
                        <div class="box_datalist" id="boxDataCompetences">
                            <select id="searchInputCompetences" name="competences" class="searchInput">
                                <option value="" selected disabled hidden>Sélectionner une langue</option>
                                <?php if ($competences) {
                                    // Parcourir les résultats et faire quelque chose avec chaque langue
                                    foreach ($competences as $competence) {
                                        // Utiliser $langue['nom_langue'] pour accéder au nom de la langue, par exemple
                                        $nom_competence = $competence['softskills'];
                                        echo '<option value="' . $nom_competence . '">' . $nom_competence . '</option>';
                                    }
                                } else {
                                    // Aucune langue trouvée
                                    echo "Aucune langue trouvée.";
                                } ?>
                            </select>
                            <div class="container_button_cv">
                                <a href="#" id="addCompetences" class="input button_add">Ajouter</a>
                            </div>
                            <hr class="dashed_hr">
                        </div>
                    </div>
                </div>
            </div>



            <div class="inline_form ">
                <div class="coolinput box_form ">
                    <label for="photo" class="text box_title">Votre Photo</label>
                    <div class="box_datalist">
                        <input type="file" class="input-file" name="photo" id="photo" accept="image/jpg, image/png, image/jpeg">
                        <span id="error_photo"></span>
                        <p class="browse"><strong>Formats supportés :</strong> png, .jpg, .jpeg.</p>

                    </div>
                </div>
            </div>
            <div class="inline_form ">
                <div class="coolinput box_form ">
                    <label for="motivations" class="text box_title">Vos Compétences Techniques</label>
                    <div class="coolinput box_datalist">
                        <label for="searchInput" class="text">Compétences Techniques :</label>
                        <div class="box_datalist" id="boxDataCompetencesHard">
                            <select id="searchInputCompetencesHard" name="competences_hard" class="searchInput">
                                <option value="" selected disabled hidden>Sélectionner une compétence tech.</option>
                                <?php if ($competencestech) {
                                    // Parcourir les résultats et faire quelque chose avec chaque langue
                                    foreach ($competencestech as $competencetech) {
                                        // Utiliser $langue['nom_langue'] pour accéder au nom de la langue, par exemple
                                        $nom_competencetech = $competencetech['hardskills'];
                                        echo '<option value="' . $nom_competencetech . '">' . $nom_competencetech . '</option>';
                                    }
                                } else {
                                    // Aucune langue trouvée
                                    echo "Aucune langue trouvée.";
                                } ?>
                            </select>
                            <div class="container_button_cv">
                                <a href="#" id="addCompetencesHard" class="input button_add">Ajouter</a>
                            </div>
                            <hr class="dashed_hr">
                        </div>

                    </div>

                </div>
            </div>


            <div class="inline_form ">
                <div class="coolinput box_form ">
                    <label for="motivations" class="text box_title">Vos Expériences</label>
                    <div class="coolinput box_datalist">
                        <label for="searchInput" class="text">Expériences :</label>
                        <div class="box_datalist" id="boxDataExperiences">
                            <input type="text" id="searchInputExperiences" name="formation" class="searchInput">
                            <div class="container_button_cv">
                                <a href="#" id="addExperiences" class="input button_add">Ajouter</a>
                            </div>
                            <hr class="dashed_hr">
                        </div>

                    </div>
                </div>
            </div>
            <div class="inline_form ">
                <div class="coolinput box_form ">
                    <label for="motivations" class="text box_title">Vos Formations</label>
                    <div class="coolinput box_datalist">
                        <label for="searchInput" class="text">Formations :</label>
                        <div class="box_datalist" id="boxDataFormations">
                            <input type="text" id="searchInputFormations" name="formation" class="searchInput">
                            <div class="container_button_cv">
                                <a href="#" id="addFormations" class="input button_add">Ajouter</a>
                            </div>
                            <hr class="dashed_hr">
                        </div>

                    </div>
                </div>
            </div>
            <div class="inline_form ">
                <div class="coolinput box_form ">
                    <label for="motivations" class="text box_title">Vos Loisirs</label>
                    <div class="coolinput box_datalist">
                        <label for="searchInput" class="text">Loisirs :</label>
                        <div class="box_datalist" id="boxDataLoisirs">
                            <input type="text" id="searchInputLoisirs" name="loisirs" class="searchInput">
                            <div class="container_button_cv">
                                <a href="#" id="addLoisirs" class="input button_add">Ajouter</a>
                            </div>
                            <hr class="dashed_hr">
                        </div>

                    </div>
                </div>
            </div>
            <div class="inline_form ">
                <input type="submit" class="input button_add" value="Envoyer">
            </div>

        </div>
    </form>
</section>