<?php
/**
 * Plugin Name: WooCommerce Color Attributes Grid for Elementor
 * Description: Muestra los atributos de color de WooCommerce en un loop grid de Elementor Pro, compatible con Variation Swatches for WooCommerce.
 * Version: 1.5
 * Author: Tu Nombre
 */

// Evita el acceso directo.
if (!defined('ABSPATH')) {
    exit;
}

// Registra un shortcode para mostrar los colores.
function wcae_display_color_attributes($atts) {
    // Asegúrate de que WooCommerce esté activo.
    if (!class_exists('WooCommerce')) {
        return '<p>WooCommerce no está activo.</p>';
    }

    // Obtener atributos del producto en un loop de Elementor.
    global $product;
    if (!$product || !is_a($product, 'WC_Product')) {
        return '';
    }

    // Asegúrate de que el producto tenga atributos.
    $attributes = $product->get_attributes();
    if (empty($attributes) || !isset($attributes['pa_color'])) {
        return '<p>Este producto no tiene colores configurados.</p>';
    }

    // Obtener los términos del atributo "pa_color".
    $terms = wc_get_product_terms(
        $product->get_id(),
        'pa_color',
        array('fields' => 'all')
    );

    if (empty($terms)) {
        return '<p>No hay colores disponibles para este producto.</p>';
    }

    // Generar HTML para los colores.
    $html = '<div class="wcae-color-grid">';
    foreach ($terms as $term) {
        // Obtener el color desde los metadatos de Variation Swatches.
        $color = get_term_meta($term->term_id, 'cfvsw_color', true);
        if (!$color) {
            $color = '#ccc'; // Usa un color por defecto si no hay configurado.
        }

        // Agrega un bloque de color con tooltip.
        $html .= sprintf(
            '<span class="wcae-color" style="background-color: %s;" title="%s"></span>',
            esc_attr($color),
            esc_html($term->name) // Usamos el nombre del color como tooltip.
        );
    }
    $html .= '</div>';

    return $html;
}
add_shortcode('color_attributes_grid', 'wcae_display_color_attributes');

// Añadir estilos personalizados.
function wcae_enqueue_styles() {
    echo '<style>
        .wcae-color-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        .wcae-color {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            border: 1px solid #ccc;
            position: relative;
        }
        .wcae-color:hover::after {
            content: attr(title); /* Muestra el nombre del color. */
            position: absolute;
            top: 40px;
            left: 50%;
            transform: translateX(-50%);
            background: #000;
            color: #fff;
            padding: 5px 10px;
            border-radius: 5px;
            white-space: nowrap;
            font-size: 12px;
            z-index: 10;
            opacity: 1;
            transition: opacity 0.3s;
        }
        .wcae-color:hover::before {
            content: "";
            position: absolute;
            top: 35px;
            left: 50%;
            transform: translateX(-50%);
            border: 5px solid transparent;
            border-top-color: #000;
            z-index: 10;
        }
    </style>';
}
add_action('wp_head', 'wcae_enqueue_styles');
