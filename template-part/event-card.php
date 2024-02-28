<article id="post-<?php the_ID(); ?>" <?php post_class('event-card'); ?>>
    <a href="<?php the_permalink(); ?>" class="event-card__link">
        <div class="event-card__image">
            <?php the_post_thumbnail('event-card'); ?>
            <ul class="event-card__tags">
                <?php
                $termsTag = get_the_terms(get_the_ID(), 'post_tag');
                if ($termsTag && !is_wp_error($termsTag)) : 
                    foreach ($termsTag as $term) :
                        if ($term->name !== 'Uncategorized') :
                            echo '<li>' . esc_html($term->name) . '</li>';
                        endif;
                    endforeach;
                endif;
                ?>
            </ul>
        </div>
        <div class="event-card__content">
            <div class="event-card__category">
                <?php
                $termsCat = get_the_terms(get_the_ID(), 'category');
                if ($termsCat && !is_wp_error($termsCat)) :
                    $main_term = array_shift($termsCat); 
                    if ($main_term->name !== 'Uncategorized') : 
                        echo esc_html($main_term->name);
                    endif;
                endif;
                ?>
            </div>
            <h3 class="event-card__title">
                <?php the_title(); ?>
            </h3>
            <div class="event-card__date<?php if(empty(get_field('event_date'))) echo ' empty'; ?>">
                <?php 
                $event_date = get_field('event_date');
                echo esc_html($event_date ? $event_date : 'On-demand'); 
                ?>
            </div>
            <div class="event-card__icon">
                <svg>
                    <use xlink:href="<?php bloginfo('template_directory'); ?>/icons/symbol/svg/sprite.symbol.svg#button-arrow-icon" />
                </svg>
            </div>
            <svg class="event-card__shape">
                <use xlink:href="<?php bloginfo('template_directory'); ?>/icons/symbol/svg/sprite.symbol.svg#bottom-right-card-shape" />
            </svg>
        </div>
    </a>
</article>