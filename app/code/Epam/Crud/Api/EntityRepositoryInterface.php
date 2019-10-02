<?php
declare(strict_types=1);

namespace Epam\Crud\Api;

use Epam\Crud\Api\Data\EntityInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchResultsInterface;

/**
 * Interface EntityRepositoryInterface
 * @package Epam\Crud\Api
 */
interface EntityRepositoryInterface
{
    /**
     * @param EntityInterface $object
     * @return mixed
     */
    public function save(EntityInterface $object): EntityInterface;

    /**
     * @param int $id
     * @return EntityInterface|null
     */
    public function getById(int $id);

    /**
     * @param SearchCriteriaInterface $criteria
     * @return SearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $criteria): SearchResultsInterface;

    /**
     * @param EntityInterface $object
     * @return bool
     */
    public function delete(EntityInterface $object): bool;

    /**
     * @param int $id
     * @return bool
     */
    public function deleteById(int $id): bool;
}
