<?php
/**
 * Template Name: EspaceRecruteur
 */

global $wpdb;
$cv = $wpdb->get_results(
    "SELECT * FROM canview_cv;
",
);
get_header();
?>
<section id="espaceRecruteur">
    <div class="wrap">
        <h1><span>ESPACE</span> RECRUTEUR</h1>
        <div class="listing">
            <?php foreach($cv as $i){ ?>
                <div class="cv">
                    <a href="<?php echo path('profil detail') ?>?id=<?php echo $i->id_user ?>">
                        <div class="photo">
                            <img src="<?= path('/') .'app/uploads/user_profil/'. $i->photo ?>" alt="">
                        </div>
                        <div class="content">
                            <div class="info1">
                                <p><?= $i->prenom ?> <?= $i->nom ?></p>
                                <p><?= date('d/m/Y',strtotime($i->anniversaire)) ?></p>
                            </div>
                            <div class="metier">
                                <p><?= $i->metier ?></p>
                            </div>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<?php get_footer();