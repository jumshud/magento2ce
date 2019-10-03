<?php
declare(strict_types=1);

namespace Epam\Webapi\Api;

use Doctrine\Common\Collections\ArrayCollection;

interface TestServiceInterface
{
    /**
     * Get customers list
     *
     * @return mixed
     */
    public function listCustomers(): array;
}
