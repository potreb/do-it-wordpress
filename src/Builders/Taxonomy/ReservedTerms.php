<?php

namespace DoItWP\Builders\Taxonomy;

/**
 * Get reserved terms.
 *
 * @see https://developer.wordpress.org/reference/functions/register_taxonomy/#reserved-terms
 */
class ReservedTerms {

    /**
     * @return string[]
     */
    public static function get() {
        return [
            'attachment',
            'attachment_id',
            'author',
            'author_name',
            'calendar',
            'cat',
            'category',
            'category__and',
            'category__in',
            'category__not_in',
            'category_name',
            'comments_per_page',
            'comments_popup',
            'custom',
            'customize_messenger_channel',
            'customized',
            'cpage',
            'day',
            'debug',
            'embed',
            'error',
            'exact',
            'feed',
            'fields',
            'hour',
            'link_category',
            'm',
            'minute',
            'monthnum',
            'more',
            'name',
            'nav_menu',
            'nonce',
            'nopaging',
            'offset',
            'order',
            'orderby',
            'p',
            'page',
            'page_id',
            'paged',
            'pagename',
            'pb',
            'perm',
            'post',
            'post__in',
            'post__not_in',
            'post_format',
            'post_mime_type',
            'post_status',
            'post_tag',
            'post_type',
            'posts',
            'posts_per_archive_page',
            'posts_per_page',
            'preview',
            'robots',
            's',
            'search',
            'second',
            'sentence',
            'showposts',
            'static',
            'status',
            'subpost',
            'subpost_id',
            'tag',
            'tag__and',
            'tag__in',
            'tag__not_in',
            'tag_id',
            'tag_slug__and',
            'tag_slug__in',
            'taxonomy',
            'tb',
            'term',
            'terms',
            'theme',
            'title',
            'type',
            'types',
            'w',
            'withcomments',
            'withoutcomments',
            'year'
        ];
    }
}
