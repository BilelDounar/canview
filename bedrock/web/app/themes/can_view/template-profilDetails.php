<?php
/**
 * Template Name: profildetails
 */

require_once 'functions.php';


global $wpdb;
$id = $_GET['id'];
$user="SELECT * FROM canview_cv WHERE id_user=$id";
$infocv = $wpdb->get_results(
    $user
);

$idcv= $infocv[0]->id;

$hs="SELECT ch.hardskills FROM canview_passerelle_hardskills AS pas
             LEFT JOIN canview_hardskills AS ch
             ON pas.id_hardskills=ch.id
             WHERE pas.id_cv = $idcv;
             ";

$hardskills = $wpdb->get_results(
    $hs
);

$ss="SELECT cs.softskills FROM canview_passerelle_softskills AS pas
             LEFT JOIN canview_softskills AS cs
             ON pas.id_softskills=cs.id
             WHERE pas.id_cv = $idcv;
             ";

$softskills = $wpdb->get_results(
    $ss
);

$l="SELECT cl.langue FROM canview_passerelle_langue AS pas
             LEFT JOIN canview_langue AS cl
             ON pas.id_langue=cl.id
             WHERE pas.id_cv = $idcv;
             ";

$langue = $wpdb->get_results(
    $l
);

$for="SELECT formation FROM canview_formation WHERE id_cv=$idcv";
$formation = $wpdb->get_results(
    $for
);

$exp="SELECT experience FROM canview_experience WHERE id_cv=$idcv";
$experience = $wpdb->get_results(
    $exp
);

$loi="SELECT loisir FROM canview_loisir WHERE id_cv=$idcv";
$loisir = $wpdb->get_results(
    $loi
);

debug($softskills);


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
                    <img src="<?php echo asset('img/photo_profil.jpg') ?>" alt="photo de profil">
                </div>
                <div class="text">
                    <div class="titres">
                        <h2>nom prénom</h2>
                        <h3>Métier</h3>
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
                        <a href="<?php echo path('cvpdf') ?>?id=<?php echo $_GET['id']; ?>">Télécharger le CV</a>
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
                        <p>A la base j’étais juste un jedi tres sympa formé par Obi-wan Kenobi mais Palpatine est venu me faire la discute et en sah, le côté obscure... ça vaaaaaaaaaa, c’est pas si terrible.</p>
                        <table>
                            <tr>
                                <td class="titre">Date de naissance </td>
                                <td>:</td>
                                <td>30/05/2004</td>
                            </tr>
                            <tr>
                                <td class="titre">Téléphone </td>
                                <td>:</td>
                                <td>0647314056</td>
                            </tr>
                            <tr>
                                <td class="titre">Email </td>
                                <td>:</td>
                                <td>darkvador@gmail.com</td>
                            </tr>
                            <tr>
                                <td class="titre">Adresse : </td>
                                <td>:</td>
                                <td>Etoile de la mort</td>
                            </tr>
                            <tr>
                                <td class="titre">Permis </td>
                                <td>:</td>
                                <td>Oui</td>
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
                                <p>Obiwan Kenobi <br>(2008 - 2016)</p>
                                <p>Obiwan Kenobi <br>(2008 - 2016)</p>
                                <p>Obiwan Kenobi <br>(2008 - 2016)</p>
                                <p>Obiwan Kenobi <br>(2008 - 2016)</p>
                                <p>Obiwan Kenobi <br>(2008 - 2016)</p>
                                <p>Obiwan Kenobi <br>(2008 - 2016)</p>
                                <p>Obiwan Kenobi <br>(2008 - 2016)</p>
                            </div>
                        </div>
                        <div class="separator"></div>
                        <div class="right_texte">
                            <div class="titre">
                                <img src="<?php echo asset('img/malette-icon.svg') ?>" alt="">
                                <h2>Experirence</h2>
                            </div>
                            <div class="content">
                                <p>Fight vs Comte Doku <br>(2015 - 2016)</p>
                                <p>Fight vs Comte Doku <br>(2015 - 2016)</p>
                                <p>Fight vs Comte Doku <br>(2015 - 2016)</p>
                                <p>Fight vs Comte Doku <br>(2015 - 2016)</p>
                                <p>Fight vs Comte Doku <br>(2015 - 2016)</p>
                                <p>Fight vs Comte Doku <br>(2015 - 2016)</p>
                                <p>Fight vs Comte Doku <br>(2015 - 2016)</p>
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
                        <li>piano</li>
                        <li>paddle</li>
                        <li>pétanque</li>

                    </div>
                </div>
                <div class="hardskills" style="display: none">
                    <div class="title">
                        <h1><span>Compétences </span>techniques</h1>
                        <div class="separator"></div>
                    </div>
                    <div class="texte">
                        <li>je suis COMPETANT</li>
                        <li>paddle</li>
                        <li>pétanque</li>

                    </div>
                </div>
                <div class="softskills" style="display: none">
                    <div class="title">
                        <h1><span>Compétences </span>générales</h1>
                        <div class="separator"></div>
                    </div>
                    <div class="texte">
                        <li>je suis COMPETANT</li>
                        <li>paddle</li>
                        <li>pétanque</li>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
