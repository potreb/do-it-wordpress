<?php

namespace DoItWP\Builders\Abstracts;

/**
 * Labels object definition must always has get method.
 *
 * @package DoItWP\Builders\Abstracts
 */
interface LabelsInterface {

    /**
     * @return array
     */
    public function get(): array;


}
