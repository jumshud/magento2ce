<?php

namespace Epam\DI\Model;

use Epam\DI\Api\CustomInterface;
use Epam\DI\Api\HtmlGenerator;

/**
 * @api
*/
class HtmlService implements HtmlGenerator
{
    /**
     * @var CustomInterface
    */
    private $custom;

    /**
     * @param CustomInterface $custom
     * @return void
     */
    public function __construct(CustomInterface $custom)
    {
        $this->custom = $custom;
    }

    /**
     * @return string
     */
    public function getHtml(): string
    {
        $text = '<h3>Snippet text: ' . $this->custom->getText() . '</h3>';
        $text .= '<p>Items: ' . json_encode($this->custom->getItems()) . '</p>';

        return $text;
    }
}
