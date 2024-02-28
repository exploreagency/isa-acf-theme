<?php
get_header();
$background_image_desktop = get_field('background_image_desktop');
$background_image_mobile = get_field('background_image_mobile');
$author_name = get_field('author_name');
$author_position = get_field('author_position');
$author_avatar = get_field('author_avatar');
?>

  <section class="hero-section mb-5">
    <div class="container-fluid">
      <div class="hero-section__inner">
        <picture class="hero-section__img">
          <source
            media="(min-width: 768px)"
            srcset="<?php echo $background_image_desktop['url']; ?>"
          />
          <img src="<?php echo $background_image_mobile['url']; ?>" alt="<?php echo $background_image_mobile['alt']; ?>" />
        </picture>
      </div>
    </div>
  </section>

  <section class="post-header section section--pt section--pb">
    <div class="container">
      <div class="post-header__date"><?php echo get_the_date('F j, Y'); ?></div>
      <div class="section__header">
        <h2 class="section__title">
          <?php the_title(); ?>
        </h2>
      </div>

      <div class="post-header__speaker">
        <div class="speaker-card">
          <div class="speaker-card__img">
            <img src="<?php echo $author_avatar['url']; ?>" alt="<?php echo $author_avatar['alt']; ?>" width="<?php echo $author_avatar['width']; ?>" height="<?php echo $author_avatar['height']; ?>"/>
          </div>
          <div class="speaker-card__content">
            <div class="speark-card__inner">
              <div class="speaker-card__name"><?php echo $author_name; ?></div>
              <div class="speaker-card__position"><?php echo $author_position; ?></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section
    class="section section--grey section--pt section--pb article-section"
  >
    <div class="container">
      <div class="article-section__row">
        <div class="article-section__col">
          <div class="article-section__body">
            <?php the_content(); ?>
          </div>
        </div>
        <div class="article-section__col">
          <div class="article-section__block">
            <div class="article-section__block-title">NEWSLETTER</div>
            <div class="article-section__block-subtitle">
              Get exclusively curated cyber insights and news in your
              inbox
            </div>
            <a href="#contacts" class="button">
              <span class="button__text">Subscribe</span>
              <span class="button__arrow">
                <svg>
                  <use xlink:href="<?php bloginfo('template_directory'); ?>/icons/symbol/svg/sprite.symbol.svg#button-arrow-icon" />
                </svg>
              </span>
            </a>
          </div>
        </div>
      </div>

      <div class="share-block">
        <div class="share-block__title">Share</div>
        <ul class="share-block__list">
          <li>
            <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>" target="_blank" rel=”noopener noreferrer”>
              <img src="<?php bloginfo('template_directory'); ?>/img/x-icon.svg" alt="Share on Twitter" />
            </a>
          </li>
          <li>
            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" target="_blank" rel=”noopener noreferrer”>
              <img src="<?php bloginfo('template_directory'); ?>/img/fb-icon.svg" alt="Share on Facebook" />
            </a>
          </li>
          <li>
            <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo urlencode(get_permalink()); ?>" target="_blank" rel=”noopener noreferrer”>
              <img src="<?php bloginfo('template_directory'); ?>/img/in-icon.svg" alt="Share on LinkedIn" />
            </a>
          </li>
        </ul>
      </div>

    </div>
  </section>

  

  <section class="section section--pt section--pb related-section">
    <div class="container">
        <div class="section__header">
            <h2 class="section__title">Related Posts</h2>
        </div>
        <ul class="related-stories">
            <?php
            $current_post_id = get_the_ID(); // Get current post ID
            $args = array(
                'post_type'      => 'post',
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

  <section class="section section--pt section--pb section--blue" id="contacts">
    <div class="container">
        <div class="section__header">
            <h2 class="section__title">Contact Us Today</h2>
        </div>
        <div class="contacts-form">
            <?php echo do_shortcode('[contact-form-7 id="78dd356" title="CTA Contact Form"]'); ?>
        </div>
    </div>
  </section>

<?php
get_footer();