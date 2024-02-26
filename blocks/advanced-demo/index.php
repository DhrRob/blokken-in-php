<?php
/**
 * Advanced Demo Block.
 *
 * @package    WP040 Advanced Demo
 * @subpackage twentytwentyfour/blocks
 * @author     Rob Migchels <rob@migchels.me>
 * @license    GPL-2.0+
 */

/**
 * Load the block attributes and set the unique block name.
 */
$block_name = 'advanced-demo-block';
require get_stylesheet_directory() . '/block-attributes.php';

/**
 * Load ACF values and assign defaults.
 */
$quote       = get_field( 'quote' ) ?? 'Jouw quote hier..';
$author      = get_field( 'author' );
$author_role = get_field( 'role' );
$image       = get_field( 'image' );

if ( $author ) {
	$quote_attribution = '';
    $quote_attribution .= '<footer class="testimonial__attribution">';
    $quote_attribution .= '<cite class="testimonial__author">' . $author . '</cite>';

    if ( $author_role ) {
        $quote_attribution .= '<span class="testimonial__role">' . $author_role . '</span>';
    }

    $quote_attribution .= '</footer><!-- .testimonial__attribution -->';
}
?>

<div <?php echo wp_kses_data( get_block_wrapper_attributes( array( 'class' => $block_name )) ); ?>>

	<div class="testimonial__col">
        <blockquote class="testimonial__blockquote">
            <?php echo esc_html( $quote ); ?>

            <?php if ( !empty( $quote_attribution ) ) : ?>
                <?php echo wp_kses_post( $quote_attribution ); ?>
            <?php endif; ?>
        </blockquote>
    </div>

    <?php if ( $image ) : ?>
        <div class="testimonial__col">
            <figure class="testimonial__image">
                <?php echo wp_get_attachment_image( $image['ID'], 'full', '', array( 'class' => 'testimonial__img' ) ); ?>
            </figure>
        </div>
    <?php endif; ?>

    </div>
