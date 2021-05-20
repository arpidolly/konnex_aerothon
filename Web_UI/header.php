<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 */

?>
<?php
$metaGeneratorContent = 'Nicepage 3.15.3, nicepage.com';
$meta_generator = '';
if ($metaGeneratorContent) {
    remove_action('wp_head', 'wp_generator');
    $meta_generator = '<meta name="generator" content="' . $metaGeneratorContent . '" />' . "\n";
    $GLOBALS['meta_generator'] = true;
}
$headerHideBlog = false;
$headerHidePost = false;
$pagePost = is_single();
$pageBlog = is_home();
$headerHideProducts = false;
$headerHideProduct = false;
$headerHideCart = false;
$pageProducts = false;
$pageProduct = false;
$pageCart = false;
if (function_exists('wc_get_product')) {
    $pageProducts = is_shop() || is_product_category();
    $pageProduct = is_product();
    $pageCart = is_cart();
} ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js" style="font-size:<?php echo apply_filters('theme_base_font_size', '16'); ?>px">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php echo $meta_generator; ?>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php endif; ?>
    <?php wp_head(); ?>
    
    
    
</head>

<body <?php body_class(); ?><?php body_style_attribute(); ?> <?php body_data_attributes(); ?>>
<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'airbus_website' ); ?></a>
    <?php if (!$pageBlog && !$pagePost && !$pageProducts && !$pageProduct && !$pageCart ||
        $pageBlog && !$headerHideBlog ||
        $pagePost && !$pageProduct && !$headerHidePost ||
        $pageProducts && !$headerHideProducts ||
        $pageProduct && !$headerHideProduct ||
        $pageCart && !$headerHideCart) { ?>
    <header class="u-align-center-xs u-border-1 u-border-grey-25 u-clearfix u-header u-header" id="sec-5e7f">
  <div class="u-clearfix u-sheet u-sheet-1">
    <?php $logo = theme_get_logo(array(
            'default_src' => "/images/download.jpg",
            'default_url' => home_url('/'),
            'default_width' => '80'
        )); ?><a <?php if (is_customize_preview()) echo 'data-default-src="' . esc_url($logo['default_src']) . '" '; ?>href="<?php echo esc_url($logo['url']); ?>" class="u-image u-logo u-image-1 custom-logo-link" data-image-width="280" data-image-height="180">
      <img <?php if ($logo['svg']) {echo 'style="width:'.$logo['width'].'px"';} else {echo 'style="width:auto"';}?>src="<?php echo esc_url($logo['src']); ?>" class="u-logo-image u-logo-image-1" data-image-width="80">
    </a>
    <?php
            ob_start();
            ?><nav class="u-align-left u-menu u-menu-one-level u-nav-spacing-25 u-offcanvas u-menu-1">
      <div class="menu-collapse">
        <a class="u-button-style u-nav-link" href="#" style="padding: 4px 0px; font-size: calc(1em + 8px);">
          <svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 302 302" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-7b92"></use></svg>
          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="svg-7b92" x="0px" y="0px" viewBox="0 0 302 302" style="enable-background:new 0 0 302 302;" xml:space="preserve" class="u-svg-content"><g><rect y="36" width="302" height="30"></rect><rect y="236" width="302" height="30"></rect><rect y="136" width="302" height="30"></rect>
</g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
        </a>
      </div>
      <div class="u-custom-menu u-nav-container">
        {menu}
      </div>
      <div class="u-custom-menu u-nav-container-collapse">
        <div class="u-align-center u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
          <div class="u-sidenav-overflow">
            <div class="u-menu-close"></div>
            {responsive_menu}
          </div>
        </div>
        <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
      </div>
    </nav><?php
            $menu_template = ob_get_clean();
            echo Theme_NavMenu::getMenuHtml(array(
                'container_class' => 'u-align-left u-menu u-menu-one-level u-nav-spacing-25 u-offcanvas u-menu-1',
                'menu' => array(
                    'menu_class' => 'u-nav u-spacing-20 u-unstyled u-nav-1',
                    'item_class' => 'u-nav-item',
                    'link_class' => 'u-border-active-palette-1-base u-border-hover-palette-1-base u-button-style u-nav-link u-text-active-palette-1-base u-text-grey-90 u-text-hover-palette-2-base',
                    'link_style' => 'padding: 10px;',
                    'submenu_class' => 'u-h-spacing-20 u-nav u-unstyled u-v-spacing-10 u-block-b730-34',
                    'submenu_item_class' => 'u-nav-item',
                    'submenu_link_class' => 'u-button-style u-nav-link',
                    'submenu_link_style' => '',
                ),
                'responsive_menu' => array(
                    'menu_class' => 'u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2',
                    'item_class' => 'u-nav-item',
                    'link_class' => 'u-button-style u-nav-link',
                    'link_style' => 'padding: 10px;',
                    'submenu_class' => 'u-h-spacing-20 u-nav u-unstyled u-v-spacing-10 u-block-b730-32',
                    'submenu_item_class' => 'u-nav-item',
                    'submenu_link_class' => 'u-button-style u-nav-link',
                    'submenu_link_style' => '',
                ),
                'theme_location' => 'primary-navigation-1',
                'template' => $menu_template,
            )); ?><span class="u-icon u-icon-circle u-icon-1" data-href="[page_75036522]"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 509.369 509.369" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-6168"></use></svg><svg class="u-svg-content" viewBox="0 0 509.369 509.369" id="svg-6168"><g><path d="m432.393 333.194c-7.282 0-13.207-5.925-13.207-13.208v-93.298c0-73.66-48.665-136.166-115.532-157.059 2.01-5.598 3.072-11.541 3.072-17.588 0-28.695-23.345-52.041-52.042-52.041s-52.042 23.346-52.042 52.042c0 6.094 1.041 12.028 3.038 17.599-66.849 20.903-115.498 83.4-115.498 157.048v93.298c0 7.283-5.925 13.208-13.207 13.208-29.123 0-52.815 23.693-52.815 52.815s23.692 52.815 52.815 52.815h123.208c-1.19 4.591-1.813 9.362-1.813 14.231 0 31.052 25.263 56.314 56.314 56.314s56.314-25.262 56.314-56.314c0-4.868-.623-9.639-1.814-14.231h123.208c29.123 0 52.815-23.693 52.815-52.815.002-29.123-23.691-52.816-52.814-52.816zm-199.751-281.152c0-12.154 9.888-22.042 22.042-22.042s22.042 9.888 22.042 22.042c0 3.985-1.078 7.864-3.083 11.244-6.223-.717-12.547-1.099-18.959-1.099-6.405 0-12.722.381-18.939 1.097-2.008-3.37-3.103-7.218-3.103-11.242zm48.357 401.013c0 14.51-11.805 26.314-26.314 26.314s-26.314-11.804-26.314-26.314c0-5.126 1.462-10.025 4.177-14.231h44.273c2.716 4.206 4.178 9.105 4.178 14.231zm151.394-44.231h-355.418c-12.58 0-22.815-10.235-22.815-22.815s10.235-22.815 22.815-22.815c23.824 0 43.207-19.383 43.207-43.208v-93.298c0-74.165 60.337-134.502 134.502-134.502s134.502 60.337 134.502 134.502v93.298c0 23.825 19.383 43.208 43.207 43.208 12.58 0 22.815 10.235 22.815 22.815.001 12.58-10.235 22.815-22.815 22.815z"></path>
</g></svg></span>
  </div>
</header>
    
    <?php } ?>
    <div id="content">
