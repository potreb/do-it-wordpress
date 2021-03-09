<?php

namespace DoItWP\Builders\PostType;

/**
 * Rewrite declaration for post type registration.
 *
 * @package DoItWP\Builders\PostType
 */
final class Rewrite {

	/**
	 * @var array
	 */
	private $args = [];

	/**
	 * @param string $slug
	 *
	 * @return Rewrite
	 */
	public function set_slug( string $slug ): Rewrite {
		$this->args['slug'] = $slug;

		return $this;
	}

	/**
	 * @param bool $with_front
	 *
	 * @return Rewrite
	 */
	public function set_with_front( bool $with_front ): Rewrite {
		$this->args['with_front'] = $with_front;

		return $this;
	}


	/**
	 * @param bool $feeds
	 *
	 * @return Rewrite
	 */
	public function set_feeds( bool $feeds ): Rewrite {
		$this->args['feeds'] = $feeds;

		return $this;
	}

	/**
	 * @param bool $pages
	 *
	 * @return Rewrite
	 */
	public function set_pages( bool $pages ): Rewrite {
		$this->args['pages'] = $pages;

		return $this;
	}

	/**
	 * @param string $ep_mask
	 *
	 * @return Rewrite
	 */
	public function set_ep_mask( string $ep_mask ): Rewrite {
		$this->args['ep_mask'] = $ep_mask;

		return $this;
	}

	/**
	 * @return array
	 */
	public function get() {
		return $this->args;
	}

}
