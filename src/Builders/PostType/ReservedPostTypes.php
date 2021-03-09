<?php

namespace DoItWP\Builders\Taxonomy;

/**
 * Get reserved post types.
 *
 * @see https://developer.wordpress.org/reference/functions/register_post_type/#reserved-post-types
 */
class ReservedPostTypes {

    /**
     * @return string[]
     */
    public static function get() {
        return [
            'post',
            'page',
            'attachment',
            'revision',
            'nav_menu_item',
            'custom_css',
            'customize_changeset',
            'oembed_cache',
            'user_request',
            'wp_block',

        ];
    }
}
