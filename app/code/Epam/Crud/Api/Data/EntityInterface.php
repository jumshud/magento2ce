<?php
declare(strict_types=1);

namespace Epam\Crud\Api\Data;

/**
 * Interface EntityInterface
 *
 * @package Epam\Crud\Api\Data
 */
interface EntityInterface
{
    const ENTITY_ID = 'entity_id';
    const NAME = 'name';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const IS_ACTIVE = 'is_active';
    const DESCRIPTION = 'description';

    /**
     * @return int
     */
    public function getEntityId();

    /**
     * @param int $entityId
     *
     * @return EntityInterface
     */
    public function setEntityId(int $entityId);

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @param string $name
     *
     * @return EntityInterface
     */
    public function setName(string $name): self;

    /**
     * @return string
     */
    public function getCreatedAt(): string;

    /**
     * @param string $date
     *
     * @return EntityInterface
     */
    public function setCreatedAt(string $date): self;

    /**
     * @return string
     */
    public function getUpdatedAt(): string;

    /**
     * @param string $date
     *
     * @return EntityInterface
     */
    public function setUpdatedAt(string $date): self;

    /**
     * @return int
     */
    public function getIsActive(): int;

    /**
     * @param int $isActive
     *
     * @return EntityInterface
     */
    public function setIsActive(int $isActive): self;

    /**
     * @return string
     */
    public function getDescription(): string;

    /**
     * @param string $description
     *
     * @return EntityInterface
     */
    public function setDescription(string $description): self;
}
