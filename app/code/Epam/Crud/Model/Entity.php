<?php
declare(strict_types=1);

namespace Epam\Crud\Model;

use Epam\Crud\Api\Data\EntityInterface;
use Epam\Crud\Model\ResourceModel\Entity as EntityResource;
use Magento\Framework\Model\AbstractModel;

class Entity extends AbstractModel implements EntityInterface
{
    /**
     * @inheritDoc
    */
    protected function _construct()
    {
        $this->_init(EntityResource::class);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->getData(self::NAME);
    }

    /**
     * @param string $name
     *
     * @return EntityInterface
     */
    public function setName(string $name): EntityInterface
    {
        return $this->setData(self::NAME, $name);
    }

    /**
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * @param string $date
     *
     * @return EntityInterface
     */
    public function setCreatedAt(string $date): EntityInterface
    {
        return $this->setData(self::CREATED_AT, $date);
    }

    /**
     * @return string
     */
    public function getUpdatedAt(): string
    {
        return $this->getData(self::UPDATED_AT);
    }

    /**
     * @param string $date
     *
     * @return EntityInterface
     */
    public function setUpdatedAt(string $date): EntityInterface
    {
        return $this->setData(self::UPDATED_AT, $date);
    }

    /**
     * @return int
     */
    public function getIsActive(): int
    {
        return $this->getData(self::NAME);
    }

    /**
     * @param int $isActive
     *
     * @return EntityInterface
     */
    public function setIsActive(int $isActive): EntityInterface
    {
        return $this->setData(self::IS_ACTIVE, $isActive);
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->getData(self::DESCRIPTION);
    }

    /**
     * @param string $description
     *
     * @return EntityInterface
     */
    public function setDescription(string $description): EntityInterface
    {
        return $this->setData(self::DESCRIPTION, $description);
    }
}
