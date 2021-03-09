<?php

namespace DoItWP\Builders\Abstracts;

/**
 * For registration post type or taxonomy always use register method.
 *
 * @package DoItWP\Builders\Abstracts
 */
interface RegisterInterface {

    /**
     * @return void
     */
    public function register();


}
