<?php

 /* Template Name: List Posts */

get_header();
?>
<div class="container">
        <div class="row">
        <div class="col-12">

<section id="primary" class="content-area">

	<?php if ( have_posts() ) : ?>	
                <!-- #section two -->
                
                                <div class="row auto-clear">
									<?php
										
										
										$args = array(
                                            'post_type' => 'post',
                                            'posts_per_page' => 9,
                                            'order' => 'DESC',
                                            'paged' => $paged
                                        );
                                        // The Query
                                        $query = new WP_Query( $args );
                                        /* Start the Loop */
                                        while ( $query->have_posts() ) :
                                            $query->the_post();			
									?>

                                        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 text-md-left text-sm-center">
                                            <div class="rtin-single-post">
                                            <?php
                                            $articleimage = get_field('article_thumbnail');
                                            $arimage = $articleimage['ID'];
                                            $size = 'medium'; // (thumbnail, medium, large, full or custom size)
                                            ?> 
                                                <div class="rtin-img editorial-list-image"> 
                                                        <a href="<?php the_permalink();?>">
                                                        <?php if( $articleimage ) {
                                                                echo wp_get_attachment_image( $arimage, $size, "", array( "class" => "img-fluid archive-image-mh-240" ) );
                                                        } ?>
                                                    </a>
                                                </div>
                                                
                                                <div class="rtin-content pt-4">
														<div class="post-footer text-md-left text-sm-center" style="padding: 0; margin:0;">
                                                             <!-- <a href="<?php echo get_the_permalink();?>" style="color:#333;"> -->
																			<?php
																				$hasComma = false;
																				foreach((get_the_category()) as $category) { 
																					$category_link = get_category_link($category->cat_ID);
																					if ($hasComma){ 
																						echo "&nbsp;|&nbsp;"; 
																					}
   																					echo '<a href="'.esc_url( $category_link ).'" title="'.esc_attr($category->name).'" style="color:#333;">'.$category->name.'</a>';
																					$hasComma = true;
																				} 
																			?>
                                                            <!-- </a> -->
                                                        </div>
                                                    <h3 class="rtin-title"><a href="<?php echo get_the_permalink();?>"><?php echo get_the_title();?></a></h3>
                                                    <p>
                                                        <?php 
													$excerpt = get_the_excerpt();
													echo wp_trim_words( $excerpt , '20' ); 
												?>
                                                    </p>
                                                    <div class="post-footer text-md-left text-sm-center">
                                                    <?php 
                                                        $blog_author = get_field('blog_author'); 
                                                        $photos_by = get_field('photos_by'); 
                                                        if(!empty($blog_author)){
                                                            echo '<span class="blog-items">BY  '. $blog_author .'</span>'; 
                                                        }
                                                    ?>
                                                    <?php if(!empty($blog_author) AND !empty($photos_by)){ echo "|";}?>
                                                    <?php 
                                                        if(!empty($photos_by)){
                                                            echo '<span class="blog-items"> PHOTOS BY  '. $photos_by .'</span>';
                                                        }	
                                                    ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <?php
										endwhile; // End of the loop.
                                        ?>
                                        <div class="col-12 text-md-left text-sm-center">
                                            <?php wp_pagenavi( array( 'query' => $query )); ?>
                                        </div>
                                        <?php
                                        wp_reset_query();
                                        ?>
                                        
                                </div>

				
		<?php endif; ?>

            </section>
			<!-- #section two -->
			
			</div></div>
    </div>

<?php
get_footer();
