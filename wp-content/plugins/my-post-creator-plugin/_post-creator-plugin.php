<?php
/**
* Plugin Name: Post Creator Plugin
* Plugin URI: ''
* Description: A plugin to create posts
* Version: 1.0
* Author: Omer Ceder
* Author URI: https://github.com/omerceder/
*/

namespace PostCreatorPlugin;

/**
 * Interface for WordPress custom post types.
 */
interface PostTypeInterface
{
    /**
     * Get the post data as a wp_insert_post compatible array.
     *
     * @return array
     */
    public function get_post_data();

    /**
     * Get all the post meta as a key-value associative array.
     *
     * @return array
     */
    public function get_post_meta();
}

/**
 * A Product.
 */
class Product implements PostTypeInterface
{
    /**
     * The key used by the product post type.
     *
     * @var string
     */
    const POST_TYPE = 'product';

    /**
     * The description of the product.
     *
     * @var string
     */
    private $description;

    /**
     * The name of the product.
     *
     * @var string
     */
    private $name;

    /**
     * The price of the product.
     *
     * @var float
     */
    private $price;

    /**
     * Constructor.
     *
     * @param string $name
     * @param float  $price
     * @param string $description
     */
    public function __construct($name, $price, $description = '')
    {
        $this->description = $description;
        $this->name = $name;
        $this->price = $price;
    }

    /**
     * Get the product data as a wp_insert_post compatible array.
     *
     * @return array
     */
    public function get_post_data()
    {
        return array(
            'post_content'  => $this->description,
            'post_title'    => $this->name,
            'post_status'   => 'publish',
            'post_type'     => self::POST_TYPE
        );
    }

    /**
     * Get all the post meta as a key-value associative array.
     *
     * @return array
     */
    public function get_post_meta()
    {
        return array(
          'price' => $this->price
        );
    }
}

/**
 * Insert or update a custom post type.
 *
 * @param PostTypeInterface $post
 * @param bool              $wp_error
 *
 * @return int|WP_Error
 */
function wp_insert_custom_post(PostTypeInterface $post, $wp_error = false)
{
    $post_id = wp_insert_post($post->get_post_data(), $wp_error);

    if (0 === $post_id || $post_id instanceof WP_Error) {
        return $post_id;
    }

    foreach ($post->get_post_meta() as $key => $value) {
        update_post_meta($post_id, $key, $value);
    }

    return $post_id;
}
