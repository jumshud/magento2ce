<?php
declare(strict_types=1);

namespace Epam\Crud\Model;

use Epam\Crud\Api\Data\EntityInterface;
use Epam\Crud\Api\EntityRepositoryInterface;
use Epam\Crud\Model\ResourceModel\Entity as EntityResource;
use Epam\Crud\Model\ResourceModel\Entity\CollectionFactory;
use Exception;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchResultsInterface;
use Magento\Framework\Api\SearchResultsInterfaceFactory;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

class EntityRepository implements EntityRepositoryInterface
{
    /**
     * @var EntityFactory
    */
    private $objectFactory;

    /**
     * @var EntityResource
     */
    private $objectResourceModel;

    /**
     * @var CollectionFactory
     */
    private $collectionFactory;

    /**
     * @var SearchResultsInterfaceFactory
     */
    private $searchResultsFactory;

    /**
     * @var CollectionProcessorInterface
     */
    private $collectionProcessor;

    public function __construct(
        EntityFactory $objectFactory,
        EntityResource $objectResourceModel,
        CollectionFactory $collectionFactory,
        SearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->objectFactory = $objectFactory;
        $this->objectResourceModel = $objectResourceModel;
        $this->collectionFactory = $collectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @param EntityInterface $object
     *
     * @return mixed
     *
     * @throws CouldNotSaveException
     * @throws Exception
     */
    public function save(EntityInterface $object): EntityInterface
    {
        try {
            $this->objectResourceModel->save($object);
        } catch (Exception $ex) {
            throw new CouldNotSaveException(__($ex->getMessage()));
        }

        return $object;
    }

    /**
     * @param int $id
     *
     * @return EntityInterface|null
     *
     * @throws NoSuchEntityException
     */
    public function getById(int $id)
    {
        $object = $this->objectFactory->create();
        $this->objectResourceModel->load($object, $id);
        if (!$object->getId()) {
            throw new NoSuchEntityException(__('Object with id "%1" does not exist.', $id));
        }

        return $object;
    }

    /**
     * @param SearchCriteriaInterface $criteria
     * @return SearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $criteria): SearchResultsInterface
    {
        $collection = $this->collectionFactory->create();
        $this->collectionProcessor->process($criteria, $collection);
        $searchResult = $this->searchResultsFactory->create();
        $searchResult->setSearchCriteria($criteria);
        $searchResult->setItems($collection->getItems());
        $searchResult->setTotalCount($collection->getSize());

        return $searchResult;
    }

    /**
     * @param EntityInterface $object
     * @return bool
     * @throws CouldNotDeleteException
     */
    public function delete(EntityInterface $object): bool
    {
        try {
            $this->objectResourceModel->delete($object);
        } catch (Exception $ex) {
            throw new CouldNotDeleteException(__($ex->getMessage()));
        }

        return true;
    }

    /**
     * @param int $id
     *
     * @return bool
     *
     * @throws CouldNotDeleteException
     * @throws NoSuchEntityException
     */
    public function deleteById(int $id): bool
    {
        return $this->delete($this->getById($id));
    }
}
