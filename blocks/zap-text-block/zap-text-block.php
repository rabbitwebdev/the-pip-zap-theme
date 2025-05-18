<?php
/**
 * Zap Text Block template.
 *
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.

$rabbit_image             = get_field( 'rabbit_image' );
$background_color  = get_field( 'background_color' ); // ACF's color picker.
$text_color        = get_field( 'text_color' ); // ACF's color picker.
$block_content = get_field('block_content');
$content_align = get_field('content_align');
$sticky_image = get_field('sticky_image');
$button_link = get_field('button_link');
$button_style = get_field('button_style');
$block_image = get_field('block_image');
$wp_object_image = get_field('wp_object_image');

if($content_align == 'center') {
    $content_align = 'is-vertical is-layout-flex is-content-justification-center';
} elseif ($content_align == 'top') {
    $content_align = 'is-not-vertical is-content-justification-top';
} else {
     $content_align = 'is-not-';
}

// Support custom "anchor" values.
$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'zap-text-block';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}
if ( $background_color || $text_color ) {
    $class_name .= ' has-custom-acf-color';
}

// Build a valid style attribute for background and text colors.
$styles = array( 'background-color: ' . $background_color, 'color: ' . $text_color );
$style  = implode( '; ', $styles );
$is_preview = isset($is_preview) ? $is_preview : false;
?>

<?php if (!$is_preview) { ?>
    <div <?php echo wp_kses_data(get_block_wrapper_attributes()); ?>>
<?php } ?>

<div <?php echo esc_attr( $anchor ); ?>class="<?php echo esc_attr( $class_name ); ?>  wp-block-group alignfull " style="<?php echo esc_attr( $style ); ?>">
  <div class="container">
    <div class="row <?php echo $content_align ; ?>">
        <div class="col-md-6">
            <div class="txt-wrp">
                <?php echo $block_content ; ?>    
                <?php if ($button_link) : ?>
                    <a href="<?php echo esc_url($button_link['url']); ?>" class="btn <?php echo $button_style ; ?>" target="<?php echo esc_attr($button_link['target']); ?>"><?php echo esc_html($button_link['title']); ?></a>
                <?php endif; ?>
            </div>
        </div>
         <?php if ( $block_image ) : ?>
            <div class="col">
                <figure class="wp-block-image size-full <?php if ($sticky_image) { echo 'is-sticky'; } ?>" style="margin-bottom:0px;">  
                    <img class="wp-image-207901" src="<?php echo esc_url($block_image['url']); ?>" alt="<?php echo esc_attr($block_image['alt']); ?>" style="aspect-ratio:4/3;object-fit:<?php echo $wp_object_image ; ?>;width: 100%;" />
                </figure>
            
            </div>
        <?php endif; ?>
    </div>
</div>
</div>
<?php if (!$is_preview) { ?>
    </div>
<?php } ?>