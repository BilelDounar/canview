<?php
/**
 * Template Name: EspaceRecruteur
 */

$args = [
    'post_type' => 'cv',
    'posts_per_page' => -1
];
$the_query = new WP_Query($args);

global $metaHome;

get_header();
?>
<section id="espaceRecruteur">
    <div class="wrap">
        <h1><span>ESPACE</span> RECRUTEUR</h1>
        <div class="listing">
            <?php if ( $the_query->have_posts() ) {
                while ( $the_query->have_posts() ) {
                $the_query->the_post();
                $metaHome = get_the_ID();?>
                    <div class="cv">
                        <a href="">
                            <div class="photo">
                                <?= getImageOneByPostId(get_the_ID(),'img_cv', get_the_title()); ?>
                            </div>
                            <div class="content">
                                <div class="info1">
                                    <p><?= esc_html( get_the_title() ); ?></p>
                                    <p><?= nl2br(get_the_content()); ?></p>
                                </div>
                                <div class="metier">
                                    <p><?= nl2br(get_the_excerpt()); ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php } ?>
            <?php } else {
                esc_html_e( 'Sorry, no CVs matched your criteria.' );
            }
            wp_reset_postdata();?>
        </div>
    </div>
</section>
<?php get_footer();