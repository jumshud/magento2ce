<?php
declare(strict_types=1);

namespace Epam\Crud\Controller\Index;

use Epam\Crud\Api\EntityRepositoryInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;

class Read extends Action
{
    /**
     * @var EntityRepositoryInterface
     */
    private $entityRepository;

    /**
     * @var SearchCriteriaBuilder
     */
    private $criteriaBuilder;

    public function __construct(
        Context $context,
        EntityRepositoryInterface $entityRepository,
        SearchCriteriaBuilder $criteriaBuilder
    ) {
        parent::__construct($context);

        $this->entityRepository = $entityRepository;
        $this->criteriaBuilder = $criteriaBuilder;
    }

    /**
     * @inheritDoc
     */
    public function execute()
    {
        $this->criteriaBuilder->addFilter('entity_id', 4);
        $searchCriteria = $this->criteriaBuilder->create();
        $items = $this->entityRepository->getList($searchCriteria)->getItems();

        $res = [];
        foreach ($items as $item) {
            $res[] = ['item_name' => $item->getName()];
        }

        $this->getResponse()->appendBody(json_encode($res));
    }
}
