<?php

$zamuraPostsPagesArray = array(
	'select' => __('Select a post/page', 'zamura'),
);

$zamuraPostsPagesArgs = array(
	
	// Change these category SLUGS to suit your use.
	'ignore_sticky_posts' => 1,
	'post_type' => array('post', 'page'),
	'orderby' => 'date',
	'posts_per_page' => -1,
	'post_status' => 'publish',
	
);
$zamuraPostsPagesQuery = new WP_Query( $zamuraPostsPagesArgs );
	
if ( $zamuraPostsPagesQuery->have_posts() ) :
							
	while ( $zamuraPostsPagesQuery->have_posts() ) : $zamuraPostsPagesQuery->the_post();
			
		$zamuraPostsPagesId = get_the_ID();
		if(get_the_title() != ''){
				$zamuraPostsPagesTitle = get_the_title();
		}else{
				$zamuraPostsPagesTitle = get_the_ID();
		}
		$zamuraPostsPagesArray[$zamuraPostsPagesId] = $zamuraPostsPagesTitle;
	   
	endwhile; wp_reset_postdata();
							
endif;

$zamuraYesNo = array(
	'select' => __('Select', 'zamura'),
	'yes' => __('Yes', 'zamura'),
	'no' => __('No', 'zamura'),
);

$zamuraSliderType = array(
	'select' => __('Select', 'zamura'),
	'header' => __('WP Custom Header', 'zamura'),
	'owl' => __('Owl Slider', 'zamura'),
);

$zamuraServiceLayouts = array(
	'select' => __('Select', 'zamura'),
	'one' => __('One', 'zamura'),
	'two' => __('Two', 'zamura'),
);

$zamuraAvailableCats = array( 'select' => __('Select', 'zamura') );

$zamura_categories_raw = get_categories( array( 'orderby' => 'name', 'order' => 'ASC', 'hide_empty' => 0, ) );

foreach( $zamura_categories_raw as $category ){
	
	$zamuraAvailableCats[$category->term_id] = $category->name;
	
}

$zamuraBusinessLayoutType = array( 
	'select' => __('Select', 'zamura'), 
	'six' => __('Six', 'zamura'),
	'woo-one' => __('Woocommerce One', 'zamura'),
);
