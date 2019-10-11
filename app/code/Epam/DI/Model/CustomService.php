<?php
declare(strict_types=1);

namespace Epam\DI\Model;

use Epam\DI\Api\CustomInterface;

/**
 * @api
 */
class CustomService implements CustomInterface
{
    /**
     * @var string
    */
    protected $snippetText;

    /**
     * @var array
    */
    protected $snippetArray;

    /**
     * @param string $text
     * @param array  $items
     */
    public function __construct(string $text, array $items)
    {
        $this->snippetText = $text;
        $this->snippetArray = $items;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->snippetText;
    }

    /**
     * @return array
     */
    public function getItems(): array
    {
        return $this->snippetArray;
    }
}