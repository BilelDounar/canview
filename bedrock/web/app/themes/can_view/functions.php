<?php
require get_template_directory() . '/inc/generale.php';
require get_template_directory() . '/inc/parameters.php';
require get_template_directory() . '/inc/func.php';
require get_template_directory() . '/inc/image.php';


require get_template_directory() . '/inc/custom/custom-diapo.php';

//Ajax
require get_template_directory() . '/asset/ajax/ajax-connexion.php';
require get_template_directory() . '/asset/ajax/ajax-inscription.php';
require get_template_directory() . '/asset/ajax/ajax-cv.php';

//extra
require get_template_directory() . '/inc/extra/template-tags.php';
require get_template_directory() . '/inc/extra/template-functions.php';


// request global
global $metaHome;
$metaHome = get_post_meta(6);
