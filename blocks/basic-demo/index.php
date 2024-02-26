<?php
/**
 * Basic Demo Block.
 *
 * @package    WP040 Basic Demo
 * @subpackage twentytwentyfour/blocks
 * @author Rob Migchels <rob@migchels.me>
 * @license    GPL-2.0+
 */

 /**
 * Load the block attributes and set the unique block name.
 */
$block_name = 'basic-demo';
require get_stylesheet_directory() . '/block-attributes.php';

// Load ACF values and assign defaults.
$block_text = get_field( 'text' ) ?? 'Voer hier tekst in.';

?>

<div <?php echo esc_attr( $anchor ); ?> class="<?php echo esc_attr( $class_name ); ?>" style="<?php echo esc_attr( $style_name ); ?>">
	<div class="inner-<?php echo esc_html( $block_name ); ?>" style="<?php echo esc_attr( $padding ); ?>">

		<?php echo esc_html( $block_text ); ?>

	</div>
</div>
