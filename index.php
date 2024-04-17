<?php
get_header(); ?>



    <section class="s-hero-post">
        <div class="container">
            <div class="left-container">
                <div class="title">
                    <span class="category">Blog da Rankdone</span>
                    <h2>Em destaque</h2>
                </div>
                <?php
                    $config = array(
                        'posts_per_page' => '1',
                        'post_type' => 'post',
                        'order' => 'DESC',
                    );

                    $query_posts = new WP_Query( $config )
                ?>
                <?php if(have_posts()) : while ($query_posts -> have_posts()) : $query_posts -> the_post(); ?>
                <a class="card-post-lg" href="<?php the_permalink(); ?>" title="Ir para o post">
                    <div class="image">
                        <?php the_post_thumbnail('full', array('class' => 'post-thumbnail')); ?>
                    </div>
                    <div class="info">
                        <div class="top-info">
                        <?php 
                            $category = get_the_category( $post->ID );

                            if ( !empty( $category ) ) {
                                $first_category = $category[0];
                                echo '<span class="category">' . $first_category->name . '</span>';
                            }
                        ?>
                            
                            <ul>
                                <li>
                                    <img src="<?php echo get_template_directory_uri() ?>/assets/icon-calendar.svg" alt="Ícone de um calendário">
                                    <span class="date"><?php echo get_the_date( 'd, M' ) ?></span>
                                </li>
                
                                <li>
                                    <img src="<?php echo get_template_directory_uri() ?>/assets/icon-alarm.svg" alt="Ícone de um relógio">
                                    <span><?php echo get_reading_time(); ?></span>
                                </li>
                            </ul>
                        </div>
                        <h3><?php the_title(); ?></h3>
                    </div>
                </a>
                <?php endwhile; endif; wp_reset_query(); ?>
            </div>

            <div class="right-container">
                <h4>Mais populares</h4>
                <div class="all-populars">
                    <?php
                    $args = array(
                        'meta_key' => 'post_views_count',
                        'posts_per_page' => 3,
                        'orderby' => 'meta_value_num',
                        'order' => 'DESC',
                    );
                    $top_views_post = new WP_Query($args);
                    ?>
                    <?php if(have_posts()) : while ($top_views_post -> have_posts()) : $top_views_post -> the_post(); ?>
                    <div class="item-post">
                        <a class="card-post-xs" href="<?php the_permalink(); ?>">
                            <div class="image">
                            <?php 
                                $image_url = get_field('imagem_quadrada_do_post_xs');
                                $image_id = attachment_url_to_postid($image_url);
                                $alt_text = get_post_meta($image_id, '_wp_attachment_image_alt', true);
                            ?>
                                <img src="<?php the_field('imagem_quadrada_do_post_xs') ?>" alt="<?php echo esc_attr($alt_text); ?>">
                            </div>
                            <div class="info">
                            <?php 
                                $category = get_the_category( $post->ID );

                                if ( !empty( $category ) ) {
                                    $first_category = $category[0];
                                    echo '<span class="category">' . $first_category->name . '</span>';
                                }
                            ?>
                                <h6 class="txt-white"><?php the_title(); ?></h6>
                                <ul>
                                    <li>
                                        <span class="date"><?php echo get_the_date( 'd, M' ) ?></span>
                                    </li>
                                    <li>
                                        <span><?php echo get_reading_time(); ?></span>
                                    </li>
                                </ul>
                            </div>
                        </a>
                    </div>
                    <?php endwhile; endif; wp_reset_query(); ?>
                </div>
            </div>
        </div>
    </section>

    <?php get_template_part('template-parts/content-newsletter') ?>

    <?php get_template_part('template-parts/components/separator') ?>

    <section class="s-all-posts">
        <div class="container">
            <div class="top-info">
                <h2>Novos artigos</h2>
                <a href="<?php bloginfo( 'url' ) ?>/artigos/" title="Ver todos os posts">Explorar mais artigos</a>
            </div>
            <?php get_template_part('template-parts/components/list-posts') ?>
            <a href="<?php bloginfo( 'url' ) ?>/artigos/" class="btn-primary lg" title="Ver todos os artigos">Ver todos os artigos</a>
        </div>
    </section>

    <?php get_template_part('template-parts/content', 'rankdone') ?>

<?php get_footer(); ?>