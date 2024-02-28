<a href="<?php the_permalink(); ?>" class="blog-card">
    <div class="blog-card__img">
        <div class="blog-card__date"><?php echo get_the_date('d.m.y'); ?></div>
        <?php if (has_post_thumbnail()): ?>
            <?php the_post_thumbnail('large', array('class' => 'blog-card__image', 'alt' => get_the_title())); ?>
        <?php else: ?>
            <img src="<?php echo get_template_directory_uri(); ?>/img/event-content-img.png" alt="" />
        <?php endif; ?>
    </div>
    <div class="blog-card__category">
        <?php 
            $content_types = get_the_terms(get_the_ID(), 'content_type');
            if (!empty($content_types) && !is_wp_error($content_types)) {
                // Выводим название первого типа контента
                echo esc_html($content_types[0]->name);
            }
        ?>
    </div>
    <div class="blog-card__title">
        <?php the_title(); ?>
    </div>
    <svg class="blog-card__shape">
        <use xlink:href="<?php echo get_template_directory_uri(); ?>/icons/symbol/svg/sprite.symbol.svg#top-card-shape"></use>
    </svg>
    <div class="blog-card__icon">
        <svg>
            <use xlink:href="<?php echo get_template_directory_uri(); ?>/icons/symbol/svg/sprite.symbol.svg#button-arrow-icon"></use>
        </svg>
    </div>
</a>
