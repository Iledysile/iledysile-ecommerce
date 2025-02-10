<?php
// Agregar menú square personalizado
function iledysile_add_square_menu() {
    ?>
    <div id="iledysile-square-menu-overlay" class="iledysile-menu-overlay"></div>
    <div id="iledysile-square-menu" class="iledysile-square-menu">
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
    <button class="iledysile-square-menu-button">
    </button>
    <?php
}
add_action('storefront_before_site', 'iledysile_add_square_menu');
