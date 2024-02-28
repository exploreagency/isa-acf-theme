<?php

?>

<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        <?php wp_title() ?>
    </title>

    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/styles/main.min.css?_v=20231016180744" />

    <?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>
    <div class="wrapper">
        <header class="header">
            <div class="container-fluid">
                <a href="<?php echo esc_url(home_url()); ?>" class="header__logo" aria-label="Homepage">
                    <svg class="header__logo-img">
                        <use
                            xlink:href="<?php bloginfo('template_directory'); ?>/icons/symbol/svg/sprite.symbol.svg#logo" />
                    </svg>
                </a>

                <?php if( have_rows('menu', 'main_settings') ): ?>
                    <ul class="header__nav">
                        <?php 
                        $is_first_item = true; 
                        while( have_rows('menu', 'main_settings') ): the_row(); 
                            $link = get_sub_field('link');
                            $has_children = have_rows('submenu');
                            ?>
                            <li class="<?php 
                                if($is_first_item) {
                                    echo 'has-submenu ';
                                    $is_first_item = false;
                                }
                                if($has_children) echo 'has-children';
                                ?>">
                                <?php 
                                    if( $link ): 
                                        $link_url = $link['url'];
                                        $link_title = $link['title'];
                                    ?>
                                    <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                                <?php endif; ?>
                                <?php if( $has_children ): ?>
                                    <ul class="sub-menu">
                                        <?php while( have_rows('submenu') ): the_row(); ?>
                                            <li>
                                                <?php 
                                                    $link = get_sub_field('submenu_link');
                                                    if( $link ): 
                                                        $link_url = $link['url'];
                                                        $link_title = $link['title'];
                                                    ?>
                                                    <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                                                <?php endif; ?>
                                            </li>
                                        <?php endwhile; ?>
                                    </ul>
                                <?php endif; ?>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                <?php endif; ?>
               
                <div class="header__search search-bar">
                    <input type="text" id="live-search-field" class="search-bar__input" placeholder="Search" />
                    <button class="search-bar__button" aria-label="search">
                        <svg>
                            <use
                                xlink:href="<?php bloginfo('template_directory'); ?>/icons/symbol/svg/sprite.symbol.svg#search-icon" />
                        </svg>
                    </button>
                    <div id="live-search-results" class="search-bar__dropdown"></div>
                </div>
                <div class="header__menu-button">
                    <svg class="header__menu-icon">
                        <use xlink:href="<?php bloginfo('template_directory'); ?>/icons/symbol/svg/sprite.symbol.svg#burger-icon" />
                    </svg>
                    <svg class="header__menu-icon">
                        <use xlink:href="<?php bloginfo('template_directory'); ?>/icons/symbol/svg/sprite.symbol.svg#close-icon" />
                    </svg>
                </div>
            </div>
        </header>

        <div class="menu">
            <?php if( have_rows('menu', 'main_settings') ): ?>
                <ul class="menu__nav">
                    <?php 
                    $is_first_item = true; 
                    while( have_rows('menu', 'main_settings') ): the_row(); 
                        $link = get_sub_field('link');
                        $has_children = have_rows('submenu');
                        ?>
                        <li class="<?php 
                            if($is_first_item) {
                                echo 'has-submenu ';
                                $is_first_item = false;
                            }
                            if($has_children) echo 'has-children';
                            ?>">
                            <?php 
                                if( $link ): 
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                ?>
                                <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                            <?php endif; ?>
                            <?php if( $has_children ): ?>
                                <ul class="sub-menu">
                                    <?php while( have_rows('submenu') ): the_row(); ?>
                                        <li>
                                            <?php 
                                                $link = get_sub_field('submenu_link');
                                                if( $link ): 
                                                    $link_url = $link['url'];
                                                    $link_title = $link['title'];
                                                ?>
                                                <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                                            <?php endif; ?>
                                        </li>
                                    <?php endwhile; ?>
                                </ul>
                            <?php endif; ?>
                        </li>
                    <?php endwhile; ?>
                </ul>
            <?php endif; ?>
        </div>

      <div class="mega-menu">
        <div class="mega-menu__header">
          <div class="mega-menu__title">Solutions & Services</div>
          <a href="tel:1-877-591-6711" class="button button--inline">
            <span class="button__text"
              >Breached? CALL NOW AT 1-877-591-6711 , Option 4
            </span>
            <span class="button__arrow">
              <svg>
                <use xlink:href="<?php bloginfo('template_directory'); ?>/icons/symbol/svg/sprite.symbol.svg#warning-icon-2" />
              </svg>
            </span>
          </a>
        </div>
        <div class="mega-menu__body">
            <?php if( have_rows('mega_menu', 'main_settings') ): ?>
                
                    <?php 
                    $is_first_item = true; 
                    while( have_rows('mega_menu', 'main_settings') ): the_row(); 
                       
                        ?>

                            <?php while( have_rows('group') ): the_row(); 
                                $link = get_sub_field('main_link');
                                $has_children = have_rows('submenu');
                            ?>
                                <div class="mega-menu__group">
                                    <?php 
                                        if( $link ): 
                                            $link_url = $link['url'];
                                            $link_title = $link['title'];
                                        ?>
                                        <a class="mega-menu__group-title" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                                    <?php endif; ?>

                                    <ul class="mega-menu__group-list">
                                        <?php while( have_rows('list') ): the_row(); ?>
                                            <li>
                                                <?php 
                                                    $link = get_sub_field('link');
                                                    if( $link ): 
                                                        $link_url = $link['url'];
                                                        $link_title = $link['title'];
                                                    ?>
                                                    <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                                                <?php endif; ?>
                                            </li>
                                        <?php endwhile; ?>
                                    </ul>

                                </div>
                            <?php endwhile; ?>
                    
                    <?php endwhile; ?>
               
            <?php endif; ?>
        </div>
      </div>

        <main>