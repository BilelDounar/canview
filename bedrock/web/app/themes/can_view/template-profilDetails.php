<?php
/**
 * Template Name: profildetails
 */

require_once 'functions.php';

global $wpdb;
$id_user=wp_get_current_user();
if($id_user->roles[0]!='subscriber'){
    $id=get_current_user_id();
}else{
    $id = $_GET['id'];
}

$user="SELECT * FROM canview_cv WHERE id_user=$id";
$infocv = $wpdb->get_results(
    $user
);



$idcv= $infocv[0]->id;

$hs="SELECT ch.hardskills FROM canview_passerelle_hardskills AS pas
             LEFT JOIN canview_hardskills AS ch
             ON pas.id_hardskills=ch.id
             WHERE pas.id_cv = $idcv
             LIMIT 14;
             ";

$hardskills = $wpdb->get_results(
    $hs
);

$ss="SELECT cs.softskills FROM canview_passerelle_softskills AS pas
             LEFT JOIN canview_softskills AS cs
             ON pas.id_softskills=cs.id
             WHERE pas.id_cv = $idcv
             LIMIT 14;
             ";

$softskills = $wpdb->get_results(
    $ss
);


$for="SELECT formation FROM canview_formation WHERE id_cv=$idcv LIMIT 8 ;";
$formations = $wpdb->get_results(
    $for
);

$exp="SELECT experience FROM canview_experience WHERE id_cv=$idcv LIMIT 8;";
$experiences = $wpdb->get_results(
    $exp
);

$loi="SELECT loisir FROM canview_loisir WHERE id_cv=$idcv LIMIT 14";
$loisirs = $wpdb->get_results(
    $loi
);


get_header();
?>
<section id="profil_details">
    <div class="wrap">
        <div class="sidebar">
            <div class="elements">
                <a href="#" class="btn_profil"><img src="<?php echo asset('img/profil-icon.svg') ?>" alt="">Profil</a>
                <div class="separator"></div>
                <a href="#" class="btn_formation"><img src="<?php echo asset('img/formation-icon.svg') ?>" alt="">Formation & expérience</a>
                <div class="separator"></div>
                <a href="#" class="btn_loisirs"><img src="<?php echo asset('img/puzzle-icon.svg') ?>" alt="">Loisirs</a>
                <div class="separator"></div>
                <a href="#" class="btn_hardskills"><img src="<?php echo asset('img/brain-icon.png') ?>" alt="">Hardskills</a>
                <div class="separator"></div>
                <a href="#" class="btn_softskills"><img src="<?php echo asset('img/lotus-icon.png') ?>" alt="">Softskills</a>
            </div>
        </div>
        <div class="infos">
            <div class="infos_principal">
                <div class="photo">
                    <img src="<?= path('/') .'app/uploads/user_profil/' . $infocv[0]->photo ?>" alt="photo de profil">
                </div>
                <div class="text">
                    <div class="titres">
                        <h2><?php echo $infocv[0]->prenom .' '.strtoupper($infocv[0]->nom)?></h2>
                        <h3><?php echo $infocv[0]->metier ?></h3>
                    </div>
                    <div class="liens">
                        <a href="https://github.com/"><img src="<?php echo asset('img/github-icon.svg')?>" alt=""></a>
                        <a href="https://stackoverflow.com/"><img src="<?php echo asset('img/stackoverflow-icon.svg')?>" alt=""></a>
                        <a href="https://fr.linkedin.com/"><img src="<?php echo asset('img/linkedin-icon.svg')?>" alt=""></a>
                        <a href="https://twitter.com/"><img src="<?php echo asset('img/twitter-icon.svg')?>" alt=""></a>
                        <a href="https://www.instagram.com/"><img src="<?php echo asset('img/instagram-icon.svg')?>" alt=""></a>
                    </div>
                    <div class="separator"></div>
                    <div class="lien_pdf">
                        <a href="<?php echo path('cvpdf') ?>?id=<?php echo $id ?>">Télécharger le CV</a>
                    </div>
                </div>
            </div>
            <div class="infos_modulable">
                <div class="profil" style="">
                    <div class="title">
                        <h1><span>A propos de </span>moi</h1>
                        <div class="separator"></div>
                    </div>
                    <div class="texte">
                        <p><?php echo $infocv[0]->motivation ?></p>
                        <table>
                            <tr>
                                <td class="titre">Date de naissance </td>
                                <td>:</td>
                                <td><?php echo date('d/m/Y', strtotime($infocv[0]->anniversaire)) ?></td>
                            </tr>
                            <tr>
                                <td class="titre">Téléphone </td>
                                <td>:</td>
                                <td><?php echo $infocv[0]->telephone ?></td>
                            </tr>
                            <tr>
                                <td class="titre">Email </td>
                                <td>:</td>
                                <td><?php echo $infocv[0]->mail ?></td>
                            </tr>
                            <tr>
                                <td class="titre">Adresse : </td>
                                <td>:</td>
                                <td><?php echo $infocv[0]->adresse.' '.$infocv[0]->postale.', '.$infocv[0]->ville ?></td>
                            </tr>
                            <tr>
                                <td class="titre">Permis </td>
                                <td>:</td>
                                <td><?php echo $infocv[0]->permis ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="formation" style="display: none">
                    <div class="title">
                        <h1><span>Formation & </span>Expérience</h1>
                        <div class="separator"></div>
                    </div>
                    <div class="texte">
                        <div class="left_texte">
                            <div class="titre">
                                <img src="<?php echo asset('img/chapeau-icon.svg') ?>" alt="">
                                <h2>Formation</h2>
                            </div>
                            <div class="content">
                                <?php foreach ($formations as $formation){ ?>
                                    <li><?php echo $formation->formation ?></li>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="separator"></div>
                        <div class="right_texte">
                            <div class="titre">
                                <img src="<?php echo asset('img/malette-icon.svg') ?>" alt="">
                                <h2>Experirence</h2>
                            </div>
                            <div class="content">
                                <?php foreach ($experiences as $experience){ ?>
                                    <li><?php echo $experience->experience ?></li>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="loisirs" style="display: none">
                    <div class="title">
                        <h1><span>Mes </span>loisirs</h1>
                        <div class="separator"></div>
                    </div>
                    <div class="texte">
                        <?php foreach ($loisirs as $loisir){ ?>
                            <li><?php echo $loisir->loisir ?></li>
                        <?php } ?>
                    </div>
                </div>
                <div class="hardskills" style="display: none">
                    <div class="title">
                        <h1><span>Compétences </span>techniques</h1>
                        <div class="separator"></div>
                    </div>
                    <div class="texte">
                        <?php foreach ($hardskills as $hardskill){ ?>
                            <li><?php echo $hardskill->hardskills ?></li>
                        <?php } ?>
                    </div>
                </div>
                <div class="softskills" style="display: none">
                    <div class="title">
                        <h1><span>Compétences </span>générales</h1>
                        <div class="separator"></div>
                    </div>
                    <div class="texte">
                        <?php foreach ($softskills as $softskill){ ?>
                            <li><?php echo $softskill->softskills ?></li>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
