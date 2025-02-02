<?php
function iledysile_hero_home() {
    if (is_front_page()) {
        ?>
        <section class="hero">
            <h1 class="hero__title">
                <span class="hero__title-text">
                    Île d'Ysile
                </span>
                <span class="hero__title-bg hero__title-bg--front" aria-hidden="true">
                    Île d'Ysile
                </span>
                <span class="hero__title-bg hero__title-bg--back" aria-hidden="true">
                    Île d'Ysile
                </span>
            </h1>
        </section>
        <?php
    }
}
add_action('storefront_before_content', 'iledysile_hero_home');
