<?php 

function custom_theme_customizer($wp_customize) {

    // Seção 'Rankdone Destaque'
    $wp_customize->add_section(
        'sec_destaque', 
        array(
        'title' => __('Rankdone Destaque'),
        'description' => __('Esta seção contém as informações para a dobra/bloco que fala sobre a Rankdone.'),
        'priority' => 30,
    ));
            // Campo de texto 1
            $wp_customize->add_setting(
                'set_title_section',
                array(
                    'type' => 'theme_mod',
                    'default' => '',
                    'sanitize_callbak' => 'sanitize_text_field'
            ));

            $wp_customize->add_control(
                'set_title_section',
                array(
                    'label' => __('Título Principal'),
                    'section' => 'sec_destaque',
                    'type' => 'text',
            ));

             // Campo de texto 2
            $wp_customize->add_setting('set_title_secondary_section', array(
                'type' => 'theme_mod',
                'default' => '',
                'sanitize_callback' => 'sanitize_text_field',
            ));
            $wp_customize->add_control('set_title_secondary_section', array(
                'label' => __('Texto Secundário'),
                'section' => 'sec_destaque',
                'type' => 'text',
            ));

            // Campo de texto 3
            $wp_customize->add_setting('set_paragraph', array(
                'type' => 'theme_mod',
                'default' => '',
                'sanitize_callback' => 'sanitize_textarea_field',
            ));
            $wp_customize->add_control('set_paragraph', array(
                'label' => __('Paragrafo'),
                'section' => 'sec_destaque',
                'type' => 'textarea',
            ));

             // Campo de link
            $wp_customize->add_setting('set_link', array(
                'type' => 'theme_mod',
                'default' => '',
                'sanitize_callback' => 'esc_url_raw',
            ));
            $wp_customize->add_control('set_link', array(
                'label' => __('Link do botão'),
                'section' => 'sec_destaque',
                'type' => 'url',
            ));

            // Campo de texto do botão
            $wp_customize->add_setting('set_text_button', array(
                'type' => 'theme_mod',
                'default' => '',
                'sanitize_callback' => 'sanitize_text_field',
            ));
            $wp_customize->add_control('set_text_button', array(
                'label' => __('Texto do Botão'),
                'section' => 'sec_destaque',
                'type' => 'text',
            ));

            // Campo de upload de imagem da seção
            $wp_customize->add_setting(
                'set_image_rankdone', (
                    array(
                        'type' => 'theme_mod',
                        'sanitize_callback' => 'absint'
                    )
            ));

            $wp_customize->add_control(
                new WP_Customize_Media_Control(
                    $wp_customize, 'set_image_rankdone', 
                    array(
                        'label' => 'Imagem de Destaque',
                        'section' => 'sec_destaque',
                        'mime_type' => 'image'
            )));

}

add_action('customize_register', 'custom_theme_customizer');