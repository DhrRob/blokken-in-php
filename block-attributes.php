<?php
/**
 * Set up all the block attributes such as color, alignment et cetera.
 *
 * @package    WP040 Demo
 * @author     Rob Migchels <rob@migchels.me>
 * @license    GPL-2.0+
 * @see        https://developer.wordpress.org/block-editor/reference-guides/block-api/block-supports/
 */

/**
 * Create class attribute allowing for custom "class_name" and "style".
 */
$class_name = 'block-' . strtolower( $block_name );
$style_name = '';

/**
 * Support custom "anchor" values.
 *
 * Anchors let you link directly to a specific block on a page. This property adds a field to define an id for the block and a button to copy the direct link.
 * Important: It doesn’t work with dynamic blocks yet.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-supports/#anchor
 */
if ( ! empty( $block['anchor'] ) ) {
	$anchor = 'id=' . esc_attr( $block['anchor'] ) . '';
} else {
	$anchor = '';
}

/**
 * Custom class name
 *
 * By default, the class .block-your-block-name is added to the root element of your saved markup.
 * This helps having a consistent mechanism for styling blocks that themes and plugins can rely on.
 * If, for whatever reason, a class is not desired on the markup, this functionality can be disabled.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-supports/#classname
 */
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}

/**
 * Alignment
 *
 * This property adds block controls which allow to change block’s alignment.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-supports/#align
 */
if ( ! empty( $block['align'] ) ) {
	$class_name .= ' align' . $block['align'];
}
if ( ! empty( $block['align_content'] ) ) {
	$class_name .= ' is-vertically-aligned-' . $block['align_content'];
}
if ( ! empty( $block['align_text'] ) ) {
	$class_name .= ' has-text-align-' . $block['align_text'];
}

/**
 * Block Height
 *
 * Checks if the minHeight property is set, if so use that. Otherwise we check if the block is set to full_height.
 */
if ( ! empty( $block['style']['dimensions']['minHeight'] ) ) {
	$style_name .= ' min-height:' . $block['style']['dimensions']['minHeight'] . ';';
} elseif ( ! empty( $block['full_height'] ) ) {
	$style_name .= ' min-height:100vh;';
}

/**
 * Font size
 *
 * This value signals that a block supports the font-size CSS style property.
 * When it does, the block editor will show an UI control for the user to set its value.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-supports/#typography-fontsize
 */
if ( ! empty( $block['fontSize'] ) ) {
	$class_name .= ' has-' . $block['fontSize'] . '-font-size';
} elseif ( ! empty( $block['style']['typography']['fontSize'] ) ) {
	$style_name .= ' font-size:' . $block['style']['typography']['fontSize'] . ';';
}

/**
 * Text color
 *
 * This property adds block controls which allow the user to set text color in a block.
 * Text color presets are sourced from the editor-color-palette theme support.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-supports/#color-text
 */
if ( ! empty( $block['textColor'] ) ) {
	$class_name .= ' has-' . $block['textColor'] . '-color';
} elseif ( ! empty( $block['style']['color']['text'] ) ) {
	$class_name .= ' has-text-color';
	$style_name .= ' color:' . $block['style']['color']['text'] . ';';
}

/**
 * Background color
 *
 * This property adds UI controls which allow the user to apply a gradient background to a block.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-supports/#color-gradients
 */
if ( ! empty( $block['gradient'] ) ) {
	$class_name .= ' has-' . $block['gradient'] . '-gradient-background';
} elseif ( ! empty( $block['style']['color']['gradient'] ) ) {
	$class_name .= ' has-background-color';
	$style_name .= ' background:' . $block['style']['color']['gradient'] . ';';
}

/**
 * Gradient background color
 *
 * This property adds UI controls which allow the user to apply a solid background color to a block.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-supports/#color-background
 */
if ( ! empty( $block['backgroundColor'] ) ) {
	$class_name .= ' has-' . $block['backgroundColor'] . '-background-color';
} elseif ( ! empty( $block['style']['color']['background'] ) ) {
	$class_name .= ' has-background-color';
	$style_name .= ' background:' . $block['style']['color']['background'] . ';';
}

/**
 * Padding and margin
 *
 * This value signals that a block supports some of the CSS style properties related to spacing.
 * When it does, the block editor will show UI controls for the user to set their values, if the theme declares support.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-supports/#spacing
 */
// Margin.
if ( ! empty( $block['style']['spacing']['margin'] ) ) {
	$im     = $block['style']['spacing']['margin'];
	$margin = null;
	foreach ( $im as $key => $value ) {
		$margin .= 'margin-' . $key . ':' . $value . ';';
	}
	$style_name .= $margin;
} else {
	$margin = null;
}

// Padding.
if ( ! empty( $block['style']['spacing']['padding'] ) ) {
	$ip      = $block['style']['spacing']['padding'];
	$padding = null;
	foreach ( $ip as $key => $value ) {
		$padding .= 'padding-' . $key . ':' . $value . ';';
	}
	$style_name .= $padding;
} else {
	$padding = null;
}
