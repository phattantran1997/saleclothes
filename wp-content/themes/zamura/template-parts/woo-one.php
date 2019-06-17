<div class="wooOneContainer">

	<div class="wooOneWelcomeContainer">
		
			<?php
			
				$zamuraWelcomePostTitle = '';
				$zamuraWelcomePostDesc = '';

				if( '' != get_theme_mod('zamura_wooone_welcome_post') && 'select' != get_theme_mod('zamura_wooone_welcome_post') ){

					$zamuraWelcomePostId = get_theme_mod('zamura_wooone_welcome_post');

					if( ctype_alnum($zamuraWelcomePostId) ){

						$zamuraWelcomePost = get_post( $zamuraWelcomePostId );

						$zamuraWelcomePostTitle = $zamuraWelcomePost->post_title;
						$zamuraWelcomePostDesc = $zamuraWelcomePost->post_excerpt;
						$zamuraWelcomePostContent = $zamuraWelcomePost->post_content;

					}

				}			
			
			?>
			
			<h1><?php echo esc_html($zamuraWelcomePostTitle); ?></h1>
			<div class="wooOneWelcomeContent">
				<p>
					<?php 
					
						if( '' != $zamuraWelcomePostDesc ){
							
							echo esc_html($zamuraWelcomePostDesc);
							
						}else{
							
							echo esc_html($zamuraWelcomePostContent);
							
						}
					
					?>
				</p>
			</div><!-- .wooOneWelcomeContent -->	
		
	</div><!-- .wooOneWelcomeContainer -->
	
	
	<div class="new-arrivals-container">
		
		<?php 
					
			if( 'no' != get_theme_mod('zamura_show_wooone_heading') ): 
			
				$zamuraWooOneLatestHeading = __('Latest Products', 'zamura');	
				$zamuraWooOneLatestText = __('Some of our latest products', 'zamura');
			
					
				if( '' != get_theme_mod('zamura_wooone_latest_heading') ){
					$zamuraWooOneLatestHeading = get_theme_mod('zamura_wooone_latest_heading');
				}
				
				if( '' != get_theme_mod('zamura_wooone_latest_text') ){
					$zamuraWooOneLatestText = get_theme_mod('zamura_wooone_latest_text');
				}				
			
					
		?>
		<div class="new-arrivals-title">
		
			<h3><?php echo esc_html($zamuraWooOneLatestHeading); ?></h3>
			<p><?php echo esc_html($zamuraWooOneLatestText); ?></p>
		
		</div><!-- .new-arrivals-title -->
		<?php endif; ?>
		
		<?php
			
			$zamuraWooOnePaged = get_query_var( 'page' ) ? get_query_var( 'page' ) : 1;
			
			$zamura_front_page_ecom = array(
				'post_type' => 'product',
				'paged' => $zamuraWooOnePaged
			);
			$zamura_front_page_ecom_the_query = new WP_Query( $zamura_front_page_ecom );
			
			$zamura_front_page_temp_query = $wp_query;
			$wp_query   = NULL;
			$wp_query   = $zamura_front_page_ecom_the_query;
			
		?>		
		
		<div class="new-arrivals-content">
		<?php if ( have_posts() && post_type_exists('product') ) : ?>
		
		
			<div class="zamura-woocommerce-content">
			
				<ul class="products">
			
					<?php /* Start the Loop */ ?>
					<?php while ( $zamura_front_page_ecom_the_query->have_posts() ) : $zamura_front_page_ecom_the_query->the_post(); ?>			
					<?php wc_get_template_part( 'content', 'product' ); ?>
					<?php endwhile; ?>
				
				</ul><!-- .products -->
				
				<?php //the_posts_navigation(); ?>
				
				<?php zamura_pagination( $zamuraWooOnePaged, $zamura_front_page_ecom_the_query->max_num_pages); // Pagination Function ?>
				
			</div><!-- .zamura-woocommerce-content -->
			
		<?php else : ?>
		
			<p><?php echo __('Please install wooCommerce and add products.', 'zamura') ?></p>

		<?php 
			
			endif; 
			wp_reset_postdata();
			$wp_query = NULL;
			$wp_query = $zamura_front_page_temp_query;
		?>			
		
		
		</div><!-- .new-arrivals-content -->		
	
	</div><!-- .new-arrivals-container -->	

</div>