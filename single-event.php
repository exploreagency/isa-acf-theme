<?php
get_header('simple');
?>

  <?php if( have_rows('event_sections') ): ?>
      <?php while( have_rows('event_sections') ): the_row(); ?>
          <?php if( get_row_layout() == 'hero_section' ): 
            $title = get_sub_field('title');
            $background_desktop = get_sub_field('background_desktop');
            $background_mobile  = get_sub_field('background_mobile');
            ?>
            
            <section class="hero-section mb-5">
              <div class="container-fluid">
                <div class="hero-section__inner">
                  <picture class="hero-section__img">
                    <source
                      media="(min-width: 768px)"
                      srcset="<?php echo $background_desktop['url']; ?>"
                    />
                    <img src="<?php echo $background_mobile['url'] ?>" alt="<?php echo $background_mobile['alt'] ?>" />
                  </picture>
                  <h1 class="hero-section__title">
                    <?php the_title(); ?>
                  </h1>
                </div>
              </div>
            </section>

          <?php elseif( get_row_layout() == 'program_section' ): 
              ?>

                <section class="section section--pt section--pb">
                  <div class="container">
                    <?php if( have_rows('list') ): ?>
                      <ul class="program-list mb-5">
                        <?php while( have_rows('list') ): the_row(); 
                            $title = get_sub_field('title');
                            $icon = get_sub_field('icon');
                            ?>
                              <li class="program-list__item program">
                                <div class="program__header">
                                  <img src="<?php echo $icon['url'] ?>" alt="<?php echo $icon['alt'] ?>" width="<?php echo $icon['width'] ?>" height="<?php echo $icon['height'] ?>">
                                  <?php echo $title; ?>
                                </div>
                                <ul class="program__list">
                                  <?php while( have_rows('sublist') ): the_row(); 
                                      $title = get_sub_field('title');
                                      $text = get_sub_field('text');
                                      ?>
                                      <li class="program__list-item">
                                        <div class="program__list-item-title">
                                          <svg class="program__list-item-icon">
                                            <use xlink:href="<?php bloginfo('template_directory'); ?>/icons/symbol/svg/sprite.symbol.svg#check-icon" />
                                          </svg>
                                          <?php echo $title; ?>
                                        </div>
                                        <div class="program__list-item-text">
                                          <?php echo $text; ?>
                                        </div>
                                      </li>
                                  <?php endwhile; ?>
                                </ul>
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
                </section>
                      
          <?php elseif( get_row_layout() == 'text_section' ): 
            $title = get_sub_field('title');
            $text = get_sub_field('text');
            $image = get_sub_field('image');
            ?>

              <section class="section section--pt section--pb section--grey">
                <div class="container">
                  <div class="section__header">
                    <h2 class="section__title"><?php echo $title; ?></h2>
                  </div>
                  <div class="text mb-5">
                    <?php echo $text; ?>
                  </div>
                  <img src="<?php echo $image; ?>" alt="<?php echo $title; ?>" />
                </div>
              </section>

          <?php elseif( get_row_layout() == 'form' ): 
              $title = get_sub_field('title');
              $shortcode = get_sub_field('shortcode');
              ?>

                <section class="section section--pt section--pb section--blue">
                  <div class="container">
                    <div class="section__header">
                      <h2 class="section__title"><?php echo $title; ?></h2>
                    </div>

                    <?php echo do_shortcode($shortcode); ?>

                  </div>
                </section>

          <?php elseif( get_row_layout() == 'speakers' ): 
              $title = get_sub_field('title');
              ?>

                <section class="section section--pt section--pb">
                  <div class="container">
                    <div class="section__header">
                      <h2 class="section__title">Speakers</h2>
                    </div>

                    <?php if( have_rows('list') ): ?>
                      <ul class="speakers-list">
                        <?php while( have_rows('list') ): the_row(); 
                            $image = get_sub_field('image');
                            $name = get_sub_field('name');
                            $position = get_sub_field('position');
                            $logo = get_sub_field('logo');
                            ?>
                            <li class="speakers-list__item">
                              <div class="speaker-card">
                                <div class="speaker-card__img">
                                  <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" width="<?php echo $image['width']; ?>" height="<?php echo $image['height']; ?>" />
                                </div>
                                <div class="speaker-card__content">
                                  <div class="speark-card__inner">
                                    <div class="speaker-card__name"><?php echo $name; ?></div>
                                    <div class="speaker-card__position"><?php echo $position; ?></div>
                                  </div>
                                  <div class="speaker-card__logo">
                                    <img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" width="<?php echo $logo['width']; ?>" height="<?php echo $logo['height']; ?>" />
                                  </div>
                                </div>
                              </div>
                            </li>
                        <?php endwhile; ?>
                      </ul>
                    <?php endif; ?>
                  </div>
                </section>

          <?php endif; ?>
      <?php endwhile; ?>
  <?php endif; ?>

<?php
get_footer();