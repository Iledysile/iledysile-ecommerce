<?php
// Añadir meta description dinámico
function custom_meta_tags() {
    if ( is_front_page() ) {
        echo '<meta name="description" content="Handgemachte, hochwertige Lingerie für Frauen, hergestellt in der Schweiz. Île d&#39;Ysile steht für einzigartige, bequeme, lokal produzierte Lingerie ohne Bügel. Kostenloser Versand schweizweit." />' . "\n";
        echo '<meta name="keywords" content="Lingerie, handgemacht, Schweiz, hochwertige Materialien, lokal produziert, bequem, nachhaltig" />' . "\n";
        echo '<meta name="author" content="Île d&#39;Ysile" />' . "\n";
    } elseif ( is_shop() ) {
        echo '<meta name="description" content="Handgemachte Lingerie aus der Schweiz - Echt. Fein. Frei. Für Frauen, die ihre Einzigartigkeit und innere Stimmigkeit leben. Nachhaltig und lokal produziert." />' . "\n";
        echo '<meta name="keywords" content="Lingerie Shop, handgemachte Lingerie, Schweiz, nachhaltige Mode, lokal, feminin" />' . "\n";
        echo '<meta name="author" content="Île d&#39;Ysile" />' . "\n";
    } elseif ( is_product() ) {
        global $post;
        $excerpt = get_the_excerpt( $post->ID );
        $excerpt = strip_tags( $excerpt );
        $excerpt = esc_attr( $excerpt );
        echo '<meta name="description" content="' . $excerpt . '" />' . "\n";
    }
}
add_action( 'wp_head', 'custom_meta_tags' );