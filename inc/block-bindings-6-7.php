<?php
/**
 * Testing out WP 6.7 Block Bindings stuff.
 *
 * @see Block Bindings iteration for WordPress 6.7 #63018
 * @link https://github.com/WordPress/gutenberg/issues/63018
 *
 * @package demo-plugin
 */

add_action( 'enqueue_block_editor_assets', 'demo_block_bindings_source_client_filters' );
add_action( 'init', 'demo_register_meta' );
add_action( 'init', 'demo_register_block_bindings' );

add_filter( 'block_bindings_source_value', 'demo_filter_text_meta_value', 10, 3 );

/**
 * Testing out: Block bindings: UI for connecting bindings #62880
 *
 * @link https://github.com/WordPress/gutenberg/pull/62880
 */
function demo_register_meta() {
	register_meta(
		'post',
		'demo_image',
		array(
			'label'        => 'Demo Image', // #65099
			'show_in_rest' => true,
			'single'       => true,
			'type'         => 'string',
			'default'      => 'https://www.pokemon.com/static-assets/content-assets/cms2/img/pokedex/full/006.png',
		)
	);

	register_meta(
		'post',
		'demo_text',
		array(
			'label'        => 'Demo text', // #65099
			'show_in_rest' => true,
			'single'       => true,
			'type'         => 'string',
			'default'      => 'Demo text is wonderful.',
		)
	);
}

/**
 * Testing: Adds a filter to customize the output of a block bindings source. #6839
 * https://github.com/WordPress/wordpress-develop/pull/6839
 *
 * @param mixed $value The computed value for the source.
 * @param string $source_name The name of the source.
 * @param array $source_args Array containing source arguments used to look up the override value, i.e. { "key": "foo" }.
 *
 * @return mixed The value of the source.
 */
function demo_filter_text_meta_value( $value, $source_name, $source_args ) {
	if ( 'core/post-meta' !== $source_name ) {
		return $value;
	}
	if ( 'demo_text' !== $source_args['key'] ) {
		return $value;
	}
	return 'Demo text is wonderful. 🚀';
}

/**
 * Register custom block bindings source.
 *
 * @link https://developer.wordpress.org/news/2024/03/06/introducing-block-bindings-part-2-working-with-custom-binding-sources/#registering-a-custom-binding-source
 *
 * @return void
 * @see demo_test_bindings()
 */
function demo_register_block_bindings() {
	register_block_bindings_source(
		'demo/just-a-test',
		array(
			'label'              => __( 'Just a test', 'demo' ),
			'get_value_callback' => 'demo_test_bindings',
		)
	);
}

/**
 * Callable demo test bindings function.
 *
 * This function checks if the 'key' in the source arguments is set and equals 'test-test'.
 * If the condition is met, it returns 'Hello world.'; otherwise, it returns null.
 *
 * @param array $source_args The source arguments to check.
 *
 * @return string|null Returns 'Hello world.' if the 'key' is set and equals 'test-test', otherwise null.
 */
function demo_test_bindings( $source_args ) {
	if ( ! isset( $source_args['key'] ) || 'test-test' !== $source_args['key'] ) {
		return null;
	}

	return 'Hello world.';
}

/**
 * Enqueue block editor assets.
 *
 * @return void
 */
function demo_block_bindings_source_client_filters() {
	wp_enqueue_script(
		'demo-block-bindings-source-client-filters',
		plugins_url( 'block-bindings-filters.js', __FILE__ ),
		array( 'wp-blocks' ),
		filemtime( plugin_dir_path( __FILE__ ) . 'block-bindings-filters.js' ),
	);
}