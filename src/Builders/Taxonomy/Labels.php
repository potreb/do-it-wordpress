<?php

namespace DoItWP\Builders\Taxonomy;

use DoItWP\Builders\Abstracts\LabelsInterface;

/**
 * Labels declaration for custom post type.
 *
 * @package DoItWP\Builders\Taxonomy
 */
final class Labels implements LabelsInterface {

    /**
     * @var array
     */
    private $args = [];

    public function __construct() {
        $this->set_defaults();
    }

    /**
     * @return Labels
     */
    private function set_defaults(): Labels {
        $this->args = array(
            'name'               => _x( 'Post Type Name', 'Post Type General Name', 'training-language' ),
            'singular_name'      => _x( 'Post Type Name', 'Post Type Singular Name', 'training-language' ),
            'menu_name'          => __( 'Post Type Name', 'training-language' ),
            'parent_item_colon'  => __( 'Parent Item:', 'training-language' ),
            'all_items'          => __( 'All Items', 'training-language' ),
            'view_item'          => __( 'View Item', 'training-language' ),
            'add_new_item'       => __( 'Add New Item', 'training-language' ),
            'add_new'            => __( 'Add New', 'training-language' ),
            'edit_item'          => __( 'Edit Item', 'training-language' ),
            'update_item'        => __( 'Update Item', 'training-language' ),
            'search_items'       => __( 'Search Item', 'training-language' ),
            'not_found'          => __( 'Not found', 'training-language' ),
            'not_found_in_trash' => __( 'Not found in Trash', 'training-language' ),
        );

        return $this;
    }

    /**
     * @param string $name
     *
     * @return Labels
     */
    public function set_name( string $name ): Labels {
        $this->args['name'] = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function get_name(): string {
        return $this->args['name'];
    }

    /**
     * @param string $description
     *
     * @return Labels
     */
    public function set_description( string $description ): Labels {
        $this->args['description'] = $description;

        return $this;
    }

    /**
     * @return string
     */
    public function get_description(): string {
        return $this->args['description'];
    }

    /**
     * @param string $singular_name
     *
     * @return Labels
     */
    public function set_singular_name( string $singular_name ): Labels {
        $this->args['singular_name'] = $singular_name;

        return $this;
    }

    /**
     * @param string $menu_name
     *
     * @return Labels
     */
    public function set_menu_name( string $menu_name ): Labels {
        $this->args['menu_name'] = $menu_name;

        return $this;
    }

    /**
     * @param string $parent_item_colon
     *
     * @return Labels
     */
    public function set_parent_item_colon( string $parent_item_colon ): Labels {
        $this->args['parent_item_colon'] = $parent_item_colon;

        return $this;
    }

    /**
     * @param string $all_items
     *
     * @return Labels
     */
    public function set_all_items( string $all_items ): Labels {
        $this->args['all_items'] = $all_items;

        return $this;
    }

    /**
     * @param string $view_item
     *
     * @return Labels
     */
    public function set_view_item( string $view_item ): Labels {
        $this->args['view_item'] = $view_item;

        return $this;
    }

    /**
     * @param string $add_new_item
     *
     * @return Labels
     */
    public function set_add_new_item( string $add_new_item ): Labels {
        $this->args['add_new_item'] = $add_new_item;

        return $this;
    }

    /**
     * @param string $add_new
     *
     * @return Labels
     */
    public function set_add_new( string $add_new ): Labels {
        $this->args['add_new'] = $add_new;

        return $this;
    }

    /**
     * @param string $edit_item
     *
     * @return Labels
     */
    public function set_edit_item( string $edit_item ): Labels {
        $this->args['edit_item'] = $edit_item;

        return $this;
    }

    /**
     * @param string $update_item
     *
     * @return Labels
     */
    public function set_update_item( string $update_item ): Labels {
        $this->args['update_item'] = $update_item;

        return $this;
    }

    /**
     * @param string $search_items
     *
     * @return Labels
     */
    public function set_search_items( string $search_items ): Labels {
        $this->args['search_items'] = $search_items;

        return $this;
    }

    /**
     * @param string $not_found
     *
     * @return Labels
     */
    public function set_not_found( string $not_found ): Labels {
        $this->args['not_found'] = $not_found;

        return $this;
    }

    /**
     * @param string $not_found_in_trash
     *
     * @return Labels
     */
    public function set_not_found_in_trash( string $not_found_in_trash ): Labels {
        $this->args['not_found_in_trash'] = $not_found_in_trash;

        return $this;
    }

    /**
     * @return array
     */
    public function get() {
        return $this->args;
    }


}
