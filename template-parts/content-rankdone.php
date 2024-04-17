<?php

$title_section_rankdone = get_theme_mod('set_title_section', 'Insira o texto' );
$title_subtitle_rankdone = get_theme_mod('set_title_secondary_section', 'Insira o texto');
$text_rankdone = get_theme_mod('set_paragraph', 'Insira o texto');
$text_button_rankdone = get_theme_mod('set_text_button', 'Texto do botão');
$link_button_rankdone = get_theme_mod('set_link', '#');
$image_section_rankdone_id = get_theme_mod('set_image_rankdone');
$image_section_rankdone = wp_get_attachment_image_url( get_theme_mod('set_image_rankdone', ), 'full' );
$image_section_rankdone_alt = get_post_meta($image_section_rankdone_id, '_wp_attachment_image_alt', true);

?>

<section class="s-know">
        <div class="container">
            <div class="left-area">
                <h2><?php echo $title_section_rankdone ?></h2>
                <h4><?php echo $title_subtitle_rankdone ?></h4>
                <p><?php echo nl2br( $text_rankdone ); ?></p>
                <a href="<?php echo $link_button_rankdone ?>" class="btn-primary md"><?php echo $text_button_rankdone ?></a>
            </div>
            <div class="right-area">
                <div class="image">
                    <img src="<?php echo  $image_section_rankdone ?>" alt="<?php echo $image_section_rankdone_alt ?>">
                </div>
            </div>
        </div>
</section>