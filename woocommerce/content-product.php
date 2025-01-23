<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.4.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Check if the product is a valid WooCommerce product and ensure its visibility before proceeding.
if ( ! is_a( $product, WC_Product::class ) || ! $product->is_visible() ) {
    return;
}
?>

<li <?php wc_product_class( '', $product ); ?>>
    <?php
    /**
     * Hook: woocommerce_before_shop_loop_item.
     *
     * @hooked woocommerce_template_loop_product_link_open - 10
     */
    do_action( 'woocommerce_before_shop_loop_item' );
    ?>

    <div class="product-image-wrapper">
        <?php
        /**
         * Hook: woocommerce_before_shop_loop_item_title.
         *
         * @hooked woocommerce_show_product_loop_sale_flash - 10
         * @hooked woocommerce_template_loop_product_thumbnail - 10
         */
        do_action( 'woocommerce_before_shop_loop_item_title' );

        // Obtener la imagen secundaria de la galería
        $gallery_image_ids = $product->get_gallery_image_ids();
        if ( ! empty( $gallery_image_ids ) ) {
            $secondary_image_id = $gallery_image_ids[0];

            // Obtener URL y atributos optimizados para tamaños de WooCommerce
            $secondary_image_src = wp_get_attachment_image_url( $secondary_image_id, 'woocommerce_thumbnail' );
            $secondary_image_srcset = wp_get_attachment_image_srcset( $secondary_image_id, 'woocommerce_thumbnail' );
            $secondary_image_sizes = wp_get_attachment_image_sizes( $secondary_image_id, 'woocommerce_thumbnail' );
            $secondary_image_alt = get_post_meta( $secondary_image_id, '_wp_attachment_image_alt', true );

            // Imprimir la imagen secundaria con estructura HTML mejorada
            echo '<div class="secondary-image-wrapper">';
            echo '<img src="' . esc_url( $secondary_image_src ) . '" 
                     srcset="' . esc_attr( $secondary_image_srcset ) . '" 
                     sizes="' . esc_attr( $secondary_image_sizes ) . '" 
                     alt="' . esc_attr( $secondary_image_alt ) . '" 
                     class="second-image" 
                     loading="lazy">';
            echo '</div>';
        }
        ?>
    </div>

    <?php
    /**
     * Hook: woocommerce_shop_loop_item_title.
     *
     * @hooked woocommerce_template_loop_product_title - 10
     */
    do_action( 'woocommerce_shop_loop_item_title' );

    /**
     * Hook: woocommerce_after_shop_loop_item_title.
     *
     * @hooked woocommerce_template_loop_rating - 5
     * @hooked woocommerce_template_loop_price - 10
     */
    do_action( 'woocommerce_after_shop_loop_item_title' );

    /**
     * Hook: woocommerce_after_shop_loop_item.
     *
     * @hooked woocommerce_template_loop_product_link_close - 5
     * @hooked woocommerce_template_loop_add_to_cart - 10
     */
    do_action( 'woocommerce_after_shop_loop_item' );
    ?>
</li>
