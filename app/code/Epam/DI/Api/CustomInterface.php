<?php

namespace Epam\DI\Api;

/**
 * @api
*/
interface CustomInterface
{
    /**
     * @return string
     */
    public function getText(): string;

    /**
     * @return array
     */
    public function getItems(): array;
}