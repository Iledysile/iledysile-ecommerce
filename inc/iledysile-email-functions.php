<?php

// Funcion que Cambia el remitente de los emails de pedidos a orders@iledysile.ch
add_filter( 'woocommerce_email_from_address', function( $from_email, $email ) {
    $order_emails = [
        'customer_processing_order',
        'customer_completed_order',
        'customer_on_hold_order',
        'customer_refunded_order',
        'customer_invoice',
        'customer_note',
        'new_order'
    ];

    if ( isset( $email->id ) && in_array( $email->id, $order_emails ) ) {
        return 'orders@iledysile.ch';
    }

    // Para el resto, dejar el que haya configurado WP Mail SMTP o WooCommerce
    return $from_email;
}, 10, 2);

// Cambia el nombre del remitente de los emails de pedidos a "ÎLE D'YSILE"
add_filter( 'woocommerce_email_from_name', function( $from_name, $email ) {
    $order_emails = [
        'customer_processing_order',
        'customer_completed_order',
        'customer_on_hold_order',
        'customer_refunded_order',
        'customer_invoice',
        'customer_note',
        'new_order'
    ];

    if ( isset( $email->id ) && in_array( $email->id, $order_emails ) ) {
        return 'ÎLE D\'YSILE';
    }

    return $from_name;
}, 10, 2);

// Añade un Reply-To a los emails de pedidos
add_filter( 'woocommerce_email_headers', function( $headers, $email_id, $order ) {
    $order_emails = [
        'customer_processing_order',
        'customer_completed_order',
        'customer_on_hold_order',
        'customer_refunded_order',
        'customer_invoice',
        'customer_note',
        'new_order'
    ];

    if ( in_array( $email_id, $order_emails ) ) {
        $headers = preg_replace( '/^Reply-To:.*$/mi', '', $headers );
        $headers .= "Reply-To: ÎLE D'YSILE <orders@iledysile.ch>\r\n";
    }

    return $headers;
}, 10, 3);
