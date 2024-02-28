<?php
get_header('news');
 /*Template name: News Page*/
?>

    <section class="news-section news-section--page">
        <div class="bg"></div>
        <div class="container">
            <h2 class="news-section__title h2"><?php the_title(); ?></h2>
            <ul class="news-section__list">
            <?php
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => -1
                );

                $news_query = new WP_Query($args);

                if ($news_query->have_posts()) :
                    while ($news_query->have_posts()) : $news_query->the_post();
                ?>

                <li class="news-section__item">
                    <a href="<?php the_permalink(); ?>" class="news-section__item-link">
                        <?php if (has_post_thumbnail()) { ?>
                            <div class="news-section__item-img">
                                <?php the_post_thumbnail('thumbnail'); ?>
                            </div>
                        <?php } ?>
                        <div class="news-section__item-content">
                            <p class="news-section__item-title">
                                <?php the_title(); ?>
                            </p>
                            <div class="news-section__item-date">
                                <?php the_time('d.m.Y'); ?>
                                <svg width="30" height="27" viewBox="0 0 30 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2.18557e-06 13.5L28 13.5M28 13.5L15.1368 26M28 13.5L15.1368 0.999997" stroke="white" stroke-width="2"/>
                                </svg>
                            </div>
                        </div>
                    </a>
                </li>

                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    // Если нет новостей
                    echo 'Posts not found';
                endif;
                ?>
            </ul>

        </div>
    </section>

<?php
get_footer();