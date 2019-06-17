    <div class="site-slider zamura-owl-basic">

        <div id="zamura-owl-basic" class="owl-carousel owl-theme">
    
    		<?php 
			
				if(get_theme_mod('zamura_slider_num')){
					$zamura_slider_num = get_theme_mod('zamura_slider_num');
				}else{
					$zamura_slider_num = '5';
				}
			
				if(get_theme_mod('zamura_slider_cat')){
					$zamura_slider_cat = get_theme_mod('zamura_slider_cat');
				}else{
					$zamura_slider_cat = 0;
				}			
			
				$zamura_slider_args = array(
                    // Change these category SLUGS to suit your use.
                    'ignore_sticky_posts' => 1,
                    'post_type' => array('post'),
                    'posts_per_page'=> $zamura_slider_num,
					'cat' => $zamura_slider_cat
               );
        
			   $zamura_slider = new WP_Query($zamura_slider_args);
			
            if ( $zamura_slider->have_posts() ) : ?>            
			<?php /* Start the Loop */ ?>
			<?php while ( $zamura_slider->have_posts() ) : $zamura_slider->the_post(); ?>
            <div class="owl-carousel-slide">
                
                <?php if ( has_post_thumbnail()) : ?>	
                <?php the_post_thumbnail('zamura-owl'); ?>
                <?php else : ?>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/2000.png">
                <?php endif; ?>
                
                <div class="owl-carousel-caption-container">
                    <h3>
						<a href="<?php the_permalink() ?>">
						<?php the_title(); ?>
                        </a>
                    </h3>
                    <div class="owl-carousel-caption">
						<p><?php echo zamura_limitedstring(get_the_excerpt()); ?></p>
						<p><a href="<?php the_permalink() ?>">Read More</a></p>

					</div>
                </div>
                 	
            </div>
    		<?php endwhile; wp_reset_postdata(); endif; ?>
            
         </div>
    
    </div><!-- .site-slider --> 