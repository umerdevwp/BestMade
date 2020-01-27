<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage BestMade
 * @since 1.0.0
 */

?>
<?php get_header(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<div class="slideshow--heading">
		<div class="container">
		
		<div class="row align-items-center justify-content-center">
			<div class="col-lg-12 col-md-12 col-sm-12 align-self-center">
			<h2 class="b-header_landing text-center detail-heading"><?php the_title(); ?></h2>
			<?php 
				$tag_line = get_field('tag_line'); 
				if(!empty($tag_line)){
			?>
			<h3 class="detail-tagline text-center pt-4 pb-3"><?php echo $tag_line; ?></h3>
			<?php
				}
			?>

			<div class="post-footer text-center display-block"> 
			<?php 
				$blog_author = get_field('blog_author'); 
				if(!empty($blog_author)){
					echo '<span class="blog-items">BY  '. $blog_author .'</span>|'; 
				}/* else{
					echo "BY&nbsp;&nbsp; ". get_the_author() ."&nbsp;&nbsp;"; 
				} */
			?>
			<?php echo '<span class="blog-items">'. get_the_date( 'M j, Y' ).'</span>';?>
			<?php 
				$photos_by = get_field('photos_by'); 
				if(!empty($photos_by)){
					echo '|<span class="blog-items"> PHOTOS BY  '. $photos_by .'</span>';
				}	
			?>
			</div>
			</div>
			</div>
		
		</div>
  	</div>

	<div class="editorial-content">
  	<div class="container">
		  <div class="row">
			<div class="col-12">
				<div class="slider-wrap">
					<?php 
						if (get_field('slider_state') == 1) {
							
							$slider_ID = get_field('slider_images');
							echo do_shortcode('[metaslider id="'.$slider_ID.'"]');
						
						} elseif ( has_post_thumbnail() ) {
								
							the_post_thumbnail( 'full' ); 
							
						} else {
							/* Will do nothing */
						}
					?>
				</div>

				<?php
				the_content(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'bestmade' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						get_the_title()
					)
				);
				?>




			</div>
		</div>
	</div>
	</div>


	
		<?php 
			if (get_field('featured_product_state') == 1) {
		?>
				<div class="container" style="oveflow:hidden;padding:0 !important;">
						<div class="col-lg-12 col-md-12 col-sm-12 align-self-center">
							<div class="row">
										<h2 class="b-header_landing detail-heading" style="font-size: 3rem !important;margin:25px 0 25px 15px; ">Featured Products:</h2>
							</div>
						</div>
						<div class="col-12">
							<div id="productSlider">      <!-- Give wrapper ID to target with jQuery & CSS -->
								<div class="MS-content">
										
												<?php
														$post_objects = get_field('featured_products');

														if( $post_objects ): ?>
															
															<?php foreach( $post_objects as $post_object): ?>
																
																<div class="item col-lg-4 col-md-4 col-sm-12 col-xs-12 text-md-center text-sm-center text-xs-center">
																	<div class="text-md-center text-sm-center text-xs-center">
																		<div class="rtin-single-post">
																			<?php 
																				$image = get_field('product_image', $post_object->ID);
																				
																			?>
																			<div class="rtin-img"> <a href="<?php echo get_field('product_link', $post_object->ID);?>"><img style="max-height: 300px;" src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo get_the_title($post_object->ID); ?>"></a></div>
																			<div class="rtin-content pt-4 text-md-center text-sm-center text-xs-center">
																				<!-- <div class="post-footer text-md-center text-sm-center text-xs-center" style="padding: 0; margin:0;">
																				FEATURED                      
																				</div> -->
																				<h3 class="rtin-title" style="font-size: 22px;"><a href="<?php echo get_field('product_link', $post_object->ID);?>"><?php echo get_the_title($post_object->ID); ?></a></h3>
																				
																				<div class="post-footer text-md-center text-sm-center text-xs-center">
																					<a href="<?php echo get_field('product_link', $post_object->ID);?>" class="read-more">SHOP NOW</a>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
															<?php endforeach; ?>
															
														<?php endif; ?>			
												
									
								</div>
								<div class="MS-controls">
									<button class="MS-left"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
									<button class="MS-right"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
								</div>
							</div>

						</div>
				</div>

		<?php
					}
		?>




		<?php 
			if (get_field('more_editorials_state') == 1) {
		?>
				<!-- Related Editorials --->
				<div class="container" style="padding-top:3%;padding-bottom:3%;padding:3% 0;">
								<div class="col-lg-12 col-md-12 col-sm-12 align-self-center">
								<div class="row">
											<h2 class="b-header_landing detail-heading" style="font-size: 3rem !important;margin:25px 0 25px 15px; ">Related Articles:</h2>
								</div>
								</div>
					<div class="col-12 more-editorials">
									
						<div class="row">
				
										<?php
											$post_objects = get_field('more_editorials');

											if( $post_objects ): ?>
												
												<?php foreach( $post_objects as $post_object): ?>
													

														<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 text-md-center text-sm-center text-xs-center">
															<div class="rtin-single-post">

																<?php
																$articleimage = get_field('article_thumbnail', $post_object->ID);
																$arimage = $articleimage['ID'];
																$size = 'medium'; // (thumbnail, medium, large, full or custom size)
																?>
																<div class="rtin-img"> 
																	<a href="<?php echo get_the_permalink($post_object->ID);?>">
																
																	<?php if( $articleimage ) {
																			echo wp_get_attachment_image( $arimage, "", "", array( "class" => "img-fluid" ) );
																	} ?>
																	</a>
																</div>
																
																<div class="rtin-content pt-4 pt-sm-1 text-md-center text-sm-center text-xs-center">
																	<!-- <div class="post-footer text-md-center text-sm-center text-xs-center" style="padding: 0; margin:0;">
																	<?php //$hasComma = false; foreach((get_the_category($post_object->ID)) as $category) { $category_link = get_category_link($category->cat_ID); if ($hasComma){ echo ", "; }echo '<a href="'.esc_url( $category_link ).'" title="'.esc_attr($category->name).'">'.$category->name.'</a>';$hasComma = true;} ?>                      
																	</div> -->
																	<h3 class="rtin-title" style="font-size: 22px;"><a href="<?php echo get_the_permalink($post_object->ID);?>"><?php echo get_the_title($post_object->ID); ?></a></h3>
																	
																	<div class="post-footer text-md-center text-sm-center text-xs-center">
																		<a href="" class="read-more"><?php echo get_the_date('M j, Y', $post_object->ID);?></a>
																	</div>
																</div>
															</div>
														</div>
														<?php endforeach; ?>
												
												<?php endif; ?>
														
												
						</div>
					
					</div>
					
				</div>
		<?php
				}
		?>

<script>

jQuery(document).ready(function($) {

$('#productSlider').multislider({
    continuous:false,
    slideAll:false,
	interval: 0 
});

});

</script>


</article><!-- #post-<?php the_ID(); ?> -->
