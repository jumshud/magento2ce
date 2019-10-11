<?php
declare(strict_types=1);

namespace Epam\DI\Api;

/**
 * @api
*/
interface HtmlGenerator
{
    /**
     * @return string
     */
    public function getHtml(): string;
}
