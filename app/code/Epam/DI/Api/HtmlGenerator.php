<?php

namespace Epam\DI\Api;

/**
 * @api
*/
interface HtmlGenerator
{
    /**
     * @param CustomInterface $custom
     * @return void
     */
    public function __construct(CustomInterface $custom);

    /**
     * @return string
     */
    public function getHtml(): string;
}