<?php
declare(strict_types=1);

namespace Epam\Webapi\Api;

interface TestServiceInterface
{
    /**
     * Get customers according limit
     *
     * @return array
     */
    public function listCustomers(): array;
}
