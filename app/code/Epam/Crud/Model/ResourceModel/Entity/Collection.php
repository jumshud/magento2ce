<?php
declare(strict_types=1);

namespace Epam\Crud\Model\ResourceModel\Entity;

use Epam\Crud\Model\Entity;
use Epam\Crud\Model\ResourceModel\Entity as EntityResource;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * @inheritDoc
    */
    protected function _construct()
    {
        $this->_init(Entity::class, EntityResource::class);
    }
}
