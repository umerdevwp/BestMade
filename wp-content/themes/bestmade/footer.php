<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

?>

	</div><!-- #content -->

	<footer class="product-panel-stop-point load-in" id="footer">
    


  <!-- <div class="fcategory-nav" style="border-top: 1px solid #ADD8E6;">
    <div class="max-width-container">

    <?php
     /*  $terms = get_field('footer_categories', 'option');
      if( $terms ): ?>
  
    <?php foreach( $terms as $term ): ?>
        <a href="<?php echo esc_url( get_term_link( $term ) ); ?>" data-small-text="<?php echo esc_html( $term->name ); ?>" data-large-text="<?php echo esc_html( $term->name ); ?>"></a>
    <?php endforeach; ?>
 
    <?php endif; */ ?>
      
    </div>
  </div> -->

  <?php if ( is_front_page() ) : ?>
  <div class="footer-banner" style="border-top: 1px solid #ADD8E6;">
    <div class="footer-banner-image">
    <?php 
      $image = get_field('footer_banner');
      $size = 'full'; // (thumbnail, medium, large, full or custom size)
      if( $image ) {
          echo wp_get_attachment_image( $image, $size, "", array( "class" => "img-fluid" ) );
      }
      ?>
    </div>
  </div>
    <?php endif; ?>

  <div class="back-to-top">
    <div class="max-width-container">
      <a href="#header" title="Go to top of the page" class="js-scroll-to js-pin">Back to top</a>
    </div>
  </div>

  <div class="contacts-nav">
    <div class="max-width-container">
      <a href="tel:+18887087824" data-small-text="Call" data-large-text="1-888-708-7824">
        <span class="icon smartphone-icon"></span>
      </a>
      <a href="mailto:contact@bestmadeco.com" data-small-text="Email" data-large-text="contact@bestmadeco.com">
        <span class="icon email-icon"></span>
      </a>
        <a href="https://www.bestmadeco.com/visit-us" data-small-text="Find" data-large-text="Find a store">
          <span class="icon location-icon"></span>
        </a>
    </div>
  </div>

  <div class="bottom-footer max-width-container">
    <div class="grid">
      <div class="grid-item grid-item--full grid-item--l--5 grid-item--m--4">
            
         
            <!-- <div class="newsletter-content">
              <fieldset>
                <input required="required" placeholder="Enter your email" type="email" name="email" id="k_id_email">
                <input id="k_list_g" name="g" type="hidden" value="HbKUEA">
                <button id="subscribe-email-submit" name="button" type="submit">Submit</button> 
              </fieldset>
              <p class="newsletter-content-error newsletter-content--error--js is-hidden">Please enter a valid email address.</p>
              <p class="newsletter-response-error newsletter-response--error--js is-hidden">Sorry we couldn\'t subscribe you at this time.</p>
              <p class="newsletter-content--success--js is-hidden">Thank You!</p>
              <p class="newsletter-content--default--js">Sign up for the Best Made newsletter to get the latest news, announcements, special offers and event information.</p>
            </div> -->
          <div class="newsletter-content">
          <h4>Join the adventure</h4>
            <form id="email_signup" 
              class=" klaviyo_gdpr_embed_LIST_ID newsletter-form" 
              action="//manage.kmail-lists.com/subscriptions/subscribe" 
              data-ajax-submit="//manage.kmail-lists.com/ajax/subscriptions/subscribe" 
              method="GET" 
              target="_blank" 
              novalidate="novalidate">
              <fieldset>
                <input type="hidden" name="g" value="HbKUEA"> <!--Eighteenb org ID KFF3fj/ BM Klaviyo ID HbKUEA-->
                <input type="hidden" name="$fields" value="$consent">
                <input type="hidden" name="$list_fields" value="$consent">
                <div class="klaviyo_field_group">
                  <input 
                    type="email" 
                    value="" 
                    name="email" 
                    id="k_id_email" 
                    placeholder="Enter your email" class="newsletter-form-email"/>
                </div>
                <div class="klaviyo_messages">
                  <div class="success_message" style="display:none;"></div>
                  <div class="error_message" style="display:none;"></div>
                </div> 
                <div class="klaviyo_form_actions">
                  <button 
                    type="submit" 
                    class="klaviyo_submit_button newsletter-form-button">
                    Submit
                  </button>
                </div>
                </fieldset>
                <p class="newsletter-content--default--js">Sign up for the Best Made newsletter to get the latest news, announcements, special offers and event information.</p>
            </form>
          </div>
          <script type="text/javascript" src="//www.klaviyo.com/media/js/public/klaviyo_subscribe.js"></script>
          <script type="text/javascript">
            KlaviyoSubscribe.attachToForms('#email_signup', {
              hide_form_on_success: true,
              extra_properties: {
              $source: '$embed',
              $method_type: "Klaviyo Form",
              $method_id: 'embed',
              $consent_version: 'Embed default text'
              }
            });
          </script>
        
    </div>

     

      <div class="grid-item grid-item--full grid-item--l--3 grid-item--m--3 mobile-fix">
        <h4 class="nav-collapse collapsed" data-toggle="collapse" data-target="#footer_about_nav">About Best Made Co.</h4>
        <ul id="footer_about_nav" class="nav">
              <li><a href="https://www.bestmadeco.com/visit-us">Visit Us</a></li>
              <li><a href="https://www.bestmadeco.com/careers">Careers</a></li>
              <li><a href="https://www.bestmadeco.com/returns">Returns &amp; Policies</a></li>
              <li><a href="https://www.bestmadeco.com/faq">FAQ &amp; Contact</a></li>
        </ul>
      </div>

      <div class="grid-item grid-item--full grid-item--l--3 grid-item--m--3 mobile-fix">
        <h4 class="nav-collapse collapsed" data-toggle="collapse" data-target="#footer_social_nav">Follow Best Made Co.</h4>
        <ul id="footer_social_nav" class="nav">
          <li><a href="https://twitter.com/bestmadeco" target="_blank">Twitter</a></li>
          <li><a href="https://www.facebook.com/BestMadeCo" target="_blank">Facebook</a></li>
          <li><a href="https://instagram.com/bestmadeco/" target="_blank">Instagram</a></li>
        </ul>
      </div>

      <div class="grid-item grid-item--full grid-item--l--3 grid-item--m--4 trademark">
        <div><img data-src="//d2vai4gt6pu8cn.cloudfront.net/assets/bmc-guarantee-8f170d326d7175afd1fdceaa3afc9c0324010b3d08e7f68eaaa7577fbd6efde0.gif" class=" lazyloaded" src="//d2vai4gt6pu8cn.cloudfront.net/assets/bmc-guarantee-8f170d326d7175afd1fdceaa3afc9c0324010b3d08e7f68eaaa7577fbd6efde0.gif" width="180" height="138"></div>
        <p class="copyright">© 2019 Best Made Co.</p>
      </div>
    </div>
  </div>
</footer>
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
