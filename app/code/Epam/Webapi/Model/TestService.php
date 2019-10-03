<?php
declare(strict_types=1);

namespace Epam\Webapi\Model;

use Epam\Webapi\Api\TestServiceInterface;

class TestService implements TestServiceInterface
{

    /**
     * @inheritDoc
     */
    public function listCustomers(): array
    {
        return [
            ['id' => 1, 'name' => ' John', 'status' => 'active'],
            ['id' => 2, 'name' => ' Jane', 'status' => 'suspended']
        ];
    }
}
