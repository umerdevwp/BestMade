<div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 text-md-center text-sm-center text-xs-center" style="margin:0 auto;">
    <div class="rtin-single-post">
    <?php
        $block_product_image = block_field('product-image', false);
        if ( !empty($block_product_image) ){ 
    ?>
        <div class="rtin-img"> <a href="<?php block_field('shop-link', true);?>"><img style="max-height: 339px;" src="<?php block_field('product-image', true);?>" alt="<?php block_field('product-title', true); ?>"></a></div>
    <?php
        }
    ?>  
        <div class="rtin-content pt-4 text-md-center text-sm-center text-xs-center">
            <div class="post-footer text-md-center text-sm-center text-xs-center" style="padding: 0; margin:0;">
            FEATURED                      
            </div>
            <?php 
            $block_product_title = block_field('product-title', false);
            if ( !empty($block_product_title) ){ 
            ?>
            <h3 class="rtin-title" style="font-size: 22px;"><a href="<?php block_field('shop-link', true);?>"><?php block_field('product-title', true); ?></a></h3>
            <?php
            }
            ?>
            <?php 
            $block_product_link = block_field('shop-link', false);
            if ( !empty($block_product_link) ){ 
            ?>
            <div class="post-footer text-md-center text-sm-center text-xs-center">
                <a href="<?php block_field('shop-link', true);?>" class="read-more">SHOP NOW</a>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>