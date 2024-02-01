<div class="all_form_bar_horizontal">
    <img src="<?= path() ?>/app/themes/can_view/asset/img/bar_horizontal2.png" alt="">
</div>
<section id="cv">
    <div class="all_form_title">
        <h2>Créez votre CV</h2>
    </div>
    <div class="padd_cv">
        <div class="inline_form ">
            <div class="coolinput ">
                <label for="tel" class="text">Tel</label>
                <input type="text" name="tel" id="tel" class="input">
            </div>
            <div class="coolinput ">
                <label for="naiss" class="text">Date de naissance</label>
                <input type="text" name="naiss" id="naiss" class="input">
            </div>
        </div>
        <div class="inline_form ">
            <div class="coolinput ">
                <label for="adresse" class="text">Adresse</label>
                <input type="text" name="adresse" id="adresse" class="input">
            </div>
            <div class="coolinput ">
                <label for="code" class="text">Code Postal</label>
                <input type="text" name="code" id="code" class="input">
            </div>
        </div>
        <div class="inline_form ">
            <div class="coolinput ">
                <label for="ville" class="text">Ville</label>
                <input type="text" name="ville" id="ville" class="input">
            </div>
            <div class="inline_check">
                <div class=""><span>Permis</span></div>
                <label class="switch"><span class="choix">Oui</span>
                    <input type="checkbox">
                    <span class="slider"></span>
                    <span class="choix">Non</span>
                </label>
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
                    <div class="box_datalist">
                        <input type="text" id="searchInputLangues" class="searchInput" list="optionsListLangues">

                        <datalist id="optionsListLangues">
                            <option value="Option 1">
                            <option value="Option 2">
                            <option value="Option 3">
                            <option value="Option 4">
                        </datalist>
                        <div class="container_button_cv">
                            <a href="#" id="addCompetences" class="input button_add">Ajouter</a>

                        </div>
                        <hr class="dashed_hr">
                        <div class="box_info_added">
                            <span>Text 1</span>
                            <div class="">
                                <hr class="dashed_hr">
                                <a href=""><i class="fa-solid fa-trash-can"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="coolinput box_form ">
                <label for="motivations" class="text box_title">Vos Compétences</label>
                <div class="coolinput box_datalist">
                    <label for="searchInput" class="text">Compétences :</label>
                    <div class="box_datalist">
                        <input type="text" id="searchInputCompetences" class="searchInput" list="optionsListCompetences">

                        <datalist id="optionsListCompetences">
                            <option value="Option 1">
                            <option value="Option 2">
                            <option value="Option 3">
                            <option value="Option 4">
                        </datalist>
                        <div class="container_button_cv">
                            <a href="#" id="addCompetences" class="input button_add">Ajouter</a>

                        </div>
                        <hr class="dashed_hr">
                        <div class="box_info_added">
                            <span>Text 1</span>
                            <div class="">
                                <hr class="dashed_hr">
                                <a href=""><i class="fa-solid fa-trash-can"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="inline_form ">
            <div class="coolinput box_form ">
                <label for="photo" class="text box_title">Votre Photo</label>
                <div class="box_datalist">
                    <input type="file" class="input-file" accept="image/jpg, image/png, image/jpeg">
                    <p class="browse"><strong>Formats supportés :</strong> avi, flv, mp4, m4v, mkv, mov, mpg, mpeg, ogg, ogv, wmv, 3gp, 3g2.</p>

                </div>
            </div>
        </div>


        <div class="inline_form ">
            <div class="coolinput box_form ">
                <label for="motivations" class="text box_title">Vos Expériences</label>
                <div class="coolinput box_datalist">
                    <label for="searchInput" class="text">Expériences :</label>
                    <div class="box_datalist">
                        <input type="text" id="searchInputCompetences" class="searchInput" list="optionsListCompetences">

                        <datalist id="optionsListCompetences">
                            <option value="Option 1">
                            <option value="Option 2">
                            <option value="Option 3">
                            <option value="Option 4">
                        </datalist>
                        <div class="container_button_cv">
                            <a href="#" id="" class="input button_add">Ajouter</a>
                        </div>
                        <hr class="dashed_hr">
                        <div class="box_info_added">
                            <span>Text 1</span>
                            <div class="">
                                <hr class="dashed_hr">
                                <a href=""><i class="fa-solid fa-trash-can"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="inline_form ">
            <button id="submitted" class="input button_add">Envoyer</button>
        </div>
    </div>
    </form>
</section>