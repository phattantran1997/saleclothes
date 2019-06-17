<?php

	$zamuraSixPostOneTitle = '';
	$zamuraSixPostOneDesc = '';
	$zamuraSixPostOneContent = '';
	$zamuraSixPostOneLink = '';
	$zamuraSixPostOneImage = '';

	$zamuraSixPostTwoTitle = '';
	$zamuraSixPostTwoDesc = '';
	$zamuraSixPostTwoContent = '';
	$zamuraSixPostTwoLink = '';
	$zamuraSixPostTwoImage = '';

	$zamuraSixPostThreeTitle = '';
	$zamuraSixPostThreeDesc = '';
	$zamuraSixPostThreeContent = '';
	$zamuraSixPostThreeLink = '';
	$zamuraSixPostThreeImage = '';
	

	if( '' != get_theme_mod('zamura_six_post_one') && 'select' != get_theme_mod('zamura_six_post_one') ){

		$zamuraSixPostOneId = get_theme_mod('zamura_six_post_one');

		if( ctype_alnum($zamuraSixPostOneId) ){

			$zamuraSixPostOne = get_post( $zamuraSixPostOneId );

			$zamuraSixPostOneTitle = $zamuraSixPostOne->post_title;
			$zamuraSixPostOneDesc = $zamuraSixPostOne->post_excerpt;
			$zamuraSixPostOneContent = zamura_limitedstring($zamuraSixPostOne->post_content, 150);
			$zamuraSixPostOneLink = get_permalink($zamuraSixPostOneId);
			
			if( has_post_thumbnail( $zamuraSixPostOneId ) ){
							
				$zamuraSixPostOneImage = wp_get_attachment_image_src( get_post_thumbnail_id( $zamuraSixPostOneId ), 'zamura-home-posts' );
				$zamuraSixPostOneImage = $zamuraSixPostOneImage[0];
							
			}else{
							
				$zamuraSixPostOneImage = get_template_directory_uri() . '/assets/images/frontsix.png';
							
			}			

		}

	}


	if( '' != get_theme_mod('zamura_six_post_two') && 'select' != get_theme_mod('zamura_six_post_two') ){

		$zamuraSixPostTwoId = get_theme_mod('zamura_six_post_two');

		if( ctype_alnum($zamuraSixPostTwoId) ){

			$zamuraSixPostTwo = get_post( $zamuraSixPostTwoId );

			$zamuraSixPostTwoTitle = $zamuraSixPostTwo->post_title;
			$zamuraSixPostTwoDesc = $zamuraSixPostTwo->post_excerpt;
			$zamuraSixPostTwoContent = zamura_limitedstring($zamuraSixPostTwo->post_content, 150);
			$zamuraSixPostTwoLink = get_permalink($zamuraSixPostTwoId);
			
			if( has_post_thumbnail( $zamuraSixPostTwoId ) ){
							
				$zamuraSixPostTwoImage = wp_get_attachment_image_src( get_post_thumbnail_id( $zamuraSixPostTwoId ), 'zamura-home-posts' );
				$zamuraSixPostTwoImage = $zamuraSixPostTwoImage[0];
							
			}else{
							
				$zamuraSixPostTwoImage = get_template_directory_uri() . '/assets/images/frontsix.png';
							
			}			

		}

	}

	if( '' != get_theme_mod('zamura_six_post_three') && 'select' != get_theme_mod('zamura_six_post_three') ){

		$zamuraSixPostThreeId = get_theme_mod('zamura_six_post_three');

		if( ctype_alnum($zamuraSixPostThreeId) ){

			$zamuraSixPostThree = get_post( $zamuraSixPostThreeId );

			$zamuraSixPostThreeTitle = $zamuraSixPostThree->post_title;
			$zamuraSixPostThreeDesc = $zamuraSixPostThree->post_excerpt;
			$zamuraSixPostThreeContent = zamura_limitedstring($zamuraSixPostThree->post_content, 150);
			$zamuraSixPostThreeLink = get_permalink($zamuraSixPostThreeId);
			
			if( has_post_thumbnail( $zamuraSixPostThreeId ) ){
							
				$zamuraSixPostThreeImage = wp_get_attachment_image_src( get_post_thumbnail_id( $zamuraSixPostThreeId ), 'zamura-home-posts' );
				$zamuraSixPostThreeImage = $zamuraSixPostThreeImage[0];
							
			}else{
							
				$zamuraSixPostThreeImage = get_template_directory_uri() . '/assets/images/frontsix.png';
							
			}			

		}

	}

?>

<div class="zamuraSixContainer">

	<?php if( '' != get_theme_mod('zamura_six_post_one') && 'select' != get_theme_mod('zamura_six_post_one') ): ?>
	<div class="zamuraSixItem">
		
		<div class="zamuraSixItemImage">
		
			<img src="<?php echo esc_url($zamuraSixPostOneImage); ?>" />	
		
		</div>
		
		<div class="zamuraSixItemDesc">
		
			<h2><a href="<?php echo esc_url($zamuraSixPostOneLink); ?>"><?php echo esc_html($zamuraSixPostOneTitle); ?></a></h2>
			<p>
			<?php 
					
				if( '' != $zamuraSixPostOneDesc ){
							
					echo esc_html($zamuraSixPostOneDesc);
							
				}else{
							
					echo esc_html($zamuraSixPostOneContent);
							
				}
					
			?>			
			</p>
		
		</div>		
		
	</div>
	<?php endif; ?>
	
	<?php if( '' != get_theme_mod('zamura_six_post_two') && 'select' != get_theme_mod('zamura_six_post_two') ): ?>
	<div class="zamuraSixItem">
		
		<div class="zamuraSixItemImage">
		
			<img src="<?php echo esc_url($zamuraSixPostTwoImage); ?>" />	
		
		</div>
		
		<div class="zamuraSixItemDesc">
		
			<h2><a href="<?php echo esc_url($zamuraSixPostTwoLink); ?>"><?php echo esc_html($zamuraSixPostTwoTitle); ?></a></h2>
			<p>
			<?php 
					
				if( '' != $zamuraSixPostTwoDesc ){
							
					echo esc_html($zamuraSixPostTwoDesc);
							
				}else{
							
					echo esc_html($zamuraSixPostTwoContent);
							
				}
					
			?>			
			</p>
		
		</div>		
		
	</div>
	<?php endif; ?>
	
	<?php if( '' != get_theme_mod('zamura_six_post_three') && 'select' != get_theme_mod('zamura_six_post_three') ): ?>
	<div class="zamuraSixItem">
		
		<div class="zamuraSixItemImage">
		
			<img src="<?php echo esc_url($zamuraSixPostThreeImage); ?>" />	
		
		</div>
		
		<div class="zamuraSixItemDesc">
		
			<h2><a href="<?php echo esc_url($zamuraSixPostThreeLink); ?>"><?php echo esc_html($zamuraSixPostThreeTitle); ?></a></h2>
			<p>
			<?php 
					
				if( '' != $zamuraSixPostThreeDesc ){
							
					echo esc_html($zamuraSixPostThreeDesc);
							
				}else{
							
					echo esc_html($zamuraSixPostThreeContent);
							
				}
					
			?>			
			</p>
		
		</div>		
		
	</div>
	<?php endif; ?>

</div>