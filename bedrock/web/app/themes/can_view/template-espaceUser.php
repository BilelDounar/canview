<?php
/**
 * Template Name: EspaceCandidat
 */
get_header();
?>
    <section id="espaceUser">
        <div class="wrap2">
            <div class="espace">
                <h1><span>ESPACE</span> CANDIDAT</h1>
                <div class="separator"></div>
                <div class="profil">
                    <div class="photoProfil">
                        <div class="photo">
                            <img src="<?php echo asset('img/photo_profil.jpg') ?>" alt="">
                        </div>
                    </div>
                    <div class="content">
                        <div class="info">
                            <p><span>Nom:</span> HANKS</p>
                            <p><span>Prénom:</span> Tom</p>
                            <p><span>Age:</span> 55ans</p>
                        </div>
                        <div class="action">
                            <ul>
                                <li><a class="voir" href="">Voir le CV</a></li>
                                <li><a class="telecharge" href="">Télécharger le CV</a></li>
                                <li><a class="modif" href="">Modifier le CV</a></li>
                                <li><a class="supprime" href="">Supprimer le CV</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
get_footer();