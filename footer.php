        

    </main>


    <footer class="footer">
        <div class="container">
            <div class="footer__inner">
                <svg class="footer__shape">
                    <use xlink:href="<?php bloginfo('template_directory'); ?>/icons/symbol/svg/sprite.symbol.svg#footer-shape" />
                </svg>
                <div class="footer__top">
                    <a href="<?php echo esc_url(home_url()); ?>" class="footer__logo">
                        <img src="<?php bloginfo('template_directory'); ?>/img/logo-footer.svg" alt="Logo" />
                    </a>
                    <div class="footer__row">
                        <div class="footer__group switch active">
                            <div class="footer__group-title">
                                Overview
                                <svg class="footer__group-icon">
                                    <use xlink:href="<?php bloginfo('template_directory'); ?>/icons/symbol/svg/sprite.symbol.svg#chevron-right" />
                                </svg>
                            </div>
                            <?php
                                if ( has_nav_menu( 'overview_menu' ) ) {
                                    wp_nav_menu( array( 
                                        'theme_location' => 'overview_menu',
                                        'menu_class' => 'footer__group-list',
                                    ) );
                                }
                            ?>
                        </div>
                        <div class="footer__group switch">
                            <div class="footer__group-title">
                                Solutions
                                <svg class="footer__group-icon">
                                    <use xlink:href="<?php bloginfo('template_directory'); ?>/icons/symbol/svg/sprite.symbol.svg#chevron-right" />
                                </svg>
                            </div>
                            <?php
                                if ( has_nav_menu( 'solution_menu' ) ) {
                                    wp_nav_menu( array( 
                                        'theme_location' => 'solution_menu',
                                        'menu_class' => 'footer__group-list',
                                    ) );
                                }
                            ?>
                    </div>
                    <div class="footer__group active">
                        <div class="footer__group-title">Contact Details</div>
                            <ul class="footer__group-list">
                                <li><a href="tel:+18775916711">+1 877 591 6711</a></li>
                                <li>
                                    <a href="mailto:info@isacybersecurity.com"
                                    >info@isacybersecurity.com</a
                                    >
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="footer__middle">
                    <ul class="socials">
                    <li>
                        <a href="" target="_blank" rel=”noopener noreferrer”>
                            <img src="<?php bloginfo('template_directory'); ?>/img/x-icon.svg" alt="Twitter" />
                        </a>
                    </li>
                    <li>
                        <a href="" target="_blank" rel=”noopener noreferrer”>
                            <img src="<?php bloginfo('template_directory'); ?>/img/fb-icon.svg" alt="Facebook" />
                        </a>
                    </li>
                    <li>
                        <a href="" target="_blank" rel=”noopener noreferrer”>
                            <img src="<?php bloginfo('template_directory'); ?>/img/in-icon.svg" alt="Linkedin" />
                        </a>
                    </li>
                    <li>
                        <a href="" target="_blank" rel=”noopener noreferrer”>
                            <img src="<?php bloginfo('template_directory'); ?>/img/yb-icon.svg" alt="YouTube" />
                        </a>
                    </li>
                    </ul>

                    <div class="subscribe-form">
                        <input
                            type="email"
                            required
                            placeholder="Email"
                            class="subscribe-form__input"
                        />
                        <button class="button subscribe-form__button">
                            <span class="button__text">Subscribe</span>
                            <span class="button__arrow">
                                <svg>
                                    <use xlink:href="<?php bloginfo('template_directory'); ?>/icons/symbol/svg/sprite.symbol.svg#button-arrow-icon" />
                                </svg>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="footer__bottom">
                    <div class="footer__copyright">
                        <p>© 2022 ISA Cybersecurity.</p>
                        <p>All Rights Reserved.</p>
                        <p>Developed by Explore Agency™.</p>
                    </div>
                    <?php
                        if ( has_nav_menu( 'footer_menu' ) ) {
                            wp_nav_menu( array( 
                                'theme_location' => 'footer_menu',
                                'menu_class' => 'footer__subnav',
                            ) );
                        }
                    ?>
                </div>
            </div>
        </div>
    </footer>

</div>

<a href="tel:18775916711" class="fixed-button">
    <div class="fixed-button__title">
        Breached? <br />
        CALL US NOW
        <svg class="fixed-button__icon">
            <use xlink:href="<?php bloginfo('template_directory'); ?>/icons/symbol/svg/sprite.symbol.svg#warning-icon" />
        </svg>
    </div>
    <div class="fixed-button__number">1-877-591-6711 , Option 4</div>
</a>

<script src="<?php bloginfo('template_directory'); ?>/js/main.min.js?_v=20231008160721"></script>

<?php wp_footer(); ?>

</body>

</html>