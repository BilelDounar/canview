<?php
/**
 * Template Name: EspaceRecruteur
 */
get_header();
?>
<section id="espaceRecruteur">
    <div class="wrap">
        <h1><span>ESPACE</span> RECRUTEUR</h1>
        <div class="listing">
            <?php for($i=0;$i<=7;$i+=1){?>
                <div class="cv">
                    <a href="">
                        <div class="photo">
                            <img src="<?php echo asset('img/photo_profil.jpg')  ?>" alt="">
                        </div>
                        <div class="content">
                            <div class="info1">
                                <p>Théo DEGREMONT</p>
                                <p>19ans</p>
                            </div>
                            <div class="metier">
                                <p>Développeur Web</p>
                            </div>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<?php
get_footer();
