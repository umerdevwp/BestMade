<?php

/* Template Name: Home Page*/

get_header();
?>


<?php

	/* Start the Page Loop */
	while ( have_posts() ) :
		the_post();


		$section_a_postOne = get_field('section_a__blog_a');
		$section_a_postTwo = get_field('section_a__blog_b');
        $section_a_postThree = get_field('section_a__blog_c');
        $section_a_postFour = get_field('section_a__blog_d');
		$section_a_postArr = array($section_a_postTwo, $section_a_postThree, $section_a_postFour );
			
?>


    <div class="container-fluid" style="padding: 0 3%;">
        <div class="col-12">
        <div class="row-fluid">

            <section id="primary" class="content-area">
                <!-- #section four -->

                                <div class="row auto-clear">


                                    <div class="col-lg-8 col-md-8 col-xs-12">
										<?php
													
													$argsA1 = array(
														'post_type' => 'post',
														'posts_per_page' => 1,
														'p' => $section_a_postOne, 
													);
													// The Query
													$queryA1 = new WP_Query( $argsA1 );
													/* Start the Loop */
													while ( $queryA1->have_posts() ) :
														$queryA1->the_post();

														$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); 				
										?>

                                            <div class="rtin-single-post">
                                                <div class="rtin-img">
                                                    <?php 
                                                        if (get_field('slider_state') == 1) {
                                                            $slider_ID = get_field('slider_images');
                                                            echo do_shortcode('[metaslider id="'.$slider_ID.'" height="1000"]');
                                                        } else {
                                                    ?>
                                                        <?php $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
                                                        <a href="<?php the_permalink();?>"><?php //echo wp_get_attachment_image( get_post_thumbnail_id($post->ID), "large", "", array( "class" => "img-fluid" ) );
                                                        the_post_thumbnail( 'detail-post-image' ); ?></a>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>

                                                <div class="rtin-content text-sm-center pt-4">

                                                    <h3 class="rtin-title main-featured-post-title"><a href="<?php echo get_the_permalink();?>"><?php echo get_the_title();?></a></h3>
                                                    <p class="feature-text-width">
                                                        <?php 
																	$excerpt = get_the_excerpt();
																	echo wp_trim_words( $excerpt , '30' ); 
																?>
                                                    </p>
                                                    <div class="post-footer text-sm-center">
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

                                            <?php
											endwhile; // End of the loop.
											wp_reset_postdata();
											?>

                                    </div>

                                    <div class=" col-lg-4 col-md-4 col-xs-12">
										<?php

													$argsA2 = array(
														'post_type' => 'post',
														'posts_per_page' => 3,
														'orderby' => 'rand',
														'order'   => 'DESC',
														'post__in' => $section_a_postArr
													);
													// The Query
													$queryA2 = new WP_Query( $argsA2 );
													/* Start the Loop */
													while ( $queryA2->have_posts() ) :
														$queryA2->the_post();

														$feat_image3 = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); 				
										?>
                                            <div class="rtin-single-post">
                                                <div class="row auto-clear">
                                                    <div class="rtin-content col-lg-6 col-md-12 col-xs-12 order-xs-2 text-md-left text-sm-center col-custom-12">
                                                        <div class="post-footer text-md-left text-sm-center" style="padding: 0; margin:0;">
                                                            <!-- <a href="<?php echo get_the_permalink();?>" style="color:#333;"> -->
																			<?php
																				$hasComma = false;
																				foreach((get_the_category()) as $category) { 
																					$category_link = get_category_link($category->cat_ID);
																					if ($hasComma){ 
																						echo "&nbsp;|&nbsp;"; 
																					}
   																					echo '<a href="'.esc_url( $category_link ).'" title="'.esc_attr($category->name).'">'.$category->name.'</a>';
																					$hasComma = true;
																				} 
																			?>
                                                            <!-- </a> -->
                                                        </div>
                                                        <h3 class="rtin-title"><a href="<?php echo get_the_permalink();?>"><?php echo get_the_title();?></a></h3>
                                                        <p style="padding:0px;">
                                                            <?php 
																				$excerpt2 = get_the_excerpt();
																				echo wp_trim_words( $excerpt2 , '17' ); 
																			?>
                                                        </p>
                                                        
                                                        
                                                        <div class="post-footer text-md-left text-sm-center"><a href="<?php echo get_the_permalink();?>" class="read-more">READ MORE </a> </div>
                                                    </div>
                                                    <div class="rtin-content col-lg-6 col-md-6 col-xs-12 order-xs-1 d-sm-block d-md-none d-lg-block">
                                                        <div class="rtin-img">
                                                            <a href="<?php the_permalink();?>">
                                                                <?php $image = get_field('article_thumbnail'); echo wp_get_attachment_image( $image['ID'], "three-item-list", "", array( "class" => "img-fluid" ) );?>
                                                                <!-- <img src="<?php //echo $image['sizes']['vertical-item-list'];?>" alt="<?php //echo $image['alt'];?>" > -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
												endwhile; // End of the loop.
												wp_reset_postdata();
											?>
                                    </div>

                                   

                                </div>

            </section>
            <!-- #section One-2 -->

            <section id="primary" class="content-area">
                <!-- #section two -->
 
                                <div class="row auto-clear">
									<?php

												$section_b_postOne = get_field('section_b__blog_a');
												$section_b_postTwo = get_field('section_b__blog_b');
												$section_b_postThree = get_field('section_b__blog_c');
												$section_b_postArr = array($section_b_postOne, $section_b_postTwo, $section_b_postThree );

												$argsB = array(
													'post_type' => 'post',
													'posts_per_page' => 3,
													'post__in' => $section_b_postArr,
													'order'   => 'DESC',
												);
												// The Query
												$queryB = new WP_Query( $argsB );
												/* Start the Loop */
												while ( $queryB->have_posts() ) :
													$queryB->the_post();

													//$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); 				
									?>

                                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 text-md-left text-sm-center">
                                            <div class="rtin-single-post">
                                                <div class="rtin-img"> <a href="<?php the_permalink();?>"><?php the_post_thumbnail( 'three-item-list', '', array( "class" => "img-fluid" )  ); ?>
                                                                <?php $image = get_field('article_thumbnail'); //echo wp_get_attachment_image( $image['ID'], "three-item-list", "");?>
                                                                <!-- <img src="<?php //echo $image['sizes']['three-item-list'];?>" alt="<?php //echo $image['alt'];?>" width="575px" > -->
                                                </a></div>
                                                <div class="rtin-content pt-4">
                                                <div class="post-footer text-md-left text-sm-center" style="padding: 0; margin:0;">
                                                           
																			<?php
																				$hasComma = false;
																				foreach((get_the_category()) as $category) { 
																					$category_link = get_category_link($category->cat_ID);
																					if ($hasComma){ 
																						echo "&nbsp;|&nbsp;"; 
																					}
   																					echo '<a href="'.esc_url( $category_link ).'" title="'.esc_attr($category->name).'">'.$category->name.'</a>';
																					$hasComma = true;
																				} 
																			?>
                                                           
                                                        </div>
                                                    <h3 class="rtin-title"><a href="<?php echo get_the_permalink();?>"><?php echo get_the_title();?></a></h3>
                                                    <p>
                                                        <?php 
                                                            $excerpt = get_the_excerpt();
                                                            echo wp_trim_words( $excerpt , '20' ); 
                                                        ?>
                                                    </p>
                                                   
                                                    <div class="post-footer text-md-left text-sm-center"><a href="<?php echo get_the_permalink();?>" class="read-more">READ MORE </a> </div>
                                                </div>
                                            </div>
                                        </div>

                                        <?php
										endwhile; // End of the loop.
										wp_reset_postdata();
										?>
                                </div>

            </section>
            <!-- #section two -->

            <section id="primary" class="content-area">
                <!-- #section three -->
                
                                <div class="row auto-clear">
									<?php
												$section_c_postOne = get_field('section_c__blog_a');
												$section_c_postTwo = get_field('section_c__blog_b');
												$section_c_postArr = array($section_c_postOne, $section_c_postTwo );

												$argsC = array(
													'post_type' => 'post',
													'posts_per_page' => 2,
													'post__in' => $section_c_postArr,
													'order'   => 'ASC',
												);
												// The Query
												$queryC = new WP_Query( $argsC );
												/* Start the Loop */
												while ( $queryC->have_posts() ) :
													$queryC->the_post();

													$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); 				
									?>

                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 text-md-left text-sm-center">
                                            <div class="rtin-single-post">
                                                <div class="rtin-img imagesize-section3"> 
                                                    <a href="<?php the_permalink();?>"><?php the_post_thumbnail( 'large' ); ?>
                                                    <?php $image = get_field('article_thumbnail'); ?>
                                                               <!--  <img src="<?php echo $image['sizes']['two-item-list'];?>" alt="<?php echo $image['alt'];?>" > -->
                                                    </a>
                                                </div>
                                                <div class="rtin-content pt-4">
                                                    <div class="post-footer text-md-left text-sm-center" style="padding: 0; margin:0;">
                                                            
                                                            <?php
                                                                $hasComma = false;
                                                                foreach((get_the_category()) as $category) { 
                                                                    $category_link = get_category_link($category->cat_ID);
                                                                    if ($hasComma){ 
                                                                        echo "&nbsp;|&nbsp;"; 
                                                                    }
                                                                        echo '<a href="'.esc_url( $category_link ).'" title="'.esc_attr($category->name).'">'.$category->name.'</a>';
                                                                    $hasComma = true;
                                                                } 
                                                            ?>
                                            
                                                    </div>
                                                    <h3 class="rtin-title"><a href="<?php echo get_the_permalink();?>"><?php echo get_the_title();?></a></h3>
                                                    <p class="text-width-control">
                                                        <?php 
													$excerpt = get_the_excerpt();
													echo wp_trim_words( $excerpt , '45' ); 
												?>
                                                    </p>
                                                    <div class="post-footer text-md-left text-sm-center"><a href="<?php echo get_the_permalink();?>" class="read-more">READ MORE </a> </div>
                                                </div>
                                            </div>
                                        </div>

                                        <?php
										endwhile; // End of the loop.
										wp_reset_postdata();
										?>
                                </div>

                            
            </section>
            <!-- #section three -->

            <section id="primary" class="content-area">
                <!-- #section four -->
                <div class="row auto-clear">
                                <div class=" col-lg-4 col-md-4 col-xs-12">
										<?php
													$section_d_postTwo = get_field('section_d__blog_b');
													$section_d_postThree = get_field('section_d__blog_c');
													$section_d_postFour = get_field('section_d__blog_d');
													$section_d_postARR = array($section_d_postTwo, $section_d_postThree, $section_d_postFour);

													$argsD1 = array(
														'post_type' => 'post',
														'posts_per_page' => 4,
														'orderby' => 'rand',
														'order'   => 'DESC',
														'post__in' => $section_d_postARR
													);
													// The Query
													$queryD1 = new WP_Query( $argsD1 );
													/* Start the Loop */
													while ( $queryD1->have_posts() ) :
														$queryD1->the_post();

														$feat_image3 = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); 				
										?>
                                            <div class="rtin-single-post">
                                                <div class="row auto-clear">
                                                    <div class="rtin-content col-lg-6 col-md-12 col-xs-12 order-xs-2 text-md-left text-sm-center col-custom-12">
                                                        <div class="post-footer text-md-left text-sm-center" style="padding: 0; margin:0;">
                                                            <!-- <a href="<?php //echo get_the_permalink();?>" style="color:#333;"> -->
																			<?php
																				$hasComma = false;
																				foreach((get_the_category()) as $category) { 
																					$category_link = get_category_link($category->cat_ID);
																					if ($hasComma){ 
																						echo "&nbsp;|&nbsp;"; 
																					}
   																					echo '<a href="'.esc_url( $category_link ).'" title="'.esc_attr($category->name).'">'.$category->name.'</a>';
																					$hasComma = true;
																				} 
																			?>
                                                            <!-- </a> -->
                                                        </div>
                                                        <h3 class="rtin-title"><a href="<?php echo get_the_permalink();?>"><?php echo get_the_title();?></a></h3>
                                                        <p class="p-ipad" style="padding:0px;">
                                                            <?php 
																				$excerpt2 = get_the_excerpt();
																				echo wp_trim_words( $excerpt2 , '15' ); 
																			?>
                                                        </p>
                                                       
                                                        
                                                        <div class="post-footer text-md-left text-sm-center"><a href="<?php echo get_the_permalink();?>" class="read-more">READ MORE </a> </div>
                                                    </div>
                                                    <div class="rtin-content col-lg-6 col-md-6 col-xs-12 order-xs-1 d-sm-block d-md-none d-lg-block">
                                                        <div class="rtin-img">
                                                            <a href="<?php the_permalink();?>">
                                                                <?php //the_post_thumbnail( 'vertical-item-list' ); ?>
                                                                <?php $image = get_field('article_thumbnail'); echo wp_get_attachment_image( $image['ID'], "three-item-list", "", array( "class" => "img-fluid" ) );?>
                                                                <!-- <img src="<?php //echo $image['sizes']['vertical-item-list'];?>" alt="<?php //echo $image['alt'];?>" > -->
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
												endwhile; // End of the loop.
												wp_reset_postdata();
											?>
                                    </div>

                                <div class="col-lg-8 col-md-8 col-xs-12">
										<?php
													$section_d_postOne = get_field('section_d__blog_a');

													$argsD2 = array(
														'post_type' => 'post',
														'posts_per_page' => 1,
														'p' => $section_d_postOne, 
													);
													// The Query
													$queryD2 = new WP_Query( $argsD2 );
													/* Start the Loop */
													while ( $queryD2->have_posts() ) :
														$queryD2->the_post();

														$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); 				
										?>

                                            <div class="rtin-single-post">
                                                <div class="rtin-img">
                                                    <a href="<?php the_permalink();?>">
                                                        <?php the_post_thumbnail( 'detail-post-image' ); ?>
                                                            <!-- <img width="100%" height="600px" src="<?php echo $feat_image; ?>" class="wp-post-image" alt="<?php the_title();?>"> --></a>
                                                </div>

                                                <div class="rtin-content text-sm-center pt-4">

                                                    <h3 class="rtin-title main-featured-post-title"><a href="<?php echo get_the_permalink();?>"><?php echo get_the_title();?></a></h3>
                                                    <p class="feature-text-width">
                                                        <?php 
																	$excerpt = get_the_excerpt();
																	echo wp_trim_words( $excerpt , '30' ); 
																?>
                                                    </p>
                                                    <div class="post-footer text-sm-center">
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

                                            <?php
											endwhile; // End of the loop.
											wp_reset_postdata();
											?>

                                    </div>

                               
           
           
           
                </div >
            </section>
            <!-- #section four -->
        </div>
        </div>
    </div>

<?php
	endwhile; // End of the page loop.
?>

<?php
get_footer();