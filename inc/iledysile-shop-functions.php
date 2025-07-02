<?php
// Add custom SEO text to the shop page
add_action('woocommerce_after_main_content', 'custom_shop_seo_text', 5);
function custom_shop_seo_text() {
    if ( is_shop() && ! is_product() ) {
    ?>
    <section class="iledysile-shop-seo-text">
        <h1>Handgemachte Lingerie aus der Schweiz - Echt. Fein. Frei.</h1>
        <h2>Für Frauen, die ihre Einzigartigkeit und innere Stimmigkeit leben</h2>
        <p>Île d'Ysile verbindet hochwertigste Materialien mit kunstvollem Design - jedes Stück entsteht in lokaler Handarbeit, vom ersten Entwurf bis zur letzten Naht.</p>
        <p>Unsere Kundinnen sind selbstbewusst, unabhängig und kreativ. Sie tragen Kleidung, um ihre Persönlichkeit sichtbar zu machen und sich selbst treu zu bleiben. Für sie ist Mode Ausdruck von Freiheit, Selbstentfaltung und Lebensfreude.</p>
        <p>Mit Île d'Ysile wählst du bewussten Konsum: nachhaltig, ehrlich und mit Respekt für Mensch und Umwelt gefertigt. Unsere Lingerie fühlt sich gut an auf der Haut und schenkt dir ein Gefühl von innerer Harmonie und Sinnlichkeit.</p>
        <p>Willkommen bei Île d'Ysile - handgemachte Lingerie aus der Schweiz, die Qualität und Werte verbindet.</p>
    </section>
    <?php
    }
}
