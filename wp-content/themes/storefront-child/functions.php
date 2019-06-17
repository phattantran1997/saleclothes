<?php
/**
			 * Functions hooked in to homepage action
			 *
			 * @hooked storefront_homepage_content      - 10
			 * @hooked storefront_product_categories    - 20
			 * @hooked storefront_recent_products       - 30
			 * @hooked storefront_featured_products     - 40
			 * @hooked storefront_popular_products      - 50
			 * @hooked storefront_on_sale_products      - 60
			 * @hooked storefront_best_selling_products - 70
			 */
function tp_homepage_blocks() {
    /*
    * Sử dụng: remove_action( 'homepage', 'tên_hàm_cần_xóa', số thứ tự mặc định );
    */
	remove_action( 'homepage','storefront_homepage_content',10);
    remove_action( 'homepage','storefront_product_categories',20);
    remove_action( 'homepage', 'storefront_featured_products', 40 );
    remove_action( 'homepage', 'storefront_popular_products', 50 );
    remove_action( 'homepage', 'storefront_on_sale_products', 60 );
   }
   add_action( 'after_setup_theme', 'tp_homepage_blocks', 10 );
/**
 * Ẩn mã bưu chính
 * Ẩn địa chỉ thứ hai
 * Đổi tên Bang / Hạt thành Tỉnh / Thành
 * Đổi tên Tỉnh / Thành phố thành Quận / Huyện
 * 
 * 
 * @hook woocommerce_checkout_fields
 * @param $fields
 * @return mixed
 */
function tp_custom_checkout_fields( $fields ) {
 // Ẩn mã bưu chính
 unset( $fields['postcode'] );
 
 // Ẩn địa chỉ thứ hai
 unset( $fields['address_2'] );

 
 // Đổi tên Bang / Hạt thành Tỉnh / Thành
 $fields['state']['label'] = 'Tỉnh / Thành';
 
 // Đổi tên Tỉnh / Thành phố thành Quận / Huyện
 $fields['city']['label'] = 'Quận / Huyện';
 
 return $fields;
}
add_filter( 'woocommerce_default_address_fields', 'tp_custom_checkout_fields' );
?>