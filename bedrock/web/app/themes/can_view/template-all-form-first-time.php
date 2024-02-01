<?php
//
// Template Name: All-Form-Fisrt-Time 
//  
include('header.php');

?>


<section id="all_form">
    <div class="wrap">
        <div class="all_form_container">
            <div class="all_form_left">
                <div class="all_form_bar_vertical">
                    <div class="all_form_text">
                        <div class="all_form_text_box">
                            <img src="<?= path() ?>/app/themes/can_view/asset/img/dote.png" alt="">
                            <div class="">
                                <h4>étape 1</h4>
                                <p>Créez-vous un compte afin de consulter et modifier vos CV à votre guise.</p>
                            </div>
                        </div>
                        <div class="all_form_text_box">
                            <img src="<?= path() ?>/app/themes/can_view/asset/img/dote.png" alt="">
                            <div class="">
                                <h4>étape 2</h4>
                                <p>Créez-vous un compte afin de consulter et modifier vos CV à votre guise.</p>
                            </div>
                        </div>
                        <div class="all_form_text_box">
                            <img src="<?= path() ?>/app/themes/can_view/asset/img/dote.png" alt="">
                            <div class="">
                                <h4>étape 3</h4>
                                <p>Créez-vous un compte afin de consulter et modifier vos CV à votre guise.</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="all_form_right">

                <div class="premiere_etape">
                    <?php include('asset/view/form/signin.php') ?>
                </div>
                <div class="deuxieme_etape">
                    <?php include('asset/view/form/cv.php') ?>
                </div>
                <div class="troisieme_etape">
                    <?php include('asset/view/form/consulter.php') ?>
                </div>


                <div class="loader_etape">
                    <l-dot-pulse size="85" stroke="3.5" speed="1" color="#87AACA"></l-dot-pulse>

                </div>




            </div>
        </div>
    </div>
</section>



<script type="module" src="https://cdn.jsdelivr.net/npm/ldrs/dist/auto/dotPulse.js"></script>
<script>
    var signin = document.querySelector('#signin_button');
    var premiere_etape = document.querySelector('.premiere_etape');
    var deuxieme_etape = document.querySelector('.deuxieme_etape');
    var loader_etape = document.querySelector('.loader_etape');

    const errors = <?= json_encode($errors); ?>;
    console.log(errors);

    signin.addEventListener('click', function(e) {
        e.preventDefault();

        if (errors.length <= 0) {
            console.log(errors);
            premiere_etape.style.display = "none";

            setTimeout(() => {
                loader_etape.style.display = "block";

                setTimeout(() => {
                    loader_etape.style.display = "none";
                    deuxieme_etape.style.display = "block";
                }, 1000);
            }, 100);
        }
    });
</script>