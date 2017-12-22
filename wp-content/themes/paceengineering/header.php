<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

$container = get_theme_mod( 'understrap_container_type' );
$setting = new Setting(28);
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="hfeed site" id="page">
    <section id="header">
        <div class="container-fluid">
            <div class="row">
                <div class="top-bar">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12">
                                <a href="mailto:<?=$setting->getEmail()?>" class="email-wrapper"><?=$setting->getEmail()?></a> <a href="tel:<?=formatPhoneNumber($setting->getPhoneNumber())?>" class="phone-wrapper"><?=$setting->getPhoneNumber()?></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container blue-section-wrapper">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="logo-wrapper">
                                <a href="<?=get_home_url()?>" class="logo"><img src="<?=get_stylesheet_directory_uri()?>/images/logo.png" alt="Pace Engineering Ltd" /></a>
                            </div>
                            <div id="p-menu-wrapper">
                                <div class="main-nav wrapper-fluid wrapper-navbar" id="wrapper-navbar">
                                    <nav class="site-navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
                                        <?php
                                        wp_nav_menu(
                                            array(
                                                'theme_location' => 'primary',
                                                'container_class' => 'collapse navbar-collapse navbar-responsive-collapse',
                                                'menu_class' => 'nav navbar-nav',
                                                'fallback_cb' => '',
                                                'menu_id' => 'main-menu'
                                            )
                                        );
                                        ?>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>