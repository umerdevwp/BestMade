<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link  href="//d2vai4gt6pu8cn.cloudfront.net/assets/favicon-cd2efeb4c67d83ae83416b71a1688e9c4a3106d6ae87210c32f38523c0d7ba36.png" rel="shortcut icon" type="image/png">
  <link rel="profile" href="https://gmpg.org/xfn/11" />
 	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<span class="lights-out-overlay-js"></span>
<div id="spree-header">
    <div class="promo-bar" style="background-color: <?php echo get_field('promo_bar_stripe_color', 'option'); ?>">
  <div class="promo-bar__text">
  <?php echo get_field('promo_bar_text', 'option'); ?>
  </div>
  <div class="close-promo"></div>
</div>


  <header id="header" class="grid load-in">
    <div class="nav_container" data-sticky="false" style="">
      <div class="bottom-nav">
        <div class="left-nav">
          <div class="mobile-menu tablet">
            <a href="#" class="side-drawers-js">
              <div class="icon-wrapper">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
              </div>

              <span class="search-icon"></span>
            </a>
          </div>
          <div class="search no-mobile no-tablet">
            <form class="search__form" action="/products" accept-charset="UTF-8" method="get"><input name="utf8" type="hidden" value="✓">
              <div class="form-group">
              <input type="search" name="keywords" id="keywords" value="" placeholder="Search" class="form-control search__form__input" autocomplete="off">
              </div>
</form>          </div>
        </div>
        <div class="center-nav">
          <a class="logo" href="https://www.bestmadeco.com">
            <img class="bmc-logo-v2" alt="Best Made Company" src="//d2vai4gt6pu8cn.cloudfront.net/assets/bmc-logo-v2-b5416a17d69d846f10703c8090b194d09c14b20aa7472ec9905d7ecc11d5143a.svg">
          </a>
        </div>
        <div class="right-nav">
          <div>
  <div class="nav-cart--container">
    <div class="mini-cart-wrapper">
      

    </div>
    <a class="nav-cart-link--js nav-toolbar-icon--link nav-toolbar-icon--link__cart nav-cart-link--mobile tablet" href="https://www.bestmadeco.com/cart">
      <div class="mini-cart-close"></div>
</a>
  </div>
</div>

<div class="no-tablet">
  <a class="bottom-nav--main-link nav-link close-panels--js" href="https://www.bestmadeco.com/account">
    <span class="nav-account-icon"></span> My Account
</a></div>

        </div>

        <nav class="site-nav no-tablet">
          <ul class="site-nav-items">

            <li class="site-nav-item">
                  <a href="https://www.bestmadeco.com/" class="static-site-nav-link">Shop</a>
                </li>
                <li class="site-nav-item" style="border-right: 1px solid #ADD8E6;padding-right:20px;">
                  <a id="js-panel-965" href="<?php echo get_home_url(); ?>" class="site-nav-link">Projects</a>
                </li>
          <?php
            $terms = get_field('top_navigation_categories', 'option');
            if( $terms ): ?>
        
          <?php foreach( $terms as $term ): ?>

                <li class="site-nav-item">
                  <a href="<?php echo esc_url( get_term_link( $term ) ); ?>" class="static-site-nav-link"><?php echo esc_html( $term->name ); ?></a>
                </li>
             
          <?php endforeach; ?>
      
          <?php endif; ?>
                
               
                
          </ul>
        </nav>

        <nav class="grid">
          <div class="nav-bar-dropdowns">

    <nav id="js-panel-965-target" class="site-nav-panels mega-menu dd_drawer side-drawer clearfix site-nav-panel" data-dd="true">
      <div class="max-width-container">
        <div class="site-nav-panel--container">
          <div class="site-nav-panel--images">
          <?php

            $args = array(
              'post_type' => 'post',
              'posts_per_page' => 4,
              'order' => 'DESC',
               
            );
            // The Query
            $query = new WP_Query( $args );
            /* Start the Loop */
            while ( $query->have_posts() ) :
              $query->the_post();

          ?>

            <div class="site-nav-link-block grid-item--quarter">
              <a href="<?php the_permalink();?>" class="">
                <div class="site-nav-panel--image-container" style="padding-bottom:0% !important;background:none;">
                <?php //the_post_thumbnail( 'menu-item-list' ); ?>
                <?php $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );?>
                <img alt="Icons of Best Made" class="collection lazyloaded" src="<?php echo $feat_image; ?>" style="width:100%;height:auto;position:relative;left:0;right:0;">
               
                </div>
                <p class="site-nav-link-block-title"><?php echo get_the_title();?></p>
                <p class="site-nav-link-block-month"></p>
              </a>
            </div>
          <?php
            endwhile;
          ?>
            
          </div>
          <div class="grid site-nav-panel-view-all">
            <a href="<?php echo get_home_url(); ?>">View All Projects</a>
          </div>
        </div>
      </div>
    </nav>

    <div class="dd_drawer" data-dd="true" id="join-js">
  <div class="info-bar">
    Get Our Succinct Weekly Newsletter, Featuring New Products, Compelling Stories And Useful Information
  </div>

  <form class="form-group header-newsletter--js" id="new_chimpy_subscriber" action="/subscribers" accept-charset="UTF-8" method="post"><input name="utf8" type="hidden" value="✓"><input type="hidden" name="authenticity_token" value="wGE0YNKLnezV/2EYiHYs7COlqSwJ56sLnc7plLHsPIg0njhip6wTgL3+RqRJhrBlDG9xGkl98epT51v5DGJmlA==">
    <div class="nav-drawer--text-box header-newsletter--form--js">
      <input placeholder="Enter your email address" class="b-text-field" type="email" name="chimpy_subscriber[email]" id="chimpy_subscriber_email">
      <div style="position: absolute; left: -5000px;">
        <input type="text" name="pot_of_gold" id="pot_of_gold" tabindex="-1">
      </div>
      <div class="header-newsletter--error header-newsletter--error--js is-hidden"></div>
      <button name="button" type="submit" class="b-button b-button_small close-panels--delaye--js">Join</button>
    </div>
    <div class="nav-drawer--text-box header-newsletter--success--js is-hidden">
      <div class="no-tablet">
        Success. Thank you for joining Best Made Company.
      </div>
      <div class="tablet">
        Thank You!
      </div>
    </div>
    <div class="close-js close-panels--js">close</div>
</form></div>

    <div class="side-drawer tablet shop-mobile-js" data-dd="true" id="side-drawers-js">
      <nav class="mega-menu" id="mega-menu-mobile">
  <ul class="level_1 clearfix">
    <li class="tab active">
      <ul class="level_2 clearfix">
        <li>
          <div class="site-nav-mobile-closer">
            <form class="search__form" action="/products" accept-charset="UTF-8" method="get"><input name="utf8" type="hidden" value="✓">
              <div class="form-group">
              <input type="search" name="keywords" id="keywords" value="" placeholder="Search" class="form-control search__form__input search__form__input--mobile" autocomplete="off">
              </div>
</form>            <a href="#" class="site-nav-mobile-close side-drawers-js close-mobile-panels--js"><span class="close-button"></span></a>
          </div>
        </li>

            <li><a href="https://www.bestmadeco.com/">Shop</a></li>

            <li class="has-submenu">
              <a href="<?php echo get_home_url();?>">Projects</a>

              <ul class="level_3 clearfix">
                <li class="back">
                  <div class="site-nav-mobile-closer">
                    <a href="#" class="back">Back</a>
                    <a href="#" class="site-nav-mobile-close side-drawers-js"><span class="close-button"></span></a>
                  </div>
                </li>

                <li>
                  <div class="site-nav-mobile">
                    <a class="like-h3 site-nav-mobile-title close-mobile-panels--js" href="<?php echo get_home_url();?>">All Projects</a>
                    <?php

                      $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => 4,
                        'order' => 'DESC',
                        
                      );
                      // The Query
                      $query = new WP_Query( $args );
                      /* Start the Loop */
                      while ( $query->have_posts() ) :
                        $query->the_post();

                    ?>
                      <a class="close-mobile-panels--js site-nav-mobile-adventure-link" href="<?php echo get_the_permalink();?>">
                        <span class="site-nav-mobile-adventure-title"><?php echo get_the_title(); ?></span>
                        <span class="site-nav-mobile-adventure-month">&nbsp;</span>
                      </a>
                    <?php
                    endwhile;
                    ?>
                  </div>
                </li>
              </ul>
            </li>

            <?php
            $terms = get_field('top_navigation_categories', 'option');
            if( $terms ): ?>
        
          <?php foreach( $terms as $term ): ?>

                <li >
                  <a href="<?php echo esc_url( get_term_link( $term ) ); ?>"><?php echo esc_html( $term->name ); ?></a>
                </li>
             
          <?php endforeach; ?>
      
          <?php endif; ?>

      </ul>
    </li>
  </ul>

  <div class="account-nav tablet">
    <a href="tel:18887087824">
      <span class="nav-call-icon"></span> Call Us
</a>    <a href="mailto:contact@bestmadeco.com">
      <span class="nav-support-icon"></span> Support
</a>    <a href="https://www.bestmadeco.com/account">
      <span class="nav-account-icon"></span> Account
</a>  </div>
</nav>

    </div>
</div>

        </nav>
      </div>
    </div>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23418018-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23418018-1');
</script>


  </header>
</div>