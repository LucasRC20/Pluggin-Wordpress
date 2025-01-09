# WooCommerce Color Attributes Grid for Elementor

Este plugin permite mostrar los atributos de colores de WooCommerce en un loop grid de Elementor Pro, utilizando un shortcode. Es compatible con Variation Swatches for WooCommerce y muestra los colores en forma de círculos. Además, incluye una funcionalidad para mostrar el nombre del color al pasar el cursor sobre cada círculo.

## Características
- Muestra los atributos de colores definidos en WooCommerce.
- Compatible con Variation Swatches for WooCommerce.
- Los colores se muestran en círculos que no son clickeables.
- Tooltip con el nombre del color al pasar el cursor.
- Fácil implementación mediante un shortcode.

## Requisitos
- WordPress.
- WooCommerce.
- Elementor Pro.
- Variation Swatches for WooCommerce (opcional, pero recomendado para configurar los colores).

## Instalación
1. Sube los archivos del plugin a la carpeta `wp-content/plugins` de tu sitio WordPress.
2. Activa el plugin desde el menú de plugins en el administrador de WordPress.
3. Asegúrate de que los productos tengan colores configurados como un atributo en WooCommerce.

## Uso
### Shortcode
Usa el shortcode `[color_attributes_grid]` para mostrar los colores. Puedes colocarlo en:
- Un widget de texto.
- Un bloque de shortcode de Elementor o Gutenberg.
- Cualquier parte del contenido del producto.

### Ejemplo de Uso en Elementor
1. Abre una página o plantilla en Elementor.
2. Arrastra el widget **Shortcode** al lugar donde deseas mostrar los colores.
3. Escribe `[color_attributes_grid]` en el campo de shortcode.
4. Guarda los cambios y visualiza la página.

## Configuración de Colores
Para asegurarte de que los colores se muestren correctamente:
1. Ve a WooCommerce > Atributos.
2. Edita el atributo de color (`pa_color`).
3. Asigna un valor hexadecimal a cada término de color en la configuración de Variation Swatches for WooCommerce.

## Personalización
El plugin incluye estilos predeterminados, pero puedes personalizarlos agregando CSS adicional a tu tema o plantilla.

### Clases CSS Incluidas
- `.wcae-color-grid`: Contenedor del grid de colores.
- `.wcae-color`: Cada círculo de color.
- `.wcae-tooltip`: Tooltip con el nombre del color.

## Capturas de Pantalla
![Captura de pantalla 2025-01-09 142717](https://github.com/user-attachments/assets/14f0ec0b-5a74-4b26-84a9-3c340d806631)

## Licencia
Este plugin está bajo la licencia [GPL v2 o superior](https://www.gnu.org/licenses/gpl-2.0.html).

