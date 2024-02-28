<?php
get_header();
?>

<?php if (have_rows('sections')): ?>
    <?php while (have_rows('sections')):
        the_row(); ?>
        <?php if (get_row_layout() == 'hero_section'):
            $title = get_sub_field('title');
            $text = get_sub_field('text');
            $background_desktop = get_sub_field('background_desktop');
            $background_mobile = get_sub_field('background_mobile');
            ?>

                <section class="hero-section section--mb">
                    <div class="container-fluid">
                        <div class="hero-section__inner">
                            <picture class="hero-section__img">
                                <source
                                    media="(min-width: 768px)"
                                    srcset="<?php echo $background_desktop['url']; ?>"
                                />
                                <img src="<?php echo $background_mobile['url'] ?>" alt="<?php echo $title; ?>" width="1540" height="845"/>
                            </picture>
                            <h1 class="hero-section__title"><?php echo $title; ?></h1>
                            <p class="hero-section__text"><?php echo $text; ?></p>
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

        <?php elseif (get_row_layout() == 'section_text_with_video'):
            $title = get_sub_field('title');
            $text = get_sub_field('text');

            $section_background_color = get_sub_field('section_background_color');
            $padding_top = get_sub_field('padding_top');
            $padding_bottom = get_sub_field('padding_bottom');
            $margin_bottom = get_sub_field('margin_bottom');
            ?>

                <section class="section section--w-video 
                    <?php if($section_background_color === 'blue') { ?>
                        section--blue
                    <?php } elseif ($section_background_color === 'grey') { ?>
                        section--grey
                    <?php } else { ?>
                        section--white
                    <?php } ?>

                    <?php if($padding_top === 'yes') { ?>
                        section--pt
                    <?php } ?>

                    <?php if($padding_bottom === 'yes') { ?>
                        section--pb
                    <?php } ?>

                    <?php if($margin_bottom === 'yes') { ?>
                        section--mb
                    <?php } ?>
                ">
                    <div class="container">
                        <?php if($title) : ?>
                            <div class="section__header">
                                <h2 class="section__title"><?php echo $title; ?></h2>
                            </div>
                        <?php endif; ?>
                        <div class="text"><?php echo $text; ?></div>
                        <?php if( have_rows('video') ): ?>
                            <?php while( have_rows('video') ): the_row(); 
                                $video_poster = get_sub_field('video_poster');
                                $link_on_youtube = get_sub_field('link_on_youtube');
                                ?>
                                <a
                                    href="<?php echo $link_on_youtube; ?>"
                                    data-fancybox
                                    class="video"
                                    >
                                    <img src="<?php echo $video_poster['url'] ?>" alt="<?php echo $video_poster['alt'] ?>" width="<?php echo $video_poster['width'] ?>" height="<?php echo $video_poster['height'] ?>" />
                                    <span class="video__icon">
                                        <svg>
                                            <use xlink:href="<?php bloginfo('template_directory'); ?>/icons/symbol/svg/sprite.symbol.svg#play-icon" />
                                        </svg>
                                    </span>
                                </a>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </section>

        <?php elseif (get_row_layout() == 'section_list_with_icon_title_text'):
            $title = get_sub_field('title');
            $text = get_sub_field('text');

            $section_background_color = get_sub_field('section_background_color');
            $padding_top = get_sub_field('padding_top');
            $padding_bottom = get_sub_field('padding_bottom');
            $margin_bottom = get_sub_field('margin_bottom');
            ?>

                <section class="section
                    <?php if($section_background_color === 'blue') { ?>
                        section--blue
                    <?php } elseif ($section_background_color === 'grey') { ?>
                        section--grey
                    <?php } else { ?>
                        section--white
                    <?php } ?>

                    <?php if($padding_top === 'yes') { ?>
                        section--pt
                    <?php } ?>

                    <?php if($padding_bottom === 'yes') { ?>
                        section--pb
                    <?php } ?>

                    <?php if($margin_bottom === 'yes') { ?>
                        section--mb
                    <?php } ?>
                ">
                    <div class="container">
                        <?php if($title) : ?>
                            <div class="section__header">
                                <h2 class="section__title"><?php echo $title; ?></h2>
                            </div>
                        <?php endif; ?>
                        <?php if( have_rows('list') ): ?>
                            <ul class="list-w-icons">
                                <?php while( have_rows('list') ): the_row(); 
                                    $title = get_sub_field('title');
                                    $text = get_sub_field('text');
                                    ?>
                                    <li class="list-w-icons__item">
                                        <h3 class="list-w-icons__title">
                                            <svg>
                                                <use xlink:href="<?php bloginfo('template_directory'); ?>/icons/symbol/svg/sprite.symbol.svg#circle-check-icon" />
                                            </svg>
                                            <?php echo $title; ?>
                                        </h3>
                                        <p class="list-w-icons__text"><?php echo $text; ?></p>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </section>

        <?php elseif (get_row_layout() == 'section_reviews_slider'):
            $section_background_color = get_sub_field('section_background_color');
            $padding_top = get_sub_field('padding_top');
            $padding_bottom = get_sub_field('padding_bottom');
            $margin_bottom = get_sub_field('margin_bottom');
            ?>

                <section class="section 
                    <?php if($section_background_color === 'blue') { ?>
                        section--blue
                    <?php } elseif ($section_background_color === 'grey') { ?>
                        section--grey
                    <?php } else { ?>
                        section--white
                    <?php } ?>

                    <?php if($padding_top === 'yes') { ?>
                        section--pt
                    <?php } ?>

                    <?php if($padding_bottom === 'yes') { ?>
                        section--pb
                    <?php } ?>

                    <?php if($margin_bottom === 'yes') { ?>
                        section--mb
                    <?php } ?>
                ">
                    <div class="container">
                        <?php
                        $featured_testimonials = get_sub_field('slider');
                        if( $featured_testimonials ): ?>
                            <div class="swiper reviews-swiper">
                                <div class="swiper-wrapper">
                                    <?php foreach( $featured_testimonials as $featured_post ): 
                                        $title = get_the_title( $featured_post->ID );
                                        $testimonial_text = get_field( 'testimonial_text', $featured_post->ID );
                                        $testimonil_position = get_field( 'testimonil_position', $featured_post->ID );
                                        $thumbnail_url = get_the_post_thumbnail_url($featured_post->ID) ?: 'path/to/your/static/image.jpg';

                                        ?>
                                        <div class="swiper-slide">
                                            <article class="review-card">
                                                <div class="review-card__logo">
                                                    <img src="<?php echo $thumbnail_url; ?>" alt="<?php echo $title; ?>">
                                                </div>
                                                <p class="review-card__text"><?php echo $testimonial_text; ?></p>
                                                <div class="review-card__footer">
                                                    <p class="review-card__name"><?php echo $title; ?></p>
                                                    <div class="review-card__position"><?php echo $testimonil_position; ?></div>
                                                </div>
                                            </article>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <div class="reviews-swiper__controls">
                                    <div class="reviews-swiper__prev">
                                        <svg>
                                            <use xlink:href="<?php bloginfo('template_directory'); ?>/icons/symbol/svg/sprite.symbol.svg#swiper-arrow-left" />
                                        </svg>
                                    </div>
                                    <div class="reviews-swiper__next">
                                        <svg>
                                            <use xlink:href="<?php bloginfo('template_directory'); ?>/icons/symbol/svg/sprite.symbol.svg#swiper-arrow-right" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <?php wp_reset_postdata(); ?>
                        <?php endif; ?>
                    </div>
                </section>

        <?php elseif (get_row_layout() == 'section_list_with_icon_title_text_2'):
            $title = get_sub_field('title');

            $section_background_color = get_sub_field('section_background_color');
            $padding_top = get_sub_field('padding_top');
            $padding_bottom = get_sub_field('padding_bottom');
            $margin_bottom = get_sub_field('margin_bottom');
            ?>

            <section class="section
                <?php if($section_background_color === 'blue') { ?>
                    section--blue
                <?php } elseif ($section_background_color === 'grey') { ?>
                    section--grey
                <?php } else { ?>
                    section--white
                <?php } ?>

                <?php if($padding_top === 'yes') { ?>
                    section--pt
                <?php } ?>

                <?php if($padding_bottom === 'yes') { ?>
                    section--pb
                <?php } ?>

                <?php if($margin_bottom === 'yes') { ?>
                    section--mb
                <?php } ?>
            ">
                <div class="container">
                    <div class="section__header">
                        <h2 class="section__title"><?php echo $title; ?></h2>
                    </div>
                    <?php if( have_rows('list') ): ?>
                        <ul class="list">
                            <?php while( have_rows('list') ): the_row(); 
                                $icon = get_sub_field('icon');
                                $title = get_sub_field('title');
                                $text = get_sub_field('text');
                                ?>
                                <li class="list__item">
                                    <i class="list__icon">
                                        <img src="<?php echo $icon['url'] ?>" alt="<?php echo $icon['alt'] ?>" width="<?php echo $icon['width'] ?>" height="<?php echo $icon['height'] ?>" />
                                    </i>
                                    <h3 class="list__title"><?php echo $title; ?></h3>
                                    <p class="list__text"><?php echo $text; ?></p>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </section>

        <?php elseif (get_row_layout() == 'related_services'):
            $title = get_sub_field('title');

            $section_background_color = get_sub_field('section_background_color');
            $padding_top = get_sub_field('padding_top');
            $padding_bottom = get_sub_field('padding_bottom');
            $margin_bottom = get_sub_field('margin_bottom');
            ?>

            <section class="section
                <?php if($section_background_color === 'blue') { ?>
                    section--blue
                <?php } elseif ($section_background_color === 'grey') { ?>
                    section--grey
                <?php } else { ?>
                    section--white
                <?php } ?>

                <?php if($padding_top === 'yes') { ?>
                    section--pt
                <?php } ?>

                <?php if($padding_bottom === 'yes') { ?>
                    section--pb
                <?php } ?>

                <?php if($margin_bottom === 'yes') { ?>
                    section--mb
                <?php } ?>
            ">
                <div class="container">
                    <div class="section__header">
                        <h2 class="section__title"><?php echo $title; ?></h2>
                    </div>
                    <?php if( have_rows('list') ): ?>
                        <ul class="services-list">
                            <?php while( have_rows('list') ): the_row(); 
                                $title = get_sub_field('title');
                                $image = get_sub_field('image');
                                $link = get_sub_field('link');
                                ?>
                                <li class="services-list__item">
                                    <a href="<?php echo $link; ?>" class="services-list__link">
                                        <svg class="services-list__shape">
                                            <use xlink:href="<?php bloginfo('template_directory'); ?>/icons/symbol/svg/sprite.symbol.svg#top-card-shape" />
                                        </svg>
                                        <h3 class="services-list__title"><?php echo $title; ?></h3>
                                        <img
                                            class="services-list__img"
                                            src="<?php echo $image; ?>"
                                            alt="<?php echo $title; ?>"
                                        />
                                        <span class="services-list__arrow">
                                            <svg>
                                            <use xlink:href="<?php bloginfo('template_directory'); ?>/icons/symbol/svg/sprite.symbol.svg#button-arrow-icon" />
                                            </svg>
                                        </span>
                                    </a>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </section>

        <?php elseif (get_row_layout() == 'related_resources'):
            $title = get_sub_field('title');

            $section_background_color = get_sub_field('section_background_color');
            $padding_top = get_sub_field('padding_top');
            $padding_bottom = get_sub_field('padding_bottom');
            $margin_bottom = get_sub_field('margin_bottom');
            ?>

                <section class="section
                    <?php if($section_background_color === 'blue') { ?>
                        section--blue
                    <?php } elseif ($section_background_color === 'grey') { ?>
                        section--grey
                    <?php } else { ?>
                        section--white
                    <?php } ?>

                    <?php if($padding_top === 'yes') { ?>
                        section--pt
                    <?php } ?>

                    <?php if($padding_bottom === 'yes') { ?>
                        section--pb
                    <?php } ?>

                    <?php if($margin_bottom === 'yes') { ?>
                        section--mb
                    <?php } ?>
                ">
                    <div class="container">
                        <div class="section__header">
                            <h2 class="section__title"><?php echo $title; ?></h2>
                        </div>
                        <?php if( have_rows('list') ): ?>
                            <ul class="resources-list">
                                <?php while( have_rows('list') ): the_row(); 
                                    $title = get_sub_field('title');
                                    $text = get_sub_field('text');
                                    $link = get_sub_field('link');
                                    $file = get_sub_field('file');
                                    ?>
                                    <li class="resources-list__item">
                                        <?php if($file) { ?>
                                            <a class="resources-list__link" href="<?php echo $file['url'] ?>">
                                                <svg class="resources-list__shape">
                                                    <use xlink:href="<?php bloginfo('template_directory'); ?>/icons/symbol/svg/sprite.symbol.svg#bottom-right-card-shape" />
                                                </svg>
                                                <h3 class="resources-list__title"><?php echo $title; ?></h3>
                                                <p class="resources-list__text"><?php echo $text; ?></p>
                                                <span class="resources-list__icon green">
                                                    <svg>
                                                        <use xlink:href="<?php bloginfo('template_directory'); ?>/icons/symbol/svg/sprite.symbol.svg#download-icon" />
                                                    </svg>
                                                </span>
                                            </a>
                                        <?php } else { ?>
                                            <a class="resources-list__link" href="<?php echo $link; ?>">
                                                <svg class="resources-list__shape">
                                                    <use xlink:href="<?php bloginfo('template_directory'); ?>/icons/symbol/svg/sprite.symbol.svg#bottom-right-card-shape" />
                                                </svg>
                                                <h3 class="resources-list__title"><?php echo $title; ?></h3>
                                                <p class="resources-list__text"><?php echo $text; ?></p>
                                                <span class="resources-list__icon">
                                                    <svg>
                                                        <use xlink:href="<?php bloginfo('template_directory'); ?>/icons/symbol/svg/sprite.symbol.svg#button-arrow-icon" />
                                                    </svg>
                                                </span>
                                            </a>
                                        <?php } ?>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </section>

        <?php elseif (get_row_layout() == 'section_text'):
            $title = get_sub_field('title');
            $text = get_sub_field('text');

            $section_background_color = get_sub_field('section_background_color');
            $padding_top = get_sub_field('padding_top');
            $padding_bottom = get_sub_field('padding_bottom');
            $margin_bottom = get_sub_field('margin_bottom');
            ?>

                <section class="section
                    <?php if($section_background_color === 'blue') { ?>
                        section--blue
                    <?php } elseif ($section_background_color === 'grey') { ?>
                        section--grey
                    <?php } else { ?>
                        section--white
                    <?php } ?>

                    <?php if($padding_top === 'yes') { ?>
                        section--pt
                    <?php } ?>

                    <?php if($padding_bottom === 'yes') { ?>
                        section--pb
                    <?php } ?>

                    <?php if($margin_bottom === 'yes') { ?>
                        section--mb
                    <?php } ?>
                ">
                    <div class="container">
                        <div class="section__header">
                        <h2 class="section__title"><?php echo $title; ?></h2>
                        </div>
                        <div class="text"><?php echo $text; ?></div>
                        
                        <?php if( have_rows('button') ): ?>
                            <?php while( have_rows('button') ): the_row(); 
                                $button_text = get_sub_field('button_text');
                                $button_link = get_sub_field('button_link');
                                $button_anchor = get_sub_field('button_anchor');

                                if( $button_text || $button_link || $button_anchor ): ?>
                                    <div class="d-flex justiy-content-center mt-5">
                                        <a href="<?php if($button_link) echo $button_link; else echo $button_anchor; ?>" class="button button--inline">
                                            <span class="button__text"><?php echo $button_text; ?></span>
                                            <span class="button__arrow">
                                                <svg>
                                                    <use xlink:href="<?php bloginfo('template_directory'); ?>/icons/symbol/svg/sprite.symbol.svg#button-arrow-icon" />
                                                </svg>
                                            </span>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        <?php endif; ?>

                    </div>
                </section>

        <?php elseif (get_row_layout() == 'benefits_cards'):
            $title = get_sub_field('title');
            $subtitle = get_sub_field('subtitle');

            $list_color_scheme = get_sub_field('list_color_scheme');
            $section_background_color = get_sub_field('section_background_color');
            $padding_top = get_sub_field('padding_top');
            $padding_bottom = get_sub_field('padding_bottom');
            $margin_bottom = get_sub_field('margin_bottom');
            ?>

                <section class="section
                    <?php if($section_background_color === 'blue') { ?>
                        section--blue
                    <?php } elseif ($section_background_color === 'grey') { ?>
                        section--grey
                    <?php } else { ?>
                        section--white
                    <?php } ?>

                    <?php if($padding_top === 'yes') { ?>
                        section--pt
                    <?php } ?>

                    <?php if($padding_bottom === 'yes') { ?>
                        section--pb
                    <?php } ?>

                    <?php if($margin_bottom === 'yes') { ?>
                        section--mb
                    <?php } ?>
                ">
                    <div class="container">
                        <div class="section__header">
                            <h2 class="section__title"><?php echo $title; ?></h2>
                            <?php if($subtitle) :?>
                                <p class="section__subtitle"><?php echo $subtitle; ?></p>
                            <?php endif; ?>
                        </div>
                        <?php if( have_rows('list') ): ?>
                            <ul class="benefits-card <?php if($list_color_scheme === 'yes') { ?> benefits-card--grey <?php } ?>">
                                <?php while( have_rows('list') ): the_row(); 
                                    $icon = get_sub_field('icon');
                                    $title = get_sub_field('title');
                                    $text = get_sub_field('text');
                                    ?>
                                    <li class="benefits-card__item">
                                        <span class="benefits-card__icon">
                                            <img src="<?php echo $icon['url'] ?>" alt="<?php echo $title; ?>" width="<?php echo $icon['width'] ?>" height="<?php echo $icon['height'] ?>"/>
                                        </span>
                                        <h3 class="benefits-card__title"><?php echo $title; ?></h3>
                                        <p class="benefits-card__text"><?php echo $text; ?></p>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </section>

        <?php elseif (get_row_layout() == 'approach'):
            $title = get_sub_field('title');

            $section_background_color = get_sub_field('section_background_color');
            $padding_top = get_sub_field('padding_top');
            $padding_bottom = get_sub_field('padding_bottom');
            $margin_bottom = get_sub_field('margin_bottom');
            ?>

                <section class="section
                    <?php if($section_background_color === 'blue') { ?>
                        section--blue
                    <?php } elseif ($section_background_color === 'grey') { ?>
                        section--grey
                    <?php } else { ?>
                        section--white
                    <?php } ?>

                    <?php if($padding_top === 'yes') { ?>
                        section--pt
                    <?php } ?>

                    <?php if($padding_bottom === 'yes') { ?>
                        section--pb
                    <?php } ?>

                    <?php if($margin_bottom === 'yes') { ?>
                        section--mb
                    <?php } ?>
                ">
                    <div class="container">
                        <div class="section__header">
                            <h2 class="section__title"><?php echo $title; ?></h2>
                        </div>
                        <?php if( have_rows('list') ): ?>
                            <ul class="approach-list">
                                <?php while( have_rows('list') ): the_row(); 
                                    $title = get_sub_field('title');
                                    $text = get_sub_field('text');
                                    ?>
                                    <li class="approach-list__item">
                                        <svg class="approach-list__shape">
                                            <use xlink:href="<?php bloginfo('template_directory'); ?>/icons/symbol/svg/sprite.symbol.svg#top-card-shape" />
                                        </svg>
                                        <h3 class="approach-list__title"><?php echo $title; ?></h3>
                                        <p class="approach-list__text"><?php echo $text; ?></p>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </section>

        <?php elseif (get_row_layout() == 'testing_services'):
            $title = get_sub_field('title');

            $section_background_color = get_sub_field('section_background_color');
            $padding_top = get_sub_field('padding_top');
            $padding_bottom = get_sub_field('padding_bottom');
            $margin_bottom = get_sub_field('margin_bottom');
            ?>

            <section
            class="section testing-services
                <?php if($section_background_color === 'blue') { ?>
                    section--blue
                <?php } elseif ($section_background_color === 'grey') { ?>
                    section--grey
                <?php } else { ?>
                    section--white
                <?php } ?>

                <?php if($padding_top === 'yes') { ?>
                    section--pt
                <?php } ?>

                <?php if($padding_bottom === 'yes') { ?>
                    section--pb
                <?php } ?>

                <?php if($margin_bottom === 'yes') { ?>
                    section--mb
                <?php } ?>
            "
            >
            <div class="container">
                <div class="section__header">
                <h2 class="section__title">
                    <?php echo $title; ?>
                </h2>
                </div>

                <?php if( have_rows('list') ): ?>
                    <div class="swiper testing-services__swiper">
                        <div class="swiper-wrapper">
                            <?php while( have_rows('list') ): the_row(); 
                                $title = get_sub_field('title');
                                $text = get_sub_field('text');
                                ?>
                                <div class="swiper-slide">
                                    <div class="testing-services__item">
                                        <h3 class="testing-services__item-title"><?php echo $title; ?></h3>
                                        <p class="testing-services__item-text"><?php echo $text; ?></p>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                        <div class="testing-services__controls">
                            <div class="testing-services__prev">
                                <svg>
                                    <use xlink:href="<?php bloginfo('template_directory'); ?>/icons/symbol/svg/sprite.symbol.svg#swiper-arrow-left" />
                                </svg>
                            </div>
                                <div class="testing-services__next">
                                <svg>
                                    <use xlink:href="<?php bloginfo('template_directory'); ?>/icons/symbol/svg/sprite.symbol.svg#swiper-arrow-right" />
                                </svg>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                
            </div>
            </section>

        <?php elseif (get_row_layout() == 'section_list_check_icon_title'):
            $title = get_sub_field('title');
            $subtitle = get_sub_field('subtitle');
            $text = get_sub_field('text');

            $color_scheme_of_list = get_sub_field('color_scheme_of_list');
            $section_background_color = get_sub_field('section_background_color');
            $padding_top = get_sub_field('padding_top');
            $padding_bottom = get_sub_field('padding_bottom');
            $margin_bottom = get_sub_field('margin_bottom');
            ?>

                <section class="section
                    <?php if($section_background_color === 'blue') { ?>
                        section--blue
                    <?php } elseif ($section_background_color === 'grey') { ?>
                        section--grey
                    <?php } else { ?>
                        section--white
                    <?php } ?>

                    <?php if($padding_top === 'yes') { ?>
                        section--pt
                    <?php } ?>

                    <?php if($padding_bottom === 'yes') { ?>
                        section--pb
                    <?php } ?>

                    <?php if($margin_bottom === 'yes') { ?>
                        section--mb
                    <?php } ?>                
                ">
                    <div class="container">
                        <div class="section__header">
                            <h2 class="section__title"><?php echo $title; ?></h2>
                            <p class="section__subtitle"><?php echo $subtitle; ?></p>
                        </div>
                        
                        <?php if( have_rows('list') ): 
                            
                            $list_count = 0;
                            while( have_rows('list') ) {
                                the_row();
                                $list_count++;
                            }
                            
                            $list_class = '';
                            if($list_count == 3) {
                                $list_class = 'three';
                            } elseif($list_count == 6) {
                                $list_class = 'six';
                            }
                            ?>
                            <ul class="list-w-icon-title <?php echo $list_class; ?> <?php if($color_scheme_of_list === 'yes') { ?>  list-w-icon-title--blue <?php } ?>">
                                <?php while( have_rows('list') ): the_row(); 
                                    $title = get_sub_field('title');
                                    ?>
                                    <li class="list-w-icon-title__item">
                                        <svg class="list-w-icon-title__icon">
                                            <use xlink:href="<?php bloginfo('template_directory'); ?>/icons/symbol/svg/sprite.symbol.svg#circle-check-icon" />
                                        </svg>
                                        <h3 class="list-w-icon-title__title"><?php echo $title; ?></h3>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                        <?php endif; ?>

                        <?php if($text) : ?>
                            <div class="text mt-5"><?php echo $text; ?></div>
                        <?php endif; ?>

                    </div>
                </section>

        <?php elseif (get_row_layout() == 'section_title_text_two_columns'):
            $title = get_sub_field('title');
            $text = get_sub_field('text');

            $section_background_color = get_sub_field('section_background_color');
            $padding_top = get_sub_field('padding_top');
            $padding_bottom = get_sub_field('padding_bottom');
            $margin_bottom = get_sub_field('margin_bottom');
            ?>

                <section class="section section--horizontal-text
                    <?php if($section_background_color === 'blue') { ?>
                        section--blue
                    <?php } elseif ($section_background_color === 'grey') { ?>
                        section--grey
                    <?php } else { ?>
                        section--white
                    <?php } ?>

                    <?php if($padding_top === 'yes') { ?>
                        section--pt
                    <?php } ?>

                    <?php if($padding_bottom === 'yes') { ?>
                        section--pb
                    <?php } ?>

                    <?php if($margin_bottom === 'yes') { ?>
                        section--mb
                    <?php } ?>
                ">   
                    <div class="container">
                        <div class="section__header">
                            <h2 class="section__title"><?php echo $title; ?></h2>
                        </div>
                        <div class="text"><?php echo $text; ?></div>
                    </div>
                </section>

        <?php elseif (get_row_layout() == 'section_text_with_image_'):
            $title = get_sub_field('title');
            $text = get_sub_field('text');

            $section_background_color = get_sub_field('section_background_color');
            $padding_top = get_sub_field('padding_top');
            $padding_bottom = get_sub_field('padding_bottom');
            $margin_bottom = get_sub_field('margin_bottom');
            ?>


                <section class="section section--w-img
                    <?php if($section_background_color === 'blue') { ?>
                        section--blue
                    <?php } elseif ($section_background_color === 'grey') { ?>
                        section--grey
                    <?php } else { ?>
                        section--white
                    <?php } ?>

                    <?php if($padding_top === 'yes') { ?>
                        section--pt
                    <?php } ?>

                    <?php if($padding_bottom === 'yes') { ?>
                        section--pb
                    <?php } ?>

                    <?php if($margin_bottom === 'yes') { ?>
                        section--mb
                    <?php } ?>
                ">
                    <div class="container">
                        <div class="section__header">
                            <h2 class="section__title"><?php echo $title; ?></h2>
                        </div>
                        <div class="text"><?php echo $text; ?></div>
                    </div>
                </section>

        <?php elseif (get_row_layout() == 'mdroptions'):
            $title = get_sub_field('title');
            $subtitle = get_sub_field('subtitle');

            $section_background_color = get_sub_field('section_background_color');
            $padding_top = get_sub_field('padding_top');
            $padding_bottom = get_sub_field('padding_bottom');
            $margin_bottom = get_sub_field('margin_bottom');
            ?>

                <section class="section
                    <?php if($section_background_color === 'blue') { ?>
                        section--blue
                    <?php } elseif ($section_background_color === 'grey') { ?>
                        section--grey
                    <?php } else { ?>
                        section--white
                    <?php } ?>

                    <?php if($padding_top === 'yes') { ?>
                        section--pt
                    <?php } ?>

                    <?php if($padding_bottom === 'yes') { ?>
                        section--pb
                    <?php } ?>

                    <?php if($margin_bottom === 'yes') { ?>
                        section--mb
                    <?php } ?>
                ">
                    <div class="container">
                        <div class="section__header">
                        <h2 class="section__title"><?php echo $title; ?></h2>
                        <?php if($subtitle) : ?>
                            <p class="section__subtitle"><?php echo $subtitle; ?></p>
                        <?php endif; ?>
                        </div>
                        <?php if( have_rows('slides') ): ?>
                            <ul class="slides">
                            <?php while( have_rows('slides') ): the_row(); 
                                $image = get_sub_field('image');
                                ?>
                                <li>
                                    <?php echo wp_get_attachment_image( $image, 'full' ); ?>
                                    <p><?php the_sub_field('caption'); ?></p>
                                </li>
                            <?php endwhile; ?>
                            </ul>
                        <?php endif; ?>
                        <?php if( have_rows('list') ): ?>
                            <ul class="options-cards">
                                <?php while( have_rows('list') ): the_row(); 
                                    $title = get_sub_field('title');
                                    $text = get_sub_field('text');
                                    ?>
                                    <li class="options-cards__item">
                                        <h3 class="options-cards__title"><?php echo $title; ?></h3>
                                        <p class="options-cards__text"><?php echo $text; ?></p>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </section>

        <?php elseif (get_row_layout() == 'section_title_with_list_icons_left'):
            $title = get_sub_field('title');
            $subtitle = get_sub_field('subtitle');

            $section_background_color = get_sub_field('section_background_color');
            $padding_top = get_sub_field('padding_top');
            $padding_bottom = get_sub_field('padding_bottom');
            $margin_bottom = get_sub_field('margin_bottom');
            ?>
                
                <section class="section
                    <?php if($section_background_color === 'blue') { ?>
                        section--blue
                    <?php } elseif ($section_background_color === 'grey') { ?>
                        section--grey
                    <?php } else { ?>
                        section--white
                    <?php } ?>

                    <?php if($padding_top === 'yes') { ?>
                        section--pt
                    <?php } ?>

                    <?php if($padding_bottom === 'yes') { ?>
                        section--pb
                    <?php } ?>

                    <?php if($margin_bottom === 'yes') { ?>
                        section--mb
                    <?php } ?>
                ">
                    <div class="container">
                        <div class="section__header">
                            <h2 class="section__title"><?php echo $title; ?></h2>
                        </div>
                        <?php if( have_rows('list') ): ?>
                            <ul class="sp-list">
                                <?php while( have_rows('list') ): the_row(); 
                                    $icon = get_sub_field('icon');
                                    $title = get_sub_field('title');
                                    $text = get_sub_field('text');
                                    ?>
                                    <li class="sp-list__item">
                                        <i class="sp-list__icon">
                                            <img src="<?php echo $icon['url'] ?>" alt="<?php echo $icon['alt'] ?>" width="<?php echo $icon['width'] ?>" height="<?php echo $icon['height'] ?>" />
                                        </i>
                                        <h3 class="sp-list__title"><?php echo $title; ?></h3>
                                        <p class="sp-list__text"><?php echo $text; ?></p>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </section>

        <?php elseif (get_row_layout() == 'section_with_image_scroll_x'):
            $title = get_sub_field('title');
            $image = get_sub_field('image');
            $image_mobile = get_sub_field('image_mobile');

            $section_background_color = get_sub_field('section_background_color');
            $padding_top = get_sub_field('padding_top');
            $padding_bottom = get_sub_field('padding_bottom');
            $margin_bottom = get_sub_field('margin_bottom');
            ?>

                <section class="section
                    <?php if($section_background_color === 'blue') { ?>
                        section--blue
                    <?php } elseif ($section_background_color === 'grey') { ?>
                        section--grey
                    <?php } else { ?>
                        section--white
                    <?php } ?>

                    <?php if($padding_top === 'yes') { ?>
                        section--pt
                    <?php } ?>

                    <?php if($padding_bottom === 'yes') { ?>
                        section--pb
                    <?php } ?>

                    <?php if($margin_bottom === 'yes') { ?>
                        section--mb
                    <?php } ?>
                ">
                    <div class="container">
                        <?php if($title) : ?>
                            <div class="section__header">
                                <h2 class="section__title">
                                    <?php echo $title; ?>
                                </h2>
                            </div>
                        <?php endif; ?>
                        <picture style="display: block;">
                            <source media="(max-width: 767px)" srcset="<?php echo $image_mobile['url']; ?>">
                            <source media="(min-width: 768px)" srcset="<?php echo $image['url']; ?>">
                            <img style="width: 100%; height: auto;" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" width="<?php echo $image['width']; ?>" height="<?php echo $image['height']; ?>" />
                        </picture>
                    </div>
                </section>

        <?php elseif (get_row_layout() == 'section_text_with_logoes'):
            $title = get_sub_field('title');
            $text = get_sub_field('text');
            $text_second = get_sub_field('text_second');

            $section_background_color = get_sub_field('section_background_color');
            $padding_top = get_sub_field('padding_top');
            $padding_bottom = get_sub_field('padding_bottom');
            $margin_bottom = get_sub_field('margin_bottom');
            ?>

                <section class="section
                    <?php if($section_background_color === 'blue') { ?>
                        section--blue
                    <?php } elseif ($section_background_color === 'grey') { ?>
                        section--grey
                    <?php } else { ?>
                        section--white
                    <?php } ?>

                    <?php if($padding_top === 'yes') { ?>
                        section--pt
                    <?php } ?>

                    <?php if($padding_bottom === 'yes') { ?>
                        section--pb
                    <?php } ?>

                    <?php if($margin_bottom === 'yes') { ?>
                        section--mb
                    <?php } ?>
                ">
                    <div class="container">
                        <div class="section__header">
                            <h2 class="section__title">
                                <?php echo $title; ?>
                            </h2>
                        </div>
                        <div class="text mb-5"><?php echo $text; ?></div>
                        <?php if($text_second) : ?>
                            <div class="text mb-5"><?php echo $text_second; ?></div>
                        <?php endif; ?>
                        <?php if( have_rows('logoes') ): ?>
                            <ul class="logoes">
                                <?php while( have_rows('logoes') ): the_row(); 
                                    $logo = get_sub_field('logo');
                                    ?>
                                    <li><img src="<?php echo $logo['url'] ?>" alt="<?php echo $logo['alt'] ?>" width="<?php echo $logo['width'] ?>" height="<?php echo $logo['height'] ?>" /></li>
                                <?php endwhile; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </section>

        <?php elseif (get_row_layout() == 'impact_assessments'):
            $title = get_sub_field('title');

            $section_background_color = get_sub_field('section_background_color');
            $padding_top = get_sub_field('padding_top');
            $padding_bottom = get_sub_field('padding_bottom');
            $margin_bottom = get_sub_field('margin_bottom');
            ?>

            <section class="section
                <?php if($section_background_color === 'blue') { ?>
                    section--blue
                <?php } elseif ($section_background_color === 'grey') { ?>
                    section--grey
                <?php } else { ?>
                    section--white
                <?php } ?>

                <?php if($padding_top === 'yes') { ?>
                    section--pt
                <?php } ?>

                <?php if($padding_bottom === 'yes') { ?>
                    section--pb
                <?php } ?>

                <?php if($margin_bottom === 'yes') { ?>
                    section--mb
                <?php } ?>
            ">
                <div class="container">
                    <div class="container">
                        <div class="section__header">
                            <h2 class="section__title"><?php echo $title; ?></h2>
                        </div>
                        <?php if( have_rows('list') ): ?>
                            <ul class="acc-list">
                                <?php $cntr = 1; ?>
                                <?php while( have_rows('list') ): the_row(); 
                                    $title = get_sub_field('title');
                                    $text = get_sub_field('text');
                                    ?>
                                    <li class="acc-list__item active">
                                        <div class="acc-list__header">
                                            <div class="acc-list__marker"></div>
                                            <span class="acc-list__number">0<?php echo $cntr; ?></span>
                                            <h3 class="acc-list__title"><?php echo $title; ?></h3>
                                        </div>
                                        <div class="acc-list__text">
                                            <p><?php echo $text; ?></p>
                                        </div>
                                    </li>
                                    <?php $cntr++; ?>
                                <?php endwhile; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
            </section>

        <?php elseif (get_row_layout() == 'section_with_list_number_left'):
            $title = get_sub_field('title');

            $section_background_color = get_sub_field('section_background_color');
            $padding_top = get_sub_field('padding_top');
            $padding_bottom = get_sub_field('padding_bottom');
            $margin_bottom = get_sub_field('margin_bottom');
            ?>

                <section class="section
                    <?php if($section_background_color === 'blue') { ?>
                        section--blue
                    <?php } elseif ($section_background_color === 'grey') { ?>
                        section--grey
                    <?php } else { ?>
                        section--white
                    <?php } ?>

                    <?php if($padding_top === 'yes') { ?>
                        section--pt
                    <?php } ?>

                    <?php if($padding_bottom === 'yes') { ?>
                        section--pb
                    <?php } ?>

                    <?php if($margin_bottom === 'yes') { ?>
                        section--mb
                    <?php } ?>
                ">
                    <div class="container">
                        <div class="section__header">
                            <h2 class="section__title"><?php echo $title; ?></h2>
                        </div>
                        <?php if( have_rows('list') ): ?>
                            <ul class="sp-list-number">
                                <?php $counter = 1; ?>
                                <?php while( have_rows('list') ): the_row(); 
                                    $title = get_sub_field('title');
                                    $text = get_sub_field('text');
                                    ?>
                                    <li class="sp-list-number__item">
                                        <span class="sp-list-number__number">0<?php echo $counter; ?></span>
                                        <h3 class="sp-list-number__title"><?php echo $title ?></h3>
                                        <p class="sp-list-number__text"><?php echo $text; ?></p>
                                    </li>
                                    <?php $counter++; ?>
                                <?php endwhile; ?>
                            </ul>
                        <?php endif; ?>
                        <?php if( have_rows('button') ): ?>
                            <?php while( have_rows('button') ): the_row(); 
                                $button_text = get_sub_field('button_text');
                                $button_link = get_sub_field('button_link');
                                $button_anchor = get_sub_field('button_anchor');

                                if( $button_text || $button_link || $button_anchor ): ?>
                                <div class="d-flex justiy-content-center mt-5">
                                    <a href="<?php if($button_link)  echo $button_link;  else  echo $button_anchor; ?>" class="button button--inline">
                                        <span class="button__text"><?php echo $button_text; ?></span>
                                        <span class="button__arrow">
                                            <svg>
                                            <use xlink:href="<?php bloginfo('template_directory'); ?>/icons/symbol/svg/sprite.symbol.svg#button-arrow-icon" />
                                            </svg>
                                        </span>
                                    </a>
                                </div>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </section>

        <?php elseif (get_row_layout() == 'section_two_columns_text_width_image'):
            $title = get_sub_field('title');
            $text = get_sub_field('text');
            $image = get_sub_field('image');

            $section_background_color = get_sub_field('section_background_color');
            $padding_top = get_sub_field('padding_top');
            $padding_bottom = get_sub_field('padding_bottom');
            $margin_bottom = get_sub_field('margin_bottom');
            ?>

                <section class="section section-two-columns
                    <?php if($section_background_color === 'blue') { ?>
                        section--blue
                    <?php } elseif ($section_background_color === 'grey') { ?>
                        section--grey
                    <?php } else { ?>
                        section--white
                    <?php } ?>

                    <?php if($padding_top === 'yes') { ?>
                        section--pt
                    <?php } ?>

                    <?php if($padding_bottom === 'yes') { ?>
                        section--pb
                    <?php } ?>

                    <?php if($margin_bottom === 'yes') { ?>
                        section--mb
                    <?php } ?>
                ">
                    <div class="container">
                        <div class="section-two-columns__row">
                            <div class="section-two-columns__col">
                                <div class="section__header">
                                    <h2 class="section__title"><?php echo $title; ?></h2>
                                </div>
                                <div class="text"><?php echo $text; ?></div>
                            </div>
                            <div class="section-two-columns__col">
                                <img class="img" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" width="<?php echo $image['width']; ?>" height="<?php echo $image['height']; ?>" />
                            </div>
                        </div>
                    </div>
                </section>

        <?php elseif (get_row_layout() == 'section_with_orange_cards'):
            $title = get_sub_field('title');
            $subtitle = get_sub_field('subtitle');

            $section_background_color = get_sub_field('section_background_color');
            $padding_top = get_sub_field('padding_top');
            $padding_bottom = get_sub_field('padding_bottom');
            $margin_bottom = get_sub_field('margin_bottom');
            ?>

                <section class="section
                    <?php if($section_background_color === 'blue') { ?>
                        section--blue
                    <?php } elseif ($section_background_color === 'grey') { ?>
                        section--grey
                    <?php } else { ?>
                        section--white
                    <?php } ?>

                    <?php if($padding_top === 'yes') { ?>
                        section--pt
                    <?php } ?>

                    <?php if($padding_bottom === 'yes') { ?>
                        section--pb
                    <?php } ?>

                    <?php if($margin_bottom === 'yes') { ?>
                        section--mb
                    <?php } ?>
                ">
                    <div class="container">
                        <div class="section__header">
                            <h2 class="section__title"><?php echo $title; ?></h2>
                            <?php if($subtitle): ?>
                                <p class="section__subtitle"><?php echo $subtitle; ?></p>
                            <?php endif; ?>
                        </div>
                        <?php if( have_rows('list') ): ?>
                            <ul class="orange-cards">
                                <?php while( have_rows('list') ): the_row(); 
                                    $icon = get_sub_field('icon');
                                    $title = get_sub_field('title');
                                    $text = get_sub_field('text');
                                    ?>
                                     <li class="orange-cards__item">
                                        <svg class="orange-cards__shape">
                                            <use xlink:href="<?php bloginfo('template_directory'); ?>/icons/symbol/svg/sprite.symbol.svg#top-card-shape" />
                                        </svg>
                                        <img
                                            class="orange-cards__icon"
                                            src="<?php echo $icon['url']; ?>"
                                            alt="<?php echo $icon['alt']; ?>"
                                            width="<?php echo $icon['width']; ?>"
                                            height="<?php echo $icon['height']; ?>"
                                        />
                                        <h3 class="orange-cards__title"><?php echo $title; ?></h3>
                                        <p class="orange-cards__text"><?php echo $text; ?></p>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </section>

        <?php elseif (get_row_layout() == 'section_two_columns_text_width_video'):
            $title = get_sub_field('title');
            $text = get_sub_field('text');

            $section_background_color = get_sub_field('section_background_color');
            $padding_top = get_sub_field('padding_top');
            $padding_bottom = get_sub_field('padding_bottom');
            $margin_bottom = get_sub_field('margin_bottom');
            ?>

                <section class="section text-section
                    <?php if($section_background_color === 'blue') { ?>
                        section--blue
                    <?php } elseif ($section_background_color === 'grey') { ?>
                        section--grey
                    <?php } else { ?>
                        section--white
                    <?php } ?>

                    <?php if($padding_top === 'yes') { ?>
                        section--pt
                    <?php } ?>

                    <?php if($padding_bottom === 'yes') { ?>
                        section--pb
                    <?php } ?>

                    <?php if($margin_bottom === 'yes') { ?>
                        section--mb
                    <?php } ?>
                ">
                    <div class="container">
                        <div class="text-section__row">
                            <div class="text-section__col">
                                <div class="section__header">
                                <h2 class="section__title"><?php echo $title; ?></h2>
                                </div>
                                <div class="text mb-5"><?php echo $text; ?></div>
                                <?php if( have_rows('button') ): ?>
                                    <?php while( have_rows('button') ): the_row(); 
                                        $button_text = get_sub_field('button_text');
                                        $button_link = get_sub_field('button_link');
                                        $button_anchor = get_sub_field('button_anchor');
                                        ?>
                                        <a href="<?php if($button_link)  echo $button_link;  else  echo $button_anchor; ?>" class="button button--inline">
                                            <span class="button__text"><?php echo $button_text; ?></span>
                                            <span class="button__arrow">
                                                <svg>
                                                <use xlink:href="<?php bloginfo('template_directory'); ?>/icons/symbol/svg/sprite.symbol.svg#button-arrow-icon" />
                                                </svg>
                                            </span>
                                        </a>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </div>
                            <div class="text-section__col">
                                <?php if( have_rows('video_link') ): ?>
                                    <?php while( have_rows('video_link') ): the_row(); 
                                        $poster = get_sub_field('poster');
                                        $link_on_youtube = get_sub_field('link_on_youtube');
                                        ?>
                                        <a href="<?php echo $link_on_youtube; ?>" data-fancybox class="text-section__link">
                                            <img src="<?php echo $poster['url'] ?>" alt="<?php echo $poster['alt'] ?>" width="<?php echo $poster['width'] ?>" height="<?php echo $poster['height'] ?>" />
                                            <span class="play-icon">
                                                <svg>
                                                    <use xlink:href="<?php bloginfo('template_directory'); ?>/icons/symbol/svg/sprite.symbol.svg#play-icon" />
                                                </svg>
                                            </span>
                                        </a>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </section>

        <?php elseif (get_row_layout() == 'section_two_columns_title_with_table_link'):
            $title = get_sub_field('title');
            $text = get_sub_field('text');

            $section_background_color = get_sub_field('section_background_color');
            $padding_top = get_sub_field('padding_top');
            $padding_bottom = get_sub_field('padding_bottom');
            $margin_bottom = get_sub_field('margin_bottom');
            ?>

                <section class="section section--horizontal-text
                    <?php if($section_background_color === 'blue') { ?>
                        section--blue
                    <?php } elseif ($section_background_color === 'grey') { ?>
                        section--grey
                    <?php } else { ?>
                        section--white
                    <?php } ?>

                    <?php if($padding_top === 'yes') { ?>
                        section--pt
                    <?php } ?>

                    <?php if($padding_bottom === 'yes') { ?>
                        section--pb
                    <?php } ?>

                    <?php if($margin_bottom === 'yes') { ?>
                        section--mb
                    <?php } ?>
                ">
                    <div class="container align-items-xl-top">
                        <div class="section__header">
                            <h2 class="section__title"><?php echo $title; ?></h2>
                        </div>
                        <?php if( have_rows('list') ): ?>
                            <ul class="dot-list">
                                <?php while( have_rows('list') ): the_row(); 
                                    $title = get_sub_field('title');
                                    $link = get_sub_field('link');
                                    ?>
                                    <li>
                                        <?php if($link) { ?>
                                            <a href="<?php echo $link; ?>"><?php echo $title; ?></a>
                                        <?php } else { ?>
                                            <?php echo $title; ?>
                                        <?php } ?>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </section>

        <?php elseif (get_row_layout() == 'section_title_subtitle_big_cards'):
            $title = get_sub_field('title');
            $text = get_sub_field('text');

            $section_background_color = get_sub_field('section_background_color');
            $padding_top = get_sub_field('padding_top');
            $padding_bottom = get_sub_field('padding_bottom');
            $margin_bottom = get_sub_field('margin_bottom');
            ?>

                <section class="section
                    <?php if($section_background_color === 'blue') { ?>
                        section--blue
                    <?php } elseif ($section_background_color === 'grey') { ?>
                        section--grey
                    <?php } else { ?>
                        section--white
                    <?php } ?>

                    <?php if($padding_top === 'yes') { ?>
                        section--pt
                    <?php } ?>

                    <?php if($padding_bottom === 'yes') { ?>
                        section--pb
                    <?php } ?>

                    <?php if($margin_bottom === 'yes') { ?>
                        section--mb
                    <?php } ?>
                ">
                    <div class="container">
                        <div class="section__header">
                            <h2 class="section__title"><?php echo $title; ?></h2>
                        </div>
                        <div class="text mb-5"><?php echo $text; ?></div>
                        <?php if( have_rows('list') ): ?>
                            <ul class="big-cards">
                                <?php while( have_rows('list') ): the_row(); 
                                    $title = get_sub_field('title');
                                    $text = get_sub_field('text');
                                    ?>
                                    <li class="big-cards__item active">
                                        <div class="big-cards__header">
                                            <h3 class="big-cards__title"><?php echo $title; ?></h3>
                                            <span class="big-cards__marker"></span>
                                        </div>
                                        <div class="big-cards__content"><?php echo $text; ?></div>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </section>

        <?php elseif (get_row_layout() == 'section_list_of_services'):
            $title = get_sub_field('title');
            $text = get_sub_field('text');

            $section_background_color = get_sub_field('section_background_color');
            $padding_top = get_sub_field('padding_top');
            $padding_bottom = get_sub_field('padding_bottom');
            $margin_bottom = get_sub_field('margin_bottom');
            ?>

                <section class="section
                    <?php if($section_background_color === 'blue') { ?>
                        section--blue
                    <?php } elseif ($section_background_color === 'grey') { ?>
                        section--grey
                    <?php } else { ?>
                        section--white
                    <?php } ?>

                    <?php if($padding_top === 'yes') { ?>
                        section--pt
                    <?php } ?>

                    <?php if($padding_bottom === 'yes') { ?>
                        section--pb
                    <?php } ?>

                    <?php if($margin_bottom === 'yes') { ?>
                        section--mb
                    <?php } ?>
                ">
                    <div class="container">
                        <div class="section__header">
                            <h2 class="section__title">
                                <?php echo $title; ?>
                            </h2>
                        </div>
                        <?php if( have_rows('list') ): ?>
                            <ul class="benefits-card benefits-card--four mb-5">
                                <?php while( have_rows('list') ): the_row(); 
                                    $icon = get_sub_field('icon');
                                    $title = get_sub_field('title');
                                    $link = get_sub_field('link');
                                    ?>
                                    <li class="benefits-card__item">
                                        <?php if($link) { ?>
                                            <a href="<?php echo $link; ?>" class="benefits-card__link">
                                                <h3 class="benefits-card__title"><?php echo $title; ?></h3>
                                                <span class="benefits-card__icon">
                                                    <img src="<?php echo $icon['url'] ?>" alt="<?php echo $icon['alt'] ?>" width="<?php echo $icon['width'] ?>" height="<?php echo $icon['height'] ?>"/>
                                                </span>
                                            </a>
                                        <?php } else  { ?>
                                            <div class="benefits-card__link">
                                                <h3 class="benefits-card__title"><?php echo $title; ?></h3>
                                                <span class="benefits-card__icon">
                                                    <img src="<?php echo $icon['url'] ?>" alt="<?php echo $icon['alt'] ?>" width="<?php echo $icon['width'] ?>" height="<?php echo $icon['height'] ?>"/>
                                                </span>
                                            </div>
                                        <?php } ?>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                        <?php endif; ?>
                        <div class="text mb-5"><?php echo $text; ?></div>
                        <?php if( have_rows('button') ): ?>
                            <?php while( have_rows('button') ): the_row(); 
                                $button_text = get_sub_field('button_text');
                                $button_link = get_sub_field('button_link');
                                $button_anchor = get_sub_field('button_anchor');

                                if( $button_text || $button_link || $button_anchor ): ?>
                                    <div class="d-flex justiy-content-center">
                                        <a href="<?php if($button_link) echo $button_link; else echo $button_anchor; ?>" class="button button--inline">
                                            <span class="button__text"><?php echo $button_text; ?></span>
                                            <span class="button__arrow">
                                                <svg>
                                                    <use xlink:href="<?php bloginfo('template_directory'); ?>/icons/symbol/svg/sprite.symbol.svg#button-arrow-icon" />
                                                </svg>
                                            </span>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </section>

        <?php elseif (get_row_layout() == 'section_text_with_circle_list'):
            $title = get_sub_field('title');
            $text = get_sub_field('text');
            $subtitle = get_sub_field('subtitle');

            $section_background_color = get_sub_field('section_background_color');
            $padding_top = get_sub_field('padding_top');
            $padding_bottom = get_sub_field('padding_bottom');
            $margin_bottom = get_sub_field('margin_bottom');
            ?>

                <section class="section
                    <?php if($section_background_color === 'blue') { ?>
                        section--blue
                    <?php } elseif ($section_background_color === 'grey') { ?>
                        section--grey
                    <?php } else { ?>
                        section--white
                    <?php } ?>

                    <?php if($padding_top === 'yes') { ?>
                        section--pt
                    <?php } ?>

                    <?php if($padding_bottom === 'yes') { ?>
                        section--pb
                    <?php } ?>

                    <?php if($margin_bottom === 'yes') { ?>
                        section--mb
                    <?php } ?>
                ">
                    <div class="container">
                        <div class="section__header">
                            <h2 class="section__title"><?php echo $title; ?></h2>
                        </div>
                        <div class="text mb-5"><?php echo $text; ?></div>
                        <div class="text">
                            <h3><?php echo $subtitle; ?></h3>
                        </div>
                        <?php if( have_rows('list') ): ?>
                            <ul class="list-w-icon-title list-w-icon-title--blue three-inline mb-5">
                                <?php while( have_rows('list') ): the_row(); 
                                    $title = get_sub_field('title');
                                    ?>
                                    <li class="list-w-icon-title__item">
                                        <svg class="list-w-icon-title__icon">
                                            <use xlink:href="<?php bloginfo('template_directory'); ?>/icons/symbol/svg/sprite.symbol.svg#circle-check-icon"></use>
                                        </svg>
                                        <h3 class="list-w-icon-title__title"><?php echo $title; ?></h3>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </section>

                <?php elseif (get_row_layout() == 'custom_story'):
                    $title = get_sub_field('title');

                    $section_background_color = get_sub_field('section_background_color');
                    $padding_top = get_sub_field('padding_top');
                    $padding_bottom = get_sub_field('padding_bottom');
                    $margin_bottom = get_sub_field('margin_bottom');
                    ?>

                    <section class="section
                        <?php if($section_background_color === 'blue') { ?>
                            section--blue
                        <?php } elseif ($section_background_color === 'grey') { ?>
                            section--grey
                        <?php } else { ?>
                            section--white
                        <?php } ?>

                        <?php if($padding_top === 'yes') { ?>
                            section--pt
                        <?php } ?>

                        <?php if($padding_bottom === 'yes') { ?>
                            section--pb
                        <?php } ?>

                        <?php if($margin_bottom === 'yes') { ?>
                            section--mb
                        <?php } ?>
                    ">
                        <div class="container">
                            <div class="section__header">
                                <h2 class="section__title"><?php echo $title; ?></h2>
                            </div>
                            <?php 
                            $related_stories = get_sub_field('related_stories');
                            if( $related_stories ): ?>
                                <?php foreach( $related_stories as $post): ?>
                                    <?php 
                                        setup_postdata($post); 
                                        $permalink = get_permalink();
                                        $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                                    ?>
                                    <div class="cm-story-card">
                                        <svg class="cm-story-card__shape-top">
                                            <use xlink:href="<?php bloginfo('template_directory'); ?>/icons/symbol/svg/sprite.symbol.svg#top-card-shape" />
                                        </svg>
                                        <svg class="cm-story-card__shape-bottom">
                                            <use xlink:href="<?php bloginfo('template_directory'); ?>/icons/symbol/svg/sprite.symbol.svg#top-card-shape" />
                                        </svg>
                                        <div class="cm-story-card__content">
                                            <h3 class="cm-story-card__title"><?php the_title(); ?></h3>
                                            <div class="cm-story-card__text"><?php the_excerpt(); ?></div>
                                            <a href="<?php echo $permalink; ?>" class="button">
                                                <span class="button__text">Read the new</span>
                                                <span class="button__arrow">
                                                <svg>
                                                    <use xlink:href="<?php bloginfo('template_directory'); ?>/icons/symbol/svg/sprite.symbol.svg#button-arrow-icon" />
                                                </svg>
                                                </span>
                                            </a>
                                        </div>
                                        <div class="cm-story-card__img">
                                            <img src="<?php echo $thumbnail_url; ?>" alt="<?php the_title(); ?>" />
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                <?php wp_reset_postdata(); ?>
                            <?php endif; ?>
                        </div>
                    </section>

        <?php elseif (get_row_layout() == 'team_section'):
            $section_background_color = get_sub_field('section_background_color');
            $padding_top = get_sub_field('padding_top');
            $padding_bottom = get_sub_field('padding_bottom');
            $margin_bottom = get_sub_field('margin_bottom');
            ?>

                <section class="section team-section
                    <?php if($section_background_color === 'blue') { ?>
                        section--blue
                    <?php } elseif ($section_background_color === 'grey') { ?>
                        section--grey
                    <?php } else { ?>
                        section--white
                    <?php } ?>

                    <?php if($padding_top === 'yes') { ?>
                        section--pt
                    <?php } ?>

                    <?php if($padding_bottom === 'yes') { ?>
                        section--pb
                    <?php } ?>

                    <?php if($margin_bottom === 'yes') { ?>
                        section--mb
                    <?php } ?>
                ">
                    <div class="container">
						<?php
						$featured_posts = get_sub_field('list');
						if( $featured_posts ): ?>
							<ul class="team-list">
                                <?php $cnt = 1; ?>
								<?php foreach( $featured_posts as $post ): 
									$title = get_the_title( $post->ID );
									$position = get_field( 'position', $post->ID );
									$description = get_field( 'description', $post->ID );
									$linkedin = get_field( 'linkedin', $post->ID );
									?>
									
										<li class="team-list__item">
											<div class="team-card" >
												<div class="team-card__img">
													<?php echo get_the_post_thumbnail( $post->ID, 'full' ); ?>
												</div>
												<div class="team-card__row">
													<div class="team-card__title"><?php echo esc_html( $title ); ?></div>
													<ul class="team-card__list">
														<?php if($linkedin): ?>
															<li>
																<a href="<?php echo $linkedin; ?>">
																	<svg>
																		<use xlink:href="<?php bloginfo('template_directory'); ?>/icons/symbol/svg/sprite.symbol.svg#in" />
																	</svg>
																</a>
															</li>
														<?php endif; ?>
														<li>
															<a href="#modal-<?php echo $cnt; ?>" data-fancybox>
															<svg class="team-card__icon">
																<use xlink:href="<?php bloginfo('template_directory'); ?>/icons/symbol/svg/sprite.symbol.svg#gobbler" />
															</svg>
															</a>
														</li>
													</ul>
												</div>
												<div class="team-card__post"><?php echo $position; ?></div>
											</div>
											<div class="d-none">
												<div class="team-card-modal" id="modal-<?php echo $cnt; ?>">
													<div class="team-card-modal__inner">
														<div class="team-card-modal__img">
															<?php echo get_the_post_thumbnail( $post->ID, 'full' ); ?>
														</div>
														<div class="team-card-modal__content">
															<div class="team-card-modal__title"><?php echo $title; ?></div>
															<div class="team-card-modal__post"><?php echo $position; ?></div>
															<div class="team-card-modal__text"><?php echo $description; ?></div>
														</div>
													</div>
												</div>
											</div>
										</li>
									
                                    <?php $cnt++; ?>
                                    <?php wp_reset_postdata(); ?>
								<?php endforeach; ?>
                            </ul>
						<?php endif; ?>
                    </div>
                </section>

        <?php elseif (get_row_layout() == 'experts_section'):
            $title = get_sub_field('title');
            $section_background_color = get_sub_field('section_background_color');
            $padding_top = get_sub_field('padding_top');
            $padding_bottom = get_sub_field('padding_bottom');
            $margin_bottom = get_sub_field('margin_bottom');
            ?>

                <section class="section team-section
                    <?php if($section_background_color === 'blue') { ?>
                        section--blue
                    <?php } elseif ($section_background_color === 'grey') { ?>
                        section--grey
                    <?php } else { ?>
                        section--white
                    <?php } ?>

                    <?php if($padding_top === 'yes') { ?>
                        section--pt
                    <?php } ?>

                    <?php if($padding_bottom === 'yes') { ?>
                        section--pb
                    <?php } ?>

                    <?php if($margin_bottom === 'yes') { ?>
                        section--mb
                    <?php } ?>
                ">
                    <div class="container">
                        <div class="section__header">
                            <h2 class="section__title"><?php echo $title; ?></h2>
                        </div>

                        <?php if( have_rows('button') ): ?>
                            <?php while( have_rows('button') ): the_row(); 
                                $button_text = get_sub_field('button_text');
                                $button_link = get_sub_field('button_link');
                                $button_anchor = get_sub_field('button_anchor');
                                $button_file = get_sub_field('button_file');

                                // Determine the button's URL based on the available fields
                                $button_url = '';
                                if($button_link) {
                                    $button_url = $button_link;
                                } elseif($button_anchor) {
                                    $button_url = $button_anchor;
                                } elseif($button_file) {
                                    // Assuming $button_file is an array with the URL of the file
                                    $button_url = $button_file['url'];
                                }

                                if( $button_text && $button_url): ?>
                                    <div class="d-flex justiy-content-center mb-5">
                                        <a href="<?php echo $button_url; ?>" class="button button--inline">
                                            <span class="button__text"><?php echo $button_text; ?></span>
                                            <span class="button__arrow">
                                                <svg>
                                                <use xlink:href="<?php bloginfo('template_directory'); ?>/icons/symbol/svg/sprite.symbol.svg#button-arrow-icon" />
                                                </svg>
                                            </span>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        <?php endif; ?>

						<?php
						$featured_posts = get_sub_field('list');
						if( $featured_posts ): ?>
							<ul class="team-list four">
                                <?php $cnt = 1; ?>
								<?php foreach( $featured_posts as $post ): 
									$title = get_the_title( $post->ID );
									$position = get_field( 'position', $post->ID );
									$description = get_field( 'description', $post->ID );
									$linkedin = get_field( 'linkedin', $post->ID );
									?>
									
										<li class="team-list__item">
											<div class="team-card" >
												<div class="team-card__img">
													<?php echo get_the_post_thumbnail( $post->ID, 'full' ); ?>
												</div>
												<div class="team-card__row">
													<div class="team-card__title"><?php echo esc_html( $title ); ?></div>
													<ul class="team-card__list">
														<?php if($linkedin): ?>
															<li>
																<a href="<?php echo $linkedin; ?>">
																	<svg>
																		<use xlink:href="<?php bloginfo('template_directory'); ?>/icons/symbol/svg/sprite.symbol.svg#in" />
																	</svg>
																</a>
															</li>
														<?php endif; ?>
														<li>
															<a href="#modal-<?php echo $cnt; ?>" data-fancybox>
															<svg class="team-card__icon">
																<use xlink:href="<?php bloginfo('template_directory'); ?>/icons/symbol/svg/sprite.symbol.svg#gobbler" />
															</svg>
															</a>
														</li>
													</ul>
												</div>
												<div class="team-card__post"><?php echo $position; ?></div>
											</div>
											<div class="d-none">
												<div class="team-card-modal" id="modal-<?php echo $cnt; ?>">
													<div class="team-card-modal__inner">
														<div class="team-card-modal__img">
															<?php echo get_the_post_thumbnail( $post->ID, 'full' ); ?>
														</div>
														<div class="team-card-modal__content">
															<div class="team-card-modal__title"><?php echo $title; ?></div>
															<div class="team-card-modal__post"><?php echo $position; ?></div>
															<div class="team-card-modal__text"><?php echo $description; ?></div>
														</div>
													</div>
												</div>
											</div>
										</li>
									
                                    <?php $cnt++; ?>
                                    <?php wp_reset_postdata(); ?>
								<?php endforeach; ?>
                            </ul>
						<?php endif; ?>
                    </div>
                </section>

        <?php elseif (get_row_layout() == 'our_story'):
            $title = get_sub_field('title');
            $section_background_color = get_sub_field('section_background_color');
            $padding_top = get_sub_field('padding_top');
            $padding_bottom = get_sub_field('padding_bottom');
            $margin_bottom = get_sub_field('margin_bottom');
            ?>

                <section class="section
                    <?php if($section_background_color === 'blue') { ?>
                        section--blue
                    <?php } elseif ($section_background_color === 'grey') { ?>
                        section--grey
                    <?php } else { ?>
                        section--white
                    <?php } ?>

                    <?php if($padding_top === 'yes') { ?>
                        section--pt
                    <?php } ?>

                    <?php if($padding_bottom === 'yes') { ?>
                        section--pb
                    <?php } ?>

                    <?php if($margin_bottom === 'yes') { ?>
                        section--mb
                    <?php } ?>
                ">
                    <div class="container">
                        <div class="section__header">
                            <h2 class="section__title"><?php echo $title; ?></h2>
                        </div>
                        <?php if( have_rows('list') ): ?>
                            <ul class="story-list mb-5">
                                <?php while( have_rows('list') ): the_row(); 
                                    $title = get_sub_field('title');
                                    $text = get_sub_field('text');
                                    ?>
                                    <li class="story-list__item">
                                        <h3 class="story-list__title"><?php echo $title; ?></h3>
                                        <div class="story-list__text"><?php echo $text; ?></div>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                        <?php endif; ?>
                        <?php if( have_rows('button') ): ?>
                            <?php while( have_rows('button') ): the_row(); 
                                $button_text = get_sub_field('button_text');
                                $button_link = get_sub_field('button_link');
                                $button_anchor = get_sub_field('button_anchor');

                                if( $button_text || $button_link || $button_anchor ): ?>
                                    <div class="d-flex justiy-content-center">
                                        <a href="<?php if($button_link)  echo $button_link;  else  echo $button_anchor; ?>" class="button button--inline">
                                            <span class="button__text"><?php echo $button_text; ?></span>
                                            <span class="button__arrow">
                                                <svg>
                                                <use xlink:href="<?php bloginfo('template_directory'); ?>/icons/symbol/svg/sprite.symbol.svg#button-arrow-icon" />
                                                </svg>
                                            </span>
                                        </a>
                                    </div>
                               
                                <?php endif; ?>
                            <?php endwhile; ?>
                        <?php endif; ?>

                    </div>
                </section>

        <?php elseif (get_row_layout() == 'review_card'):
            $title = get_sub_field('title');
            $section_background_color = get_sub_field('section_background_color');
            $padding_top = get_sub_field('padding_top');
            $padding_bottom = get_sub_field('padding_bottom');
            $margin_bottom = get_sub_field('margin_bottom');
            ?>

            <section class="section
                <?php if($section_background_color === 'blue') { ?>
                    section--blue
                <?php } elseif ($section_background_color === 'grey') { ?>
                    section--grey
                <?php } else { ?>
                    section--white
                <?php } ?>

                <?php if($padding_top === 'yes') { ?>
                    section--pt
                <?php } ?>

                <?php if($padding_bottom === 'yes') { ?>
                    section--pb
                <?php } ?>

                <?php if($margin_bottom === 'yes') { ?>
                    section--mb
                <?php } ?>
            ">
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
                                    <img src="<?php bloginfo('template_directory'); ?>/img/qoute-icon-light.svg" alt="<?php echo $title; ?>" />
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

        <?php elseif (get_row_layout() == 'our_values'):
            $title = get_sub_field('title');
            $text = get_sub_field('text');
            $section_background_color = get_sub_field('section_background_color');
            $padding_top = get_sub_field('padding_top');
            $padding_bottom = get_sub_field('padding_bottom');
            $margin_bottom = get_sub_field('margin_bottom');
            ?>

                <section class="section
                    <?php if($section_background_color === 'blue') { ?>
                        section--blue
                    <?php } elseif ($section_background_color === 'grey') { ?>
                        section--grey
                    <?php } else { ?>
                        section--white
                    <?php } ?>

                    <?php if($padding_top === 'yes') { ?>
                        section--pt
                    <?php } ?>

                    <?php if($padding_bottom === 'yes') { ?>
                        section--pb
                    <?php } ?>

                    <?php if($margin_bottom === 'yes') { ?>
                        section--mb
                    <?php } ?>
                ">
                    <div class="container">
                        <div class="section__header">
                            <h2 class="section__title"><?php echo $title; ?></h2>
                        </div>
                        <div class="text mb-5"><?php echo $text; ?></div>
                        <?php if( have_rows('list') ): ?>
                            <ul class="orange-cards four">
                                <?php while( have_rows('list') ): the_row(); 
                                    $icon = get_sub_field('icon');
                                    $title = get_sub_field('title');
                                    $text = get_sub_field('text');
                                    ?>
                                    <li class="orange-cards__item">
                                        <svg class="orange-cards__shape">
                                            <use xlink:href="<?php bloginfo('template_directory'); ?>/icons/symbol/svg/sprite.symbol.svg#top-card-shape" />
                                        </svg>
                                        <img class="orange-cards__icon" src="<?php echo $icon; ?>" alt="<?php echo $title; ?>" />
                                        <h3 class="orange-cards__title"><?php echo $title; ?></h3>
                                        <p class="orange-cards__text"><?php echo $text; ?></p>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </section>

        <?php elseif (get_row_layout() == 'section_with_white_cards'):
            $title = get_sub_field('title');
            $text = get_sub_field('text');
            $section_background_color = get_sub_field('section_background_color');
            $padding_top = get_sub_field('padding_top');
            $padding_bottom = get_sub_field('padding_bottom');
            $margin_bottom = get_sub_field('margin_bottom');
            ?>

                <section class="section
                    <?php if($section_background_color === 'blue') { ?>
                        section--blue
                    <?php } elseif ($section_background_color === 'grey') { ?>
                        section--grey
                    <?php } else { ?>
                        section--white
                    <?php } ?>

                    <?php if($padding_top === 'yes') { ?>
                        section--pt
                    <?php } ?>

                    <?php if($padding_bottom === 'yes') { ?>
                        section--pb
                    <?php } ?>

                    <?php if($margin_bottom === 'yes') { ?>
                        section--mb
                    <?php } ?>
                ">
                    <div class="container">
                        <div class="section__header">
                            <h2 class="section__title"><?php echo $title; ?></h2>
                        </div>
                        <div class="text mb-5"><?php echo $text; ?></div>
                        <?php if( have_rows('list') ): ?>
                            <ul class="white-cards">
                                <?php while( have_rows('list') ): the_row(); 
                                    $title = get_sub_field('title');
                                    $text = get_sub_field('text');
                                    ?>
                                    <li class="white-cards__item">
                                        <h3 class="white-cards__title"><?php echo $title; ?></h3>
                                        <div class="white-cards__text"><?php echo $text; ?></div>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </section>

        <?php elseif (get_row_layout() == 'awards'):
            $title = get_sub_field('title');
            $section_background_color = get_sub_field('section_background_color');
            $padding_top = get_sub_field('padding_top');
            $padding_bottom = get_sub_field('padding_bottom');
            $margin_bottom = get_sub_field('margin_bottom');
            ?>

                <section class="section
                    <?php if($section_background_color === 'blue') { ?>
                        section--blue
                    <?php } elseif ($section_background_color === 'grey') { ?>
                        section--grey
                    <?php } else { ?>
                        section--white
                    <?php } ?>

                    <?php if($padding_top === 'yes') { ?>
                        section--pt
                    <?php } ?>

                    <?php if($padding_bottom === 'yes') { ?>
                        section--pb
                    <?php } ?>

                    <?php if($margin_bottom === 'yes') { ?>
                        section--mb
                    <?php } ?>
                ">
                    <div class="container">
                        <div class="section__header">
                            <h2 class="section__title"><?php echo $title; ?></h2>
                        </div>
                        <div class="text mb-5"><?php echo $text; ?></div>
                        <div class="awards">
                            <?php if( have_rows('tabs') ): ?>
                                <div class="awards__nav">
                                    <?php $cnt=1; ?>
                                    <?php while( have_rows('tabs') ): the_row(); 
                                        $title = get_sub_field('title');
                                        ?>
                                        <div class="awards__nav-item <?php if($cnt === 1) {?>active<?php }?>"><?php echo $title; ?></div>
                                        <?php $cnt++; ?>
                                    <?php endwhile; ?>
                                </div>
                            <?php endif; ?>
    
                            <div class="awards__content">
                                <?php if( have_rows('tabs') ): ?>
                                    <?php $cntr=1; ?>
                                    <?php while( have_rows('tabs') ): the_row(); 
                                        $title = get_sub_field('title');
                                        ?>
                                        <div class="swiper awards__swiper">
                                            <div class="swiper-wrapper">
                                                <?php while( have_rows('slider') ): the_row(); 
                                                    $logo = get_sub_field('logo');
                                                    ?>
                                                    <div class="swiper-slide">
                                                        <img src="<?php echo $logo; ?>" alt="<?php echo $title; ?>" />
                                                    </div>
                                                <?php endwhile; ?>
                                            </div>
                                            <div class="awards__swiper-controls">
                                                <div class="awards__swiper-prev-button awards__prev-button-<?php echo $cntr; ?>" >
                                                    <svg class="awards__swiper-prev-icon">
                                                        <use xlink:href="<?php bloginfo('template_directory'); ?>//icons/symbol/svg/sprite.symbol.svg#swiper-arrow-left" />
                                                    </svg>
                                                </div>
                                                <div class="awards__swiper-next-button awards__next-button-<?php echo $cntr; ?>" >
                                                    <svg class="awards__swiper-prev-icon">
                                                        <use xlink:href="<?php bloginfo('template_directory'); ?>//icons/symbol/svg/sprite.symbol.svg#swiper-arrow-right" />
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                        <?php $cntr++; ?>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                                
                            </div>
                        </div>
                    </div>
                </section>

        <?php elseif (get_row_layout() == 'section_list_with_links_'):
            $title = get_sub_field('title');
            $text = get_sub_field('text');
            $section_background_color = get_sub_field('section_background_color');
            $padding_top = get_sub_field('padding_top');
            $padding_bottom = get_sub_field('padding_bottom');
            $margin_bottom = get_sub_field('margin_bottom');
            ?>

                <section class="section 
                    <?php if($section_background_color === 'blue') { ?>
                        section--blue
                    <?php } elseif ($section_background_color === 'grey') { ?>
                        section--grey
                    <?php } else { ?>
                        section--white
                    <?php } ?>

                    <?php if($padding_top === 'yes') { ?>
                        section--pt
                    <?php } ?>

                    <?php if($padding_bottom === 'yes') { ?>
                        section--pb
                    <?php } ?>

                    <?php if($margin_bottom === 'yes') { ?>
                        section--mb
                    <?php } ?>
                ">
                    <div class="container">
                        <div class="section__header">
                            <h2 class="section__title"><?php echo $title; ?></h2>
                        </div>
                        <?php if( have_rows('list') ): ?>
                            <ul class="offer-list">
                                <?php while( have_rows('list') ): the_row(); 
                                    $icon = get_sub_field('icon');
                                    $title = get_sub_field('title');
                                    $text = get_sub_field('text');
                                    $link = get_sub_field('link');
                                    ?>
                                    <li class="offer-list__item">
                                        <div class="offer-list__icon">
                                            <img src="<?php echo $icon; ?>" alt="<?php echo $title; ?>" />
                                        </div>
                                        <a href="<?php echo $link; ?>" class="offer-list__title"><?php echo $title; ?></a>
                                        <p class="offer-list__text"><?php echo $text; ?></p>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </section>

        <?php elseif (get_row_layout() == 'section_two_columns_text_number_list'):
            $title = get_sub_field('title');
            $text = get_sub_field('text');
            $section_background_color = get_sub_field('section_background_color');
            $padding_top = get_sub_field('padding_top');
            $padding_bottom = get_sub_field('padding_bottom');
            $margin_bottom = get_sub_field('margin_bottom');
            ?>

                <section class="section text-section 
                    <?php if($section_background_color === 'blue') { ?>
                        section--blue
                    <?php } elseif ($section_background_color === 'grey') { ?>
                        section--grey
                    <?php } else { ?>
                        section--white
                    <?php } ?>

                    <?php if($padding_top === 'yes') { ?>
                        section--pt
                    <?php } ?>

                    <?php if($padding_bottom === 'yes') { ?>
                        section--pb
                    <?php } ?>

                    <?php if($margin_bottom === 'yes') { ?>
                        section--mb
                    <?php } ?>
                ">
                    <div class="container">
                        <div class="text-section__row align-items-center">
                            <div class="text-section__col">
                                <div class="section__header">
                                    <h2 class="section__title"><?php echo $title; ?></h2>
                                </div>
                                <div class="text mb-5"><?php echo $text; ?></div>
                                <?php if( have_rows('button') ): ?>
                                    <?php while( have_rows('button') ): the_row(); 
                                        $button_text = get_sub_field('button_text');
                                        $button_link = get_sub_field('button_link');
                                        $button_anchor = get_sub_field('button_anchor');

                                        if( $button_text || $button_link || $button_anchor ): 
                                        ?>    
                                            <a href="<?php if($button_link)  echo $button_link;  else  echo $button_anchor; ?>" class="button button--inline">
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
                            <div class="text-section__col">
                                <?php if( have_rows('list') ): ?>
                                    <ul class="number-list">
                                        <?php $cntr = 1; ?>
                                        <?php while( have_rows('list') ): the_row(); 
                                            $text = get_sub_field('text');
                                            ?>
                                            <li><span>0<?php echo $cntr; ?></span><?php echo $text; ?></li>
                                            <?php $cntr++; ?>
                                        <?php endwhile; ?>
                                    </ul>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </section>

        <?php elseif (get_row_layout() == 'section_big_text_card_img_title_text'):
            $title = get_sub_field('title');
            $text = get_sub_field('text');
            $image = get_sub_field('image');
            $section_background_color = get_sub_field('section_background_color');
            $padding_top = get_sub_field('padding_top');
            $padding_bottom = get_sub_field('padding_bottom');
            $margin_bottom = get_sub_field('margin_bottom');
            ?>

                <section class="section
                    <?php if($section_background_color === 'blue') { ?>
                        section--blue
                    <?php } elseif ($section_background_color === 'grey') { ?>
                        section--grey
                    <?php } else { ?>
                        section--white
                    <?php } ?>

                    <?php if($padding_top === 'yes') { ?>
                        section--pt
                    <?php } ?>

                    <?php if($padding_bottom === 'yes') { ?>
                        section--pb
                    <?php } ?>

                    <?php if($margin_bottom === 'yes') { ?>
                        section--mb
                    <?php } ?>
                ">
                    <div class="container">
                        <div class="custom-card">
                            <div class="custom-card__img">
                                <img src="<?php echo $image; ?>" alt="<?php echo $title; ?>" />
                            </div>
                            <div class="custom-card__content">
                                <h3><?php echo $title; ?></h3>
                                <?php echo $text; ?>
                            </div>
                        </div>
                    </div>
                </section>

        <?php elseif (get_row_layout() == 'featured_partners'):
            $title = get_sub_field('title');
            $section_background_color = get_sub_field('section_background_color');
            $padding_top = get_sub_field('padding_top');
            $padding_bottom = get_sub_field('padding_bottom');
            $margin_bottom = get_sub_field('margin_bottom');
            ?>

                <section class="section featured-partners
                    <?php if($section_background_color === 'blue') { ?>
                        section--blue
                    <?php } elseif ($section_background_color === 'grey') { ?>
                        section--grey
                    <?php } else { ?>
                        section--white
                    <?php } ?>

                    <?php if($padding_top === 'yes') { ?>
                        section--pt
                    <?php } ?>

                    <?php if($padding_bottom === 'yes') { ?>
                        section--pb
                    <?php } ?>

                    <?php if($margin_bottom === 'yes') { ?>
                        section--mb
                    <?php } ?>
                ">
                    <div class="container">
                        <div class="section__header">
                            <h2 class="section__title"><?php echo $title; ?></h2>
                        </div>

                        <?php if( have_rows('list') ): ?>
                            <ul class="featured-list">
                                <?php while( have_rows('list') ): the_row(); 
                                    $logo = get_sub_field('logo');
                                    $text = get_sub_field('text');
                                    $link = get_sub_field('link');
                                    ?>
                                    <li class="featured-list__item">
                                        <svg class="featured-list__shape">
                                            <use xlink:href="<?php bloginfo('template_directory'); ?>/icons/symbol/svg/sprite.symbol.svg#top-card-shape" />
                                        </svg>
                                        <div class="featured-list__logo">
                                            <img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" width="<?php echo $logo['width']; ?>" height="<?php echo $logo['height']; ?>" />
                                        </div>
                                        <div class="featured-list__hidden">
                                            <div class="featured-list__content">
                                                <?php echo $text; ?>
                                                <a href="<?php echo $link; ?>" class="link">
                                                    learn more
                                                    <svg>
                                                        <use xlink:href="<?php bloginfo('template_directory'); ?>/icons/symbol/svg/sprite.symbol.svg#button-arrow-icon" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="featured-list__toggle-button"></div>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </section>

        <?php elseif (get_row_layout() == 'our_strategic_partners'):
            $title = get_sub_field('title');
            $section_background_color = get_sub_field('section_background_color');
            $padding_top = get_sub_field('padding_top');
            $padding_bottom = get_sub_field('padding_bottom');
            $margin_bottom = get_sub_field('margin_bottom');
            ?>

                <section class="section
                    <?php if($section_background_color === 'blue') { ?>
                        section--blue
                    <?php } elseif ($section_background_color === 'grey') { ?>
                        section--grey
                    <?php } else { ?>
                        section--white
                    <?php } ?>

                    <?php if($padding_top === 'yes') { ?>
                        section--pt
                    <?php } ?>

                    <?php if($padding_bottom === 'yes') { ?>
                        section--pb
                    <?php } ?>

                    <?php if($margin_bottom === 'yes') { ?>
                        section--mb
                    <?php } ?>
                ">
                    <div class="container">
                        <div class="section__header">
                            <h2 class="section__title"><?php echo $title; ?></h2>
                        </div>
                        <div class="swiper partners-slider">
                            <div class="swiper-wrapper">

                                <?php while( have_rows('list') ): the_row(); 
                                    $logo = get_sub_field('logo');
                                    ?>
                                    <div class="swiper-slide">
                                        <div class="partners-slider__item">
                                            <img src="<?php echo $logo; ?>" alt="logo" />
                                        </div>
                                    </div>
                                <?php endwhile; ?>

                            </div>
                            <div class="partners-slider__controls">
                                <div class="partners-slider__prev-button">
                                    <svg>
                                        <use xlink:href="<?php bloginfo('template_directory'); ?>/icons/symbol/svg/sprite.symbol.svg#swiper-arrow-left" />
                                    </svg>
                                </div>
                                <div class="partners-slider__next-button">
                                    <svg>
                                        <use xlink:href="<?php bloginfo('template_directory'); ?>/icons/symbol/svg/sprite.symbol.svg#swiper-arrow-right" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

        <?php elseif (get_row_layout() == 'partners_slider'):
            $title = get_sub_field('title');
            $section_background_color = get_sub_field('section_background_color');
            $padding_top = get_sub_field('padding_top');
            $padding_bottom = get_sub_field('padding_bottom');
            $margin_bottom = get_sub_field('margin_bottom');
            ?>

                <section class="section
                    <?php if($section_background_color === 'blue') { ?>
                        section--blue
                    <?php } elseif ($section_background_color === 'grey') { ?>
                        section--grey
                    <?php } else { ?>
                        section--white
                    <?php } ?>

                    <?php if($padding_top === 'yes') { ?>
                        section--pt
                    <?php } ?>

                    <?php if($padding_bottom === 'yes') { ?>
                        section--pb
                    <?php } ?>

                    <?php if($margin_bottom === 'yes') { ?>
                        section--mb
                    <?php } ?>
                ">
                    <div class="container">
                        <div class="section__header">
                            <h2 class="section__title"><?php echo $title; ?></h2>
                        </div>
                        <div class="swiper testimonials-slider">
                            <div class="swiper-wrapper">
                                <?php
                                $featured_posts = get_sub_field('list');
                                if( $featured_posts ): ?>
                                    <?php foreach( $featured_posts as $post ): 
                                        setup_postdata($post); ?>
                                        <div class="swiper-slide">
                                            <div class="testimonial-card">
                                                <div class="testimonial-card__name">
                                                   <?php the_title(); ?>
                                                </div>
                                                <div class="testimonial-card__position">
                                                    <?php the_field( 'testimonil_position' ); ?>
                                                </div>
                                                <div class="testimonial-card__text">
                                                    <?php the_field( 'testimonial_text' ); ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                    <?php 
                                    wp_reset_postdata(); ?>
                                <?php endif; ?>
                            </div>
                            <div class="testimonials-slider__controls">
                                <div class="testimonials-slider__prev-button">
                                    <svg>
                                        <use xlink:href="<?php bloginfo('template_directory'); ?>/icons/symbol/svg/sprite.symbol.svg#swiper-arrow-left" />
                                    </svg>
                                </div>
                                    <div class="testimonials-slider__next-button">
                                    <svg>
                                        <use xlink:href="<?php bloginfo('template_directory'); ?>/icons/symbol/svg/sprite.symbol.svg#swiper-arrow-right" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

        <?php elseif (get_row_layout() == 'cyber_insights'):
            $title = get_sub_field('title');
            $section_background_color = get_sub_field('section_background_color');
            $padding_top = get_sub_field('padding_top');
            $padding_bottom = get_sub_field('padding_bottom');
            $margin_bottom = get_sub_field('margin_bottom');
            ?>

                <section class="section
                    <?php if($section_background_color === 'blue') { ?>
                        section--blue
                    <?php } elseif ($section_background_color === 'grey') { ?>
                        section--grey
                    <?php } else { ?>
                        section--white
                    <?php } ?>

                    <?php if($padding_top === 'yes') { ?>
                        section--pt
                    <?php } ?>

                    <?php if($padding_bottom === 'yes') { ?>
                        section--pb
                    <?php } ?>

                    <?php if($margin_bottom === 'yes') { ?>
                        section--mb
                    <?php } ?>
                ">
                    <div class="container">
                        <div class="section__header">
                            <h2 class="section__title"><?php echo $title; ?></h2>
                        </div>
                        <?php if( have_rows('list') ): ?>
                            <div class="cyber-list">
                                <?php while( have_rows('list') ): the_row(); 
                                    $title = get_sub_field('title');
                                    $text = get_sub_field('text');
                                    $link = get_sub_field('link');
                                    ?>
                                    <a href="<?php echo $link; ?>" class="cyber-list__item">
                                        <svg class="cyber-list__shape">
                                            <use xlink:href="<?php bloginfo('template_directory'); ?>/icons/symbol/svg/sprite.symbol.svg#bottom-right-card-shape" />
                                        </svg>
                                        <h3 class="cyber-list__title"><?php echo $title; ?></h3>
                                        <p class="cyber-list__text"><?php echo $text; ?></p>
                                        <span class="cyber-list__icon">
                                            <svg>
                                                <use xlink:href="<?php bloginfo('template_directory'); ?>/icons/symbol/svg/sprite.symbol.svg#button-arrow-icon" />
                                            </svg>
                                        </span>
                                    </a>
                                <?php endwhile; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </section>

        <?php elseif (get_row_layout() == 'workin_with_us'):
            $title = get_sub_field('title');
            $section_background_color = get_sub_field('section_background_color');
            $padding_top = get_sub_field('padding_top');
            $padding_bottom = get_sub_field('padding_bottom');
            $margin_bottom = get_sub_field('margin_bottom');
            ?>

                <section class="section
                    <?php if($section_background_color === 'blue') { ?>
                        section--blue
                    <?php } elseif ($section_background_color === 'grey') { ?>
                        section--grey
                    <?php } else { ?>
                        section--white
                    <?php } ?>

                    <?php if($padding_top === 'yes') { ?>
                        section--pt
                    <?php } ?>

                    <?php if($padding_bottom === 'yes') { ?>
                        section--pb
                    <?php } ?>

                    <?php if($margin_bottom === 'yes') { ?>
                        section--mb
                    <?php } ?>
                ">
                    <div class="container">
                        <div class="section__header">
                            <h2 class="section__title"><?php echo $title; ?></h2>
                        </div>

                        <?php if( have_rows('list') ): ?>
                            <ul class="ben-cards">
                                <?php while( have_rows('list') ): the_row(); 
                                    $title = get_sub_field('title');
                                    $text = get_sub_field('text');
                                    ?>
                                    <li class="ben-cards__item">
                                        <h3 class="ben-cards__title"><?php echo $title; ?></h3>
                                        <p class="ben-cards__text"><?php echo $text; ?></p>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                        <?php endif; ?>

                        <?php if( have_rows('stats') ): ?>
                            <ul class="stats-list">
                                <?php while( have_rows('stats') ): the_row(); 
                                    $value = get_sub_field('value');
                                    $text = get_sub_field('text');
                                    ?>
                                    <li class="stats-list__item">
                                        <h3 class="stats-list__value"><?php echo $value; ?></h3>
                                        <p class="stats-list__text"><?php echo $text; ?></p>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </section>

        <?php elseif (get_row_layout() == 'insights'):
            $title = get_sub_field('title');
            $section_background_color = get_sub_field('section_background_color');
            $padding_top = get_sub_field('padding_top');
            $padding_bottom = get_sub_field('padding_bottom');
            $margin_bottom = get_sub_field('margin_bottom');
            ?>

                <section class="section sllders-tabs
                    <?php if($section_background_color === 'blue') { ?>
                        section--blue
                    <?php } elseif ($section_background_color === 'grey') { ?>
                        section--grey
                    <?php } else { ?>
                        section--white
                    <?php } ?>

                    <?php if($padding_top === 'yes') { ?>
                        section--pt
                    <?php } ?>

                    <?php if($padding_bottom === 'yes') { ?>
                        section--pb
                    <?php } ?>

                    <?php if($margin_bottom === 'yes') { ?>
                        section--mb
                    <?php } ?>
                ">
                    <div class="container">
                        <div class="section__header">
                            <h2 class="section__title"><?php echo $title; ?></h2>
                        </div>

                        <div class="slider-nav">
                            <div class="slider-nav__items">
                                <div class="slider-nav__item active">News</div>
                                <div class="slider-nav__item">Customer Stories</div>
                            </div>

                            <div class="slider-nav__controls news-controls">
                                <div class="slider-nav__prev news-swiper__prev">
                                    <svg>
                                        <use xlink:href="<?php bloginfo('template_directory'); ?>/icons/symbol/svg/sprite.symbol.svg#icon-left" />
                                    </svg>
                                </div>
                                <div class="slider-nav__next news-swiper__next">
                                    <svg>
                                        <use xlink:href="<?php bloginfo('template_directory'); ?>/icons/symbol/svg/sprite.symbol.svg#icon-right" />
                                    </svg>
                                </div>
                            </div>

                            <div
                            class="slider-nav__controls custom-story-controls"
                            style="display: none"
                            >
                                <div class="slider-nav__prev custom-story-swiper__prev">
                                    <svg>
                                        <use xlink:href="<?php bloginfo('template_directory'); ?>/icons/symbol/svg/sprite.symbol.svg#icon-left" />
                                    </svg>
                                </div>
                                <div class="slider-nav__next custom-story-swiper__next">
                                    <svg>
                                        <use xlink:href="<?php bloginfo('template_directory'); ?>/icons/symbol/svg/sprite.symbol.svg#icon-right" />
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div class="swiper news-swiper">
                            <div class="swiper-wrapper">
                                <?php
                                $news_args = array(
                                    'post_type' => 'post',
                                    'posts_per_page' => 3
                                );
                                $news_query = new WP_Query($news_args);
                                $post_counter = 1;
                                while($news_query->have_posts()): $news_query->the_post();
                                    $permalink = get_permalink();
                                    $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                                ?>
                                <div class="swiper-slide">
                                    <div class="cm-story-card">
                                        <svg class="cm-story-card__shape-top">
                                            <use xlink:href="<?php bloginfo('template_directory'); ?>/icons/symbol/svg/sprite.symbol.svg#top-card-shape" />
                                        </svg>
                                        <svg class="cm-story-card__shape-bottom">
                                            <use xlink:href="<?php bloginfo('template_directory'); ?>/icons/symbol/svg/sprite.symbol.svg#top-card-shape" />
                                        </svg>
                                        <div class="cm-story-card__content">
                                            <h3 class="cm-story-card__title"><?php the_title(); ?></h3>
                                            <div class="cm-story-card__text"><?php the_excerpt(); ?></div>
                                            <a href="<?php echo $permalink; ?>" class="button">
                                                <span class="button__text">Read the new</span>
                                                <span class="button__arrow">
                                                <svg>
                                                    <use xlink:href="<?php bloginfo('template_directory'); ?>/icons/symbol/svg/sprite.symbol.svg#button-arrow-icon" />
                                                </svg>
                                                </span>
                                            </a>
                                        </div>
                                        <div class="cm-story-card__img">
                                            <img src="<?php echo $thumbnail_url; ?>" alt="<?php the_title(); ?>" />
                                        </div>
                                        <div class="cm-story-card__number">/0<?php echo $post_counter; ?></div>
                                    </div>
                                </div>
                                <?php $post_counter++; ?>
                                <?php endwhile; wp_reset_postdata(); ?>
                            </div>
                        </div>

                        <div class="swiper custom-story-swiper" style="display: none">
                            <div class="swiper-wrapper">
                                <?php
                                $case_studies_args = array(
                                    'post_type' => 'case-studies',
                                    'posts_per_page' => 3
                                );
                                $cast_counter = 1;
                                $case_studies_query = new WP_Query($case_studies_args);
                                while($case_studies_query->have_posts()): $case_studies_query->the_post();
                                    $permalink = get_permalink();
                                    $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                                ?>
                                <div class="swiper-slide">
                                    <div class="cm-story-card">
                                        <svg class="cm-story-card__shape-top">
                                            <use xlink:href="<?php bloginfo('template_directory'); ?>/icons/symbol/svg/sprite.symbol.svg#top-card-shape" />
                                        </svg>
                                        <svg class="cm-story-card__shape-bottom">
                                            <use xlink:href="<?php bloginfo('template_directory'); ?>/icons/symbol/svg/sprite.symbol.svg#top-card-shape" />
                                        </svg>
                                        <div class="cm-story-card__content">
                                            <h3 class="cm-story-card__title"><?php the_title(); ?></h3>
                                            <div class="cm-story-card__text"><?php the_excerpt(); ?></div>
                                            <a href="<?php echo $permalink; ?>" class="button">
                                                <span class="button__text">read the case study</span>
                                                <span class="button__arrow">
                                                <svg>
                                                    <use xlink:href="<?php bloginfo('template_directory'); ?>/icons/symbol/svg/sprite.symbol.svg#button-arrow-icon" />
                                                </svg>
                                                </span>
                                            </a>
                                        </div>
                                        <div class="cm-story-card__img">
                                            <img src="<?php echo $thumbnail_url; ?>" alt="<?php the_title(); ?>" />
                                        </div>
                                        <div class="cm-story-card__number">/0<?php echo $cast_counter; ?></div>
                                    </div>
                                </div>
                                <?php $cast_counter++; ?>
                                <?php endwhile; wp_reset_postdata(); ?>
                            </div>
                        </div>
                    </div>
                </section>

        <?php elseif (get_row_layout() == 'site_map'):
            $main_title = get_sub_field('title');
            $section_background_color = get_sub_field('section_background_color');
            $padding_top = get_sub_field('padding_top');
            $padding_bottom = get_sub_field('padding_bottom');
            $margin_bottom = get_sub_field('margin_bottom');
            ?>


                <section class="section section--blue section--pt section--pb">
                    <div class="container">
                        <div class="section__header">
                            <h2 class="section__title"><?php echo $main_title; ?></h2>
                        </div>

                        <div class="map">
                            <ul class="map__nav selected-index-0">
                                <?php $tab_counter = 1; ?>
                                <?php while( have_rows('tabs') ): the_row(); 
                                    $title = get_sub_field('title');
                                    $icon = get_sub_field('icon');
                                    ?>
                                        <li class="map__nav-item <?php if($tab_counter === 1) { ?>active<?php } ?>">
                                            <div class="map__nav-item-title"><?php echo $title; ?></div>
                                            <div class="map__nav-item-icon"><?php echo $icon; ?></div>
                                        </li>
                                    <?php $tab_counter++; ?>
                                <?php endwhile; ?>
                                
                            </ul>
                            <div class="map__content">
                                <?php $inner_counter = 1; ?>
                                <?php while( have_rows('tabs') ): the_row(); 
                                    $title = get_sub_field('title');
                                    $icon = get_sub_field('icon');
                                    ?>
                                        <div class="map-inner <?php if($inner_counter === 1) {?>active<?php } ?>">
                                            <?php while( have_rows('groups') ): the_row(); 
                                                $group_title = get_sub_field('group_title');
                                                $group_text = get_sub_field('group_text');
                                                $group_link = get_sub_field('group_link');
                                                ?>
                                                <div class="map-inner__item">
                                                    <div class="map-inner__icon">
                                                        <svg
                                                            width="96"
                                                            height="156"
                                                            viewBox="0 0 96 156"
                                                            fill="none"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                        >
                                                            <path
                                                            d="M95.8404 77.8886C95.8423 68.9029 93.3129 60.0982 88.5415 52.4812C83.7701 44.8642 76.9493 38.7425 68.8592 34.8162C60.7692 30.8899 51.7364 29.3174 42.7939 30.2787C33.8514 31.2399 25.3602 34.6961 18.2913 40.2519C11.2224 45.8077 5.86126 53.2388 2.82093 61.6955C-0.219389 70.1522 -0.816212 79.293 1.09885 88.0725C3.01392 96.8521 7.36348 104.916 13.6501 111.342C19.9368 117.768 27.9068 122.297 36.6486 124.41L38.1695 124.764C41.0031 125.722 46.5034 129.136 46.8368 141.125V156.004H48.9202V141.937C48.9202 129.031 54.9207 125.639 57.7542 124.744L59.0668 124.452C69.5425 121.949 78.8688 115.993 85.5406 107.545C92.2124 99.0969 95.8408 88.6495 95.8404 77.8886ZM47.9202 117.084C40.1608 117.084 32.5758 114.785 26.1241 110.478C19.6724 106.171 14.6439 100.05 11.6745 92.8878C8.7051 85.7259 7.92818 77.8451 9.44196 70.242C10.9557 62.639 14.6923 55.6551 20.179 50.1736C25.6657 44.692 32.6562 40.9591 40.2665 39.4467C47.8768 37.9344 55.765 38.7106 62.9337 41.6772C70.1024 44.6437 76.2296 49.6674 80.5404 56.113C84.8513 62.5586 87.1523 70.1365 87.1523 77.8886C87.1358 88.2786 82.997 98.2384 75.6432 105.585C68.2893 112.932 58.3201 117.067 47.9202 117.084Z"
                                                            fill="white"
                                                            />
                                                            <path
                                                            d="M0.00332642 78.1153C0.00149536 87.101 2.53089 95.9057 7.30228 103.523C12.0737 111.14 18.8944 117.261 26.9845 121.188C35.0746 125.114 44.1073 126.686 53.0498 125.725C61.9924 124.764 70.4836 121.308 77.5524 115.752C84.6213 110.196 89.9825 102.765 93.0228 94.3084C96.0631 85.8518 96.66 76.7109 94.7449 67.9314C92.8298 59.1518 88.4803 51.0879 82.1936 44.6618C75.907 38.2358 67.9369 33.707 59.1951 31.5934L57.6742 31.2396C54.8407 30.2821 49.3403 26.8684 49.007 14.8788L49.007 0H46.9235L46.9235 14.0671C46.9235 26.9725 40.9231 30.3653 38.0895 31.2604L36.7769 31.5518C26.3012 34.0549 16.975 40.011 10.3031 48.459C3.6313 56.907 0.00291443 67.3544 0.00332642 78.1153ZM47.9235 38.9204C55.6829 38.9204 63.268 41.2191 69.7197 45.5259C76.1713 49.8327 81.1999 55.9541 84.1693 63.1161C87.1386 70.278 87.9156 78.1588 86.4018 85.7619C84.888 93.365 81.1515 100.349 75.6648 105.83C70.1781 111.312 63.1875 115.045 55.5773 116.557C47.967 118.07 40.0788 117.293 32.9101 114.327C25.7413 111.36 19.6142 106.336 15.3033 99.8909C10.9924 93.4453 8.69144 85.8674 8.69144 78.1153C8.70797 67.7253 12.8467 57.7655 20.2006 50.4186C27.5545 43.0717 37.5236 38.9369 47.9235 38.9204Z"
                                                            fill="white"
                                                            />
                                                            <path
                                                            fill-rule="evenodd"
                                                            clip-rule="evenodd"
                                                            d="M47.8123 66.1912C47.9874 66.0682 48.1966 66.0027 48.4106 66.0039C48.6247 66.0051 48.8331 66.0729 49.0069 66.1978L52.6039 68.7817H57.3427C57.9119 68.7817 58.3739 69.2437 58.3739 69.813V74.8207L61.5774 78.7296C61.7283 78.9139 61.8108 79.1447 61.8108 79.383C61.8108 79.6212 61.7283 79.8521 61.5774 80.0364L58.3739 83.9452V88.953C58.3739 89.5222 57.9119 89.9842 57.3427 89.9842H52.6286L48.9928 92.5953C48.8185 92.7207 48.6093 92.7884 48.3946 92.7892C48.1798 92.7899 47.9702 92.7236 47.7949 92.5995L44.1031 89.9842H39.3577C38.7884 89.9842 38.3264 89.5222 38.3264 88.953V83.937L35.2244 80.0388C35.0791 79.8563 35 79.6299 35 79.3966C35 79.1633 35.0791 78.9369 35.2244 78.7543L38.3264 74.8562V69.827C38.3264 69.2577 38.7884 68.7957 39.3577 68.7957H44.1055L47.8123 66.1912ZM52.5469 70.8442C52.4035 70.8781 52.2545 70.8808 52.1099 70.8522C51.9653 70.8236 51.8285 70.7643 51.7087 70.6784L48.3988 68.3007L45.0246 70.671C44.8509 70.793 44.6437 70.8584 44.4314 70.8582H40.3889V75.2167C40.3889 75.4502 40.3097 75.6762 40.1645 75.8594L37.348 79.397L40.1645 82.9346C40.3097 83.1169 40.3889 83.3438 40.3889 83.5764V87.9217H44.4314C44.6451 87.9217 44.853 87.9877 45.0279 88.1115L48.3873 90.4916L51.6955 88.1156C51.8706 87.9898 52.0806 87.922 52.2961 87.9217H56.3114V83.5764C56.3114 83.338 56.3939 83.107 56.5449 82.923L59.4464 79.383L56.5449 75.8437C56.3938 75.6592 56.3112 75.428 56.3114 75.1895V70.8442H52.5469Z"
                                                            fill="white"
                                                            />
                                                            <path
                                                            fill-rule="evenodd"
                                                            clip-rule="evenodd"
                                                            d="M52.8341 76.1791C52.9299 76.2749 53.0059 76.3886 53.0577 76.5137C53.1096 76.6388 53.1363 76.7729 53.1363 76.9084C53.1363 77.0438 53.1096 77.178 53.0577 77.3031C53.0059 77.4282 52.9299 77.5419 52.8341 77.6377L47.8841 82.5877C47.7884 82.6835 47.6747 82.7595 47.5495 82.8113C47.4244 82.8632 47.2903 82.8898 47.1548 82.8898C47.0194 82.8898 46.8853 82.8632 46.7601 82.8113C46.635 82.7595 46.5213 82.6835 46.4255 82.5877L43.9505 80.1127C43.8548 80.0169 43.7788 79.9032 43.7269 79.7781C43.6751 79.653 43.6484 79.5188 43.6484 79.3834C43.6484 79.248 43.6751 79.1138 43.7269 78.9887C43.7788 78.8636 43.8548 78.7499 43.9505 78.6541C44.0463 78.5583 44.16 78.4824 44.2851 78.4305C44.4103 78.3787 44.5444 78.352 44.6798 78.352C44.8153 78.352 44.9494 78.3787 45.0745 78.4305C45.1997 78.4824 45.3134 78.5583 45.4091 78.6541L47.1548 80.3998L51.3755 76.1791C51.4713 76.0833 51.585 76.0073 51.7101 75.9555C51.8353 75.9036 51.9694 75.877 52.1048 75.877C52.2403 75.877 52.3744 75.9036 52.4995 75.9555C52.6247 76.0073 52.7384 76.0833 52.8341 76.1791Z"
                                                            fill="white"
                                                            />
                                                        </svg>
                                                    </div>
                                                    <div class="map-inner__block">
                                                        <div class="map-inner__title">
                                                            <?php echo $group_title; ?>
                                                        </div>
                                                        <div class="map-inner__text">
                                                            <?php echo $group_text; ?>
                                                        </div>
                                                        <a href="<?php echo $group_link; ?>" class="map-inner__link">
                                                            <svg>
                                                                <use xlink:href="<?php bloginfo('template_directory'); ?>/icons/symbol/svg/sprite.symbol.svg#button-arrow-icon" />
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            <?php endwhile; ?>
                                        </div>
                                    <?php $inner_counter++; ?>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    </div>
                </section>

        <?php elseif (get_row_layout() == 'announcements'):
            $title = get_sub_field('title');
            $section_background_color = get_sub_field('section_background_color');
            $padding_top = get_sub_field('padding_top');
            $padding_bottom = get_sub_field('padding_bottom');
            $margin_bottom = get_sub_field('margin_bottom');
            ?>

                <section class="section
                    <?php if($section_background_color === 'blue') { ?>
                        section--blue
                    <?php } elseif ($section_background_color === 'grey') { ?>
                        section--grey
                    <?php } else { ?>
                        section--white
                    <?php } ?>

                    <?php if($padding_top === 'yes') { ?>
                        section--pt
                    <?php } ?>

                    <?php if($padding_bottom === 'yes') { ?>
                        section--pb
                    <?php } ?>

                    <?php if($margin_bottom === 'yes') { ?>
                        section--mb
                    <?php } ?>
                ">
                    <div class="container">
                        <div class="section__header">
                            <h2 class="section__title"><?php echo $title; ?></h2>
                        </div>
                        
                        <div class="announcements">
                            <?php
                            $args = array(
                                'post_type' => 'announcements',
                                'posts_per_page' => 3,
                            );

                            $announcements_query = new WP_Query($args);

                            if ( $announcements_query->have_posts() ) :
                                while ( $announcements_query->have_posts() ) : $announcements_query->the_post();

                                    $announcement_tag = get_field('tag');
                                    $announcement_date = get_field('announcement_date');
                                    $announcement_text = get_field('announcement_text');
                                    $announcement_page_link = get_field('announcement_page_link');
                                    ?>
                                    <a href="<?php echo $announcement_page_link; ?>" class="announcements__item">
                                        <div class="announcements__item-tag"><?php echo $announcement_tag; ?></div>
                                        <div class="announcements__item-date"><?php echo $announcement_date; ?></div>
                                        <div class="announcements__item-text"><?php echo $announcement_text; ?></div>
                                        <div class="announcements__item-icon">
                                            <svg>
                                                <use xlink:href="<?php bloginfo('template_directory'); ?>/icons/symbol/svg/sprite.symbol.svg#button-arrow-icon" />
                                            </svg>
                                        </div>
                                        <svg class="announcements__item-shape">
                                            <use xlink:href="<?php bloginfo('template_directory'); ?>/icons/symbol/svg/sprite.symbol.svg#bottom-right-card-shape" />
                                        </svg>
                                    </a>
                                    <?php
                                endwhile;
                        
                                wp_reset_postdata();
                            endif;
                            ?>
                        </div>
                    </div>
                </section>

        <?php elseif (get_row_layout() == 'in_the_news'):
            $title = get_sub_field('title');
            $section_background_color = get_sub_field('section_background_color');
            $padding_top = get_sub_field('padding_top');
            $padding_bottom = get_sub_field('padding_bottom');
            $margin_bottom = get_sub_field('margin_bottom');
            ?>

                <section class="section
                    <?php if($section_background_color === 'blue') { ?>
                        section--blue
                    <?php } elseif ($section_background_color === 'grey') { ?>
                        section--grey
                    <?php } else { ?>
                        section--white
                    <?php } ?>

                    <?php if($padding_top === 'yes') { ?>
                        section--pt
                    <?php } ?>

                    <?php if($padding_bottom === 'yes') { ?>
                        section--pb
                    <?php } ?>

                    <?php if($margin_bottom === 'yes') { ?>
                        section--mb
                    <?php } ?>
                ">
                    <div class="container">
                        <div class="section__header">
                            <h2 class="section__title"><?php echo $title; ?></h2>
                        </div>

                        <div class="swiper in-news-swiper">
                            <div class="swiper-wrapper">
                                <?php
                                $args = array(
                                    'post_type' => 'news',
                                    'posts_per_page' => -1,
                                );

                                $news_query = new WP_Query($args);

                                if ( $news_query->have_posts() ) :
                                    while ( $news_query->have_posts() ) : $news_query->the_post();

                                        $link = get_field('page_link');
                                        ?>
                                        <div class="swiper-slide">
                                            <div class="in-news-swiper__item">
                                                <div class="in-news-swiper__item-logo">
                                                <?php if ( has_post_thumbnail() ) {
                                                        the_post_thumbnail('thumbnail-size', ['class' => 'your-custom-class', 'alt' => 'News Thumbnail']);
                                                    } ?>
                                                </div>
                                                <div class="in-news-swiper__item-text">
                                                    <?php the_title(); ?>
                                                </div>
                                                <a href="<?php echo $link; ?>" class="button button--inline">
                                                    <span class="button__text">read more</span>
                                                    <span class="button__arrow">
                                                        <svg>
                                                        <use xlink:href="<?php bloginfo('template_directory'); ?>/icons/symbol/svg/sprite.symbol.svg#button-arrow-icon" />
                                                        </svg>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                        <?php
                                    endwhile;
                            
                                    wp_reset_postdata();
                                endif;
                                ?>
                            </div>
                            <div class="in-news-swiper__controls">
                                <div class="in-news-swiper__prev-button">
                                    <svg class="in-news-swiper__prev-icon">
                                        <use xlink:href="<?php bloginfo('template_directory'); ?>/icons/symbol/svg/sprite.symbol.svg#swiper-arrow-left" />
                                    </svg>
                                </div>
                                <div class="in-news-swiper__next-button">
                                    <svg class="in-news-swiper__prev-icon">
                                        <use xlink:href="<?php bloginfo('template_directory'); ?>/icons/symbol/svg/sprite.symbol.svg#swiper-arrow-right" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

        <?php elseif (get_row_layout() == 'contact_form'):
            $title = get_sub_field('title');
            $section_background_color = get_sub_field('section_background_color');
            $padding_top = get_sub_field('padding_top');
            $padding_bottom = get_sub_field('padding_bottom');
            $margin_bottom = get_sub_field('margin_bottom');
            ?>

                <section
                    id="contacts"
                    class="section contacts-section
                        <?php if($section_background_color === 'blue') { ?>
                            section--blue
                        <?php } elseif ($section_background_color === 'grey') { ?>
                            section--grey
                        <?php } else { ?>
                            section--white
                        <?php } ?>

                        <?php if($padding_top === 'yes') { ?>
                            section--pt
                        <?php } ?>

                        <?php if($padding_bottom === 'yes') { ?>
                            section--pb
                        <?php } ?>

                        <?php if($margin_bottom === 'yes') { ?>
                            section--mb
                        <?php } ?>
                    "
                    >
                        <div class="container">
                            <div class="section__header">
                                <h2 class="section__title"><?php echo $title; ?></h2>
                            </div>
                            <div class="contacts-form">
                                <?php echo do_shortcode(get_sub_field('shortcode')); ?>
                            </div>
                        </div>
                </section>

        <?php elseif (get_row_layout() == 'webinars'):
            $title = get_sub_field('title');
            $section_background_color = get_sub_field('section_background_color');
            $padding_top = get_sub_field('padding_top');
            $padding_bottom = get_sub_field('padding_bottom');
            $margin_bottom = get_sub_field('margin_bottom');


            $uncategorized = get_category_by_slug('uncategorized');

            $event_categories = get_terms(array(
                'taxonomy' => 'category',
                'hide_empty' => true,
                'exclude' => ($uncategorized) ? array($uncategorized->term_id) : array(),
            ));
        ?>

            <section class="section
                <?php if($section_background_color === 'blue') { ?>
                    section--blue
                <?php } elseif ($section_background_color === 'grey') { ?>
                    section--grey
                <?php } else { ?>
                    section--white
                <?php } ?>

                <?php if($padding_top === 'yes') { ?>
                    section--pt
                <?php } ?>

                <?php if($padding_bottom === 'yes') { ?>
                    section--pb
                <?php } ?>

                <?php if($margin_bottom === 'yes') { ?>
                    section--mb
                <?php } ?>
            ">
                <div class="container">
                    <div class="section__header">
                        <h2 class="section__title"><?php echo $title; ?></h2>
                    </div>
                    
                    <?php if (!empty($event_categories)) : ?>
                        <ul class="event-categories">
                            <?php foreach ($event_categories as $index => $category) : ?>
                                <li>
                                    <a href="#" class="event-category<?php if ($index === 0) echo ' active'; ?>" data-slug="<?php echo esc_attr($category->slug); ?>">
                                        <?php echo esc_html($category->name); ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                    <div class="events-list"></div>

                    <div class="events-pagination"></div>
                </div>
            </section>

            <script>
                jQuery(document).ready(function($) {
                var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
                
                function loadEvents(categorySlug, pageNumber) {
                    $.ajax({
                        url: ajaxurl,
                        type: 'POST',
                        data: {
                            action: 'load_events_by_category',
                            category_slug: categorySlug,
                            page: pageNumber,
                            nonce: '<?php echo wp_create_nonce('load_events_nonce'); ?>'
                        },
                        success: function(response) {
                            $('.events-list').html(response.events);
                            $('.events-pagination').html(response.pagination);
                        },
                        error: function() {
                            alert('Error loading events.');
                        }
                    });
                }

                $('.event-category').on('click', function(e) {
                    e.preventDefault();
                    $('.event-category').removeClass('active');
                    $(this).addClass('active');
                    var categorySlug = $(this).data('slug');
                    loadEvents(categorySlug, 1);
                });

                // Delegate click event for dynamically loaded pagination links
                $('.events-pagination').on('click', 'a.page-numbers', function(e) {
                    e.preventDefault();
                    
                    // Check if the clicked element has a page number
                    var page = $(this).attr('href').match(/paged=(\d+)/);
                    page = page ? page[1] : false;
                    
                    // If it's a next or prev button, find the current active page and increment or decrement
                    if (!page) {
                        var currentPage = parseInt($('.events-pagination .current').text(), 10);
                        if ($(this).hasClass('prev')) {
                            page = currentPage - 1;
                        } else if ($(this).hasClass('next')) {
                            page = currentPage + 1;
                        }
                    }
                    
                    if(page) {
                        var categorySlug = $('.event-categories .active').data('slug');
                        loadEvents(categorySlug, page);
                    }
                });
                
                $('.event-categories .event-category').first().trigger('click');
            });
            </script>

        <?php elseif (get_row_layout() == 'slider_cards_with_check_icons'):
            $title = get_sub_field('title');
            $section_background_color = get_sub_field('section_background_color');
            $padding_top = get_sub_field('padding_top');
            $padding_bottom = get_sub_field('padding_bottom');
            $margin_bottom = get_sub_field('margin_bottom');
            ?>

                <section class="section
                    <?php if($section_background_color === 'blue') { ?>
                        section--blue
                    <?php } elseif ($section_background_color === 'grey') { ?>
                        section--grey
                    <?php } else { ?>
                        section--white
                    <?php } ?>

                    <?php if($padding_top === 'yes') { ?>
                        section--pt
                    <?php } ?>

                    <?php if($padding_bottom === 'yes') { ?>
                        section--pb
                    <?php } ?>

                    <?php if($margin_bottom === 'yes') { ?>
                        section--mb
                    <?php } ?>
                ">
                    <div class="container">
                        <div class="section__header">
                            <h2 class="section__title"><?php echo $title; ?></h2>
                        </div>

                        <div class="swiper cards-swiper">
                            <div class="swiper-wrapper">
                                <?php while( have_rows('slider') ): the_row(); 
                                    $title = get_sub_field('title');
                                    ?>
                                    <div class="swiper-slide">
                                        <div class="cards-swiper__item">
                                            <div class="cards-swiper__item-title">
                                                <?php echo $title; ?>
                                            </div>
                                            <ul class="cards-swiper__item-list">
                                                <?php while( have_rows('list') ): the_row(); 
                                                    $text = get_sub_field('text');
                                                    ?>
                                                    <li><?php echo $text; ?></li>
                                                <?php endwhile; ?>
                                            </ul>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                            <div class="cards-swiper__controls">
                                <div class="cards-swiper__prev-button">
                                    <svg>
                                        <use xlink:href="<?php bloginfo('template_directory'); ?>/icons/symbol/svg/sprite.symbol.svg#swiper-arrow-left" />
                                    </svg>
                                </div>
                                <div class="cards-swiper__next-button">
                                    <svg>
                                        <use xlink:href="<?php bloginfo('template_directory'); ?>/icons/symbol/svg/sprite.symbol.svg#swiper-arrow-right" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            
        <?php elseif (get_row_layout() == 'blockquote'):
            $text = get_sub_field('text');
            $section_background_color = get_sub_field('section_background_color');
            $padding_top = get_sub_field('padding_top');
            $padding_bottom = get_sub_field('padding_bottom');
            $margin_bottom = get_sub_field('margin_bottom');
            ?>

                <section class="section
                    <?php if($section_background_color === 'blue') { ?>
                        section--blue
                    <?php } elseif ($section_background_color === 'grey') { ?>
                        section--grey
                    <?php } else { ?>
                        section--white
                    <?php } ?>

                    <?php if($padding_top === 'yes') { ?>
                        section--pt
                    <?php } ?>

                    <?php if($padding_bottom === 'yes') { ?>
                        section--pb
                    <?php } ?>

                    <?php if($margin_bottom === 'yes') { ?>
                        section--mb
                    <?php } ?>
                ">
                    <div class="container">
                        <div class="blockquote">
                            <div class="blockquote__icon">
                                <svg>
                                    <use xlink:href="<?php bloginfo('template_directory'); ?>/icons/symbol/svg/sprite.symbol.svg#qoute" />
                                </svg>
                            </div>
                            <div class="blockquote__text">
                                <?php echo $text; ?>
                            </div>
                        </div>
                    </div>
                </section>

        <?php elseif (get_row_layout() == 'offices_slider'):
            $section_background_color = get_sub_field('section_background_color');
            $padding_top = get_sub_field('padding_top');
            $padding_bottom = get_sub_field('padding_bottom');
            $margin_bottom = get_sub_field('margin_bottom');
            ?>

                <section class="section
                    <?php if($section_background_color === 'blue') { ?>
                        section--blue
                    <?php } elseif ($section_background_color === 'grey') { ?>
                        section--grey
                    <?php } else { ?>
                        section--white
                    <?php } ?>

                    <?php if($padding_top === 'yes') { ?>
                        section--pt
                    <?php } ?>

                    <?php if($padding_bottom === 'yes') { ?>
                        section--pb
                    <?php } ?>

                    <?php if($margin_bottom === 'yes') { ?>
                        section--mb
                    <?php } ?>
                ">
                    <div class="container">
                        <div class="swiper offices-swiper">
                            <div class="swiper-wrapper">
                                <?php while( have_rows('slider') ): the_row(); 
                                    $image = get_sub_field('image');
                                    $title = get_sub_field('title');
                                    $subtitle = get_sub_field('subtitle');
                                    $text = get_sub_field('text');
                                    ?>
                                        <div class="swiper-slide">
                                            <div class="offices-swiper__item">
                                                <div class="offices-swiper__item-img">
                                                    <img src="<?php echo $image; ?>" alt="<?php echo $title; ?>" />
                                                </div>
                                                <div class="offices-swiper__item-header">
                                                    <div class="offices-swiper__item-title"><?php echo $title; ?></div>
                                                    <div class="offices-swiper__item-subtitle"><?php echo $subtitle; ?></div>
                                                </div>

                                                <div class="offices-swiper__item-text"><?php echo $text; ?></div>
                                            </div>
                                        </div>
                                <?php endwhile; ?>
                            </div>
                            <div class="offices-swiper__controls">
                                <div class="offices-swiper__prev-button">
                                    <svg>
                                        <use xlink:href="<?php bloginfo('template_directory'); ?>/icons/symbol/svg/sprite.symbol.svg#swiper-arrow-left" />
                                    </svg>
                                </div>
                                <div class="offices-swiper__next-button">
                                    <svg>
                                        <use xlink:href="<?php bloginfo('template_directory'); ?>/icons/symbol/svg/sprite.symbol.svg#swiper-arrow-right" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

        <?php elseif (get_row_layout() == 'form_section'):
            $title = get_sub_field('title');
            $text = get_sub_field('text');
            $shortcode = get_sub_field('shortcode');
            $section_background_color = get_sub_field('section_background_color');
            $padding_top = get_sub_field('padding_top');
            $padding_bottom = get_sub_field('padding_bottom');
            $margin_bottom = get_sub_field('margin_bottom');
            ?>

                <section class="section section--grey section--pt section--pb">
                    <div class="container">
                        <div class="section__header">
                            <h2 class="section__title"><?php echo $title; ?></h2>
                        </div>
                        <div class="text mb-5">
                            <?php echo $text; ?>
                        </div>
                        <div class="form form--static">
                            <?php echo do_shortcode(get_sub_field('shortcode')); ?>
                        </div>
                    </div>
                </section>

        <?php elseif (get_row_layout() == 'customer_story_overview'):
            $title = get_sub_field('title');
            $text = get_sub_field('text');
            ?>

                <section class="section csi-section">
                    <div class="csi-section__top">
                        <div class="container">
                            <div class="section__header">
                                <h2 class="section__title">
                                    <?php echo $title; ?>
                                </h2>
                            </div>
                            <div class="text mb-5">
                               <p><?php echo $text; ?></p>
                            </div>
                            <?php if( have_rows('button') ): ?>
                                <?php while( have_rows('button') ): the_row(); 
                                    $button_text = get_sub_field('button_text');
                                    $button_link = get_sub_field('button_link');
                                    $button_anchor = get_sub_field('button_anchor');
                                    if( $button_text || $button_link || $button_anchor ): ?>
                                        <div class="d-flex justiy-content-center">
                                            <a href="<?php if($button_link) echo $button_link; else echo $button_anchor; ?>" class="button button--inline">
                                                <span class="button__text"><?php echo $button_text; ?></span>
                                                <span class="button__arrow">
                                                    <svg>
                                                    <use xlink:href="<?php bloginfo('template_directory'); ?>/icons/symbol/svg/sprite.symbol.svg#button-arrow-icon" />
                                                    </svg>
                                                </span>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="csi-section__bottom">
                        <div class="container">
                            <div class="cs-section">
                                <div class="cs-section__info">
                                    <?php while( have_rows('info_list') ): the_row(); 
                                        $title = get_sub_field('title');
                                        $text = get_sub_field('text');
                                        ?>
                                        <div class="cs-section__info-item">
                                            <div class="cs-section__info-item-title"><?php echo $title; ?></div>
                                            <div class="cs-section__info-item-text"><?php echo $text; ?></div>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                                <div class="cs-section__blocks">
                                    <?php while( have_rows('blocks') ): the_row(); 
                                        $icon = get_sub_field('icon');
                                        $title = get_sub_field('title');
                                        $text = get_sub_field('text');
                                        ?>
                                        <div class="cs-section__block">
                                            <div class="cs-section__block-title">
                                                <div class="cs-section__block-icon">
                                                    <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>" width="<?php echo $icon['width']; ?>" height="<?php echo $icon['height']; ?>" />
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
                    </div>
                </section>

        <?php elseif (get_row_layout() == 'tabs_section'):
            ?>

            <section class="section section--pt section--pb section--blue">
            <div class="container">
                <div class="tabs mb-5">
                    <?php if( have_rows('tabs') ): ?>
                        <ul class="tabs__nav">
                            <?php $cntr = 1; ?>
                            <?php while( have_rows('tabs') ): the_row(); 
                                $tab_name = get_sub_field('tab_name');
                                ?>
                                <li class="tabs__nav-item <?php if($cntr === 1) {?> active <?php }?>"><?php echo $tab_name; ?></li>
                                <?php $cntr++; ?>
                            <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>
                
                <div class="tabs__contents">
                    <?php if( have_rows('tabs') ): ?>
                    
                        <?php $counter = 1; ?>
                        <?php while( have_rows('tabs') ): the_row(); 
                            ?>
                            <div class="tabs__content <?php if($counter === 1) {?> active <?php }?>">
                                <ul class="tabs__cards">
                                    <?php while( have_rows('cards') ): the_row(); 
                                        $card_title = get_sub_field('card_title');
                                        $card_text = get_sub_field('card_text');
                                        $card_link = get_sub_field('card_link');
                                        ?>
                                        <li class="tabs__card ">
                                            <svg class="tabs__card-shape">
                                                <use xlink:href="<?php bloginfo('template_directory'); ?>/icons/symbol/svg/sprite.symbol.svg#top-card-shape" />
                                            </svg>
                                            <a href="<?php echo $card_link; ?>" class="tabs__card-link">
                                                <h3 class="tabs__card-title"><?php echo $card_title; ?></h3>
                                                <div class="tabs__card-text">
                                                    <?php echo $card_text; ?>
                                                </div>
                                            </a>
                                        </li>
                                    <?php endwhile; ?>
                                </ul>
                            </div>
                            <?php $counter++; ?>
                        <?php endwhile; ?>
                        
                    <?php endif; ?>
                </div>
                </div>
                <?php if( have_rows('button') ): ?>
                    <?php while( have_rows('button') ): the_row(); 
                        $button_text = get_sub_field('button_text');
                        $button_link = get_sub_field('button_link');
                        $button_anchor = get_sub_field('button_anchor');
                        if( $button_text || $button_link || $button_anchor ): ?>
                            <div class="d-flex justiy-content-center">
                                <a href="<?php if($button_link) echo $button_link; else echo $button_anchor; ?>" class="button button--inline">
                                    <span class="button__text"><?php echo $button_text; ?></span>
                                    <span class="button__arrow">
                                        <svg>
                                        <use xlink:href="<?php bloginfo('template_directory'); ?>/icons/symbol/svg/sprite.symbol.svg#button-arrow-icon" />
                                        </svg>
                                    </span>
                                </a>
                            </div>
                        <?php endif; ?>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
            </section>

        <?php elseif (get_row_layout() == 'benefits_cards_variant_2'):
            $title = get_sub_field('title');
            ?>

            <section class="section
                <?php if($section_background_color === 'blue') { ?>
                    section--blue
                <?php } elseif ($section_background_color === 'grey') { ?>
                    section--grey
                <?php } else { ?>
                    section--white
                <?php } ?>

                <?php if($padding_top === 'yes') { ?>
                    section--pt
                <?php } ?>

                <?php if($padding_bottom === 'yes') { ?>
                    section--pb
                <?php } ?>

                <?php if($margin_bottom === 'yes') { ?>
                    section--mb
                <?php } ?>
            ">
                <div class="container">
                    <div class="section__header">
                        <h2 class="section__title"><?php echo $title; ?></h2>
                    </div>
                    <ul class="ben-list">
                        <?php while( have_rows('cards') ): the_row(); 
                            $icon = get_sub_field('icon');
                            $label = get_sub_field('label');
                            $title = get_sub_field('title');
                            $text = get_sub_field('text');
                            ?>
                            <li class="ben-list__item">
                                <svg class="ben-list__shape">
                                    <use xlink:href="<?php bloginfo('template_directory'); ?>/icons/symbol/svg/sprite.symbol.svg#top-card-shape" />
                                </svg>
                                <div class="ben-list__icon">
                                    <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>" width="<?php echo $icon['width']; ?>" height="<?php echo $icon['height']; ?>"/>
                                </div>
                                <div class="ben-list__label"><?php echo $label; ?></div>
                                <h3 class="ben-list__title"><?php echo $title; ?></h3>
                                <p class="ben-list__text"><?php echo $text; ?></p>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                </div>
            </section>

        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>

<?php
get_footer();