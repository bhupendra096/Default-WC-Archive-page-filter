<?php 

//https://blog.templatetoaster.com/create-woocommerce-theme/
add_action( 'woocommerce_before_shop_loop_item', 'wc_template_loop_product_link_open', 10 );
if ( ! function_exists( 'wc_template_loop_product_link_open' ) ) {
	/* Insert the opening anchor tag for products in the loop. */
	function wc_template_loop_product_link_open() {
		global $product;
		$link = apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product );
		return '<a href="' . esc_url( $link ) . '" class="pintu_a woocommerce-LoopProduct-link woocommerce-loop-product__link">';
	}
}


add_action( 'woocommerce_before_shop_loop_item_title', 'wc_template_loop_product_thumbnail', 10 );
if ( ! function_exists( 'wc_template_loop_product_thumbnail' ) ) {
	/* Get the product thumbnail for the loop. */
	function wc_template_loop_product_thumbnail() {
		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		return woocommerce_get_product_thumbnail();
	}
}

add_action( 'woocommerce_shop_loop_item_title', 'wc_template_loop_product_title', 10 );
if ( ! function_exists( 'wc_template_loop_product_title' ) ) {
	/* Show the product title in the product loop. By default this is an H2. */
	function wc_template_loop_product_title() {
		return '<h6 class="pintu_heading' . esc_attr( apply_filters( 'woocommerce_product_loop_title_classes', 'woocommerce-loop-product__title' ) ) . '">' . get_the_title() . '</h2>'; 
		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}

/*add_action( 'woocommerce_after_shop_loop_item_title', 'wc_template_loop_price', 10 );
if ( ! function_exists( 'wc_template_loop_price' ) ) {
	// Get the product price for the loop. 
	function wc_template_loop_price() {
		return wc_get_template( 'loop/price.php' );
	}
}*/

/*add_action( 'woocommerce_after_shop_loop_item_title', 'wc_template_loop_rating', 9 );
if ( ! function_exists( 'wc_template_loop_rating' ) ) {
	// Display the average rating in the loop.
	function wc_template_loop_rating() {
		wc_get_template( 'loop/rating.php' );
	}
}*/

add_action( 'woocommerce_after_shop_loop_item', 'wc_template_loop_product_link_close', 10 );
if ( ! function_exists( 'wc_template_loop_product_link_close' ) ) {
	/* Insert the closing anchor tag for products in the loop.*/
	function wc_template_loop_product_link_close() {
		return '</a>';
	}
}


?>
