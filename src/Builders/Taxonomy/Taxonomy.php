<?php

namespace DoItWP\Builders\Taxonomy;

use DoItWP\Builders\Abstracts\RegisterInterface;
use DoItWP\Builders\Exceptions\BuilderException;

/**
 * Define custom taxonomy.
 *
 * @package DoItWP\Builders\Taxonomy
 */
final class Taxonomy implements RegisterInterface {

    /**
     * @var string
     */
    private $taxonomy_slug;

    /**
     * @var string
     */
    private $post_type;

    /**
     * @var array
     */
    private $args = [
        'slug'                => 'post_type_slug',
        'labels'              => [],
        'supports'            => array( 'title', 'editor' ),
        'taxonomies'          => [],
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 5,
        'show_in_admin_bar'   => true,
        'show_in_nav_menus'   => true,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'query_var'           => true,
        'capability_type'     => 'page',
    ];

    /**
     * @param string       $taxonomy_slug  Taxonomy key, must not exceed 32 characters.
     * @param string|array $post_type_slug Object type or array of object types with which the taxonomy should be associated.
     * @param Labels       $labels         Object of taxonomy labels passed from library.
     */
    public function __construct( string $taxonomy_slug, $post_type_slug, Labels $labels ) {
        $this->set_taxonomy_slug( $taxonomy_slug );
        $this->set_post_type_slug( $post_type_slug );
        $this->set_labels( $labels );
        $this->set_description( $labels->get_description() );
    }

    /**
     * Set taxonomy key, must not exceed 32 characters.
     *
     * @param string $taxonomy_slug
     *
     * @throws BuilderException Throw exception when slug is not valid.
     */
    private function set_taxonomy_slug( string $taxonomy_slug ) {
        $reserved_terms = ReservedTerms::get();
        if ( in_array( $taxonomy_slug, $reserved_terms, true ) ) {
            throw new BuilderException( 'Defined taxonomy slug is prohibited. Use another!' );
        }
        if ( strlen( $taxonomy_slug ) > 32 ) {
            throw new BuilderException( 'The defined taxonomy identifier has more than 32 characters.' );
        }
        $this->taxonomy_slug = $taxonomy_slug;
    }

    /**
     * @return string
     */
    private function get_taxonomy_slug(): string {
        return $this->taxonomy_slug;
    }

    /**
     * Object type or array of object types with which the taxonomy should be associated.
     *
     * @param string|array $post_type_slug
     */
    private function set_post_type_slug( $post_type_slug ) {
        $this->post_type = $post_type_slug;
    }

    /**
     * @return string|array
     */
    private function get_post_type_slug(): string {
        return $this->post_type;
    }

    /**
     * An array of labels for this taxonomy.
     * By default, Tag labels are used for non-hierarchical taxonomies, and Category labels are used for hierarchical taxonomies.
     * @see https://developer.wordpress.org/reference/functions/get_taxonomy_labels/
     *
     * @param Labels $labels
     *
     * @return Taxonomy
     */
    public function set_labels( Labels $labels ): Taxonomy {
        $this->args['labels'] = $labels->get();

        return $this;
    }

    /**
     * A short descriptive summary of what the taxonomy is for.
     *
     * @param string $description
     *
     * @return Taxonomy
     */
    private function set_description( string $description ): Taxonomy {
        $this->args['description'] = $description;

        return $this;
    }

    /**
     * Whether a taxonomy is intended for use publicly either via the admin interface or by front-end users.
     * The default settings of $publicly_queryable, $show_ui, and $show_in_nav_menus are inherited from $public.
     *
     * @param bool $public
     *
     * @return Taxonomy
     */
    public function set_public( bool $public ): Taxonomy {
        $this->args['public'] = $public;

        return $this;
    }

    /**
     * Whether the taxonomy is publicly queryable. If not set, the default is inherited from $public.
     *
     * @param bool $publicly_queryable
     *
     * @return Taxonomy
     */
    public function set_publicly_queryable( bool $publicly_queryable ): Taxonomy {
        $this->args['publicly_queryable'] = $publicly_queryable;

        return $this;
    }

    /**
     * Whether the taxonomy is hierarchical. Default false.
     *
     * @param bool $hierarchical
     *
     * @return Taxonomy
     */
    public function set_hierarchical( bool $hierarchical ): Taxonomy {
        $this->args['hierarchical'] = $hierarchical;

        return $this;
    }

    /**
     * Whether to generate and allow a UI for managing terms in this taxonomy in the admin.
     * If not set, the default is inherited from $public (default true).
     *
     * @param bool $show_ui
     *
     * @return Taxonomy
     */
    public function set_show_ui( bool $show_ui ): Taxonomy {
        $this->args['show_ui'] = $show_ui;

        return $this;
    }

    /**
     * Whether to show the taxonomy in the admin menu.
     * If true, the taxonomy is shown as a submenu of the object type menu. If false, no menu is shown.
     * $show_ui must be true. If not set, default is inherited from $show_ui (default true).
     *
     * @param bool|string $show_in_menu
     *
     * @return Taxonomy
     */
    public function set_show_in_menu( $show_in_menu ): Taxonomy {
        $this->args['show_in_menu'] = $show_in_menu;

        return $this;
    }

    /**
     * Makes this taxonomy available for selection in navigation menus.
     * If not set, the default is inherited from $public (default true).
     *
     * @param bool $show_in_nav_menus
     *
     * @return Taxonomy
     */
    public function set_show_in_nav_menus( bool $show_in_nav_menus ): Taxonomy {
        $this->args['show_in_nav_menus'] = $show_in_nav_menus;

        return $this;
    }

    /**
     * Whether to include the taxonomy in the REST API.
     * Set this to true for the taxonomy to be available in the block editor.
     *
     * @param bool $show_in_rest
     *
     * @return Taxonomy
     */
    public function set_show_in_rest( bool $show_in_rest ): Taxonomy {
        $this->args['show_in_rest'] = $show_in_rest;

        return $this;
    }

    /**
     * To change the base url of REST API route. Default is $taxonomy.
     *
     * @param string $rest_base
     *
     * @return Taxonomy
     */
    public function set_rest_base( string $rest_base ): Taxonomy {
        $this->args['rest_base'] = $rest_base;

        return $this;
    }

    /**
     * REST API Controller class name.
     * Default is 'WP_REST_Terms_Controller'.
     *
     * @param string $rest_controller_class
     *
     * @return Taxonomy
     */
    public function set_rest_controller_class( string $rest_controller_class ): Taxonomy {
        $this->args['rest_controller_class'] = $rest_controller_class;

        return $this;
    }

    /**
     * Whether to list the taxonomy in the Tag Cloud Widget controls.
     * If not set, the default is inherited from $show_ui (default true).
     *
     * @param bool $show_tagcloud
     *
     * @return Taxonomy
     */
    public function set_show_tagcloud( bool $show_tagcloud ): Taxonomy {
        $this->args['show_tagcloud'] = $show_tagcloud;

        return $this;
    }

    /**
     * Whether to show the taxonomy in the quick/bulk edit panel.
     * It not set, the default is inherited from $show_ui (default true).
     *
     * @param bool $show_in_quick_edit
     *
     * @return Taxonomy
     */
    public function set_show_in_quick_edit( bool $show_in_quick_edit ): Taxonomy {
        $this->args['show_in_quick_edit'] = $show_in_quick_edit;

        return $this;
    }

    /**
     * Whether to display a column for the taxonomy on its post type listing screens.
     * Default false.
     *
     * @param bool $show_admin_column
     *
     * @return Taxonomy
     */
    public function set_show_admin_column( bool $show_admin_column ): Taxonomy {
        $this->args['show_admin_column'] = $show_admin_column;

        return $this;
    }

    /**
     * Provide a callback function for the meta box display.
     * If not set, post_categories_meta_box() is used for hierarchical taxonomies, and post_tags_meta_box() is used for non-hierarchical.
     * If false, no meta box is shown.
     *
     * @param bool|callable $meta_box_cb
     *
     * @return Taxonomy
     */
    public function set_meta_box_cb( $meta_box_cb ): Taxonomy {
        $this->args['meta_box_cb'] = $meta_box_cb;

        return $this;
    }

    /**
     * Callback function for sanitizing taxonomy data saved from a meta box.
     * If no callback is defined, an appropriate one is determined based on the value of $meta_box_cb.
     *
     * @param bool|callable $meta_box_sanitize_cb
     *
     * @return Taxonomy
     */
    public function set_meta_box_sanitize_cb( $meta_box_sanitize_cb ): Taxonomy {
        $this->args['meta_box_sanitize_cb'] = $meta_box_sanitize_cb;

        return $this;
    }

    /**
     * Array of capabilities for this taxonomy.
     *
     * @param array $capabilities
     *
     * @return Taxonomy
     */
    public function set_capabilities( array $capabilities ): Taxonomy {
        $this->args['capabilities'] = $capabilities;

        return $this;
    }

    /**
     * Triggers the handling of rewrites for this taxonomy.
     * Default true, using $taxonomy as slug. To prevent rewrite, set to false. To specify rewrite rules, an array can be passed with any of these keys:
     *
     * @param Rewrite $rewrite
     *
     * @return Taxonomy
     */
    public function set_rewrite( Rewrite $rewrite ): Taxonomy {
        $this->args['rewrite'] = $rewrite->get();

        return $this;
    }

    /**
     * Sets the query var key for this taxonomy.
     * Default $taxonomy key. If false, a taxonomy cannot be loaded at ?{query_var}={term_slug}.
     * If a string, the query ?{query_var}={term_slug} will be valid.
     *
     * @param bool $query_var
     *
     * @return Taxonomy
     */
    public function set_query_var( bool $query_var ): Taxonomy {
        $this->args['query_var'] = $query_var;

        return $this;
    }

    /**
     * Works much like a hook, in that it will be called when the count is updated.
     * Default _update_post_term_count() for taxonomies attached to post types,
     * which confirms that the objects are published before counting them.
     *
     * Default _update_generic_term_count() for taxonomies
     * attached to other object types, such as users.
     *
     * @param callable $update_count_callback
     *
     * @return Taxonomy
     */
    public function set_update_count_callback( callable $update_count_callback ): Taxonomy {
        $this->args['update_count_callback'] = $update_count_callback;

        return $this;
    }

    /**
     * Default term to be used for the taxonomy.
     *
     * @param array $default_term
     *
     * @return Taxonomy
     */
    public function set_default_term( array $default_term ): Taxonomy {
        $this->args['default_term'] = $default_term;

        return $this;
    }


    /**
     * @return void
     */
    public function register() {
        register_taxonomy( $this->get_taxonomy_slug(), $this->get_post_type_slug(), $this->args );
    }


}
