<?php
declare(strict_types=1);

namespace Epam\Crud\Controller\Index;

use Epam\Crud\Model\ResourceModel\Entity\CollectionFactory;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;

class Index extends Action
{
    /**
     * @var CollectionFactory
     */
    private $collectionFactory;

    /**
     * @param Context $context
     * @param CollectionFactory $collectionFactory
     */
    public function __construct(Context $context, CollectionFactory $collectionFactory)
    {
        parent::__construct($context);

        $this->collectionFactory = $collectionFactory;
    }

    /**
     * @inheritDoc
     */
    public function execute()
    {
        $collection = $this->collectionFactory->create();
        $collection->addFieldToFilter('entity_id', ['eq' => 3]);
        $result = $this->resultFactory->create(ResultFactory::TYPE_JSON);

        return $result->setData($collection->getData()[0]);
    }
}
