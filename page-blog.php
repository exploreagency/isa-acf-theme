<?php
get_header();
 /*Template name: Blog Page*/
 $blog_hero_title = get_field('blog_hero_title');
 $blog_hero_background_image_desktop = get_field('blog_hero_background_image_desktop');
 $blog_hero_background_image_mobile = get_field('blog_hero_background_image_mobile');

 $blog_contact_title = get_field('blog_contact_title');
 $blog_contact_shortcode = get_field('blog_contact_shortcode');
?>

    <section class="hero-section mb-5">
        <div class="container-fluid">
            <div class="hero-section__inner">
                <picture class="hero-section__img">
                    <source
                        media="(min-width: 768px)"
                        srcset="<?php echo $blog_hero_background_image_desktop['url']; ?>"
                    />
                    <img src="<?php echo $blog_hero_background_image_mobile['url']; ?>" alt="<?php echo $blog_hero_title; ?>" />
                </picture>
                <h1 class="hero-section__title"><?php echo $blog_hero_title; ?></h1>
            </div>
            <?php if( have_rows('button') ): ?>
                <?php while( have_rows('button') ): the_row(); 
                    $button_text = get_sub_field('button_text');
                    $button_link = get_sub_field('button_link');
                    $button_anchor = get_sub_field('button_anchor');
                    if( $button_text || $button_link || $button_anchor ): ?>
                        <a href="<?php if($button_link) echo $button_link; else echo $button_anchor; ?>" class="button">
                            <span class="button__text"><?php echo $button_text; ?></span>
                            <span class="button__arrow">
                                <svg>
                                    <use xlink:href="<?php bloginfo('template_directory'); ?>/icons/symbol/svg/sprite.symbol.svg#button-arrow-icon" />
                                </svg>
                            </span>
                        </a>
                    <?php endif; ?>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </section>

    <div class="blog section--pt section--pb">
        <div class="container">
            <div class="content-type-filters">
                <div class="content-type-filters__title">Content type</div>
                <ul class="content-type-filters__list">
                    <?php
                        $content_types = get_terms(array(
                            'taxonomy' => 'content_type', 
                            'hide_empty' => false,
                        ));
                        if (!empty($content_types) && !is_wp_error($content_types)) {
                            foreach ($content_types as $type) {
                                echo '<li class="content-type-filters__button" data-filter="' . esc_attr($type->slug) . '">';
                                echo '<span></span>';
                                echo esc_html($type->name);
                                echo '</li>';
                            }
                        }
                    ?>
                </ul>
            </div>

            <div class="blog__row">
                <div class="blog__col">
                    <div class="blog__filter">
                        <div class="filter active">
                            <div class="filter__title">
                                Industry
                                <span></span>
                            </div>
                            <ul class="filter__list">
                                <?php
                                    $industry_terms = get_terms(array(
                                        'taxonomy' => 'industry', 
                                        'hide_empty' => false,
                                    ));
                                    if (!empty($industry_terms) && !is_wp_error($industry_terms)) {
                                        foreach ($industry_terms as $term) {
                                            echo '<li class="filter__item" data-filter="' . esc_attr($term->slug) . '">';
                                            echo '<span></span>';
                                            echo esc_html($term->name);
                                            echo '</li>';
                                        }
                                    } else {
                                        echo '<li>No industries found.</li>';
                                    }
                                ?>
                            </ul>
                        </div>
                        <div class="filter">
                            <div class="filter__title">
                                Solutions
                                <span></span>
                            </div>
                            <ul class="filter__list">
                                <?php
                                    $solutions_terms = get_terms(array(
                                        'taxonomy' => 'solutions', 
                                        'hide_empty' => false,
                                    ));
                                    if (!empty($solutions_terms) && !is_wp_error($solutions_terms)) {
                                        foreach ($solutions_terms as $term) {
                                            echo '<li class="filter__item" data-filter="' . esc_attr($term->slug) . '">';
                                            echo '<span></span>';
                                            echo esc_html($term->name);
                                            echo '</li>';
                                        }
                                    } else {
                                        echo '<li>No industries found.</li>';
                                    }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="blog__col">
                    <?php
                        $args = array(
                            'post_type' => 'post', 
                            'posts_per_page' => 9, 
                            'paged' => get_query_var('paged') ? get_query_var('paged') : 1 
                        );

                        $query = new WP_Query($args);

                        if ($query->have_posts()) {
                            echo '<ul class="blog__list">';
                            while ($query->have_posts()) {
                                $query->the_post();
                                
                                include('template-part/post-card.php');
    
                            }
                            echo '</ul>';

                            the_posts_pagination(array(
                                'mid_size'  => 2,
                                'prev_text' => __('« Prev'),
                                'next_text' => __('Next »'),
                                'total'     => $query->max_num_pages
                            ));
                        } else {
                            echo '<p>No posts found.</p>';
                        }


                        wp_reset_postdata();
                        ?>
                </div>
            </div>
        </div>
    </div>

    <section class="section section--pt section--pb section--blue" id="contacts">
        <div class="container">
            <div class="section__header">
                <h2 class="section__title"><?php echo $blog_contact_title; ?></h2>
            </div>
            
            <?php echo do_shortcode($blog_contact_shortcode); ?>
        </div>
    </section>

<?php
get_footer();