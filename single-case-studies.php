<?php
get_header();
?>

<?php if( have_rows('case_sections') ): ?>
    <?php while( have_rows('case_sections') ): the_row(); ?>
        <?php if( get_row_layout() == 'hero_section' ): 
                $title = get_sub_field('title');
                $background_image_desktop = get_sub_field('background_image_desktop');
                $backgroun_image_mobile = get_sub_field('backgroun_image_mobile');
            ?>
            <section class="hero-section mb-5">
                <div class="container-fluid">
                    <div class="hero-section__inner">
                    <picture class="hero-section__img">
                        <source
                        media="(min-width: 768px)"
                        srcset="<?php echo $background_image_desktop['url'] ?>"
                        />
                        <img src="<?php echo $backgroun_image_mobile['url'] ?>" alt="" />
                    </picture>
                        <h1 class="hero-section__title"><?php echo $title; ?></h1>
                    </div>
                </div>
            </section>
        <?php elseif( get_row_layout() == 'info_section' ): 
            ?>
                <section class="section section--pt section--pb">
                    <div class="container">
                        <div class="cs-section">
                            <ul class="cs-section__info">
                                <?php while( have_rows('list') ): the_row(); 
                                        $title = get_sub_field('title');
                                        $text = get_sub_field('text');
                                    ?>
                                    <div class="cs-section__info-item">
                                        <div class="cs-section__info-item-title"><?php echo $title; ?></div>
                                        <div class="cs-section__info-item-text">
                                            <?php echo $text; ?>
                                            <?php while (have_rows('link')): the_row(); 
                                                $link_text = get_sub_field('link_text');
                                                $link_file = get_sub_field('link_file');
                                                $link_page = get_sub_field('link_page');
                                                
                                                if ($link_text && ($link_file || $link_page)) : 
                                                    $href = $link_page ? $link_page : $link_file['url'];
                                                    ?>
                                                    <a href="<?php echo esc_url($href); ?>"><?php echo esc_html($link_text); ?></a>
                                                <?php endif; ?>
                                            <?php endwhile; ?>

                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </ul>
                            <div class="cs-section__blocks">
                                <?php while( have_rows('blocks') ): the_row(); 
                                    $icon = get_sub_field('icon');
                                    $title = get_sub_field('title');
                                    $text = get_sub_field('text');
                                    ?>
                                    <div class="cs-section__block">
                                        <div class="cs-section__block-title">
                                            <div class="cs-section__block-icon">
                                                <img src="<?php echo $icon['url'] ?>" alt="" />
                                            </div>
                                            <?php echo $title; ?>
                                        </div>
                                        <div class="cs-section__block-list">
                                            <?php echo $text; ?>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    </div>
                </section>

        <?php elseif( get_row_layout() == 'testimonial' ): 
            ?>

                <section class="section section--pt section--pb section--grey">
                    <div class="container">
                        <?php
                        $featured_posts = get_sub_field('testimonial');
                        if( $featured_posts ): ?>
                            <?php foreach( $featured_posts as $post ): 
                                $title = get_the_title( $post->ID );
                                $testimonial_text = get_field( 'testimonial_text', $post->ID );
                                $testimonil_position = get_field( 'testimonil_position', $post->ID );
                                ?>
                                <article class="review-card">
                                    <div class="review-card__logo">
                                        <img src="<?php bloginfo('template_directory'); ?>/img/svg-gobbler.svg" alt="" />
                                    </div>
                                    <p class="review-card__text"><?php echo $testimonial_text; ?></p>
                                    <div class="review-card__footer">
                                        <p class="review-card__name"><?php echo $title; ?></p>
                                        <div class="review-card__position"><?php echo $testimonil_position; ?></div>
                                    </div>
                                </article>
                            <?php endforeach; ?>
                            <?php  wp_reset_postdata(); ?>
                        <?php endif; ?>
                    </div>
                </section>

        <?php elseif( get_row_layout() == 'benefits' ): 
            $title = get_sub_field('title');
            ?>

                <section class="section section--pt section--pb">
                    <div class="container">
                        <div class="section__header">
                            <h2 class="section__title"><?php echo $title; ?></h2>
                        </div>

                        <ul class="b-list">
                            <?php while( have_rows('list') ): the_row(); 
                                $title = get_sub_field('title');
                                $text = get_sub_field('text');
                                ?>
                                <li class="b-list__item">
                                    <h3 class="b-list__item-title"><?php echo $title; ?></h3>
                                    <div class="b-list__item-text"><?php echo $text; ?></div>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    </div>
                </section>

        <?php elseif (get_row_layout() == 'related_section') : ?>
                <section class="section section--pt section--pb related-section">
                    <div class="container">
                        <div class="section__header">
                            <h2 class="section__title">Related Stories</h2>
                        </div>
                        <ul class="related-stories">
                            <?php
                            $current_post_id = get_the_ID(); // Get current post ID
                            $args = array(
                                'post_type'      => 'case-studies',
                                'posts_per_page' => 3,
                                'post__not_in'   => array($current_post_id), // Exclude current post
                                'orderby'        => 'date',
                                'order'          => 'DESC'
                            );
                            $related_posts = new WP_Query($args);

                            if ($related_posts->have_posts()) :
                                while ($related_posts->have_posts()) : $related_posts->the_post();
                                    ?>
                                    <li class="related-stories__item">
                                        <a href="<?php the_permalink(); ?>" class="related-card">
                                            <svg class="related-card__shape">
                                                <use xlink:href="<?php bloginfo('template_directory'); ?>/icons/symbol/svg/sprite.symbol.svg#top-card-shape" />
                                            </svg>
                                            <span class="related-card__arrow">
                                                <svg>
                                                    <use xlink:href="<?php bloginfo('template_directory'); ?>/icons/symbol/svg/sprite.symbol.svg#button-arrow-icon" />
                                                </svg>
                                            </span>
                                            <div class="related-card__category">
                                                <?php 
                                                    $categories = get_the_category(); 
                                                    if (!empty($categories)) {
                                                        echo esc_html($categories[0]->name);   
                                                    }
                                                ?>
                                            </div>
                                            <h3 class="related-card__title">
                                                <?php the_title(); ?>
                                            </h3>
                                            <div class="related-card__img">
                                                <?php if (has_post_thumbnail()) : ?>
                                                    <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" />
                                                <?php endif; ?>
                                            </div>
                                        </a>
                                    </li>
                                    <?php
                                endwhile;
                            endif;
                            wp_reset_postdata(); // Reset the global post object
                            ?>
                        </ul>
                    </div>
                </section>

        <?php elseif( get_row_layout() == 'form_section' ): 
            $title = get_sub_field('title');
            ?>

                <section class="section section--pt section--pb section--blue">
                    <div class="container">
                        <div class="section__header">
                            <h2 class="section__title"><?php echo $title; ?></h2>
                        </div>
                        <div class="contacts-form">
                            <?php echo do_shortcode(get_sub_field('shortcode')); ?>
                        </div>
                    </div>
                </section>

        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>

<?php
get_footer();