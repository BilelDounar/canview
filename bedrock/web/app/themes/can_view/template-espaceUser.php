<?php
/**
 * Template Name: EspaceCandidat
 */

securisationCandidat();

global $wpdb;
$id=get_current_user_id();
$cv = $wpdb->get_results(
    "SELECT * FROM canview_cv WHERE id_user=$id;
",
);

if(empty($cv)){
    //redirection a faire vers la création de cv
    header('Location: '.path('all-form').'?signon=on');
}
$anniversaire = new DateTime($cv[0]->anniversaire);
$aujourdHui = new DateTime();
$age = $aujourdHui->diff($anniversaire)->y;

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
                            <img src="<?= path('/') .'app/uploads/user_profil/' . $cv[0]->photo ?>" alt="">
                        </div>
                    </div>
                    <div class="content">
                        <div class="info">
                            <p><span>Nom:</span> <?php echo $cv[0]->nom ?></p>
                            <p><span>Prénom:</span> <?php echo $cv[0]->prenom ?></p>
                            <p><span>Age:</span> <?php echo $age ?> ans</p>
                        </div>
                        <div class="action">
                            <ul>
                                <li><a class="voir" href="">Voir le CV</a></li>
                                <li><a class="telecharge" href="<?php echo path('cvpdf') ?>?id=<?php echo $id ?>">Télécharger le CV</a></li>
                                <li><a class="modif" href="">Modifier le CV</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
get_footer();