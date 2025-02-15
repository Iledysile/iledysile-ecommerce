<?php

// Agregar iledysile-square-menu personalizado
function iledysile_add_square_menu() {
    ?>
    <div id="iledysile-square-menu-overlay" class="iledysile-menu-overlay"></div>
    
    <div id="iledysile-square-menu" class="iledysile-square-menu">
        <div class="iledysile-square-menu-top">
            <div class="iledysile-square-menu-top-left">
                <div class="iledysile-square-menu-logo">
                    <span class="iledysile-logo">Île d'Ysile</span>
                </div>
                <nav class="iledysile-square-menu-items">                    
                    <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'iledysile-mobile-menu',
                                'menu_class'     => 'iledysile-menu',
                                'container'      => false,
                            )
                        );
                    ?>
                </nav>   
            </div>
            <div class="iledysile-square-menu-top-right"></div>
        </div>
        <div class="iledysile-square-menu-bottom">
            <div class="iledysile-square-menu-bottom-left"></div>
            <div class="iledysile-square-menu-bottom-right"></div>
        </div>
    </div>
    <button class="iledysile-square-menu-button">
    </button>
    <?php
}

add_action('storefront_before_site', 'iledysile_add_square_menu');
