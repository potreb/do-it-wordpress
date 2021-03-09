<?php

namespace DoItWP\Builders\PostType;

use DoItWP\Builders\Abstracts\RegisterInterface;
use DoItWP\Builders\Exceptions\BuilderException;
use DoItWP\Builders\Taxonomy\ReservedPostTypes;

/**
 * Define custom post type.
 *
 * @package DoItWP\Builders\PostType
 */
final class PostType implements RegisterInterface {

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
	 * @param string $post_type_slug
	 * @param Labels $labels
	 * @param string $description
	 */
	public function __construct( string $post_type_slug, Labels $labels ) {
		$this->set_slug( $post_type_slug );
		$this->set_label( $labels->get_name() );
		$this->set_description( $labels->get_description() );
	}

	/**
	 * @param string $post_type_slug
	 *
	 * @return PostType
	 */
	private function set_slug( string $post_type_slug ): PostType {
		$reserved_terms = ReservedPostTypes::get();
		if ( in_array( $post_type_slug, $reserved_terms, true ) ) {
			throw new BuilderException( 'Defined post type key is prohibited. Use another!' );
		}
		if ( strlen( $post_type_slug ) > 20 ) {
			throw new BuilderException( 'The defined post type key has more than 20 characters.' );
		}
		$this->args['slug'] = $post_type_slug;

		return $this;
	}

	/**
	 * @return string
	 */
	private function get_slug(): string {
		return $this->args['slug'];
	}

	/**
	 * @param string $label
	 *
	 * @return PostType
	 */
	private function set_label( string $label ): PostType {
		$this->args['label'] = $label;

		return $this;
	}

	/**
	 * @param string $description
	 *
	 * @return PostType
	 */
	private function set_description( string $description ): PostType {
		$this->args['description'] = $description;

		return $this;
	}

	/**
	 * @param Labels $labels
	 *
	 * @return PostType
	 */
	public function set_labels( Labels $labels ): PostType {
		$this->args['labels'] = $labels->get();

		return $this;
	}

	/**
	 * @param array $supports
	 *
	 * @return PostType
	 */
	public function set_supports( array $supports ): PostType {
		$this->args['supports'] = $supports;

		return $this;
	}

	/**
	 * @param array $taxonomies
	 *
	 * @return PostType
	 */
	public function set_taxonomies( array $taxonomies ): PostType {
		$this->args['taxonomies'] = $taxonomies;

		return $this;
	}

	/**
	 * @param bool $hierarchical
	 *
	 * @return PostType
	 */
	public function set_hierarchical( bool $hierarchical ): PostType {
		$this->args['hierarchical'] = $hierarchical;

		return $this;
	}

	/**
	 * @param bool $public
	 *
	 * @return PostType
	 */
	public function set_public( bool $public ): PostType {
		$this->args['public'] = $public;

		return $this;
	}

	/**
	 * @param bool $show_ui
	 *
	 * @return PostType
	 */
	public function set_show_ui( bool $show_ui ): PostType {
		$this->args['show_ui'] = $show_ui;

		return $this;
	}

	/**
	 * @param bool|string $show_in_menu
	 *
	 * @return PostType
	 */
	public function set_show_in_menu( $show_in_menu ): PostType {
		$this->args['show_in_menu'] = $show_in_menu;

		return $this;
	}

	/**
	 * @param string $menu_position
	 *
	 * @return PostType
	 */
	public function set_menu_position( string $menu_position ): PostType {
		$this->args['menu_position'] = $menu_position;

		return $this;
	}

	/**
	 * @param string $menu_icon
	 *
	 * @return PostType
	 */
	public function set_menu_icon( string $menu_icon ): PostType {
		$this->args['menu_icon'] = $menu_icon;

		return $this;
	}

	/**
	 * @param bool $query_var
	 *
	 * @return PostType
	 */
	public function set_query_var( bool $query_var ): PostType {
		$this->args['query_var'] = $query_var;

		return $this;
	}

	/**
	 * @param bool $show_in_admin_bar
	 *
	 * @return PostType
	 */
	public function set_show_in_admin_bar( bool $show_in_admin_bar ): PostType {
		$this->args['show_in_admin_bar'] = $show_in_admin_bar;

		return $this;
	}

	/**
	 * @param bool $show_in_nav_menus
	 *
	 * @return PostType
	 */
	public function set_show_in_nav_menus( bool $show_in_nav_menus ): PostType {
		$this->args['show_in_nav_menus'] = $show_in_nav_menus;

		return $this;
	}

	/**
	 * @param bool $can_export
	 *
	 * @return PostType
	 */
	public function set_can_export( bool $can_export ): PostType {
		$this->args['can_export'] = $can_export;

		return $this;
	}

	/**
	 * @param bool $has_archive
	 *
	 * @return PostType
	 */
	public function set_has_archive( bool $has_archive ): PostType {
		$this->args['has_archive'] = $has_archive;

		return $this;
	}

	/**
	 * @param bool $exclude_from_search
	 *
	 * @return PostType
	 */
	public function set_exclude_from_search( bool $exclude_from_search ): PostType {
		$this->args['exclude_from_search'] = $exclude_from_search;

		return $this;
	}

	/**
	 * @param bool $publicly_queryable
	 *
	 * @return PostType
	 */
	public function set_publicly_queryable( bool $publicly_queryable ): PostType {
		$this->args['publicly_queryable'] = $publicly_queryable;

		return $this;
	}

	/**
	 * @param string $capability_type
	 *
	 * @return PostType
	 */
	public function set_capability_type( string $capability_type ): PostType {
		$this->args['capability_type'] = $capability_type;

		return $this;
	}

	/**
	 * @param array $capabilities
	 *
	 * @return PostType
	 */
	public function set_capabilities( array $capabilities ): PostType {
		$this->args['capabilities'] = $capabilities;

		return $this;
	}

	/**
	 * @param array $map_meta_cap
	 *
	 * @return PostType
	 */
	public function set_map_meta_cap( array $map_meta_cap ): PostType {
		$this->args['map_meta_cap'] = $map_meta_cap;

		return $this;
	}

	/**
	 * @param bool $show_in_rest
	 *
	 * @return PostType
	 */
	public function set_show_in_rest( bool $show_in_rest ): PostType {
		$this->args['show_in_rest'] = $show_in_rest;

		return $this;
	}

	/**
	 * @param string $rest_base
	 *
	 * @return PostType
	 */
	public function set_rest_base( string $rest_base ): PostType {
		$this->args['rest_base'] = $rest_base;

		return $this;
	}

	/**
	 * @param string $rest_controller_class
	 *
	 * @return PostType
	 */
	public function set_rest_controller_class( string $rest_controller_class ): PostType {
		$this->args['rest_controller_class'] = $rest_controller_class;

		return $this;
	}

	/**
	 * @param Rewrite $rewrite
	 *
	 * @return PostType
	 */
	public function set_rewrite( Rewrite $rewrite ): PostType {
		$this->args['rewrite'] = $rewrite->get();

		return $this;
	}

	/**
	 * @return void
	 */
	public function register() {
		register_post_type( $this->get_slug(), $this->args );
	}


}
