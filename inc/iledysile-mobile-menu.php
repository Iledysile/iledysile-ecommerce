<?php
// Agregar menú móvil personalizado
function iledysile_add_mobile_menu() {
    ?>
    <div id="iledysile-mobile-menu-overlay" class="iledysile-menu-overlay"></div>
    <div id="iledysile-mobile-menu" class="iledysile-mobile-menu">
        <nav class="iledysile-mobile-menu-items">
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
    <button class="meatball">
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
    </button>
    <?php
}
add_action('storefront_before_site', 'iledysile_add_mobile_menu');
